<?php

/**
 * @file
 * Plugin who deals with alters functions.
 */

$plugin = array(
  'name' => 'Forms',
  'description' => 'Displays informations about defined forms.',
  'render callbacks' => array(
    '_moduleinfo_forms_defined' => t('Forms'),
  ),
);

/**
 * Renders informations about functions who are alter functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 *
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_forms_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  $result = _moduleinfo_cache_read('def functions', $module_name, $reference_key);
  $result = _moduleinfo_result_reduce($module_name, $result);

  $items = array();
  foreach ($result as $module_name => $cache) {
    foreach ($cache->data as $form => $info) {
      if (!preg_match('/^(' . $module_name . ')_(.*)_form$/i', $form)) {
        continue;
      }

      // I try it, to find out which validators and submitters are involved
      // I can't just fetch all forms I find, because even the color.module has a form
      // which throws a fatal error, because of not providing a correct argument.
      // So I cannot fetch the form array and check for custom validators or submitter
      // callbacks. Sad, but no chance. Therefore I can only check if _validate and _submit
      // are available. And if I find a FORM_ID_alter too.

      $items[$module_name]['forms'][$form] = $info;
    }

    if (isset($items[$module_name]['forms'])) {
      ksort($items[$module_name]['forms']);
    }
  }

  ksort($items);

  return $items;
}

/**
 * Renders informations about functions who are alter functions.
 *
 * @param string $module_name
 *   Name of the module to display.
 *
 * @param array  $items
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_forms_defined_renderer($module_name = NULL, $items = array()) {
  $items = _moduleinfo_result_reduce($module_name, $items);

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $module => $alters) {
    $module_info = '';
    if (is_null($module_name)) {
      $module_info = ' - <span class="description">' . l($module, 'admin/reports/moduleinfo/' . $module) . '</span>';
    }

    foreach ($alters['alters'] as $alter => $values) {
      $list[] = array(
        'info' => '<span class="mono">' . $values['signature'] . $module_info . '</span>',
        'desc' => $values['shortinfo'],
      );
    }
  }

  $description = t('Lists all functions which follow the schema modulename_*_alter.');

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Alters'),
    'description' => $description
  ));
}
