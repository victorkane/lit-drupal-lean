<?php

/**
 * @file
 * Plugin who deals with theme hooks and theme functions.
 */

$plugin = array(
  'name' => 'Theme Hooks',
  'description' => 'Displays all defined hook_theme().',
  'render callbacks' => array(
    '_moduleinfo_hook_theme_defined' => t('Defined Theme Hooks'),
    '_moduleinfo_hook_theme_parsed' => t('Parsed Theme Hooks'),
  ),
);

/**
 * Renders informations to exposed theme hooks.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_theme_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('theme');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return array();
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_theme';

    if (!function_exists($function)) {
      continue;
    }

    $existing = array();
    $data = $function($existing, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $theme => $values) {
      $items[$module_name]['themes_defined'][$theme] = $values;
    }

    if (isset($items[$module_name]['themes_defined'])) {
      ksort($items[$module_name]['themes_defined']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed theme hooks.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_theme_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_theme_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $themes) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($themes['themes_defined'] as $theme => $values) {
      $tmp = array(
        'info' => '<span class="mono">theme_' . $theme . $module_info . '</span>',
      );

      $template = '';
      if (isset($values['template'])) {
        $template = '<b class="mono">' . t('Template') . ':</b> ' . $values['template'] . '.tpl.php';
      }
      $file = '';
      if (isset($values['file'])) {
        $file = '<b class="mono">' . t('Required file') . ':</b> ' . $values['file'];
      }

      $tmp['desc'] = trim($template . ' ' . $file);

      $list[] = $tmp;
    }
  }

  $description = t('Lists all themes defined via hook_theme() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all themes defined via hook_theme().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_theme'),
    'description' => $description
  ));
}

/**
 * Renders informations to implemented theme_...() functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_theme_parsed_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $functions = _moduleinfo_cache_read('def functions', $module_name, $reference_key);

  if (!count($functions)) {
    return array();
  }

  $items = array();
  foreach ($functions as $module_name => $cache) {
    foreach ($cache->data as $function_name => $values) {
      if (strpos($function_name, 'theme_') !== 0) {
        continue;
      }

      $items[$module_name]['themes_parsed'][$function_name] = $values;
    }

    if (isset($items[$module_name]['themes_parsed'])) {
      ksort($items[$module_name]['themes_parsed']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to implemented theme_...() functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_theme_parsed_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_theme_parsed_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $functions) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($functions['themes_parsed'] as $function => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $values['signature'] . $module_info . '</span>',
        'desc' => $values['shortinfo'],
      );
    }
  }

  $description = t('Lists all Themes defined via hook_theme() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all Themes defined via hook_theme().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('theme_functions'),
    'description' => $description
  ));
}
