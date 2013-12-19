<?php

/**
 * @file
 * Plugin who deals with hook element_info.
 */

$plugin = array(
  'name' => 'Element Info Hooks',
  'description' => 'Displays all defined hook_element_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_element_info_defined' => t('Defined Entity Info Hooks'),
  ),
);

/**
 * Renders informations to exposed elements.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_element_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('element_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_element_info';
    if (!function_exists($function)) {
      continue;
    }
    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $element => $values) {
      $items[$module_name]['elements'][$element] = $values;
    }

    if (isset($items[$module_name]['elements'])) {
      ksort($items[$module_name]['elements']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed elements.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_element_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_element_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $elements) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($elements['elements'] as $element => $values) {
      if ($module == 'system') {
        $element = l($element, 'http://api.drupal.org/api/drupal/developer!topics!forms_api_reference.html/7#' . $element);
      }

      $list[] = array(
        'info' => '<span class="mono">' . $element . $module_info . '</span>',
      );
    }
  }

  $description = t('Lists all elements defined via hook_element_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all elements defined via hook_element_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_element_info (FAPI elements)'),
    'description' => $description
  ));
}
