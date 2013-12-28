<?php
/**
 * @file
 * lit_layout.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function lit_layout_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: menu-footer-menu_about:node/21
  $menu_links['menu-footer-menu_about:node/21'] = array(
    'menu_name' => 'menu-footer-menu',
    'link_path' => 'node/21',
    'router_path' => 'node/%',
    'link_title' => 'About',
    'options' => array(
      'attributes' => array(
        'class' => array(
          0 => 'footer-menu-item',
        ),
      ),
      'identifier' => 'menu-footer-menu_about:node/21',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 1,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('About');


  return $menu_links;
}
