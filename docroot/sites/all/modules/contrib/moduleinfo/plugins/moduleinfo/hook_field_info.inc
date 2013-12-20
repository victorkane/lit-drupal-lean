<?php

/**
 * @file
 * Plugin who deals with hook field_info.
 */

$plugin = array(
  'name' => 'Field Info Hooks',
  'description' => 'Displays all defined hook_field_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_field_info_defined' => t('Defined Field Info Hooks'),
  ),
);

/**
 * Renders informations to exposed fields.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_field_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('field_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_field_info';
    if (!function_exists($function)) {
      continue;
    }
    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $field => $values) {
      $items[$module_name]['fields'][$field] = $values;
    }

    if (isset($items[$module_name]['fields'])) {
      ksort($items[$module_name]['fields']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed fields.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_field_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_field_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $fields) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($fields['fields'] as $field => $values) {
      $tmp = array(
        'info' => '<b class="mono">' . $field . $module_info . '</b>',
      );

      $label = '';
      if (isset($values['label'])) {
        $label = '<b>' . $values['label'] . '</b>';
      }
      $description = '';
      if (isset($values['description'])) {
        $description = $values['description'];
      }
      if (!empty($label) || !empty($description)) {
        $tmp['desc'] = $label . ' ' . $description;
      }

      $list[] = $tmp;
    }
  }

  $description = t('Lists all fields defined via hook_field_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all fields defined via hook_field_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_field_info'),
    'description' => $description
  ));
}
