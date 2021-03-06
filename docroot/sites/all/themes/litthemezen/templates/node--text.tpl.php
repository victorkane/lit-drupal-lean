<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
  ?>
  <?php 
    if ($page): 
      // Show table of CRITS for this text on full node display
      // print views_embed_view('VIEWS_MACHINE_NAME', 'DISPLAY_ID', $view_arg);
      print views_embed_view('list_critiques_by_text', 'block', $node->nid);
    endif;
  ?>
  <h4><a href="/node/add/critique?field_text_being_critiqued=<?php print $node->nid; ?>"><?php print t('Click here to add your own critique to this text') ?></a></h4>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>
