<?php
/**
 * @file
 * lit_base.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function lit_base_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function lit_base_node_info() {
  $items = array(
    'critique' => array(
      'name' => t('Critique'),
      'base' => 'node_content',
      'description' => t('A critique of a given text'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'text' => array(
      'name' => t('Text'),
      'base' => 'node_content',
      'description' => t('A posted text, such as a flash fiction story, poem, any kind of prose, including theoretical pieces. A piece a Workshop member wishes to share in order to receive feedback in the form of critiques.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
