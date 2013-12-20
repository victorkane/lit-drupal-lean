<?php

/**
 * @file
 * Plugin who deals with functions in general.
 */

$plugin = array(
  'name' => 'Defined Functions',
  'description' => 'Scans Drupal for defined functions.',
  'scan callbacks' => array(
    '_moduleinfo_def_functions_scan' => array(
      'scan' => array(
        '/.*/i',
      ),
      'skip' => array(
        '/.+\.tpl\.php$/i',
        '/.+\.api\.php$/i',
      ),
    ),
  ),
  'post scan callbacks' => array(
    '_moduleinfo_def_functions_post_scan_hook_list',
  ),
  '#weight' => -10,
);

/**
 * Collects all function names from a module.
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
 */
function _moduleinfo_def_functions_scan($module_name, $content, $uri, $reference_key) {
  $ref = new PhpReflector($content);
  $ref->parse();
  $symbols = $ref->getResult();

  if (!isset($symbols['defined functions'])) {
    return array();
  }

  $functions = $symbols['defined functions'];

  $record = array();
  foreach ($functions as $i => $function) {
    $function_name = $function->name;

    $record[$function_name] = array(
      'shortinfo' => $function->doc_short,
      'doc' => $function->doc,
      'name' => $function_name,
      'signature' => $function->signature,
      'line_number' => $function->line_number,
      'type' => strpos($uri, 'modules/') === 0 ? 'core' : 'user',
      'file' => basename($uri),
      'uri' => $uri,
    );
  }

  if (count($record)) {
    _moduleinfo_cache_write('def functions', $record, $module_name, $reference_key);
  }

  return $record;
}

/**
 * Collects all defined functions of all modules and caches them.
 *
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 */
function _moduleinfo_def_functions_post_scan_hook_list($reference_key = 'moduleinfo') {
  $result = _moduleinfo_cache_read('def functions', NULL, $reference_key);

  if (!count($result)) {
    return array();
  }

  $functions = array();
  foreach ($result as $module_name => $cache) {
    foreach ($cache->data as $function_name => $values) {
      $functions[$function_name] = $module_name;
    }
  }

  _moduleinfo_cache_write('all functions', $functions, NULL, $reference_key);

  return $functions;
}
