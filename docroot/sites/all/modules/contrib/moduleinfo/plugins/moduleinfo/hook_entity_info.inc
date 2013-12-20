<?php

/**
 * @file
 * Plugin who deals with hook entity_info.
 */

$plugin = array(
  'name' => 'Entity Info Hooks',
  'description' => 'Displays all defined hook_entity_info().',
  'render callbacks' => array(
    '_moduleinfo_hook_entity_info_defined' => t('Defined Entity Info Hooks'),
  ),
);

/**
 * Renders informations to exposed entities.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_entity_info_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('entity_info');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_entity_info';

    if (!function_exists($function)) {
      continue;
    }

    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $entity => $values) {
      $items[$module_name]['entities'][$entity] = $values;
    }

    if (isset($items[$module_name]['entities'])) {
      ksort($items[$module_name]['entities']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed entities.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_entity_info_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_entity_info_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $entities) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($entities['entities'] as $entity => $values) {
      $subitems = '';
      if (isset($values['bundles'])) {
        $subitems = array();
        foreach ($values['bundles'] as $key => $elem) {
          $subitems[] = array(
            'info' => '<span class="mono">' . $key . '</span>',
            'desc' => $elem['label'],
          );
        }
        $subitems = theme('moduleinfo_itemlist', array('items' => $subitems));
      }

      $list[] = array(
        'info' => '<span class="mono">' . $entity . $module_info . '</span>',
        'desc' => trim($values['label'] . ' ' . $subitems),
      );
    }
  }

  $description = t('Lists all entities defined via hook_entity_info() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all entities defined via hook_entity_info().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_entity_info'),
    'description' => $description
  ));
}
