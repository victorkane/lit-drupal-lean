<?php

/**
 * @file
 * Plugin who deals with paths.
 */

$plugin = array(
  'name' => 'Menu Hooks',
  'description' => 'Displays all defined hook_menu() paths.',
  'render callbacks' => array(
    '_moduleinfo_hook_menu_defined' => t('Defined Paths'),
    '_moduleinfo_hook_menu_access' => t('Path Access by Role'),
  ),
);

/**
 * Renders informations to exposed paths.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_menu_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('menu');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return '';
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $hook_menu = $module_name . '_menu';

    if (!function_exists($hook_menu)) {
      continue;
    }

    $paths = $hook_menu();

    foreach ($paths as $path => $values) {
      $items[$module_name]['paths_defined'][$path] = $values;
    }

    if (isset($items[$module_name]['paths_defined'])) {
      ksort($items[$module_name]['paths_defined']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations to exposed paths.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_menu_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_menu_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $paths) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($paths['paths_defined'] as $path => $values) {
      $tmp = array();

      if (strpos($path, '%') !== FALSE) {
        $tmp['info'] = '<span class="mono">' . $path . '</span>';
      }
      else {
        $tmp['info'] = '<span class="mono">' . l($path, $path) . '</span>';
      }

      $title = '';
      if (isset($values['title'])) {
        $title = '<b>' . $values['title'] . '</b>';
      }
      $description = '';
      if (isset($values['description'])) {
        $description = $values['description'];
      }
      if (isset($values['page callback']) && $values['page callback'] == 'drupal_get_form') {
        $tmp['info'] .= ' (' . t('Form') . ')';
      }

      $tmp['info'] .= $module_info;

      if (!empty($title) || !empty($description)) {
        $tmp['desc'] = $title . ' ' . $description;
      }

      $list[] = $tmp;
    }
  }

  $description = t('Lists all paths defined via hook_menu() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all paths defined via hook_menu().');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('hook_menu'),
    'description' => $description
  ));
}

/**
 * Renders informations of which role can access a path.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hook_menu_access_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $list = module_implements('menu');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return '';
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $roles = user_roles();
  $permissions = user_role_permissions($roles);

  $items = array();
  foreach ($roles as $role_id => $role) {
    foreach ($list as $module_name) {
      $hook_menu = $module_name . '_menu';
      if (!function_exists($hook_menu)) {
        continue;
      }

      $paths = $hook_menu();

      foreach ($paths as $path => $values) {
        if (isset($values['access callback']) && $values['access callback'] != 'user_access') {
          continue;
        }
        else {
          if (!isset($values['access arguments'])) {
            $values['access arguments'] = 'access content';
          }

          $menu_permission = $values['access arguments'][0];
          if (!in_array($menu_permission, array_keys($permissions[$role_id]))) {
            continue;
          }
        }

        $values['path'] = $path;
        $items[$module_name]['paths_access'][$role][$path] = $values;
      }
    }

    if (isset($items[$module_name]['paths_access'])) {
      ksort($items[$module_name]['paths_access']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations of which role can access a path.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hook_menu_access_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_menu_access_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $permission) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($permission['paths_access'] as $role => $paths) {
      foreach ($paths as $values) {
        $tmp = array();
        if (strpos($values['path'], '%') !== FALSE) {
          $tmp['info'] = '<span class="mono">' . $values['path'] . $module_info . '</span>';
        }
        else {
          $tmp['info'] = '<span class="mono">' . l($values['path'], $values['path']) . $module_info . '</span>';
        }

        $title = '';
        if (isset($def['title'])) {
          $title = '<b>' . $def['title'] . '</b>';
        }
        $description = '';
        if (isset($def['description'])) {
          $description = $def['description'];
        }
        if (isset($def['page callback']) && $def['page callback'] == 'drupal_get_form') {
          $tmp['info'] .= ' (' . t('Form') . ')';
        }

        if (!empty($title) || !empty($description)) {
          $tmp['desc'] = $title . ' ' . $description;
        }

        $list[$role][$values['path']] = $tmp;
      }
    }
  }

  $fieldsets = array();
  $pathlist = array();
  foreach ($list as $role => $paths) {
    foreach ($paths as $path => $info) {
      $pathlist[$role][] = array(
        'info' => $info['info'],
      );
    }

    $fieldsets[$role]['info'] = theme('moduleinfo_fieldset', array(
      'items' => $pathlist[$role],
      'title' => $role,
      'description' => t('These paths are accessible by the role !role', array(
        '!role' => '<span class="mono">' . $role . '</span>',
      ))
    ));
  }

  $description = t('I would like to provide a list of paths who are accessible via role, but there is no standard and some custom access functions not even allow to provide a user object. Therefore only a list of paths is provided by role with a direct role permissions array test.');

  return theme('moduleinfo_fieldset', array(
    'items' => $fieldsets,
    'title' => t('Menu Access by Role'),
    'description' => $description
  ));
}
