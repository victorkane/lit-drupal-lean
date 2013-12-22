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
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create critique content'.
  $permissions['create critique content'] = array(
    'name' => 'create critique content',
    'roles' => array(
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create text content'.
  $permissions['create text content'] = array(
    'name' => 'create text content',
    'roles' => array(
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any critique content'.
  $permissions['delete any critique content'] = array(
    'name' => 'delete any critique content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete any text content'.
  $permissions['delete any text content'] = array(
    'name' => 'delete any text content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete own critique content'.
  $permissions['delete own critique content'] = array(
    'name' => 'delete own critique content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'delete own text content'.
  $permissions['delete own text content'] = array(
    'name' => 'delete own text content',
    'roles' => array(
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any critique content'.
  $permissions['edit any critique content'] = array(
    'name' => 'edit any critique content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit any text content'.
  $permissions['edit any text content'] = array(
    'name' => 'edit any text content',
    'roles' => array(),
    'module' => 'node',
  );

  // Exported permission: 'edit own critique content'.
  $permissions['edit own critique content'] = array(
    'name' => 'edit own critique content',
    'roles' => array(
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own text content'.
  $permissions['edit own text content'] = array(
    'name' => 'edit own text content',
    'roles' => array(
      'workshop member' => 'workshop member',
    ),
    'module' => 'node',
  );

  return $permissions;
}
