<?php

/**
 * @file
 * Plugin who deals with hook field_formatter_info.
 */

$plugin = array(
  'name' => 'Field Formatter Info Hooks',
  'description' => 'Displays all defined hook_field_formatter_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_field_formatter_info_defined' => t('Defined Field Formatter Info Hooks'),
  ),
);

/**
 * Renders informations to exposed field formatters.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_field_formatter_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('field_formatter_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_field_formatter_info';

    if (!function_exists($function)) {
      continue;
    }

    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $formatter => $values) {
      $items[$module_name]['formatters'][$formatter] = $values;
    }

    if (isset($items[$module_name]['formatters'])) {
      ksort($items[$module_name]['formatters']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed field formatters.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_field_formatter_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_field_formatter_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $formatters) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($formatters['formatters'] as $formatter => $values) {
      $list[] = array(
        'info' => $values['label'] . $module_info,
        'desc' => implode(', ', $values['field types']),
      );
    }
  }

  $description = t('Lists all field formatters defined via hook_field_formatter_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all field formatters defined via hook_field_formatter_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_field_formatter_info'),
    'description' => $description
  ));
}
