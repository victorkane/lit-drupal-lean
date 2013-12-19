<?php

/**
 * @file
 * Plugin who deals with hook block_info.
 */

$plugin = array(
  'name' => 'cTools Plugin',
  'description' => 'Displays all defined plugins for the ctools plugin system.',
  'render callbacks' => array(
    '_moduleinfo_ctools_plugins_defined' => t('Defined accepted cTools Plugins'),
    '_moduleinfo_ctools_plugins_provided' => t('Defined cTools Plugins'),
  ),
);

/**
 * Renders informations to accepted plugins.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return string
 *   Array of collected informations.
 */
function _moduleinfo_ctools_plugins_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = ctools_plugin_get_plugin_type_info();

  if (!is_null($module_name) && !in_array($module_name, array_keys($list))) {
    return array();
  }

  $items = array();
  foreach ($list as $module_name => $plugins) {
    foreach ($plugins as $plugin => $values) {
      $items[$module_name]['ctools_plugins_defined'][$plugin] = $values;
    }

    if (isset($items[$module_name]['ctools_plugins_defined'])) {
      ksort($items[$module_name]['ctools_plugins_defined']);
    }
  }

  return $items;
}

/**
 * Renders informations to accepted plugins.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_ctools_plugins_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_ctools_plugins_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $plugins) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($plugins['ctools_plugins_defined'] as $plugin => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $plugin . $module_info . '</span>',
        'desc' => '<span class="description">' . $module . '</span>',
      );
    }
  }

  $description = t('Lists all plugins from the ctools plugin system, which this module accepts.');
  if (is_null($module_name)) {
    $description = t('Lists all plugins by module from the ctools plugin system, which are accepted by modules.');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('cTools Plugins - Defined'),
    'description' => $description
  ));
}

/**
 * Renders informations to provided plugins.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return string
 *   Array of collected informations.
 */
function _moduleinfo_ctools_plugins_provided_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = ctools_plugin_get_plugin_type_info();
  $list = _moduleinfo_result_reduce($module_name, $list);

  ctools_include('plugins');

  $items = array();

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  foreach ($list as $module_name => $plugins) {
    foreach ($plugins as $plugin => $values) {
      $plugins_provided = ctools_get_plugins($module_name, $plugin);

      foreach ($plugins_provided as $plugin_name => $info) {
        $items[$module_name]['ctools_plugins_provided'][$plugin_name] = $info;
      }

      if (isset($items[$module_name]['ctools_plugins_provided'])) {
        ksort($items[$module_name]['ctools_plugins_provided']);
      }
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to provided plugins.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_ctools_plugins_provided_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_ctools_plugins_provided_renderer($module_name = NULL, $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $plugins) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($plugins['ctools_plugins_provided'] as $plugin => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $values['name'] . $module_info . '</span>',
        'desc' => isset($values['description']) ? '<span class="description">' . $values['description'] . '</span>' : '',
      );
    }
  }

  $description = t('Lists all plugins from the ctools plugin system, which this module provides.');
  if (is_null($module_name)) {
    $description = t('Lists all plugins by module from the ctools plugin system, which are provided by modules.');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('cTools Plugins - Provided'),
    'description' => $description
  ));
}
