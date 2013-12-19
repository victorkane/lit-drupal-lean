<?php

/**
 * @file
 * Plugin who deals with functions which invoke something.
 */

$plugin = array(
  'name' => 'Invoke Functions',
  'description' => 'Scans Drupal for positions where a function with namecontent *invoke* is called.',
  'scan callbacks' => array(
    '_moduleinfo_scan_invokes' => array(
      'scan' => array(
        '/.*/i',
      ),
      'skip' => array(
        '/.+\.tpl\.php$/i',
        '/.+\.api\.php$/i',
      ),
    ),
  ),
  'render callbacks' => array(
    '_moduleinfo_invokes_called' => t('Found called Invokes'),
    '_moduleinfo_invokes_defined' => t('Functions to Invoke Something'),
  ),
  '#weight' => -8,
);

/**
 * Scans files for informations about functions which invoke something.
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
 */
function _moduleinfo_scan_invokes($module_name, $content, $uri, $reference_key = 'moduleinfo') {
  $ref = new PhpReflector($content);
  $ref->parse();
  $symbols = $ref->getResult();

  if (!isset($symbols['called functions'])) {
    return array();
  }

  $functions = $symbols['defined functions'];

  $record = array();
  foreach ($functions as $i => $info) {
    if (strpos($info->name, 'invoke') !== FALSE) {
      $functions[$i]->file = $uri;
      $record[$info->name] = $functions[$i];
    }
  }

  if (count($record)) {
    _moduleinfo_cache_write('invokes', $record, $module_name, $reference_key);
  }

  return $record;
}

/**
 * Renders informations about called invoke functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 *
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_invokes_called_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  return array();
}

/**
 * Renders informations about called invoke functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 *
 * @param array  $items
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_invokes_called_renderer($module_name = NULL, array $items = array()) {
  return '';
}

/**
 * Collects informations about defined invoke functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_invokes_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $functions = _moduleinfo_cache_read('all functions', NULL, $reference_key);

  if (!count($functions)) {
    return array();
  }

  $functions = array_keys($functions['0']->data);

  $invokes = array_filter($functions, '_moduleinfo_invokes_filter');
  $invokes = array_values($invokes);
  $invokes[] = 'module_invoke_all';
  $invokes[] = 'module_invoke';
  $invokes[] = 'ajax_command_invoke';
  $invokes[] = 'bootstrap_invoke_all';
  $invokes[] = 'image_toolkit_all';
  $invokes[] = 'language_provider_invoke';

  return $invokes;
}

/**
 * Renders informations about defined invoke functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hooks_implemented_collector().
 *
 * @return string
 *   Rendered informations.
 *
 * @TODO: Implement that feature!
 */
function _moduleinfo_invokes_defined_renderer($module_name = NULL, array $items = array()) {
  return '';
}

/**
 * Helper for a uasort filter.
 */
function _moduleinfo_invokes_filter($elem) {
  return strpos($elem, 'invoke') !== FALSE;
}
