<?php
/**
 * @file
 * lit_layout.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function lit_layout_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}
