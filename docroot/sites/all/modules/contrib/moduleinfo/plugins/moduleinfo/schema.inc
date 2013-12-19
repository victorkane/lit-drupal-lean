<?php

/**
 * @file
 * Plugin who deals with schema definitions.
 */


$plugin = array(
  'name' => 'Schema',
  'description' => 'Shows the current schema definitions for a certain module.',
  'render callbacks' => array(
    '_moduleinfo_schema_defined' => t('Schema as defined by the hook_schema().'),
  ),
);

/**
 * Renders informations about the db schema of a module.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_schema_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  if (is_null($module_name)) {
    $result = _moduleinfo_cache_read('all files', NULL, $reference_key);
    $cache_key = '0';
  }
  else {
    $result = _moduleinfo_cache_read('files', $module_name, $reference_key);
    $cache_key = $module_name;
  }

  $result = _moduleinfo_result_reduce($module_name, $result);

  if (!count($result)) {
    return array();
  }

  $files = $result[$cache_key]->data;

  $items = array();
  foreach ($files as $file => $info) {
    if (!preg_match('/\.install$/ui', $file)) {
      continue;
    }

    if (is_string($info)) {
      $module_name = $info;
    }

    include_once $file;

    $schema_function = $module_name . '_schema';

    if (!function_exists($schema_function)) {
      continue;
    }

    $data = $schema_function();

    ksort($data);

    foreach ($data as $table => $values) {
      $items[$module_name]['schema'][$table] = $values;
    }

    if (isset($items[$module_name]['schema'])) {
      ksort($items[$module_name]['schema']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations about the db schema of a module.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_schema_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_schema_defined_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $tables) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($tables['schema'] as $table => $values) {
      $tmp = array(
        'info' => '<span class="mono">' . $table . $module_info . '</span>',
      );

      $description = '';
      if (isset($values['description'])) {
        $description = $values['description'];
      }

      $fields = '';
      if (isset($values['fields'])) {
        $elems = array();
        foreach ($values['fields'] as $field => $def) {
          $elems[$field] = array(
            'info' => trim('<span class="mono">' . $field . '</span> ' . (isset($def['description']) ? '<span class="info">' . $def['description'] . '</span>' : '')),
          );
        }

        ksort($elems);

        $fields = theme('moduleinfo_itemlist', array('items' => $elems));
      }

      if (!empty($fields) || !empty($description)) {
        $tmp['desc'] = $description . ' ' . $fields;
      }

      $list[] = $tmp;
    }
  }

  $description = t('Lists all tables and fields of this certain module This is the unprocessed and unaltered view at the schema definition array.');
  if (is_null($module_name)) {
    $description = t('Lists all paths defined via hook_schema() unprocessed and unaltered.');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Schema'),
    'description' => $description
  ));
}
