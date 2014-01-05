<?php
/**
 * @file
 * lit_base.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function lit_base_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'access content'.
  $permissions['access content'] = array(
    'name' => 'access content',
    'roles' => array(
      'administrator' => 'administrator',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create critique content'.
  $permissions['create critique content'] = array(
    'name' => 'create critique content',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create text content'.
  $permissions['create text content'] = array(
    'name' => 'create text content',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any critique content'.
  $permissions['delete any critique content'] = array(
    'name' => 'delete any critique content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any text content'.
  $permissions['delete any text content'] = array(
    'name' => 'delete any text content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own critique content'.
  $permissions['delete own critique content'] = array(
    'name' => 'delete own critique content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own text content'.
  $permissions['delete own text content'] = array(
    'name' => 'delete own text content',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any critique content'.
  $permissions['edit any critique content'] = array(
    'name' => 'edit any critique content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any text content'.
  $permissions['edit any text content'] = array(
    'name' => 'edit any text content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own critique content'.
  $permissions['edit own critique content'] = array(
    'name' => 'edit own critique content',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own text content'.
  $permissions['edit own text content'] = array(
    'name' => 'edit own text content',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'show format selection for node'.
  $permissions['show format selection for node'] = array(
    'name' => 'show format selection for node',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'better_formats',
  );

  // Exported permission: 'show format tips'.
  $permissions['show format tips'] = array(
    'name' => 'show format tips',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'better_formats',
  );

  // Exported permission: 'show more format tips link'.
  $permissions['show more format tips link'] = array(
    'name' => 'show more format tips link',
    'roles' => array(
      'administrator' => 'administrator',
      'workshop member' => 'workshop member',
    ),
    'module' => 'better_formats',
  );

  // Exported permission: 'use text format filtered_html'.
  $permissions['use text format filtered_html'] = array(
    'name' => 'use text format filtered_html',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'filter',
  );

  // Exported permission: 'use text format full_html'.
  $permissions['use text format full_html'] = array(
    'name' => 'use text format full_html',
    'roles' => array(
      'administrator' => 'administrator',
      'demo user' => 'demo user',
      'workshop member' => 'workshop member',
    ),
    'module' => 'filter',
  );

  return $permissions;
}
