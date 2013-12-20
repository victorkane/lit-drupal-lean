<?php

/**
 * @file
 * Plugin who deals with alters functions.
 */

$plugin = array(
  'name' => 'Alters',
  'description' => 'Displays informations about defined alters.',
  'render callbacks' => array(
    '_moduleinfo_alters_defined' => t('Alters'),
  ),
);

/**
 * Renders informations about functions who are alter functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_alters_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $result = _moduleinfo_cache_read('def functions', $module_name, $reference_key);
  $result = _moduleinfo_result_reduce($module_name, $result);

  $items = array();
  foreach ($result as $module_name => $cache) {
    foreach ($cache->data as $alters => $info) {
      if (!preg_match('/^(' . $module_name . ')_(.*)_alter$/i', $alters)) {
        continue;
      }

      $items[$module_name]['alters'][$alters] = $info;
    }

    if (isset($items[$module_name]['alters'])) {
      ksort($items[$module_name]['alters']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations about functions who are alter functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_alters_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_alters_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $alters) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($alters['alters'] as $alter => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $values['signature'] . $module_info . '</span>',
        'desc' => $values['shortinfo'],
      );
    }
  }

  $description = t('Lists all functions which follow the schema modulename_*_alter.');

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Alters'),
    'description' => $description
  ));
}
