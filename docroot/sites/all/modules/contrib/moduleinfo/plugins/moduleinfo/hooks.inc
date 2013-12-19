<?php

/**
 * @file
 * Plugin who deals with hooks in general.
 */

$plugin = array(
  'name' => 'API Hooks',
  'description' => 'Scans Drupal for defined HOOKs',
  'scan callbacks' => array(
    '_moduleinfo_hooks_scan' => array(
      'scan' => array(
        '/.+\.api\.php$/i',
      ),
      'skip' => array(),
    ),
  ),
  'render callbacks' => array(
    '_moduleinfo_hooks_exposed' => t('Exposed Hooks'),
    '_moduleinfo_hooks_implemented' => t('Implemented Hooks'),
  ),
  'post scan callbacks' => array(
    '_moduleinfo_hooks_post_scan_hook_list',
  ),
  '#weight' => -10,
);

/**
 * Scans api.php files for informations to exposed hooks.
 *
 * Creates a cache with scan_key: 'api hooks'
 *
 * @param string $module_name
 *   Name of the current module
 * @param string $content
 *   Content of the current processed file
 * @param string $uri
 *   URI of the file.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 */
function _moduleinfo_hooks_scan($module_name, $content, $uri, $reference_key = 'moduleinfo') {
  $ref = new PhpReflector($content);
  $ref->parse();
  $symbols = $ref->getResult();

  if (!isset($symbols['defined functions'])) {
    return array();
  }

  $functions = $symbols['defined functions'];

  $record = array();
  foreach ($functions as $i => $function) {
    // We ignore everything what does not start with hook_
    if (strpos($function->name, 'hook_') !== 0) {
      continue;
    }

    $function_name = $function->name;

    $record[$function_name] = array(
      'shortinfo' => $function->doc_short,
      'doc' => $function->doc,
      'name' => $function_name,
      'signature' => $function->signature,
      'line_number' => $function->line_number,
      'type' => strpos($uri, 'modules/') === 0 ? 'core' : 'user',
      'file' => basename($uri),
      'uri' => $uri,
    );
  }

  if (count($record)) {
    _moduleinfo_cache_write('api hooks', $record, $module_name, $reference_key);
  }

  return $record;
}

/**
 * Renders all exposed hooks by module.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return string
 *   Array of collected informations.
 */
function _moduleinfo_hooks_exposed_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $result = _moduleinfo_cache_read('api hooks', $module_name, $reference_key);
  $result = _moduleinfo_result_reduce($module_name, $result);

  if (!count($result)) {
    watchdog('moduleinfo', 'The cache for API HOOKS was empty for module: !module in function: !function.', array(
      '!module' => $module_name,
      '!function' => __FUNCTION__,
    ));

    return array();
  }

  $items = array();
  foreach ($result as $module_name => $cache) {
    foreach ($cache->data as $hook => $info) {
      $items[$module_name]['hooks_exposed'][$hook] = $info;
    }

    if (isset($items[$module_name]['hooks_exposed'])) {
      ksort($items[$module_name]['hooks_exposed']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders all exposed hooks by module.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hooks_exposed_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hooks_exposed_renderer($module_name, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $hooks) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($hooks['hooks_exposed'] as $hook => $values) {
      $list[] = array(
        'info' => '<b class="mono">' . l($values['signature'], 'admin/reports/moduleinfo/info/' . $hook . '/hook', array('query' => array('destination' => $_GET['q']))) . '</b>' . $module_info,
        'desc' => $values['shortinfo'],
      );
    }
  }

  $description = t('Lists all available hooks of that module based on *.api.php files.');
  if (is_null($module_name)) {
    $description = t('Lists all available hooks in the system by all enabled module based on *.api.php files.');
  }

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Exposed Hooks'),
    'description' => $description
  ));
}

/**
 * Renders all implemented hooks by module.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_hooks_implemented_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  if (is_null($module_name)) {
    return array();
  }

  $hooks = _moduleinfo_cache_read('all hooks', NULL, $reference_key);
  $funcs = _moduleinfo_cache_read('def functions', $module_name, $reference_key);

  if (!count($hooks)) {
    watchdog('moduleinfo', 'The cache for API HOOKS was empty for module: !module in function: !function.', array(
      '!module' => $module_name,
      '!function' => __FUNCTION__,
    ));

    return array();
  }

  if (!count($funcs)) {
    watchdog('moduleinfo', 'The cache for DOF FUNCTIONS was empty for module: !module in function: !function.', array(
      '!module' => $module_name,
      '!function' => __FUNCTION__,
    ));

    return array();
  }

  $hook_list = array_keys($hooks['0']->data);
  sort($hook_list);
  $hooks = $hooks['0']->data;
  $func_list = $funcs[$module_name]->data;

  $items = array();
  foreach ($func_list as $function_name => $values) {
    if (strpos($function_name, $module_name) !== 0) {
      continue;
    }

    $hook_name = preg_replace("/^{$module_name}_/i", 'hook_', $function_name);

    // FIXME: All hooks with _DELTA_ or similar stuff in there are skipped at
    // the moment try to come up with a way to get these too.
    if (!in_array($hook_name, $hook_list)) {
      continue;
    }

    $values += array(
      'hook' => $hook_name,
      'hook_provider' => $hooks[$hook_name],
    );

    $items[$module_name]['hooks_implemented'][$function_name] = $values;
  }

  if (isset($items[$module_name]['hooks_implemented'])) {
    ksort($items[$module_name]['hooks_implemented']);
  }

  ksort($items);

  return $items;
}

/**
 * Renders all implemented hooks by module.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_hooks_implemented_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hooks_implemented_renderer($module_name = NULL, array $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $hooks) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($hooks['hooks_implemented'] as $function_name => $values) {
      $list[] = array(
        'info' => '<b class="mono">' . l($values['signature'], 'admin/reports/moduleinfo/info/' . $function_name . '/function', array('query' => array('destination' => $_GET['q']))) . '</b>' . $module_info,
        'desc' => t('Exposed in !module / hook is !hook', array(
          '!module' => '<b class="mono">' . $values['hook_provider'] . '</b>',
          '!hook' => '<b class="mono">' . $values['hook'] .  '</b>',
        )),
      );
    }
  }

  $description = t('Lists all the implemented hooks by that module based on all exposed hooks in the system.');

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Implemented Hooks'),
    'description' => $description
  ));
}

/**
 * Creates a cache for all hooks in one place.
 *
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 */
function _moduleinfo_hooks_post_scan_hook_list($reference_key = 'moduleinfo') {
  $result = _moduleinfo_cache_read('api hooks', NULL, $reference_key);

  if (!count($result)) {
    return array();
  }

  $hooks = array();
  foreach ($result as $module_name => $cache) {
    foreach ($cache->data as $hook_name => $info) {
      $hooks[$hook_name] = $module_name;
    }
  }

  _moduleinfo_cache_write('all hooks', $hooks, NULL, $reference_key);

  return $hooks;
}
