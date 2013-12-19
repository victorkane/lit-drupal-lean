<?php

/**
 * @file
 * Plugin who deals with hook block_info.
 */

$plugin = array(
  'name' => 'Field Info Hooks',
  'description' => 'Displays all defined hook_block_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_block_info_defined' => t('Defined Block Info Hooks'),
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
function _moduleinfo_hook_block_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('block_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_block_info';

    if (!function_exists($function)) {
      continue;
    }

    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $delta => $values) {
      $items[$module_name]['blocks'][$delta] = $values;
    }

    if (isset($items[$module_name]['blocks'])) {
      ksort($items[$module_name]['blocks']);
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
 *   Array structure created by _moduleinfo_hook_block_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_block_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $blocks) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($blocks['blocks'] as $block => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $module . '_' . $block . $module_info . '</span>',
        'desc' => $values['info'],
      );
    }
  }

  $description = t('Lists all blocks defined via hook_block_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all blocks defined via hook_block_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_block_info'),
    'description' => $description
  ));
}
