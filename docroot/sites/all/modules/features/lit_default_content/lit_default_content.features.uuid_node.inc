<?php
/**
 * @file
 * lit_default_content.features.uuid_node.inc
 */

/**
 * Implements hook_uuid_features_default_content().
 */
function lit_default_content_uuid_features_default_content() {
  $nodes = array();

  $nodes[] = array(
  'uid' => 3,
  'title' => ' Submission: Although they are (Sapho) by admin 201312251929',
  'log' => '',
  'status' => 1,
  'comment' => 1,
  'promote' => 0,
  'sticky' => 0,
  'vuuid' => 'ff2efaab-65d5-4801-846f-443d968e8cb2',
  'type' => 'text',
  'language' => 'und',
  'created' => 1387999451,
  'tnid' => 0,
  'translate' => 0,
  'uuid' => '99fa4127-75b6-4713-b83f-264fb327d83d',
  'revision_uid' => 1,
  'body' => array(
    'und' => array(
      0 => array(
        'value' => 'Although they are 
only breath, words 
which I command 
are immortal ',
        'summary' => '',
        'format' => 'plain_text',
        'safe_value' => '<p>Although they are<br />
only breath, words<br />
which I command<br />
are immortal</p>
',
        'safe_summary' => '',
      ),
    ),
  ),
  'field_short_title' => array(
    'und' => array(
      0 => array(
        'value' => 'Although they are (Sapho)',
        'format' => NULL,
        'safe_value' => 'Although they are (Sapho)',
      ),
    ),
  ),
  'field_text_type' => array(
    'und' => array(
      0 => array(
        'value' => 'SUB ',
      ),
    ),
  ),
  'rdf_mapping' => array(
    'rdftype' => array(
      0 => 'sioc:Item',
      1 => 'foaf:Document',
    ),
    'title' => array(
      'predicates' => array(
        0 => 'dc:title',
      ),
    ),
    'created' => array(
      'predicates' => array(
        0 => 'dc:date',
        1 => 'dc:created',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
    'changed' => array(
      'predicates' => array(
        0 => 'dc:modified',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
    'body' => array(
      'predicates' => array(
        0 => 'content:encoded',
      ),
    ),
    'uid' => array(
      'predicates' => array(
        0 => 'sioc:has_creator',
      ),
      'type' => 'rel',
    ),
    'name' => array(
      'predicates' => array(
        0 => 'foaf:name',
      ),
    ),
    'comment_count' => array(
      'predicates' => array(
        0 => 'sioc:num_replies',
      ),
      'datatype' => 'xsd:integer',
    ),
    'last_activity' => array(
      'predicates' => array(
        0 => 'sioc:last_activity_date',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
  ),
  'cid' => 0,
  'last_comment_name' => NULL,
  'last_comment_uid' => 3,
  'comment_count' => 0,
  'name' => 'muse',
  'picture' => 0,
  'data' => NULL,
  'date' => '2013-12-25 19:24:11 +0000',
);
  $nodes[] = array(
  'uid' => 3,
  'title' => ' Submission: A hymn to Venus (initial fragment) Sapho by admin 201312251929',
  'log' => '',
  'status' => 1,
  'comment' => 1,
  'promote' => 0,
  'sticky' => 0,
  'vuuid' => 'edc8ce71-7940-4269-b725-acf4c661df03',
  'type' => 'text',
  'language' => 'und',
  'created' => 1387999535,
  'tnid' => 0,
  'translate' => 0,
  'uuid' => 'a4116aab-5e1c-4c2e-8f30-5a5f01ba4b09',
  'revision_uid' => 1,
  'body' => array(
    'und' => array(
      0 => array(
        'value' => 'O Venus, beauty of the skies,
To whom a thousand temples rise,
Gaily false in gentle smiles,
Full of love-perplexing wiles;
O goddess, from my heart remove
The wasting cares and pains of love.

If ever thou hast kindly heard
A song in soft distress preferred,
Propitious to my tuneful vow,
A gentle goddess, hear me now.
Descend, thou bright immortal guest,
In all thy radiant charms confessed.',
        'summary' => '',
        'format' => 'plain_text',
        'safe_value' => '<p>O Venus, beauty of the skies,<br />
To whom a thousand temples rise,<br />
Gaily false in gentle smiles,<br />
Full of love-perplexing wiles;<br />
O goddess, from my heart remove<br />
The wasting cares and pains of love.</p>
<p>If ever thou hast kindly heard<br />
A song in soft distress preferred,<br />
Propitious to my tuneful vow,<br />
A gentle goddess, hear me now.<br />
Descend, thou bright immortal guest,<br />
In all thy radiant charms confessed.</p>
',
        'safe_summary' => '',
      ),
    ),
  ),
  'field_short_title' => array(
    'und' => array(
      0 => array(
        'value' => 'A hymn to Venus (initial fragment) Sapho',
        'format' => NULL,
        'safe_value' => 'A hymn to Venus (initial fragment) Sapho',
      ),
    ),
  ),
  'field_text_type' => array(
    'und' => array(
      0 => array(
        'value' => 'SUB ',
      ),
    ),
  ),
  'rdf_mapping' => array(
    'rdftype' => array(
      0 => 'sioc:Item',
      1 => 'foaf:Document',
    ),
    'title' => array(
      'predicates' => array(
        0 => 'dc:title',
      ),
    ),
    'created' => array(
      'predicates' => array(
        0 => 'dc:date',
        1 => 'dc:created',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
    'changed' => array(
      'predicates' => array(
        0 => 'dc:modified',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
    'body' => array(
      'predicates' => array(
        0 => 'content:encoded',
      ),
    ),
    'uid' => array(
      'predicates' => array(
        0 => 'sioc:has_creator',
      ),
      'type' => 'rel',
    ),
    'name' => array(
      'predicates' => array(
        0 => 'foaf:name',
      ),
    ),
    'comment_count' => array(
      'predicates' => array(
        0 => 'sioc:num_replies',
      ),
      'datatype' => 'xsd:integer',
    ),
    'last_activity' => array(
      'predicates' => array(
        0 => 'sioc:last_activity_date',
      ),
      'datatype' => 'xsd:dateTime',
      'callback' => 'date_iso8601',
    ),
  ),
  'cid' => 0,
  'last_comment_name' => NULL,
  'last_comment_uid' => 3,
  'comment_count' => 0,
  'name' => 'muse',
  'picture' => 0,
  'data' => NULL,
  'date' => '2013-12-25 19:25:35 +0000',
);
  return $nodes;
}
