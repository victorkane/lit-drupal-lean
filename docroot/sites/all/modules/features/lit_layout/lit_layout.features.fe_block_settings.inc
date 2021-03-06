<?php
/**
 * @file
 * lit_layout.features.fe_block_settings.inc
 */

/**
 * Implements hook_default_fe_block_settings().
 */
function lit_layout_default_fe_block_settings() {
  $export = array();

  $export['version'] = '2.0';

  $export['lit_blocks-landing_page_options'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'landing_page_options',
    'module' => 'lit_blocks',
    'node_types' => array(),
    'pages' => '<front>',
    'roles' => array(
      'anonymous user' => 1,
    ),
    'themes' => array(
      'litthemezen' => array(
        'region' => 'header',
        'status' => 1,
        'theme' => 'litthemezen',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 1,
  );

  $export['masquerade-masquerade'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'masquerade',
    'module' => 'masquerade',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'litthemezen' => array(
        'region' => 'bottom',
        'status' => 1,
        'theme' => 'litthemezen',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  return $export;
}
