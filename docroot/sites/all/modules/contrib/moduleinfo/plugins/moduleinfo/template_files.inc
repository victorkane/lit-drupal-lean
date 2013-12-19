<?php

/**
 * @file
 * Plugin who deals with template files.
 */

$plugin = array(
  'name' => 'Template Files',
  'description' => 'Scans Drupal for template files.',
  'scan callbacks' => array(
    '_moduleinfo_template_files_scan' => array(
      'scan' => array(
        '/.+\.tpl\.php$/i',
      ),
      'skip' => array(),
    ),
  ),
  'render callbacks' => array(
    '_moduleinfo_template_files_defined' => t('Available Template Files'),
  ),
);

/**
 * Scans templates for useful informations.
 *
 * @param string $module_name
 *   Name of the current module
 * @param string $content
 *   Content of the current processed file
 * @param string $uri
 *   URI of the file.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 *
 * @TODO: Implement that feature!
 */
function _moduleinfo_template_files_scan($module_name, $content, $uri, $reference_key = 'moduleinfo') {
  $ref = new PhpReflector($content);
  $ref->parse();
  $symbols = $ref->getResult();

  if (!isset($symbols['used variables'])) {
    return array();
  }

  $variables = $symbols['used variables'];

  $record = array();
  foreach ($variables as $i => $variable) {
    $variable_name = $variable->name;

    $record[$uri][$variable_name] = array(
      'name' => $variable_name,
      'line_number' => $variable->line_number,
    );
  }

  if (count($record)) {
    _moduleinfo_cache_write('tpl files', $record, $module_name, $reference_key);
  }

  return $record;
}

/**
 * Renders informations about template files.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Rendered informations.
 */
function _moduleinfo_template_files_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $result = _moduleinfo_cache_read('tpl files', $module_name, $reference_key);
  $result = _moduleinfo_result_reduce($module_name, $result);

  $items = array();
  foreach ($result as $module_name => $cache) {
    foreach ($cache->data as $file => $variables) {
      $items[$module_name]['tpl files'][$file] = $variables;
    }

    if (isset($items[$module_name]['tpl files'])) {
      ksort($items[$module_name]['tpl files']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations about template files.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_schema_defined_collector().
 *
 * @return string
 *   Rendered informations.
 *
 * @TODO: Implement that feature!
 */
function _moduleinfo_template_files_defined_renderer($module_name = NULL, $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();

  if (is_null($module_name)) {
    foreach ($items as $module => $tpl_files) {
      $module_info = '';
      if (is_null($module_name)) {
        $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
      }

      foreach ($tpl_files['tpl files'] as $file => $variables) {
        $list[] = array(
          'info' => '<span class="mono">' . $file . $module_info . '</span>',
        );
      }
    }
  }
  else {
    foreach ($items as $module => $tpl_files) {
      foreach ($tpl_files['tpl files'] as $file => $variables) {
        $tmp = array();
        foreach ($variables as $variable => $values) {
          $tmp[] = array(
            'info' => '<span class="mono">#' . $values['line_number'] . ': ' . $variable . '</span>',
          );
        }

        ksort($tmp);

        $list[] = array(
          'info' => '<span class="mono">' . basename($file) . '</span>',
          'desc' => theme('moduleinfo_itemlist', array('items' => $tmp)),
        );
      }
    }
  }

  $description = t('Lists all the found template files. These have .tpl.php at the end.');
  if (is_null($module_name)) {
    $description = t('Lists all template files of that module.');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Template Files'),
    'description' => $description
  ));
}
