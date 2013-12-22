<?php
/**
 * @file
 * lit_base.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function lit_base_user_default_roles() {
  $roles = array();

  // Exported role: workshop member.
  $roles['workshop member'] = array(
    'name' => 'workshop member',
    'weight' => 11,
  );

  return $roles;
}
