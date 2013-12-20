<?php

/**
 * @file
 * Plugin who deals with preprocess hooks.
 */

$plugin = array(
  'name' => 'Preprocess HOOKs',
  'description' => 'Scans Drupal for defined preprocess HOOKs',
  'scan callbacks' => array(),
  'render callbacks' => array(
    '_moduleinfo_preprocess_defined' => t('Preprocess Hooks'),
  ),
);

/**
 * Renders informations about implemented preprocess functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_preprocess_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $modules = _moduleinfo_cache_read('def functions', $module_name, $reference_key);
  $modules = _moduleinfo_result_reduce($module_name, $modules);

  if (is_null($modules)) {
    return array();
  }

  if (!count($modules)) {
    return array();
  }

  $items = array();
  foreach ($modules as $module_name => $cache) {
    foreach ($cache->data as $preprocess => $values) {
      if (!preg_match('/^(template|' . $module_name . ')_preprocess_/i', $preprocess)) {
        continue;
      }

      $items[$module_name]['preprocesses'][$preprocess] = $values;
    }

    if (isset($items[$module_name]['preprocesses'])) {
      ksort($items[$module_name]['preprocesses']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations about implemented preprocess functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_preprocess_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_preprocess_defined_renderer($module_name = NULL, $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $preprocesses) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($preprocesses['preprocesses'] as $preprocess => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $preprocess . $module_info . '</span>',
        'desc' => $values['shortinfo'],
      );
    }
  }

  $description = t('Lists all preprocess hooks of that module based on *_preprocess_* as signature part.');
  if (is_null($module_name)) {
    $description = t('Lists all preprocess hooks of the system based on *_preprocess_* as signature part.');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Preproccess Functions'),
    'description' => $description
  ));
}
