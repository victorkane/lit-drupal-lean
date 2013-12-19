<?php

/**
 * @file
 * Plugin who deals with update definitions.
 */

$plugin = array(
  'name' => 'Update',
  'description' => 'Shows how many update_N() functions are defined for a certain module and if available the short information what this update does.',
  'render callbacks' => array(
    '_moduleinfo_updates_defined' => t('Updates, as defined by hook_update_N()'),
  ),
);

/**
 * Collects a list of update informations about a module.
 *
 * @param string $module_name
 *   Name of the module to process.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_updates_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $modules = _moduleinfo_cache_read('def functions', $module_name, $reference_key);

  if (!count($modules)) {
    return array();
  }

  $modules = _moduleinfo_result_reduce($module_name, $modules);

  $items = array();
  foreach ($modules as $module_name => $module) {
    foreach ($module->data as $function_name => $values) {
      if (!preg_match('/^(' . $module_name . ')_update_([0-9]+)/i', $function_name)) {
        continue;
      }

      $items[$module_name][$function_name] = $values;
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations about defined updates.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array  $items
 *   Array structure created by _moduleinfo_updates_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_updates_defined_renderer($module_name = NULL, $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $updates) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($updates as $update => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $update . $module_info . '</span>',
        'desc' => $values['shortinfo'],
      );
    }
  }

  $description = t('Lists all updates hook_update_N() of that module.');

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Updates'),
    'description' => $description
  ));
}
