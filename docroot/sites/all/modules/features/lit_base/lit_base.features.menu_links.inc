<?php
/**
 * @file
 * lit_base.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function lit_base_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: user-menu_add-text:node/add/text
  $menu_links['user-menu_add-text:node/add/text'] = array(
    'menu_name' => 'user-menu',
    'link_path' => 'node/add/text',
    'router_path' => 'node/add/text',
    'link_title' => 'Add Text',
    'options' => array(
      'attributes' => array(),
      'identifier' => 'user-menu_add-text:node/add/text',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -50,
    'customized' => 1,
  );
  // Exported menu link: user-menu_log-in:user/login
  $menu_links['user-menu_log-in:user/login'] = array(
    'menu_name' => 'user-menu',
    'link_path' => 'user/login',
    'router_path' => 'user/login',
    'link_title' => 'Log in',
    'options' => array(
      'identifier' => 'user-menu_log-in:user/login',
    ),
    'module' => 'system',
    'hidden' => -1,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 0,
    'parent_identifier' => 'user-menu_my-account:user',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Add Text');
  t('Log in');


  return $menu_links;
}
