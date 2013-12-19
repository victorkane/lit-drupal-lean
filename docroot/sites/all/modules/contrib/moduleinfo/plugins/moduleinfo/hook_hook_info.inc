<?php

/**
 * @file
 * Plugin who deals with hook block_info.
 */

$plugin = array(
  'name' => 'Hook Info Hooks',
  'description' => 'Displays all defined hook_hook_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_hook_info_defined' => t('Defined Hook Info Hooks'),
  ),
);

/**
 * Renders informations to exposed blocks.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_hook_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('hook_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_hook_info';

    if (!function_exists($function)) {
      continue;
    }

    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $hook => $values) {
      $items[$module_name]['hooks'][$hook] = $values;
    }

    if (isset($items[$module_name]['hooks'])) {
      ksort($items[$module_name]['hooks']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed blocks.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_hook_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_hook_info_defined_renderer($module_name = NULL, array $items = array()) {
  if (!is_null($module_name)) {
    if (!isset($items[$module_name])) {
      return '';
    }

    $tmp = array($module_name => $items[$module_name]);
    $items = $tmp;
  }

  $list = array();
  foreach ($items as $module => $hooks) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($hooks['hooks'] as $hook => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $hook . $module_info . '</span>',
        'desc' => t('Group: ') . $values['group'],
      );
    }
  }

  $description = t('Lists all hooks defined via hook_hook_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all hooks defined via hook_hook_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_hook_info'),
    'description' => $description
  ));
}
