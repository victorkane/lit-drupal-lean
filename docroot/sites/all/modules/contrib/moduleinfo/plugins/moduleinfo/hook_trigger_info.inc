<?php

/**
 * @file
 * Plugin who deals with hook trigger_info.
 */

$plugin = array(
  'name' => 'Trigger Info Hooks',
  'description' => 'Displays all defined hook_trigger_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_trigger_info_defined' => t('Defined Trigger Info Hooks'),
  ),
);

/**
 * Renders informations to exposed triggers.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_trigger_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('trigger_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_trigger_info';

    if (!function_exists($function)) {
      continue;
    }

    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $module_name => $triggers) {
      foreach ($triggers as $trigger => $values) {
        $items[$module_name]['triggers'][$trigger] = $values;
      }

      if (isset($items[$module_name]['triggers'])) {
        ksort($items[$module_name]['triggers']);
      }
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed triggers.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_trigger_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_trigger_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $triggers) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($triggers['triggers'] as $trigger => $values) {
      $list[] = array(
        'info' => '<b class="mono">' . $trigger . $module_info . '</b>',
        'desc' => isset($values['label']) ? $values['label'] : '',
      );
    }
  }

  $description = t('Lists all triggers defined via hook_trigger_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all triggers defined via hook_trigger_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_trigger_info'),
    'description' => $description
  ));
}
