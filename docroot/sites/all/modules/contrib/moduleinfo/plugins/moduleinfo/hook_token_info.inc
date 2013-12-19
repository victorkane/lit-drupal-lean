<?php

/**
 * @file
 * Plugin who deals with hook token_info.
 */

$plugin = array(
  'name' => 'Field Info Hooks',
  'description' => 'Displays all defined hook_token_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_token_info_defined' => t('Defined Token Info Hooks'),
  ),
);


/**
 * Renders informations to exposed token.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return string
 *   Array of collected informations.
 */
function _moduleinfo_hook_token_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('token_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_token_info';

    if (!function_exists($function)) {
      continue;
    }

    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    if (count($data['tokens'])) {
      foreach ($data['tokens'] as $prefix => $token) {
        $items[$module_name]['tokens'][$prefix] = $token;
      }

      if (isset($items[$module_name]['tokens'])) {
        ksort($items[$module_name]['tokens']);
      }
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed token.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_token_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_token_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $values) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($values['tokens'] as $prefix => $tokens) {
      foreach ($tokens as $token => $setup) {
        $list[] = array(
          'info' => '<span class="mono">[' . $prefix . ':' . $token . ']' . $module_info . '</span>',
          'desc' => '<b>' . $setup['name'] . '</b> ' . $setup['description'],
        );
      }
    }
  }

  $description = t('Lists all tokens defined via hook_token_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all tokens defined via hook_token_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_token_info'),
    'description' => $description
  ));
}
