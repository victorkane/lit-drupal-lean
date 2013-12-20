<?php

/**
 * @file
 * ModuleInfo Settingsform.
 */

/**
 * Form builder for the update settings tab.
 */
function moduleinfo_settings_form($form) {
  $form = array();

  $form['info'] = array(
    '#markup' => t(
      'To be more accurate on the detailspage, this module scans ALL enabled modules for hooks and more. You can !scan_now and check out the !overview page to have the birdview. Head over to the !modules_page to check what a single module offers to your installation.', array(
        '!scan_now' => l(t('scan your installation now'), 'moduleinfo/scan', array('query' => array('destination' => 'admin/config/development/moduleinfo'))),
        '!overview' => l(t('ModuleInfo overview'), 'admin/reports/moduleinfo'),
        '!modules_page' => l(t('Modules'), 'admin/modules'),
      )
    ),
    '#weight' => -10,
  );

  ctools_include('plugins');
  $plugins = ctools_get_plugins('moduleinfo', 'moduleinfo');

  uasort($plugins, 'element_sort');

  $options = _moduleinfo_plugins_options($plugins);

  $form['display_settings'] = array(
    '#type'  => 'fieldset',
    '#title' => t('Display Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#tree' => FALSE,
    '#weight' => 0,
  );

  $form['display_settings']['moduleinfo_informations'] = array(
    '#type' => 'checkboxes',
    '#title' => t('What infos to show?'),
    '#default_value' => variable_get('moduleinfo_informations', array_keys($options)),
    '#options' => $options,
    '#description' => t('Everything not enabled will not be shown. Scanning will always be done, because of possible dependencies.'),
  );

  $form['scan_settings'] = array(
    '#type'  => 'fieldset',
    '#title' => t('Scan Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#tree' => FALSE,
    '#weight' => 1,
  );

  $form['scan_settings']['moduleinfo_filescan_directory_skip'] = array(
    '#type' => 'textarea',
    '#title' => t('Directories to skip'),
    '#default_value' => variable_get('moduleinfo_filescan_directory_skip', MODULEINFO_DEFAULT_DIRECTORY_SKIP),
    '#description' => t('These directories and their subdirectories will be skipped on scanning for useful informations.'),
  );

  $form['scan_settings']['moduleinfo_filescan_extensions'] = array(
    '#type' => 'textarea',
    '#title' => t('File Extensions to scan'),
    '#default_value' => variable_get('moduleinfo_filescan_extensions', MODULEINFO_DEFAULT_EXTENSIONS),
    '#description' => t('Files with these extensions will be scanned. Everything else is ignored.'),
  );

  $form['scan_settings']['moduleinfo_filescan_extensions_filter'] = array(
    '#type' => 'textarea',
    '#title' => t('File Extensions filter out'),
    '#default_value' => variable_get('moduleinfo_filescan_extensions_filter', MODULEINFO_DEFAULT_EXTENSIONS_FILTER),
    '#description' => t('Name only some more specific from the list above. No leading dot. Some features can only be provided, when all files are available for processing.'),
  );

  $form['moduleinfo_cache_result_pages'] = array(
    '#type'  => 'checkbox',
    '#title' => t('Cache resultpages.'),
    '#default_value' => variable_get('moduleinfo_cache_result_pages', MODULEINFO_DEFAULT_CACHE_RESULT),
    '#description' => t('Cache result pages. The cache can be cleared on cache clear all.'),
    '#weight' => 10,
  );

  return system_settings_form($form);
}
