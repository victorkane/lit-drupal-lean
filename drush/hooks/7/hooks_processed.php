a:47:{s:10:"admin_menu";a:5:{s:19:"hook_admin_menu_map";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_admin_menu_map";s:10:"definition";s:30:"function hook_admin_menu_map()";s:11:"description";s:51:"Provide expansion arguments for dynamic menu items.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"admin_menu";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/admin_menu.api.php";s:4:"body";s:500:"
  // Expand content types below Structure > Content types.
  // The key denotes the dynamic path to expand to multiple menu items.
  $map['admin/structure/types/manage/%node_type'] = array(
    // Link generated items directly to the "Content types" item.
    'parent' => 'admin/structure/types',
    // Create expansion arguments for the '%node_type' placeholder.
    'arguments' => array(
      array(
        '%node_type' => array_keys(node_type_get_types()),
      ),
    ),
  );
  return $map;
";}s:28:"hook_admin_menu_output_build";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_admin_menu_output_build";s:10:"definition";s:48:"function hook_admin_menu_output_build(&$content)";s:11:"description";s:61:"Add to the administration menu content before it is rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"admin_menu";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/admin_menu.api.php";s:4:"body";s:1158:"
  // In case your implementation provides a configurable component, check
  // whether the component should be displayed:
  if (empty($content['#components']['shortcut.links']) && !$content['#complete']) {
    return;
  }

  // Add new top-level item to the menu.
  if (isset($content['menu'])) {
    $content['menu']['myitem'] = array(
      '#title' => t('My item'),
      // #attributes are used for list items (LI).
      '#attributes' => array('class' => array('mymodule-myitem')),
      '#href' => 'mymodule/path',
      // #options are passed to l().
      '#options' => array(
        'query' => drupal_get_destination(),
        // Apply a class on the link (anchor).
        'attributes' => array('class' => array('myitem-link-anchor')),
      ),
      // #weight controls the order of links in the resulting item list.
      '#weight' => 50,
    );
  }
  // Add link to the icon menu to manually run cron.
  if (isset($content['icon'])) {
    $content['icon']['myitem']['cron'] = array(
      '#title' => t('Run cron'),
      '#access' => user_access('administer site configuration'),
      '#href' => 'admin/reports/status/run-cron',
    );
  }
";}s:28:"hook_admin_menu_output_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_admin_menu_output_alter";s:10:"definition";s:48:"function hook_admin_menu_output_alter(&$content)";s:11:"description";s:61:"Change the administration menu content before it is rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"admin_menu";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/admin_menu.api.php";s:4:"body";s:1:"
";}s:28:"hook_admin_menu_replacements";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_admin_menu_replacements";s:10:"definition";s:48:"function hook_admin_menu_replacements($complete)";s:11:"description";s:62:"Return content to be replace via JS in the cached menu output.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"admin_menu";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/admin_menu.api.php";s:4:"body";s:526:"
  $items = array();
  // If the complete menu is output, then it is uncached and will contain the
  // current counts already.
  if (!$complete) {
    // Check whether the users count component is enabled.
    $components = variable_get('admin_menu_components', array());
    if (!empty($components['admin_menu.users']) && ($user_count = admin_menu_get_user_count())) {
      // Replace the counters in the cached menu output with current counts.
      $items['.admin-menu-users a'] = $user_count;
    }
  }
  return $items;
";}s:26:"hook_admin_menu_cache_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_admin_menu_cache_info";s:10:"definition";s:37:"function hook_admin_menu_cache_info()";s:11:"description";s:67:"Inform about additional module-specific caches that can be cleared.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"admin_menu";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/admin_menu.api.php";s:4:"body";s:127:"
  $caches['update'] = array(
    'title' => t('Update data'),
    'callback' => '_update_cache_clear',
  );
  return $caches;
";}}s:10:"aggregator";a:7:{s:21:"hook_aggregator_fetch";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_aggregator_fetch";s:10:"definition";s:37:"function hook_aggregator_fetch($feed)";s:11:"description";s:52:"Create an alternative fetcher for aggregator.module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"aggregator";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/aggregator.api.php";s:4:"body";s:54:"
  $feed->source_string = mymodule_fetch($feed->url);
";}s:26:"hook_aggregator_fetch_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_aggregator_fetch_info";s:10:"definition";s:37:"function hook_aggregator_fetch_info()";s:11:"description";s:56:"Specify the title and short description of your fetcher.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"aggregator";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/aggregator.api.php";s:4:"body";s:134:"
  return array(
    'title' => t('Default fetcher'),
    'description' => t('Default fetcher for resources available by URL.'),
  );
";}s:21:"hook_aggregator_parse";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_aggregator_parse";s:10:"definition";s:37:"function hook_aggregator_parse($feed)";s:11:"description";s:51:"Create an alternative parser for aggregator module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"aggregator";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/aggregator.api.php";s:4:"body";s:120:"
  if ($items = mymodule_parse($feed->source_string)) {
    $feed->items = $items;
    return TRUE;
  }
  return FALSE;
";}s:26:"hook_aggregator_parse_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_aggregator_parse_info";s:10:"definition";s:37:"function hook_aggregator_parse_info()";s:11:"description";s:55:"Specify the title and short description of your parser.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"aggregator";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/aggregator.api.php";s:4:"body";s:129:"
  return array(
    'title' => t('Default parser'),
    'description' => t('Default parser for RSS, Atom and RDF feeds.'),
  );
";}s:23:"hook_aggregator_process";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_aggregator_process";s:10:"definition";s:39:"function hook_aggregator_process($feed)";s:11:"description";s:41:"Create a processor for aggregator.module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"aggregator";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/aggregator.api.php";s:4:"body";s:67:"
  foreach ($feed->items as $item) {
    mymodule_save($item);
  }
";}s:28:"hook_aggregator_process_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_aggregator_process_info";s:10:"definition";s:39:"function hook_aggregator_process_info()";s:11:"description";s:58:"Specify the title and short description of your processor.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"aggregator";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/aggregator.api.php";s:4:"body";s:131:"
  return array(
    'title' => t('Default processor'),
    'description' => t('Creates lightweight records of feed items.'),
  );
";}s:22:"hook_aggregator_remove";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_aggregator_remove";s:10:"definition";s:38:"function hook_aggregator_remove($feed)";s:11:"description";s:24:"Remove stored feed data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"aggregator";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/aggregator.api.php";s:4:"body";s:38:"
  mymodule_remove_items($feed->fid);
";}}s:5:"block";a:8:{s:15:"hook_block_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_block_info";s:10:"definition";s:26:"function hook_block_info()";s:11:"description";s:41:"Define all blocks provided by the module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:15:"hook_block_info";}s:5:"group";s:5:"block";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/block.api.php";s:4:"body";s:276:"
  // This example comes from node.module.
  $blocks['syndicate'] = array(
    'info' => t('Syndicate'),
    'cache' => DRUPAL_NO_CACHE
  );

  $blocks['recent'] = array(
    'info' => t('Recent content'),
    // DRUPAL_CACHE_PER_ROLE will be assumed.
  );

  return $blocks;
";}s:21:"hook_block_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_block_info_alter";s:10:"definition";s:62:"function hook_block_info_alter(&$blocks, $theme, $code_blocks)";s:11:"description";s:54:"Change block definition before saving to the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:15:"hook_block_info";}s:5:"group";s:5:"block";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/block.api.php";s:4:"body";s:73:"
  // Disable the login block.
  $blocks['user']['login']['status'] = 0;
";}s:20:"hook_block_configure";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_block_configure";s:10:"definition";s:42:"function hook_block_configure($delta = '')";s:11:"description";s:40:"Define a configuration form for a block.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:15:"hook_block_info";}s:5:"group";s:5:"block";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/block.api.php";s:4:"body";s:448:"
  // This example comes from node.module.
  $form = array();
  if ($delta == 'recent') {
    $form['node_recent_block_count'] = array(
      '#type' => 'select',
      '#title' => t('Number of recent content items to display'),
      '#default_value' => variable_get('node_recent_block_count', 10),
      '#options' => drupal_map_assoc(array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 25, 30)),
    );
  }
  return $form;
";}s:15:"hook_block_save";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_block_save";s:10:"definition";s:54:"function hook_block_save($delta = '', $edit = array())";s:11:"description";s:59:"Save the configuration options from hook_block_configure().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:15:"hook_block_info";}s:5:"group";s:5:"block";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/block.api.php";s:4:"body";s:154:"
  // This example comes from node.module.
  if ($delta == 'recent') {
    variable_set('node_recent_block_count', $edit['node_recent_block_count']);
  }
";}s:15:"hook_block_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_block_view";s:10:"definition";s:37:"function hook_block_view($delta = '')";s:11:"description";s:48:"Return a rendered or renderable view of a block.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:15:"hook_block_info";}s:5:"group";s:5:"block";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/block.api.php";s:4:"body";s:757:"
  // This example is adapted from node.module.
  $block = array();

  switch ($delta) {
    case 'syndicate':
      $block['subject'] = t('Syndicate');
      $block['content'] = array(
        '#theme' => 'feed_icon',
        '#url' => 'rss.xml',
        '#title' => t('Syndicate'),
      );
      break;

    case 'recent':
      if (user_access('access content')) {
        $block['subject'] = t('Recent content');
        if ($nodes = node_get_recent(variable_get('node_recent_block_count', 10))) {
          $block['content'] = array(
            '#theme' => 'node_recent_block',
            '#nodes' => $nodes,
          );
        } else {
          $block['content'] = t('No content available.');
        }
      }
      break;
  }
  return $block;
";}s:21:"hook_block_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_block_view_alter";s:10:"definition";s:46:"function hook_block_view_alter(&$data, $block)";s:11:"description";s:46:"Perform alterations to the content of a block.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:15:"hook_block_info";}s:5:"group";s:5:"block";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/block.api.php";s:4:"body";s:469:"
  // Remove the contextual links on all blocks that provide them.
  if (is_array($data['content']) && isset($data['content']['#contextual_links'])) {
    unset($data['content']['#contextual_links']);
  }
  // Add a theme wrapper function defined by the current module to all blocks
  // provided by the "somemodule" module.
  if (is_array($data['content']) && $block->module == 'somemodule') {
    $data['content']['#theme_wrappers'][] = 'mymodule_special_block';
  }
";}s:34:"hook_block_view_MODULE_DELTA_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_block_view_MODULE_DELTA_alter";s:10:"definition";s:59:"function hook_block_view_MODULE_DELTA_alter(&$data, $block)";s:11:"description";s:40:"Perform alterations to a specific block.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:15:"hook_block_info";}s:5:"group";s:5:"block";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/block.api.php";s:4:"body";s:377:"
  // This code will only run for a specific block. For example, if MODULE_DELTA
  // in the function definition above is set to "mymodule_somedelta", the code
  // will only run on the "somedelta" block provided by the "mymodule" module.

  // Change the title of the "somedelta" block provided by the "mymodule"
  // module.
  $data['subject'] = t('New title of the block');
";}s:21:"hook_block_list_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_block_list_alter";s:10:"definition";s:40:"function hook_block_list_alter(&$blocks)";s:11:"description";s:33:"Act on blocks prior to rendering.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:15:"hook_block_info";}s:5:"group";s:5:"block";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/block.api.php";s:4:"body";s:1102:"
  global $language, $theme_key;

  // This example shows how to achieve language specific visibility setting for
  // blocks.

  $result = db_query('SELECT module, delta, language FROM {my_table}');
  $block_languages = array();
  foreach ($result as $record) {
    $block_languages[$record->module][$record->delta][$record->language] = TRUE;
  }

  foreach ($blocks as $key => $block) {
    // Any module using this alter should inspect the data before changing it,
    // to ensure it is what they expect.
    if (!isset($block->theme) || !isset($block->status) || $block->theme != $theme_key || $block->status != 1) {
      // This block was added by a contrib module, leave it in the list.
      continue;
    }

    if (!isset($block_languages[$block->module][$block->delta])) {
      // No language setting for this block, leave it in the list.
      continue;
    }

    if (!isset($block_languages[$block->module][$block->delta][$language->language])) {
      // This block should not be displayed with the active language, remove
      // from the list.
      unset($blocks[$key]);
    }
  }
";}}s:5:"coder";a:13:{s:12:"hook_reviews";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:12:"hook_reviews";s:10:"definition";s:23:"function hook_reviews()";s:11:"description";s:47:"Perform a custom review on a module or a theme.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:60:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_review.api.php";s:4:"body";s:43:"
  $review = array(
  );
  return $review;
";}s:17:"hook_upgrade_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_upgrade_info";s:10:"definition";s:28:"function hook_upgrade_info()";s:11:"description";s:50:"Declares upgrade sets for an API (or set of APIs).";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:272:"
  $upgrade = array(
    'title' => t('Your module API changes from 6.x to 7.x'),
    'link' => 'http://...',
    'module' => 'your_module_name',
    'files' => array(
      'upgrades/your_module_name.upgrade',
    ),
  );
  return array('your_upgrade_name' => $upgrade);
";}s:37:"hook_upgrade_call_FUNCTION_NAME_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_upgrade_call_FUNCTION_NAME_alter";s:10:"definition";s:64:"function hook_upgrade_call_FUNCTION_NAME_alter(&$node, &$reader)";s:11:"description";s:48:"Alters a function call using the grammar parser.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:236:"
  // Get the function call object.
  $item = &$node->data;

  // Change the function name.
  $item->name['value'] = 'new_name';

  if ($item->parameterCount() > 0) {
    // Delete the first parameter.
    $item->deleteParameter();
  }
";}s:23:"hook_upgrade_call_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_upgrade_call_alter";s:10:"definition";s:57:"function hook_upgrade_call_alter(&$node, &$reader, $name)";s:11:"description";s:47:"Alters function calls using the grammar parser.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:203:"
  // Get the function call object.
  $item = &$node->data;

  // Modify the function call.
  switch ($name) {
    case 'foo':
      $item->deleteParameter();
      break;

    default:
      break;
  }
";}s:33:"hook_upgrade_hook_HOOK_NAME_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_upgrade_hook_HOOK_NAME_alter";s:10:"definition";s:60:"function hook_upgrade_hook_HOOK_NAME_alter(&$node, &$reader)";s:11:"description";s:48:"Alters a hook function using the grammar parser.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:540:"
  global $_coder_upgrade_module_name;

  // Get the function object.
  $item = &$node->data;

  // Rename the function.
  $item->name = $_coder_upgrade_module_name . '_new_hook_name';
  // Update the document comment.
  $item->comment['value'] = preg_replace('@\* Implement\s+@', "* Implements ", $item->comment['value']);

  if ($item->parameterCount() > 1) {
    // Switch the first two parameters.
    $p0 = $item->getParameter(0);
    $p1 = $item->getParameter(1);
    $item->setParameter(0, $p1);
    $item->setParameter(1, $p0);
  }
";}s:23:"hook_upgrade_hook_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_upgrade_hook_alter";s:10:"definition";s:58:"function hook_upgrade_hook_alter(&$node, &$reader, &$hook)";s:11:"description";s:47:"Alters hook functions using the grammar parser.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:700:"
  global $_coder_upgrade_module_name;

  // Get the function object.
  $item = &$node->data;

  // Modify hook function.
  switch ($hook) {
    case 'old_hook_name':
      // Rename the function.
      $item->name = $_coder_upgrade_module_name . '_new_hook_name';
      // Update the document comment.
      $item->comment['value'] = preg_replace('@\* Implement\s+@', "* Implements ", $item->comment['value']);

      if ($item->parameterCount() > 1) {
        // Switch the first two parameters.
        $p0 = $item->getParameter(0);
        $p1 = $item->getParameter(1);
        $item->setParameter(0, $p1);
        $item->setParameter(1, $p0);
      }
      break;

    default:
      break;
  }
";}s:23:"hook_upgrade_file_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_upgrade_file_alter";s:10:"definition";s:42:"function hook_upgrade_file_alter(&$reader)";s:11:"description";s:44:"Alters a code file using the grammar parser.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:1291:"
  /*
   * Task: Modify calls to class methods.
   */

  // Get list of function calls (including the calls to class methods).
  $nodes = &$reader->getFunctionCalls();
  // Loop on list.
  foreach ($nodes as &$node) {
    // Get the function call object.
    $item = &$node->data;
    if (!isset($item) || !is_object($item) || !($item instanceof PGPFunctionCall) || $item->type != T_FUNCTION_CALL) {
      /*
       * These checks are necessary as the reference (i.e. $item) could have
       * been changed in another routine so that it no longer refers to a
       * function call object.
       */
      continue;
    }

    /*
     * To be a call to a class method, the function name must be an expression
     * like $this->foo() as opposed to a string or a single variable. This code
     * checks the name is an expression (using is_a($item->name, 'PGPOperand'))
     * and the value element of the name object is '$this'.
     *
     * Review the grammar structure object using $item->print_r().
     */
    if ($item->name instanceof PGPOperand && $item->name->findNode('value') == '$this') {
      // Strip '$this->' from the name.
      $name = substr($item->name->toString(), 7);
      // Modify the function call
      my_module_convert_method($item, $reader, $name);
    }
  }
";}s:33:"hook_upgrade_parser_install_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_upgrade_parser_install_alter";s:10:"definition";s:52:"function hook_upgrade_parser_install_alter(&$reader)";s:11:"description";s:48:"Alters an install file using the grammar parser.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:32:"
  // Do something to the file.
";}s:24:"hook_upgrade_begin_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_upgrade_begin_alter";s:10:"definition";s:40:"function hook_upgrade_begin_alter($item)";s:11:"description";s:60:"Processes the directory before upgrade routines are applied.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:20:"
  // Do something.
";}s:22:"hook_upgrade_end_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_upgrade_end_alter";s:10:"definition";s:41:"function hook_upgrade_end_alter($dirname)";s:11:"description";s:59:"Processes the directory after upgrade routines are applied.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:20:"
  // Do something.
";}s:24:"hook_upgrade_regex_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_upgrade_regex_alter";s:10:"definition";s:41:"function hook_upgrade_regex_alter(&$file)";s:11:"description";s:57:"Alters the text of a code file using regular expressions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:321:"
  $hook = 'your_changes'; // Used as the label in the log file.
  $cur = $file;
  $new = $cur;

  $from = array();
  $to = array();

  // Do something to $file.
  $from[] = '/(your_module_name)/';
  $to[] = "$1";

  coder_upgrade_do_conversions($from, $to, $new);
  coder_upgrade_save_changes($cur, $new, $file, $hook);
";}s:29:"hook_upgrade_regex_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_upgrade_regex_info_alter";s:10:"definition";s:46:"function hook_upgrade_regex_info_alter(&$file)";s:11:"description";s:58:"Alters the text of an info file using regular expressions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:339:"
  $hook = 'info_file'; // Used as the label in the log file.
  $cur = $file;
  $new = $cur;

  $from = array();
  $to = array();

  // Info file should specify core = 7.x.
  $from[] = '@^core\s+=\s+.*?$@m';
  $to[] = 'core = 7.x';

  coder_upgrade_do_conversions($from, $to, $new);
  coder_upgrade_save_changes($cur, $new, $file, $hook);
";}s:32:"hook_upgrade_regex_install_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_upgrade_regex_install_alter";s:10:"definition";s:49:"function hook_upgrade_regex_install_alter(&$file)";s:11:"description";s:61:"Alters the text of an install file using regular expressions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"coder";s:9:"file_path";s:61:"/home/lit/lit-dev/.git/../drush/hooks/7/coder_upgrade.api.php";s:4:"body";s:318:"
  $hook = 'info_file'; // Used as the label in the log file.
  $cur = $file;
  $new = $cur;

  $from = array();
  $to = array();

  // Do something to $file.
  $from[] = '/(your_module_name)/';
  $to[] = "$1";

  coder_upgrade_do_conversions($from, $to, $new);
  coder_upgrade_save_changes($cur, $new, $file, $hook);
";}}s:7:"comment";a:9:{s:20:"hook_comment_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_comment_presave";s:10:"definition";s:39:"function hook_comment_presave($comment)";s:11:"description";s:55:"The comment passed validation and is about to be saved.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:112:"
  // Remove leading & trailing spaces from the comment subject.
  $comment->subject = trim($comment->subject);
";}s:19:"hook_comment_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_comment_insert";s:10:"definition";s:38:"function hook_comment_insert($comment)";s:11:"description";s:30:"The comment is being inserted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:84:"
  // Reindex the node when comments are added.
  search_touch_node($comment->nid);
";}s:19:"hook_comment_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_comment_update";s:10:"definition";s:38:"function hook_comment_update($comment)";s:11:"description";s:29:"The comment is being updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:86:"
  // Reindex the node when comments are updated.
  search_touch_node($comment->nid);
";}s:17:"hook_comment_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_comment_load";s:10:"definition";s:37:"function hook_comment_load($comments)";s:11:"description";s:44:"Comments are being loaded from the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:205:"
  $result = db_query('SELECT cid, foo FROM {mytable} WHERE cid IN (:cids)', array(':cids' => array_keys($comments)));
  foreach ($result as $record) {
    $comments[$record->cid]->foo = $record->foo;
  }
";}s:17:"hook_comment_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_comment_view";s:10:"definition";s:59:"function hook_comment_view($comment, $view_mode, $langcode)";s:11:"description";s:104:"The comment is being viewed. This hook can be used to add additional data to the comment before theming.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:80:"
  // how old is the comment
  $comment->time_ago = time() - $comment->changed;
";}s:23:"hook_comment_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_comment_view_alter";s:10:"definition";s:41:"function hook_comment_view_alter(&$build)";s:11:"description";s:68:"The comment was built; the module may modify the structured content.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:368:"
  // Check for the existence of a field added by another module.
  if ($build['#view_mode'] == 'full' && isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;
  }

  // Add a #post_render callback to act on the rendered HTML of the comment.
  $build['#post_render'][] = 'my_module_comment_post_render';
";}s:20:"hook_comment_publish";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_comment_publish";s:10:"definition";s:39:"function hook_comment_publish($comment)";s:11:"description";s:48:"The comment is being published by the moderator.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:106:"
  drupal_set_message(t('Comment: @subject has been published', array('@subject' => $comment->subject)));
";}s:22:"hook_comment_unpublish";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_comment_unpublish";s:10:"definition";s:41:"function hook_comment_unpublish($comment)";s:11:"description";s:50:"The comment is being unpublished by the moderator.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:108:"
  drupal_set_message(t('Comment: @subject has been unpublished', array('@subject' => $comment->subject)));
";}s:19:"hook_comment_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_comment_delete";s:10:"definition";s:38:"function hook_comment_delete($comment)";s:11:"description";s:46:"The comment is being deleted by the moderator.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"comment";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/comment.api.php";s:4:"body";s:104:"
  drupal_set_message(t('Comment: @subject has been deleted', array('@subject' => $comment->subject)));
";}}s:10:"contextual";a:1:{s:32:"hook_contextual_links_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_contextual_links_view_alter";s:10:"definition";s:60:"function hook_contextual_links_view_alter(&$element, $items)";s:11:"description";s:55:"Alter a contextual links element before it is rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"contextual";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/contextual.api.php";s:4:"body";s:143:"
  // Add another class to all contextual link lists to facilitate custom
  // styling.
  $element['#attributes']['class'][] = 'custom-class';
";}}s:6:"ctools";a:14:{s:23:"hook_ctools_plugin_type";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_ctools_plugin_type";s:10:"definition";s:34:"function hook_ctools_plugin_type()";s:11:"description";s:33:"Inform CTools about plugin types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:84:"
  $plugins['my_type'] = array(
    'load themes' => TRUE,
  );

  return $plugins;
";}s:28:"hook_ctools_plugin_directory";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_ctools_plugin_directory";s:10:"definition";s:59:"function hook_ctools_plugin_directory($owner, $plugin_type)";s:11:"description";s:76:"This hook is used to inform the CTools plugin system about the location of a";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:1256:"
  // Form 1 - for a module implementing only the 'content_types' plugin owned
  // by CTools, this would cause the plugin system to search the
  // <moduleroot>/plugins/content_types directory for .inc plugin files.
  if ($owner == 'ctools' && $plugin_type == 'content_types') {
    return 'plugins/content_types';
  }

  // Form 2 - if your module implements only Panels plugins, and has 'layouts'
  // and 'styles' plugins but no 'cache' or 'display_renderers', it is OK to be
  // lazy and return a directory for a plugin you don't actually implement (so
  // long as that directory doesn't exist). This lets you avoid ugly in_array()
  // logic in your conditional, and also makes it easy to add plugins of those
  // types later without having to change this hook implementation.
  if ($owner == 'panels') {
    return "plugins/$plugin_type";
  }

  // Form 3 - CTools makes no assumptions about where your plugins are located,
  // so you still have to implement this hook even for plugins created by your
  // own module.
  if ($owner == 'mymodule') {
    // Yes, this is exactly like Form 2 - just a different reasoning for it.
    return "plugins/$plugin_type";
  }
  // Finally, if nothing matches, it's safe to return nothing at all (or NULL).
";}s:28:"hook_ctools_plugin_pre_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_ctools_plugin_pre_alter";s:10:"definition";s:55:"function hook_ctools_plugin_pre_alter(&$plugin, &$info)";s:11:"description";s:44:"Alter a plugin before it has been processed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:127:"
  // Override a function defined by the plugin.
  if ($info['type'] == 'my_type') {
    $plugin['my_flag'] = 'new_value';
  }
";}s:29:"hook_ctools_plugin_post_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_ctools_plugin_post_alter";s:10:"definition";s:56:"function hook_ctools_plugin_post_alter(&$plugin, &$info)";s:11:"description";s:43:"Alter a plugin after it has been processed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:134:"
  // Override a function defined by the plugin.
  if ($info['type'] == 'my_type') {
    $plugin['my_function'] = 'new_function';
  }
";}s:26:"hook_ctools_api_hook_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_ctools_api_hook_alter";s:10:"definition";s:43:"function hook_ctools_api_hook_alter(&$list)";s:11:"description";s:63:"Alter the list of modules/themes which implement a certain api.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:110:"
  // Alter the path of the node implementation.
  $list['node']['path'] = drupal_get_path('module', 'node');
";}s:43:"hook_ctools_math_expression_functions_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:43:"hook_ctools_math_expression_functions_alter";s:10:"definition";s:65:"function hook_ctools_math_expression_functions_alter(&$functions)";s:11:"description";s:71:"Alter the available functions to be used in ctools math expression api.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:76:"
  // Allow to convert from degrees to radiant.
  $functions[] = 'deg2rad';
";}s:24:"hook_ctools_render_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_ctools_render_alter";s:10:"definition";s:60:"function hook_ctools_render_alter(&$info, &$page, &$context)";s:11:"description";s:17:"Alter everything.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:108:"
  if ($context['handler']->name == 'my_handler') {
    ctools_add_css('my_module.theme', 'my_module');
  }
";}s:33:"hook_ctools_content_subtype_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_ctools_content_subtype_alter";s:10:"definition";s:61:"function hook_ctools_content_subtype_alter($subtype, $plugin)";s:11:"description";s:31:"Alter a content plugin subtype.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:35:"
  $subtype['render last'] = TRUE;
";}s:32:"hook_ctools_entity_context_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_ctools_entity_context_alter";s:10:"definition";s:73:"function hook_ctools_entity_context_alter(&$plugin, &$entity, $plugin_id)";s:11:"description";s:49:"Alter the definition of an entity context plugin.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:285:"
  ctools_include('context');
  switch ($plugin_id) {
    case 'entity_id:taxonomy_term':
      $plugin['no ui'] = TRUE;
    case 'entity:user':
      $plugin = ctools_get_context('user');
      unset($plugin['no ui']);
      unset($plugin['no required context ui']);
      break;
  }
";}s:33:"hook_ctools_entity_contexts_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_ctools_entity_contexts_alter";s:10:"definition";s:53:"function hook_ctools_entity_contexts_alter(&$plugins)";s:11:"description";s:47:"Alter the definition of entity context plugins.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:56:"
  $plugins['entity_id:taxonomy_term']['no ui'] = TRUE;
";}s:29:"hook_ctools_cleanstring_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_ctools_cleanstring_alter";s:10:"definition";s:50:"function hook_ctools_cleanstring_alter(&$settings)";s:11:"description";s:28:"Change cleanstring settings.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:75:"
  // Convert all strings to lower case.
  $settings['lower case'] = TRUE;
";}s:38:"hook_ctools_cleanstring_CLEAN_ID_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:38:"hook_ctools_cleanstring_CLEAN_ID_alter";s:10:"definition";s:59:"function hook_ctools_cleanstring_CLEAN_ID_alter(&$settings)";s:11:"description";s:52:"Change cleanstring settings for a specific clean ID.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/ctools.api.php";s:4:"body";s:75:"
  // Convert all strings to lower case.
  $settings['lower case'] = TRUE;
";}s:34:"hook_page_manager_operations_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_page_manager_operations_alter";s:10:"definition";s:61:"function hook_page_manager_operations_alter(&$result, &$page)";s:11:"description";s:6:"@todo.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:60:"/home/lit/lit-dev/.git/../drush/hooks/7/page_manager.api.php";s:4:"body";s:13:"
  // @todo.
";}s:42:"hook_page_manager_variant_operations_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:42:"hook_page_manager_variant_operations_alter";s:10:"definition";s:76:"function hook_page_manager_variant_operations_alter(&$operations, &$handler)";s:11:"description";s:6:"@todo.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"ctools";s:9:"file_path";s:60:"/home/lit/lit-dev/.git/../drush/hooks/7/page_manager.api.php";s:4:"body";s:13:"
  // @todo.
";}}s:9:"dashboard";a:2:{s:22:"hook_dashboard_regions";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_dashboard_regions";s:10:"definition";s:33:"function hook_dashboard_regions()";s:11:"description";s:29:"Add regions to the dashboard.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:9:"dashboard";s:9:"file_path";s:57:"/home/lit/lit-dev/.git/../drush/hooks/7/dashboard.api.php";s:4:"body";s:257:"
  // Define a new dashboard region. Your module can also then define
  // theme_mymodule_dashboard_region() as a theme wrapper function to control
  // the region's appearance.
  return array('mymodule_dashboard_region' => "My module's dashboard region");
";}s:28:"hook_dashboard_regions_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_dashboard_regions_alter";s:10:"definition";s:47:"function hook_dashboard_regions_alter($regions)";s:11:"description";s:44:"Alter dashboard regions provided by modules.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:9:"dashboard";s:9:"file_path";s:57:"/home/lit/lit-dev/.git/../drush/hooks/7/dashboard.api.php";s:4:"body";s:110:"
  // Remove the sidebar region defined by the core dashboard module.
  unset($regions['dashboard_sidebar']);
";}}s:4:"date";a:20:{s:32:"hook_date_default_argument_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_date_default_argument_alter";s:10:"definition";s:62:"function hook_date_default_argument_alter(&$argument, &$value)";s:11:"description";s:44:"Alter the default value for a date argument.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:241:"
  $style_options = $style_options = $argument->view->display_handler->get_option('style_options');
  if (!empty($style_options['track_date'])) {
    $default_date = date_now();
    $value = $default_date->format($argument->arg_format);
  }
";}s:34:"hook_date_formatter_pre_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_date_formatter_pre_view_alter";s:10:"definition";s:66:"function hook_date_formatter_pre_view_alter(&$entity, &$variables)";s:11:"description";s:38:"Alter the entity before formatting it.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:413:"
  if (!empty($entity->view)) {
    $field = $variables['field'];
    $date_id = 'date_id_' . $field['field_name'];
    $date_delta = 'date_delta_' . $field['field_name'];
    $date_item = $entity->view->result[$entity->view->row_index];
    if (!empty($date_item->$date_id)) {
      $entity->date_id = 'date.' . $date_item->$date_id . '.' . $field['field_name'] . '.' . $date_item->$date_delta . '.0';
    }
  }
";}s:31:"hook_date_formatter_dates_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_date_formatter_dates_alter";s:10:"definition";s:59:"function hook_date_formatter_dates_alter(&$dates, $context)";s:11:"description";s:58:"Alter the dates array created by date_formatter_process().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:1206:"
  $field = $context['field'];
  $instance = $context['instance'];
  $format = $context['format'];
  $entity_type = $context['entity_type'];
  $entity = $context['entity'];
  $date1 = $dates['value']['local']['object'];
  $date2 = $dates['value2']['local']['object'];

  $is_all_day = date_all_day_field($field, $instance, $date1, $date2);

  $all_day1 = '';
  $all_day2 = '';
  if ($format != 'format_interval' && $is_all_day) {
    $all_day1 = theme('date_all_day', array(
      'field' => $field,
      'instance' => $instance,
      'which' => 'date1',
      'date1' => $date1,
      'date2' => $date2,
      'format' => $format,
      'entity_type' => $entity_type,
      'entity' => $entity));
    $all_day2 = theme('date_all_day', array(
      'field' => $field,
      'instance' => $instance,
      'which' => 'date2',
      'date1' => $date1,
      'date2' => $date2,
      'format' => $format,
      'entity_type' => $entity_type,
      'entity' => $entity));
    $dates['value']['formatted_time'] = theme('date_all_day_label');
    $dates['value2']['formatted_time'] = theme('date_all_day_label');
    $dates['value']['formatted'] = $all_day1;
    $dates['value2']['formatted'] = $all_day2;
  }
";}s:33:"hook_date_text_pre_validate_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_date_text_pre_validate_alter";s:10:"definition";s:76:"function hook_date_text_pre_validate_alter(&$element, &$form_state, &$input)";s:11:"description";s:69:"Alter the date_text element before the rest of the validation is run.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:211:"
  // Let Date module massage the format for all day values so they will pass
  // validation. The All day flag, if used, actually exists on the parent
  // element.
  date_all_day_value($element, $form_state);
";}s:35:"hook_date_select_pre_validate_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:35:"hook_date_select_pre_validate_alter";s:10:"definition";s:78:"function hook_date_select_pre_validate_alter(&$element, &$form_state, &$input)";s:11:"description";s:71:"Alter the date_select element before the rest of the validation is run.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:211:"
  // Let Date module massage the format for all day values so they will pass
  // validation. The All day flag, if used, actually exists on the parent
  // element.
  date_all_day_value($element, $form_state);
";}s:34:"hook_date_popup_pre_validate_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_date_popup_pre_validate_alter";s:10:"definition";s:77:"function hook_date_popup_pre_validate_alter(&$element, &$form_state, &$input)";s:11:"description";s:70:"Alter the date_popup element before the rest of the validation is run.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:211:"
  // Let Date module massage the format for all day values so they will pass
  // validation. The All day flag, if used, actually exists on the parent
  // element.
  date_all_day_value($element, $form_state);
";}s:34:"hook_date_combo_pre_validate_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_date_combo_pre_validate_alter";s:10:"definition";s:78:"function hook_date_combo_pre_validate_alter(&$element, &$form_state, $context)";s:11:"description";s:70:"Alter the date_combo element before the rest of the validation is run.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:540:"
  if (!empty($context['item']['all_day'])) {

    $field = $context['field'];

    // If we have an all day flag on this date and the time is empty, change the
    // format to match the input value so we don't get validation errors.
    $element['#date_is_all_day'] = TRUE;
    $element['value']['#date_format'] = date_part_format('date', $element['value']['#date_format']);
    if (!empty($field['settings']['todate'])) {
      $element['value2']['#date_format'] = date_part_format('date', $element['value2']['#date_format']);
    }
  }
";}s:41:"hook_date_combo_validate_date_start_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:41:"hook_date_combo_validate_date_start_alter";s:10:"definition";s:82:"function hook_date_combo_validate_date_start_alter(&$date, &$form_state, $context)";s:11:"description";s:72:"Alter the local start date objects created by the date_combo validation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:153:"
  // If this is an 'All day' value, set the time to midnight.
  if (!empty($context['element']['#date_is_all_day'])) {
    $date->setTime(0, 0, 0);
  }
";}s:39:"hook_date_combo_validate_date_end_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:39:"hook_date_combo_validate_date_end_alter";s:10:"definition";s:80:"function hook_date_combo_validate_date_end_alter(&$date, &$form_state, $context)";s:11:"description";s:70:"Alter the local end date objects created by the date_combo validation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:153:"
  // If this is an 'All day' value, set the time to midnight.
  if (!empty($context['element']['#date_is_all_day'])) {
    $date->setTime(0, 0, 0);
  }
";}s:28:"hook_date_text_process_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_date_text_process_alter";s:10:"definition";s:72:"function hook_date_text_process_alter(&$element, &$form_state, $context)";s:11:"description";s:35:"Alter the date_text widget element.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:267:"
  $all_day_id = !empty($element['#date_all_day_id']) ? $element['#date_all_day_id'] : '';
  if ($all_day_id != '') {
    // All Day handling on text dates works only if the user leaves the time out
    // of the input value. There is no element to hide or show.
  }
";}s:30:"hook_date_select_process_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_date_select_process_alter";s:10:"definition";s:74:"function hook_date_select_process_alter(&$element, &$form_state, $context)";s:11:"description";s:37:"Alter the date_select widget element.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:510:"
  // Hide or show the element in reaction to the all_day status for the element.
  $all_day_id = !empty($element['#date_all_day_id']) ? $element['#date_all_day_id'] : '';
  if ($all_day_id != '') {
    foreach (array('hour', 'minute', 'second', 'ampm') as $field) {
      if (array_key_exists($field, $element)) {
        $element[$field]['#states'] = array(
          'visible' => array(
            'input[name="' . $all_day_id . '"]' => array('checked' => FALSE),
          ),
        );
      }
    }
  }
";}s:29:"hook_date_popup_process_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_date_popup_process_alter";s:10:"definition";s:73:"function hook_date_popup_process_alter(&$element, &$form_state, $context)";s:11:"description";s:36:"Alter the date_popup widget element.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:398:"
  // Hide or show the element in reaction to the all_day status for the element.
  $all_day_id = !empty($element['#date_all_day_id']) ? $element['#date_all_day_id'] : '';
  if ($all_day_id != '' && array_key_exists('time', $element)) {
    $element['time']['#states'] = array(
      'visible' => array(
        'input[name="' . $all_day_id . '"]' => array('checked' => FALSE),
      ),
    );
  }
";}s:29:"hook_date_combo_process_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_date_combo_process_alter";s:10:"definition";s:73:"function hook_date_combo_process_alter(&$element, &$form_state, $context)";s:11:"description";s:71:"Alter the date_combo element after the Date module is finished with it.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:1317:"
  $field = $context['field'];
  $instance = $context['instance'];
  $field_name = $element['#field_name'];
  $delta = $element['#delta'];

  // Add a date repeat form element, if needed.
  // We delayed until this point so we don't bother adding it to hidden fields.
  if (date_is_repeat_field($field, $instance)) {
    $item = $element['#value'];
    $element['rrule'] = array(
      '#type' => 'date_repeat_rrule',
      '#theme_wrappers' => array('date_repeat_rrule'),
      '#default_value' => isset($item['rrule']) ? $item['rrule'] : '',
      '#date_timezone' => $element['#date_timezone'],
      '#date_format'      => date_limit_format(date_input_format($element, $field, $instance), $field['settings']['granularity']),
      '#date_text_parts'  => (array) $instance['widget']['settings']['text_parts'],
      '#date_increment'   => $instance['widget']['settings']['increment'],
      '#date_year_range'  => $instance['widget']['settings']['year_range'],
      '#date_label_position' => $instance['widget']['settings']['label_position'],
      '#date_repeat_widget' => str_replace('_repeat', '', $instance['widget']['type']),
      '#date_repeat_collapsed' => $instance['widget']['settings']['repeat_collapsed'],
      '#date_flexible' => 0,
      '#weight' => $instance['widget']['weight'] + .4,
    );
  }
";}s:32:"hook_date_timezone_process_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_date_timezone_process_alter";s:10:"definition";s:76:"function hook_date_timezone_process_alter(&$element, &$form_state, $context)";s:11:"description";s:39:"Alter the date_timezone widget element.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:13:"
  // @todo.
";}s:34:"hook_date_year_range_process_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_date_year_range_process_alter";s:10:"definition";s:78:"function hook_date_year_range_process_alter(&$element, &$form_state, $context)";s:11:"description";s:41:"Alter the date_year_range widget element.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:13:"
  // @todo.
";}s:35:"hook_date_field_settings_form_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:35:"hook_date_field_settings_form_alter";s:10:"definition";s:62:"function hook_date_field_settings_form_alter(&$form, $context)";s:11:"description";s:33:"Alter a date field settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:590:"
  $field = $context['field'];
  $instance = $context['instance'];
  $has_data = $context['has_data'];

  $form['repeat'] = array(
    '#type' => 'select',
    '#title' => t('Repeating date'),
    '#default_value' => $field['settings']['repeat'],
    '#options' => array(0 => t('No'), 1 => t('Yes')),
    '#attributes' => array('class' => array('container-inline')),
    '#description' => t("Repeating dates use an 'Unlimited' number of values. Instead of the 'Add more' button, they include a form to select when and how often the date should repeat."),
    '#disabled' => $has_data,
  );
";}s:44:"hook_date_field_instance_settings_form_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:44:"hook_date_field_instance_settings_form_alter";s:10:"definition";s:71:"function hook_date_field_instance_settings_form_alter(&$form, $context)";s:11:"description";s:42:"Alter a date field instance settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:197:"
  $field = $context['field'];
  $instance = $context['instance'];
  $form['new_setting'] = array(
    '#type' => 'textfield',
    '#default_value' => '',
    '#title' => t('My new setting'),
  );
";}s:42:"hook_date_field_widget_settings_form_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:42:"hook_date_field_widget_settings_form_alter";s:10:"definition";s:69:"function hook_date_field_widget_settings_form_alter(&$form, $context)";s:11:"description";s:40:"Alter a date field widget settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:197:"
  $field = $context['field'];
  $instance = $context['instance'];
  $form['new_setting'] = array(
    '#type' => 'textfield',
    '#default_value' => '',
    '#title' => t('My new setting'),
  );
";}s:45:"hook_date_field_formatter_settings_form_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:45:"hook_date_field_formatter_settings_form_alter";s:10:"definition";s:86:"function hook_date_field_formatter_settings_form_alter(&$form, &$form_state, $context)";s:11:"description";s:43:"Alter a date field formatter settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:575:"
  $field = $context['field'];
  $instance = $context['instance'];
  $view_mode = $context['view_mode'];
  $display = $instance['display'][$view_mode];
  $formatter = $display['type'];
  if ($formatter == 'date_default') {
    $form['show_repeat_rule'] = array(
      '#title' => t('Repeat rule:'),
      '#type' => 'select',
      '#options' => array(
        'show' => t('Show repeat rule'),
        'hide' => t('Hide repeat rule')),
      '#default_value' => $settings['show_repeat_rule'],
      '#access' => $field['settings']['repeat'],
      '#weight' => 5,
    );
  }
";}s:48:"hook_date_field_formatter_settings_summary_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:48:"hook_date_field_formatter_settings_summary_alter";s:10:"definition";s:78:"function hook_date_field_formatter_settings_summary_alter(&$summary, $context)";s:11:"description";s:46:"Alter a date field formatter settings summary.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"date";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/date.api.php";s:4:"body";s:469:"
  $field = $context['field'];
  $instance = $context['instance'];
  $view_mode = $context['view_mode'];
  $display = $instance['display'][$view_mode];
  $formatter = $display['type'];
  $settings = $display['settings'];
  if (isset($settings['show_repeat_rule']) && !empty($field['settings']['repeat'])) {
    if ($settings['show_repeat_rule'] == 'show') {
      $summary[] = t('Show repeat rule');
    }
    else {
      $summary[] = t('Hide repeat rule');
    }
  }
";}}s:5:"devel";a:2:{s:24:"hook_node_access_explain";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_node_access_explain";s:10:"definition";s:39:"function hook_node_access_explain($row)";s:11:"description";s:48:"Explain your records in the {node_access} table.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"devel";s:9:"file_path";s:65:"/home/lit/lit-dev/.git/../drush/hooks/7/devel_node_access.api.php";s:4:"body";s:248:"
  if ($row->realm == 'mymodule_myrealm') {
    if ($row->grant_view) {
      $role = user_role_load($row->gid);
      return 'Role ' . drupal_placeholder($role->name) . ' may view this node.';
    }
    else {
      return 'No access.';
    }
  }
";}s:28:"hook_node_access_acknowledge";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_node_access_acknowledge";s:10:"definition";s:45:"function hook_node_access_acknowledge($grant)";s:11:"description";s:47:"Acknowledge ownership of 'alien' grant records.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"devel";s:9:"file_path";s:65:"/home/lit/lit-dev/.git/../drush/hooks/7/devel_node_access.api.php";s:4:"body";s:87:"
  if ($grant['realm'] == 'mymodule_all' && $grant['nid'] == 0) {
    return TRUE;
  }
";}}s:4:"diff";a:4:{s:16:"hook_entity_diff";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_entity_diff";s:10:"definition";s:61:"function hook_entity_diff($old_entity, $new_entity, $context)";s:11:"description";s:53:"Allow modules to provide a comparison about entities.";s:11:"destination";s:16:"%module.diff.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"diff";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/diff.api.php";s:4:"body";s:345:"
  if ($context['entity_type'] == 'node') {
    $type = node_type_get_type($new_entity);
    $result['title'] = array(
      '#name' => $type->title_label,
      '#old' => array($old_entity->title),
      '#new' => array($new_entity->title),
      '#weight' => -5,
      '#settings' => array(
        'show_header' => FALSE,
      ),
    );
  }
";}s:22:"hook_entity_diff_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_entity_diff_alter";s:10:"definition";s:56:"function hook_entity_diff_alter($entity_diffs, $context)";s:11:"description";s:51:"Allow modules to alter a comparison about entities.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"diff";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/diff.api.php";s:4:"body";s:1:"
";}s:34:"hook_field_diff_view_prepare_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_field_diff_view_prepare_alter";s:10:"definition";s:77:"function hook_field_diff_view_prepare_alter($old_items, $new_items, $context)";s:11:"description";s:70:"Allow other modules to interact with MODULE_field_diff_view_prepare().";s:11:"destination";s:16:"%module.diff.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"diff";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/diff.api.php";s:4:"body";s:2:"

";}s:26:"hook_field_diff_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_field_diff_view_alter";s:10:"definition";s:62:"function hook_field_diff_view_alter($values, $items, $context)";s:11:"description";s:62:"Allow other modules to interact with MODULE_field_diff_view().";s:11:"destination";s:16:"%module.diff.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"diff";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/diff.api.php";s:4:"body";s:2:"

";}}s:6:"entity";a:3:{s:25:"hook_entity_property_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_entity_property_info";s:10:"definition";s:36:"function hook_entity_property_info()";s:11:"description";s:57:"Allow modules to define metadata about entity properties.";s:11:"destination";s:16:"%module.info.inc";s:12:"dependencies";a:0:{}s:5:"group";s:6:"entity";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/entity.api.php";s:4:"body";s:225:"
  $info = array();
  $properties = &$info['node']['properties'];

  $properties['nid'] = array(
    'label' => t("Content ID"),
    'type' => 'integer',
    'description' => t("The unique content ID."),
  );
  return $info;
";}s:31:"hook_entity_property_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_entity_property_info_alter";s:10:"definition";s:48:"function hook_entity_property_info_alter(&$info)";s:11:"description";s:56:"Allow modules to alter metadata about entity properties.";s:11:"destination";s:16:"%module.info.inc";s:12:"dependencies";a:0:{}s:5:"group";s:6:"entity";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/entity.api.php";s:4:"body";s:318:"
  $properties = &$info['node']['bundles']['poll']['properties'];

  $properties['poll-votes'] = array(
    'label' => t("Poll votes"),
    'description' => t("The number of votes that have been cast on a poll node."),
    'type' => 'integer',
    'getter callback' => 'entity_property_poll_node_get_properties',
  );
";}s:38:"hook_entity_views_field_handlers_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:38:"hook_entity_views_field_handlers_alter";s:10:"definition";s:71:"function hook_entity_views_field_handlers_alter(array &$field_handlers)";s:11:"description";s:77:"Alter the handlers used by the data selection tables provided by this module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"entity";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/entity.api.php";s:4:"body";s:113:"
  $field_handlers['duration'] = 'example_duration_handler';
  $field_handlers['node'] = 'example_node_handler';
";}}s:8:"features";a:26:{s:17:"hook_features_api";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_features_api";s:10:"definition";s:28:"function hook_features_api()";s:11:"description";s:75:"Main info hook that features uses to determine what components are provided";s:11:"destination";s:20:"%module.features.inc";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:277:"
  return array(
    'mycomponent' => array(
      'default_hook' => 'mycomponent_defaults',
      'default_file' => FEATURES_DEFAULTS_INCLUDED,
      'feature_source' => TRUE,
      'file' => drupal_get_path('module', 'mycomponent') . '/mycomponent.features.inc',
    ),
  );
";}s:20:"hook_features_export";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_features_export";s:10:"definition";s:60:"function hook_features_export($data, &$export, $module_name)";s:11:"description";s:68:"Component hook. The hook should be implemented using the name of the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:247:"
  // The following is the simplest implementation of a straight object export
  // with no further export processors called.
  foreach ($data as $component) {
    $export['features']['mycomponent'][$component] = $component;
  }
  return array();
";}s:28:"hook_features_export_options";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_features_export_options";s:10:"definition";s:39:"function hook_features_export_options()";s:11:"description";s:68:"Component hook. The hook should be implemented using the name of the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:151:"
  $options = array();
  foreach (mycomponent_load() as $mycomponent) {
    $options[$mycomponent->name] = $mycomponent->title;
  }
  return $options;
";}s:27:"hook_features_export_render";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:27:"hook_features_export_render";s:10:"definition";s:73:"function hook_features_export_render($module_name, $data, $export = NULL)";s:11:"description";s:68:"Component hook. The hook should be implemented using the name of the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:312:"
  $code = array();
  $code[] = '$mycomponents = array();';
  foreach ($data as $name) {
    $code[] = "  \$mycomponents['{$name}'] = " . features_var_export(mycomponent_load($name)) .";";
  }
  $code[] = "return \$mycomponents;";
  $code = implode("\n", $code);
  return array('mycomponent_defaults' => $code);
";}s:20:"hook_features_revert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_features_revert";s:10:"definition";s:43:"function hook_features_revert($module_name)";s:11:"description";s:68:"Component hook. The hook should be implemented using the name of the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:199:"
  $mycomponents = module_invoke($module_name, 'mycomponent_defaults');
  if (!empty($mycomponents)) {
    foreach ($mycomponents as $mycomponent) {
      mycomponent_delete($mycomponent);
    }
  }
";}s:21:"hook_features_rebuild";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_features_rebuild";s:10:"definition";s:44:"function hook_features_rebuild($module_name)";s:11:"description";s:68:"Component hook. The hook should be implemented using the name of the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:197:"
  $mycomponents = module_invoke($module_name, 'mycomponent_defaults');
  if (!empty($mycomponents)) {
    foreach ($mycomponents as $mycomponent) {
      mycomponent_save($mycomponent);
    }
  }
";}s:26:"hook_features_export_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_features_export_alter";s:10:"definition";s:59:"function hook_features_export_alter(&$export, $module_name)";s:11:"description";s:70:"Alter the final array of Component names to be exported, just prior to";s:11:"destination";s:20:"%module.features.inc";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:177:"
  // Example: do not allow the page content type to be exported, ever.
  if (!empty($export['features']['node']['page'])) {
    unset($export['features']['node']['page']);
  }
";}s:34:"hook_features_pipe_COMPONENT_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_features_pipe_COMPONENT_alter";s:10:"definition";s:67:"function hook_features_pipe_COMPONENT_alter(&$pipe, $data, $export)";s:11:"description";s:75:"Alter the pipe array for a given component. This hook should be implemented";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:88:"
  if (in_array($data, 'my-node-type')) {
    $pipe['dependencies'][] = 'mymodule';
  }
";}s:24:"hook_features_pipe_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_features_pipe_alter";s:10:"definition";s:57:"function hook_features_pipe_alter(&$pipe, $data, $export)";s:11:"description";s:43:"Alter the pipe array for a given component.";s:11:"destination";s:20:"%module.features.inc";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:122:"
  if ($export['component'] == 'node' && in_array($data, 'my-node-type')) {
    $pipe['dependencies'][] = 'mymodule';
  }
";}s:31:"hook_field_default_fields_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_default_fields_alter";s:10:"definition";s:50:"function hook_field_default_fields_alter(&$fields)";s:11:"description";s:72:"Alter the default fields right before they are cached into the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:36:"hook_fieldgroup_default_groups_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:36:"hook_fieldgroup_default_groups_alter";s:10:"definition";s:55:"function hook_fieldgroup_default_groups_alter(&$groups)";s:11:"description";s:73:"Alter the default fieldgroup groups right before they are cached into the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:33:"hook_filter_default_formats_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_filter_default_formats_alter";s:10:"definition";s:53:"function hook_filter_default_formats_alter(&$formats)";s:11:"description";s:70:"Alter the default filter formats right before they are cached into the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:35:"hook_menu_default_menu_custom_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:35:"hook_menu_default_menu_custom_alter";s:10:"definition";s:53:"function hook_menu_default_menu_custom_alter(&$menus)";s:11:"description";s:71:"Alter the default menus right before they are cached into the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:34:"hook_menu_default_menu_links_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_menu_default_menu_links_alter";s:10:"definition";s:52:"function hook_menu_default_menu_links_alter(&$links)";s:11:"description";s:76:"Alter the default menu links right before they are cached into the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:29:"hook_menu_default_items_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_menu_default_items_alter";s:10:"definition";s:47:"function hook_menu_default_items_alter(&$items)";s:11:"description";s:76:"Alter the default menu items right before they are cached into the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:40:"hook_taxonomy_default_vocabularies_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:40:"hook_taxonomy_default_vocabularies_alter";s:10:"definition";s:65:"function hook_taxonomy_default_vocabularies_alter(&$vocabularies)";s:11:"description";s:68:"Alter the default vocabularies right before they are cached into the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:35:"hook_user_default_permissions_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:35:"hook_user_default_permissions_alter";s:10:"definition";s:59:"function hook_user_default_permissions_alter(&$permissions)";s:11:"description";s:67:"Alter the default permissions right before they are cached into the";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:29:"hook_user_default_roles_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_user_default_roles_alter";s:10:"definition";s:47:"function hook_user_default_roles_alter(&$roles)";s:11:"description";s:71:"Alter the default roles right before they are cached into the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:24:"hook_pre_features_revert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_pre_features_revert";s:10:"definition";s:45:"function hook_pre_features_revert($component)";s:11:"description";s:70:"Feature module hook. Invoked on a Feature module before that module is";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:25:"hook_post_features_revert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_post_features_revert";s:10:"definition";s:46:"function hook_post_features_revert($component)";s:11:"description";s:69:"Feature module hook. Invoked on a Feature module after that module is";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:25:"hook_pre_features_rebuild";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_pre_features_rebuild";s:10:"definition";s:46:"function hook_pre_features_rebuild($component)";s:11:"description";s:70:"Feature module hook. Invoked on a Feature module before that module is";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:26:"hook_post_features_rebuild";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_post_features_rebuild";s:10:"definition";s:47:"function hook_post_features_rebuild($component)";s:11:"description";s:69:"Feature module hook. Invoked on a Feature module after that module is";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:33:"hook_pre_features_disable_feature";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_pre_features_disable_feature";s:10:"definition";s:54:"function hook_pre_features_disable_feature($component)";s:11:"description";s:70:"Feature module hook. Invoked on a Feature module before that module is";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:34:"hook_post_features_disable_feature";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_post_features_disable_feature";s:10:"definition";s:55:"function hook_post_features_disable_feature($component)";s:11:"description";s:69:"Feature module hook. Invoked on a Feature module after that module is";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:32:"hook_pre_features_enable_feature";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_pre_features_enable_feature";s:10:"definition";s:53:"function hook_pre_features_enable_feature($component)";s:11:"description";s:70:"Feature module hook. Invoked on a Feature module before that module is";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}s:33:"hook_post_features_enable_feature";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_post_features_enable_feature";s:10:"definition";s:54:"function hook_post_features_enable_feature($component)";s:11:"description";s:69:"Feature module hook. Invoked on a Feature module after that module is";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"features";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/features.api.php";s:4:"body";s:1:"
";}}s:5:"field";a:81:{s:23:"hook_field_extra_fields";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_extra_fields";s:10:"definition";s:34:"function hook_field_extra_fields()";s:11:"description";s:56:"Exposes "pseudo-field" components on fieldable entities.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:708:"
  $extra['node']['poll'] = array(
    'form' => array(
      'choice_wrapper' => array(
        'label' => t('Poll choices'),
        'description' => t('Poll choices'),
        'weight' => -4,
      ),
      'settings' => array(
        'label' => t('Poll settings'),
        'description' => t('Poll module settings'),
        'weight' => -3,
      ),
    ),
    'display' => array(
      'poll_view_voting' => array(
        'label' => t('Poll vote'),
        'description' => t('Poll vote'),
        'weight' => 0,
      ),
      'poll_view_results' => array(
        'label' => t('Poll results'),
        'description' => t('Poll results'),
        'weight' => 0,
      ),
    )
  );

  return $extra;
";}s:29:"hook_field_extra_fields_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_field_extra_fields_alter";s:10:"definition";s:46:"function hook_field_extra_fields_alter(&$info)";s:11:"description";s:54:"Alter "pseudo-field" components on fieldable entities.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:261:"
  // Force node title to always be at the top of the list by default.
  foreach (node_type_get_types() as $bundle) {
    if (isset($info['node'][$bundle->type]['form']['title'])) {
      $info['node'][$bundle->type]['form']['title']['weight'] = -20;
    }
  }
";}s:15:"hook_field_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_field_info";s:10:"definition";s:26:"function hook_field_info()";s:11:"description";s:29:"Define Field API field types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:1123:"
  return array(
    'text' => array(
      'label' => t('Text'),
      'description' => t('This field stores varchar text in the database.'),
      'settings' => array('max_length' => 255),
      'instance_settings' => array('text_processing' => 0),
      'default_widget' => 'text_textfield',
      'default_formatter' => 'text_default',
    ),
    'text_long' => array(
      'label' => t('Long text'),
      'description' => t('This field stores long text in the database.'),
      'settings' => array('max_length' => ''),
      'instance_settings' => array('text_processing' => 0),
      'default_widget' => 'text_textarea',
      'default_formatter' => 'text_default',
    ),
    'text_with_summary' => array(
      'label' => t('Long text and summary'),
      'description' => t('This field stores long text in the database along with optional summary text.'),
      'settings' => array('max_length' => ''),
      'instance_settings' => array('text_processing' => 1, 'display_summary' => 0),
      'default_widget' => 'text_textarea_with_summary',
      'default_formatter' => 'text_summary_or_trimmed',
    ),
  );
";}s:21:"hook_field_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_field_info_alter";s:10:"definition";s:38:"function hook_field_info_alter(&$info)";s:11:"description";s:45:"Perform alterations on Field API field types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:354:"
  // Add a setting to all field types.
  foreach ($info as $field_type => $field_type_info) {
    $info[$field_type]['settings'] += array(
      'mymodule_additional_setting' => 'default value',
    );
  }

  // Change the default widget for fields of type 'foo'.
  if (isset($info['foo'])) {
    $info['foo']['default widget'] = 'mymodule_widget';
  }
";}s:17:"hook_field_schema";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_field_schema";s:10:"definition";s:34:"function hook_field_schema($field)";s:11:"description";s:50:"Define the Field API schema for a field structure.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:776:"
  if ($field['type'] == 'text_long') {
    $columns = array(
      'value' => array(
        'type' => 'text',
        'size' => 'big',
        'not null' => FALSE,
      ),
    );
  }
  else {
    $columns = array(
      'value' => array(
        'type' => 'varchar',
        'length' => $field['settings']['max_length'],
        'not null' => FALSE,
      ),
    );
  }
  $columns += array(
    'format' => array(
      'type' => 'varchar',
      'length' => 255,
      'not null' => FALSE,
    ),
  );
  return array(
    'columns' => $columns,
    'indexes' => array(
      'format' => array('format'),
    ),
    'foreign keys' => array(
      'format' => array(
        'table' => 'filter_format',
        'columns' => array('format' => 'format'),
      ),
    ),
  );
";}s:15:"hook_field_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_field_load";s:10:"definition";s:95:"function hook_field_load($entity_type, $entities, $field, $instances, $langcode, &$items, $age)";s:11:"description";s:58:"Define custom load behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:777:"
  // Sample code from text.module: precompute sanitized strings so they are
  // stored in the field cache.
  foreach ($entities as $id => $entity) {
    foreach ($items[$id] as $delta => $item) {
      // Only process items with a cacheable format, the rest will be handled
      // by formatters if needed.
      if (empty($instances[$id]['settings']['text_processing']) || filter_format_allowcache($item['format'])) {
        $items[$id][$delta]['safe_value'] = isset($item['value']) ? _text_sanitize($instances[$id], $langcode, $item, 'value') : '';
        if ($field['type'] == 'text_with_summary') {
          $items[$id][$delta]['safe_summary'] = isset($item['summary']) ? _text_sanitize($instances[$id], $langcode, $item, 'summary') : '';
        }
      }
    }
  }
";}s:23:"hook_field_prepare_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_prepare_view";s:10:"definition";s:97:"function hook_field_prepare_view($entity_type, $entities, $field, $instances, $langcode, &$items)";s:11:"description";s:38:"Prepare field values prior to display.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:442:"
  // Sample code from image.module: if there are no images specified at all,
  // use the default image.
  foreach ($entities as $id => $entity) {
    if (empty($items[$id]) && $field['settings']['default_image']) {
      if ($file = file_load($field['settings']['default_image'])) {
        $items[$id][0] = (array) $file + array(
          'is_default' => TRUE,
          'alt' => '',
          'title' => '',
        );
      }
    }
  }
";}s:19:"hook_field_validate";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_field_validate";s:10:"definition";s:99:"function hook_field_validate($entity_type, $entity, $field, $instance, $langcode, $items, &$errors)";s:11:"description";s:34:"Validate this module's field data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:502:"
  foreach ($items as $delta => $item) {
    if (!empty($item['value'])) {
      if (!empty($field['settings']['max_length']) && drupal_strlen($item['value']) > $field['settings']['max_length']) {
        $errors[$field['field_name']][$langcode][$delta][] = array(
          'error' => 'text_max_length',
          'message' => t('%name: the value may not be longer than %max characters.', array('%name' => $instance['label'], '%max' => $field['settings']['max_length'])),
        );
      }
    }
  }
";}s:18:"hook_field_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_field_presave";s:10:"definition";s:89:"function hook_field_presave($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:61:"Define custom presave behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:319:"
  if ($field['type'] == 'number_decimal') {
    // Let PHP round the value to ensure consistent behavior across storage
    // backends.
    foreach ($items as $delta => $item) {
      if (isset($item['value'])) {
        $items[$delta]['value'] = round($item['value'], $field['settings']['scale']);
      }
    }
  }
";}s:17:"hook_field_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_field_insert";s:10:"definition";s:88:"function hook_field_insert($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:59:"Define custom insert behavior for this module's field data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:494:"
  if (variable_get('taxonomy_maintain_index_table', TRUE) && $field['storage']['type'] == 'field_sql_storage' && $entity_type == 'node' && $entity->status) {
    $query = db_insert('taxonomy_index')->fields(array('nid', 'tid', 'sticky', 'created', ));
    foreach ($items as $item) {
      $query->values(array(
        'nid' => $entity->nid,
        'tid' => $item['tid'],
        'sticky' => $entity->sticky,
        'created' => $entity->created,
      ));
    }
    $query->execute();
  }
";}s:17:"hook_field_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_field_update";s:10:"definition";s:88:"function hook_field_update($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:59:"Define custom update behavior for this module's field data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:1008:"
  if (variable_get('taxonomy_maintain_index_table', TRUE) && $field['storage']['type'] == 'field_sql_storage' && $entity_type == 'node') {
    $first_call = &drupal_static(__FUNCTION__, array());

    // We don't maintain data for old revisions, so clear all previous values
    // from the table. Since this hook runs once per field, per object, make
    // sure we only wipe values once.
    if (!isset($first_call[$entity->nid])) {
      $first_call[$entity->nid] = FALSE;
      db_delete('taxonomy_index')->condition('nid', $entity->nid)->execute();
    }
    // Only save data to the table if the node is published.
    if ($entity->status) {
      $query = db_insert('taxonomy_index')->fields(array('nid', 'tid', 'sticky', 'created'));
      foreach ($items as $item) {
        $query->values(array(
          'nid' => $entity->nid,
          'tid' => $item['tid'],
          'sticky' => $entity->sticky,
          'created' => $entity->created,
        ));
      }
      $query->execute();
    }
  }
";}s:31:"hook_field_storage_update_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_storage_update_field";s:10:"definition";s:73:"function hook_field_storage_update_field($field, $prior_field, $has_data)";s:11:"description";s:43:"Update the storage information for a field.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:609:"
  if (!$has_data) {
    // There is no data. Re-create the tables completely.
    $prior_schema = _field_sql_storage_schema($prior_field);
    foreach ($prior_schema as $name => $table) {
      db_drop_table($name, $table);
    }
    $schema = _field_sql_storage_schema($field);
    foreach ($schema as $name => $table) {
      db_create_table($name, $table);
    }
  }
  else {
    // There is data. See field_sql_storage_field_storage_update_field() for
    // an example of what to do to modify the schema in place, preserving the
    // old data as much as possible.
  }
  drupal_get_schema(NULL, TRUE);
";}s:17:"hook_field_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_field_delete";s:10:"definition";s:88:"function hook_field_delete($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:59:"Define custom delete behavior for this module's field data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:508:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);
  foreach ($items as $delta => $item) {
    // For hook_file_references(), remember that this is being deleted.
    $item['file_field_name'] = $field['field_name'];
    // Pass in the ID of the object that is being removed so all references can
    // be counted in hook_file_references().
    $item['file_field_type'] = $entity_type;
    $item['file_field_id'] = $id;
    file_field_delete_file($item, $field, $entity_type, $id);
  }
";}s:26:"hook_field_delete_revision";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_field_delete_revision";s:10:"definition";s:97:"function hook_field_delete_revision($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:69:"Define custom revision delete behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:348:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);
  foreach ($items as $delta => $item) {
    // For hook_file_references, remember that this file is being deleted.
    $item['file_field_name'] = $field['field_name'];
    if (file_field_delete_file($item, $field, $entity_type, $id)) {
      $items[$delta] = NULL;
    }
  }
";}s:30:"hook_field_prepare_translation";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_field_prepare_translation";s:10:"definition";s:135:"function hook_field_prepare_translation($entity_type, $entity, $field, $instance, $langcode, &$items, $source_entity, $source_langcode)";s:11:"description";s:73:"Define custom prepare_translation behavior for this module's field types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:341:"
  // If the translating user is not permitted to use the assigned text format,
  // we must not expose the source values.
  $field_name = $field['field_name'];
  $formats = filter_formats();
  $format_id = $source_entity->{$field_name}[$source_langcode][0]['format'];
  if (!filter_access($formats[$format_id])) {
    $items = array();
  }
";}s:19:"hook_field_is_empty";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_field_is_empty";s:10:"definition";s:43:"function hook_field_is_empty($item, $field)";s:11:"description";s:55:"Define what constitutes an empty item for a field type.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:104:"
  if (empty($item['value']) && (string) $item['value'] !== '0') {
    return TRUE;
  }
  return FALSE;
";}s:22:"hook_field_widget_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_field_widget_info";s:10:"definition";s:33:"function hook_field_widget_info()";s:11:"description";s:30:"Expose Field API widget types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:1076:"
  return array(
    'text_textfield' => array(
      'label' => t('Text field'),
      'field types' => array('text'),
      'settings' => array('size' => 60),
      'behaviors' => array(
        'multiple values' => FIELD_BEHAVIOR_DEFAULT,
        'default value' => FIELD_BEHAVIOR_DEFAULT,
      ),
    ),
    'text_textarea' => array(
      'label' => t('Text area (multiple rows)'),
      'field types' => array('text_long'),
      'settings' => array('rows' => 5),
      'behaviors' => array(
        'multiple values' => FIELD_BEHAVIOR_DEFAULT,
        'default value' => FIELD_BEHAVIOR_DEFAULT,
      ),
    ),
    'text_textarea_with_summary' => array(
      'label' => t('Text area with a summary'),
      'field types' => array('text_with_summary'),
      'settings' => array('rows' => 20, 'summary_rows' => 5),
      'behaviors' => array(
        'multiple values' => FIELD_BEHAVIOR_DEFAULT,
        'default value' => FIELD_BEHAVIOR_DEFAULT,
      ),
      // As an advanced widget, force it to sink to the bottom of the choices.
      'weight' => 2,
    ),
  );
";}s:28:"hook_field_widget_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_field_widget_info_alter";s:10:"definition";s:45:"function hook_field_widget_info_alter(&$info)";s:11:"description";s:46:"Perform alterations on Field API widget types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:261:"
  // Add a setting to a widget type.
  $info['text_textfield']['settings'] += array(
    'mymodule_additional_setting' => 'default value',
  );

  // Let a new field type re-use an existing widget.
  $info['options_select']['field types'][] = 'my_field_type';
";}s:22:"hook_field_widget_form";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_field_widget_form";s:10:"definition";s:109:"function hook_field_widget_form(&$form, &$form_state, $field, $instance, $langcode, $items, $delta, $element)";s:11:"description";s:42:"Return the form for a single field widget.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:177:"
  $element += array(
    '#type' => $instance['widget']['type'],
    '#default_value' => isset($items[$delta]) ? $items[$delta] : '',
  );
  return array('value' => $element);
";}s:28:"hook_field_widget_form_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_field_widget_form_alter";s:10:"definition";s:72:"function hook_field_widget_form_alter(&$element, &$form_state, $context)";s:11:"description";s:56:"Alter forms for field widgets provided by other modules.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:233:"
  // Add a css class to widget form elements for all fields of type mytype.
  if ($context['field']['type'] == 'mytype') {
    // Be sure not to overwrite existing attributes.
    $element['#attributes']['class'][] = 'myclass';
  }
";}s:40:"hook_field_widget_WIDGET_TYPE_form_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:40:"hook_field_widget_WIDGET_TYPE_form_alter";s:10:"definition";s:84:"function hook_field_widget_WIDGET_TYPE_form_alter(&$element, &$form_state, $context)";s:11:"description";s:68:"Alter widget forms for a specific widget provided by another module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:262:"
  // Code here will only act on widgets of type WIDGET_TYPE.  For example,
  // hook_field_widget_mymodule_autocomplete_form_alter() will only act on
  // widgets of type 'mymodule_autocomplete'.
  $element['#autocomplete_path'] = 'mymodule/autocomplete_path';
";}s:34:"hook_field_widget_properties_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_field_widget_properties_alter";s:10:"definition";s:63:"function hook_field_widget_properties_alter(&$widget, $context)";s:11:"description";s:74:"Alters the widget properties of a field instance before it gets displayed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:260:"
  // Change a widget's type according to the time of day.
  $field = $context['field'];
  if ($context['entity_type'] == 'node' && $field['field_name'] == 'field_foo') {
    $time = date('H');
    $widget['type'] = $time < 12 ? 'widget_am' : 'widget_pm';
  }
";}s:23:"hook_field_widget_error";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_widget_error";s:10:"definition";s:71:"function hook_field_widget_error($element, $error, $form, &$form_state)";s:11:"description";s:36:"Flag a field-level validation error.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:44:"
  form_error($element, $error['message']);
";}s:25:"hook_field_formatter_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_field_formatter_info";s:10:"definition";s:36:"function hook_field_formatter_info()";s:11:"description";s:33:"Expose Field API formatter types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:1123:"
  return array(
    'text_default' => array(
      'label' => t('Default'),
      'field types' => array('text', 'text_long', 'text_with_summary'),
    ),
    'text_plain' => array(
      'label' => t('Plain text'),
      'field types' => array('text', 'text_long', 'text_with_summary'),
    ),

    // The text_trimmed formatter displays the trimmed version of the
    // full element of the field. It is intended to be used with text
    // and text_long fields. It also works with text_with_summary
    // fields though the text_summary_or_trimmed formatter makes more
    // sense for that field type.
    'text_trimmed' => array(
      'label' => t('Trimmed'),
      'field types' => array('text', 'text_long', 'text_with_summary'),
    ),

    // The 'summary or trimmed' field formatter for text_with_summary
    // fields displays returns the summary element of the field or, if
    // the summary is empty, the trimmed version of the full element
    // of the field.
    'text_summary_or_trimmed' => array(
      'label' => t('Summary or trimmed'),
      'field types' => array('text_with_summary'),
    ),
  );
";}s:31:"hook_field_formatter_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_formatter_info_alter";s:10:"definition";s:48:"function hook_field_formatter_info_alter(&$info)";s:11:"description";s:49:"Perform alterations on Field API formatter types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:263:"
  // Add a setting to a formatter type.
  $info['text_default']['settings'] += array(
    'mymodule_additional_setting' => 'default value',
  );

  // Let a new field type re-use an existing formatter.
  $info['text_default']['field types'][] = 'my_field_type';
";}s:33:"hook_field_formatter_prepare_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_field_formatter_prepare_view";s:10:"definition";s:118:"function hook_field_formatter_prepare_view($entity_type, $entities, $field, $instances, $langcode, &$items, $displays)";s:11:"description";s:70:"Allow formatters to load information for field values being displayed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:1125:"
  $tids = array();

  // Collect every possible term attached to any of the fieldable entities.
  foreach ($entities as $id => $entity) {
    foreach ($items[$id] as $delta => $item) {
      // Force the array key to prevent duplicates.
      $tids[$item['tid']] = $item['tid'];
    }
  }

  if ($tids) {
    $terms = taxonomy_term_load_multiple($tids);

    // Iterate through the fieldable entities again to attach the loaded term
    // data.
    foreach ($entities as $id => $entity) {
      $rekey = FALSE;

      foreach ($items[$id] as $delta => $item) {
        // Check whether the taxonomy term field instance value could be loaded.
        if (isset($terms[$item['tid']])) {
          // Replace the instance value with the term data.
          $items[$id][$delta]['taxonomy_term'] = $terms[$item['tid']];
        }
        // Otherwise, unset the instance value, since the term does not exist.
        else {
          unset($items[$id][$delta]);
          $rekey = TRUE;
        }
      }

      if ($rekey) {
        // Rekey the items array.
        $items[$id] = array_values($items[$id]);
      }
    }
  }
";}s:25:"hook_field_formatter_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_field_formatter_view";s:10:"definition";s:105:"function hook_field_formatter_view($entity_type, $entity, $field, $instance, $langcode, $items, $display)";s:11:"description";s:43:"Build a renderable array for a field value.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:1338:"
  $element = array();
  $settings = $display['settings'];

  switch ($display['type']) {
    case 'sample_field_formatter_simple':
      // Common case: each value is displayed individually in a sub-element
      // keyed by delta. The field.tpl.php template specifies the markup
      // wrapping each value.
      foreach ($items as $delta => $item) {
        $element[$delta] = array('#markup' => $settings['some_setting'] . $item['value']);
      }
      break;

    case 'sample_field_formatter_themeable':
      // More elaborate formatters can defer to a theme function for easier
      // customization.
      foreach ($items as $delta => $item) {
        $element[$delta] = array(
          '#theme' => 'mymodule_theme_sample_field_formatter_themeable',
          '#data' => $item['value'],
          '#some_setting' => $settings['some_setting'],
        );
      }
      break;

    case 'sample_field_formatter_combined':
      // Some formatters might need to display all values within a single piece
      // of markup.
      $rows = array();
      foreach ($items as $delta => $item) {
        $rows[] = array($delta, $item['value']);
      }
      $element[0] = array(
        '#theme' => 'table',
        '#header' => array(t('Delta'), t('Value')),
        '#rows' => $rows,
      );
      break;
  }

  return $element;
";}s:22:"hook_field_attach_form";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_field_attach_form";s:10:"definition";s:87:"function hook_field_attach_form($entity_type, $entity, &$form, &$form_state, $langcode)";s:11:"description";s:27:"Act on field_attach_form().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:252:"
  // Add a checkbox allowing a given field to be emptied.
  // See hook_field_attach_submit() for the corresponding processing code.
  $form['empty_field_foo'] = array(
    '#type' => 'checkbox',
    '#title' => t("Empty the 'field_foo' field"),
  );
";}s:22:"hook_field_attach_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_field_attach_load";s:10:"definition";s:72:"function hook_field_attach_load($entity_type, $entities, $age, $options)";s:11:"description";s:27:"Act on field_attach_load().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:26:"hook_field_attach_validate";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_field_attach_validate";s:10:"definition";s:68:"function hook_field_attach_validate($entity_type, $entity, &$errors)";s:11:"description";s:31:"Act on field_attach_validate().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:24:"hook_field_attach_submit";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_attach_submit";s:10:"definition";s:77:"function hook_field_attach_submit($entity_type, $entity, $form, &$form_state)";s:11:"description";s:29:"Act on field_attach_submit().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:277:"
  // Sample case of an 'Empty the field' checkbox added on the form, allowing
  // a given field to be emptied.
  $values = drupal_array_get_nested_value($form_state['values'], $form['#parents']);
  if (!empty($values['empty_field_foo'])) {
    unset($entity->field_foo);
  }
";}s:25:"hook_field_attach_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_field_attach_presave";s:10:"definition";s:57:"function hook_field_attach_presave($entity_type, $entity)";s:11:"description";s:30:"Act on field_attach_presave().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:24:"hook_field_attach_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_attach_insert";s:10:"definition";s:56:"function hook_field_attach_insert($entity_type, $entity)";s:11:"description";s:29:"Act on field_attach_insert().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:24:"hook_field_attach_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_attach_update";s:10:"definition";s:56:"function hook_field_attach_update($entity_type, $entity)";s:11:"description";s:29:"Act on field_attach_update().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:34:"hook_field_attach_preprocess_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_field_attach_preprocess_alter";s:10:"definition";s:66:"function hook_field_attach_preprocess_alter(&$variables, $context)";s:11:"description";s:42:"Alter field_attach_preprocess() variables.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:24:"hook_field_attach_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_attach_delete";s:10:"definition";s:56:"function hook_field_attach_delete($entity_type, $entity)";s:11:"description";s:29:"Act on field_attach_delete().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:33:"hook_field_attach_delete_revision";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_field_attach_delete_revision";s:10:"definition";s:65:"function hook_field_attach_delete_revision($entity_type, $entity)";s:11:"description";s:38:"Act on field_attach_delete_revision().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:23:"hook_field_attach_purge";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_attach_purge";s:10:"definition";s:74:"function hook_field_attach_purge($entity_type, $entity, $field, $instance)";s:11:"description";s:26:"Act on field_purge_data().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:178:"
  // find the corresponding data in mymodule and purge it
  if ($entity_type == 'node' && $field->field_name == 'my_field_name') {
    mymodule_remove_mydata($entity->nid);
  }
";}s:28:"hook_field_attach_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_field_attach_view_alter";s:10:"definition";s:57:"function hook_field_attach_view_alter(&$output, $context)";s:11:"description";s:65:"Perform alterations on field_attach_view() or field_view_field().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:733:"
  // Append RDF term mappings on displayed taxonomy links.
  foreach (element_children($output) as $field_name) {
    $element = &$output[$field_name];
    if ($element['#field_type'] == 'taxonomy_term_reference' && $element['#formatter'] == 'taxonomy_term_reference_link') {
      foreach ($element['#items'] as $delta => $item) {
        $term = $item['taxonomy_term'];
        if (!empty($term->rdf_mapping['rdftype'])) {
          $element[$delta]['#options']['attributes']['typeof'] = $term->rdf_mapping['rdftype'];
        }
        if (!empty($term->rdf_mapping['name']['predicates'])) {
          $element[$delta]['#options']['attributes']['property'] = $term->rdf_mapping['name']['predicates'];
        }
      }
    }
  }
";}s:43:"hook_field_attach_prepare_translation_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:43:"hook_field_attach_prepare_translation_alter";s:10:"definition";s:72:"function hook_field_attach_prepare_translation_alter(&$entity, $context)";s:11:"description";s:58:"Perform alterations on field_attach_prepare_translation().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:131:"
  if ($context['entity_type'] == 'custom_entity_type') {
    $entity->custom_field = $context['source_entity']->custom_field;
  }
";}s:25:"hook_field_language_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_field_language_alter";s:10:"definition";s:64:"function hook_field_language_alter(&$display_language, $context)";s:11:"description";s:47:"Perform alterations on field_language() values.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:362:"
  // Do not apply core language fallback rules if they are disabled or if Locale
  // is not registered as a translation handler.
  if (variable_get('locale_field_language_fallback', TRUE) && field_has_translation_handler($context['entity_type'], 'locale')) {
    locale_field_language_fallback($display_language, $context['entity'], $context['language']);
  }
";}s:36:"hook_field_available_languages_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:36:"hook_field_available_languages_alter";s:10:"definition";s:68:"function hook_field_available_languages_alter(&$languages, $context)";s:11:"description";s:41:"Alter field_available_languages() values.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:166:"
  // Add an unavailable language.
  $languages[] = 'xx';

  // Remove an available language.
  $index = array_search('yy', $languages);
  unset($languages[$index]);
";}s:31:"hook_field_attach_create_bundle";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_attach_create_bundle";s:10:"definition";s:63:"function hook_field_attach_create_bundle($entity_type, $bundle)";s:11:"description";s:36:"Act on field_attach_create_bundle().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:151:"
  // When a new bundle is created, the menu needs to be rebuilt to add the
  // Field UI menu item tabs.
  variable_set('menu_rebuild_needed', TRUE);
";}s:31:"hook_field_attach_rename_bundle";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_attach_rename_bundle";s:10:"definition";s:80:"function hook_field_attach_rename_bundle($entity_type, $bundle_old, $bundle_new)";s:11:"description";s:36:"Act on field_attach_rename_bundle().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:435:"
  // Update the extra weights variable with new information.
  if ($bundle_old !== $bundle_new) {
    $extra_weights = variable_get('field_extra_weights', array());
    if (isset($info[$entity_type][$bundle_old])) {
      $extra_weights[$entity_type][$bundle_new] = $extra_weights[$entity_type][$bundle_old];
      unset($extra_weights[$entity_type][$bundle_old]);
      variable_set('field_extra_weights', $extra_weights);
    }
  }
";}s:31:"hook_field_attach_delete_bundle";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_attach_delete_bundle";s:10:"definition";s:75:"function hook_field_attach_delete_bundle($entity_type, $bundle, $instances)";s:11:"description";s:34:"Act on field_attach_delete_bundle.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:299:"
  // Remove the extra weights variable information for this bundle.
  $extra_weights = variable_get('field_extra_weights', array());
  if (isset($extra_weights[$entity_type][$bundle])) {
    unset($extra_weights[$entity_type][$bundle]);
    variable_set('field_extra_weights', $extra_weights);
  }
";}s:23:"hook_field_storage_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_storage_info";s:10:"definition";s:34:"function hook_field_storage_info()";s:11:"description";s:34:"Expose Field API storage backends.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:229:"
  return array(
    'field_sql_storage' => array(
      'label' => t('Default SQL storage'),
      'description' => t('Stores fields in the local SQL database, using per-field tables.'),
      'settings' => array(),
    ),
  );
";}s:29:"hook_field_storage_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_field_storage_info_alter";s:10:"definition";s:46:"function hook_field_storage_info_alter(&$info)";s:11:"description";s:47:"Perform alterations on Field API storage types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:149:"
  // Add a setting to a storage type.
  $info['field_sql_storage']['settings'] += array(
    'mymodule_additional_setting' => 'default value',
  );
";}s:26:"hook_field_storage_details";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_field_storage_details";s:10:"definition";s:43:"function hook_field_storage_details($field)";s:11:"description";s:58:"Reveal the internal details about the storage for a field.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:510:"
  $details = array();

  // Add field columns.
  foreach ((array) $field['columns'] as $column_name => $attributes) {
    $real_name = _field_sql_storage_columnname($field['field_name'], $column_name);
    $columns[$column_name] = $real_name;
  }
  return array(
    'sql' => array(
      FIELD_LOAD_CURRENT => array(
        _field_sql_storage_tablename($field) => $columns,
      ),
      FIELD_LOAD_REVISION => array(
        _field_sql_storage_revision_tablename($field) => $columns,
      ),
    ),
  );
";}s:32:"hook_field_storage_details_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_field_storage_details_alter";s:10:"definition";s:60:"function hook_field_storage_details_alter(&$details, $field)";s:11:"description";s:49:"Perform alterations on Field API storage details.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:400:"
  if ($field['field_name'] == 'field_of_interest') {
    $columns = array();
    foreach ((array) $field['columns'] as $column_name => $attributes) {
      $columns[$column_name] = $column_name;
    }
    $details['drupal_variables'] = array(
      FIELD_LOAD_CURRENT => array(
        'moon' => $columns,
      ),
      FIELD_LOAD_REVISION => array(
        'mars' => $columns,
      ),
    );
  }
";}s:23:"hook_field_storage_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_storage_load";s:10:"definition";s:82:"function hook_field_storage_load($entity_type, $entities, $age, $fields, $options)";s:11:"description";s:38:"Load field data for a set of entities.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:1877:"
  $load_current = $age == FIELD_LOAD_CURRENT;

  foreach ($fields as $field_id => $ids) {
    // By the time this hook runs, the relevant field definitions have been
    // populated and cached in FieldInfo, so calling field_info_field_by_id()
    // on each field individually is more efficient than loading all fields in
    // memory upfront with field_info_field_by_ids().
    $field = field_info_field_by_id($field_id);
    $field_name = $field['field_name'];
    $table = $load_current ? _field_sql_storage_tablename($field) : _field_sql_storage_revision_tablename($field);

    $query = db_select($table, 't')
      ->fields('t')
      ->condition('entity_type', $entity_type)
      ->condition($load_current ? 'entity_id' : 'revision_id', $ids, 'IN')
      ->condition('language', field_available_languages($entity_type, $field), 'IN')
      ->orderBy('delta');

    if (empty($options['deleted'])) {
      $query->condition('deleted', 0);
    }

    $results = $query->execute();

    $delta_count = array();
    foreach ($results as $row) {
      if (!isset($delta_count[$row->entity_id][$row->language])) {
        $delta_count[$row->entity_id][$row->language] = 0;
      }

      if ($field['cardinality'] == FIELD_CARDINALITY_UNLIMITED || $delta_count[$row->entity_id][$row->language] < $field['cardinality']) {
        $item = array();
        // For each column declared by the field, populate the item
        // from the prefixed database column.
        foreach ($field['columns'] as $column => $attributes) {
          $column_name = _field_sql_storage_columnname($field_name, $column);
          $item[$column] = $row->$column_name;
        }

        // Add the item to the field values for the entity.
        $entities[$row->entity_id]->{$field_name}[$row->language][] = $item;
        $delta_count[$row->entity_id][$row->language]++;
      }
    }
  }
";}s:24:"hook_field_storage_write";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_storage_write";s:10:"definition";s:70:"function hook_field_storage_write($entity_type, $entity, $op, $fields)";s:11:"description";s:31:"Write field data for an entity.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:2857:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);
  if (!isset($vid)) {
    $vid = $id;
  }

  foreach ($fields as $field_id) {
    $field = field_info_field_by_id($field_id);
    $field_name = $field['field_name'];
    $table_name = _field_sql_storage_tablename($field);
    $revision_name = _field_sql_storage_revision_tablename($field);

    $all_languages = field_available_languages($entity_type, $field);
    $field_languages = array_intersect($all_languages, array_keys((array) $entity->$field_name));

    // Delete and insert, rather than update, in case a value was added.
    if ($op == FIELD_STORAGE_UPDATE) {
      // Delete languages present in the incoming $entity->$field_name.
      // Delete all languages if $entity->$field_name is empty.
      $languages = !empty($entity->$field_name) ? $field_languages : $all_languages;
      if ($languages) {
        db_delete($table_name)
          ->condition('entity_type', $entity_type)
          ->condition('entity_id', $id)
          ->condition('language', $languages, 'IN')
          ->execute();
        db_delete($revision_name)
          ->condition('entity_type', $entity_type)
          ->condition('entity_id', $id)
          ->condition('revision_id', $vid)
          ->condition('language', $languages, 'IN')
          ->execute();
      }
    }

    // Prepare the multi-insert query.
    $do_insert = FALSE;
    $columns = array('entity_type', 'entity_id', 'revision_id', 'bundle', 'delta', 'language');
    foreach ($field['columns'] as $column => $attributes) {
      $columns[] = _field_sql_storage_columnname($field_name, $column);
    }
    $query = db_insert($table_name)->fields($columns);
    $revision_query = db_insert($revision_name)->fields($columns);

    foreach ($field_languages as $langcode) {
      $items = (array) $entity->{$field_name}[$langcode];
      $delta_count = 0;
      foreach ($items as $delta => $item) {
        // We now know we have someting to insert.
        $do_insert = TRUE;
        $record = array(
          'entity_type' => $entity_type,
          'entity_id' => $id,
          'revision_id' => $vid,
          'bundle' => $bundle,
          'delta' => $delta,
          'language' => $langcode,
        );
        foreach ($field['columns'] as $column => $attributes) {
          $record[_field_sql_storage_columnname($field_name, $column)] = isset($item[$column]) ? $item[$column] : NULL;
        }
        $query->values($record);
        if (isset($vid)) {
          $revision_query->values($record);
        }

        if ($field['cardinality'] != FIELD_CARDINALITY_UNLIMITED && ++$delta_count == $field['cardinality']) {
          break;
        }
      }
    }

    // Execute the query if we have values to insert.
    if ($do_insert) {
      $query->execute();
      $revision_query->execute();
    }
  }
";}s:25:"hook_field_storage_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_field_storage_delete";s:10:"definition";s:66:"function hook_field_storage_delete($entity_type, $entity, $fields)";s:11:"description";s:36:"Delete all field data for an entity.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:353:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);

  foreach (field_info_instances($entity_type, $bundle) as $instance) {
    if (isset($fields[$instance['field_id']])) {
      $field = field_info_field_by_id($instance['field_id']);
      field_sql_storage_field_storage_purge($entity_type, $entity, $field, $instance);
    }
  }
";}s:34:"hook_field_storage_delete_revision";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_field_storage_delete_revision";s:10:"definition";s:75:"function hook_field_storage_delete_revision($entity_type, $entity, $fields)";s:11:"description";s:53:"Delete a single revision of field data for an entity.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:443:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);

  if (isset($vid)) {
    foreach ($fields as $field_id) {
      $field = field_info_field_by_id($field_id);
      $revision_name = _field_sql_storage_revision_tablename($field);
      db_delete($revision_name)
        ->condition('entity_type', $entity_type)
        ->condition('entity_id', $id)
        ->condition('revision_id', $vid)
        ->execute();
    }
  }
";}s:24:"hook_field_storage_query";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_storage_query";s:10:"definition";s:41:"function hook_field_storage_query($query)";s:11:"description";s:28:"Execute an EntityFieldQuery.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:3911:"
  $groups = array();
  if ($query->age == FIELD_LOAD_CURRENT) {
    $tablename_function = '_field_sql_storage_tablename';
    $id_key = 'entity_id';
  }
  else {
    $tablename_function = '_field_sql_storage_revision_tablename';
    $id_key = 'revision_id';
  }
  $table_aliases = array();
  // Add tables for the fields used.
  foreach ($query->fields as $key => $field) {
    $tablename = $tablename_function($field);
    // Every field needs a new table.
    $table_alias = $tablename . $key;
    $table_aliases[$key] = $table_alias;
    if ($key) {
      $select_query->join($tablename, $table_alias, "$table_alias.entity_type = $field_base_table.entity_type AND $table_alias.$id_key = $field_base_table.$id_key");
    }
    else {
      $select_query = db_select($tablename, $table_alias);
      $select_query->addTag('entity_field_access');
      $select_query->addMetaData('base_table', $tablename);
      $select_query->fields($table_alias, array('entity_type', 'entity_id', 'revision_id', 'bundle'));
      $field_base_table = $table_alias;
    }
    if ($field['cardinality'] != 1) {
      $select_query->distinct();
    }
  }

  // Add field conditions.
  foreach ($query->fieldConditions as $key => $condition) {
    $table_alias = $table_aliases[$key];
    $field = $condition['field'];
    // Add the specified condition.
    $sql_field = "$table_alias." . _field_sql_storage_columnname($field['field_name'], $condition['column']);
    $query->addCondition($select_query, $sql_field, $condition);
    // Add delta / language group conditions.
    foreach (array('delta', 'language') as $column) {
      if (isset($condition[$column . '_group'])) {
        $group_name = $condition[$column . '_group'];
        if (!isset($groups[$column][$group_name])) {
          $groups[$column][$group_name] = $table_alias;
        }
        else {
          $select_query->where("$table_alias.$column = " . $groups[$column][$group_name] . ".$column");
        }
      }
    }
  }

  if (isset($query->deleted)) {
    $select_query->condition("$field_base_table.deleted", (int) $query->deleted);
  }

  // Is there a need to sort the query by property?
  $has_property_order = FALSE;
  foreach ($query->order as $order) {
    if ($order['type'] == 'property') {
      $has_property_order = TRUE;
    }
  }

  if ($query->propertyConditions || $has_property_order) {
    if (empty($query->entityConditions['entity_type']['value'])) {
      throw new EntityFieldQueryException('Property conditions and orders must have an entity type defined.');
    }
    $entity_type = $query->entityConditions['entity_type']['value'];
    $entity_base_table = _field_sql_storage_query_join_entity($select_query, $entity_type, $field_base_table);
    $query->entityConditions['entity_type']['operator'] = '=';
    foreach ($query->propertyConditions as $property_condition) {
      $query->addCondition($select_query, "$entity_base_table." . $property_condition['column'], $property_condition);
    }
  }
  foreach ($query->entityConditions as $key => $condition) {
    $query->addCondition($select_query, "$field_base_table.$key", $condition);
  }

  // Order the query.
  foreach ($query->order as $order) {
    if ($order['type'] == 'entity') {
      $key = $order['specifier'];
      $select_query->orderBy("$field_base_table.$key", $order['direction']);
    }
    elseif ($order['type'] == 'field') {
      $specifier = $order['specifier'];
      $field = $specifier['field'];
      $table_alias = $table_aliases[$specifier['index']];
      $sql_field = "$table_alias." . _field_sql_storage_columnname($field['field_name'], $specifier['column']);
      $select_query->orderBy($sql_field, $order['direction']);
    }
    elseif ($order['type'] == 'property') {
      $select_query->orderBy("$entity_base_table." . $order['specifier'], $order['direction']);
    }
  }

  return $query->finishQuery($select_query, $id_key);
";}s:31:"hook_field_storage_create_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_storage_create_field";s:10:"definition";s:48:"function hook_field_storage_create_field($field)";s:11:"description";s:31:"Act on creation of a new field.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:162:"
  $schema = _field_sql_storage_schema($field);
  foreach ($schema as $name => $table) {
    db_create_table($name, $table);
  }
  drupal_get_schema(NULL, TRUE);
";}s:31:"hook_field_storage_delete_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_storage_delete_field";s:10:"definition";s:48:"function hook_field_storage_delete_field($field)";s:11:"description";s:27:"Act on deletion of a field.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:634:"
  // Mark all data associated with the field for deletion.
  $field['deleted'] = 0;
  $table = _field_sql_storage_tablename($field);
  $revision_table = _field_sql_storage_revision_tablename($field);
  db_update($table)
    ->fields(array('deleted' => 1))
    ->execute();

  // Move the table to a unique name while the table contents are being deleted.
  $field['deleted'] = 1;
  $new_table = _field_sql_storage_tablename($field);
  $revision_new_table = _field_sql_storage_revision_tablename($field);
  db_rename_table($table, $new_table);
  db_rename_table($revision_table, $revision_new_table);
  drupal_get_schema(NULL, TRUE);
";}s:34:"hook_field_storage_delete_instance";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_field_storage_delete_instance";s:10:"definition";s:54:"function hook_field_storage_delete_instance($instance)";s:11:"description";s:36:"Act on deletion of a field instance.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:542:"
  $field = field_info_field($instance['field_name']);
  $table_name = _field_sql_storage_tablename($field);
  $revision_name = _field_sql_storage_revision_tablename($field);
  db_update($table_name)
    ->fields(array('deleted' => 1))
    ->condition('entity_type', $instance['entity_type'])
    ->condition('bundle', $instance['bundle'])
    ->execute();
  db_update($revision_name)
    ->fields(array('deleted' => 1))
    ->condition('entity_type', $instance['entity_type'])
    ->condition('bundle', $instance['bundle'])
    ->execute();
";}s:27:"hook_field_storage_pre_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:27:"hook_field_storage_pre_load";s:10:"definition";s:92:"function hook_field_storage_pre_load($entity_type, $entities, $age, &$skip_fields, $options)";s:11:"description";s:48:"Act before the storage backends load field data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:29:"hook_field_storage_pre_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_field_storage_pre_insert";s:10:"definition";s:76:"function hook_field_storage_pre_insert($entity_type, $entity, &$skip_fields)";s:11:"description";s:50:"Act before the storage backends insert field data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:682:"
  if ($entity_type == 'node' && $entity->status && _forum_node_check_node_type($entity)) {
    $query = db_insert('forum_index')->fields(array('nid', 'title', 'tid', 'sticky', 'created', 'comment_count', 'last_comment_timestamp'));
    foreach ($entity->taxonomy_forums as $language) {
      foreach ($language as $delta) {
        $query->values(array(
          'nid' => $entity->nid,
          'title' => $entity->title,
          'tid' => $delta['value'],
          'sticky' => $entity->sticky,
          'created' => $entity->created,
          'comment_count' => 0,
          'last_comment_timestamp' => $entity->created,
        ));
      }
    }
    $query->execute();
  }
";}s:29:"hook_field_storage_pre_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_field_storage_pre_update";s:10:"definition";s:76:"function hook_field_storage_pre_update($entity_type, $entity, &$skip_fields)";s:11:"description";s:50:"Act before the storage backends update field data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:1392:"
  $first_call = &drupal_static(__FUNCTION__, array());

  if ($entity_type == 'node' && $entity->status && _forum_node_check_node_type($entity)) {
    // We don't maintain data for old revisions, so clear all previous values
    // from the table. Since this hook runs once per field, per entity, make
    // sure we only wipe values once.
    if (!isset($first_call[$entity->nid])) {
      $first_call[$entity->nid] = FALSE;
      db_delete('forum_index')->condition('nid', $entity->nid)->execute();
    }
    // Only save data to the table if the node is published.
    if ($entity->status) {
      $query = db_insert('forum_index')->fields(array('nid', 'title', 'tid', 'sticky', 'created', 'comment_count', 'last_comment_timestamp'));
      foreach ($entity->taxonomy_forums as $language) {
        foreach ($language as $delta) {
          $query->values(array(
            'nid' => $entity->nid,
            'title' => $entity->title,
            'tid' => $delta['value'],
            'sticky' => $entity->sticky,
            'created' => $entity->created,
            'comment_count' => 0,
            'last_comment_timestamp' => $entity->created,
          ));
        }
      }
      $query->execute();
      // The logic for determining last_comment_count is fairly complex, so
      // call _forum_update_forum_index() too.
      _forum_update_forum_index($entity->nid);
    }
  }
";}s:26:"hook_field_info_max_weight";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_field_info_max_weight";s:10:"definition";s:68:"function hook_field_info_max_weight($entity_type, $bundle, $context)";s:11:"description";s:75:"Returns the maximum weight for the entity components handled by the module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:196:"
  $weights = array();

  foreach (my_module_entity_additions($entity_type, $bundle, $context) as $addition) {
    $weights[] = $addition['weight'];
  }

  return $weights ? max($weights) : NULL;
";}s:24:"hook_field_display_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_display_alter";s:10:"definition";s:54:"function hook_field_display_alter(&$display, $context)";s:11:"description";s:64:"Alters the display settings of a field before it gets displayed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:416:"
  // Leave field labels out of the search index.
  // Note: The check against $context['entity_type'] == 'node' could be avoided
  // by using hook_field_display_node_alter() instead of
  // hook_field_display_alter(), resulting in less function calls when
  // rendering non-node entities.
  if ($context['entity_type'] == 'node' && $context['view_mode'] == 'search_index') {
    $display['label'] = 'hidden';
  }
";}s:36:"hook_field_display_ENTITY_TYPE_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:36:"hook_field_display_ENTITY_TYPE_alter";s:10:"definition";s:66:"function hook_field_display_ENTITY_TYPE_alter(&$display, $context)";s:11:"description";s:87:"Alters the display settings of a field on a given entity type before it gets displayed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:137:"
  // Leave field labels out of the search index.
  if ($context['view_mode'] == 'search_index') {
    $display['label'] = 'hidden';
  }
";}s:37:"hook_field_extra_fields_display_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_field_extra_fields_display_alter";s:10:"definition";s:68:"function hook_field_extra_fields_display_alter(&$displays, $context)";s:11:"description";s:75:"Alters the display settings of pseudo-fields before an entity is displayed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:141:"
  if ($context['entity_type'] == 'taxonomy_term' && $context['view_mode'] == 'full') {
    $displays['description']['visible'] = FALSE;
  }
";}s:46:"hook_field_widget_properties_ENTITY_TYPE_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:46:"hook_field_widget_properties_ENTITY_TYPE_alter";s:10:"definition";s:75:"function hook_field_widget_properties_ENTITY_TYPE_alter(&$widget, $context)";s:11:"description";s:71:"Alters the widget properties of a field instance on a given entity type";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:223:"
  // Change a widget's type according to the time of day.
  $field = $context['field'];
  if ($field['field_name'] == 'field_foo') {
    $time = date('H');
    $widget['type'] = $time < 12 ? 'widget_am' : 'widget_pm';
  }
";}s:23:"hook_field_create_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_create_field";s:10:"definition";s:40:"function hook_field_create_field($field)";s:11:"description";s:29:"Act on a field being created.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:26:"hook_field_create_instance";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_field_create_instance";s:10:"definition";s:46:"function hook_field_create_instance($instance)";s:11:"description";s:38:"Act on a field instance being created.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:24:"hook_field_update_forbid";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_update_forbid";s:10:"definition";s:66:"function hook_field_update_forbid($field, $prior_field, $has_data)";s:11:"description";s:37:"Forbid a field update from occurring.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:907:"
  // A 'list' field stores integer keys mapped to display values. If
  // the new field will have fewer values, and any data exists for the
  // abandoned keys, the field will have no way to display them. So,
  // forbid such an update.
  if ($has_data && count($field['settings']['allowed_values']) < count($prior_field['settings']['allowed_values'])) {
    // Identify the keys that will be lost.
    $lost_keys = array_diff(array_keys($field['settings']['allowed_values']), array_keys($prior_field['settings']['allowed_values']));
    // If any data exist for those keys, forbid the update.
    $query = new EntityFieldQuery();
    $found = $query
      ->fieldCondition($prior_field['field_name'], 'value', $lost_keys)
      ->range(0, 1)
      ->execute();
    if ($found) {
      throw new FieldUpdateForbiddenException("Cannot update a list field not to include keys with existing data");
    }
  }
";}s:23:"hook_field_update_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_update_field";s:10:"definition";s:65:"function hook_field_update_field($field, $prior_field, $has_data)";s:11:"description";s:29:"Act on a field being updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:127:"
  // Reset the static value that keeps track of allowed values for list fields.
  drupal_static_reset('list_allowed_values');
";}s:23:"hook_field_delete_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_delete_field";s:10:"definition";s:40:"function hook_field_delete_field($field)";s:11:"description";s:29:"Act on a field being deleted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:26:"hook_field_update_instance";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_field_update_instance";s:10:"definition";s:63:"function hook_field_update_instance($instance, $prior_instance)";s:11:"description";s:38:"Act on a field instance being updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:26:"hook_field_delete_instance";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_field_delete_instance";s:10:"definition";s:46:"function hook_field_delete_instance($instance)";s:11:"description";s:38:"Act on a field instance being deleted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:21:"hook_field_read_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_field_read_field";s:10:"definition";s:38:"function hook_field_read_field($field)";s:11:"description";s:50:"Act on field records being read from the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:24:"hook_field_read_instance";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_read_instance";s:10:"definition";s:44:"function hook_field_read_instance($instance)";s:11:"description";s:51:"Act on a field record being read from the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:33:"
  // @todo Needs function body.
";}s:22:"hook_field_purge_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_field_purge_field";s:10:"definition";s:39:"function hook_field_purge_field($field)";s:11:"description";s:41:"Acts when a field record is being purged.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:90:"
  db_delete('my_module_field_info')
    ->condition('id', $field['id'])
    ->execute();
";}s:25:"hook_field_purge_instance";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_field_purge_instance";s:10:"definition";s:45:"function hook_field_purge_instance($instance)";s:11:"description";s:43:"Acts when a field instance is being purged.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:102:"
  db_delete('my_module_field_instance_info')
    ->condition('id', $instance['id'])
    ->execute();
";}s:30:"hook_field_storage_purge_field";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_field_storage_purge_field";s:10:"definition";s:47:"function hook_field_storage_purge_field($field)";s:11:"description";s:63:"Remove field storage information when a field record is purged.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:184:"
  $table_name = _field_sql_storage_tablename($field);
  $revision_name = _field_sql_storage_revision_tablename($field);
  db_drop_table($table_name);
  db_drop_table($revision_name);
";}s:39:"hook_field_storage_purge_field_instance";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:39:"hook_field_storage_purge_field_instance";s:10:"definition";s:59:"function hook_field_storage_purge_field_instance($instance)";s:11:"description";s:65:"Remove field storage information when a field instance is purged.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:102:"
  db_delete('my_module_field_instance_info')
    ->condition('id', $instance['id'])
    ->execute();
";}s:24:"hook_field_storage_purge";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_storage_purge";s:10:"definition";s:75:"function hook_field_storage_purge($entity_type, $entity, $field, $instance)";s:11:"description";s:59:"Remove field storage information when field data is purged.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:439:"
  list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);

  $table_name = _field_sql_storage_tablename($field);
  $revision_name = _field_sql_storage_revision_tablename($field);
  db_delete($table_name)
    ->condition('entity_type', $entity_type)
    ->condition('entity_id', $id)
    ->execute();
  db_delete($revision_name)
    ->condition('entity_type', $entity_type)
    ->condition('entity_id', $id)
    ->execute();
";}s:17:"hook_field_access";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_field_access";s:10:"definition";s:72:"function hook_field_access($op, $field, $entity_type, $entity, $account)";s:11:"description";s:55:"Determine whether the user has access to a given field.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/field.api.php";s:4:"body";s:150:"
  if ($field['field_name'] == 'field_of_interest' && $op == 'edit') {
    return user_access('edit field of interest', $account);
  }
  return TRUE;
";}s:17:"hook_options_list";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_options_list";s:10:"definition";s:68:"function hook_options_list($field, $instance, $entity_type, $entity)";s:11:"description";s:56:"Returns the list of options to be displayed for a field.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"field";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/options.api.php";s:4:"body";s:946:"
  // Sample structure.
  $options = array(
    0 => t('Zero'),
    1 => t('One'),
    2 => t('Two'),
    3 => t('Three'),
  );

  // Sample structure with groups. Only one level of nesting is allowed. This
  // is only supported by the 'options_select' widget. Other widgets will
  // flatten the array.
  $options = array(
    t('First group') => array(
      0 => t('Zero'),
    ),
    t('Second group') => array(
      1 => t('One'),
      2 => t('Two'),
    ),
    3 => t('Three'),
  );

  // In actual implementations, the array of options will most probably depend
  // on properties of the field. Example from taxonomy.module:
  $options = array();
  foreach ($field['settings']['allowed_values'] as $tree) {
    $terms = taxonomy_get_tree($tree['vid'], $tree['parent']);
    if ($terms) {
      foreach ($terms as $term) {
        $options[$term->tid] = str_repeat('-', $term->depth) . $term->name;
      }
    }
  }

  return $options;
";}}s:8:"field_ui";a:5:{s:24:"hook_field_settings_form";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_field_settings_form";s:10:"definition";s:63:"function hook_field_settings_form($field, $instance, $has_data)";s:11:"description";s:38:"Add settings to a field settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"field_ui";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/field_ui.api.php";s:4:"body";s:408:"
  $settings = $field['settings'];
  $form['max_length'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum length'),
    '#default_value' => $settings['max_length'],
    '#required' => FALSE,
    '#element_validate' => array('element_validate_integer_positive'),
    '#description' => t('The maximum length of the field in characters. Leave blank for an unlimited size.'),
  );
  return $form;
";}s:33:"hook_field_instance_settings_form";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_field_instance_settings_form";s:10:"definition";s:61:"function hook_field_instance_settings_form($field, $instance)";s:11:"description";s:48:"Add settings to an instance field settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"field_ui";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/field_ui.api.php";s:4:"body";s:835:"
  $settings = $instance['settings'];

  $form['text_processing'] = array(
    '#type' => 'radios',
    '#title' => t('Text processing'),
    '#default_value' => $settings['text_processing'],
    '#options' => array(
      t('Plain text'),
      t('Filtered text (user selects text format)'),
    ),
  );
  if ($field['type'] == 'text_with_summary') {
    $form['display_summary'] = array(
      '#type' => 'select',
      '#title' => t('Display summary'),
      '#options' => array(
        t('No'),
        t('Yes'),
      ),
      '#description' => t('Display the summary to allow the user to input a summary value. Hide the summary to automatically fill it with a trimmed portion from the main post.'),
      '#default_value' => !empty($settings['display_summary']) ? $settings['display_summary'] :  0,
    );
  }

  return $form;
";}s:31:"hook_field_widget_settings_form";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_field_widget_settings_form";s:10:"definition";s:59:"function hook_field_widget_settings_form($field, $instance)";s:11:"description";s:39:"Add settings to a widget settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"field_ui";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/field_ui.api.php";s:4:"body";s:638:"
  $widget = $instance['widget'];
  $settings = $widget['settings'];

  if ($widget['type'] == 'text_textfield') {
    $form['size'] = array(
      '#type' => 'textfield',
      '#title' => t('Size of textfield'),
      '#default_value' => $settings['size'],
      '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
    );
  }
  else {
    $form['rows'] = array(
      '#type' => 'textfield',
      '#title' => t('Rows'),
      '#default_value' => $settings['rows'],
      '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
    );
  }

  return $form;
";}s:34:"hook_field_formatter_settings_form";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_field_formatter_settings_form";s:10:"definition";s:95:"function hook_field_formatter_settings_form($field, $instance, $view_mode, $form, &$form_state)";s:11:"description";s:53:"Specify the form elements for a formatter's settings.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"field_ui";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/field_ui.api.php";s:4:"body";s:504:"
  $display = $instance['display'][$view_mode];
  $settings = $display['settings'];

  $element = array();

  if ($display['type'] == 'text_trimmed' || $display['type'] == 'text_summary_or_trimmed') {
    $element['trim_length'] = array(
      '#title' => t('Length'),
      '#type' => 'textfield',
      '#size' => 20,
      '#default_value' => $settings['trim_length'],
      '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
    );
  }

  return $element;

";}s:37:"hook_field_formatter_settings_summary";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_field_formatter_settings_summary";s:10:"definition";s:77:"function hook_field_formatter_settings_summary($field, $instance, $view_mode)";s:11:"description";s:73:"Return a short summary for the current formatter settings of an instance.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"field_ui";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/field_ui.api.php";s:4:"body";s:307:"
  $display = $instance['display'][$view_mode];
  $settings = $display['settings'];

  $summary = '';

  if ($display['type'] == 'text_trimmed' || $display['type'] == 'text_summary_or_trimmed') {
    $summary = t('Length: @chars chars', array('@chars' => $settings['trim_length']));
  }

  return $summary;
";}}s:4:"file";a:2:{s:25:"hook_file_download_access";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_file_download_access";s:10:"definition";s:69:"function hook_file_download_access($file_item, $entity_type, $entity)";s:11:"description";s:33:"Control download access to files.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"file";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/file.api.php";s:4:"body";s:78:"
  if ($entity_type == 'node') {
    return node_access('view', $entity);
  }
";}s:31:"hook_file_download_access_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_file_download_access_alter";s:10:"definition";s:85:"function hook_file_download_access_alter(&$grants, $file_item, $entity_type, $entity)";s:11:"description";s:50:"Alter the access rules applied to a file download.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"file";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/file.api.php";s:4:"body";s:162:"
  // For our example module, we always enforce the rules set by node module.
  if (isset($grants['node'])) {
    $grants = array('node' => $grants['node']);
  }
";}}s:5:"media";a:15:{s:19:"hook_file_type_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_file_type_info";s:10:"definition";s:30:"function hook_file_type_info()";s:11:"description";s:18:"Define file types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:80:"
  return array(
    'image' => array(
      'label' => t('Image'),
    ),
  );
";}s:25:"hook_file_type_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_file_type_info_alter";s:10:"definition";s:42:"function hook_file_type_info_alter(&$info)";s:11:"description";s:34:"Perform alterations on file types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:25:"
  // @todo Add example.
";}s:25:"hook_file_type_TYPE_claim";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_file_type_TYPE_claim";s:10:"definition";s:48:"function hook_file_type_TYPE_claim($file, $type)";s:11:"description";s:24:"@todo Add documentation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:1:"
";}s:32:"hook_file_type_TYPE_default_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_file_type_TYPE_default_view";s:10:"definition";s:71:"function hook_file_type_TYPE_default_view($file, $view_mode, $langcode)";s:11:"description";s:24:"@todo Add documentation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:1:"
";}s:24:"hook_file_formatter_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_file_formatter_info";s:10:"definition";s:35:"function hook_file_formatter_info()";s:11:"description";s:23:"Define file formatters.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:25:"
  // @todo Add example.
";}s:30:"hook_file_formatter_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_file_formatter_info_alter";s:10:"definition";s:47:"function hook_file_formatter_info_alter(&$info)";s:11:"description";s:39:"Perform alterations on file formatters.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:25:"
  // @todo Add example.
";}s:34:"hook_file_formatter_FORMATTER_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_file_formatter_FORMATTER_view";s:10:"definition";s:71:"function hook_file_formatter_FORMATTER_view($file, $display, $langcode)";s:11:"description";s:24:"@todo Add documentation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:1:"
";}s:38:"hook_file_formatter_FORMATTER_settings";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:38:"hook_file_formatter_FORMATTER_settings";s:10:"definition";s:79:"function hook_file_formatter_FORMATTER_settings($form, &$form_state, $settings)";s:11:"description";s:24:"@todo Add documentation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:1:"
";}s:24:"hook_file_displays_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_file_displays_alter";s:10:"definition";s:63:"function hook_file_displays_alter($displays, $file, $view_mode)";s:11:"description";s:24:"@todo Add documentation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:1:"
";}s:14:"hook_file_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_file_view";s:10:"definition";s:53:"function hook_file_view($file, $view_mode, $langcode)";s:11:"description";s:24:"@todo Add documentation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:1:"
";}s:20:"hook_file_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_file_view_alter";s:10:"definition";s:44:"function hook_file_view_alter($build, $type)";s:11:"description";s:24:"@todo Add documentation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:59:"/home/lit/lit-dev/.git/../drush/hooks/7/file_entity.api.php";s:4:"body";s:1:"
";}s:30:"hook_media_browser_plugin_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_media_browser_plugin_view";s:10:"definition";s:62:"function hook_media_browser_plugin_view($plugin_name, $params)";s:11:"description";s:49:"Return an array of plugins for the media browser.";s:11:"destination";s:17:"%module.media.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/media.api.php";s:4:"body";s:2:"

";}s:30:"hook_media_browser_plugin_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_media_browser_plugin_info";s:10:"definition";s:41:"function hook_media_browser_plugin_info()";s:11:"description";s:48:"Returns a list of plugins for the media browser.";s:11:"destination";s:17:"%module.media.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/media.api.php";s:4:"body";s:2:"

";}s:32:"hook_media_token_to_markup_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_media_token_to_markup_alter";s:10:"definition";s:87:"function hook_media_token_to_markup_alter(array &$element, array $tag, array $settings)";s:11:"description";s:48:"Alter the output generated by Media filter tags.";s:11:"destination";s:17:"%module.media.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/media.api.php";s:4:"body";s:176:"
  if (empty($settings['wysiwyg'])) {
    $element['#attributes']['alt'] = t('This media has been output using the @mode view mode.', array('@mode' => $tag['view_mode']));
  }
";}s:29:"hook_media_internet_providers";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_media_internet_providers";s:10:"definition";s:40:"function hook_media_internet_providers()";s:11:"description";s:60:"Implementors return an multidim array, keyed by a class name";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"media";s:9:"file_path";s:62:"/home/lit/lit-dev/.git/../drush/hooks/7/media_internet.api.php";s:4:"body";s:112:"
  return array(
    'youtube' => array(
      'title' => 'youtube',
      'image' => 'youtube.jpg'
    ),
  );
";}}s:6:"filter";a:9:{s:16:"hook_filter_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_filter_info";s:10:"definition";s:27:"function hook_filter_info()";s:11:"description";s:23:"Define content filters.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:4:{i:0;s:24:"callback_filter_settings";i:1;s:23:"callback_filter_prepare";i:2;s:23:"callback_filter_process";i:3;s:20:"callback_filter_tips";}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:931:"
  $filters['filter_html'] = array(
    'title' => t('Limit allowed HTML tags'),
    'description' => t('Allows you to restrict the HTML tags the user can use. It will also remove harmful content such as JavaScript events, JavaScript URLs and CSS styles from those tags that are not removed.'),
    'process callback' => '_filter_html',
    'settings callback' => '_filter_html_settings',
    'default settings' => array(
      'allowed_html' => '<a> <em> <strong> <cite> <blockquote> <code> <ul> <ol> <li> <dl> <dt> <dd>',
      'filter_html_help' => 1,
      'filter_html_nofollow' => 0,
    ),
    'tips callback' => '_filter_html_tips',
  );
  $filters['filter_autop'] = array(
    'title' => t('Convert line breaks'),
    'description' => t('Converts line breaks into HTML (i.e. &lt;br&gt; and &lt;p&gt;) tags.'),
    'process callback' => '_filter_autop',
    'tips callback' => '_filter_autop_tips',
  );
  return $filters;
";}s:22:"hook_filter_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_filter_info_alter";s:10:"definition";s:39:"function hook_filter_info_alter(&$info)";s:11:"description";s:42:"Perform alterations on filter definitions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:333:"
  // Replace the PHP evaluator process callback with an improved
  // PHP evaluator provided by a module.
  $info['php_code']['process callback'] = 'my_module_php_evaluator';

  // Alter the default settings of the URL filter provided by core.
  $info['filter_url']['default settings'] = array(
    'filter_url_length' => 100,
  );
";}s:24:"callback_filter_settings";a:9:{s:4:"type";s:8:"callback";s:4:"name";s:24:"callback_filter_settings";s:10:"definition";s:93:"function callback_filter_settings($form, &$form_state, $filter, $format, $defaults, $filters)";s:11:"description";s:44:"Provide a settings form for filter settings.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:253:"
  $filter->settings += $defaults;

  $elements = array();
  $elements['nofollow'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add rel="nofollow" to all links'),
    '#default_value' => $filter->settings['nofollow'],
  );
  return $elements;
";}s:23:"callback_filter_prepare";a:9:{s:4:"type";s:8:"callback";s:4:"name";s:23:"callback_filter_prepare";s:10:"definition";s:87:"function callback_filter_prepare($text, $filter, $format, $langcode, $cache, $cache_id)";s:11:"description";s:54:"Provide prepared text with special characters escaped.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:152:"
  // Escape <code> and </code> tags.
  $text = preg_replace('|<code>(.+?)</code>|se', "[codefilter_code]$1[/codefilter_code]", $text);
  return $text;
";}s:23:"callback_filter_process";a:9:{s:4:"type";s:8:"callback";s:4:"name";s:23:"callback_filter_process";s:10:"definition";s:87:"function callback_filter_process($text, $filter, $format, $langcode, $cache, $cache_id)";s:11:"description";s:56:"Provide text filtered to conform to the supplied format.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:118:"
  $text = preg_replace('|\[codefilter_code\](.+?)\[/codefilter_code\]|se', "<pre>$1</pre>", $text);

  return $text;
";}s:20:"callback_filter_tips";a:9:{s:4:"type";s:8:"callback";s:4:"name";s:20:"callback_filter_tips";s:10:"definition";s:54:"function callback_filter_tips($filter, $format, $long)";s:11:"description";s:30:"Return help text for a filter.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:338:"
 if ($long) {
    return t('Lines and paragraphs are automatically recognized. The &lt;br /&gt; line break, &lt;p&gt; paragraph and &lt;/p&gt; close paragraph tags are inserted automatically. If paragraphs are not recognized simply add a couple blank lines.');
  }
  else {
    return t('Lines and paragraphs break automatically.');
  }
";}s:25:"hook_filter_format_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_filter_format_insert";s:10:"definition";s:43:"function hook_filter_format_insert($format)";s:11:"description";s:56:"Perform actions when a new text format has been created.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}s:25:"hook_filter_format_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_filter_format_update";s:10:"definition";s:43:"function hook_filter_format_update($format)";s:11:"description";s:52:"Perform actions when a text format has been updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}s:26:"hook_filter_format_disable";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_filter_format_disable";s:10:"definition";s:44:"function hook_filter_format_disable($format)";s:11:"description";s:53:"Perform actions when a text format has been disabled.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"filter";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/filter.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}}s:4:"help";a:1:{s:9:"hook_help";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_help";s:10:"definition";s:31:"function hook_help($path, $arg)";s:11:"description";s:25:"Provide online user help.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"help";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/help.api.php";s:4:"body";s:1141:"
  switch ($path) {
    // Main module help for the block module
    case 'admin/help#block':
      return '<p>' . t('Blocks are boxes of content rendered into an area, or region, of a web page. The default theme Bartik, for example, implements the regions "Sidebar first", "Sidebar second", "Featured", "Content", "Header", "Footer", etc., and a block may appear in any one of these areas. The <a href="@blocks">blocks administration page</a> provides a drag-and-drop interface for assigning a block to a region, and for controlling the order of blocks within regions.', array('@blocks' => url('admin/structure/block'))) . '</p>';

    // Help for another path in the block module
    case 'admin/structure/block':
      return '<p>' . t('This page provides a drag-and-drop interface for assigning a block to a region, and for controlling the order of blocks within regions. Since not all themes implement the same regions, or display regions in the same way, blocks are positioned on a per-theme basis. Remember that your changes will not be saved until you click the <em>Save blocks</em> button at the bottom of the page.') . '</p>';
  }
";}}s:5:"image";a:7:{s:22:"hook_image_effect_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_image_effect_info";s:10:"definition";s:33:"function hook_image_effect_info()";s:11:"description";s:60:"Define information about image effects provided by a module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"image";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/image.api.php";s:4:"body";s:413:"
  $effects = array();

  $effects['mymodule_resize'] = array(
    'label' => t('Resize'),
    'help' => t('Resize an image to an exact set of dimensions, ignoring aspect ratio.'),
    'effect callback' => 'mymodule_resize_effect',
    'dimensions callback' => 'mymodule_resize_dimensions',
    'form callback' => 'mymodule_resize_form',
    'summary theme' => 'mymodule_resize_summary',
  );

  return $effects;
";}s:28:"hook_image_effect_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_image_effect_info_alter";s:10:"definition";s:48:"function hook_image_effect_info_alter(&$effects)";s:11:"description";s:59:"Alter the information provided in hook_image_effect_info().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"image";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/image.api.php";s:4:"body";s:279:"
  // Override the Image module's crop effect with more options.
  $effects['image_crop']['effect callback'] = 'mymodule_crop_effect';
  $effects['image_crop']['dimensions callback'] = 'mymodule_crop_dimensions';
  $effects['image_crop']['form callback'] = 'mymodule_crop_form';
";}s:21:"hook_image_style_save";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_image_style_save";s:10:"definition";s:38:"function hook_image_style_save($style)";s:11:"description";s:32:"Respond to image style updating.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"image";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/image.api.php";s:4:"body";s:302:"
  // If a module defines an image style and that style is renamed by the user
  // the module should update any references to that style.
  if (isset($style['old_name']) && $style['old_name'] == variable_get('mymodule_image_style', '')) {
    variable_set('mymodule_image_style', $style['name']);
  }
";}s:23:"hook_image_style_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_image_style_delete";s:10:"definition";s:40:"function hook_image_style_delete($style)";s:11:"description";s:32:"Respond to image style deletion.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"image";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/image.api.php";s:4:"body";s:292:"
  // Administrators can choose an optional replacement style when deleting.
  // Update the modules style variable accordingly.
  if (isset($style['old_name']) && $style['old_name'] == variable_get('mymodule_image_style', '')) {
    variable_set('mymodule_image_style', $style['name']);
  }
";}s:22:"hook_image_style_flush";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_image_style_flush";s:10:"definition";s:39:"function hook_image_style_flush($style)";s:11:"description";s:32:"Respond to image style flushing.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"image";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/image.api.php";s:4:"body";s:115:"
  // Empty cached data that contains information about the style.
  cache_clear_all('*', 'cache_mymodule', TRUE);
";}s:23:"hook_image_styles_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_image_styles_alter";s:10:"definition";s:42:"function hook_image_styles_alter(&$styles)";s:11:"description";s:62:"Modify any image styles provided by other modules or the user.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"image";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/image.api.php";s:4:"body";s:365:"
  // Check that we only affect a default style.
  if ($styles['thumbnail']['storage'] == IMAGE_STORAGE_DEFAULT) {
    // Add an additional effect to the thumbnail style.
    $styles['thumbnail']['effects'][] = array(
      'name' => 'image_desaturate',
      'data' => array(),
      'weight' => 1,
      'effect callback' => 'image_desaturate_effect',
    );
  }
";}s:25:"hook_image_default_styles";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_image_default_styles";s:10:"definition";s:36:"function hook_image_default_styles()";s:11:"description";s:62:"Provide module-based image styles for reuse throughout Drupal.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"image";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/image.api.php";s:4:"body";s:415:"
  $styles = array();

  $styles['mymodule_preview'] = array(
    'label' => 'My module preview',
    'effects' => array(
      array(
        'name' => 'image_scale',
        'data' => array('width' => 400, 'height' => 400, 'upscale' => 1),
        'weight' => 0,
      ),
      array(
        'name' => 'image_desaturate',
        'data' => array(),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
";}}s:6:"system";a:136:{s:18:"hook_language_init";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_language_init";s:10:"definition";s:29:"function hook_language_init()";s:11:"description";s:71:"Allows modules to act after language initialization has been performed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/language.api.php";s:4:"body";s:218:"
  global $language, $conf;

  switch ($language->language) {
    case 'it':
      $conf['site_name'] = 'Il mio sito Drupal';
      break;

    case 'fr':
      $conf['site_name'] = 'Mon site Drupal';
      break;
  }
";}s:32:"hook_language_switch_links_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_language_switch_links_alter";s:10:"definition";s:70:"function hook_language_switch_links_alter(array &$links, $type, $path)";s:11:"description";s:47:"Perform alterations on language switcher links.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/language.api.php";s:4:"body";s:221:"
  global $language;

  if ($type == LANGUAGE_TYPE_CONTENT && isset($links[$language->language])) {
    foreach ($links[$language->language] as $link) {
      $link['attributes']['class'][] = 'active-language';
    }
  }
";}s:24:"hook_language_types_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_language_types_info";s:10:"definition";s:35:"function hook_language_types_info()";s:11:"description";s:22:"Define language types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/language.api.php";s:4:"body";s:259:"
  return array(
    'custom_language_type' => array(
      'name' => t('Custom language'),
      'description' => t('A custom language type.'),
    ),
    'fixed_custom_language_type' => array(
      'fixed' => array('custom_language_provider'),
    ),
  );
";}s:30:"hook_language_types_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_language_types_info_alter";s:10:"definition";s:63:"function hook_language_types_info_alter(array &$language_types)";s:11:"description";s:38:"Perform alterations on language types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/language.api.php";s:4:"body";s:161:"
  if (isset($language_types['custom_language_type'])) {
    $language_types['custom_language_type_custom']['description'] = t('A far better description.');
  }
";}s:30:"hook_language_negotiation_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_language_negotiation_info";s:10:"definition";s:41:"function hook_language_negotiation_info()";s:11:"description";s:38:"Define language negotiation providers.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/language.api.php";s:4:"body";s:588:"
  return array(
    'custom_language_provider' => array(
      'callbacks' => array(
        'language' => 'custom_language_provider_callback',
        'switcher' => 'custom_language_switcher_callback',
        'url_rewrite' => 'custom_language_url_rewrite_callback',
      ),
      'file' => drupal_get_path('module', 'custom') . '/custom.module',
      'weight' => -4,
      'types' => array('custom_language_type'),
      'name' => t('Custom language negotiation provider'),
      'description' => t('This is a custom language negotiation provider.'),
      'cache' => 0,
    ),
  );
";}s:36:"hook_language_negotiation_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:36:"hook_language_negotiation_info_alter";s:10:"definition";s:73:"function hook_language_negotiation_info_alter(array &$language_providers)";s:11:"description";s:53:"Perform alterations on language negoiation providers.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/language.api.php";s:4:"body";s:202:"
  if (isset($language_providers['custom_language_provider'])) {
    $language_providers['custom_language_provider']['config'] = 'admin/config/regional/language/configure/custom-language-provider';
  }
";}s:39:"hook_language_fallback_candidates_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:39:"hook_language_fallback_candidates_alter";s:10:"definition";s:77:"function hook_language_fallback_candidates_alter(array &$fallback_candidates)";s:11:"description";s:56:"Perform alterations on the language fallback candidates.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/language.api.php";s:4:"body";s:63:"
  $fallback_candidates = array_reverse($fallback_candidates);
";}s:14:"hook_hook_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_hook_info";s:10:"definition";s:25:"function hook_hook_info()";s:11:"description";s:55:"Defines one or more hooks that are exposed by a module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:138:"
  $hooks['token_info'] = array(
    'group' => 'tokens',
  );
  $hooks['tokens'] = array(
    'group' => 'tokens',
  );
  return $hooks;
";}s:20:"hook_hook_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_hook_info_alter";s:10:"definition";s:38:"function hook_hook_info_alter(&$hooks)";s:11:"description";s:40:"Alter information from hook_hook_info().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:205:"
  // Our module wants to completely override the core tokens, so make
  // sure the core token hooks are not found.
  $hooks['token_info']['group'] = 'mytokens';
  $hooks['tokens']['group'] = 'mytokens';
";}s:16:"hook_entity_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_entity_info";s:10:"definition";s:27:"function hook_entity_info()";s:11:"description";s:72:"Inform the base system and the Field API about one or more entity types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:3:{i:0;s:24:"callback_entity_info_uri";i:1;s:26:"callback_entity_info_label";i:2;s:29:"callback_entity_info_language";}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1973:"
  $return = array(
    'node' => array(
      'label' => t('Node'),
      'controller class' => 'NodeController',
      'base table' => 'node',
      'revision table' => 'node_revision',
      'uri callback' => 'node_uri',
      'fieldable' => TRUE,
      'translation' => array(
        'locale' => TRUE,
      ),
      'entity keys' => array(
        'id' => 'nid',
        'revision' => 'vid',
        'bundle' => 'type',
        'language' => 'language',
      ),
      'bundle keys' => array(
        'bundle' => 'type',
      ),
      'bundles' => array(),
      'view modes' => array(
        'full' => array(
          'label' => t('Full content'),
          'custom settings' => FALSE,
        ),
        'teaser' => array(
          'label' => t('Teaser'),
          'custom settings' => TRUE,
        ),
        'rss' => array(
          'label' => t('RSS'),
          'custom settings' => FALSE,
        ),
      ),
    ),
  );

  // Search integration is provided by node.module, so search-related
  // view modes for nodes are defined here and not in search.module.
  if (module_exists('search')) {
    $return['node']['view modes'] += array(
      'search_index' => array(
        'label' => t('Search index'),
        'custom settings' => FALSE,
      ),
      'search_result' => array(
        'label' => t('Search result'),
        'custom settings' => FALSE,
      ),
    );
  }

  // Bundles must provide a human readable name so we can create help and error
  // messages, and the path to attach Field admin pages to.
  foreach (node_type_get_names() as $type => $name) {
    $return['node']['bundles'][$type] = array(
      'label' => $name,
      'admin' => array(
        'path' => 'admin/structure/types/manage/%node_type',
        'real path' => 'admin/structure/types/manage/' . str_replace('_', '-', $type),
        'bundle argument' => 4,
        'access arguments' => array('administer content types'),
      ),
    );
  }

  return $return;
";}s:22:"hook_entity_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_entity_info_alter";s:10:"definition";s:46:"function hook_entity_info_alter(&$entity_info)";s:11:"description";s:22:"Alter the entity info.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:189:"
  // Set the controller class for nodes to an alternate implementation of the
  // DrupalEntityController interface.
  $entity_info['node']['controller class'] = 'MyCustomNodeController';
";}s:16:"hook_entity_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_entity_load";s:10:"definition";s:43:"function hook_entity_load($entities, $type)";s:11:"description";s:28:"Act on entities when loaded.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:99:"
  foreach ($entities as $entity) {
    $entity->foo = mymodule_add_something($entity, $type);
  }
";}s:19:"hook_entity_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_entity_presave";s:10:"definition";s:44:"function hook_entity_presave($entity, $type)";s:11:"description";s:61:"Act on an entity before it is about to be created or updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:36:"
  $entity->changed = REQUEST_TIME;
";}s:18:"hook_entity_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_entity_insert";s:10:"definition";s:43:"function hook_entity_insert($entity, $type)";s:11:"description";s:30:"Act on entities when inserted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:334:"
  // Insert the new entity into a fictional table of all entities.
  $info = entity_get_info($type);
  list($id) = entity_extract_ids($type, $entity);
  db_insert('example_entity')
    ->fields(array(
      'type' => $type,
      'id' => $id,
      'created' => REQUEST_TIME,
      'updated' => REQUEST_TIME,
    ))
    ->execute();
";}s:18:"hook_entity_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_entity_update";s:10:"definition";s:43:"function hook_entity_update($entity, $type)";s:11:"description";s:29:"Act on entities when updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:319:"
  // Update the entity's entry in a fictional table of all entities.
  $info = entity_get_info($type);
  list($id) = entity_extract_ids($type, $entity);
  db_update('example_entity')
    ->fields(array(
      'updated' => REQUEST_TIME,
    ))
    ->condition('type', $type)
    ->condition('id', $id)
    ->execute();
";}s:18:"hook_entity_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_entity_delete";s:10:"definition";s:43:"function hook_entity_delete($entity, $type)";s:11:"description";s:29:"Act on entities when deleted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:261:"
  // Delete the entity's entry from a fictional table of all entities.
  $info = entity_get_info($type);
  list($id) = entity_extract_ids($type, $entity);
  db_delete('example_entity')
    ->condition('type', $type)
    ->condition('id', $id)
    ->execute();
";}s:23:"hook_entity_query_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_entity_query_alter";s:10:"definition";s:40:"function hook_entity_query_alter($query)";s:11:"description";s:37:"Alter or execute an EntityFieldQuery.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:57:"
  $query->executeCallback = 'my_module_query_callback';
";}s:16:"hook_entity_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_entity_view";s:10:"definition";s:64:"function hook_entity_view($entity, $type, $view_mode, $langcode)";s:11:"description";s:49:"Act on entities being assembled before rendering.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:162:"
  $entity->content['my_additional_field'] = array(
    '#markup' => $additional_field,
    '#weight' => 10,
    '#theme' => 'mymodule_my_additional_field',
  );
";}s:22:"hook_entity_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_entity_view_alter";s:10:"definition";s:47:"function hook_entity_view_alter(&$build, $type)";s:11:"description";s:35:"Alter the results of ENTITY_view().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:303:"
  if ($build['#view_mode'] == 'full' && isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;

    // Add a #post_render callback to act on the rendered HTML of the entity.
    $build['#post_render'][] = 'my_module_node_post_render';
  }
";}s:27:"hook_entity_view_mode_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:27:"hook_entity_view_mode_alter";s:10:"definition";s:59:"function hook_entity_view_mode_alter(&$view_mode, $context)";s:11:"description";s:58:"Change the view mode of an entity that is being displayed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:170:"
  // For nodes, change the view mode when it is teaser.
  if ($context['entity_type'] == 'node' && $view_mode == 'teaser') {
    $view_mode = 'my_custom_view_mode';
  }
";}s:16:"hook_admin_paths";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_admin_paths";s:10:"definition";s:27:"function hook_admin_paths()";s:11:"description";s:28:"Define administrative paths.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:102:"
  $paths = array(
    'mymodule/*/add' => TRUE,
    'mymodule/*/edit' => TRUE,
  );
  return $paths;
";}s:22:"hook_admin_paths_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_admin_paths_alter";s:10:"definition";s:40:"function hook_admin_paths_alter(&$paths)";s:11:"description";s:55:"Redefine administrative paths defined by other modules.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:201:"
  // Treat all user pages as administrative.
  $paths['user'] = TRUE;
  $paths['user/*'] = TRUE;
  // Treat the forum topic node form as a non-administrative page.
  $paths['node/add/forum'] = FALSE;
";}s:24:"hook_entity_prepare_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_entity_prepare_view";s:10:"definition";s:62:"function hook_entity_prepare_view($entities, $type, $langcode)";s:11:"description";s:52:"Act on entities as they are being prepared for view.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:249:"
  // Load a specific node into the user object for later theming.
  if ($type == 'user') {
    $nodes = mymodule_get_user_nodes(array_keys($entities));
    foreach ($entities as $uid => $entity) {
      $entity->user_node = $nodes[$uid];
    }
  }
";}s:9:"hook_cron";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_cron";s:10:"definition";s:20:"function hook_cron()";s:11:"description";s:25:"Perform periodic actions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:728:"
  // Short-running operation example, not using a queue:
  // Delete all expired records since the last cron run.
  $expires = variable_get('mymodule_cron_last_run', REQUEST_TIME);
  db_delete('mymodule_table')
    ->condition('expires', $expires, '>=')
    ->execute();
  variable_set('mymodule_cron_last_run', REQUEST_TIME);

  // Long-running operation example, leveraging a queue:
  // Fetch feeds from other sites.
  $result = db_query('SELECT * FROM {aggregator_feed} WHERE checked + refresh < :time AND refresh <> :never', array(
    ':time' => REQUEST_TIME,
    ':never' => AGGREGATOR_CLEAR_NEVER,
  ));
  $queue = DrupalQueue::get('aggregator_feeds');
  foreach ($result as $feed) {
    $queue->createItem($feed);
  }
";}s:20:"hook_cron_queue_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_cron_queue_info";s:10:"definition";s:31:"function hook_cron_queue_info()";s:11:"description";s:62:"Declare queues holding items that need to be run periodically.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:128:"
  $queues['aggregator_feeds'] = array(
    'worker callback' => 'aggregator_refresh',
    'time' => 60,
  );
  return $queues;
";}s:26:"hook_cron_queue_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_cron_queue_info_alter";s:10:"definition";s:45:"function hook_cron_queue_info_alter(&$queues)";s:11:"description";s:46:"Alter cron queue information before cron runs.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:165:"
  // This site has many feeds so let's spend 90 seconds on each cron run
  // updating feeds instead of the default 60.
  $queues['aggregator_feeds']['time'] = 90;
";}s:17:"hook_element_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_element_info";s:10:"definition";s:28:"function hook_element_info()";s:11:"description";s:76:"Allows modules to declare their own Form API element types and specify their";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:80:"
  $types['filter_format'] = array(
    '#input' => TRUE,
  );
  return $types;
";}s:23:"hook_element_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_element_info_alter";s:10:"definition";s:40:"function hook_element_info_alter(&$type)";s:11:"description";s:57:"Alter the element type information returned from modules.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:133:"
  // Decrease the default size of textfields.
  if (isset($type['textfield']['#size'])) {
    $type['textfield']['#size'] = 40;
  }
";}s:9:"hook_exit";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_exit";s:10:"definition";s:39:"function hook_exit($destination = NULL)";s:11:"description";s:22:"Perform cleanup tasks.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:105:"
  db_update('counter')
    ->expression('hits', 'hits + 1')
    ->condition('type', 1)
    ->execute();
";}s:13:"hook_js_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:13:"hook_js_alter";s:10:"definition";s:36:"function hook_js_alter(&$javascript)";s:11:"description";s:73:"Perform necessary alterations to the JavaScript before it is presented on";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:165:"
  // Swap out jQuery to use an updated version of the library.
  $javascript['misc/jquery.js']['data'] = drupal_get_path('module', 'jquery_update') . '/jquery.js';
";}s:12:"hook_library";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:12:"hook_library";s:10:"definition";s:23:"function hook_library()";s:11:"description";s:60:"Registers JavaScript/CSS libraries associated with a module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1057:"
  // Library One.
  $libraries['library-1'] = array(
    'title' => 'Library One',
    'website' => 'http://example.com/library-1',
    'version' => '1.2',
    'js' => array(
      drupal_get_path('module', 'my_module') . '/library-1.js' => array(),
    ),
    'css' => array(
      drupal_get_path('module', 'my_module') . '/library-2.css' => array(
        'type' => 'file',
        'media' => 'screen',
      ),
    ),
  );
  // Library Two.
  $libraries['library-2'] = array(
    'title' => 'Library Two',
    'website' => 'http://example.com/library-2',
    'version' => '3.1-beta1',
    'js' => array(
      // JavaScript settings may use the 'data' key.
      array(
        'type' => 'setting',
        'data' => array('library2' => TRUE),
      ),
    ),
    'dependencies' => array(
      // Require jQuery UI core by System module.
      array('system', 'ui'),
      // Require our other library.
      array('my_module', 'library-1'),
      // Require another library.
      array('other_module', 'library-3'),
    ),
  );
  return $libraries;
";}s:18:"hook_library_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_library_alter";s:10:"definition";s:49:"function hook_library_alter(&$libraries, $module)";s:11:"description";s:43:"Alters the JavaScript/CSS library registry.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:515:"
  // Update Farbtastic to version 2.0.
  if ($module == 'system' && isset($libraries['farbtastic'])) {
    // Verify existing version is older than the one we are updating to.
    if (version_compare($libraries['farbtastic']['version'], '2.0', '<')) {
      // Update the existing Farbtastic to version 2.0.
      $libraries['farbtastic']['version'] = '2.0';
      $libraries['farbtastic']['js'] = array(
        drupal_get_path('module', 'farbtastic_update') . '/farbtastic-2.0.js' => array(),
      );
    }
  }
";}s:14:"hook_css_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_css_alter";s:10:"definition";s:30:"function hook_css_alter(&$css)";s:11:"description";s:51:"Alter CSS files before they are output on the page.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:102:"
  // Remove defaults.css file.
  unset($css[drupal_get_path('module', 'system') . '/defaults.css']);
";}s:22:"hook_ajax_render_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_ajax_render_alter";s:10:"definition";s:42:"function hook_ajax_render_alter($commands)";s:11:"description";s:72:"Alter the commands that are sent to the user through the Ajax framework.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:155:"
  // Inject any new status messages into the content area.
  $commands[] = ajax_command_prepend('#block-system-main .content', theme('status_messages'));
";}s:15:"hook_page_build";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_page_build";s:10:"definition";s:32:"function hook_page_build(&$page)";s:11:"description";s:45:"Add elements to a page before it is rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:304:"
  if (menu_get_object('node', 1)) {
    // We are on a node detail page. Append a standard disclaimer to the
    // content region.
    $page['content']['disclaimer'] = array(
      '#markup' => t('Acme, Inc. is not responsible for the contents of this sample code.'),
      '#weight' => 25,
    );
  }
";}s:24:"hook_menu_get_item_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_menu_get_item_alter";s:10:"definition";s:70:"function hook_menu_get_item_alter(&$router_item, $path, $original_map)";s:11:"description";s:86:"Alter a menu router item right after it has been retrieved from the database or cache.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:197:"
  // When retrieving the router item for the current path...
  if ($path == $_GET['q']) {
    // ...call a function that prepares something for this request.
    mymodule_prepare_something();
  }
";}s:9:"hook_menu";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_menu";s:10:"definition";s:20:"function hook_menu()";s:11:"description";s:37:"Define menu items and page callbacks.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:402:"
  $items['example'] = array(
    'title' => 'Example Page',
    'page callback' => 'example_page',
    'access arguments' => array('access content'),
    'type' => MENU_SUGGESTED_ITEM,
  );
  $items['example/feed'] = array(
    'title' => 'Example RSS feed',
    'page callback' => 'example_feed',
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
  );

  return $items;
";}s:15:"hook_menu_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_menu_alter";s:10:"definition";s:33:"function hook_menu_alter(&$items)";s:11:"description";s:81:"Alter the data being saved to the {menu_router} table after hook_menu is invoked.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:94:"
  // Example - disable the page at node/add
  $items['node/add']['access callback'] = FALSE;
";}s:20:"hook_menu_link_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_menu_link_alter";s:10:"definition";s:37:"function hook_menu_link_alter(&$item)";s:11:"description";s:73:"Alter the data being saved to the {menu_links} table by menu_link_save().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:660:"
  // Make all new admin links hidden (a.k.a disabled).
  if (strpos($item['link_path'], 'admin') === 0 && empty($item['mlid'])) {
    $item['hidden'] = 1;
  }
  // Flag a link to be altered by hook_translated_menu_link_alter().
  if ($item['link_path'] == 'devel/cache/clear') {
    $item['options']['alter'] = TRUE;
  }
  // Flag a link to be altered by hook_translated_menu_link_alter(), but only
  // if it is derived from a menu router item; i.e., do not alter a custom
  // menu link pointing to the same path that has been created by a user.
  if ($item['link_path'] == 'user' && $item['module'] == 'system') {
    $item['options']['alter'] = TRUE;
  }
";}s:31:"hook_translated_menu_link_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_translated_menu_link_alter";s:10:"definition";s:54:"function hook_translated_menu_link_alter(&$item, $map)";s:11:"description";s:73:"Alter a menu link after it has been translated and before it is rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:119:"
  if ($item['href'] == 'devel/cache/clear') {
    $item['localized_options']['query'] = drupal_get_destination();
  }
";}s:21:"hook_menu_link_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_menu_link_insert";s:10:"definition";s:37:"function hook_menu_link_insert($link)";s:11:"description";s:49:"Inform modules that a menu link has been created.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:288:"
  // In our sample case, we track menu items as editing sections
  // of the site. These are stored in our table as 'disabled' items.
  $record['mlid'] = $link['mlid'];
  $record['menu_name'] = $link['menu_name'];
  $record['status'] = 0;
  drupal_write_record('menu_example', $record);
";}s:21:"hook_menu_link_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_menu_link_update";s:10:"definition";s:37:"function hook_menu_link_update($link)";s:11:"description";s:49:"Inform modules that a menu link has been updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:381:"
  // If the parent menu has changed, update our record.
  $menu_name = db_query("SELECT menu_name FROM {menu_example} WHERE mlid = :mlid", array(':mlid' => $link['mlid']))->fetchField();
  if ($menu_name != $link['menu_name']) {
    db_update('menu_example')
      ->fields(array('menu_name' => $link['menu_name']))
      ->condition('mlid', $link['mlid'])
      ->execute();
  }
";}s:21:"hook_menu_link_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_menu_link_delete";s:10:"definition";s:37:"function hook_menu_link_delete($link)";s:11:"description";s:49:"Inform modules that a menu link has been deleted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:124:"
  // Delete the record from our table.
  db_delete('menu_example')
    ->condition('mlid', $link['mlid'])
    ->execute();
";}s:27:"hook_menu_local_tasks_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:27:"hook_menu_local_tasks_alter";s:10:"definition";s:70:"function hook_menu_local_tasks_alter(&$data, $router_item, $root_path)";s:11:"description";s:70:"Alter tabs and actions displayed on the page before they are rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:925:"
  // Add an action linking to node/add to all pages.
  $data['actions']['output'][] = array(
    '#theme' => 'menu_local_task',
    '#link' => array(
      'title' => t('Add new content'),
      'href' => 'node/add',
      'localized_options' => array(
        'attributes' => array(
          'title' => t('Add new content'),
        ),
      ),
    ),
  );

  // Add a tab linking to node/add to all pages.
  $data['tabs'][0]['output'][] = array(
    '#theme' => 'menu_local_task',
    '#link' => array(
      'title' => t('Example tab'),
      'href' => 'node/add',
      'localized_options' => array(
        'attributes' => array(
          'title' => t('Add new content'),
        ),
      ),
    ),
    // Define whether this link is active. This can be omitted for
    // implementations that add links to pages outside of the current page
    // context.
    '#active' => ($router_item['path'] == $root_path),
  );
";}s:26:"hook_menu_breadcrumb_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_menu_breadcrumb_alter";s:10:"definition";s:58:"function hook_menu_breadcrumb_alter(&$active_trail, $item)";s:11:"description";s:72:"Alter links in the active trail before it is rendered as the breadcrumb.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:407:"
  // Always display a link to the current page by duplicating the last link in
  // the active trail. This means that menu_get_active_breadcrumb() will remove
  // the last link (for the current page), but since it is added once more here,
  // it will appear.
  if (!drupal_is_front_page()) {
    $end = end($active_trail);
    if ($item['href'] == $end['href']) {
      $active_trail[] = $end;
    }
  }
";}s:32:"hook_menu_contextual_links_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_menu_contextual_links_alter";s:10:"definition";s:76:"function hook_menu_contextual_links_alter(&$links, $router_item, $root_path)";s:11:"description";s:48:"Alter contextual links before they are rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:285:"
  // Add a link to all contextual links for nodes.
  if ($root_path == 'node/%') {
    $links['foo'] = array(
      'title' => t('Do fu'),
      'href' => 'foo/do',
      'localized_options' => array(
        'query' => array(
          'foo' => 'bar',
        ),
      ),
    );
  }
";}s:15:"hook_page_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_page_alter";s:10:"definition";s:32:"function hook_page_alter(&$page)";s:11:"description";s:46:"Perform alterations before a page is rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:214:"
  // Add help text to the user login block.
  $page['sidebar_first']['user_login']['help'] = array(
    '#weight' => -10,
    '#markup' => t('To post comments or add new content, you first have to log in.'),
  );
";}s:15:"hook_form_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_form_alter";s:10:"definition";s:56:"function hook_form_alter(&$form, &$form_state, $form_id)";s:11:"description";s:46:"Perform alterations before a form is rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:367:"
  if (isset($form['type']) && $form['type']['#value'] . '_node_settings' == $form_id) {
    $form['workflow']['upload_' . $form['type']['#value']] = array(
      '#type' => 'radios',
      '#title' => t('Attachments'),
      '#default_value' => variable_get('upload_' . $form['type']['#value'], 1),
      '#options' => array(t('Disabled'), t('Enabled')),
    );
  }
";}s:23:"hook_form_FORM_ID_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_form_FORM_ID_alter";s:10:"definition";s:64:"function hook_form_FORM_ID_alter(&$form, &$form_state, $form_id)";s:11:"description";s:75:"Provide a form-specific alteration instead of the global hook_form_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:415:"
  // Modification for the form with the given form ID goes here. For example, if
  // FORM_ID is "user_register_form" this code would run only on the user
  // registration form.

  // Add a checkbox to registration form about agreeing to terms of use.
  $form['terms_of_use'] = array(
    '#type' => 'checkbox',
    '#title' => t("I agree with the website's terms and conditions."),
    '#required' => TRUE,
  );
";}s:28:"hook_form_BASE_FORM_ID_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_form_BASE_FORM_ID_alter";s:10:"definition";s:69:"function hook_form_BASE_FORM_ID_alter(&$form, &$form_state, $form_id)";s:11:"description";s:61:"Provide a form-specific alteration for shared ('base') forms.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:422:"
  // Modification for the form with the given BASE_FORM_ID goes here. For
  // example, if BASE_FORM_ID is "node_form", this code would run on every
  // node form, regardless of node type.

  // Add a checkbox to the node form about agreeing to terms of use.
  $form['terms_of_use'] = array(
    '#type' => 'checkbox',
    '#title' => t("I agree with the website's terms and conditions."),
    '#required' => TRUE,
  );
";}s:10:"hook_forms";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:10:"hook_forms";s:10:"definition";s:36:"function hook_forms($form_id, $args)";s:11:"description";s:39:"Map form_ids to form builder functions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:837:"
  // Simply reroute the (non-existing) $form_id 'mymodule_first_form' to
  // 'mymodule_main_form'.
  $forms['mymodule_first_form'] = array(
    'callback' => 'mymodule_main_form',
  );

  // Reroute the $form_id and prepend an additional argument that gets passed to
  // the 'mymodule_main_form' form builder function.
  $forms['mymodule_second_form'] = array(
    'callback' => 'mymodule_main_form',
    'callback arguments' => array('some parameter'),
  );

  // Reroute the $form_id, but invoke the form builder function
  // 'mymodule_main_form_wrapper' first, so we can prepopulate the $form array
  // that is passed to the actual form builder 'mymodule_main_form'.
  $forms['mymodule_wrapped_form'] = array(
    'callback' => 'mymodule_main_form',
    'wrapper_callback' => 'mymodule_main_form_wrapper',
  );

  return $forms;
";}s:9:"hook_boot";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_boot";s:10:"definition";s:20:"function hook_boot()";s:11:"description";s:42:"Perform setup tasks for all page requests.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:168:"
  // We need user_access() in the shutdown function. Make sure it gets loaded.
  drupal_load('module', 'user');
  drupal_register_shutdown_function('devel_shutdown');
";}s:9:"hook_init";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_init";s:10:"definition";s:20:"function hook_init()";s:11:"description";s:49:"Perform setup tasks for non-cached page requests.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:211:"
  // Since this file should only be loaded on the front page, it cannot be
  // declared in the info file.
  if (drupal_is_front_page()) {
    drupal_add_css(drupal_get_path('module', 'foo') . '/foo.css');
  }
";}s:19:"hook_image_toolkits";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_image_toolkits";s:10:"definition";s:30:"function hook_image_toolkits()";s:11:"description";s:46:"Define image toolkits provided by this module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:257:"
  return array(
    'working' => array(
      'title' => t('A toolkit that works.'),
      'available' => TRUE,
    ),
    'broken' => array(
      'title' => t('A toolkit that is "broken" and will not be listed.'),
      'available' => FALSE,
    ),
  );
";}s:15:"hook_mail_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_mail_alter";s:10:"definition";s:35:"function hook_mail_alter(&$message)";s:11:"description";s:63:"Alter an email message created with the drupal_mail() function.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:364:"
  if ($message['id'] == 'modulename_messagekey') {
    if (!example_notifications_optin($message['to'], $message['id'])) {
      // If the recipient has opted to not receive such messages, cancel
      // sending.
      $message['send'] = FALSE;
      return;
    }
    $message['body'][] = "--\nMail sent out from " . variable_get('site_name', t('Drupal'));
  }
";}s:28:"hook_module_implements_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_module_implements_alter";s:10:"definition";s:63:"function hook_module_implements_alter(&$implementations, $hook)";s:11:"description";s:50:"Alter the registry of modules implementing a hook.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:455:"
  if ($hook == 'rdf_mapping') {
    // Move my_module_rdf_mapping() to the end of the list. module_implements()
    // iterates through $implementations with a foreach loop which PHP iterates
    // in the order that the items were added, so to move an item to the end of
    // the array, we remove it and then add it.
    $group = $implementations['my_module'];
    unset($implementations['my_module']);
    $implementations['my_module'] = $group;
  }
";}s:22:"hook_system_theme_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_system_theme_info";s:10:"definition";s:33:"function hook_system_theme_info()";s:11:"description";s:45:"Return additional themes provided by modules.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:143:"
  $themes['mymodule_test_theme'] = drupal_get_path('module', 'mymodule') . '/mymodule_test_theme/mymodule_test_theme.info';
  return $themes;
";}s:22:"hook_system_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_system_info_alter";s:10:"definition";s:53:"function hook_system_info_alter(&$info, $file, $type)";s:11:"description";s:62:"Alter the information parsed from module and theme .info files";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:165:"
  // Only fill this in if the .info file does not define a 'datestamp'.
  if (empty($info['datestamp'])) {
    $info['datestamp'] = filemtime($file->filename);
  }
";}s:15:"hook_permission";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_permission";s:10:"definition";s:26:"function hook_permission()";s:11:"description";s:24:"Define user permissions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:184:"
  return array(
    'administer my module' =>  array(
      'title' => t('Administer my module'),
      'description' => t('Perform administration tasks for my module.'),
    ),
  );
";}s:10:"hook_theme";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:10:"hook_theme";s:10:"definition";s:52:"function hook_theme($existing, $type, $theme, $path)";s:11:"description";s:53:"Register a module (or theme's) theme implementations.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:831:"
  return array(
    'forum_display' => array(
      'variables' => array('forums' => NULL, 'topics' => NULL, 'parents' => NULL, 'tid' => NULL, 'sortby' => NULL, 'forum_per_page' => NULL),
    ),
    'forum_list' => array(
      'variables' => array('forums' => NULL, 'parents' => NULL, 'tid' => NULL),
    ),
    'forum_topic_list' => array(
      'variables' => array('tid' => NULL, 'topics' => NULL, 'sortby' => NULL, 'forum_per_page' => NULL),
    ),
    'forum_icon' => array(
      'variables' => array('new_posts' => NULL, 'num_posts' => 0, 'comment_mode' => 0, 'sticky' => 0),
    ),
    'status_report' => array(
      'render element' => 'requirements',
      'file' => 'system.admin.inc',
    ),
    'system_date_time_settings' => array(
      'render element' => 'form',
      'file' => 'system.admin.inc',
    ),
  );
";}s:25:"hook_theme_registry_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_theme_registry_alter";s:10:"definition";s:52:"function hook_theme_registry_alter(&$theme_registry)";s:11:"description";s:64:"Alter the theme registry information returned from hook_theme().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:319:"
  // Kill the next/previous forum topic navigation links.
  foreach ($theme_registry['forum_topic_navigation']['preprocess functions'] as $key => $value) {
    if ($value == 'template_preprocess_forum_topic_navigation') {
      unset($theme_registry['forum_topic_navigation']['preprocess functions'][$key]);
    }
  }
";}s:17:"hook_custom_theme";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_custom_theme";s:10:"definition";s:28:"function hook_custom_theme()";s:11:"description";s:74:"Return the machine-readable name of the theme to use for the current page.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:136:"
  // Allow the user to request a particular theme via a query parameter.
  if (isset($_GET['theme'])) {
    return $_GET['theme'];
  }
";}s:11:"hook_xmlrpc";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_xmlrpc";s:10:"definition";s:22:"function hook_xmlrpc()";s:11:"description";s:27:"Register XML-RPC callbacks.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:236:"
  return array(
    'drupal.login' => 'drupal_login',
    array(
      'drupal.site.ping',
      'drupal_directory_ping',
      array('boolean', 'string', 'string', 'string', 'string', 'string'),
      t('Handling ping request'))
  );
";}s:17:"hook_xmlrpc_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_xmlrpc_alter";s:10:"definition";s:37:"function hook_xmlrpc_alter(&$methods)";s:11:"description";s:64:"Alters the definition of XML-RPC methods before they are called.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:388:"
  // Directly change a simple method.
  $methods['drupal.login'] = 'mymodule_login';

  // Alter complex definitions.
  foreach ($methods as $key => &$method) {
    // Skip simple method definitions.
    if (!is_int($key)) {
      continue;
    }
    // Perform the wanted manipulation.
    if ($method[0] == 'drupal.site.ping') {
      $method[1] = 'mymodule_directory_ping';
    }
  }
";}s:13:"hook_watchdog";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:13:"hook_watchdog";s:10:"definition";s:40:"function hook_watchdog(array $log_entry)";s:11:"description";s:21:"Log an event message.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1915:"
  global $base_url, $language;

  $severity_list = array(
    WATCHDOG_EMERGENCY => t('Emergency'),
    WATCHDOG_ALERT     => t('Alert'),
    WATCHDOG_CRITICAL  => t('Critical'),
    WATCHDOG_ERROR     => t('Error'),
    WATCHDOG_WARNING   => t('Warning'),
    WATCHDOG_NOTICE    => t('Notice'),
    WATCHDOG_INFO      => t('Info'),
    WATCHDOG_DEBUG     => t('Debug'),
  );

  $to = 'someone@example.com';
  $params = array();
  $params['subject'] = t('[@site_name] @severity_desc: Alert from your web site', array(
    '@site_name' => variable_get('site_name', 'Drupal'),
    '@severity_desc' => $severity_list[$log_entry['severity']],
  ));

  $params['message']  = "\nSite:         @base_url";
  $params['message'] .= "\nSeverity:     (@severity) @severity_desc";
  $params['message'] .= "\nTimestamp:    @timestamp";
  $params['message'] .= "\nType:         @type";
  $params['message'] .= "\nIP Address:   @ip";
  $params['message'] .= "\nRequest URI:  @request_uri";
  $params['message'] .= "\nReferrer URI: @referer_uri";
  $params['message'] .= "\nUser:         (@uid) @name";
  $params['message'] .= "\nLink:         @link";
  $params['message'] .= "\nMessage:      \n\n@message";

  $params['message'] = t($params['message'], array(
    '@base_url'      => $base_url,
    '@severity'      => $log_entry['severity'],
    '@severity_desc' => $severity_list[$log_entry['severity']],
    '@timestamp'     => format_date($log_entry['timestamp']),
    '@type'          => $log_entry['type'],
    '@ip'            => $log_entry['ip'],
    '@request_uri'   => $log_entry['request_uri'],
    '@referer_uri'   => $log_entry['referer'],
    '@uid'           => $log_entry['uid'],
    '@name'          => $log_entry['user']->name,
    '@link'          => strip_tags($log_entry['link']),
    '@message'       => strip_tags($log_entry['message']),
  ));

  drupal_mail('emaillog', 'entry', $to, $language, $params);
";}s:9:"hook_mail";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_mail";s:10:"definition";s:44:"function hook_mail($key, &$message, $params)";s:11:"description";s:65:"Prepare a message based on parameters; called from drupal_mail().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1283:"
  $account = $params['account'];
  $context = $params['context'];
  $variables = array(
    '%site_name' => variable_get('site_name', 'Drupal'),
    '%username' => format_username($account),
  );
  if ($context['hook'] == 'taxonomy') {
    $entity = $params['entity'];
    $vocabulary = taxonomy_vocabulary_load($entity->vid);
    $variables += array(
      '%term_name' => $entity->name,
      '%term_description' => $entity->description,
      '%term_id' => $entity->tid,
      '%vocabulary_name' => $vocabulary->name,
      '%vocabulary_description' => $vocabulary->description,
      '%vocabulary_id' => $vocabulary->vid,
    );
  }

  // Node-based variable translation is only available if we have a node.
  if (isset($params['node'])) {
    $node = $params['node'];
    $variables += array(
      '%uid' => $node->uid,
      '%node_url' => url('node/' . $node->nid, array('absolute' => TRUE)),
      '%node_type' => node_type_get_name($node),
      '%title' => $node->title,
      '%teaser' => $node->teaser,
      '%body' => $node->body,
    );
  }
  $subject = strtr($context['subject'], $variables);
  $body = strtr($context['message'], $variables);
  $message['subject'] .= str_replace(array("\r", "\n"), '', $subject);
  $message['body'][] = drupal_html_to_text($body);
";}s:17:"hook_flush_caches";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_flush_caches";s:10:"definition";s:28:"function hook_flush_caches()";s:11:"description";s:41:"Add a list of cache tables to be cleared.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:34:"
  return array('cache_example');
";}s:22:"hook_modules_installed";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_modules_installed";s:10:"definition";s:41:"function hook_modules_installed($modules)";s:11:"description";s:54:"Perform necessary actions after modules are installed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:111:"
  if (in_array('lousy_module', $modules)) {
    variable_set('lousy_module_conflicting_variable', FALSE);
  }
";}s:20:"hook_modules_enabled";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_modules_enabled";s:10:"definition";s:39:"function hook_modules_enabled($modules)";s:11:"description";s:52:"Perform necessary actions after modules are enabled.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:171:"
  if (in_array('lousy_module', $modules)) {
    drupal_set_message(t('mymodule is not compatible with lousy_module'), 'error');
    mymodule_disable_functionality();
  }
";}s:21:"hook_modules_disabled";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_modules_disabled";s:10:"definition";s:40:"function hook_modules_disabled($modules)";s:11:"description";s:53:"Perform necessary actions after modules are disabled.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:86:"
  if (in_array('lousy_module', $modules)) {
    mymodule_enable_functionality();
  }
";}s:24:"hook_modules_uninstalled";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_modules_uninstalled";s:10:"definition";s:43:"function hook_modules_uninstalled($modules)";s:11:"description";s:56:"Perform necessary actions after modules are uninstalled.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:155:"
  foreach ($modules as $module) {
    db_delete('mymodule_table')
      ->condition('module', $module)
      ->execute();
  }
  mymodule_cache_rebuild();
";}s:20:"hook_stream_wrappers";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_stream_wrappers";s:10:"definition";s:31:"function hook_stream_wrappers()";s:11:"description";s:70:"Registers PHP stream wrapper implementations associated with a module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1424:"
  return array(
    'public' => array(
      'name' => t('Public files'),
      'class' => 'DrupalPublicStreamWrapper',
      'description' => t('Public local files served by the webserver.'),
      'type' => STREAM_WRAPPERS_LOCAL_NORMAL,
    ),
    'private' => array(
      'name' => t('Private files'),
      'class' => 'DrupalPrivateStreamWrapper',
      'description' => t('Private local files served by Drupal.'),
      'type' => STREAM_WRAPPERS_LOCAL_NORMAL,
    ),
    'temp' => array(
      'name' => t('Temporary files'),
      'class' => 'DrupalTempStreamWrapper',
      'description' => t('Temporary local files for upload and previews.'),
      'type' => STREAM_WRAPPERS_LOCAL_HIDDEN,
    ),
    'cdn' => array(
      'name' => t('Content delivery network files'),
      'class' => 'MyModuleCDNStreamWrapper',
      'description' => t('Files served by a content delivery network.'),
      // 'type' can be omitted to use the default of STREAM_WRAPPERS_NORMAL
    ),
    'youtube' => array(
      'name' => t('YouTube video'),
      'class' => 'MyModuleYouTubeStreamWrapper',
      'description' => t('Video streamed from YouTube.'),
      // A module implementing YouTube integration may decide to support using
      // the YouTube API for uploading video, but here, we assume that this
      // particular module only supports playing YouTube video.
      'type' => STREAM_WRAPPERS_READ_VISIBLE,
    ),
  );
";}s:26:"hook_stream_wrappers_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_stream_wrappers_alter";s:10:"definition";s:47:"function hook_stream_wrappers_alter(&$wrappers)";s:11:"description";s:54:"Alters the list of PHP stream wrapper implementations.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:117:"
  // Change the name of private files to reflect the performance.
  $wrappers['private']['name'] = t('Slow files');
";}s:14:"hook_file_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_file_load";s:10:"definition";s:31:"function hook_file_load($files)";s:11:"description";s:46:"Load additional information into file objects.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:326:"
  // Add the upload specific data into the file object.
  $result = db_query('SELECT * FROM {upload} u WHERE u.fid IN (:fids)', array(':fids' => array_keys($files)))->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result as $record) {
    foreach ($record as $key => $value) {
      $files[$record['fid']]->$key = $value;
    }
  }
";}s:18:"hook_file_validate";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_file_validate";s:10:"definition";s:34:"function hook_file_validate($file)";s:11:"description";s:39:"Check that files meet a given criteria.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:311:"
  $errors = array();

  if (empty($file->filename)) {
    $errors[] = t("The file's name is empty. Please give a name to the file.");
  }
  if (strlen($file->filename) > 255) {
    $errors[] = t("The file's name exceeds the 255 characters limit. Please rename the file and try again.");
  }

  return $errors;
";}s:17:"hook_file_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_file_presave";s:10:"definition";s:33:"function hook_file_presave($file)";s:11:"description";s:40:"Act on a file being inserted or updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:78:"
  // Change the file timestamp to an hour prior.
  $file->timestamp -= 3600;
";}s:16:"hook_file_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_file_insert";s:10:"definition";s:32:"function hook_file_insert($file)";s:11:"description";s:30:"Respond to a file being added.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:184:"
  // Add a message to the log, if the file is a jpg
  $validate = file_validate_extensions($file, 'jpg');
  if (empty($validate)) {
    watchdog('file', 'A jpg has been added.');
  }
";}s:16:"hook_file_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_file_update";s:10:"definition";s:32:"function hook_file_update($file)";s:11:"description";s:32:"Respond to a file being updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:429:"
  $file_user = user_load($file->uid);
  // Make sure that the file name starts with the owner's user name.
  if (strpos($file->filename, $file_user->name) !== 0) {
    $old_filename = $file->filename;
    $file->filename = $file_user->name . '_' . $file->filename;
    $file->save();

    watchdog('file', t('%source has been renamed to %destination', array('%source' => $old_filename, '%destination' => $file->filename)));
  }
";}s:14:"hook_file_copy";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_file_copy";s:10:"definition";s:39:"function hook_file_copy($file, $source)";s:11:"description";s:39:"Respond to a file that has been copied.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:408:"
  $file_user = user_load($file->uid);
  // Make sure that the file name starts with the owner's user name.
  if (strpos($file->filename, $file_user->name) !== 0) {
    $file->filename = $file_user->name . '_' . $file->filename;
    $file->save();

    watchdog('file', t('Copied file %source has been renamed to %destination', array('%source' => $source->filename, '%destination' => $file->filename)));
  }
";}s:14:"hook_file_move";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_file_move";s:10:"definition";s:39:"function hook_file_move($file, $source)";s:11:"description";s:38:"Respond to a file that has been moved.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:407:"
  $file_user = user_load($file->uid);
  // Make sure that the file name starts with the owner's user name.
  if (strpos($file->filename, $file_user->name) !== 0) {
    $file->filename = $file_user->name . '_' . $file->filename;
    $file->save();

    watchdog('file', t('Moved file %source has been renamed to %destination', array('%source' => $source->filename, '%destination' => $file->filename)));
  }
";}s:16:"hook_file_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_file_delete";s:10:"definition";s:32:"function hook_file_delete($file)";s:11:"description";s:32:"Respond to a file being deleted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:119:"
  // Delete all information associated with the file.
  db_delete('upload')->condition('fid', $file->fid)->execute();
";}s:18:"hook_file_download";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_file_download";s:10:"definition";s:33:"function hook_file_download($uri)";s:11:"description";s:66:"Control access to private file downloads and specify HTTP headers.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:453:"
  // Check if the file is controlled by the current module.
  if (!file_prepare_directory($uri)) {
    $uri = FALSE;
  }
  if (strpos(file_uri_target($uri), variable_get('user_picture_path', 'pictures') . '/picture-') === 0) {
    if (!user_access('access user profiles')) {
      // Access to the file is denied.
      return -1;
    }
    else {
      $info = image_get_info($uri);
      return array('Content-Type' => $info['mime_type']);
    }
  }
";}s:19:"hook_file_url_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_file_url_alter";s:10:"definition";s:35:"function hook_file_url_alter(&$uri)";s:11:"description";s:24:"Alter the URL to a file.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1221:"
  global $user;

  // User 1 will always see the local file in this example.
  if ($user->uid == 1) {
    return;
  }

  $cdn1 = 'http://cdn1.example.com';
  $cdn2 = 'http://cdn2.example.com';
  $cdn_extensions = array('css', 'js', 'gif', 'jpg', 'jpeg', 'png');

  // Most CDNs don't support private file transfers without a lot of hassle,
  // so don't support this in the common case.
  $schemes = array('public');

  $scheme = file_uri_scheme($uri);

  // Only serve shipped files and public created files from the CDN.
  if (!$scheme || in_array($scheme, $schemes)) {
    // Shipped files.
    if (!$scheme) {
      $path = $uri;
    }
    // Public created files.
    else {
      $wrapper = file_stream_wrapper_get_instance_by_scheme($scheme);
      $path = $wrapper->getDirectoryPath() . '/' . file_uri_target($uri);
    }

    // Clean up Windows paths.
    $path = str_replace('\\', '/', $path);

    // Serve files with one of the CDN extensions from CDN 1, all others from
    // CDN 2.
    $pathinfo = pathinfo($path);
    if (isset($pathinfo['extension']) && in_array($pathinfo['extension'], $cdn_extensions)) {
      $uri = $cdn1 . '/' . $path;
    }
    else {
      $uri = $cdn2 . '/' . $path;
    }
  }
";}s:17:"hook_requirements";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_requirements";s:10:"definition";s:34:"function hook_requirements($phase)";s:11:"description";s:56:"Check installation requirements and do status reporting.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1655:"
  $requirements = array();
  // Ensure translations don't break during installation.
  $t = get_t();

  // Report Drupal version
  if ($phase == 'runtime') {
    $requirements['drupal'] = array(
      'title' => $t('Drupal'),
      'value' => VERSION,
      'severity' => REQUIREMENT_INFO
    );
  }

  // Test PHP version
  $requirements['php'] = array(
    'title' => $t('PHP'),
    'value' => ($phase == 'runtime') ? l(phpversion(), 'admin/reports/status/php') : phpversion(),
  );
  if (version_compare(phpversion(), DRUPAL_MINIMUM_PHP) < 0) {
    $requirements['php']['description'] = $t('Your PHP installation is too old. Drupal requires at least PHP %version.', array('%version' => DRUPAL_MINIMUM_PHP));
    $requirements['php']['severity'] = REQUIREMENT_ERROR;
  }

  // Report cron status
  if ($phase == 'runtime') {
    $cron_last = variable_get('cron_last');

    if (is_numeric($cron_last)) {
      $requirements['cron']['value'] = $t('Last run !time ago', array('!time' => format_interval(REQUEST_TIME - $cron_last)));
    }
    else {
      $requirements['cron'] = array(
        'description' => $t('Cron has not run. It appears cron jobs have not been setup on your system. Check the help pages for <a href="@url">configuring cron jobs</a>.', array('@url' => 'http://drupal.org/cron')),
        'severity' => REQUIREMENT_ERROR,
        'value' => $t('Never run'),
      );
    }

    $requirements['cron']['description'] .= ' ' . $t('You can <a href="@cron">run cron manually</a>.', array('@cron' => url('admin/reports/status/run-cron')));

    $requirements['cron']['title'] = $t('Cron maintenance tasks');
  }

  return $requirements;
";}s:11:"hook_schema";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_schema";s:10:"definition";s:22:"function hook_schema()";s:11:"description";s:50:"Define the current version of the database schema.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1550:"
  $schema['node'] = array(
    // example (partial) specification for table "node"
    'description' => 'The base table for nodes.',
    'fields' => array(
      'nid' => array(
        'description' => 'The primary identifier for a node.',
        'type' => 'serial',
        'unsigned' => TRUE,
        'not null' => TRUE,
      ),
      'vid' => array(
        'description' => 'The current {node_revision}.vid version identifier.',
        'type' => 'int',
        'unsigned' => TRUE,
        'not null' => TRUE,
        'default' => 0,
      ),
      'type' => array(
        'description' => 'The {node_type} of this node.',
        'type' => 'varchar',
        'length' => 32,
        'not null' => TRUE,
        'default' => '',
      ),
      'title' => array(
        'description' => 'The title of this node, always treated as non-markup plain text.',
        'type' => 'varchar',
        'length' => 255,
        'not null' => TRUE,
        'default' => '',
      ),
    ),
    'indexes' => array(
      'node_changed'        => array('changed'),
      'node_created'        => array('created'),
    ),
    'unique keys' => array(
      'nid_vid' => array('nid', 'vid'),
      'vid'     => array('vid'),
    ),
    'foreign keys' => array(
      'node_revision' => array(
        'table' => 'node_revision',
        'columns' => array('vid' => 'vid'),
      ),
      'node_author' => array(
        'table' => 'users',
        'columns' => array('uid' => 'uid'),
      ),
    ),
    'primary key' => array('nid'),
  );
  return $schema;
";}s:17:"hook_schema_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_schema_alter";s:10:"definition";s:36:"function hook_schema_alter(&$schema)";s:11:"description";s:49:"Perform alterations to existing database schemas.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:216:"
  // Add field to existing schema.
  $schema['users']['fields']['timezone_id'] = array(
    'type' => 'int',
    'not null' => TRUE,
    'default' => 0,
    'description' => 'Per-user timezone configuration.',
  );
";}s:16:"hook_query_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_query_alter";s:10:"definition";s:57:"function hook_query_alter(QueryAlterableInterface $query)";s:11:"description";s:42:"Perform alterations to a structured query.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:69:"
  if ($query->hasTag('micro_limit')) {
    $query->range(0, 2);
  }
";}s:20:"hook_query_TAG_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_query_TAG_alter";s:10:"definition";s:61:"function hook_query_TAG_alter(QueryAlterableInterface $query)";s:11:"description";s:58:"Perform alterations to a structured query for a given tag.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1174:"
  // Skip the extra expensive alterations if site has no node access control modules.
  if (!node_access_view_all_nodes()) {
    // Prevent duplicates records.
    $query->distinct();
    // The recognized operations are 'view', 'update', 'delete'.
    if (!$op = $query->getMetaData('op')) {
      $op = 'view';
    }
    // Skip the extra joins and conditions for node admins.
    if (!user_access('bypass node access')) {
      // The node_access table has the access grants for any given node.
      $access_alias = $query->join('node_access', 'na', '%alias.nid = n.nid');
      $or = db_or();
      // If any grant exists for the specified user, then user has access to the node for the specified operation.
      foreach (node_access_grants($op, $query->getMetaData('account')) as $realm => $gids) {
        foreach ($gids as $gid) {
          $or->condition(db_and()
            ->condition($access_alias . '.gid', $gid)
            ->condition($access_alias . '.realm', $realm)
          );
        }
      }

      if (count($or->conditions())) {
        $query->condition($or);
      }

      $query->condition($access_alias . 'grant_' . $op, 1, '>=');
    }
  }
";}s:12:"hook_install";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:12:"hook_install";s:10:"definition";s:23:"function hook_install()";s:11:"description";s:49:"Perform setup tasks when the module is installed.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:259:"
  // Populate the default {node_access} record.
  db_insert('node_access')
    ->fields(array(
      'nid' => 0,
      'gid' => 0,
      'realm' => 'all',
      'grant_view' => 1,
      'grant_update' => 0,
      'grant_delete' => 0,
    ))
    ->execute();
";}s:13:"hook_update_N";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:13:"hook_update_N";s:10:"definition";s:33:"function hook_update_N(&$sandbox)";s:11:"description";s:24:"Perform a single update.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1716:"
  // For non-multipass updates, the signature can simply be;
  // function hook_update_N() {

  // For most updates, the following is sufficient.
  db_add_field('mytable1', 'newcol', array('type' => 'int', 'not null' => TRUE, 'description' => 'My new integer column.'));

  // However, for more complex operations that may take a long time,
  // you may hook into Batch API as in the following example.

  // Update 3 users at a time to have an exclamation point after their names.
  // (They're really happy that we can do batch API in this hook!)
  if (!isset($sandbox['progress'])) {
    $sandbox['progress'] = 0;
    $sandbox['current_uid'] = 0;
    // We'll -1 to disregard the uid 0...
    $sandbox['max'] = db_query('SELECT COUNT(DISTINCT uid) FROM {users}')->fetchField() - 1;
  }

  $users = db_select('users', 'u')
    ->fields('u', array('uid', 'name'))
    ->condition('uid', $sandbox['current_uid'], '>')
    ->range(0, 3)
    ->orderBy('uid', 'ASC')
    ->execute();

  foreach ($users as $user) {
    $user->name .= '!';
    db_update('users')
      ->fields(array('name' => $user->name))
      ->condition('uid', $user->uid)
      ->execute();

    $sandbox['progress']++;
    $sandbox['current_uid'] = $user->uid;
  }

  $sandbox['#finished'] = empty($sandbox['max']) ? 1 : ($sandbox['progress'] / $sandbox['max']);

  // To display a message to the user when the update is completed, return it.
  // If you do not want to display a completion message, simply return nothing.
  return t('The update did what it was supposed to do.');

  // In case of an error, simply throw an exception with an error message.
  throw new DrupalUpdateException('Something went wrong; here is what you should do.');
";}s:24:"hook_update_dependencies";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_update_dependencies";s:10:"definition";s:35:"function hook_update_dependencies()";s:11:"description";s:64:"Return an array of information about module update dependencies.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:919:"
  // Indicate that the mymodule_update_7000() function provided by this module
  // must run after the another_module_update_7002() function provided by the
  // 'another_module' module.
  $dependencies['mymodule'][7000] = array(
    'another_module' => 7002,
  );
  // Indicate that the mymodule_update_7001() function provided by this module
  // must run before the yet_another_module_update_7004() function provided by
  // the 'yet_another_module' module. (Note that declaring dependencies in this
  // direction should be done only in rare situations, since it can lead to the
  // following problem: If a site has already run the yet_another_module
  // module's database updates before it updates its codebase to pick up the
  // newest mymodule code, then the dependency declared here will be ignored.)
  $dependencies['yet_another_module'][7004] = array(
    'mymodule' => 7001,
  );
  return $dependencies;
";}s:24:"hook_update_last_removed";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_update_last_removed";s:10:"definition";s:35:"function hook_update_last_removed()";s:11:"description";s:64:"Return a number which is no longer available as hook_update_N().";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:153:"
  // We've removed the 5.x-1.x version of mymodule, including database updates.
  // The next update function is mymodule_update_5200().
  return 5103;
";}s:14:"hook_uninstall";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_uninstall";s:10:"definition";s:25:"function hook_uninstall()";s:11:"description";s:44:"Remove any information that the module sets.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:38:"
  variable_del('upload_file_types');
";}s:11:"hook_enable";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_enable";s:10:"definition";s:22:"function hook_enable()";s:11:"description";s:50:"Perform necessary actions after module is enabled.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}s:12:"hook_disable";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:12:"hook_disable";s:10:"definition";s:23:"function hook_disable()";s:11:"description";s:52:"Perform necessary actions before module is disabled.";s:11:"destination";s:15:"%module.install";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:29:"
  mymodule_cache_rebuild();
";}s:25:"hook_registry_files_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_registry_files_alter";s:10:"definition";s:53:"function hook_registry_files_alter(&$files, $modules)";s:11:"description";s:74:"Perform necessary alterations to the list of files parsed by the registry.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:435:"
  foreach ($modules as $module) {
    // Only add test files for disabled modules, as enabled modules should
    // already include any test files they provide.
    if (!$module->status) {
      $dir = $module->dir;
      foreach ($module->info['files'] as $file) {
        if (substr($file, -5) == '.test') {
          $files["$dir/$file"] = array('module' => $module->name, 'weight' => $module->weight);
        }
      }
    }
  }
";}s:18:"hook_install_tasks";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_install_tasks";s:10:"definition";s:44:"function hook_install_tasks(&$install_state)";s:11:"description";s:68:"Return an array of tasks to be performed by an installation profile.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:3468:"
  // Here, we define a variable to allow tasks to indicate that a particular,
  // processor-intensive batch process needs to be triggered later on in the
  // installation.
  $myprofile_needs_batch_processing = variable_get('myprofile_needs_batch_processing', FALSE);
  $tasks = array(
    // This is an example of a task that defines a form which the user who is
    // installing the site will be asked to fill out. To implement this task,
    // your profile would define a function named myprofile_data_import_form()
    // as a normal form API callback function, with associated validation and
    // submit handlers. In the submit handler, in addition to saving whatever
    // other data you have collected from the user, you might also call
    // variable_set('myprofile_needs_batch_processing', TRUE) if the user has
    // entered data which requires that batch processing will need to occur
    // later on.
    'myprofile_data_import_form' => array(
      'display_name' => st('Data import options'),
      'type' => 'form',
    ),
    // Similarly, to implement this task, your profile would define a function
    // named myprofile_settings_form() with associated validation and submit
    // handlers. This form might be used to collect and save additional
    // information from the user that your profile needs. There are no extra
    // steps required for your profile to act as an "installation wizard"; you
    // can simply define as many tasks of type 'form' as you wish to execute,
    // and the forms will be presented to the user, one after another.
    'myprofile_settings_form' => array(
      'display_name' => st('Additional options'),
      'type' => 'form',
    ),
    // This is an example of a task that performs batch operations. To
    // implement this task, your profile would define a function named
    // myprofile_batch_processing() which returns a batch API array definition
    // that the installer will use to execute your batch operations. Due to the
    // 'myprofile_needs_batch_processing' variable used here, this task will be
    // hidden and skipped unless your profile set it to TRUE in one of the
    // previous tasks.
    'myprofile_batch_processing' => array(
      'display_name' => st('Import additional data'),
      'display' => $myprofile_needs_batch_processing,
      'type' => 'batch',
      'run' => $myprofile_needs_batch_processing ? INSTALL_TASK_RUN_IF_NOT_COMPLETED : INSTALL_TASK_SKIP,
    ),
    // This is an example of a task that will not be displayed in the list that
    // the user sees. To implement this task, your profile would define a
    // function named myprofile_final_site_setup(), in which additional,
    // automated site setup operations would be performed. Since this is the
    // last task defined by your profile, you should also use this function to
    // call variable_del('myprofile_needs_batch_processing') and clean up the
    // variable that was used above. If you want the user to pass to the final
    // Drupal installation tasks uninterrupted, return no output from this
    // function. Otherwise, return themed output that the user will see (for
    // example, a confirmation page explaining that your profile's tasks are
    // complete, with a link to reload the current page and therefore pass on
    // to the final Drupal installation tasks when the user is ready to do so).
    'myprofile_final_site_setup' => array(
    ),
  );
  return $tasks;
";}s:22:"hook_drupal_goto_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_drupal_goto_alter";s:10:"definition";s:72:"function hook_drupal_goto_alter(&$path, &$options, &$http_response_code)";s:11:"description";s:53:"Change the page the user is sent to by drupal_goto().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:69:"
  // A good addition to misery module.
  $http_response_code = 500;
";}s:20:"hook_html_head_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_html_head_alter";s:10:"definition";s:46:"function hook_html_head_alter(&$head_elements)";s:11:"description";s:73:"Alter XHTML HEAD tags before they are rendered by drupal_get_html_head().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:276:"
  foreach ($head_elements as $key => $element) {
    if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'canonical') {
      // I want a custom canonical URL.
      $head_elements[$key]['#attributes']['href'] = mymodule_canonical_url();
    }
  }
";}s:24:"hook_install_tasks_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_install_tasks_alter";s:10:"definition";s:58:"function hook_install_tasks_alter(&$tasks, $install_state)";s:11:"description";s:42:"Alter the full list of installation tasks.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:231:"
  // Replace the "Choose language" installation task provided by Drupal core
  // with a custom callback function defined by this installation profile.
  $tasks['install_select_locale']['function'] = 'myprofile_locale_selection';
";}s:32:"hook_file_mimetype_mapping_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_file_mimetype_mapping_alter";s:10:"definition";s:52:"function hook_file_mimetype_mapping_alter(&$mapping)";s:11:"description";s:75:"Alter MIME type mappings used to determine MIME type from a file extension.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:319:"
  // Add new MIME type 'drupal/info'.
  $mapping['mimetypes']['example_info'] = 'drupal/info';
  // Add new extension '.info' and map it to the 'drupal/info' MIME type.
  $mapping['extensions']['info'] = 'example_info';
  // Override existing extension mapping for '.ogg' files.
  $mapping['extensions']['ogg'] = 189;
";}s:16:"hook_action_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_action_info";s:10:"definition";s:27:"function hook_action_info()";s:11:"description";s:35:"Declares information about actions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:806:"
  return array(
    'comment_unpublish_action' => array(
      'type' => 'comment',
      'label' => t('Unpublish comment'),
      'configurable' => FALSE,
      'behavior' => array('changes_property'),
      'triggers' => array('comment_presave', 'comment_insert', 'comment_update'),
    ),
    'comment_unpublish_by_keyword_action' => array(
      'type' => 'comment',
      'label' => t('Unpublish comment containing keyword(s)'),
      'configurable' => TRUE,
      'behavior' => array('changes_property'),
      'triggers' => array('comment_presave', 'comment_insert', 'comment_update'),
    ),
    'comment_save_action' => array(
      'type' => 'comment',
      'label' => t('Save comment'),
      'configurable' => FALSE,
      'triggers' => array('comment_insert', 'comment_update'),
    ),
  );
";}s:19:"hook_actions_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_actions_delete";s:10:"definition";s:34:"function hook_actions_delete($aid)";s:11:"description";s:41:"Executes code after an action is deleted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:82:"
  db_delete('actions_assignments')
    ->condition('aid', $aid)
    ->execute();
";}s:22:"hook_action_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_action_info_alter";s:10:"definition";s:42:"function hook_action_info_alter(&$actions)";s:11:"description";s:46:"Alters the actions declared by another module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:93:"
  $actions['node_unpublish_action']['label'] = t('Unpublish and remove from public view.');
";}s:18:"hook_archiver_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_archiver_info";s:10:"definition";s:29:"function hook_archiver_info()";s:11:"description";s:32:"Declare archivers to the system.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:138:"
  return array(
    'tar' => array(
      'class' => 'ArchiverTar',
      'extensions' => array('tar', 'tar.gz', 'tar.bz2'),
    ),
  );
";}s:24:"hook_archiver_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_archiver_info_alter";s:10:"definition";s:41:"function hook_archiver_info_alter(&$info)";s:11:"description";s:53:"Alter archiver information declared by other modules.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:41:"
  $info['tar']['extensions'][] = 'tgz';
";}s:22:"hook_date_format_types";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_date_format_types";s:10:"definition";s:33:"function hook_date_format_types()";s:11:"description";s:29:"Define additional date types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:143:"
  // Define the core date format types.
  return array(
    'long' => t('Long'),
    'medium' => t('Medium'),
    'short' => t('Short'),
  );
";}s:28:"hook_date_format_types_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_date_format_types_alter";s:10:"definition";s:46:"function hook_date_format_types_alter(&$types)";s:11:"description";s:27:"Modify existing date types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:77:"
  foreach ($types as $name => $type) {
    $types[$name]['locked'] = 1;
  }
";}s:17:"hook_date_formats";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_date_formats";s:10:"definition";s:28:"function hook_date_formats()";s:11:"description";s:31:"Define additional date formats.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:383:"
  return array(
    array(
      'type' => 'mymodule_extra_long',
      'format' => 'l jS F Y H:i:s e',
      'locales' => array('en-ie'),
    ),
    array(
      'type' => 'mymodule_extra_long',
      'format' => 'l jS F Y h:i:sa',
      'locales' => array('en', 'en-us'),
    ),
    array(
      'type' => 'short',
      'format' => 'F Y',
      'locales' => array(),
    ),
  );
";}s:23:"hook_date_formats_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_date_formats_alter";s:10:"definition";s:43:"function hook_date_formats_alter(&$formats)";s:11:"description";s:46:"Alter date formats declared by another module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:88:"
  foreach ($formats as $id => $format) {
    $formats[$id]['locales'][] = 'en-ca';
  }
";}s:33:"hook_page_delivery_callback_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_page_delivery_callback_alter";s:10:"definition";s:54:"function hook_page_delivery_callback_alter(&$callback)";s:11:"description";s:89:"Alters the delivery callback used to send the result of the page callback to the browser.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:391:"
  // jQuery sets a HTTP_X_REQUESTED_WITH header of 'XMLHttpRequest'.
  // If a page would normally be delivered as an html page, and it is called
  // from jQuery, deliver it instead as an Ajax response.
  if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' && $callback == 'drupal_deliver_html_page') {
    $callback = 'ajax_deliver';
  }
";}s:29:"hook_system_themes_page_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_system_themes_page_alter";s:10:"definition";s:54:"function hook_system_themes_page_alter(&$theme_groups)";s:11:"description";s:29:"Alters theme operation links.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:333:"
  foreach ($theme_groups as $state => &$group) {
    foreach ($theme_groups[$state] as &$theme) {
      // Add a foo link to each list of theme operations.
      $theme->operations[] = array(
        'title' => t('Foo'),
        'href' => 'admin/appearance/foo',
        'query' => array('theme' => $theme->name)
      );
    }
  }
";}s:22:"hook_url_inbound_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_url_inbound_alter";s:10:"definition";s:71:"function hook_url_inbound_alter(&$path, $original_path, $path_language)";s:11:"description";s:28:"Alters inbound URL requests.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:221:"
  // Create the path user/me/edit, which allows a user to edit their account.
  if (preg_match('|^user/me/edit(/.*)?|', $path, $matches)) {
    global $user;
    $path = 'user/' . $user->uid . '/edit' . $matches[1];
  }
";}s:23:"hook_url_outbound_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_url_outbound_alter";s:10:"definition";s:67:"function hook_url_outbound_alter(&$path, &$options, $original_path)";s:11:"description";s:21:"Alters outbound URLs.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:412:"
  // Use an external RSS feed rather than the Drupal one.
  if ($path == 'rss.xml') {
    $path = 'http://example.com/rss.xml';
    $options['external'] = TRUE;
  }

  // Instead of pointing to user/[uid]/edit, point to user/me/edit.
  if (preg_match('|^user/([0-9]*)/edit(/.*)?|', $path, $matches)) {
    global $user;
    if ($user->uid == $matches[1]) {
      $path = 'user/me/edit' . $matches[2];
    }
  }
";}s:19:"hook_username_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_username_alter";s:10:"definition";s:46:"function hook_username_alter(&$name, $account)";s:11:"description";s:48:"Alter the username that is displayed for a user.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:140:"
  // Display the user's uid instead of name.
  if (isset($account->uid)) {
    $name = t('User !uid', array('!uid' => $account->uid));
  }
";}s:11:"hook_tokens";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_tokens";s:10:"definition";s:85:"function hook_tokens($type, $tokens, array $data = array(), array $options = array())";s:11:"description";s:50:"Provide replacement values for placeholder tokens.";s:11:"destination";s:18:"%module.tokens.inc";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:1706:"
  $url_options = array('absolute' => TRUE);
  if (isset($options['language'])) {
    $url_options['language'] = $options['language'];
    $language_code = $options['language']->language;
  }
  else {
    $language_code = NULL;
  }
  $sanitize = !empty($options['sanitize']);

  $replacements = array();

  if ($type == 'node' && !empty($data['node'])) {
    $node = $data['node'];

    foreach ($tokens as $name => $original) {
      switch ($name) {
        // Simple key values on the node.
        case 'nid':
          $replacements[$original] = $node->nid;
          break;

        case 'title':
          $replacements[$original] = $sanitize ? check_plain($node->title) : $node->title;
          break;

        case 'edit-url':
          $replacements[$original] = url('node/' . $node->nid . '/edit', $url_options);
          break;

        // Default values for the chained tokens handled below.
        case 'author':
          $name = ($node->uid == 0) ? variable_get('anonymous', t('Anonymous')) : $node->name;
          $replacements[$original] = $sanitize ? filter_xss($name) : $name;
          break;

        case 'created':
          $replacements[$original] = format_date($node->created, 'medium', '', NULL, $language_code);
          break;
      }
    }

    if ($author_tokens = token_find_with_prefix($tokens, 'author')) {
      $author = user_load($node->uid);
      $replacements += token_generate('user', $author_tokens, array('user' => $author), $options);
    }

    if ($created_tokens = token_find_with_prefix($tokens, 'created')) {
      $replacements += token_generate('date', $created_tokens, array('date' => $node->created), $options);
    }
  }

  return $replacements;
";}s:17:"hook_tokens_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_tokens_alter";s:10:"definition";s:64:"function hook_tokens_alter(array &$replacements, array $context)";s:11:"description";s:48:"Alter replacement values for placeholder tokens.";s:11:"destination";s:18:"%module.tokens.inc";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:710:"
  $options = $context['options'];

  if (isset($options['language'])) {
    $url_options['language'] = $options['language'];
    $language_code = $options['language']->language;
  }
  else {
    $language_code = NULL;
  }
  $sanitize = !empty($options['sanitize']);

  if ($context['type'] == 'node' && !empty($context['data']['node'])) {
    $node = $context['data']['node'];

    // Alter the [node:title] token, and replace it with the rendered content
    // of a field (field_title).
    if (isset($context['tokens']['title'])) {
      $title = field_view_field('node', $node, 'field_title', 'default', $language_code);
      $replacements[$context['tokens']['title']] = drupal_render($title);
    }
  }
";}s:15:"hook_token_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_token_info";s:10:"definition";s:26:"function hook_token_info()";s:11:"description";s:71:"Provide information about available placeholder tokens and token types.";s:11:"destination";s:18:"%module.tokens.inc";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:920:"
  $type = array(
    'name' => t('Nodes'),
    'description' => t('Tokens related to individual nodes.'),
    'needs-data' => 'node',
  );

  // Core tokens for nodes.
  $node['nid'] = array(
    'name' => t("Node ID"),
    'description' => t("The unique ID of the node."),
  );
  $node['title'] = array(
    'name' => t("Title"),
    'description' => t("The title of the node."),
  );
  $node['edit-url'] = array(
    'name' => t("Edit URL"),
    'description' => t("The URL of the node's edit page."),
  );

  // Chained tokens for nodes.
  $node['created'] = array(
    'name' => t("Date created"),
    'description' => t("The date the node was posted."),
    'type' => 'date',
  );
  $node['author'] = array(
    'name' => t("Author"),
    'description' => t("The author of the node."),
    'type' => 'user',
  );

  return array(
    'types' => array('node' => $type),
    'tokens' => array('node' => $node),
  );
";}s:21:"hook_token_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_token_info_alter";s:10:"definition";s:38:"function hook_token_info_alter(&$data)";s:11:"description";s:70:"Alter the metadata about available placeholder tokens and token types.";s:11:"destination";s:18:"%module.tokens.inc";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:512:"
  // Modify description of node tokens for our site.
  $data['tokens']['node']['nid'] = array(
    'name' => t("Node ID"),
    'description' => t("The unique ID of the article."),
  );
  $data['tokens']['node']['title'] = array(
    'name' => t("Title"),
    'description' => t("The title of the article."),
  );

  // Chained tokens for nodes.
  $data['tokens']['node']['created'] = array(
    'name' => t("Date created"),
    'description' => t("The date the article was posted."),
    'type' => 'date',
  );
";}s:16:"hook_batch_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_batch_alter";s:10:"definition";s:34:"function hook_batch_alter(&$batch)";s:11:"description";s:52:"Alter batch information before a batch is processed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:404:"
  // If the current page request is inside the overlay, add ?render=overlay to
  // the success callback URL, so that it appears correctly within the overlay.
  if (overlay_get_mode() == 'child') {
    if (isset($batch['url_options']['query'])) {
      $batch['url_options']['query']['render'] = 'overlay';
    }
    else {
      $batch['url_options']['query'] = array('render' => 'overlay');
    }
  }
";}s:17:"hook_updater_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_updater_info";s:10:"definition";s:28:"function hook_updater_info()";s:11:"description";s:65:"Provide information on Updaters (classes that can update Drupal).";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:263:"
  return array(
    'module' => array(
      'class' => 'ModuleUpdater',
      'name' => t('Update modules'),
      'weight' => 0,
    ),
    'theme' => array(
      'class' => 'ThemeUpdater',
      'name' => t('Update themes'),
      'weight' => 0,
    ),
  );
";}s:23:"hook_updater_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_updater_info_alter";s:10:"definition";s:44:"function hook_updater_info_alter(&$updaters)";s:11:"description";s:36:"Alter the Updater information array.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:156:"
  // Adjust weight so that the theme Updater gets a chance to handle a given
  // update task before module updaters.
  $updaters['theme']['weight'] = -1;
";}s:20:"hook_countries_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_countries_alter";s:10:"definition";s:42:"function hook_countries_alter(&$countries)";s:11:"description";s:31:"Alter the default country list.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:97:"
  // Elbonia is now independent, so add it to the country list.
  $countries['EB'] = 'Elbonia';
";}s:27:"hook_menu_site_status_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:27:"hook_menu_site_status_alter";s:10:"definition";s:63:"function hook_menu_site_status_alter(&$menu_site_status, $path)";s:11:"description";s:44:"Control site status before menu dispatching.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:236:"
  // Allow access to my_module/authentication even if site is in offline mode.
  if ($menu_site_status == MENU_SITE_OFFLINE && user_is_anonymous() && $path == 'my_module/authentication') {
    $menu_site_status = MENU_SITE_ONLINE;
  }
";}s:22:"hook_filetransfer_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_filetransfer_info";s:10:"definition";s:33:"function hook_filetransfer_info()";s:11:"description";s:69:"Register information about FileTransfer classes provided by a module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:180:"
  $info['sftp'] = array(
    'title' => t('SFTP (Secure FTP)'),
    'file' => 'sftp.filetransfer.inc',
    'class' => 'FileTransferSFTP',
    'weight' => 10,
  );
  return $info;
";}s:28:"hook_filetransfer_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_filetransfer_info_alter";s:10:"definition";s:58:"function hook_filetransfer_info_alter(&$filetransfer_info)";s:11:"description";s:38:"Alter the FileTransfer class registry.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:219:"
  if (variable_get('paranoia', FALSE)) {
    // Remove the FTP option entirely.
    unset($filetransfer_info['ftp']);
    // Make sure the SSH option is listed first.
    $filetransfer_info['ssh']['weight'] = -10;
  }
";}s:24:"callback_entity_info_uri";a:9:{s:4:"type";s:8:"callback";s:4:"name";s:24:"callback_entity_info_uri";s:10:"definition";s:42:"function callback_entity_info_uri($entity)";s:11:"description";s:29:"Return the URI for an entity.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:60:"
  return array(
    'path' => 'node/' . $entity->nid,
  );
";}s:26:"callback_entity_info_label";a:9:{s:4:"type";s:8:"callback";s:4:"name";s:26:"callback_entity_info_label";s:10:"definition";s:58:"function callback_entity_info_label($entity, $entity_type)";s:11:"description";s:30:"Return the label of an entity.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:70:"
  return empty($entity->title) ? 'Untitled entity' : $entity->title;
";}s:29:"callback_entity_info_language";a:9:{s:4:"type";s:8:"callback";s:4:"name";s:29:"callback_entity_info_language";s:10:"definition";s:61:"function callback_entity_info_language($entity, $entity_type)";s:11:"description";s:39:"Return the language code of the entity.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/system.api.php";s:4:"body";s:29:"
  return $entity->language;
";}s:37:"hook_form_system_theme_settings_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_form_system_theme_settings_alter";s:10:"definition";s:68:"function hook_form_system_theme_settings_alter(&$form, &$form_state)";s:11:"description";s:55:"Allow themes to alter the theme-specific settings form.";s:11:"destination";s:12:"template.php";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/theme.api.php";s:4:"body";s:323:"
  // Add a checkbox to toggle the breadcrumb trail.
  $form['toggle_breadcrumb'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display the breadcrumb'),
    '#default_value' => theme_get_setting('toggle_breadcrumb'),
    '#description'   => t('Show a trail of links from the homepage to the current page.'),
  );
";}s:15:"hook_preprocess";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_preprocess";s:10:"definition";s:44:"function hook_preprocess(&$variables, $hook)";s:11:"description";s:41:"Preprocess theme variables for templates.";s:11:"destination";s:12:"template.php";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/theme.api.php";s:4:"body";s:837:"
 static $hooks;

  // Add contextual links to the variables, if the user has permission.

  if (!user_access('access contextual links')) {
    return;
  }

  if (!isset($hooks)) {
    $hooks = theme_get_registry();
  }

  // Determine the primary theme function argument.
  if (isset($hooks[$hook]['variables'])) {
    $keys = array_keys($hooks[$hook]['variables']);
    $key = $keys[0];
  }
  else {
    $key = $hooks[$hook]['render element'];
  }

  if (isset($variables[$key])) {
    $element = $variables[$key];
  }

  if (isset($element) && is_array($element) && !empty($element['#contextual_links'])) {
    $variables['title_suffix']['contextual_links'] = contextual_links_view($element);
    if (!empty($variables['title_suffix']['contextual_links'])) {
      $variables['classes_array'][] = 'contextual-links-region';
    }
  }
";}s:20:"hook_preprocess_HOOK";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_preprocess_HOOK";s:10:"definition";s:42:"function hook_preprocess_HOOK(&$variables)";s:11:"description";s:53:"Preprocess theme variables for a specific theme hook.";s:11:"destination";s:12:"template.php";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/theme.api.php";s:4:"body";s:172:"
  // This example is from rdf_preprocess_image(). It adds an RDF attribute
  // to the image hook's variables.
  $variables['attributes']['typeof'] = array('foaf:Image');
";}s:12:"hook_process";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:12:"hook_process";s:10:"definition";s:41:"function hook_process(&$variables, $hook)";s:11:"description";s:38:"Process theme variables for templates.";s:11:"destination";s:12:"template.php";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/theme.api.php";s:4:"body";s:532:"
  // Wraps variables in RDF wrappers.
  if (!empty($variables['rdf_template_variable_attributes_array'])) {
    foreach ($variables['rdf_template_variable_attributes_array'] as $variable_name => $attributes) {
      $context = array(
        'hook' => $hook,
        'variable_name' => $variable_name,
        'variables' => $variables,
      );
      $variables[$variable_name] = theme('rdf_template_variable_wrapper', array('content' => $variables[$variable_name], 'attributes' => $attributes, 'context' => $context));
    }
  }
";}s:17:"hook_process_HOOK";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_process_HOOK";s:10:"definition";s:39:"function hook_process_HOOK(&$variables)";s:11:"description";s:50:"Process theme variables for a specific theme hook.";s:11:"destination";s:12:"template.php";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/theme.api.php";s:4:"body";s:375:"
  // @todo There are no use-cases in Drupal core for this hook. Find one from a
  //   contributed module, or come up with a good example. Coming up with a good
  //   example might be tough, since the intent is for nearly everything to be
  //   achievable via preprocess functions, and for process functions to only be
  //   used when requiring the later execution time.
";}s:19:"hook_themes_enabled";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_themes_enabled";s:10:"definition";s:41:"function hook_themes_enabled($theme_list)";s:11:"description";s:32:"Respond to themes being enabled.";s:11:"destination";s:12:"template.php";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/theme.api.php";s:4:"body";s:77:"
  foreach ($theme_list as $theme) {
    block_theme_initialize($theme);
  }
";}s:20:"hook_themes_disabled";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_themes_disabled";s:10:"definition";s:42:"function hook_themes_disabled($theme_list)";s:11:"description";s:33:"Respond to themes being disabled.";s:11:"destination";s:12:"template.php";s:12:"dependencies";a:0:{}s:5:"group";s:6:"system";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/theme.api.php";s:4:"body";s:62:"
 // Clear all update module caches.
  _update_cache_clear();
";}}s:9:"libraries";a:3:{s:19:"hook_libraries_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_libraries_info";s:10:"definition";s:30:"function hook_libraries_info()";s:11:"description";s:44:"Return information about external libraries.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:9:"libraries";s:9:"file_path";s:57:"/home/lit/lit-dev/.git/../drush/hooks/7/libraries.api.php";s:4:"body";s:8057:"
  // The following is a full explanation of all properties. See below for more
  // concrete example implementations.

  // This array key lets Libraries API search for 'sites/all/libraries/example'
  // directory, which should contain the entire, original extracted library.
  $libraries['example'] = array(
    // Only used in administrative UI of Libraries API.
    'name' => 'Example library',
    'vendor url' => 'http://example.com',
    'download url' => 'http://example.com/download',
    // Optional: If, after extraction, the actual library files are contained in
    // 'sites/all/libraries/example/lib', specify the relative path here.
    'path' => 'lib',
    // Optional: Define a custom version detection callback, if required.
    'version callback' => 'mymodule_get_version',
    // Specify arguments for the version callback. By default,
    // libraries_get_version() takes a named argument array:
    'version arguments' => array(
      'file' => 'docs/CHANGELOG.txt',
      'pattern' => '@version\s+([0-9a-zA-Z\.-]+)@',
      'lines' => 5,
      'cols' => 20,
    ),
    // Default list of files of the library to load. Important: Only specify
    // third-party files belonging to the library here, not integration files of
    // your module.
    'files' => array(
      // 'js' and 'css' follow the syntax of hook_library(), but file paths are
      // relative to the library path.
      'js' => array(
        'exlib.js',
        'gadgets/foo.js',
      ),
      'css' => array(
        'lib_style.css',
        'skin/example.css',
      ),
      // For PHP libraries, specify include files here, still relative to the
      // library path.
      'php' => array(
        'exlib.php',
        'exlib.inc',
      ),
    ),
    // Optional: Specify alternative variants of the library, if available.
    'variants' => array(
      // All properties defined for 'minified' override top-level properties.
      'minified' => array(
        'files' => array(
          'js' => array(
            'exlib.min.js',
            'gadgets/foo.min.js',
          ),
          'css' => array(
            'lib_style.css',
            'skin/example.css',
          ),
        ),
        'variant callback' => 'mymodule_check_variant',
        'variant arguments' => array(
          'variant' => 'minified',
        ),
      ),
    ),
    // Optional, but usually required: Override top-level properties for later
    // versions of the library. The properties of the minimum version that is
    // matched override the top-level properties. Note:
    // - When registering 'versions', it usually does not make sense to register
    //   'files', 'variants', and 'integration files' on the top-level, as most
    //   of those likely need to be different per version and there are no
    //   defaults.
    // - The array keys have to be strings, as PHP does not support floats for
    //   array keys.
    'versions' => array(
      '2' => array(
        'files' => array(
          'js' => array('exlib.js'),
          'css' => array('exlib_style.css'),
        ),
      ),
      '3.0' => array(
        'files' => array(
          'js' => array('exlib.js'),
          'css' => array('lib_style.css'),
        ),
      ),
      '3.2' => array(
        'files' => array(
          'js' => array(
            'exlib.js',
            'gadgets/foo.js',
          ),
          'css' => array(
            'lib_style.css',
            'skin/example.css',
          ),
        ),
      ),
    ),
    // Optional: Register files to auto-load for your module. All files must be
    // keyed by module, and follow the syntax of the 'files' property.
    'integration files' => array(
      'mymodule' => array(
        'js' => array('ex_lib.inc'),
      ),
    ),
    // Optionally register callbacks to apply to the library during different
    // stages of its lifetime ('callback groups').
    'callbacks' => array(
      // Used to alter the info associated with the library.
      'info' => array(
        'mymodule_example_libraries_info_callback',
      ),
      // Called before detecting the given library.
      'pre-detect' => array(
        'mymodule_example_libraries_predetect_callback',
      ),
      // Called after detecting the library.
      'post-detect' => array(
        'mymodule_example_libraries_postdetect_callback',
      ),
      // Called before the library's dependencies are loaded.
      'pre-dependencie-load' => array(
        'mymodule_example_libraries_pre_dependencies_load_callback',
      ),
      // Called before the library is loaded.
      'pre-load' => array(
        'mymodule_example_libraries_preload_callback',
      ),
      // Called after the library is loaded.
      'post-load' => array(
        'mymodule_example_libraries_postload_callback',
      ),
    ),
  );

  // A very simple library. No changing APIs (hence, no versions), no variants.
  // Expected to be extracted into 'sites/all/libraries/simple'.
  $libraries['simple'] = array(
    'name' => 'Simple library',
    'vendor url' => 'http://example.com/simple',
    'download url' => 'http://example.com/simple',
    'version arguments' => array(
      'file' => 'readme.txt',
      // Best practice: Document the actual version strings for later reference.
      // 1.x: Version 1.0
      'pattern' => '/Version (\d+)/',
      'lines' => 5,
    ),
    'files' => array(
      'js' => array('simple.js'),
    ),
  );

  // A library that (naturally) evolves over time with API changes.
  $libraries['tinymce'] = array(
    'name' => 'TinyMCE',
    'vendor url' => 'http://tinymce.moxiecode.com',
    'download url' => 'http://tinymce.moxiecode.com/download.php',
    'path' => 'jscripts/tiny_mce',
    // The regular expression catches two parts (the major and the minor
    // version), which libraries_get_version() doesn't allow.
    'version callback' => 'tinymce_get_version',
    'version arguments' => array(
      // It can be easier to parse the first characters of a minified file
      // instead of doing a multi-line pattern matching in a source file. See
      // 'lines' and 'cols' below.
      'file' => 'jscripts/tiny_mce/tiny_mce.js',
      // Best practice: Document the actual version strings for later reference.
      // 2.x: this.majorVersion="2";this.minorVersion="1.3"
      // 3.x: majorVersion:'3',minorVersion:'2.0.1'
      'pattern' => '@majorVersion[=:]["\'](\d).+?minorVersion[=:]["\']([\d\.]+)@',
      'lines' => 1,
      'cols' => 100,
    ),
    'versions' => array(
      '2.1' => array(
        'files' => array(
          'js' => array('tiny_mce.js'),
        ),
        'variants' => array(
          'source' => array(
            'files' => array(
              'js' => array('tiny_mce_src.js'),
            ),
          ),
        ),
        'integration files' => array(
          'wysiwyg' => array(
            'js' => array('editors/js/tinymce-2.js'),
            'css' => array('editors/js/tinymce-2.css'),
          ),
        ),
      ),
      // Definition used if 3.1 or above is detected.
      '3.1' => array(
        // Does not support JS aggregation.
        'files' => array(
          'js' => array(
            'tiny_mce.js' => array('preprocess' => FALSE),
          ),
        ),
        'variants' => array(
          // New variant leveraging jQuery. Not stable yet; therefore not the
          // default variant.
          'jquery' => array(
            'files' => array(
              'js' => array(
                'tiny_mce_jquery.js' => array('preprocess' => FALSE),
              ),
            ),
          ),
          'source' => array(
            'files' => array(
              'js' => array(
                'tiny_mce_src.js' => array('preprocess' => FALSE),
              ),
            ),
          ),
        ),
        'integration files' => array(
          'wysiwyg' => array(
            'js' => array('editors/js/tinymce-3.js'),
            'css' => array('editors/js/tinymce-3.css'),
          ),
        ),
      ),
    ),
  );
  return $libraries;
";}s:25:"hook_libraries_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_libraries_info_alter";s:10:"definition";s:47:"function hook_libraries_info_alter(&$libraries)";s:11:"description";s:71:"Alter the library information before detection and caching takes place.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:9:"libraries";s:9:"file_path";s:57:"/home/lit/lit-dev/.git/../drush/hooks/7/libraries.api.php";s:4:"body";s:165:"
  $files = array(
    'php' => array('example_module.php_spellchecker.inc'),
  );
  $libraries['php_spellchecker']['integration files']['example_module'] = $files;
";}s:20:"hook_libraries_paths";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_libraries_paths";s:10:"definition";s:31:"function hook_libraries_paths()";s:11:"description";s:45:"Specify paths to look for library info files.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:9:"libraries";s:9:"file_path";s:57:"/home/lit/lit-dev/.git/../drush/hooks/7/libraries.api.php";s:4:"body";s:176:"
  // Taken from the Libraries test module, which needs to specify the path to
  // the test library.
  return array(drupal_get_path('module', 'libraries_test') . '/example');
";}}s:6:"locale";a:2:{s:11:"hook_locale";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_locale";s:10:"definition";s:36:"function hook_locale($op = 'groups')";s:11:"description";s:70:"Allows modules to define their own text groups that can be translated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"locale";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/locale.api.php";s:4:"body";s:86:"
  switch ($op) {
    case 'groups':
      return array('custom' => t('Custom'));
  }
";}s:34:"hook_multilingual_settings_changed";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_multilingual_settings_changed";s:10:"definition";s:45:"function hook_multilingual_settings_changed()";s:11:"description";s:52:"Allow modules to react to language settings changes.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"locale";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/locale.api.php";s:4:"body";s:29:"
  field_info_cache_clear();
";}}s:4:"menu";a:3:{s:16:"hook_menu_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_menu_insert";s:10:"definition";s:32:"function hook_menu_insert($menu)";s:11:"description";s:34:"Respond to a custom menu creation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"menu";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/menu.api.php";s:4:"body";s:215:"
  // For example, we track available menus in a variable.
  $my_menus = variable_get('my_module_menus', array());
  $my_menus[$menu['menu_name']] = $menu['menu_name'];
  variable_set('my_module_menus', $my_menus);
";}s:16:"hook_menu_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_menu_update";s:10:"definition";s:32:"function hook_menu_update($menu)";s:11:"description";s:32:"Respond to a custom menu update.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"menu";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/menu.api.php";s:4:"body";s:215:"
  // For example, we track available menus in a variable.
  $my_menus = variable_get('my_module_menus', array());
  $my_menus[$menu['menu_name']] = $menu['menu_name'];
  variable_set('my_module_menus', $my_menus);
";}s:16:"hook_menu_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_menu_delete";s:10:"definition";s:32:"function hook_menu_delete($menu)";s:11:"description";s:34:"Respond to a custom menu deletion.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"menu";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/menu.api.php";s:4:"body";s:185:"
  // Delete the record from our variable.
  $my_menus = variable_get('my_module_menus', array());
  unset($my_menus[$menu['menu_name']]);
  variable_set('my_module_menus', $my_menus);
";}}s:15:"menu_attributes";a:1:{s:24:"hook_menu_attribute_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_menu_attribute_info";s:10:"definition";s:53:"function hook_menu_attribute_info(array &$attributes)";s:11:"description";s:39:"Alter the list of menu item attributes.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"menu_attributes";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/menu_attributes.api.php";s:4:"body";s:308:"
  // Add a Tabindex attribute.
  $info['tabindex'] = array(
    'label' => t('Tabindex'),
    'description' => t('Specifies the tab order for the link.'),
    'form' => array(
      '#maxlength' => 3,
      '#size' => 2,
    ),
  );

  // Remove the Access Key attribute.
  unset($attributes['accesskey']);
";}}s:4:"node";a:32:{s:16:"hook_node_grants";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_node_grants";s:10:"definition";s:40:"function hook_node_grants($account, $op)";s:11:"description";s:60:"Inform the node access system what permissions the user has.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:166:"
  if (user_access('access private content', $account)) {
    $grants['example'] = array(1);
  }
  $grants['example_owner'] = array($account->uid);
  return $grants;
";}s:24:"hook_node_access_records";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_node_access_records";s:10:"definition";s:40:"function hook_node_access_records($node)";s:11:"description";s:57:"Set permissions for a node to be written to the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:1017:"
  // We only care about the node if it has been marked private. If not, it is
  // treated just like any other node and we completely ignore it.
  if ($node->private) {
    $grants = array();
    // Only published nodes should be viewable to all users. If we allow access
    // blindly here, then all users could view an unpublished node.
    if ($node->status) {
      $grants[] = array(
        'realm' => 'example',
        'gid' => 1,
        'grant_view' => 1,
        'grant_update' => 0,
        'grant_delete' => 0,
        'priority' => 0,
      );
    }
    // For the example_author array, the GID is equivalent to a UID, which
    // means there are many groups of just 1 user.
    // Note that an author can always view his or her nodes, even if they
    // have status unpublished.
    $grants[] = array(
      'realm' => 'example_author',
      'gid' => $node->uid,
      'grant_view' => 1,
      'grant_update' => 1,
      'grant_delete' => 1,
      'priority' => 0,
    );

    return $grants;
  }
";}s:30:"hook_node_access_records_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_node_access_records_alter";s:10:"definition";s:56:"function hook_node_access_records_alter(&$grants, $node)";s:11:"description";s:66:"Alter permissions for a node before it is written to the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:526:"
  // Our module allows editors to mark specific articles with the 'is_preview'
  // field. If the node being saved has a TRUE value for that field, then only
  // our grants are retained, and other grants are removed. Doing so ensures
  // that our rules are enforced no matter what priority other grants are given.
  if ($node->is_preview) {
    // Our module grants are set in $grants['example'].
    $temp = $grants['example'];
    // Now remove all module grants but our own.
    $grants = array('example' => $temp);
  }
";}s:22:"hook_node_grants_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_node_grants_alter";s:10:"definition";s:56:"function hook_node_grants_alter(&$grants, $account, $op)";s:11:"description";s:67:"Alter user access rules when trying to view, edit or delete a node.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:614:"
  // Our sample module never allows certain roles to edit or delete
  // content. Since some other node access modules might allow this
  // permission, we expressly remove it by returning an empty $grants
  // array for roles specified in our variable setting.

  // Get our list of banned roles.
  $restricted = variable_get('example_restricted_roles', array());

  if ($op != 'view' && !empty($restricted)) {
    // Now check the roles for this account against the restrictions.
    foreach ($restricted as $role_id) {
      if (isset($account->roles[$role_id])) {
        $grants = array();
      }
    }
  }
";}s:20:"hook_node_operations";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_node_operations";s:10:"definition";s:31:"function hook_node_operations()";s:11:"description";s:25:"Add mass node operations.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:1484:"
  $operations = array(
    'publish' => array(
      'label' => t('Publish selected content'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('status' => NODE_PUBLISHED)),
    ),
    'unpublish' => array(
      'label' => t('Unpublish selected content'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('status' => NODE_NOT_PUBLISHED)),
    ),
    'promote' => array(
      'label' => t('Promote selected content to front page'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('status' => NODE_PUBLISHED, 'promote' => NODE_PROMOTED)),
    ),
    'demote' => array(
      'label' => t('Demote selected content from front page'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('promote' => NODE_NOT_PROMOTED)),
    ),
    'sticky' => array(
      'label' => t('Make selected content sticky'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('status' => NODE_PUBLISHED, 'sticky' => NODE_STICKY)),
    ),
    'unsticky' => array(
      'label' => t('Make selected content not sticky'),
      'callback' => 'node_mass_update',
      'callback arguments' => array('updates' => array('sticky' => NODE_NOT_STICKY)),
    ),
    'delete' => array(
      'label' => t('Delete selected content'),
      'callback' => NULL,
    ),
  );
  return $operations;
";}s:16:"hook_node_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_node_delete";s:10:"definition";s:32:"function hook_node_delete($node)";s:11:"description";s:25:"Respond to node deletion.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('nid', $node->nid)
    ->execute();
";}s:25:"hook_node_revision_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_node_revision_delete";s:10:"definition";s:41:"function hook_node_revision_delete($node)";s:11:"description";s:39:"Respond to deletion of a node revision.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('vid', $node->vid)
    ->execute();
";}s:16:"hook_node_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_node_insert";s:10:"definition";s:32:"function hook_node_insert($node)";s:11:"description";s:34:"Respond to creation of a new node.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:126:"
  db_insert('mytable')
    ->fields(array(
      'nid' => $node->nid,
      'extra' => $node->extra,
    ))
    ->execute();
";}s:14:"hook_node_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_node_load";s:10:"definition";s:39:"function hook_node_load($nodes, $types)";s:11:"description";s:54:"Act on arbitrary nodes being loaded from the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:442:"
  // Decide whether any of $types are relevant to our purposes.
  if (count(array_intersect($types_we_want_to_process, $types))) {
    // Gather our extra data for each of these nodes.
    $result = db_query('SELECT nid, foo FROM {mytable} WHERE nid IN(:nids)', array(':nids' => array_keys($nodes)));
    // Add our extra data to the node objects.
    foreach ($result as $record) {
      $nodes[$record->nid]->foo = $record->foo;
    }
  }
";}s:16:"hook_node_access";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_node_access";s:10:"definition";s:47:"function hook_node_access($node, $op, $account)";s:11:"description";s:25:"Control access to a node.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:826:"
  $type = is_string($node) ? $node : $node->type;

  if (in_array($type, node_permissions_get_configured_types())) {
    if ($op == 'create' && user_access('create ' . $type . ' content', $account)) {
      return NODE_ACCESS_ALLOW;
    }

    if ($op == 'update') {
      if (user_access('edit any ' . $type . ' content', $account) || (user_access('edit own ' . $type . ' content', $account) && ($account->uid == $node->uid))) {
        return NODE_ACCESS_ALLOW;
      }
    }

    if ($op == 'delete') {
      if (user_access('delete any ' . $type . ' content', $account) || (user_access('delete own ' . $type . ' content', $account) && ($account->uid == $node->uid))) {
        return NODE_ACCESS_ALLOW;
      }
    }
  }

  // Returning nothing from this function would have the same effect.
  return NODE_ACCESS_IGNORE;
";}s:17:"hook_node_prepare";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_node_prepare";s:10:"definition";s:33:"function hook_node_prepare($node)";s:11:"description";s:60:"Act on a node object about to be shown on the add/edit form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:114:"
  if (!isset($node->comment)) {
    $node->comment = variable_get("comment_$node->type", COMMENT_NODE_OPEN);
  }
";}s:23:"hook_node_search_result";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_node_search_result";s:10:"definition";s:39:"function hook_node_search_result($node)";s:11:"description";s:49:"Act on a node being displayed as a search result.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:226:"
  $comments = db_query('SELECT comment_count FROM {node_comment_statistics} WHERE nid = :nid', array('nid' => $node->nid))->fetchField();
  return array('comment' => format_plural($comments, '1 comment', '@count comments'));
";}s:17:"hook_node_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_node_presave";s:10:"definition";s:33:"function hook_node_presave($node)";s:11:"description";s:40:"Act on a node being inserted or updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:152:"
  if ($node->nid && $node->moderate) {
    // Reset votes when node is updated:
    $node->score = 0;
    $node->users = '';
    $node->votes = 0;
  }
";}s:16:"hook_node_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_node_update";s:10:"definition";s:32:"function hook_node_update($node)";s:11:"description";s:29:"Respond to updates to a node.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:121:"
  db_update('mytable')
    ->fields(array('extra' => $node->extra))
    ->condition('nid', $node->nid)
    ->execute();
";}s:22:"hook_node_update_index";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_node_update_index";s:10:"definition";s:38:"function hook_node_update_index($node)";s:11:"description";s:42:"Act on a node being indexed for searching.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:370:"
  $text = '';
  $comments = db_query('SELECT subject, comment, format FROM {comment} WHERE nid = :nid AND status = :status', array(':nid' => $node->nid, ':status' => COMMENT_PUBLISHED));
  foreach ($comments as $comment) {
    $text .= '<h2>' . check_plain($comment->subject) . '</h2>' . check_markup($comment->comment, $comment->format, '', TRUE);
  }
  return $text;
";}s:18:"hook_node_validate";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_node_validate";s:10:"definition";s:55:"function hook_node_validate($node, $form, &$form_state)";s:11:"description";s:60:"Perform node validation before a node is created or updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:173:"
  if (isset($node->end) && isset($node->start)) {
    if ($node->start > $node->end) {
      form_set_error('time', t('An event may not end before it starts.'));
    }
  }
";}s:16:"hook_node_submit";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_node_submit";s:10:"definition";s:53:"function hook_node_submit($node, $form, &$form_state)";s:11:"description";s:65:"Act on a node after validated form values have been copied to it.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:310:"
  // Decompose the selected menu parent option into 'menu_name' and 'plid', if
  // the form used the default parent selection widget.
  if (!empty($form_state['values']['menu']['parent'])) {
    list($node->menu['menu_name'], $node->menu['plid']) = explode(':', $form_state['values']['menu']['parent']);
  }
";}s:14:"hook_node_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_node_view";s:10:"definition";s:53:"function hook_node_view($node, $view_mode, $langcode)";s:11:"description";s:55:"Act on a node that is being assembled before rendering.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:160:"
  $node->content['my_additional_field'] = array(
    '#markup' => $additional_field,
    '#weight' => 10,
    '#theme' => 'mymodule_my_additional_field',
  );
";}s:20:"hook_node_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_node_view_alter";s:10:"definition";s:38:"function hook_node_view_alter(&$build)";s:11:"description";s:33:"Alter the results of node_view().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:297:"
  if ($build['#view_mode'] == 'full' && isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;
  }

  // Add a #post_render callback to act on the rendered HTML of the node.
  $build['#post_render'][] = 'my_module_node_post_render';
";}s:14:"hook_node_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_node_info";s:10:"definition";s:25:"function hook_node_info()";s:11:"description";s:34:"Define module-provided node types.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:194:"
  return array(
    'blog' => array(
      'name' => t('Blog entry'),
      'base' => 'blog',
      'description' => t('Use for multi-user blogs. Every user gets a personal blog.'),
    )
  );
";}s:12:"hook_ranking";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:12:"hook_ranking";s:10:"definition";s:23:"function hook_ranking()";s:11:"description";s:72:"Provide additional methods of scoring for core search results for nodes.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:754:"
  // If voting is disabled, we can avoid returning the array, no hard feelings.
  if (variable_get('vote_node_enabled', TRUE)) {
    return array(
      'vote_average' => array(
        'title' => t('Average vote'),
        // Note that we use i.sid, the search index's search item id, rather than
        // n.nid.
        'join' => 'LEFT JOIN {vote_node_data} vote_node_data ON vote_node_data.nid = i.sid',
        // The highest possible score should be 1, and the lowest possible score,
        // always 0, should be 0.
        'score' => 'vote_node_data.average / CAST(%f AS DECIMAL)',
        // Pass in the highest possible voting score as a decimal argument.
        'arguments' => array(variable_get('vote_score_max', 5)),
      ),
    );
  }
";}s:21:"hook_node_type_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_node_type_insert";s:10:"definition";s:37:"function hook_node_type_insert($info)";s:11:"description";s:30:"Respond to node type creation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:124:"
  drupal_set_message(t('You have just created a content type with a machine name %type.', array('%type' => $info->type)));
";}s:21:"hook_node_type_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_node_type_update";s:10:"definition";s:37:"function hook_node_type_update($info)";s:11:"description";s:29:"Respond to node type updates.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:252:"
  if (!empty($info->old_type) && $info->old_type != $info->type) {
    $setting = variable_get('comment_' . $info->old_type, COMMENT_NODE_OPEN);
    variable_del('comment_' . $info->old_type);
    variable_set('comment_' . $info->type, $setting);
  }
";}s:21:"hook_node_type_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_node_type_delete";s:10:"definition";s:37:"function hook_node_type_delete($info)";s:11:"description";s:30:"Respond to node type deletion.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:43:"
  variable_del('comment_' . $info->type);
";}s:11:"hook_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_delete";s:10:"definition";s:27:"function hook_delete($node)";s:11:"description";s:25:"Respond to node deletion.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('nid', $node->nid)
    ->execute();
";}s:12:"hook_prepare";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:12:"hook_prepare";s:10:"definition";s:28:"function hook_prepare($node)";s:11:"description";s:60:"Act on a node object about to be shown on the add/edit form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:455:"
  if ($file = file_check_upload($field_name)) {
    $file = file_save_upload($field_name, _image_filename($file->filename, NULL, TRUE));
    if ($file) {
      if (!image_get_info($file->uri)) {
        form_set_error($field_name, t('Uploaded file is not a valid image'));
        return;
      }
    }
    else {
      return;
    }
    $node->images['_original'] = $file->uri;
    _image_build_derivatives($node, TRUE);
    $node->new_file = TRUE;
  }
";}s:9:"hook_form";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_form";s:10:"definition";s:39:"function hook_form($node, &$form_state)";s:11:"description";s:28:"Display a node editing form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:713:"
  $type = node_type_get_type($node);

  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => check_plain($type->title_label),
    '#default_value' => !empty($node->title) ? $node->title : '',
    '#required' => TRUE, '#weight' => -5
  );

  $form['field1'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom field'),
    '#default_value' => $node->field1,
    '#maxlength' => 127,
  );
  $form['selectbox'] = array(
    '#type' => 'select',
    '#title' => t('Select box'),
    '#default_value' => $node->selectbox,
    '#options' => array(
      1 => 'Option A',
      2 => 'Option B',
      3 => 'Option C',
    ),
    '#description' => t('Choose an option.'),
  );

  return $form;
";}s:11:"hook_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_insert";s:10:"definition";s:27:"function hook_insert($node)";s:11:"description";s:34:"Respond to creation of a new node.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:126:"
  db_insert('mytable')
    ->fields(array(
      'nid' => $node->nid,
      'extra' => $node->extra,
    ))
    ->execute();
";}s:9:"hook_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_load";s:10:"definition";s:26:"function hook_load($nodes)";s:11:"description";s:44:"Act on nodes being loaded from the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:199:"
  $result = db_query('SELECT nid, foo FROM {mytable} WHERE nid IN (:nids)', array(':nids' => array_keys($nodes)));
  foreach ($result as $record) {
    $nodes[$record->nid]->foo = $record->foo;
  }
";}s:11:"hook_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_update";s:10:"definition";s:27:"function hook_update($node)";s:11:"description";s:29:"Respond to updates to a node.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:121:"
  db_update('mytable')
    ->fields(array('extra' => $node->extra))
    ->condition('nid', $node->nid)
    ->execute();
";}s:13:"hook_validate";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:13:"hook_validate";s:10:"definition";s:50:"function hook_validate($node, $form, &$form_state)";s:11:"description";s:60:"Perform node validation before a node is created or updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:173:"
  if (isset($node->end) && isset($node->start)) {
    if ($node->start > $node->end) {
      form_set_error('time', t('An event may not end before it starts.'));
    }
  }
";}s:9:"hook_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:9:"hook_view";s:10:"definition";s:37:"function hook_view($node, $view_mode)";s:11:"description";s:15:"Display a node.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"node";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/node.api.php";s:4:"body";s:419:"
  if ($view_mode == 'full' && node_is_page($node)) {
    $breadcrumb = array();
    $breadcrumb[] = l(t('Home'), NULL);
    $breadcrumb[] = l(t('Example'), 'example');
    $breadcrumb[] = l($node->field1, 'example/' . $node->field1);
    drupal_set_breadcrumb($breadcrumb);
  }

  $node->content['myfield'] = array(
    '#markup' => theme('mymodule_myfield', $node->myfield),
    '#weight' => 1,
  );

  return $node;
";}}s:11:"node_export";a:1:{s:33:"hook_node_export_dependency_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_node_export_dependency_alter";s:10:"definition";s:74:"function hook_node_export_dependency_alter(&$handled, &$node, $dependency)";s:11:"description";s:40:"Handle dependencies not already handled.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:11:"node_export";s:9:"file_path";s:70:"/home/lit/lit-dev/.git/../drush/hooks/7/node_export_dependency.api.php";s:4:"body";s:128:"
  if (!$handled) {
    // Attempt to handle the dependency here.
    // If it's handled successfully set $handled to TRUE.
  }
";}}s:6:"openid";a:6:{s:11:"hook_openid";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:11:"hook_openid";s:10:"definition";s:35:"function hook_openid($op, $request)";s:11:"description";s:54:"Allow modules to modify the OpenID request parameters.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"openid";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/openid.api.php";s:4:"body";s:115:"
  if ($op == 'request') {
    $request['openid.identity'] = 'http://myname.myopenid.com/';
  }
  return $request;
";}s:20:"hook_openid_response";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_openid_response";s:10:"definition";s:50:"function hook_openid_response($response, $account)";s:11:"description";s:52:"Allow modules to act upon a successful OpenID login.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"openid";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/openid.api.php";s:4:"body";s:99:"
  if (isset($response['openid.ns.ax'])) {
    _mymodule_store_ax_fields($response, $account);
  }
";}s:33:"hook_openid_discovery_method_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:33:"hook_openid_discovery_method_info";s:10:"definition";s:44:"function hook_openid_discovery_method_info()";s:11:"description";s:50:"Allow modules to declare OpenID discovery methods.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"openid";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/openid.api.php";s:4:"body";s:74:"
  return array(
    'new_discovery_idea' => '_my_discovery_method',
  );
";}s:39:"hook_openid_discovery_method_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:39:"hook_openid_discovery_method_info_alter";s:10:"definition";s:59:"function hook_openid_discovery_method_info_alter(&$methods)";s:11:"description";s:41:"Allow modules to alter discovery methods.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"openid";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/openid.api.php";s:4:"body";s:61:"
  // Remove XRI discovery scheme.
  unset($methods['xri']);
";}s:37:"hook_openid_normalization_method_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_openid_normalization_method_info";s:10:"definition";s:48:"function hook_openid_normalization_method_info()";s:11:"description";s:54:"Allow modules to declare OpenID normalization methods.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"openid";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/openid.api.php";s:4:"body";s:82:"
  return array(
    'new_normalization_idea' => '_my_normalization_method',
  );
";}s:43:"hook_openid_normalization_method_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:43:"hook_openid_normalization_method_info_alter";s:10:"definition";s:63:"function hook_openid_normalization_method_info_alter(&$methods)";s:11:"description";s:45:"Allow modules to alter normalization methods.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"openid";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/openid.api.php";s:4:"body";s:72:"
  // Remove Google IDP normalization.
  unset($methods['google_idp']);
";}}s:7:"overlay";a:2:{s:30:"hook_overlay_parent_initialize";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_overlay_parent_initialize";s:10:"definition";s:41:"function hook_overlay_parent_initialize()";s:11:"description";s:66:"Allow modules to act when an overlay parent window is initialized.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"overlay";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/overlay.api.php";s:4:"body";s:106:"
  // Add our custom JavaScript.
  drupal_add_js(drupal_get_path('module', 'hook') . '/hook-overlay.js');
";}s:29:"hook_overlay_child_initialize";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_overlay_child_initialize";s:10:"definition";s:40:"function hook_overlay_child_initialize()";s:11:"description";s:65:"Allow modules to act when an overlay child window is initialized.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"overlay";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/overlay.api.php";s:4:"body";s:112:"
  // Add our custom JavaScript.
  drupal_add_js(drupal_get_path('module', 'hook') . '/hook-overlay-child.js');
";}}s:4:"path";a:3:{s:16:"hook_path_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_path_insert";s:10:"definition";s:32:"function hook_path_insert($path)";s:11:"description";s:33:"Respond to a path being inserted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"path";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/path.api.php";s:4:"body";s:130:"
  db_insert('mytable')
    ->fields(array(
      'alias' => $path['alias'],
      'pid' => $path['pid'],
    ))
    ->execute();
";}s:16:"hook_path_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_path_update";s:10:"definition";s:32:"function hook_path_update($path)";s:11:"description";s:32:"Respond to a path being updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"path";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/path.api.php";s:4:"body";s:125:"
  db_update('mytable')
    ->fields(array('alias' => $path['alias']))
    ->condition('pid', $path['pid'])
    ->execute();
";}s:16:"hook_path_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_path_delete";s:10:"definition";s:32:"function hook_path_delete($path)";s:11:"description";s:32:"Respond to a path being deleted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"path";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/path.api.php";s:4:"body";s:78:"
  db_delete('mytable')
    ->condition('pid', $path['pid'])
    ->execute();
";}}s:8:"pathauto";a:2:{s:25:"hook_pathauto_alias_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_pathauto_alias_alter";s:10:"definition";s:60:"function hook_pathauto_alias_alter(&$alias, array &$context)";s:11:"description";s:47:"Alter Pathauto-generated aliases before saving.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"pathauto";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/pathauto.api.php";s:4:"body";s:194:"
  // Add a suffix so that all aliases get saved as 'content/my-title.html'
  $alias .= '.html';

  // Force all aliases to be saved as language neutral.
  $context['language'] = LANGUAGE_NONE;
";}s:37:"hook_pathauto_punctuation_chars_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_pathauto_punctuation_chars_alter";s:10:"definition";s:67:"function hook_pathauto_punctuation_chars_alter(array &$punctuation)";s:11:"description";s:62:"Alter the list of punctuation characters for Pathauto control.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"pathauto";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/pathauto.api.php";s:4:"body";s:183:"
  // Add the trademark symbol.
  $punctuation['trademark'] = array('value' => '™', 'name' => t('Trademark symbol'));

  // Remove the dollar sign.
  unset($punctuation['dollar']);
";}}s:16:"profiler_builder";a:10:{s:39:"hook_profiler_builder_defined_libraries";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:39:"hook_profiler_builder_defined_libraries";s:10:"definition";s:50:"function hook_profiler_builder_defined_libraries()";s:11:"description";s:53:"Implements hook_profiler_builder_defined_libraries().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:316:"
  $defined_libs = array();
   // oauth hasn't cleared packaging script but will soon
  $defined_libs['oauth']['_name'] = t('OAuth Drupal fork');
  $defined_libs['oauth']['_local'] = TRUE;
  $defined_libs['oauth']['download_url'] = "https://github.com/juampy72/OAuth-PHP/archive/master.zip";
  return $defined_libs;
";}s:45:"hook_profiler_builder_defined_libraries_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:45:"hook_profiler_builder_defined_libraries_alter";s:10:"definition";s:70:"function hook_profiler_builder_defined_libraries_alter(&$defined_libs)";s:11:"description";s:59:"Implements hook_profiler_builder_defined_libraries_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:75:"
  $defined_libs['bootstrap']['destination'] = "themes/contrib/bootstrap";
";}s:42:"hook_profiler_builder_libraries_list_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:42:"hook_profiler_builder_libraries_list_alter";s:10:"definition";s:87:"function hook_profiler_builder_libraries_list_alter(&$libraries, $local, $machine_name)";s:11:"description";s:56:"Implements hook_profiler_builder_libraries_list_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:913:"
  // always use profiler dev if enabled
  if (isset($libraries['profiler'])) {
    $libraries['profiler']['_name'] = t('Profiler');
    $libraries['profiler']['download'] = 'http://ftp.drupal.org/files/projects/profiler-7.x-2.x-dev.tar.gz';
  }
  // if this is a local example build to include this non-d.o. capable library
  // bootstrap can't be hosted on d.o. because of licensing issues
  if (isset($libraries['bootstrap'])) {
    // define it if its a local build file
    if ($local) {
      $libraries['bootstrap']['_name'] = t('Twitter Bootstrap');
      $libraries['bootstrap']['directory_name'] = "bootstrap";
      $libraries['bootstrap']['destination'] = "themes/contrib/bootstrap";
      $libraries['bootstrap']['download_url'] = "http://twitter.github.com/bootstrap/assets/bootstrap.zip";
    }
    else {
      // remove it if its a d.o. build file
      unset($libraries['bootstrap']);
    }
  }
";}s:40:"hook_profiler_builder_modules_list_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:40:"hook_profiler_builder_modules_list_alter";s:10:"definition";s:60:"function hook_profiler_builder_modules_list_alter(&$modules)";s:11:"description";s:54:"Implements hook_profiler_builder_modules_list_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:54:"
  // remove the cdn module
  unset($modules['cdn']);
";}s:46:"hook_profiler_builder_drush_modules_list_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:46:"hook_profiler_builder_drush_modules_list_alter";s:10:"definition";s:86:"function hook_profiler_builder_drush_modules_list_alter(&$project_data, $machine_name)";s:11:"description";s:54:"Implements hook_profiler_builder_modules_list_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:98:"
  // remove all modules listed as part of the distribution
  unset($project_data[$distro_name]);
";}s:34:"hook_profiler_builder_ignore_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_profiler_builder_ignore_alter";s:10:"definition";s:53:"function hook_profiler_builder_ignore_alter(&$ignore)";s:11:"description";s:48:"Implements hook_profiler_builder_ignore_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:60:"
  // ignore the cdn settings
  $ignore[] = 'cdn_settings';
";}s:37:"hook_profiler_builder_variables_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_profiler_builder_variables_alter";s:10:"definition";s:59:"function hook_profiler_builder_variables_alter(&$variables)";s:11:"description";s:51:"Implements hook_profiler_builder_variables_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:238:"
  // variable values to change
  $change = array(
    'cdn_status' => 0,
  );
  // loop through and change only set values
  foreach ($change as $var => $val) {
    if (isset($variables[$var])) {
      $variables[$var] = $val;
    }
  }
";}s:34:"hook_profiler_builder_info_include";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_profiler_builder_info_include";s:10:"definition";s:55:"function hook_profiler_builder_info_include(&$includes)";s:11:"description";s:54:"Implements hook_profiler_builder_info_include_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:75:"
  $includes['modules']['callback'] = 'my_new_callback_to_handle_modules';
";}s:37:"hook_profiler_builder_patch_locations";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_profiler_builder_patch_locations";s:10:"definition";s:48:"function hook_profiler_builder_patch_locations()";s:11:"description";s:51:"Implements hook_profiler_builder_patch_locations().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:108:"
  $locations = array(
    'includes',
    'misc',
    'modules',
    'profiles',
  );
  return $locations;
";}s:43:"hook_profiler_builder_patch_locations_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:43:"hook_profiler_builder_patch_locations_alter";s:10:"definition";s:65:"function hook_profiler_builder_patch_locations_alter(&$locations)";s:11:"description";s:57:"Implements hook_profiler_builder_patch_locations_alter().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:16:"profiler_builder";s:9:"file_path";s:64:"/home/lit/lit-dev/.git/../drush/hooks/7/profiler_builder.api.php";s:4:"body";s:172:"
  foreach ($locations as $key => $location) {
    // don't scan profiles directory for patches
    if ($location == 'profiles') {
      unset($locations[$key]);
    }
  }
";}}s:3:"rdf";a:2:{s:16:"hook_rdf_mapping";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_rdf_mapping";s:10:"definition";s:27:"function hook_rdf_mapping()";s:11:"description";s:55:"Allow modules to define RDF mappings for field bundles.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:3:"rdf";s:9:"file_path";s:51:"/home/lit/lit-dev/.git/../drush/hooks/7/rdf.api.php";s:4:"body";s:713:"
  return array(
    array(
      'type' => 'node',
      'bundle' => 'blog',
      'mapping' => array(
        'rdftype' => array('sioct:Weblog'),
        'title' => array(
          'predicates' => array('dc:title'),
        ),
        'created' => array(
          'predicates' => array('dc:date', 'dc:created'),
          'datatype' => 'xsd:dateTime',
          'callback' => 'date_iso8601',
        ),
        'body' => array(
          'predicates' => array('content:encoded'),
        ),
        'uid' => array(
          'predicates' => array('sioc:has_creator'),
          'type' => 'rel',
        ),
        'name' => array(
          'predicates' => array('foaf:name'),
        ),
      ),
    ),
  );
";}s:19:"hook_rdf_namespaces";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_rdf_namespaces";s:10:"definition";s:30:"function hook_rdf_namespaces()";s:11:"description";s:52:"Allow modules to define namespaces for RDF mappings.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:3:"rdf";s:9:"file_path";s:51:"/home/lit/lit-dev/.git/../drush/hooks/7/rdf.api.php";s:4:"body";s:485:"
  return array(
    'content'  => 'http://purl.org/rss/1.0/modules/content/',
    'dc'       => 'http://purl.org/dc/terms/',
    'foaf'     => 'http://xmlns.com/foaf/0.1/',
    'og'       => 'http://ogp.me/ns#',
    'rdfs'     => 'http://www.w3.org/2000/01/rdf-schema#',
    'sioc'     => 'http://rdfs.org/sioc/ns#',
    'sioct'    => 'http://rdfs.org/sioc/types#',
    'skos'     => 'http://www.w3.org/2004/02/skos/core#',
    'xsd'      => 'http://www.w3.org/2001/XMLSchema#',
  );
";}}s:8:"realname";a:3:{s:27:"hook_realname_pattern_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:27:"hook_realname_pattern_alter";s:10:"definition";s:57:"function hook_realname_pattern_alter(&$pattern, $account)";s:11:"description";s:61:"Alter the pattern for a user's real name prior to generation.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"realname";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/realname.api.php";s:4:"body";s:2:"

";}s:19:"hook_realname_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_realname_alter";s:10:"definition";s:50:"function hook_realname_alter(&$realname, $account)";s:11:"description";s:60:"Alter a user's real name before it is saved to the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"realname";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/realname.api.php";s:4:"body";s:2:"

";}s:20:"hook_realname_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_realname_update";s:10:"definition";s:50:"function hook_realname_update($realname, $account)";s:11:"description";s:45:"Respond to updates to an account's real name.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"realname";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/realname.api.php";s:4:"body";s:2:"

";}}s:5:"rules";a:33:{s:22:"hook_rules_action_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_rules_action_info";s:10:"definition";s:33:"function hook_rules_action_info()";s:11:"description";s:32:"Define rules compatible actions.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:409:"
  return array(
    'mail_user' => array(
      'label' => t('Send a mail to a user'),
      'parameter' => array(
        'user' => array('type' => 'user', 'label' => t('Recipient')),
      ),
      'group' => t('System'),
      'base' => 'rules_action_mail_user',
      'callbacks' => array(
        'validate' => 'rules_action_custom_validation',
        'help' => 'rules_mail_help',
      ),
    ),
  );
";}s:24:"hook_rules_category_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_rules_category_info";s:10:"definition";s:35:"function hook_rules_category_info()";s:11:"description";s:70:"Define categories for Rules items, e.g. actions, conditions or events.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:300:"
  return array(
    'rules_data' => array(
      'label' => t('Data'),
      'equals group' => t('Data'),
      'weight' => -50,
    ),
    'fluxtwitter' => array(
      'label' => t('Twitter'),
      'icon font class' => 'icon-twitter',
      'icon font background color' => '#30a9fd',
    ),
  );
";}s:20:"hook_rules_file_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_rules_file_info";s:10:"definition";s:31:"function hook_rules_file_info()";s:11:"description";s:48:"Specify files containing rules integration code.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:42:"
  return array('yourmodule.rules-eval');
";}s:20:"hook_rules_directory";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_rules_directory";s:10:"definition";s:31:"function hook_rules_directory()";s:11:"description";s:63:"Specifies directories for class-based plugin handler discovery.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:44:"
  return 'lib/Drupal/fluxtwitter/Rules/*';
";}s:25:"hook_rules_condition_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_rules_condition_info";s:10:"definition";s:36:"function hook_rules_condition_info()";s:11:"description";s:24:"Define rules conditions.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:318:"
  return array(
    'rules_condition_text_compare' => array(
      'label' => t('Textual comparison'),
      'parameter' => array(
        'text1' => array('label' => t('Text 1'), 'type' => 'text'),
        'text2' => array('label' => t('Text 2'), 'type' => 'text'),
      ),
      'group' => t('Rules'),
    ),
  );
";}s:21:"hook_rules_event_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_rules_event_info";s:10:"definition";s:32:"function hook_rules_event_info()";s:11:"description";s:20:"Define rules events.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:1192:"
  $items = array(
    'node_insert' => array(
      'label' => t('After saving new content'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('created content')),
    ),
    'node_update' => array(
      'label' => t('After updating existing content'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('updated content'), TRUE),
    ),
    'node_presave' => array(
      'label' => t('Content is going to be saved'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('saved content'), TRUE),
    ),
    'node_view' => array(
      'label' => t('Content is going to be viewed'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('viewed content')) + array(
        'view_mode' => array('type' => 'text', 'label' => t('view mode')),
      ),
    ),
    'node_delete' => array(
      'label' => t('After deleting content'),
      'group' => t('Node'),
      'variables' => rules_events_node_variables(t('deleted content')),
    ),
  );
  // Specify that on presave the node is saved anyway.
  $items['node_presave']['variables']['node']['skip save'] = TRUE;
  return $items;
";}s:20:"hook_rules_data_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_rules_data_info";s:10:"definition";s:31:"function hook_rules_data_info()";s:11:"description";s:24:"Define rules data types.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:428:"
  return array(
    'node' => array(
      'label' => t('content'),
      'parent' => 'entity',
      'group' => t('Node'),
    ),
    // Formatted text as used by in hook_entity_property_info() for text fields.
    'text_formatted' => array(
      'label' => t('formatted text'),
      'ui class' => 'RulesDataUITextFormatted',
      'wrap' => TRUE,
      'property info' => entity_property_text_formatted_info(),
    ),
  );
";}s:22:"hook_rules_plugin_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_rules_plugin_info";s:10:"definition";s:33:"function hook_rules_plugin_info()";s:11:"description";s:22:"Defines rules plugins.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:595:"
  return array(
    'or' => array(
      'label' => t('Condition set (OR)'),
      'class' => 'RulesOr',
      'embeddable' => 'RulesConditionContainer',
      'component' => TRUE,
      'extenders' => array(
        'RulesPluginUIInterface' => array(
          'class' => 'RulesConditionContainerUI',
        ),
      ),
    ),
    'rule' => array(
      'class' => 'Rule',
      'embeddable' => 'RulesRuleSet',
      'extenders' => array(
        'RulesPluginUIInterface' => array(
          'class' => 'RulesRuleUI',
        ),
      ),
      'import keys' => array('DO', 'IF'),
    ),
  );
";}s:25:"hook_rules_evaluator_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_rules_evaluator_info";s:10:"definition";s:36:"function hook_rules_evaluator_info()";s:11:"description";s:40:"Declare provided rules input evaluators.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:151:"
  return array(
    'token' => array(
      'class' => 'RulesTokenEvaluator',
      'type' => array('text', 'uri'),
      'weight' => 0,
     ),
  );
";}s:30:"hook_rules_data_processor_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_rules_data_processor_info";s:10:"definition";s:41:"function hook_rules_data_processor_info()";s:11:"description";s:39:"Declare provided rules data processors.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:149:"
  return array(
    'date_offset' => array(
      'class' => 'RulesDateOffsetProcessor',
      'type' => 'date',
      'weight' => -2,
     ),
  );
";}s:28:"hook_rules_action_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_rules_action_info_alter";s:10:"definition";s:48:"function hook_rules_action_info_alter(&$actions)";s:11:"description";s:31:"Alter rules compatible actions.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:232:"
  // The rules action is more powerful, so hide the core action
  unset($actions['rules_core_node_assign_owner_action']);
  // We prefer handling saving by rules - not by the user.
  unset($actions['rules_core_node_save_action']);
";}s:31:"hook_rules_condition_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_rules_condition_info_alter";s:10:"definition";s:54:"function hook_rules_condition_info_alter(&$conditions)";s:11:"description";s:23:"Alter rules conditions.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:25:"
  // Change conditions.
";}s:27:"hook_rules_event_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:27:"hook_rules_event_info_alter";s:10:"definition";s:46:"function hook_rules_event_info_alter(&$events)";s:11:"description";s:19:"Alter rules events.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:21:"
  // Change events.
";}s:26:"hook_rules_data_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_rules_data_info_alter";s:10:"definition";s:48:"function hook_rules_data_info_alter(&$data_info)";s:11:"description";s:23:"Alter rules data types.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:25:"
  // Change data types.
";}s:28:"hook_rules_plugin_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:28:"hook_rules_plugin_info_alter";s:10:"definition";s:52:"function hook_rules_plugin_info_alter(&$plugin_info)";s:11:"description";s:24:"Alter rules plugin info.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:26:"
  // Change plugin info.
";}s:31:"hook_rules_evaluator_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_rules_evaluator_info_alter";s:10:"definition";s:58:"function hook_rules_evaluator_info_alter(&$evaluator_info)";s:11:"description";s:33:"Alter rules input evaluator info.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:29:"
  // Change evaluator info.
";}s:36:"hook_rules_data_processor_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:36:"hook_rules_data_processor_info_alter";s:10:"definition";s:63:"function hook_rules_data_processor_info_alter(&$processor_info)";s:11:"description";s:32:"Alter rules data_processor info.";s:11:"destination";s:17:"%module.rules.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:29:"
  // Change processor info.
";}s:22:"hook_rules_config_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_rules_config_load";s:10:"definition";s:41:"function hook_rules_config_load($configs)";s:11:"description";s:58:"Act on rules configuration being loaded from the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:197:"
  $result = db_query('SELECT id, foo FROM {mytable} WHERE id IN(:ids)', array(':ids' => array_keys($configs)));
  foreach ($result as $record) {
    $configs[$record->id]->foo = $record->foo;
  }
";}s:24:"hook_rules_config_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_rules_config_insert";s:10:"definition";s:42:"function hook_rules_config_insert($config)";s:11:"description";s:49:"Respond to creation of a new rules configuration.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:131:"
  db_insert('mytable')
    ->fields(array(
      'nid' => $config->id,
      'plugin' => $config->plugin,
    ))
    ->execute();
";}s:25:"hook_rules_config_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_rules_config_presave";s:10:"definition";s:43:"function hook_rules_config_presave($config)";s:11:"description";s:55:"Act on a rules configuration being inserted or updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:135:"
  if ($config->id && $config->owner == 'your_module') {
    // Add custom condition.
    $config->conditon(/* Your condition */);
  }
";}s:24:"hook_rules_config_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_rules_config_update";s:10:"definition";s:42:"function hook_rules_config_update($config)";s:11:"description";s:44:"Respond to updates to a rules configuration.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:125:"
  db_update('mytable')
    ->fields(array('plugin' => $config->plugin))
    ->condition('id', $config->id)
    ->execute();
";}s:24:"hook_rules_config_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_rules_config_delete";s:10:"definition";s:42:"function hook_rules_config_delete($config)";s:11:"description";s:40:"Respond to rules configuration deletion.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('id', $config->id)
    ->execute();
";}s:25:"hook_rules_config_execute";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_rules_config_execute";s:10:"definition";s:43:"function hook_rules_config_execute($config)";s:11:"description";s:41:"Respond to rules configuration execution.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:2:"

";}s:32:"hook_default_rules_configuration";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_default_rules_configuration";s:10:"definition";s:43:"function hook_default_rules_configuration()";s:11:"description";s:36:"Define default rules configurations.";s:11:"destination";s:26:"%module.rules_defaults.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:476:"
  $rule = rules_reaction_rule();
  $rule->label = 'example default rule';
  $rule->active = FALSE;
  $rule->event('node_update')
       ->condition(rules_condition('data_is', array('data:select' => 'node:status', 'value' => TRUE))->negate())
       ->condition('data_is', array('data:select' => 'node:type', 'value' => 'page'))
       ->action('drupal_message', array('message' => 'A node has been updated.'));

  $configs['rules_test_default_1'] = $rule;
  return $configs;
";}s:38:"hook_default_rules_configuration_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:38:"hook_default_rules_configuration_alter";s:10:"definition";s:58:"function hook_default_rules_configuration_alter(&$configs)";s:11:"description";s:35:"Alter default rules configurations.";s:11:"destination";s:26:"%module.rules_defaults.inc";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:65:"
  // Add custom condition.
  $configs['foo']->condition('bar');
";}s:34:"hook_rules_config_defaults_rebuild";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:34:"hook_rules_config_defaults_rebuild";s:10:"definition";s:71:"function hook_rules_config_defaults_rebuild($rules_configs, $originals)";s:11:"description";s:44:"Act after rebuilding default configurations.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:440:"
  // Once all defaults have been rebuilt, update all i18n strings at once. That
  // way we build the rules cache once the rebuild is complete and avoid
  // rebuilding caches for each updated rule.
  foreach ($rules_configs as $name => $rule_config) {
    if (empty($originals[$name])) {
      rules_i18n_rules_config_insert($rule_config);
    }
    else {
      rules_i18n_rules_config_update($rule_config, $originals[$name]);
    }
  }
";}s:26:"hook_rules_component_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_rules_component_alter";s:10:"definition";s:68:"function hook_rules_component_alter($plugin, RulesPlugin $component)";s:11:"description";s:40:"Alter rules components before execution.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:2:"

";}s:26:"hook_rules_event_set_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_rules_event_set_alter";s:10:"definition";s:74:"function hook_rules_event_set_alter($event_name, RulesEventSet $event_set)";s:11:"description";s:18:"Alters event sets.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:2:"

";}s:39:"hook_rules_action_base_upgrade_map_name";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:39:"hook_rules_action_base_upgrade_map_name";s:10:"definition";s:58:"function hook_rules_action_base_upgrade_map_name($element)";s:11:"description";s:70:"D6 to D7 upgrade procedure hook for mapping action or condition names.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:22:"
  return 'data_set';
";}s:30:"hook_rules_action_base_upgrade";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_rules_action_base_upgrade";s:10:"definition";s:70:"function hook_rules_action_base_upgrade($element, RulesPlugin $target)";s:11:"description";s:78:"D6 to D7 upgrade procedure hook for mapping action or condition configuration.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:160:"
  $target->settings['data:select'] = $element['#settings']['#argument map']['node'] . ':title';
  $target->settings['value'] = $element['#settings']['title'];
";}s:32:"hook_rules_element_upgrade_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_rules_element_upgrade_alter";s:10:"definition";s:60:"function hook_rules_element_upgrade_alter($element, $target)";s:11:"description";s:78:"D6 to D7 upgrade procedure hook for mapping action or condition configuration.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:2:"

";}s:24:"hook_rules_ui_menu_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_rules_ui_menu_alter";s:10:"definition";s:67:"function hook_rules_ui_menu_alter(&$items, $base_path, $base_count)";s:11:"description";s:59:"Allows modules to alter or to extend the provided Rules UI.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:543:"
  $items[$base_path . '/manage/%rules_config/schedule'] = array(
    'title callback' => 'rules_get_title',
    'title arguments' => array('Schedule !plugin "!label"', $base_count + 1),
    'page callback' => 'drupal_get_form',
    'page arguments' => array('rules_scheduler_schedule_form', $base_count + 1, $base_path),
    'access callback' => 'rules_config_access',
    'access arguments' => array('update', $base_count + 1),
    'file' => 'rules_scheduler.admin.inc',
    'file path' => drupal_get_path('module', 'rules_scheduler'),
  );
";}s:24:"hook_rules_config_access";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_rules_config_access";s:10:"definition";s:77:"function hook_rules_config_access($op, $rules_config = NULL, $account = NULL)";s:11:"description";s:39:"Control access to Rules configurations.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:5:"rules";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/rules.api.php";s:4:"body";s:217:"
  // Instead of returning FALSE return nothing, so others still can grant
  // access.
  if (isset($rules_config) && $rules_config->owner == 'mymodule' && user_access('my modules permission')) {
    return TRUE;
  }
";}}s:6:"search";a:10:{s:16:"hook_search_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_search_info";s:10:"definition";s:27:"function hook_search_info()";s:11:"description";s:28:"Define a custom search type.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:26:"callback_search_conditions";}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:129:"
  return array(
    'title' => 'Content',
    'path' => 'node',
    'conditions_callback' => 'callback_search_conditions',
  );
";}s:18:"hook_search_access";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_search_access";s:10:"definition";s:29:"function hook_search_access()";s:11:"description";s:41:"Define access to a custom search routine.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:41:"
  return user_access('access content');
";}s:17:"hook_search_reset";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_search_reset";s:10:"definition";s:28:"function hook_search_reset()";s:11:"description";s:57:"Take action when the search index is going to be rebuilt.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:127:"
  db_update('search_dataset')
    ->fields(array('reindex' => REQUEST_TIME))
    ->condition('type', 'node')
    ->execute();
";}s:18:"hook_search_status";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_search_status";s:10:"definition";s:29:"function hook_search_status()";s:11:"description";s:30:"Report the status of indexing.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:339:"
  $total = db_query('SELECT COUNT(*) FROM {node} WHERE status = 1')->fetchField();
  $remaining = db_query("SELECT COUNT(*) FROM {node} n LEFT JOIN {search_dataset} d ON d.type = 'node' AND d.sid = n.nid WHERE n.status = 1 AND d.sid IS NULL OR d.reindex <> 0")->fetchField();
  return array('remaining' => $remaining, 'total' => $total);
";}s:17:"hook_search_admin";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_search_admin";s:10:"definition";s:28:"function hook_search_admin()";s:11:"description";s:41:"Add elements to the search settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:1020:"
  // Output form for defining rank factor weights.
  $form['content_ranking'] = array(
    '#type' => 'fieldset',
    '#title' => t('Content ranking'),
  );
  $form['content_ranking']['#theme'] = 'node_search_admin';
  $form['content_ranking']['info'] = array(
    '#value' => '<em>' . t('The following numbers control which properties the content search should favor when ordering the results. Higher numbers mean more influence, zero means the property is ignored. Changing these numbers does not require the search index to be rebuilt. Changes take effect immediately.') . '</em>'
  );

  // Note: reversed to reflect that higher number = higher ranking.
  $options = drupal_map_assoc(range(0, 10));
  foreach (module_invoke_all('ranking') as $var => $values) {
    $form['content_ranking']['factors']['node_rank_' . $var] = array(
      '#title' => $values['title'],
      '#type' => 'select',
      '#options' => $options,
      '#default_value' => variable_get('node_rank_' . $var, 0),
    );
  }
  return $form;
";}s:19:"hook_search_execute";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_search_execute";s:10:"definition";s:62:"function hook_search_execute($keys = NULL, $conditions = NULL)";s:11:"description";s:40:"Execute a search for a set of key words.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:1732:"
  // Build matching conditions
  $query = db_select('search_index', 'i', array('target' => 'slave'))->extend('SearchQuery')->extend('PagerDefault');
  $query->join('node', 'n', 'n.nid = i.sid');
  $query
    ->condition('n.status', 1)
    ->addTag('node_access')
    ->searchExpression($keys, 'node');

  // Insert special keywords.
  $query->setOption('type', 'n.type');
  $query->setOption('language', 'n.language');
  if ($query->setOption('term', 'ti.tid')) {
    $query->join('taxonomy_index', 'ti', 'n.nid = ti.nid');
  }
  // Only continue if the first pass query matches.
  if (!$query->executeFirstPass()) {
    return array();
  }

  // Add the ranking expressions.
  _node_rankings($query);

  // Load results.
  $find = $query
    ->limit(10)
    ->execute();
  $results = array();
  foreach ($find as $item) {
    // Build the node body.
    $node = node_load($item->sid);
    node_build_content($node, 'search_result');
    $node->body = drupal_render($node->content);

    // Fetch comments for snippet.
    $node->rendered .= ' ' . module_invoke('comment', 'node_update_index', $node);
    // Fetch terms for snippet.
    $node->rendered .= ' ' . module_invoke('taxonomy', 'node_update_index', $node);

    $extra = module_invoke_all('node_search_result', $node);

    $results[] = array(
      'link' => url('node/' . $item->sid, array('absolute' => TRUE)),
      'type' => check_plain(node_type_get_name($node)),
      'title' => $node->title,
      'user' => theme('username', array('account' => $node)),
      'date' => $node->changed,
      'node' => $node,
      'extra' => $extra,
      'score' => $item->calculated_score,
      'snippet' => search_excerpt($keys, $node->body),
    );
  }
  return $results;
";}s:16:"hook_search_page";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_search_page";s:10:"definition";s:35:"function hook_search_page($results)";s:11:"description";s:41:"Override the rendering of search results.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:310:"
  $output['prefix']['#markup'] = '<ol class="search-results">';

  foreach ($results as $entry) {
    $output[] = array(
      '#theme' => 'search_result',
      '#result' => $entry,
      '#module' => 'my_module_name',
    );
  }
  $output['suffix']['#markup'] = '</ol>' . theme('pager');

  return $output;
";}s:22:"hook_search_preprocess";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_search_preprocess";s:10:"definition";s:38:"function hook_search_preprocess($text)";s:11:"description";s:27:"Preprocess text for search.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:45:"
  // Do processing on $text
  return $text;
";}s:17:"hook_update_index";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_update_index";s:10:"definition";s:28:"function hook_update_index()";s:11:"description";s:40:"Update the search index for this module.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:932:"
  $limit = (int)variable_get('search_cron_limit', 100);

  $result = db_query_range("SELECT n.nid FROM {node} n LEFT JOIN {search_dataset} d ON d.type = 'node' AND d.sid = n.nid WHERE d.sid IS NULL OR d.reindex <> 0 ORDER BY d.reindex ASC, n.nid ASC", 0, $limit);

  foreach ($result as $node) {
    $node = node_load($node->nid);

    // Save the changed time of the most recent indexed node, for the search
    // results half-life calculation.
    variable_set('node_cron_last', $node->changed);

    // Render the node.
    node_build_content($node, 'search_index');
    $node->rendered = drupal_render($node->content);

    $text = '<h1>' . check_plain($node->title) . '</h1>' . $node->rendered;

    // Fetch extra data normally not visible
    $extra = module_invoke_all('node_update_index', $node);
    foreach ($extra as $t) {
      $text .= $t;
    }

    // Update index
    search_index($node->nid, 'node', $text);
  }
";}s:26:"callback_search_conditions";a:9:{s:4:"type";s:8:"callback";s:4:"name";s:26:"callback_search_conditions";s:10:"definition";s:42:"function callback_search_conditions($keys)";s:11:"description";s:32:"Provide search query conditions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"search";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/search.api.php";s:4:"body";s:405:"
  $conditions = array();

  if (!empty($_REQUEST['keys'])) {
    $conditions['keys'] = $_REQUEST['keys'];
  }
  if (!empty($_REQUEST['sample_search_keys'])) {
    $conditions['sample_search_keys'] = $_REQUEST['sample_search_keys'];
  }
  if ($force_keys = config('sample_search.settings')->get('force_keywords')) {
    $conditions['sample_search_force_keywords'] = $force_keys;
  }
  return $conditions;
";}}s:8:"shortcut";a:1:{s:25:"hook_shortcut_default_set";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_shortcut_default_set";s:10:"definition";s:44:"function hook_shortcut_default_set($account)";s:11:"description";s:72:"Return the name of a default shortcut set for the provided user account.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"shortcut";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/shortcut.api.php";s:4:"body";s:209:"
  // Use a special set of default shortcuts for administrators only.
  if (in_array(variable_get('user_admin_role', 0), $account->roles)) {
    return variable_get('mymodule_shortcut_admin_default_set');
  }
";}}s:10:"simpletest";a:4:{s:21:"hook_simpletest_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_simpletest_alter";s:10:"definition";s:40:"function hook_simpletest_alter(&$groups)";s:11:"description";s:24:"Alter the list of tests.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"simpletest";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/simpletest.api.php";s:4:"body";s:220:"
  // An alternative session handler module would not want to run the original
  // Session HTTPS handling test because it checks the sessions table in the
  // database.
  unset($groups['Session']['testHttpsSession']);
";}s:23:"hook_test_group_started";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_test_group_started";s:10:"definition";s:34:"function hook_test_group_started()";s:11:"description";s:25:"A test group has started.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"simpletest";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/simpletest.api.php";s:4:"body";s:1:"
";}s:24:"hook_test_group_finished";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_test_group_finished";s:10:"definition";s:35:"function hook_test_group_finished()";s:11:"description";s:26:"A test group has finished.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"simpletest";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/simpletest.api.php";s:4:"body";s:1:"
";}s:18:"hook_test_finished";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_test_finished";s:10:"definition";s:37:"function hook_test_finished($results)";s:11:"description";s:32:"An individual test has finished.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:10:"simpletest";s:9:"file_path";s:58:"/home/lit/lit-dev/.git/../drush/hooks/7/simpletest.api.php";s:4:"body";s:1:"
";}}s:8:"taxonomy";a:12:{s:29:"hook_taxonomy_vocabulary_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_taxonomy_vocabulary_load";s:10:"definition";s:53:"function hook_taxonomy_vocabulary_load($vocabularies)";s:11:"description";s:41:"Act on taxonomy vocabularies when loaded.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:243:"
  $result = db_select('mytable', 'm')
    ->fields('m', array('vid', 'foo'))
    ->condition('m.vid', array_keys($vocabularies), 'IN')
    ->execute();
  foreach ($result as $record) {
    $vocabularies[$record->vid]->foo = $record->foo;
  }
";}s:32:"hook_taxonomy_vocabulary_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_taxonomy_vocabulary_presave";s:10:"definition";s:54:"function hook_taxonomy_vocabulary_presave($vocabulary)";s:11:"description";s:51:"Act on taxonomy vocabularies before they are saved.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:29:"
  $vocabulary->foo = 'bar';
";}s:31:"hook_taxonomy_vocabulary_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_taxonomy_vocabulary_insert";s:10:"definition";s:53:"function hook_taxonomy_vocabulary_insert($vocabulary)";s:11:"description";s:43:"Act on taxonomy vocabularies when inserted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:90:"
  if ($vocabulary->machine_name == 'my_vocabulary') {
    $vocabulary->weight = 100;
  }
";}s:31:"hook_taxonomy_vocabulary_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_taxonomy_vocabulary_update";s:10:"definition";s:53:"function hook_taxonomy_vocabulary_update($vocabulary)";s:11:"description";s:42:"Act on taxonomy vocabularies when updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:129:"
  db_update('mytable')
    ->fields(array('foo' => $vocabulary->foo))
    ->condition('vid', $vocabulary->vid)
    ->execute();
";}s:31:"hook_taxonomy_vocabulary_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_taxonomy_vocabulary_delete";s:10:"definition";s:53:"function hook_taxonomy_vocabulary_delete($vocabulary)";s:11:"description";s:49:"Respond to the deletion of taxonomy vocabularies.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:82:"
  db_delete('mytable')
    ->condition('vid', $vocabulary->vid)
    ->execute();
";}s:23:"hook_taxonomy_term_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_taxonomy_term_load";s:10:"definition";s:40:"function hook_taxonomy_term_load($terms)";s:11:"description";s:34:"Act on taxonomy terms when loaded.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:229:"
  $result = db_select('mytable', 'm')
    ->fields('m', array('tid', 'foo'))
    ->condition('m.tid', array_keys($terms), 'IN')
    ->execute();
  foreach ($result as $record) {
    $terms[$record->tid]->foo = $record->foo;
  }
";}s:26:"hook_taxonomy_term_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_taxonomy_term_presave";s:10:"definition";s:42:"function hook_taxonomy_term_presave($term)";s:11:"description";s:44:"Act on taxonomy terms before they are saved.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:23:"
  $term->foo = 'bar';
";}s:25:"hook_taxonomy_term_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_taxonomy_term_insert";s:10:"definition";s:41:"function hook_taxonomy_term_insert($term)";s:11:"description";s:36:"Act on taxonomy terms when inserted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:122:"
  db_insert('mytable')
    ->fields(array(
      'tid' => $term->tid,
      'foo' => $term->foo,
    ))
    ->execute();
";}s:25:"hook_taxonomy_term_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_taxonomy_term_update";s:10:"definition";s:41:"function hook_taxonomy_term_update($term)";s:11:"description";s:35:"Act on taxonomy terms when updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:117:"
  db_update('mytable')
    ->fields(array('foo' => $term->foo))
    ->condition('tid', $term->tid)
    ->execute();
";}s:25:"hook_taxonomy_term_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:25:"hook_taxonomy_term_delete";s:10:"definition";s:41:"function hook_taxonomy_term_delete($term)";s:11:"description";s:42:"Respond to the deletion of taxonomy terms.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:76:"
  db_delete('mytable')
    ->condition('tid', $term->tid)
    ->execute();
";}s:23:"hook_taxonomy_term_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_taxonomy_term_view";s:10:"definition";s:62:"function hook_taxonomy_term_view($term, $view_mode, $langcode)";s:11:"description";s:64:"Act on a taxonomy term that is being assembled before rendering.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:160:"
  $term->content['my_additional_field'] = array(
    '#markup' => $additional_field,
    '#weight' => 10,
    '#theme' => 'mymodule_my_additional_field',
  );
";}s:29:"hook_taxonomy_term_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_taxonomy_term_view_alter";s:10:"definition";s:47:"function hook_taxonomy_term_view_alter(&$build)";s:11:"description";s:42:"Alter the results of taxonomy_term_view().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:8:"taxonomy";s:9:"file_path";s:56:"/home/lit/lit-dev/.git/../drush/hooks/7/taxonomy.api.php";s:4:"body";s:297:"
  if ($build['#view_mode'] == 'full' && isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;
  }

  // Add a #post_render callback to act on the rendered HTML of the term.
  $build['#post_render'][] = 'my_module_node_post_render';
";}}s:7:"trigger";a:2:{s:17:"hook_trigger_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_trigger_info";s:10:"definition";s:28:"function hook_trigger_info()";s:11:"description";s:57:"Declare triggers (events) for users to assign actions to.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"trigger";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/trigger.api.php";s:4:"body";s:554:"
  return array(
    'node' => array(
      'node_presave' => array(
        'label' => t('When either saving new content or updating existing content'),
      ),
      'node_insert' => array(
        'label' => t('After saving new content'),
      ),
      'node_update' => array(
        'label' => t('After saving updated content'),
      ),
      'node_delete' => array(
        'label' => t('After deleting content'),
      ),
      'node_view' => array(
        'label' => t('When content is viewed by an authenticated user'),
      ),
    ),
  );
";}s:23:"hook_trigger_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_trigger_info_alter";s:10:"definition";s:44:"function hook_trigger_info_alter(&$triggers)";s:11:"description";s:47:"Alter triggers declared by hook_trigger_info().";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:7:"trigger";s:9:"file_path";s:55:"/home/lit/lit-dev/.git/../drush/hooks/7/trigger.api.php";s:4:"body";s:75:"
  $triggers['node']['node_insert']['label'] = t('When content is saved');
";}}s:6:"update";a:3:{s:26:"hook_update_projects_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_update_projects_alter";s:10:"definition";s:47:"function hook_update_projects_alter(&$projects)";s:11:"description";s:71:"Alter the list of projects before fetching data and comparing versions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"update";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/update.api.php";s:4:"body";s:1801:"
  // Hide a site-specific module from the list.
  unset($projects['site_specific_module']);

  // Add a disabled module to the list.
  // The key for the array should be the machine-readable project "short name".
  $projects['disabled_project_name'] = array(
    // Machine-readable project short name (same as the array key above).
    'name' => 'disabled_project_name',
    // Array of values from the main .info file for this project.
    'info' => array(
      'name' => 'Some disabled module',
      'description' => 'A module not enabled on the site that you want to see in the available updates report.',
      'version' => '7.x-1.0',
      'core' => '7.x',
      // The maximum file change time (the "ctime" returned by the filectime()
      // PHP method) for all of the .info files included in this project.
      '_info_file_ctime' => 1243888165,
    ),
    // The date stamp when the project was released, if known. If the disabled
    // project was an officially packaged release from drupal.org, this will
    // be included in the .info file as the 'datestamp' field. This only
    // really matters for development snapshot releases that are regenerated,
    // so it can be left undefined or set to 0 in most cases.
    'datestamp' => 1243888185,
    // Any modules (or themes) included in this project. Keyed by machine-
    // readable "short name", value is the human-readable project name printed
    // in the UI.
    'includes' => array(
      'disabled_project' => 'Disabled module',
      'disabled_project_helper' => 'Disabled module helper module',
      'disabled_project_foo' => 'Disabled module foo add-on module',
    ),
    // Does this project contain a 'module', 'theme', 'disabled-module', or
    // 'disabled-theme'?
    'project_type' => 'disabled-module',
  );
";}s:24:"hook_update_status_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_update_status_alter";s:10:"definition";s:45:"function hook_update_status_alter(&$projects)";s:11:"description";s:59:"Alter the information about available updates for projects.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"update";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/update.api.php";s:4:"body";s:774:"
  $settings = variable_get('update_advanced_project_settings', array());
  foreach ($projects as $project => $project_info) {
    if (isset($settings[$project]) && isset($settings[$project]['check']) &&
        ($settings[$project]['check'] == 'never' ||
          (isset($project_info['recommended']) &&
            $settings[$project]['check'] === $project_info['recommended']))) {
      $projects[$project]['status'] = UPDATE_NOT_CHECKED;
      $projects[$project]['reason'] = t('Ignored from settings');
      if (!empty($settings[$project]['notes'])) {
        $projects[$project]['extra'][] = array(
          'class' => array('admin-note'),
          'label' => t('Administrator note'),
          'data' => $settings[$project]['notes'],
        );
      }
    }
  }
";}s:26:"hook_verify_update_archive";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_verify_update_archive";s:10:"definition";s:72:"function hook_verify_update_archive($project, $archive_file, $directory)";s:11:"description";s:61:"Verify an archive after it has been downloaded and extracted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:6:"update";s:9:"file_path";s:54:"/home/lit/lit-dev/.git/../drush/hooks/7/update.api.php";s:4:"body";s:219:"
  $errors = array();
  if (!file_exists($directory)) {
    $errors[] = t('The %directory does not exist.', array('%directory' => $directory));
  }
  // Add other checks on the archive integrity here.
  return $errors;
";}}s:4:"user";a:17:{s:14:"hook_user_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_user_load";s:10:"definition";s:31:"function hook_user_load($users)";s:11:"description";s:50:"Act on user objects when loaded from the database.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:200:"
  $result = db_query('SELECT uid, foo FROM {my_table} WHERE uid IN (:uids)', array(':uids' => array_keys($users)));
  foreach ($result as $record) {
    $users[$record->uid]->foo = $record->foo;
  }
";}s:16:"hook_user_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_user_delete";s:10:"definition";s:35:"function hook_user_delete($account)";s:11:"description";s:25:"Respond to user deletion.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:79:"
  db_delete('mytable')
    ->condition('uid', $account->uid)
    ->execute();
";}s:16:"hook_user_cancel";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_user_cancel";s:10:"definition";s:51:"function hook_user_cancel($edit, $account, $method)";s:11:"description";s:34:"Act on user account cancellations.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:1031:"
  switch ($method) {
    case 'user_cancel_block_unpublish':
      // Unpublish nodes (current revisions).
      module_load_include('inc', 'node', 'node.admin');
      $nodes = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->condition('uid', $account->uid)
        ->execute()
        ->fetchCol();
      node_mass_update($nodes, array('status' => 0));
      break;

    case 'user_cancel_reassign':
      // Anonymize nodes (current revisions).
      module_load_include('inc', 'node', 'node.admin');
      $nodes = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->condition('uid', $account->uid)
        ->execute()
        ->fetchCol();
      node_mass_update($nodes, array('uid' => 0));
      // Anonymize old revisions.
      db_update('node_revision')
        ->fields(array('uid' => 0))
        ->condition('uid', $account->uid)
        ->execute();
      // Clean history.
      db_delete('history')
        ->condition('uid', $account->uid)
        ->execute();
      break;
  }
";}s:30:"hook_user_cancel_methods_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_user_cancel_methods_alter";s:10:"definition";s:50:"function hook_user_cancel_methods_alter(&$methods)";s:11:"description";s:36:"Modify account cancellation methods.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:620:"
  // Limit access to disable account and unpublish content method.
  $methods['user_cancel_block_unpublish']['access'] = user_access('administer site configuration');

  // Remove the content re-assigning method.
  unset($methods['user_cancel_reassign']);

  // Add a custom zero-out method.
  $methods['mymodule_zero_out'] = array(
    'title' => t('Delete the account and remove all content.'),
    'description' => t('All your content will be replaced by empty strings.'),
    // access should be used for administrative methods only.
    'access' => user_access('access zero-out account cancellation method'),
  );
";}s:20:"hook_user_operations";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_user_operations";s:10:"definition";s:31:"function hook_user_operations()";s:11:"description";s:25:"Add mass user operations.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:398:"
  $operations = array(
    'unblock' => array(
      'label' => t('Unblock the selected users'),
      'callback' => 'user_user_operations_unblock',
    ),
    'block' => array(
      'label' => t('Block the selected users'),
      'callback' => 'user_user_operations_block',
    ),
    'cancel' => array(
      'label' => t('Cancel the selected user accounts'),
    ),
  );
  return $operations;
";}s:20:"hook_user_categories";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_user_categories";s:10:"definition";s:31:"function hook_user_categories()";s:11:"description";s:66:"Retrieve a list of user setting or profile information categories.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:111:"
  return array(array(
    'name' => 'account',
    'title' => t('Account settings'),
    'weight' => 1,
  ));
";}s:17:"hook_user_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:17:"hook_user_presave";s:10:"definition";s:55:"function hook_user_presave(&$edit, $account, $category)";s:11:"description";s:49:"A user account is about to be created or updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:220:"
  // Make sure that our form value 'mymodule_foo' is stored as
  // 'mymodule_bar' in the 'data' (serialized) column.
  if (isset($edit['mymodule_foo'])) {
    $edit['data']['mymodule_bar'] = $edit['mymodule_foo'];
  }
";}s:16:"hook_user_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_user_insert";s:10:"definition";s:54:"function hook_user_insert(&$edit, $account, $category)";s:11:"description";s:27:"A user account was created.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:135:"
  db_insert('mytable')
    ->fields(array(
      'myfield' => $edit['myfield'],
      'uid' => $account->uid,
    ))
    ->execute();
";}s:16:"hook_user_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_user_update";s:10:"definition";s:54:"function hook_user_update(&$edit, $account, $category)";s:11:"description";s:27:"A user account was updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:130:"
  db_insert('user_changes')
    ->fields(array(
      'uid' => $account->uid,
      'changed' => time(),
    ))
    ->execute();
";}s:15:"hook_user_login";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_user_login";s:10:"definition";s:42:"function hook_user_login(&$edit, $account)";s:11:"description";s:24:"The user just logged in.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:422:"
  // If the user has a NULL time zone, notify them to set a time zone.
  if (!$account->timezone && variable_get('configurable_timezones', 1) && variable_get('empty_timezone_message', 0)) {
    drupal_set_message(t('Configure your <a href="@user-edit">account time zone setting</a>.', array('@user-edit' => url("user/$account->uid/edit", array('query' => drupal_get_destination(), 'fragment' => 'edit-timezone')))));
  }
";}s:16:"hook_user_logout";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:16:"hook_user_logout";s:10:"definition";s:35:"function hook_user_logout($account)";s:11:"description";s:25:"The user just logged out.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:122:"
  db_insert('logouts')
    ->fields(array(
      'uid' => $account->uid,
      'time' => time(),
    ))
    ->execute();
";}s:14:"hook_user_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_user_view";s:10:"definition";s:56:"function hook_user_view($account, $view_mode, $langcode)";s:11:"description";s:50:"The user's account information is being displayed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:449:"
  if (user_access('create blog content', $account)) {
    $account->content['summary']['blog'] =  array(
      '#type' => 'user_profile_item',
      '#title' => t('Blog'),
      '#markup' => l(t('View recent blog entries'), "blog/$account->uid", array('attributes' => array('title' => t("Read !username's latest blog entries.", array('!username' => format_username($account)))))),
      '#attributes' => array('class' => array('blog')),
    );
  }
";}s:20:"hook_user_view_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_user_view_alter";s:10:"definition";s:38:"function hook_user_view_alter(&$build)";s:11:"description";s:65:"The user was built; the module may modify the structured content.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:328:"
  // Check for the existence of a field added by another module.
  if (isset($build['an_additional_field'])) {
    // Change its weight.
    $build['an_additional_field']['#weight'] = -10;
  }

  // Add a #post_render callback to act on the rendered HTML of the user.
  $build['#post_render'][] = 'my_module_user_post_render';
";}s:22:"hook_user_role_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_user_role_presave";s:10:"definition";s:38:"function hook_user_role_presave($role)";s:11:"description";s:59:"Inform other modules that a user role is about to be saved.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:126:"
  // Set a UUID for the user role if it doesn't already exist
  if (empty($role->uuid)) {
    $role->uuid = uuid_uuid();
  }
";}s:21:"hook_user_role_insert";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_user_role_insert";s:10:"definition";s:37:"function hook_user_role_insert($role)";s:11:"description";s:53:"Inform other modules that a user role has been added.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:212:"
  // Save extra fields provided by the module to user roles.
  db_insert('my_module_table')
    ->fields(array(
      'rid' => $role->rid,
      'role_description' => $role->description,
    ))
    ->execute();
";}s:21:"hook_user_role_update";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_user_role_update";s:10:"definition";s:37:"function hook_user_role_update($role)";s:11:"description";s:55:"Inform other modules that a user role has been updated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:221:"
  // Save extra fields provided by the module to user roles.
  db_merge('my_module_table')
    ->key(array('rid' => $role->rid))
    ->fields(array(
      'role_description' => $role->description
    ))
    ->execute();
";}s:21:"hook_user_role_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_user_role_delete";s:10:"definition";s:37:"function hook_user_role_delete($role)";s:11:"description";s:55:"Inform other modules that a user role has been deleted.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"user";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/user.api.php";s:4:"body";s:136:"
  // Delete existing instances of the deleted role.
  db_delete('my_module_table')
    ->condition('rid', $role->rid)
    ->execute();
";}}s:4:"uuid";a:17:{s:14:"hook_uuid_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_uuid_info";s:10:"definition";s:25:"function hook_uuid_info()";s:11:"description";s:56:"Defines one or more UUID generators exposed by a module.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:180:"
  $generators = array();
  $generators['my_module'] = array(
    'title' => t('My module UUID generator'),
    'callback' => 'my_module_generate_uuid',
  );
  return $generators;
";}s:14:"hook_uuid_sync";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_uuid_sync";s:10:"definition";s:25:"function hook_uuid_sync()";s:11:"description";s:49:"Ensures all records have a UUID assigned to them.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:79:"
  // Do what you need to do to generate missing UUIDs for you implementation.
";}s:21:"hook_entity_uuid_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_entity_uuid_load";s:10:"definition";s:56:"function hook_entity_uuid_load(&$entities, $entity_type)";s:11:"description";s:70:"Let modules transform their properties with local IDs to UUIDs when an";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:20:"hook_field_uuid_load";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_field_uuid_load";s:10:"definition";s:91:"function hook_field_uuid_load($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:73:"Let modules transform their fields with local IDs to UUIDs when an entity";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:24:"hook_entity_uuid_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_entity_uuid_presave";s:10:"definition";s:57:"function hook_entity_uuid_presave(&$entity, $entity_type)";s:11:"description";s:70:"Let modules transform their properties with UUIDs to local IDs when an";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:23:"hook_field_uuid_presave";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_field_uuid_presave";s:10:"definition";s:94:"function hook_field_uuid_presave($entity_type, $entity, $field, $instance, $langcode, &$items)";s:11:"description";s:73:"Let modules transform their fields with UUIDs to local IDs when an entity";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:21:"hook_entity_uuid_save";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_entity_uuid_save";s:10:"definition";s:53:"function hook_entity_uuid_save($entity, $entity_type)";s:11:"description";s:63:"Let modules transform their properties when an entity is saved.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:23:"hook_entity_uuid_delete";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_entity_uuid_delete";s:10:"definition";s:55:"function hook_entity_uuid_delete($entity, $entity_type)";s:11:"description";s:42:"Let modules act when an entity is deleted.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:32:"hook_uuid_menu_path_to_uri_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_uuid_menu_path_to_uri_alter";s:10:"definition";s:55:"function hook_uuid_menu_path_to_uri_alter($path, &$uri)";s:11:"description";s:68:"Let modules modify paths when they are being converted to UUID ones.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:26:"hook_uuid_menu_uri_to_path";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_uuid_menu_uri_to_path";s:10:"definition";s:49:"function hook_uuid_menu_uri_to_path(&$path, $uri)";s:11:"description";s:70:"Let modules modify paths when they are being converted from UUID ones.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:26:"hook_uuid_default_entities";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_uuid_default_entities";s:10:"definition";s:37:"function hook_uuid_default_entities()";s:11:"description";s:74:"Allow modules to provide a list of default entities that will be imported.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:30:"hook_uuid_entities_pre_rebuild";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_uuid_entities_pre_rebuild";s:10:"definition";s:51:"function hook_uuid_entities_pre_rebuild($plan_name)";s:11:"description";s:74:"Let other modules do things before default entities are created on revert.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:31:"hook_uuid_entities_post_rebuild";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:31:"hook_uuid_entities_post_rebuild";s:10:"definition";s:52:"function hook_uuid_entities_post_rebuild($plan_name)";s:11:"description";s:73:"Let other modules do things after default entities are created on revert.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:47:"hook_uuid_entities_features_export_entity_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:47:"hook_uuid_entities_features_export_entity_alter";s:10:"definition";s:80:"function hook_uuid_entities_features_export_entity_alter(&$entity, $entity_type)";s:11:"description";s:63:"Let other modules alter entities that are about to be exported.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:46:"hook_uuid_entities_features_export_field_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:46:"hook_uuid_entities_features_export_field_alter";s:10:"definition";s:118:"function hook_uuid_entities_features_export_field_alter($entity_type, &$entity, $field, $instance, $langcode, &$items)";s:11:"description";s:73:"Let other modules alter fields on entities that are about to be exported.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:2:"

";}s:18:"hook_uuid_uri_data";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_uuid_uri_data";s:10:"definition";s:34:"function hook_uuid_uri_data($data)";s:11:"description";s:37:"Alter UUID URI data after processing.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:1:"
";}s:21:"hook_uuid_id_uri_data";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_uuid_id_uri_data";s:10:"definition";s:37:"function hook_uuid_id_uri_data($data)";s:11:"description";s:42:"Alter entity URI before creating UUID URI.";s:11:"destination";s:16:"%module.uuid.inc";s:12:"dependencies";a:0:{}s:5:"group";s:4:"uuid";s:9:"file_path";s:52:"/home/lit/lit-dev/.git/../drush/hooks/7/uuid.api.php";s:4:"body";s:1:"
";}}s:5:"views";a:21:{s:15:"hook_views_data";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:15:"hook_views_data";s:10:"definition";s:26:"function hook_views_data()";s:11:"description";s:51:"Describes data tables (or the equivalent) to Views.";s:11:"destination";s:17:"%module.views.inc";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:5950:"
  // This example describes how to write hook_views_data() for the following
  // table:
  //
  // CREATE TABLE example_table (
  //   nid INT(11) NOT NULL         COMMENT 'Primary key; refers to {node}.nid.',
  //   plain_text_field VARCHAR(32) COMMENT 'Just a plain text field.',
  //   numeric_field INT(11)        COMMENT 'Just a numeric field.',
  //   boolean_field INT(1)         COMMENT 'Just an on/off field.',
  //   timestamp_field INT(8)       COMMENT 'Just a timestamp field.',
  //   PRIMARY KEY(nid)
  // );

  // First, the entry $data['example_table']['table'] describes properties of
  // the actual table – not its content.

  // The 'group' index will be used as a prefix in the UI for any of this
  // table's fields, sort criteria, etc. so it's easy to tell where they came
  // from.
  $data['example_table']['table']['group'] = t('Example table');

  // Define this as a base table – a table that can be described in itself by
  // views (and not just being brought in as a relationship). In reality this
  // is not very useful for this table, as it isn't really a distinct object of
  // its own, but it makes a good example.
  $data['example_table']['table']['base'] = array(
    'field' => 'nid', // This is the identifier field for the view.
    'title' => t('Example table'),
    'help' => t('Example table contains example content and can be related to nodes.'),
    'weight' => -10,
  );

  // This table references the {node} table. The declaration below creates an
  // 'implicit' relationship to the node table, so that when 'node' is the base
  // table, the fields are automatically available.
  $data['example_table']['table']['join'] = array(
    // Index this array by the table name to which this table refers.
    // 'left_field' is the primary key in the referenced table.
    // 'field' is the foreign key in this table.
    'node' => array(
      'left_field' => 'nid',
      'field' => 'nid',
    ),
  );

  // Next, describe each of the individual fields in this table to Views. This
  // is done by describing $data['example_table']['FIELD_NAME']. This part of
  // the array may then have further entries:
  //   - title: The label for the table field, as presented in Views.
  //   - help: The description text for the table field.
  //   - relationship: A description of any relationship handler for the table
  //     field.
  //   - field: A description of any field handler for the table field.
  //   - sort: A description of any sort handler for the table field.
  //   - filter: A description of any filter handler for the table field.
  //   - argument: A description of any argument handler for the table field.
  //   - area: A description of any handler for adding content to header,
  //     footer or as no result behaviour.
  //
  // The handler descriptions are described with examples below.

  // Node ID table field.
  $data['example_table']['nid'] = array(
    'title' => t('Example content'),
    'help' => t('Some example content that references a node.'),
    // Define a relationship to the {node} table, so example_table views can
    // add a relationship to nodes. If you want to define a relationship the
    // other direction, use hook_views_data_alter(), or use the 'implicit' join
    // method described above.
    'relationship' => array(
      'base' => 'node', // The name of the table to join with.
      'base field' => 'nid', // The name of the field on the joined table.
      // 'field' => 'nid' -- see hook_views_data_alter(); not needed here.
      'handler' => 'views_handler_relationship',
      'label' => t('Default label for the relationship'),
      'title' => t('Title shown when adding the relationship'),
      'help' => t('More information on this relationship'),
    ),
  );

  // Example plain text field.
  $data['example_table']['plain_text_field'] = array(
    'title' => t('Plain text field'),
    'help' => t('Just a plain text field.'),
    'field' => array(
      'handler' => 'views_handler_field',
      'click sortable' => TRUE, // This is use by the table display plugin.
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_string',
    ),
    'argument' => array(
      'handler' => 'views_handler_argument_string',
    ),
  );

  // Example numeric text field.
  $data['example_table']['numeric_field'] = array(
    'title' => t('Numeric field'),
    'help' => t('Just a numeric field.'),
    'field' => array(
      'handler' => 'views_handler_field_numeric',
      'click sortable' => TRUE,
     ),
    'filter' => array(
      'handler' => 'views_handler_filter_numeric',
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );

  // Example boolean field.
  $data['example_table']['boolean_field'] = array(
    'title' => t('Boolean field'),
    'help' => t('Just an on/off field.'),
    'field' => array(
      'handler' => 'views_handler_field_boolean',
      'click sortable' => TRUE,
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_boolean_operator',
      // Note that you can override the field-wide label:
      'label' => t('Published'),
      // This setting is used by the boolean filter handler, as possible option.
      'type' => 'yes-no',
      // use boolean_field = 1 instead of boolean_field <> 0 in WHERE statment.
      'use equal' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort',
    ),
  );

  // Example timestamp field.
  $data['example_table']['timestamp_field'] = array(
    'title' => t('Timestamp field'),
    'help' => t('Just a timestamp field.'),
    'field' => array(
      'handler' => 'views_handler_field_date',
      'click sortable' => TRUE,
    ),
    'sort' => array(
      'handler' => 'views_handler_sort_date',
    ),
    'filter' => array(
      'handler' => 'views_handler_filter_date',
    ),
  );

  return $data;
";}s:21:"hook_views_data_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_views_data_alter";s:10:"definition";s:38:"function hook_views_data_alter(&$data)";s:11:"description";s:22:"Alter table structure.";s:11:"destination";s:17:"%module.views.inc";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:1574:"
  // This example alters the title of the node:nid field in the Views UI.
  $data['node']['nid']['title'] = t('Node-Nid');

  // This example adds an example field to the users table.
  $data['users']['example_field'] = array(
    'title' => t('Example field'),
    'help' => t('Some example content that references a user'),
    'field' => array(
      'handler' => 'modulename_handler_field_example_field',
    ),
  );

  // This example changes the handler of the node title field.
  // In this handler you could do stuff, like preview of the node when clicking
  // the node title.
  $data['node']['title']['field']['handler'] = 'modulename_handler_field_node_title';

  // This example adds a relationship to table {foo}, so that 'foo' views can
  // add this table using a relationship. Because we don't want to write over
  // the primary key field definition for the {foo}.fid field, we use a dummy
  // field name as the key.
  $data['foo']['dummy_name'] = array(
    'title' => t('Example relationship'),
    'help' => t('Example help'),
    'relationship' => array(
      'base' => 'example_table', // Table we're joining to.
      'base field' => 'eid', // Field on the joined table.
      'field' => 'fid', // Real field name on the 'foo' table.
      'handler' => 'views_handler_relationship',
      'label' => t('Default label for relationship'),
      'title' => t('Title seen when adding relationship'),
      'help' => t('More information about relationship.'),
    ),
  );

  // Note that the $data array is not returned – it is modified by reference.
";}s:18:"hook_views_plugins";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:18:"hook_views_plugins";s:10:"definition";s:29:"function hook_views_plugins()";s:11:"description";s:40:"Describes plugins defined by the module.";s:11:"destination";s:17:"%module.views.inc";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:1048:"
  $plugins = array();
  $plugins['argument validator'] = array(
    'taxonomy_term' => array(
      'title' => t('Taxonomy term'),
      'handler' => 'views_plugin_argument_validate_taxonomy_term',
      // Declaring path explicitly not necessary for most modules.
      'path' => drupal_get_path('module', 'views') . '/modules/taxonomy',
    ),
  );

  return array(
    'module' => 'views', // This just tells our themes are elsewhere.
    'argument validator' => array(
      'taxonomy_term' => array(
        'title' => t('Taxonomy term'),
        'handler' => 'views_plugin_argument_validate_taxonomy_term',
        'path' => drupal_get_path('module', 'views') . '/modules/taxonomy', // not necessary for most modules
      ),
    ),
    'argument default' => array(
      'taxonomy_tid' => array(
        'title' => t('Taxonomy term ID from URL'),
        'handler' => 'views_plugin_argument_default_taxonomy_tid',
        'path' => drupal_get_path('module', 'views') . '/modules/taxonomy',
        'parent' => 'fixed',
      ),
    ),
  );
";}s:24:"hook_views_plugins_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_views_plugins_alter";s:10:"definition";s:44:"function hook_views_plugins_alter(&$plugins)";s:11:"description";s:48:"Alter existing plugins data, defined by modules.";s:11:"destination";s:17:"%module.views.inc";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:109:"
  // Add apachesolr to the base of the node row plugin.
  $plugins['row']['node']['base'][] = 'apachesolr';
";}s:14:"hook_views_api";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:14:"hook_views_api";s:10:"definition";s:25:"function hook_views_api()";s:11:"description";s:30:"Register View API information.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:183:"
  return array(
    'api' => 3,
    'path' => drupal_get_path('module', 'example') . '/includes/views',
    'template path' => drupal_get_path('module', 'example') . '/themes',
  );
";}s:24:"hook_views_default_views";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:24:"hook_views_default_views";s:10:"definition";s:35:"function hook_views_default_views()";s:11:"description";s:76:"This hook allows modules to provide their own views which can either be used";s:11:"destination";s:25:"%module.views_default.inc";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:3888:"
  // Begin copy and paste of output from the Export tab of a view.
  $view = new view;
  $view->name = 'frontpage';
  $view->description = 'Emulates the default Drupal front page; you may set the default home page path to this view to make it your front page.';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Front page';
  $view->core = 0;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'node';
  /* Sort criterion: Content: Sticky */
  $handler->display->display_options['sorts']['sticky']['id'] = 'sticky';
  $handler->display->display_options['sorts']['sticky']['table'] = 'node';
  $handler->display->display_options['sorts']['sticky']['field'] = 'sticky';
  $handler->display->display_options['sorts']['sticky']['order'] = 'DESC';
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Promoted to front page */
  $handler->display->display_options['filters']['promote']['id'] = 'promote';
  $handler->display->display_options['filters']['promote']['table'] = 'node';
  $handler->display->display_options['filters']['promote']['field'] = 'promote';
  $handler->display->display_options['filters']['promote']['value'] = '1';
  $handler->display->display_options['filters']['promote']['group'] = 0;
  $handler->display->display_options['filters']['promote']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 0;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'frontpage';

  /* Display: Feed */
  $handler = $view->new_display('feed', 'Feed', 'feed');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Front page feed';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['style_plugin'] = 'rss';
  $handler->display->display_options['row_plugin'] = 'node_rss';
  $handler->display->display_options['path'] = 'rss.xml';
  $handler->display->display_options['displays'] = array(
    'default' => 'default',
    'page' => 'page',
  );
  $handler->display->display_options['sitename_title'] = '1';

  // (Export ends here.)

  // Add view to list of views to provide.
  $views[$view->name] = $view;

  // ...Repeat all of the above for each view the module should provide.

  // At the end, return array of default views.
  return $views;
";}s:30:"hook_views_default_views_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_views_default_views_alter";s:10:"definition";s:48:"function hook_views_default_views_alter(&$views)";s:11:"description";s:45:"Alter default views defined by other modules.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:135:"
  if (isset($views['taxonomy_term'])) {
    $views['taxonomy_term']->display['default']->display_options['title'] = 'Categories';
  }
";}s:30:"hook_views_query_substitutions";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_views_query_substitutions";s:10:"definition";s:46:"function hook_views_query_substitutions($view)";s:11:"description";s:58:"Performs replacements in the query before being performed.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:308:"
  // Example from views_views_query_substitutions().
  global $language_content;
  return array(
    '***CURRENT_VERSION***' => VERSION,
    '***CURRENT_TIME***' => REQUEST_TIME,
    '***CURRENT_LANGUAGE***' => $language_content->language,
    '***DEFAULT_LANGUAGE***' => language_default('language'),
  );
";}s:29:"hook_views_form_substitutions";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_views_form_substitutions";s:10:"definition";s:40:"function hook_views_form_substitutions()";s:11:"description";s:74:"This hook is called to get a list of placeholders and their substitutions,";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:95:"
  return array(
    '<!--views-form-example-substitutions-->' => 'Example Substitution',
  );
";}s:19:"hook_views_pre_view";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:19:"hook_views_pre_view";s:10:"definition";s:58:"function hook_views_pre_view(&$view, &$display_id, &$args)";s:11:"description";s:72:"Allows altering a view at the very beginning of views processing, before";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:441:"
  // Change the display if the acting user has 'administer site configuration'
  // permission, to display something radically different.
  // (Note that this is not necessarily the best way to solve that task. Feel
  // free to contribute another example!)
  if (
    $view->name == 'my_special_view' &&
    user_access('administer site configuration') &&
    $display_id == 'public_display'
  ) {
    $display_id = 'private_display';
  }
";}s:20:"hook_views_pre_build";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:20:"hook_views_pre_build";s:10:"definition";s:37:"function hook_views_pre_build(&$view)";s:11:"description";s:70:"This hook is called right before the build process, but after displays";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:293:"
  // Because of some unexplicable business logic, we should remove all
  // attachments from all views on Mondays.
  // (This alter could be done later in the execution process as well.)
  if (date('D') == 'Mon') {
    unset($view->attachment_before);
    unset($view->attachment_after);
  }
";}s:21:"hook_views_post_build";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_views_post_build";s:10:"definition";s:38:"function hook_views_post_build(&$view)";s:11:"description";s:73:"This hook is called right after the build process. The query is now fully";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:610:"
  // If the exposed field 'type' is set, hide the column containing the content
  // type. (Note that this is a solution for a particular view, and makes
  // assumptions about both exposed filter settings and the fields in the view.
  // Also note that this alter could be done at any point before the view being
  // rendered.)
  if ($view->name == 'my_view' && isset($view->exposed_raw_input['type']) && $view->exposed_raw_input['type'] != 'All') {
    // 'Type' should be interpreted as content type.
    if (isset($view->field['type'])) {
      $view->field['type']->options['exclude'] = TRUE;
    }
  }
";}s:22:"hook_views_pre_execute";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_views_pre_execute";s:10:"definition";s:39:"function hook_views_pre_execute(&$view)";s:11:"description";s:76:"This hook is called right before the execute process. The query is now fully";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:421:"
  // Whenever a view queries more than two tables, show a message that notifies
  // view administrators that the query might be heavy.
  // (This action could be performed later in the execution process, but not
  // earlier.)
  if (count($view->query->tables) > 2 && user_access('administer views')) {
    drupal_set_message(t('The view %view may be heavy to execute.', array('%view' => $view->name)), 'warning');
  }
";}s:23:"hook_views_post_execute";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:23:"hook_views_post_execute";s:10:"definition";s:40:"function hook_views_post_execute(&$view)";s:11:"description";s:66:"This hook is called right after the execute process. The query has";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:356:"
  // If there are more than 100 results, show a message that encourages the user
  // to change the filter settings.
  // (This action could be performed later in the execution process, but not
  // earlier.)
  if ($view->total_rows > 100) {
    drupal_set_message(t('You have more than 100 hits. Use the filter settings to narrow down your list.'));
  }
";}s:21:"hook_views_pre_render";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:21:"hook_views_pre_render";s:10:"definition";s:38:"function hook_views_pre_render(&$view)";s:11:"description";s:71:"This hook is called right before the render process. The query has been";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:183:"
  // Scramble the order of the rows shown on this result page.
  // Note that this could be done earlier, but not later in the view execution
  // process.
  shuffle($view->result);
";}s:22:"hook_views_post_render";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_views_post_render";s:10:"definition";s:58:"function hook_views_post_render(&$view, &$output, &$cache)";s:11:"description";s:31:"Post process any rendered data.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:327:"
  // When using full pager, disable any time-based caching if there are less
  // then 10 results.
  if ($view->query->pager instanceof views_plugin_pager_full && $cache->options['type'] == 'time' && count($view->result) < 10) {
    $cache['options']['results_lifespan'] = 0;
    $cache['options']['output_lifespan'] = 0;
  }
";}s:22:"hook_views_query_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:22:"hook_views_query_alter";s:10:"definition";s:48:"function hook_views_query_alter(&$view, &$query)";s:11:"description";s:43:"Alter the query before executing the query.";s:11:"destination";s:17:"%module.views.inc";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:840:"
  // (Example assuming a view with an exposed filter on node title.)
  // If the input for the title filter is a positive integer, filter against
  // node ID instead of node title.
  if ($view->name == 'my_view' && is_numeric($view->exposed_raw_input['title']) && $view->exposed_raw_input['title'] > 0) {
    // Traverse through the 'where' part of the query.
    foreach ($query->where as &$condition_group) {
      foreach ($condition_group['conditions'] as &$condition) {
        // If this is the part of the query filtering on title, chang the
        // condition to filter on node ID.
        if ($condition['field'] == 'node.title') {
          $condition = array(
            'field' => 'node.nid',
            'value' => $view->exposed_raw_input['title'],
            'operator' => '=',
          );
        }
      }
    }
  }
";}s:29:"hook_views_preview_info_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:29:"hook_views_preview_info_alter";s:10:"definition";s:53:"function hook_views_preview_info_alter(&$rows, $view)";s:11:"description";s:72:"Alter the information box that (optionally) appears with a view preview,";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:285:"
  // Adds information about the tables being queried by the view to the query
  // part of the info box.
  $rows['query'][] = array(
    t('<strong>Table queue</strong>'),
    count($view->query->table_queue) . ': (' . implode(', ', array_keys($view->query->table_queue)) . ')',
  );
";}s:37:"hook_views_ui_display_top_links_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_views_ui_display_top_links_alter";s:10:"definition";s:75:"function hook_views_ui_display_top_links_alter(&$links, $view, $display_id)";s:11:"description";s:75:"This hooks allows to alter the links at the top of the view edit form. Some";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:141:"
  // Put the export link first in the list.
  if (isset($links['export'])) {
    $links = array('export' => $links['export']) + $links;
  }
";}s:26:"hook_views_ajax_data_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:26:"hook_views_ajax_data_alter";s:10:"definition";s:54:"function hook_views_ajax_data_alter(&$commands, $view)";s:11:"description";s:69:"This hook allows to alter the commands which are used on a views ajax";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:248:"
  // Replace Views' method for scrolling to the top of the element with your
  // custom scrolling method.
  foreach ($commands as &$command) {
    if ($command['method'] == 'viewsScrollTop') {
      $command['method'] .= 'myScrollTop';
    }
  }
";}s:27:"hook_views_invalidate_cache";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:27:"hook_views_invalidate_cache";s:10:"definition";s:38:"function hook_views_invalidate_cache()";s:11:"description";s:62:"Allow modules to respond to the Views cache being invalidated.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:1:{i:0;s:14:"hook_views_api";}s:5:"group";s:5:"views";s:9:"file_path";s:53:"/home/lit/lit-dev/.git/../drush/hooks/7/views.api.php";s:4:"body";s:55:"
  cache_clear_all('views:*', 'cache_mymodule', TRUE);
";}}s:21:"views_bulk_operations";a:1:{s:37:"hook_views_bulk_operations_form_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:37:"hook_views_bulk_operations_form_alter";s:10:"definition";s:74:"function hook_views_bulk_operations_form_alter(&$form, &$form_state, $vbo)";s:11:"description";s:58:"Perform alterations on the VBO form before it is rendered.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:21:"views_bulk_operations";s:9:"file_path";s:69:"/home/lit/lit-dev/.git/../drush/hooks/7/views_bulk_operations.api.php";s:4:"body";s:439:"
  if ($form_state['step'] == 'views_form_views_form') {
    // Alter the first step of the VBO form (the selection page).
    $form['select']['#title'] = t('Bulk operations');
  }
  elseif ($form_state['step'] == 'views_bulk_operations_config_form') {
    // Alter the configuration step of the VBO form.
  }
  elseif ($form_state['step'] == 'views_bulk_operations_confirm_form') {
    // Alter the confirmation step of the VBO form.
  }
";}}s:15:"views_slideshow";a:9:{s:35:"hook_views_slideshow_slideshow_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:35:"hook_views_slideshow_slideshow_info";s:10:"definition";s:46:"function hook_views_slideshow_slideshow_info()";s:11:"description";s:66:"Define the type of the slideshow (eg.: cycle, imageflow, ddblock).";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:438:"
  $options = array(
    'views_slideshow_cycle' => array(
      'name' => t('Cycle'),
      'accepts' => array(
        'goToSlide',
        'nextSlide',
        'pause',
        'play',
        'previousSlide',
      ),
      'calls' => array(
        'transitionBegin',
        'transitionEnd',
        'goToSlide',
        'pause',
        'play',
        'nextSlide',
        'previousSlide',
      ),
    ),
  );
  return $options;
";}s:40:"hook_views_slideshow_slideshow_type_form";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:40:"hook_views_slideshow_slideshow_type_form";s:10:"definition";s:79:"function hook_views_slideshow_slideshow_type_form(&$form, &$form_state, &$view)";s:11:"description";s:62:"Define form fields to be displayed in the views settings form.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:528:"
  $form['views_slideshow_cycle']['effect'] = array(
    '#type' => 'select',
    '#title' => t('Effect'),
    '#options' => $effects,
    '#default_value' => $view->options['views_slideshow_cycle']['effect'],
    '#description' => t('The transition effect that will be used to change between images. Not all options below may be relevant depending on the effect. ' . l('Follow this link to see examples of each effect.', 'http://jquery.malsup.com/cycle/browser.html', array('attributes' => array('target' => '_blank')))),
  );
";}s:38:"hook_views_slideshow_option_definition";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:38:"hook_views_slideshow_option_definition";s:10:"definition";s:49:"function hook_views_slideshow_option_definition()";s:11:"description";s:83:"Set default values for your form fields specified in hook_views_slideshow_type_form";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:437:"
  $options['views_slideshow_cycle'] = array(
    'contains' => array(
      // Transition
      'effect' => array('default' => 'fade'),
      'transition_advanced' => array('default' => 0),
      'timeout' => array('default' => 5000),
      'speed' => array('default' => 700), //normal
      'delay' => array('default' => 0),
      'sync' => array('default' => 1),
      'random' => array('default' => 0),
    )
  );
  return $options;
";}s:42:"hook_views_slideshow_options_form_validate";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:42:"hook_views_slideshow_options_form_validate";s:10:"definition";s:81:"function hook_views_slideshow_options_form_validate(&$form, &$form_state, &$view)";s:11:"description";s:52:"Form validation callback for the slideshow settings.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:650:"
  if (!is_numeric($form_state['values']['style_options']['views_slideshow_cycle']['speed'])) {
    form_error($form['views_slideshow_cycle']['speed'], t('!setting must be numeric!', array('Speed')));
  }
  if (!is_numeric($form_state['values']['style_options']['views_slideshow_cycle']['timeout'])) {
    form_error($form['views_slideshow_cycle']['speed'], t('!setting must be numeric!', array('timeout')));
  }
  if (!is_numeric($form_state['values']['style_options']['views_slideshow_cycle']['remember_slide_days'])) {
    form_error($form['views_slideshow_cycle']['remember_slide_days'], t('!setting must be numeric!', array('Slide days')));
  }
";}s:40:"hook_views_slideshow_options_form_submit";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:40:"hook_views_slideshow_options_form_submit";s:10:"definition";s:70:"function hook_views_slideshow_options_form_submit($form, &$form_state)";s:11:"description";s:52:"Form submission callback for the slideshow settings.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:32:"
  // Act on option submission.
";}s:30:"hook_views_slideshow_skin_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:30:"hook_views_slideshow_skin_info";s:10:"definition";s:41:"function hook_views_slideshow_skin_info()";s:11:"description";s:55:"Define slideshow skins to be available to the end user.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:83:"
  return array(
    'default' => array(
      'name' => t('Default'),
    ),
  );
";}s:32:"hook_views_slideshow_widget_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:32:"hook_views_slideshow_widget_info";s:10:"definition";s:43:"function hook_views_slideshow_widget_info()";s:11:"description";s:48:"Define new widgets (pagers, controls, counters).";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:930:"
  return array(
    'views_slideshow_pager' => array(
      'name' => t('Pager'),
      'accepts' => array(
        'transitionBegin' => array('required' => TRUE),
        'goToSlide',
        'previousSlide',
        'nextSlide',
      ),
      'calls' => array(
        'goToSlide',
        'pause',
        'play',
      ),
    ),
    'views_slideshow_controls' => array(
      'name' => t('Controls'),
      'accepts' => array(
        'pause' => array('required' => TRUE),
        'play' => array('required' => TRUE),
      ),
      'calls' => array(
        'nextSlide',
        'pause',
        'play',
        'previousSlide',
      ),
    ),
    'views_slideshow_slide_counter' => array(
      'name' => t('Slide Counter'),
      'accepts' => array(
        'transitionBegin' => array('required' => TRUE),
        'goToSlide',
        'previousSlide',
        'nextSlide',
      ),
      'calls' => array(),
    ),
  );
";}s:38:"hook_views_slideshow_widget_pager_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:38:"hook_views_slideshow_widget_pager_info";s:10:"definition";s:54:"function hook_views_slideshow_widget_pager_info($view)";s:11:"description";s:81:"Hook called by the pager widget to configure it, the fields that should be shown.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:1:"
";}s:41:"hook_views_slideshow_widget_controls_info";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:41:"hook_views_slideshow_widget_controls_info";s:10:"definition";s:57:"function hook_views_slideshow_widget_controls_info($view)";s:11:"description";s:84:"Hook called by the controls widget to configure it, the fields that should be shown.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:15:"views_slideshow";s:9:"file_path";s:63:"/home/lit/lit-dev/.git/../drush/hooks/7/views_slideshow.api.php";s:4:"body";s:1:"
";}}s:20:"workbench_moderation";a:3:{s:38:"hook_workbench_moderation_access_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:38:"hook_workbench_moderation_access_alter";s:10:"definition";s:69:"function hook_workbench_moderation_access_alter(&$access, $op, $node)";s:11:"description";s:42:"Allows modules to alter moderation access.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:20:"workbench_moderation";s:9:"file_path";s:68:"/home/lit/lit-dev/.git/../drush/hooks/7/workbench_moderation.api.php";s:4:"body";s:212:"
  global $user;
  // If the node is marked private, only let its owner moderate it.
  if (empty($node->private) || $op != 'moderate') {
    return;
  }
  if ($user->uid != $node->uid) {
    $access = FALSE;
  }
";}s:43:"hook_workbench_moderation_states_next_alter";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:43:"hook_workbench_moderation_states_next_alter";s:10:"definition";s:88:"function hook_workbench_moderation_states_next_alter(&$states, $current_state, $context)";s:11:"description";s:68:"Allows modules to alter the list of possible next states for a node.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:20:"workbench_moderation";s:9:"file_path";s:68:"/home/lit/lit-dev/.git/../drush/hooks/7/workbench_moderation.api.php";s:4:"body";s:307:"
  // Do not permit users to give final approval to their own nodes, even if
  // they would otherwise have rights to do so.
  $published = workbench_moderation_state_published();
  if (isset($states[$published]) && ($context['account']->uid == $context['node']->uid)) {
    unset($states[$published]);
  }
";}s:36:"hook_workbench_moderation_transition";a:9:{s:4:"type";s:4:"hook";s:4:"name";s:36:"hook_workbench_moderation_transition";s:10:"definition";s:81:"function hook_workbench_moderation_transition($node, $previous_state, $new_state)";s:11:"description";s:47:"Allows modules to respond to state transitions.";s:11:"destination";s:14:"%module.module";s:12:"dependencies";a:0:{}s:5:"group";s:20:"workbench_moderation";s:9:"file_path";s:68:"/home/lit/lit-dev/.git/../drush/hooks/7/workbench_moderation.api.php";s:4:"body";s:22:"
  // Your code here.
";}}}