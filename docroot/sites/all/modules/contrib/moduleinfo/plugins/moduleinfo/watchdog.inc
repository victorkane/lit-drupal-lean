<?php

/**
 * @file
 * Plugin who deals with update definitions.
 */

$plugin = array(
  'name' => 'Watchdog',
  'description' => 'Shows grouped by type and severity the amount of watchdog messages.',
  'render callbacks' => array(
    '_moduleinfo_watchdog_grouped' => t('Grouped overview of watchdog messages.'),
  ),
);

/**
 * Collects informations about watchdog.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_watchdog_grouped_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  // First we check if the module_name is in the watchdog
  if (!is_null($module_name)) {
    $result = db_select('watchdog', 'w')
      ->fields('w', array('type'))
      ->condition('type', $module_name)
      ->countQuery()
      ->execute()
      ->fetchField();

    if ($result < 1) {
      return array();
    }
  }

  $result = db_query("
    SELECT type, severity, COUNT(type) as cnt
    FROM {watchdog}
    WHERE 1=1
    GROUP BY type, severity
  ")->fetchAll(PDO::FETCH_ASSOC);

  $items = array();
  foreach ($result as $item) {
    $items[$item['type']][$item['severity']] = $item['cnt'];
  }


  if (isset($module_name) && !isset($items[$module_name])) {
    return array();
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations about watchdog.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_watchdog_grouped_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_watchdog_grouped_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $severity = watchdog_severity_levels();
  $modules = db_select('system', 's')
    ->fields('s', array('name'))
    ->condition('status', 1)
    ->execute()
    ->fetchAllAssoc('name');

  $modules = array_keys($modules);

  $list = array();
  foreach ($items as $module => $watchdogs) {
    $module_info = '';
    if (is_null($module_name)) {
      $name = $module;
      if (in_array($module, $modules)) {
        $name = l($module, 'admin/reports/moduleinfo/' . $module);
      }
      $module_info = ' - <span class="description">' . $name . '</span>';
    }

    foreach ($watchdogs as $watchdog => $value) {
      $list[] = array(
        'info' => '<span class="mono">' . $module . ' - ' . $severity[$watchdog] . ' (' . $value . ')' . $module_info . '</span>',
      );
    }
  }

  $description = t('Lists all watchdog informations for the system. Grouped by severity.');
  if (is_null($module_name)) {
    $description = t('Lists all watchdog informations for that module.');
  }
  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Watchdog'),
    'description' => $description
  ));
}
