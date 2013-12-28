<?php
/**
 * @file
 * lit_layout.features.node_export_features.inc
 */

/**
 * Implements hook_node_export_features_default().
 */
function lit_layout_node_export_features_default() {
  $node_export = array(
  'code_string' => 'array(
  (object) array(
      \'vid\' => \'21\',
      \'uid\' => \'0\',
      \'title\' => \'What is Literary Workshop?\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'62c58a08-3286-4e6b-89dd-1edad5308f45\',
      \'nid\' => \'21\',
      \'type\' => \'section\',
      \'language\' => \'und\',
      \'created\' => \'1388241359\',
      \'changed\' => \'1388241359\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'bb3731c6-798c-4ab9-a94e-2a37ae722457\',
      \'revision_timestamp\' => \'1388241359\',
      \'revision_uid\' => \'0\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "If you feel that Email is a pain as a tool for a literary workshop,then Literary Workshop is for you. You know, someone has to manage the list membership and it\'s impossible to find or manage so much information in a large group, especially as time passes.\\r\\n\\r\\nIf you wish you could group individual pieces by author, date, etc., or easily categorize your own pieces. If you wish that your work wouldn\'t get lost or misplaced on various devices or storage units you use every day.\\r\\n\\r\\nIf you\'d like to be part of a community and to be able to find out all about getting published (when, where, how?).\\r\\n\\r\\nIf you wish you had a place where your writing resources are all easy to find.\\r\\n\\r\\nThen Literary workshop is for you!\\r\\n",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>If you feel that Email is a pain as a tool for a literary workshop,then Literary Workshop is for you. You know, someone has to manage the list membership and it&#039;s impossible to find or manage so much information in a large group, especially as time passes.</p>\\n<p>If you wish you could group individual pieces by author, date, etc., or easily categorize your own pieces. If you wish that your work wouldn&#039;t get lost or misplaced on various devices or storage units you use every day.</p>\\n<p>If you&#039;d like to be part of a community and to be able to find out all about getting published (when, where, how?).</p>\\n<p>If you wish you had a place where your writing resources are all easy to find.</p>\\n<p>Then Literary workshop is for you!</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'rdf_mapping\' => array(
        \'rdftype\' => array(
          \'sioc:Item\',
          \'foaf:Document\',
        ),
        \'title\' => array(
          \'predicates\' => array(
            \'dc:title\',
          ),
        ),
        \'created\' => array(
          \'predicates\' => array(
            \'dc:date\',
            \'dc:created\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
        \'changed\' => array(
          \'predicates\' => array(
            \'dc:modified\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
        \'body\' => array(
          \'predicates\' => array(
            \'content:encoded\',
          ),
        ),
        \'uid\' => array(
          \'predicates\' => array(
            \'sioc:has_creator\',
          ),
          \'type\' => \'rel\',
        ),
        \'name\' => array(
          \'predicates\' => array(
            \'foaf:name\',
          ),
        ),
        \'comment_count\' => array(
          \'predicates\' => array(
            \'sioc:num_replies\',
          ),
          \'datatype\' => \'xsd:integer\',
        ),
        \'last_activity\' => array(
          \'predicates\' => array(
            \'sioc:last_activity_date\',
          ),
          \'datatype\' => \'xsd:dateTime\',
          \'callback\' => \'date_iso8601\',
        ),
      ),
      \'cid\' => \'0\',
      \'last_comment_timestamp\' => \'1388241359\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'0\',
      \'comment_count\' => \'0\',
      \'name\' => \'\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'24\',
        \'source\' => \'node/21\',
        \'alias\' => \'section/what-is-literary-workshop\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
)',
);
  return $node_export;
}
