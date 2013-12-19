<?php

/**
 * @file
 * Displays results.
 */

/**
 * This action callback sets up a batch to scan all enabled modules on the site.
 *
 * When done, the batch will redirect to the page where it comes
 * from or to the modules page.
 */
function _moduleinfo_action_scan() {
  $modules = system_get_info('module');

  $operations = array();
  $operations[] = array('_moduleinfo_scan_start', array('moduleinfo'));

  // Check if the whole drupal instance shall be scanned for interesting stuff.
  foreach ($modules as $module => $info) {
    $operations[] = array('_moduleinfo_scan', array($module, NULL, 'moduleinfo'));
  }

  $operations[] = array('_moduleinfo_scan_post_process', array('moduleinfo'));

  $batch = array(
    'title' => t('Scanning Modules'),
    'operations' => $operations,
    'init_message' => t('To be accurate, this module scans for hooks. Should only happen once as long as no module in installed or uninstalled.'),
    'file' => drupal_get_path('module', 'moduleinfo') . '/moduleinfo.scan.inc',
  );

  batch_set($batch);
  batch_process('admin/reports/moduleinfo');
}

/**
 * Provides a overview page for a single module.
 *
 * @param string $module_name
 *   Name of a module.
 *
 * @return string
 *   The rendered page.
 */
function _moduleinfo_page_detail($module_name = NULL) {
  drupal_add_js('misc/collapse.js');
  drupal_add_js('misc/form.js');
  drupal_add_css(drupal_get_path('module', 'moduleinfo') . '/moduleinfo.css');

  if (variable_get('moduleinfo_cache_result_pages', MODULEINFO_DEFAULT_CACHE_RESULT) == '1') {
    $cache = cache_get('moduleinfo:result:' . $module_name);
    if ($cache && $cache->data) {
      return $cache->data;
    }
  }

  ctools_include('plugins');
  $plugins = ctools_get_plugins('moduleinfo', 'moduleinfo');

  uasort($plugins, 'element_sort');

  $options = _moduleinfo_plugins_options($plugins);

  $output = '';

  if (!is_null($module_name)) {
    $output .= l(t('Go to full bridview of your installation'), 'admin/reports/moduleinfo');
  }

  $enabled_infos = array_values(variable_get('moduleinfo_informations', array_keys($options)));

  foreach ($plugins as $plugin_name => $plugin) {
    if (!count($plugin['render callbacks'])) {
      continue;
    }

    foreach ($plugin['render callbacks'] as $callback => $trash) {
      if (!in_array($callback, $enabled_infos, TRUE)) {
        continue;
      }

      $callback_collector = $callback . '_collector';
      $callback_renderer  = $callback . '_renderer';

      if (function_exists($callback_collector) && function_exists($callback_renderer)) {
        $items = $callback_collector($module_name, 'moduleinfo');

        if (count($items)) {
          $output .= $callback_renderer($module_name, $items);
        }
      }
    }
  }

  if (variable_get('moduleinfo_cache_result_pages', MODULEINFO_DEFAULT_CACHE_RESULT) == '1') {
    cache_set('moduleinfo:result:' . $module_name, $output);
  }

  if (trim($output) == '') {
    $output .= t("There is no result, which should be almost impossible. Please !config, if you have at least checked a view display settings checkboxes. If non is checked you'll not see any result.", array(
      '!config' => l(t('check the config page here'), 'admin/config/development/moduleinfo'),
    ));
  }

  return $output;
}

/**
 * Displays the PhpDoc of a hook.
 *
 * @param string $function_name
 *   Name of the hook
 * @param string $mode
 *   - function: for display informations about defined functions
 *   - hook: for display informations about hooks
 *
 * @return string
 *   Rendered page
 */
function _moduleinfo_page_info($function_name, $mode = 'function') {
  if ($mode == 'hook') {
    $result = _moduleinfo_cache_read('all hooks');
  }
  else {
    $result = _moduleinfo_cache_read('all functions');
  }

  $api_drupal_org = 'http://api.drupal.org/api/function/!function/7';

  if (!count($result)) {
    drupal_set_message(t('Cache not found. Please scan your Drupal installation first.'));
    drupal_goto();
  }

  $function_list = array_keys($result[0]->data);
  if (!in_array($function_name, $function_list, TRUE)) {
    drupal_set_message(t('No further informations about that @type available.', array(
      '@type' => $mode,
    )));
    drupal_goto();
  }

  $module_name = $result[0]->data[$function_name];

  if ($mode == 'hook') {
    $result = _moduleinfo_cache_read('api hooks', $module_name);
  }
  else {
    $result = _moduleinfo_cache_read('def functions', $module_name);
  }

  if (!count($result)) {
    drupal_set_message(t('No further informations about that @type available.', array(
      '@type' => $mode,
    )));
    drupal_goto();
  }

  $function_info = $result[$module_name]->data[$function_name];

  $api_drupal_org = format_string($api_drupal_org, array('!function' => $function_name));

  $output = '';
  $output .= l(t('Back'), $_GET['destination']) . '&nbsp;|&nbsp;' . l($api_drupal_org, $api_drupal_org) . '<br /><br />';
  $output .= '<pre>';
  $output .= $function_info['doc'] . "\n";
  $output .= $function_info['signature'] . "\n";
  $output .= '</pre>';

  return $output;
}
