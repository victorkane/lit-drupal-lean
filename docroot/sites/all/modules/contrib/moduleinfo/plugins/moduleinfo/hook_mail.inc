<?php

/**
 * @file
 * Plugin who deals with hook block_info.
 */

$plugin = array(
  'name' => 'Mails',
  'description' => 'Displays all defined hook_mail().',
  'render callbacks' => array(
    '_moduleinfo_hook_mail_defined' => t('Defined Mail Hook'),
    '_moduleinfo_hook_mail_parsed' => t('Defined Drupal Mail Informations'),
  ),
);

/**
 * Renders informations to exposed blocks.
 *
 * @param string $module_name
 *   Name of the module to display.
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_hook_mail_defined($module_name = NULL) {
  $list = module_implements('mail');

  if (!is_null($module_name) && !in_array($module_name, $list)) {
    return '';
  }

  if (!is_null($module_name)) {
    $list = array($module_name);
  }

  $items = array();
  foreach ($list as $module_name) {
    $function = $module_name . '_mail';
    if (!function_exists($function)) {
      continue;
    }

    $items[] = array(
      'info' => '<b class="mono">' . $function . '</b>',
      'desc' => $module_name,
    );
  }

  ksort($items);

  $description = t('Lists all mails defined via hook_mail() of that module.');
  if (is_null($module_name)) {
    $description = t('Lists all mails defined via hook_mail().');
  }

  return _moduleinfo_helper_fieldset($items, array(
    '#title' => t('hook_mail'),
    '#description' => $description,
  ));
}

  /**
   * Renders informations to exposed blocks.
   *
   * @param string $module_name
   *   Name of the module to display.
   *
   * @return string
   *   Rendered informations.
   */
function _moduleinfo_hook_mail_parsed($module_name = NULL) {
  $result = _moduleinfo_cache_read('all functions');

  if (!count($result)) {
    return;
  }
}
