<?php

/**
 * @file
 * Plugin who deals with views definitions.
 */

$plugin = array(
  'name' => 'Views',
  'description' => 'Shows how many and whyt type of views are installed in the system.',
  'render callbacks' => array(
    '_moduleinfo_views_defined' => t('Views, defined and enabled.'),
  ),
);

/**
 * Collects informations about views.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param string $reference_key
 *   The extra key to support different modules working with the ModuleInfo cache.
 *
 * @return array
 *   Array of collected informations.
 */
function _moduleinfo_views_defined_collector($module_name = NULL, $reference_key = 'moduleinfo') {
  if (!module_exists('views')) {
    return array();
  }

  if (!is_null($module_name)) {
    return array();
  }

  $items = views_get_enabled_views();

  ksort($items);

  return $items;
}

/**
 * Renders informations about defined updates.
 *
 * @param string $module_name
 *   Name of the module to display.
 * @param array $items
 *   Array structure created by _moduleinfo_views_defined_collector().
 *
 * @return string
 *   Rendered informations.
 */
function _moduleinfo_views_defined_renderer($module_name = NULL, array $items = array()) {
  if (!module_exists('views')) {
    return '';
  }

  if (!is_null($module_name)) {
    return '';
  }

  if (!count($items)) {
    return '';
  }

  $list = array();
  foreach ($items as $view => $values) {
    $displays = array();
    $display_info = NULL;
    if (count($values->display)) {
      foreach ($values->display as $display_name => $info) {
        $name = $info->display_plugin . ':' . $display_name;
        if ($info->display_plugin == 'page') {
          if (isset($info->display_options['path']) && (strpos($info->display_options['path'], '%') === FALSE)) {
            $name = l($name, $info->display_options['path']);
          }
        }

        $displays[$display_name] = array(
          'info' => trim('<span class="mono">' . $name . '</span> ' . (isset($info->display_title) ? '<span class="info">' . $info->display_title . '</span>' : '')),
        );
      }

      ksort($displays);
      $display_info = theme('moduleinfo_itemlist', array('items' => $displays));
    }

    $list[] = array(
      'info' => '<span class="mono">' . $view . '</span>',
      'desc' => isset($display_info) ? $display_info : '',
    );
  }

  $description = t('Lists all views defined and enabled in the system.');

  return theme('moduleinfo_fieldset', array(
    'items' => $list,
    'title' => t('Views'),
    'description' => $description
  ));
}
