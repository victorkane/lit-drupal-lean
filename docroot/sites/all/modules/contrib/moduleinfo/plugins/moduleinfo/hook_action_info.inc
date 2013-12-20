<?php

/**
 * @file
 * Plugin who deals with hook action_info.
 */

$plugin = array(
  'name' => 'Field Info Hooks',
  'description' => 'Displays all defined hook_action_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_action_info_defined' => t('Defined Action Info Hooks'),
  ),
);

/**
 * Renders informations to exposed actions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_action_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('action_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_action_info';
    if (!function_exists($function)) {
      continue;
    }
    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $action => $values) {
      $items[$module_name]['actions'][$action] = $values;
    }

    if (isset($items[$module_name]['actions'])) {
      ksort($items[$module_name]['actions']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed actions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_action_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_action_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $actions) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($actions['actions'] as $action => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $action . $module_info . '</span>',
        'desc' => '<b>' . t('Type') . ' : ' . $values['type'] . '</b> ' . $values['label'],
      );
    }
  }

  $description = t('Lists all actions defined via hook_action_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all actions defined via hook_action_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_action_info'),
    'description' => $description
  ));
}
