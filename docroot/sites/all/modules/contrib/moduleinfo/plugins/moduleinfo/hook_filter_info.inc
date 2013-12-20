<?php

/**
 * @file
 * Plugin who deals with hook filter_info.
 */

$plugin = array(
  'name' => 'Filter Info Hooks',
  'description' => 'Displays all defined hook_filter_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_filter_info_defined' => t('Defined Filter Info Hooks'),
  ),
);

/**
 * Renders informations to exposed filters.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_filter_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('filter_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_filter_info';

    if (!function_exists($function)) {
      continue;
    }

    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $filter => $values) {
      $items[$module_name]['filters'][$filter] = $values;
    }

    if (isset($items[$module_name]['filters'])) {
      ksort($items[$module_name]['filters']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed filters.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_filter_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_filter_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $filters) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($filters['filters'] as $filter => $values) {
      $list[] = array(
        'info' => '<b class="mono">' . $filter . $module_info . '</b>',
        'desc' => trim('<b>' . $values['title'] . '</b> ' . (isset($values['description']) ? $values['description'] : '')),
      );
    }
  }

  $description = t('Lists all filters defined via hook_filter_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all filters defined via hook_filter_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_filter_info'),
    'description' => $description
  ));
}
