<?php

/**
 * @file
 * Scans the installation for useful data.
 */

/**
 * Scans the directory structure of a given module.
 *
 * @param string $module_name
 *   Name of the module to process
 * @param array  $path
 *   Path were the module can be found.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 * @param array $context
 *   Context array of the Batch process
 *
 * @return array
 *   Result of the scan operation.
 */
function _moduleinfo_scan($module_name, $path = NULL, $reference_key = 'moduleinfo', &$context = array()) {
  $files = _moduleinfo_collect_module_files($module_name, $path);

  _moduleinfo_cache_write('files', $files, $module_name, $reference_key);

  return _moduleinfo_cache_operations($module_name, $reference_key);
}

function _moduleinfo_collect_module_files($module_name, $path = NULL) {
  if (!isset($path)) {
    $path = drupal_get_path('module', $module_name);
  }

  $file_extensions = _moduleinfo_build_list(variable_get('moduleinfo_filescan_extensions', MODULEINFO_DEFAULT_EXTENSIONS));
  $file_extensions = implode("|", $file_extensions);

  // I need that for the filtering.
  $file_extensions = $file_extensions . '|info';

  $files = file_scan_directory($path, '/^.+\.(' . $file_extensions . ')$/i');

  $directory_to_skip = _moduleinfo_build_list(variable_get('moduleinfo_filescan_directory_skip', MODULEINFO_DEFAULT_DIRECTORY_SKIP));
  if (count($directory_to_skip)) {
    $directory_to_skip = implode("|", $directory_to_skip);

    // First I filter unwanted directories.
    foreach ($files as $uri => $data) {
      if (preg_match('#.*[/\\\\](' . $directory_to_skip . ')[/\\\\].*#i', $uri)) {
        unset($files[$uri]);
      }
    }
  }

  $file_unwanted_extensions = _moduleinfo_build_list(variable_get('moduleinfo_filescan_extensions_filter', MODULEINFO_DEFAULT_EXTENSIONS_FILTER));
  if (count($file_unwanted_extensions)) {
    $file_unwanted_extensions = array_map('preg_quote', $file_unwanted_extensions);
    $file_unwanted_extensions = implode("|", $file_unwanted_extensions);

    // Now unwanted extensions.
    foreach ($files as $uri => $data) {
      if (preg_match('/^.+\.(' . $file_unwanted_extensions . ')$/i', $uri)) {
        unset($files[$uri]);
      }
    }
  }

  // I'll assume that each module subpath with an .info file in it will either
  // be later in the list of processing, or is not activated, thus I'll remove
  // everything from the files list. Subdirectories of that path will be assumed
  // as owned by the submodule. This is the only valid .info for that
  // particiular module.
  $module_info_file = $path . '/' . $module_name . '.info';
  while (TRUE) {
    $base_name = NULL;

    foreach ($files as $uri => $data) {
      if (preg_match('/.+\.info/i', $uri) && $uri != $module_info_file && dirname($uri) != $path) {
        $base_name = dirname($uri) . '/';
        break;
      }
    }

    if (is_null($base_name)) {
      break;
    }

    reset($files);

    foreach ($files as $uri => $data) {
      if (strpos($uri, $base_name) === 0) {
        unset($files[$uri]);
      }
    }
  }

  unset($files[$module_info_file]);

  return $files;
}

/**
 * Processes further scan operations on file contents.
 *
 * @param string $module_name
 *   The name of the current processed module
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 */
function _moduleinfo_cache_operations($module_name, $reference_key = 'moduleinfo') {
  $result = _moduleinfo_cache_read('files', $module_name, $reference_key);

  ctools_include('plugins');
  $plugins = ctools_get_plugins('moduleinfo', 'moduleinfo');

  uasort($plugins, 'element_sort');

  $return = array();
  foreach ($result as $id => $row) {
    foreach ($row->data as $uri => $def) {
      $content = file_get_contents($uri);

      foreach ($plugins as $plugin_name => $plugin) {
        if (!count($plugin['scan callbacks'])) {
          continue;
        }

        foreach ($plugin['scan callbacks'] as $callback => $conditions) {
          $process_file = FALSE;
          // First we check positive conditions to process the file.
          if (isset($conditions['scan']) && is_array($conditions['scan'])) {
            foreach ($conditions['scan'] as $regex) {
              if (preg_match($regex, $uri)) {
                $process_file = TRUE;
                break;
              }
            }
          }
          // Now we scan for negative conditions to skip the file.
          if (isset($conditions['skip']) && is_array($conditions['skip'])) {
            foreach ($conditions['skip'] as $regex) {
              if (preg_match($regex, $uri)) {
                $process_file = FALSE;
                break;
              }
            }
          }

          if (!$process_file) {
            continue;
          }

          $return[] = $callback($module_name, $content, $uri, $reference_key);
        }
      }
    }
  }

  return $return;
}

/**
 * Clears the ModuleInfo cache for all scanned informations.
 *
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 */
function _moduleinfo_scan_start($reference_key = 'moduleinfo') {
  db_delete('cache_moduleinfo')
    ->condition('reference_key', $reference_key)
    ->execute();
}

/**
 * After scan processing of moduleinformations.
 *
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 * @param array $context
 *   Context array of the Batch API.
 *
 * @return array
 */
function _moduleinfo_scan_post_process($reference_key = 'moduleinfo', &$context = array()) {
  $result = _moduleinfo_cache_read('files', NULL, $reference_key);

  // Create an all files lookup cache.
  $all_files = array();
  foreach ($result as $module_name => $cache) {
    foreach ($cache->data as $file_name => $info) {
      $all_files[$file_name] = $module_name;
    }
  }

  ksort($all_files);

  _moduleinfo_cache_write('all files', $all_files, NULL, $reference_key);

  ctools_include('plugins');
  $plugins = ctools_get_plugins('moduleinfo', 'moduleinfo');

  uasort($plugins, 'element_sort');

  $return = array();
  foreach ($plugins as $plugin_name => $plugin) {
    if (!count($plugin['post scan callbacks'])) {
      continue;
    }

    foreach ($plugin['post scan callbacks'] as $callback) {
      $return[] = $callback($reference_key);
    }
  }

  return $return;
}

/**
 * Helper to build an array list of values from a textfield.
 *
 * @param string $variables
 *   Text with data separated by \n
 *
 * @return array
 *   List of values
 */
function _moduleinfo_build_list($variables) {
  $variables = trim($variables);

  if (empty($variables)) {
    return array();
  }

  $variables = explode("\n", $variables);
  $variables = array_map('trim', $variables);
  $variables = array_filter($variables);
  return $variables;
}
