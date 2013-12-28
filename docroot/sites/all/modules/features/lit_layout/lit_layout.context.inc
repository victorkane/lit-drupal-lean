<?php
/**
 * @file
 * lit_layout.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function lit_layout_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'about-section';
  $context->description = 'What is Literary Workshop section';
  $context->tag = 'section';
  $context->conditions = array(
    'menu' => array(
      'values' => array(
        'node/21' => 'node/21',
      ),
    ),
    'path' => array(
      'values' => array(
        'section/what-is-literary-workshop' => 'section/what-is-literary-workshop',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'user-new' => array(
          'module' => 'user',
          'delta' => 'new',
          'region' => 'sidebar_second',
          'weight' => '-10',
        ),
        'user-online' => array(
          'module' => 'user',
          'delta' => 'online',
          'region' => 'sidebar_second',
          'weight' => '-9',
        ),
        'lit_blocks-landing_page_options' => array(
          'module' => 'lit_blocks',
          'delta' => 'landing_page_options',
          'region' => 'footer',
          'weight' => '-10',
        ),
      ),
    ),
    'theme' => array(
      'title' => 'About',
      'subtitle' => 'What our community is like',
    ),
    'theme_html' => array(
      'class' => 'section-about',
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('What is Literary Workshop section');
  t('section');
  $export['about-section'] = $context;

  return $export;
}
