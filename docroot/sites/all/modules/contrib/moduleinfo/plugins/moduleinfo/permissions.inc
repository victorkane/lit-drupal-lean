<?php

/**
 * @file
 * Plugin who deals with hook permissions.
 */

$plugin = array(
  'name' => 'Permissions',
  'description' => 'Displays all defined permissions via hook_permissions().',
  'render callbacks' => array(
    '_moduleinfo_hook_permissions_defined' => t('Defined Permissions'),
  ),
);

/**
 * Collects informations to permissions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_permissions_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('permission');

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_permission';

    if (!function_exists($function)) {
      continue;
    }

    $data = $function(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

    foreach ($data as $perm => $values) {
      $items[$module_name]['permissions'][$perm] = $values;
    }

    if (isset($items[$module_name]['permissions'])) {
      ksort($items[$module_name]['permissions']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to permissions.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_permissions_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_permissions_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $permissions) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($permissions['permissions'] as $permission => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $permission . $module_info . '</span>',
        'desc' => trim('<b>' . $values['title'] . '</b> ' . (isset($values['description']) ? ' - ' .$values['description'] : '')),
      );
    }
  }

  $description = t('Lists all permissions defined by hook_permission() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all permissions defined via hook_permission().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Permissions'),
    'description' => $description
  ));
}

