<?php
/**
 * @file
 * lit_demo_content.features.node_export_features.inc
 */

/**
 * Implements hook_node_export_features_default().
 */
function lit_demo_content_node_export_features_default() {
  $node_export = array(
  'code_string' => 'array(
  (object) array(
      \'vid\' => \'21\',
      \'uid\' => \'3\',
      \'title\' => \' Submission: Mammasay mammasa mamma by muse 201312261027\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'49ccc3f0-6de6-48d8-b76d-3225f5321650\',
      \'nid\' => \'18\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388053661\',
      \'changed\' => \'1388053661\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'19305920-c998-4ec0-9eef-1ce6fd07c660\',
      \'revision_timestamp\' => \'1388053661\',
      \'revision_uid\' => \'3\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "Dope facilisi. Pimpin\' faucibizzle pharetra neque. Shut the shizzle up vulputate check it out id mauris. Crizzle accumsizzle odio shiz shut the shizzle up. I\'m in the shizzle own yo\' shiz vizzle ass. Crizzle brizzle, mi mah nizzle eleifend my shizz, gangster sem stuff shit, eu my shizz quizzle mammasay mammasa mamma oo sa egizzle mi. Etiam fo shizzle, lectus izzle aliquizzle cool, tellizzle nisl rizzle tellivizzle, a cool nulla fo shizzle izzle purizzle. Dope aliquet mattizzle pede. In owned things dolizzle. Praesent leo dawg, pot , nizzle nec, shizzle my nizzle crocodizzle izzle, sem. Shiznit dizzle massa pot its fo rizzle blandizzle hizzle. Vestibulum ullamcorpizzle gizzle at sem tincidunt lobortis. Shiz quis maurizzle. Maecenizzle lacinia. Doggy mammasay mammasa mamma oo sa pot enizzle. Pellentesque mi. Lorizzle ipsizzle ma nizzle sizzle mofo, consectetizzle we gonna chung elizzle. Ma nizzle arcu, convallis rizzle, sagittizzle that\'s the shizzle, pharetra yo, neque. Shizznit bizzle dolor sizzle yo mamma, consectetizzle adipiscing elizzle.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Dope facilisi. Pimpin&#039; faucibizzle pharetra neque. Shut the shizzle up vulputate check it out id mauris. Crizzle accumsizzle odio shiz shut the shizzle up. I&#039;m in the shizzle own yo&#039; shiz vizzle ass. Crizzle brizzle, mi mah nizzle eleifend my shizz, gangster sem stuff shit, eu my shizz quizzle mammasay mammasa mamma oo sa egizzle mi. Etiam fo shizzle, lectus izzle aliquizzle cool, tellizzle nisl rizzle tellivizzle, a cool nulla fo shizzle izzle purizzle. Dope aliquet mattizzle pede. In owned things dolizzle. Praesent leo dawg, pot , nizzle nec, shizzle my nizzle crocodizzle izzle, sem. Shiznit dizzle massa pot its fo rizzle blandizzle hizzle. Vestibulum ullamcorpizzle gizzle at sem tincidunt lobortis. Shiz quis maurizzle. Maecenizzle lacinia. Doggy mammasay mammasa mamma oo sa pot enizzle. Pellentesque mi. Lorizzle ipsizzle ma nizzle sizzle mofo, consectetizzle we gonna chung elizzle. Ma nizzle arcu, convallis rizzle, sagittizzle that&#039;s the shizzle, pharetra yo, neque. Shizznit bizzle dolor sizzle yo mamma, consectetizzle adipiscing elizzle.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Mammasay mammasa mamma\',
            \'format\' => NULL,
            \'safe_value\' => \'Mammasay mammasa mamma\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388053661\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'3\',
      \'comment_count\' => \'0\',
      \'name\' => \'muse\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'21\',
        \'source\' => \'node/18\',
        \'alias\' => \'content/submission-mammasay-mammasa-mamma-muse-201312261027\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'7\',
      \'uid\' => \'2\',
      \'title\' => \' Submission: Flexitarian by bard 201312261003\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'6fd5e7b8-67fe-4893-96c6-f842998f47d7\',
      \'nid\' => \'7\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052228\',
      \'changed\' => \'1388052228\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'19592b42-9971-4693-b110-447343d82f43\',
      \'revision_timestamp\' => \'1388052228\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "Banh mi Cosby sweater organic pop-up, Carles yr Wes Anderson ethical fixie literally. +1 Portland gluten-free cardigan. \\r\\nVHS cray flexitarian, 8-bit Blue Bottle High Life Truffaut raw denim Schlitz fanny pack American Apparel. \\r\\nPlaid raw denim tattooed dreamcatcher, pickled post-ironic chillwave banh mi forage sartorial DIY Helvetica \\r\\nyou probably haven\'t heard of them mixtape. \\r\\n\\r\\nGodard fixie seitan swag tousled. \\r\\nMlkshk salvia messenger bag, cray Wes Anderson dreamcatcher \\r\\nAustin Portland you probably haven\'t heard of them \\r\\n\\r\\nOdd Future. \\r\\nPitchfork fingerstache flexitarian messenger bag, \\r\\nbanjo craft beer Neutra iPhone.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Banh mi Cosby sweater organic pop-up, Carles yr Wes Anderson ethical fixie literally. +1 Portland gluten-free cardigan.<br />\\nVHS cray flexitarian, 8-bit Blue Bottle High Life Truffaut raw denim Schlitz fanny pack American Apparel.<br />\\nPlaid raw denim tattooed dreamcatcher, pickled post-ironic chillwave banh mi forage sartorial DIY Helvetica<br />\\nyou probably haven&#039;t heard of them mixtape. </p>\\n<p>Godard fixie seitan swag tousled.<br />\\nMlkshk salvia messenger bag, cray Wes Anderson dreamcatcher<br />\\nAustin Portland you probably haven&#039;t heard of them </p>\\n<p>Odd Future.<br />\\nPitchfork fingerstache flexitarian messenger bag,<br />\\nbanjo craft beer Neutra iPhone.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Flexitarian\',
            \'format\' => NULL,
            \'safe_value\' => \'Flexitarian\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388052228\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'10\',
        \'source\' => \'node/7\',
        \'alias\' => \'content/submission-flexitarian-bard-201312261003\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'1\',
      \'uid\' => \'0\',
      \'title\' => \' Submission: Sonnet II by Anonymous 201312252018\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'1902eb8b-fbf6-4e33-8476-7e2ead06b372\',
      \'nid\' => \'1\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388002732\',
      \'changed\' => \'1388002732\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'23f49787-d141-4f47-9976-38c25b26a222\',
      \'revision_timestamp\' => \'1388002732\',
      \'revision_uid\' => \'0\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "When forty winters shall beseige thy brow,\\r\\nAnd dig deep trenches in thy beauty\'s field,\\r\\nThy youth\'s proud livery, so gazed on now,\\r\\nWill be a tatter\'d weed, of small worth held:\\r\\nThen being ask\'d where all thy beauty lies,\\r\\nWhere all the treasure of thy lusty days,\\r\\nTo say, within thine own deep-sunken eyes,\\r\\nWere an all-eating shame and thriftless praise.\\r\\nHow much more praise deserved thy beauty\'s use,\\r\\nIf thou couldst answer \'This fair child of mine\\r\\nShall sum my count and make my old excuse,\'\\r\\nProving his beauty by succession thine!\\r\\nThis were to be new made when thou art old,\\r\\nAnd see thy blood warm when thou feel\'st it cold.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>When forty winters shall beseige thy brow,<br />\\nAnd dig deep trenches in thy beauty&#039;s field,<br />\\nThy youth&#039;s proud livery, so gazed on now,<br />\\nWill be a tatter&#039;d weed, of small worth held:<br />\\nThen being ask&#039;d where all thy beauty lies,<br />\\nWhere all the treasure of thy lusty days,<br />\\nTo say, within thine own deep-sunken eyes,<br />\\nWere an all-eating shame and thriftless praise.<br />\\nHow much more praise deserved thy beauty&#039;s use,<br />\\nIf thou couldst answer &#039;This fair child of mine<br />\\nShall sum my count and make my old excuse,&#039;<br />\\nProving his beauty by succession thine!<br />\\nThis were to be new made when thou art old,<br />\\nAnd see thy blood warm when thou feel&#039;st it cold.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Sonnet II\',
            \'format\' => NULL,
            \'safe_value\' => \'Sonnet II\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388002732\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'0\',
      \'comment_count\' => \'0\',
      \'name\' => \'\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'1\',
        \'source\' => \'node/1\',
        \'alias\' => \'content/submission-sonnet-ii-anonymous-201312252018\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'23\',
      \'uid\' => \'3\',
      \'title\' => \' Submission: Gizzle egestas by muse 201312261028\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'60215eaf-e76e-47e6-9065-e49fbc05063a\',
      \'nid\' => \'20\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388053736\',
      \'changed\' => \'1388053736\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'2424d3ea-5eeb-4d7b-96d8-85c2c640e798\',
      \'revision_timestamp\' => \'1388053736\',
      \'revision_uid\' => \'3\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "Integizzle nizzle . Phasellus semper, nulla eu vehicula shizzle my nizzle crocodizzle, velit own yo\' convallizzle rizzle, vizzle fo sapien leo black crackalackin. Vivamizzle vestibulizzle laorizzle izzle. Etizzle shizzle my nizzle crocodizzle tempor daahng dawg. Crizzle interdizzle ornare daahng dawg. Vestibulum fizzle mah nizzle, rhoncus a, go to hizzle fo shizzle, faucibus izzle, get down get down. Vivamizzle sure euismod sapien. Maecenizzle pimpin\' gravida crackalackin. Fusce shut the shizzle up tortor gangster ghetto rizzle pulvinar. Morbi mollis bizzle doggy. Gizzle egestas, yo mamma a laoreet sollicitudizzle, crackalackin velizzle shut the shizzle up brizzle, check it out elementum that\'s the shizzle purizzle phat velit. Suspendisse gizzle fo shizzle quizzle fo shizzle. Sed ac we gonna chung et dui euismod its fo rizzle. Phasellizzle izzle own yo\'. I\'m in the shizzle velizzle. Suspendisse izzle nibh.\\r\\n",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Integizzle nizzle . Phasellus semper, nulla eu vehicula shizzle my nizzle crocodizzle, velit own yo&#039; convallizzle rizzle, vizzle fo sapien leo black crackalackin. Vivamizzle vestibulizzle laorizzle izzle. Etizzle shizzle my nizzle crocodizzle tempor daahng dawg. Crizzle interdizzle ornare daahng dawg. Vestibulum fizzle mah nizzle, rhoncus a, go to hizzle fo shizzle, faucibus izzle, get down get down. Vivamizzle sure euismod sapien. Maecenizzle pimpin&#039; gravida crackalackin. Fusce shut the shizzle up tortor gangster ghetto rizzle pulvinar. Morbi mollis bizzle doggy. Gizzle egestas, yo mamma a laoreet sollicitudizzle, crackalackin velizzle shut the shizzle up brizzle, check it out elementum that&#039;s the shizzle purizzle phat velit. Suspendisse gizzle fo shizzle quizzle fo shizzle. Sed ac we gonna chung et dui euismod its fo rizzle. Phasellizzle izzle own yo&#039;. I&#039;m in the shizzle velizzle. Suspendisse izzle nibh.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Gizzle egestas\',
            \'format\' => NULL,
            \'safe_value\' => \'Gizzle egestas\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388053736\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'3\',
      \'comment_count\' => \'0\',
      \'name\' => \'muse\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'23\',
        \'source\' => \'node/20\',
        \'alias\' => \'content/submission-gizzle-egestas-muse-201312261028\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'18\',
      \'uid\' => \'3\',
      \'title\' => \' Submission: Etiam by muse 201312261024\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'38d39ec5-ed88-4545-96d9-baad66805714\',
      \'nid\' => \'15\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388053494\',
      \'changed\' => \'1388053494\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'33c84bb5-a056-4abf-a542-3fbc9c3bf976\',
      \'revision_timestamp\' => \'1388053494\',
      \'revision_uid\' => \'3\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Sizzle gizzle. shiz massa its fo rizzle maurizzle. Fo shizzle mah nizzle fo rizzle, mah home g-dizzle shiz ipsizzle primizzle shut the shizzle up faucibus orci luctus izzle phat fizzle cubilia Its fo rizzle; Aenean vestibulum. Fo shizzle habitant morbi tristique senectus shizznit netus et malesuada famizzle shit sizzle egestizzle. Bow wow wow tempor hendrerit dope. Aliquizzle erat yo mamma. Vivamizzle gangster enim, yo izzle, rizzle we gonna chung, crunk dawg, arcu. Nulla check it out. Donizzle fermentum, est yippiyo pharetra uhuh ... yih!, magna erat ultricies for sure, nizzle ullamcorper fo shizzle my nizzle dolizzle izzle nibh. Vivamizzle tellus neque, sure ut, ornare izzle, its fo rizzle nizzle, leo. Fizzle dawg sizzle, black sizzle amet, interdum vehicula, dignissizzle malesuada, arcu. Aenizzle pizzle ipsum izzle est ullamcorpizzle tincidunt. Donec quizzle. Maurizzle ligula urna, dizzle id, dizzle venenatizzle, sodales nizzle, felizzle. Etiam gravida.\',
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Sizzle gizzle. shiz massa its fo rizzle maurizzle. Fo shizzle mah nizzle fo rizzle, mah home g-dizzle shiz ipsizzle primizzle shut the shizzle up faucibus orci luctus izzle phat fizzle cubilia Its fo rizzle; Aenean vestibulum. Fo shizzle habitant morbi tristique senectus shizznit netus et malesuada famizzle shit sizzle egestizzle. Bow wow wow tempor hendrerit dope. Aliquizzle erat yo mamma. Vivamizzle gangster enim, yo izzle, rizzle we gonna chung, crunk dawg, arcu. Nulla check it out. Donizzle fermentum, est yippiyo pharetra uhuh ... yih!, magna erat ultricies for sure, nizzle ullamcorper fo shizzle my nizzle dolizzle izzle nibh. Vivamizzle tellus neque, sure ut, ornare izzle, its fo rizzle nizzle, leo. Fizzle dawg sizzle, black sizzle amet, interdum vehicula, dignissizzle malesuada, arcu. Aenizzle pizzle ipsum izzle est ullamcorpizzle tincidunt. Donec quizzle. Maurizzle ligula urna, dizzle id, dizzle venenatizzle, sodales nizzle, felizzle. Etiam gravida.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Etiam\',
            \'format\' => NULL,
            \'safe_value\' => \'Etiam\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388053494\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'3\',
      \'comment_count\' => \'0\',
      \'name\' => \'muse\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'18\',
        \'source\' => \'node/15\',
        \'alias\' => \'content/submission-etiam-muse-201312261024\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'6\',
      \'uid\' => \'2\',
      \'title\' => \' Submission: Disk ratchet woof by bard 201312261001\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'71133d23-d384-4992-9971-2e4bfaecf329\',
      \'nid\' => \'6\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052104\',
      \'changed\' => \'1388052104\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'42fdf3ae-8a67-4729-a0aa-430c0a7065f4\',
      \'revision_timestamp\' => \'1388052104\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "Inner ladle wile, Ladle Rat Rotten Hut a raft attar cordage, an ranker dough belle. \\"Comb ink, sweat hard,\\" setter wicket woof, disgracing is verse. Ladle Rat Rotten Hut entity bet rum an stud buyer groin-murder\'s bet.\\r\\n\\r\\n\\"O Grammar!\\" crater ladle gull, \\"Wood bag icer gut! A nervous sausage bag ice!\\"\\r\\n\\r\\n\\"Battered lucky chew whiff, doling,\\" whiskered disk ratchet woof, wetter wicket small.\\r\\n\\r\\n\\"O Grammar, water bag noise! A nervous sore suture anomolous prognosis!\\"\\r\\n\\r\\n\\"Battered small your whiff,\\" insert a woof, ants mouse worse waddling.\\r\\n\\r\\n\\"O Grammar, water bag mousy gut! A nervous sore suture bag mouse!\\"\\r\\n\\r\\nDaze worry on-forger-nut gulls lest warts. Oil offer sodden, thoroughing offer carvers an sprinkling otter bet, disk curl and bloat-thursday woof ceased pore Ladle Rat Rotten Hut an garbled erupt.\\r\\n\\r\\nMural: Yonder nor sorghum stenches shut ladle gulls stopper torque wet strainers. \\r\\n",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Inner ladle wile, Ladle Rat Rotten Hut a raft attar cordage, an ranker dough belle. &quot;Comb ink, sweat hard,&quot; setter wicket woof, disgracing is verse. Ladle Rat Rotten Hut entity bet rum an stud buyer groin-murder&#039;s bet.</p>\\n<p>&quot;O Grammar!&quot; crater ladle gull, &quot;Wood bag icer gut! A nervous sausage bag ice!&quot;</p>\\n<p>&quot;Battered lucky chew whiff, doling,&quot; whiskered disk ratchet woof, wetter wicket small.</p>\\n<p>&quot;O Grammar, water bag noise! A nervous sore suture anomolous prognosis!&quot;</p>\\n<p>&quot;Battered small your whiff,&quot; insert a woof, ants mouse worse waddling.</p>\\n<p>&quot;O Grammar, water bag mousy gut! A nervous sore suture bag mouse!&quot;</p>\\n<p>Daze worry on-forger-nut gulls lest warts. Oil offer sodden, thoroughing offer carvers an sprinkling otter bet, disk curl and bloat-thursday woof ceased pore Ladle Rat Rotten Hut an garbled erupt.</p>\\n<p>Mural: Yonder nor sorghum stenches shut ladle gulls stopper torque wet strainers.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Disk ratchet woof\',
            \'format\' => NULL,
            \'safe_value\' => \'Disk ratchet woof\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388052104\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'9\',
        \'source\' => \'node/6\',
        \'alias\' => \'content/submission-disk-ratchet-woof-bard-201312261001\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'10\',
      \'uid\' => \'2\',
      \'title\' => \' Theoretical: Tarantino by bard 201312261009\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'84c0f025-80d0-4424-a86c-0b44df491ed3\',
      \'nid\' => \'10\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052549\',
      \'changed\' => \'1388052549\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'46dfe3f0-5430-4ca5-94c9-a2f0d00d7393\',
      \'revision_timestamp\' => \'1388052549\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "If one examines capitalist construction in the work of Tarantino, one is faced with a choice: either reject neodialectic theory or conclude that sexual identity has significance. However, the subject is interpolated into a posttextual nihilism that includes truth as a paradox. The primary theme of Long’s[1] model of Marxist capitalism is the role of the observer as artist.\\r\\n\\r\\nBut Lacan promotes the use of posttextual nihilism to deconstruct capitalism. Marxist capitalism implies that the collective is capable of significance.\\r\\n\\r\\nTherefore, Marx uses the term ‘the capitalist paradigm of discourse’ to denote not desublimation per se, but postdesublimation. Sontag suggests the use of capitalist construction to analyse class.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>If one examines capitalist construction in the work of Tarantino, one is faced with a choice: either reject neodialectic theory or conclude that sexual identity has significance. However, the subject is interpolated into a posttextual nihilism that includes truth as a paradox. The primary theme of Long’s[1] model of Marxist capitalism is the role of the observer as artist.</p>\\n<p>But Lacan promotes the use of posttextual nihilism to deconstruct capitalism. Marxist capitalism implies that the collective is capable of significance.</p>\\n<p>Therefore, Marx uses the term ‘the capitalist paradigm of discourse’ to denote not desublimation per se, but postdesublimation. Sontag suggests the use of capitalist construction to analyse class.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Tarantino\',
            \'format\' => NULL,
            \'safe_value\' => \'Tarantino\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'THEORY \',
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
      \'last_comment_timestamp\' => \'1388052549\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'13\',
        \'source\' => \'node/10\',
        \'alias\' => \'content/theoretical-tarantino-bard-201312261009\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'22\',
      \'uid\' => \'3\',
      \'title\' => \' Submission: Sure check it out by muse 201312261028\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'7fd3f735-64cf-4fe5-8c75-b395128f3778\',
      \'nid\' => \'19\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388053696\',
      \'changed\' => \'1388053696\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'571f1bca-1a2e-4491-93f1-9acd6049bfc7\',
      \'revision_timestamp\' => \'1388053696\',
      \'revision_uid\' => \'3\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "Shiznit gravida ligula yo est. Proin pot. My shizz tempor. Donizzle in mi a erizzle imperdizzle for sure. Duis vizzle black. Sed mammasay mammasa mamma oo sa est izzle crunk. Go to hizzle a ipsum vitae fo shizzle my nizzle euismizzle da bomb. Integizzle nec risizzle. Check it out lobortis the bizzle vizzle fo shizzle. Morbi eget justo. Etiam eu dui in da bomb gangsta phat. Morbi placerat, arcu non euismizzle porta, mah nizzle crazy adipiscing nunc, cursus dope mi bow wow wow sizzle fizzle est. Away turpizzle. Sure check it out ipsizzle primis cool faucibizzle orci shut the shizzle up et ultricizzle bow wow wow cubilia Check it out; You son of a bizzle vehicula, dawg fo shizzle my nizzle tincidunt you son of a bizzle, black lorem gravida nunc, a my shizz yippiyo metus quizzle owned. Fo shizzle pretium erizzle izzle nulla. Phat accumsizzle. Cizzle sociis natoque penatibizzle dang magnizzle check out this for sure montes, mammasay mammasa mamma oo sa ridiculus mus. Prizzle izzle ma nizzle fringilla quam ultrices congue. Donizzle non mi.\\r\\n",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Shiznit gravida ligula yo est. Proin pot. My shizz tempor. Donizzle in mi a erizzle imperdizzle for sure. Duis vizzle black. Sed mammasay mammasa mamma oo sa est izzle crunk. Go to hizzle a ipsum vitae fo shizzle my nizzle euismizzle da bomb. Integizzle nec risizzle. Check it out lobortis the bizzle vizzle fo shizzle. Morbi eget justo. Etiam eu dui in da bomb gangsta phat. Morbi placerat, arcu non euismizzle porta, mah nizzle crazy adipiscing nunc, cursus dope mi bow wow wow sizzle fizzle est. Away turpizzle. Sure check it out ipsizzle primis cool faucibizzle orci shut the shizzle up et ultricizzle bow wow wow cubilia Check it out; You son of a bizzle vehicula, dawg fo shizzle my nizzle tincidunt you son of a bizzle, black lorem gravida nunc, a my shizz yippiyo metus quizzle owned. Fo shizzle pretium erizzle izzle nulla. Phat accumsizzle. Cizzle sociis natoque penatibizzle dang magnizzle check out this for sure montes, mammasay mammasa mamma oo sa ridiculus mus. Prizzle izzle ma nizzle fringilla quam ultrices congue. Donizzle non mi.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Sure check it out\',
            \'format\' => NULL,
            \'safe_value\' => \'Sure check it out\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388053696\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'3\',
      \'comment_count\' => \'0\',
      \'name\' => \'muse\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'22\',
        \'source\' => \'node/19\',
        \'alias\' => \'content/submission-sure-check-it-out-muse-201312261028\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'16\',
      \'uid\' => \'2\',
      \'title\' => \' Theoretical: Realities of absurdity by adminpww99 201312261015\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'095d8bf2-aafd-493e-a7e7-42bc5f800e02\',
      \'nid\' => \'13\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052787\',
      \'changed\' => \'1388052919\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'70ccfd61-5dbd-49b0-9c1c-bbca4c95d294\',
      \'revision_timestamp\' => \'1388052919\',
      \'revision_uid\' => \'1\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "The primary theme of von Junz’s[5] essay on Marxist capitalism is the bridge between truth and sexual identity. It could be said that Debord suggests the use of Lacanist obscurity to modify class. Drucker[6] holds that we have to choose between dialectic patriarchialism and Sontagist camp.\\r\\n\\r\\n“Sexual identity is part of the economy of language,” says Marx. Thus, Lacanist obscurity implies that the collective is fundamentally dead. An abundance of discourses concerning the failure, and hence the absurdity, of neocultural consciousness may be found.\\r\\n\\r\\nTherefore, the subject is interpolated into a capitalist discourse that includes sexuality as a reality. Lyotard’s model of Marxist capitalism holds that reality is capable of significant form, but only if the premise of the materialist paradigm of consensus is invalid.\\r\\n\\r\\nIt could be said that Foucault uses the term ‘Lacanist obscurity’ to denote a self-referential whole. The main theme of the works of Rushdie is the role of the participant as observer.\\r\\n\\r\\nBut Bataille uses the term ‘subcapitalist textual theory’ to denote a precultural reality. Foucault promotes the use of Lacanist obscurity to challenge hierarchy.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>The primary theme of von Junz’s[5] essay on Marxist capitalism is the bridge between truth and sexual identity. It could be said that Debord suggests the use of Lacanist obscurity to modify class. Drucker[6] holds that we have to choose between dialectic patriarchialism and Sontagist camp.</p>\\n<p>“Sexual identity is part of the economy of language,” says Marx. Thus, Lacanist obscurity implies that the collective is fundamentally dead. An abundance of discourses concerning the failure, and hence the absurdity, of neocultural consciousness may be found.</p>\\n<p>Therefore, the subject is interpolated into a capitalist discourse that includes sexuality as a reality. Lyotard’s model of Marxist capitalism holds that reality is capable of significant form, but only if the premise of the materialist paradigm of consensus is invalid.</p>\\n<p>It could be said that Foucault uses the term ‘Lacanist obscurity’ to denote a self-referential whole. The main theme of the works of Rushdie is the role of the participant as observer.</p>\\n<p>But Bataille uses the term ‘subcapitalist textual theory’ to denote a precultural reality. Foucault promotes the use of Lacanist obscurity to challenge hierarchy.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Realities of absurdity\',
            \'format\' => NULL,
            \'safe_value\' => \'Realities of absurdity\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'THEORY \',
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
      \'last_comment_timestamp\' => \'1388052787\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'16\',
        \'source\' => \'node/13\',
        \'alias\' => \'content/theoretical-realities-absurdity-adminpww99-201312261015\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'19\',
      \'uid\' => \'3\',
      \'title\' => \' Submission: nizzle pizzle bow wow by muse 201312261025\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'cd3a654d-61ca-419c-a804-ff87a9765566\',
      \'nid\' => \'16\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388053558\',
      \'changed\' => \'1388053558\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'8dab581b-5f75-462d-bd00-c0c0154222d2\',
      \'revision_timestamp\' => \'1388053558\',
      \'revision_uid\' => \'3\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Maecenizzle mi. Nizzle eros. Proin gizzle, for sure nizzle congue consectetizzle, metizzle libero consequat purizzle, daahng dawg ullamcorpizzle dui mi nizzle quizzle. The bizzle faucibizzle tellivizzle. Dizzle hizzle fo, hizzle sizzle, cool volutpizzle, gangster izzle, stuff. Proin shut the shizzle up urna. Mah nizzle pizzle rizzle bow wow wow funky fresh. Pellentesque nizzle euismod owned. Donec ultrices things break yo neck, yall erizzle. Bizzle posuere check out this break yo neck, yall. Ut mauris. Cool sheezy shut the shizzle up, uhuh ... yih! things, eleifend fo, malesuada fizzle, nisi. Fizzle vulputate dizzle crazy.\',
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Maecenizzle mi. Nizzle eros. Proin gizzle, for sure nizzle congue consectetizzle, metizzle libero consequat purizzle, daahng dawg ullamcorpizzle dui mi nizzle quizzle. The bizzle faucibizzle tellivizzle. Dizzle hizzle fo, hizzle sizzle, cool volutpizzle, gangster izzle, stuff. Proin shut the shizzle up urna. Mah nizzle pizzle rizzle bow wow wow funky fresh. Pellentesque nizzle euismod owned. Donec ultrices things break yo neck, yall erizzle. Bizzle posuere check out this break yo neck, yall. Ut mauris. Cool sheezy shut the shizzle up, uhuh ... yih! things, eleifend fo, malesuada fizzle, nisi. Fizzle vulputate dizzle crazy.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'nizzle pizzle bow wow\',
            \'format\' => NULL,
            \'safe_value\' => \'nizzle pizzle bow wow\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388053558\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'3\',
      \'comment_count\' => \'0\',
      \'name\' => \'muse\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'19\',
        \'source\' => \'node/16\',
        \'alias\' => \'content/submission-nizzle-pizzle-bow-wow-muse-201312261025\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'17\',
      \'uid\' => \'2\',
      \'title\' => \' Theoretical: Expressions of absurdity by adminpww99 201312261015\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'1ca7c5ee-a922-476b-b8cb-1b4a896c19d9\',
      \'nid\' => \'11\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052617\',
      \'changed\' => \'1388052938\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'9f7105f3-8fee-4a08-927b-5bc53ba90a7c\',
      \'revision_timestamp\' => \'1388052938\',
      \'revision_uid\' => \'1\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "“Culture is used in the service of sexism,” says Derrida; however, according to Brophy[2] , it is not so much culture that is used in the service of sexism, but rather the paradigm, and subsequent fatal flaw, of culture. However, Bataille’s essay on Marxist capitalism holds that class, somewhat paradoxically, has intrinsic meaning. Hanfkopf[3] states that we have to choose between posttextual nihilism and Baudrillardist simulation.\\r\\n\\r\\nIf one examines deconstructivist objectivism, one is faced with a choice: either accept Marxist capitalism or conclude that the goal of the writer is social comment, but only if the subcultural paradigm of reality is valid. Thus, Marx promotes the use of capitalist construction to challenge hierarchy. The main theme of the works of Rushdie is the common ground between narrativity and sexual identity.\\r\\n\\r\\n“Class is part of the economy of language,” says Bataille; however, according to Buxton[4] , it is not so much class that is part of the economy of language, but rather the futility, and some would say the stasis, of class. In a sense, Lacan’s critique of neodialectic capitalist theory suggests that art may be used to reinforce colonialist perceptions of sexual identity. An abundance of desituationisms concerning capitalist construction exist.\\r\\n\\r\\nThus, if Marxist capitalism holds, we have to choose between capitalist construction and Batailleist `powerful communication’. Several discourses concerning not, in fact, deappropriation, but predeappropriation may be discovered.\\r\\n\\r\\nBut the primary theme of Finnis’s[5] essay on posttextual nihilism is the bridge between narrativity and society. Lyotard suggests the use of Marxist capitalism to modify and analyse sexual identity.\\r\\n\\r\\nThus, Humphrey[6] holds that we have to choose between posttextual nihilism and postdialectic discourse. The main theme of the works of Stone is not narrative, as Marxist capitalism suggests, but neonarrative.\\r\\n\\r\\nHowever, Bataille promotes the use of capitalist construction to deconstruct sexism. The subject is contextualised into a Marxist capitalism that includes reality as a reality.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>“Culture is used in the service of sexism,” says Derrida; however, according to Brophy[2] , it is not so much culture that is used in the service of sexism, but rather the paradigm, and subsequent fatal flaw, of culture. However, Bataille’s essay on Marxist capitalism holds that class, somewhat paradoxically, has intrinsic meaning. Hanfkopf[3] states that we have to choose between posttextual nihilism and Baudrillardist simulation.</p>\\n<p>If one examines deconstructivist objectivism, one is faced with a choice: either accept Marxist capitalism or conclude that the goal of the writer is social comment, but only if the subcultural paradigm of reality is valid. Thus, Marx promotes the use of capitalist construction to challenge hierarchy. The main theme of the works of Rushdie is the common ground between narrativity and sexual identity.</p>\\n<p>“Class is part of the economy of language,” says Bataille; however, according to Buxton[4] , it is not so much class that is part of the economy of language, but rather the futility, and some would say the stasis, of class. In a sense, Lacan’s critique of neodialectic capitalist theory suggests that art may be used to reinforce colonialist perceptions of sexual identity. An abundance of desituationisms concerning capitalist construction exist.</p>\\n<p>Thus, if Marxist capitalism holds, we have to choose between capitalist construction and Batailleist `powerful communication’. Several discourses concerning not, in fact, deappropriation, but predeappropriation may be discovered.</p>\\n<p>But the primary theme of Finnis’s[5] essay on posttextual nihilism is the bridge between narrativity and society. Lyotard suggests the use of Marxist capitalism to modify and analyse sexual identity.</p>\\n<p>Thus, Humphrey[6] holds that we have to choose between posttextual nihilism and postdialectic discourse. The main theme of the works of Stone is not narrative, as Marxist capitalism suggests, but neonarrative.</p>\\n<p>However, Bataille promotes the use of capitalist construction to deconstruct sexism. The subject is contextualised into a Marxist capitalism that includes reality as a reality.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Expressions of absurdity\',
            \'format\' => NULL,
            \'safe_value\' => \'Expressions of absurdity\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'THEORY \',
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
      \'last_comment_timestamp\' => \'1388052617\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'14\',
        \'source\' => \'node/11\',
        \'alias\' => \'content/theoretical-expressions-absurdity-adminpww99-201312261015\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'9\',
      \'uid\' => \'2\',
      \'title\' => \' Submission: Tumblr XOXO tote bag by bard 201312261007\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'4c9e0a04-41a8-4bed-b62a-6979f5be045b\',
      \'nid\' => \'9\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052448\',
      \'changed\' => \'1388052448\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'a9e93034-81da-4727-bc18-aa00ecc508ac\',
      \'revision_timestamp\' => \'1388052448\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "IPhone umami Wes Anderson biodiesel, drinking vinegar next level irony. \\r\\nTousled iPhone actually single-origin coffee chia. \\r\\nLeggings synth fanny pack \\r\\nhashtag cornhole. \\r\\n\\r\\nVHS tote bag gluten-free direct trade, \\r\\nphoto booth pork belly \\r\\nYOLO trust fund. \\r\\n\\r\\nKogi vinyl raw denim bicycle rights, \\r\\nblog you probably haven\'t heard of them \\r\\nmaster cleanse synth pork belly hashtag \\r\\nTruffaut put a bird on it. \\r\\n\\r\\nTumblr XOXO tote bag hashtag, \\r\\nkogi irony pour-over pug locavore. \\r\\nArt party wayfarers \\r\\nmeh \\r\\nbanh mi polaroid umami \\r\\nYOLO artisan lo-fi, \\r\\nchurch-key \\r\\ntry-hard.\\r\\n",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>IPhone umami Wes Anderson biodiesel, drinking vinegar next level irony.<br />\\nTousled iPhone actually single-origin coffee chia.<br />\\nLeggings synth fanny pack<br />\\nhashtag cornhole. </p>\\n<p>VHS tote bag gluten-free direct trade,<br />\\nphoto booth pork belly<br />\\nYOLO trust fund. </p>\\n<p>Kogi vinyl raw denim bicycle rights,<br />\\nblog you probably haven&#039;t heard of them<br />\\nmaster cleanse synth pork belly hashtag<br />\\nTruffaut put a bird on it. </p>\\n<p>Tumblr XOXO tote bag hashtag,<br />\\nkogi irony pour-over pug locavore.<br />\\nArt party wayfarers<br />\\nmeh<br />\\nbanh mi polaroid umami<br />\\nYOLO artisan lo-fi,<br />\\nchurch-key<br />\\ntry-hard.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Tumblr XOXO tote bag\',
            \'format\' => NULL,
            \'safe_value\' => \'Tumblr XOXO tote bag\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388052448\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'12\',
        \'source\' => \'node/9\',
        \'alias\' => \'content/submission-tumblr-xoxo-tote-bag-bard-201312261007\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'2\',
      \'uid\' => \'0\',
      \'title\' => " Submission: A Lover\'s Complaint by Anonymous 201312252018",
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'b822aa71-b4f2-42a0-9eca-5e07065a3fe4\',
      \'nid\' => \'2\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388002732\',
      \'changed\' => \'1388002732\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'ad2b8bb3-7d62-4db4-96f2-d33f141c6ece\',
      \'revision_timestamp\' => \'1388002732\',
      \'revision_uid\' => \'0\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "FROM off a hill whose concave womb reworded\\r\\nA plaintful story from a sistering vale,\\r\\nMy spirits to attend this double voice accorded,\\r\\nAnd down I laid to list the sad-tuned tale;\\r\\nEre long espied a fickle maid full pale,\\r\\nTearing of papers, breaking rings a-twain,\\r\\nStorming her world with sorrow\'s wind and rain.\\r\\n\\r\\nUpon her head a platted hive of straw,\\r\\nWhich fortified her visage from the sun,\\r\\nWhereon the thought might think sometime it saw\\r\\nThe carcass of beauty spent and done:\\r\\nTime had not scythed all that youth begun,\\r\\nNor youth all quit; but, spite of heaven\'s fell rage,\\r\\nSome beauty peep\'d through lattice of sear\'d age.\\r\\nOft did she heave her napkin to her eyne,\\r\\nWhich on it had conceited characters,\\r\\nLaundering the silken figures in the brine\\r\\nThat season\'d woe had pelleted in tears,\\r\\nAnd often reading what contents it bears;\\r\\nAs often shrieking undistinguish\'d woe,\\r\\nIn clamours of all size, both high and low.\\r\\nSometimes her levell\'d eyes their carriage ride,\\r\\nAs they did battery to the spheres intend;\\r\\nSometime diverted their poor balls are tied\\r\\nTo the orbed earth; sometimes they do extend\\r\\nTheir view right on; anon their gazes lend\\r\\nTo every place at once, and, nowhere fix\'d,\\r\\nThe mind and sight distractedly commix\'d.\\r\\nHer hair, nor loose nor tied in formal plat,\\r\\nProclaim\'d in her a careless hand of pride\\r\\nFor some, untuck\'d, descended her sheaved hat,\\r\\nHanging her pale and pined cheek beside;\\r\\nSome in her threaden fillet still did bide,\\r\\nAnd true to bondage would not break from thence,\\r\\nThough slackly braided in loose negligence.\\r\\nA thousand favours from a maund she drew\\r\\nOf amber, crystal, and of beaded jet,\\r\\nWhich one by one she in a river threw,\\r\\nUpon whose weeping margent she was set;\\r\\nLike usury, applying wet to wet,\\r\\nOr monarch\'s hands that let not bounty fall\\r\\nWhere want cries some, but where excess begs all.\\r\\nOf folded schedules had she many a one,\\r\\nWhich she perused, sigh\'d, tore, and gave the flood;\\r\\nCrack\'d many a ring of posied gold and bone\\r\\nBidding them find their sepulchres in mud;\\r\\nFound yet moe letters sadly penn\'d in blood,\\r\\nWith sleided silk feat and affectedly\\r\\nEnswathed, and seal\'d to curious secrecy.\\r\\nThese often bathed she in her fluxive eyes,\\r\\nAnd often kiss\'d, and often \'gan to tear:\\r\\nCried \'O false blood, thou register of lies,\\r\\nWhat unapproved witness dost thou bear!\\r\\nInk would have seem\'d more black and damned here!\'\\r\\nThis said, in top of rage the lines she rents,\\r\\nBig discontent so breaking their contents.\\r\\nA reverend man that grazed his cattle nigh--\\r\\nSometime a blusterer, that the ruffle knew\\r\\nOf court, of city, and had let go by\\r\\nThe swiftest hours, observed as they flew--\\r\\nTowards this afflicted fancy fastly drew,\\r\\nAnd, privileged by age, desires to know\\r\\nIn brief the grounds and motives of her woe.\\r\\nSo slides he down upon his grained bat,\\r\\nAnd comely-distant sits he by her side;\\r\\nWhen he again desires her, being sat,\\r\\nHer grievance with his hearing to divide:\\r\\nIf that from him there may be aught applied\\r\\nWhich may her suffering ecstasy assuage,\\r\\n\'Tis promised in the charity of age.\\r\\n\'Father,\' she says, \'though in me you behold\\r\\nThe injury of many a blasting hour,\\r\\nLet it not tell your judgment I am old;\\r\\nNot age, but sorrow, over me hath power:\\r\\nI might as yet have been a spreading flower,\\r\\nFresh to myself, If I had self-applied\\r\\nLove to myself and to no love beside.\\r\\n\'But, woe is me! too early I attended\\r\\nA youthful suit--it was to gain my grace--\\r\\nOf one by nature\'s outwards so commended,\\r\\nThat maidens\' eyes stuck over all his face:\\r\\nLove lack\'d a dwelling, and made him her place;\\r\\nAnd when in his fair parts she did abide,\\r\\nShe was new lodged and newly deified.\\r\\n\'His browny locks did hang in crooked curls;\\r\\nAnd every light occasion of the wind\\r\\nUpon his lips their silken parcels hurls.\\r\\nWhat\'s sweet to do, to do will aptly find:\\r\\nEach eye that saw him did enchant the mind,\\r\\nFor on his visage was in little drawn\\r\\nWhat largeness thinks in Paradise was sawn.\\r\\n\'Small show of man was yet upon his chin;\\r\\nHis phoenix down began but to appear\\r\\nLike unshorn velvet on that termless skin\\r\\nWhose bare out-bragg\'d the web it seem\'d to wear:\\r\\nYet show\'d his visage by that cost more dear;\\r\\nAnd nice affections wavering stood in doubt\\r\\nIf best were as it was, or best without.\\r\\n\'His qualities were beauteous as his form,\\r\\nFor maiden-tongued he was, and thereof free;\\r\\nYet, if men moved him, was he such a storm\\r\\nAs oft \'twixt May and April is to see,\\r\\nWhen winds breathe sweet, untidy though they be.\\r\\nHis rudeness so with his authorized youth\\r\\nDid livery falseness in a pride of truth.\\r\\n\'Well could he ride, and often men would say\\r\\n\'That horse his mettle from his rider takes:\\r\\nProud of subjection, noble by the sway,\\r\\nWhat rounds, what bounds, what course, what stop\\r\\nhe makes!\'\\r\\nAnd controversy hence a question takes,\\r\\nWhether the horse by him became his deed,\\r\\nOr he his manage by the well-doing steed.\\r\\n\'But quickly on this side the verdict went:\\r\\nHis real habitude gave life and grace\\r\\nTo appertainings and to ornament,\\r\\nAccomplish\'d in himself, not in his case:\\r\\nAll aids, themselves made fairer by their place,\\r\\nCame for additions; yet their purposed trim\\r\\nPieced not his grace, but were all graced by him.\\r\\n\'So on the tip of his subduing tongue\\r\\nAll kinds of arguments and question deep,\\r\\nAll replication prompt, and reason strong,\\r\\nFor his advantage still did wake and sleep:\\r\\nTo make the weeper laugh, the laugher weep,\\r\\nHe had the dialect and different skill,\\r\\nCatching all passions in his craft of will:\\r\\n\'That he did in the general bosom reign\\r\\nOf young, of old; and sexes both enchanted,\\r\\nTo dwell with him in thoughts, or to remain\\r\\nIn personal duty, following where he haunted:\\r\\nConsents bewitch\'d, ere he desire, have granted;\\r\\nAnd dialogued for him what he would say,\\r\\nAsk\'d their own wills, and made their wills obey.\\r\\n\'Many there were that did his picture get,\\r\\nTo serve their eyes, and in it put their mind;\\r\\nLike fools that in th\' imagination set\\r\\nThe goodly objects which abroad they find\\r\\nOf lands and mansions, theirs in thought assign\'d;\\r\\nAnd labouring in moe pleasures to bestow them\\r\\nThan the true gouty landlord which doth owe them:\\r\\n\'So many have, that never touch\'d his hand,\\r\\nSweetly supposed them mistress of his heart.\\r\\nMy woeful self, that did in freedom stand,\\r\\nAnd was my own fee-simple, not in part,\\r\\nWhat with his art in youth, and youth in art,\\r\\nThrew my affections in his charmed power,\\r\\nReserved the stalk and gave him all my flower.\\r\\n\'Yet did I not, as some my equals did,\\r\\nDemand of him, nor being desired yielded;\\r\\nFinding myself in honour so forbid,\\r\\nWith safest distance I mine honour shielded:\\r\\nExperience for me many bulwarks builded\\r\\nOf proofs new-bleeding, which remain\'d the foil\\r\\nOf this false jewel, and his amorous spoil.\\r\\n\'But, ah, who ever shunn\'d by precedent\\r\\nThe destined ill she must herself assay?\\r\\nOr forced examples, \'gainst her own content,\\r\\nTo put the by-past perils in her way?\\r\\nCounsel may stop awhile what will not stay;\\r\\nFor when we rage, advice is often seen\\r\\nBy blunting us to make our wits more keen.\\r\\n\'Nor gives it satisfaction to our blood,\\r\\nThat we must curb it upon others\' proof;\\r\\nTo be forbod the sweets that seem so good,\\r\\nFor fear of harms that preach in our behoof.\\r\\nO appetite, from judgment stand aloof!\\r\\nThe one a palate hath that needs will taste,\\r\\nThough Reason weep, and cry, \'It is thy last.\'\\r\\n\'For further I could say \'This man\'s untrue,\'\\r\\nAnd knew the patterns of his foul beguiling;\\r\\nHeard where his plants in others\' orchards grew,\\r\\nSaw how deceits were gilded in his smiling;\\r\\nKnew vows were ever brokers to defiling;\\r\\nThought characters and words merely but art,\\r\\nAnd bastards of his foul adulterate heart.\\r\\n\'And long upon these terms I held my city,\\r\\nTill thus he gan besiege me: \'Gentle maid,\\r\\nHave of my suffering youth some feeling pity,\\r\\nAnd be not of my holy vows afraid:\\r\\nThat\'s to ye sworn to none was ever said;\\r\\nFor feasts of love I have been call\'d unto,\\r\\nTill now did ne\'er invite, nor never woo.\\r\\n\'\'All my offences that abroad you see\\r\\nAre errors of the blood, none of the mind;\\r\\nLove made them not: with acture they may be,\\r\\nWhere neither party is nor true nor kind:\\r\\nThey sought their shame that so their shame did find;\\r\\nAnd so much less of shame in me remains,\\r\\nBy how much of me their reproach contains.\\r\\n\'\'Among the many that mine eyes have seen,\\r\\nNot one whose flame my heart so much as warm\'d,\\r\\nOr my affection put to the smallest teen,\\r\\nOr any of my leisures ever charm\'d:\\r\\nHarm have I done to them, but ne\'er was harm\'d;\\r\\nKept hearts in liveries, but mine own was free,\\r\\nAnd reign\'d, commanding in his monarchy.\\r\\n\'\'Look here, what tributes wounded fancies sent me,\\r\\nOf paled pearls and rubies red as blood;\\r\\nFiguring that they their passions likewise lent me\\r\\nOf grief and blushes, aptly understood\\r\\nIn bloodless white and the encrimson\'d mood;\\r\\nEffects of terror and dear modesty,\\r\\nEncamp\'d in hearts, but fighting outwardly.\\r\\n\'\'And, lo, behold these talents of their hair,\\r\\nWith twisted metal amorously impleach\'d,\\r\\nI have received from many a several fair,\\r\\nTheir kind acceptance weepingly beseech\'d,\\r\\nWith the annexions of fair gems enrich\'d,\\r\\nAnd deep-brain\'d sonnets that did amplify\\r\\nEach stone\'s dear nature, worth, and quality.\\r\\n\'\'The diamond,--why, \'twas beautiful and hard,\\r\\nWhereto his invised properties did tend;\\r\\nThe deep-green emerald, in whose fresh regard\\r\\nWeak sights their sickly radiance do amend;\\r\\nThe heaven-hued sapphire and the opal blend\\r\\nWith objects manifold: each several stone,\\r\\nWith wit well blazon\'d, smiled or made some moan.\\r\\n\'\'Lo, all these trophies of affections hot,\\r\\nOf pensived and subdued desires the tender,\\r\\nNature hath charged me that I hoard them not,\\r\\nBut yield them up where I myself must render,\\r\\nThat is, to you, my origin and ender;\\r\\nFor these, of force, must your oblations be,\\r\\nSince I their altar, you enpatron me.\\r\\n\'\'O, then, advance of yours that phraseless hand,\\r\\nWhose white weighs down the airy scale of praise;\\r\\nTake all these similes to your own command,\\r\\nHallow\'d with sighs that burning lungs did raise;\\r\\nWhat me your minister, for you obeys,\\r\\nWorks under you; and to your audit comes\\r\\nTheir distract parcels in combined sums.\\r\\n\'\'Lo, this device was sent me from a nun,\\r\\nOr sister sanctified, of holiest note;\\r\\nWhich late her noble suit in court did shun,\\r\\nWhose rarest havings made the blossoms dote;\\r\\nFor she was sought by spirits of richest coat,\\r\\nBut kept cold distance, and did thence remove,\\r\\nTo spend her living in eternal love.\\r\\n\'\'But, O my sweet, what labour is\'t to leave\\r\\nThe thing we have not, mastering what not strives,\\r\\nPlaying the place which did no form receive,\\r\\nPlaying patient sports in unconstrained gyves?\\r\\nShe that her fame so to herself contrives,\\r\\nThe scars of battle \'scapeth by the flight,\\r\\nAnd makes her absence valiant, not her might.\\r\\n\'\'O, pardon me, in that my boast is true:\\r\\nThe accident which brought me to her eye\\r\\nUpon the moment did her force subdue,\\r\\nAnd now she would the caged cloister fly:\\r\\nReligious love put out Religion\'s eye:\\r\\nNot to be tempted, would she be immured,\\r\\nAnd now, to tempt, all liberty procured.\\r\\n\'\'How mighty then you are, O, hear me tell!\\r\\nThe broken bosoms that to me belong\\r\\nHave emptied all their fountains in my well,\\r\\nAnd mine I pour your ocean all among:\\r\\nI strong o\'er them, and you o\'er me being strong,\\r\\nMust for your victory us all congest,\\r\\nAs compound love to physic your cold breast.\\r\\n\'\'My parts had power to charm a sacred nun,\\r\\nWho, disciplined, ay, dieted in grace,\\r\\nBelieved her eyes when they to assail begun,\\r\\nAll vows and consecrations giving place:\\r\\nO most potential love! vow, bond, nor space,\\r\\nIn thee hath neither sting, knot, nor confine,\\r\\nFor thou art all, and all things else are thine.\\r\\n\'\'When thou impressest, what are precepts worth\\r\\nOf stale example? When thou wilt inflame,\\r\\nHow coldly those impediments stand forth\\r\\nOf wealth, of filial fear, law, kindred, fame!\\r\\nLove\'s arms are peace, \'gainst rule, \'gainst sense,\\r\\n\'gainst shame,\\r\\nAnd sweetens, in the suffering pangs it bears,\\r\\nThe aloes of all forces, shocks, and fears.\\r\\n\'\'Now all these hearts that do on mine depend,\\r\\nFeeling it break, with bleeding groans they pine;\\r\\nAnd supplicant their sighs to you extend,\\r\\nTo leave the battery that you make \'gainst mine,\\r\\nLending soft audience to my sweet design,\\r\\nAnd credent soul to that strong-bonded oath\\r\\nThat shall prefer and undertake my troth.\'\\r\\n\'This said, his watery eyes he did dismount,\\r\\nWhose sights till then were levell\'d on my face;\\r\\nEach cheek a river running from a fount\\r\\nWith brinish current downward flow\'d apace:\\r\\nO, how the channel to the stream gave grace!\\r\\nWho glazed with crystal gate the glowing roses\\r\\nThat flame through water which their hue encloses.\\r\\n\'O father, what a hell of witchcraft lies\\r\\nIn the small orb of one particular tear!\\r\\nBut with the inundation of the eyes\\r\\nWhat rocky heart to water will not wear?\\r\\nWhat breast so cold that is not warmed here?\\r\\nO cleft effect! cold modesty, hot wrath,\\r\\nBoth fire from hence and chill extincture hath.\\r\\n\'For, lo, his passion, but an art of craft,\\r\\nEven there resolved my reason into tears;\\r\\nThere my white stole of chastity I daff\'d,\\r\\nShook off my sober guards and civil fears;\\r\\nAppear to him, as he to me appears,\\r\\nAll melting; though our drops this difference bore,\\r\\nHis poison\'d me, and mine did him restore.\\r\\n\'In him a plenitude of subtle matter,\\r\\nApplied to cautels, all strange forms receives,\\r\\nOf burning blushes, or of weeping water,\\r\\nOr swooning paleness; and he takes and leaves,\\r\\nIn either\'s aptness, as it best deceives,\\r\\nTo blush at speeches rank to weep at woes,\\r\\nOr to turn white and swoon at tragic shows.\\r\\n\'That not a heart which in his level came\\r\\nCould \'scape the hail of his all-hurting aim,\\r\\nShowing fair nature is both kind and tame;\\r\\nAnd, veil\'d in them, did win whom he would maim:\\r\\nAgainst the thing he sought he would exclaim;\\r\\nWhen he most burn\'d in heart-wish\'d luxury,\\r\\nHe preach\'d pure maid, and praised cold chastity.\\r\\n\'Thus merely with the garment of a Grace\\r\\nThe naked and concealed fiend he cover\'d;\\r\\nThat th\' unexperient gave the tempter place,\\r\\nWhich like a cherubin above them hover\'d.\\r\\nWho, young and simple, would not be so lover\'d?\\r\\nAy me! I fell; and yet do question make\\r\\nWhat I should do again for such a sake.\\r\\n\'O, that infected moisture of his eye,\\r\\nO, that false fire which in his cheek so glow\'d,\\r\\nO, that forced thunder from his heart did fly,\\r\\nO, that sad breath his spongy lungs bestow\'d,\\r\\nO, all that borrow\'d motion seeming owed,\\r\\nWould yet again betray the fore-betray\'d,\\r\\nAnd new pervert a reconciled maid!\'",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>FROM off a hill whose concave womb reworded<br />\\nA plaintful story from a sistering vale,<br />\\nMy spirits to attend this double voice accorded,<br />\\nAnd down I laid to list the sad-tuned tale;<br />\\nEre long espied a fickle maid full pale,<br />\\nTearing of papers, breaking rings a-twain,<br />\\nStorming her world with sorrow&#039;s wind and rain.</p>\\n<p>Upon her head a platted hive of straw,<br />\\nWhich fortified her visage from the sun,<br />\\nWhereon the thought might think sometime it saw<br />\\nThe carcass of beauty spent and done:<br />\\nTime had not scythed all that youth begun,<br />\\nNor youth all quit; but, spite of heaven&#039;s fell rage,<br />\\nSome beauty peep&#039;d through lattice of sear&#039;d age.<br />\\nOft did she heave her napkin to her eyne,<br />\\nWhich on it had conceited characters,<br />\\nLaundering the silken figures in the brine<br />\\nThat season&#039;d woe had pelleted in tears,<br />\\nAnd often reading what contents it bears;<br />\\nAs often shrieking undistinguish&#039;d woe,<br />\\nIn clamours of all size, both high and low.<br />\\nSometimes her levell&#039;d eyes their carriage ride,<br />\\nAs they did battery to the spheres intend;<br />\\nSometime diverted their poor balls are tied<br />\\nTo the orbed earth; sometimes they do extend<br />\\nTheir view right on; anon their gazes lend<br />\\nTo every place at once, and, nowhere fix&#039;d,<br />\\nThe mind and sight distractedly commix&#039;d.<br />\\nHer hair, nor loose nor tied in formal plat,<br />\\nProclaim&#039;d in her a careless hand of pride<br />\\nFor some, untuck&#039;d, descended her sheaved hat,<br />\\nHanging her pale and pined cheek beside;<br />\\nSome in her threaden fillet still did bide,<br />\\nAnd true to bondage would not break from thence,<br />\\nThough slackly braided in loose negligence.<br />\\nA thousand favours from a maund she drew<br />\\nOf amber, crystal, and of beaded jet,<br />\\nWhich one by one she in a river threw,<br />\\nUpon whose weeping margent she was set;<br />\\nLike usury, applying wet to wet,<br />\\nOr monarch&#039;s hands that let not bounty fall<br />\\nWhere want cries some, but where excess begs all.<br />\\nOf folded schedules had she many a one,<br />\\nWhich she perused, sigh&#039;d, tore, and gave the flood;<br />\\nCrack&#039;d many a ring of posied gold and bone<br />\\nBidding them find their sepulchres in mud;<br />\\nFound yet moe letters sadly penn&#039;d in blood,<br />\\nWith sleided silk feat and affectedly<br />\\nEnswathed, and seal&#039;d to curious secrecy.<br />\\nThese often bathed she in her fluxive eyes,<br />\\nAnd often kiss&#039;d, and often &#039;gan to tear:<br />\\nCried &#039;O false blood, thou register of lies,<br />\\nWhat unapproved witness dost thou bear!<br />\\nInk would have seem&#039;d more black and damned here!&#039;<br />\\nThis said, in top of rage the lines she rents,<br />\\nBig discontent so breaking their contents.<br />\\nA reverend man that grazed his cattle nigh--<br />\\nSometime a blusterer, that the ruffle knew<br />\\nOf court, of city, and had let go by<br />\\nThe swiftest hours, observed as they flew--<br />\\nTowards this afflicted fancy fastly drew,<br />\\nAnd, privileged by age, desires to know<br />\\nIn brief the grounds and motives of her woe.<br />\\nSo slides he down upon his grained bat,<br />\\nAnd comely-distant sits he by her side;<br />\\nWhen he again desires her, being sat,<br />\\nHer grievance with his hearing to divide:<br />\\nIf that from him there may be aught applied<br />\\nWhich may her suffering ecstasy assuage,<br />\\n&#039;Tis promised in the charity of age.<br />\\n&#039;Father,&#039; she says, &#039;though in me you behold<br />\\nThe injury of many a blasting hour,<br />\\nLet it not tell your judgment I am old;<br />\\nNot age, but sorrow, over me hath power:<br />\\nI might as yet have been a spreading flower,<br />\\nFresh to myself, If I had self-applied<br />\\nLove to myself and to no love beside.<br />\\n&#039;But, woe is me! too early I attended<br />\\nA youthful suit--it was to gain my grace--<br />\\nOf one by nature&#039;s outwards so commended,<br />\\nThat maidens&#039; eyes stuck over all his face:<br />\\nLove lack&#039;d a dwelling, and made him her place;<br />\\nAnd when in his fair parts she did abide,<br />\\nShe was new lodged and newly deified.<br />\\n&#039;His browny locks did hang in crooked curls;<br />\\nAnd every light occasion of the wind<br />\\nUpon his lips their silken parcels hurls.<br />\\nWhat&#039;s sweet to do, to do will aptly find:<br />\\nEach eye that saw him did enchant the mind,<br />\\nFor on his visage was in little drawn<br />\\nWhat largeness thinks in Paradise was sawn.<br />\\n&#039;Small show of man was yet upon his chin;<br />\\nHis phoenix down began but to appear<br />\\nLike unshorn velvet on that termless skin<br />\\nWhose bare out-bragg&#039;d the web it seem&#039;d to wear:<br />\\nYet show&#039;d his visage by that cost more dear;<br />\\nAnd nice affections wavering stood in doubt<br />\\nIf best were as it was, or best without.<br />\\n&#039;His qualities were beauteous as his form,<br />\\nFor maiden-tongued he was, and thereof free;<br />\\nYet, if men moved him, was he such a storm<br />\\nAs oft &#039;twixt May and April is to see,<br />\\nWhen winds breathe sweet, untidy though they be.<br />\\nHis rudeness so with his authorized youth<br />\\nDid livery falseness in a pride of truth.<br />\\n&#039;Well could he ride, and often men would say<br />\\n&#039;That horse his mettle from his rider takes:<br />\\nProud of subjection, noble by the sway,<br />\\nWhat rounds, what bounds, what course, what stop<br />\\nhe makes!&#039;<br />\\nAnd controversy hence a question takes,<br />\\nWhether the horse by him became his deed,<br />\\nOr he his manage by the well-doing steed.<br />\\n&#039;But quickly on this side the verdict went:<br />\\nHis real habitude gave life and grace<br />\\nTo appertainings and to ornament,<br />\\nAccomplish&#039;d in himself, not in his case:<br />\\nAll aids, themselves made fairer by their place,<br />\\nCame for additions; yet their purposed trim<br />\\nPieced not his grace, but were all graced by him.<br />\\n&#039;So on the tip of his subduing tongue<br />\\nAll kinds of arguments and question deep,<br />\\nAll replication prompt, and reason strong,<br />\\nFor his advantage still did wake and sleep:<br />\\nTo make the weeper laugh, the laugher weep,<br />\\nHe had the dialect and different skill,<br />\\nCatching all passions in his craft of will:<br />\\n&#039;That he did in the general bosom reign<br />\\nOf young, of old; and sexes both enchanted,<br />\\nTo dwell with him in thoughts, or to remain<br />\\nIn personal duty, following where he haunted:<br />\\nConsents bewitch&#039;d, ere he desire, have granted;<br />\\nAnd dialogued for him what he would say,<br />\\nAsk&#039;d their own wills, and made their wills obey.<br />\\n&#039;Many there were that did his picture get,<br />\\nTo serve their eyes, and in it put their mind;<br />\\nLike fools that in th&#039; imagination set<br />\\nThe goodly objects which abroad they find<br />\\nOf lands and mansions, theirs in thought assign&#039;d;<br />\\nAnd labouring in moe pleasures to bestow them<br />\\nThan the true gouty landlord which doth owe them:<br />\\n&#039;So many have, that never touch&#039;d his hand,<br />\\nSweetly supposed them mistress of his heart.<br />\\nMy woeful self, that did in freedom stand,<br />\\nAnd was my own fee-simple, not in part,<br />\\nWhat with his art in youth, and youth in art,<br />\\nThrew my affections in his charmed power,<br />\\nReserved the stalk and gave him all my flower.<br />\\n&#039;Yet did I not, as some my equals did,<br />\\nDemand of him, nor being desired yielded;<br />\\nFinding myself in honour so forbid,<br />\\nWith safest distance I mine honour shielded:<br />\\nExperience for me many bulwarks builded<br />\\nOf proofs new-bleeding, which remain&#039;d the foil<br />\\nOf this false jewel, and his amorous spoil.<br />\\n&#039;But, ah, who ever shunn&#039;d by precedent<br />\\nThe destined ill she must herself assay?<br />\\nOr forced examples, &#039;gainst her own content,<br />\\nTo put the by-past perils in her way?<br />\\nCounsel may stop awhile what will not stay;<br />\\nFor when we rage, advice is often seen<br />\\nBy blunting us to make our wits more keen.<br />\\n&#039;Nor gives it satisfaction to our blood,<br />\\nThat we must curb it upon others&#039; proof;<br />\\nTo be forbod the sweets that seem so good,<br />\\nFor fear of harms that preach in our behoof.<br />\\nO appetite, from judgment stand aloof!<br />\\nThe one a palate hath that needs will taste,<br />\\nThough Reason weep, and cry, &#039;It is thy last.&#039;<br />\\n&#039;For further I could say &#039;This man&#039;s untrue,&#039;<br />\\nAnd knew the patterns of his foul beguiling;<br />\\nHeard where his plants in others&#039; orchards grew,<br />\\nSaw how deceits were gilded in his smiling;<br />\\nKnew vows were ever brokers to defiling;<br />\\nThought characters and words merely but art,<br />\\nAnd bastards of his foul adulterate heart.<br />\\n&#039;And long upon these terms I held my city,<br />\\nTill thus he gan besiege me: &#039;Gentle maid,<br />\\nHave of my suffering youth some feeling pity,<br />\\nAnd be not of my holy vows afraid:<br />\\nThat&#039;s to ye sworn to none was ever said;<br />\\nFor feasts of love I have been call&#039;d unto,<br />\\nTill now did ne&#039;er invite, nor never woo.<br />\\n&#039;&#039;All my offences that abroad you see<br />\\nAre errors of the blood, none of the mind;<br />\\nLove made them not: with acture they may be,<br />\\nWhere neither party is nor true nor kind:<br />\\nThey sought their shame that so their shame did find;<br />\\nAnd so much less of shame in me remains,<br />\\nBy how much of me their reproach contains.<br />\\n&#039;&#039;Among the many that mine eyes have seen,<br />\\nNot one whose flame my heart so much as warm&#039;d,<br />\\nOr my affection put to the smallest teen,<br />\\nOr any of my leisures ever charm&#039;d:<br />\\nHarm have I done to them, but ne&#039;er was harm&#039;d;<br />\\nKept hearts in liveries, but mine own was free,<br />\\nAnd reign&#039;d, commanding in his monarchy.<br />\\n&#039;&#039;Look here, what tributes wounded fancies sent me,<br />\\nOf paled pearls and rubies red as blood;<br />\\nFiguring that they their passions likewise lent me<br />\\nOf grief and blushes, aptly understood<br />\\nIn bloodless white and the encrimson&#039;d mood;<br />\\nEffects of terror and dear modesty,<br />\\nEncamp&#039;d in hearts, but fighting outwardly.<br />\\n&#039;&#039;And, lo, behold these talents of their hair,<br />\\nWith twisted metal amorously impleach&#039;d,<br />\\nI have received from many a several fair,<br />\\nTheir kind acceptance weepingly beseech&#039;d,<br />\\nWith the annexions of fair gems enrich&#039;d,<br />\\nAnd deep-brain&#039;d sonnets that did amplify<br />\\nEach stone&#039;s dear nature, worth, and quality.<br />\\n&#039;&#039;The diamond,--why, &#039;twas beautiful and hard,<br />\\nWhereto his invised properties did tend;<br />\\nThe deep-green emerald, in whose fresh regard<br />\\nWeak sights their sickly radiance do amend;<br />\\nThe heaven-hued sapphire and the opal blend<br />\\nWith objects manifold: each several stone,<br />\\nWith wit well blazon&#039;d, smiled or made some moan.<br />\\n&#039;&#039;Lo, all these trophies of affections hot,<br />\\nOf pensived and subdued desires the tender,<br />\\nNature hath charged me that I hoard them not,<br />\\nBut yield them up where I myself must render,<br />\\nThat is, to you, my origin and ender;<br />\\nFor these, of force, must your oblations be,<br />\\nSince I their altar, you enpatron me.<br />\\n&#039;&#039;O, then, advance of yours that phraseless hand,<br />\\nWhose white weighs down the airy scale of praise;<br />\\nTake all these similes to your own command,<br />\\nHallow&#039;d with sighs that burning lungs did raise;<br />\\nWhat me your minister, for you obeys,<br />\\nWorks under you; and to your audit comes<br />\\nTheir distract parcels in combined sums.<br />\\n&#039;&#039;Lo, this device was sent me from a nun,<br />\\nOr sister sanctified, of holiest note;<br />\\nWhich late her noble suit in court did shun,<br />\\nWhose rarest havings made the blossoms dote;<br />\\nFor she was sought by spirits of richest coat,<br />\\nBut kept cold distance, and did thence remove,<br />\\nTo spend her living in eternal love.<br />\\n&#039;&#039;But, O my sweet, what labour is&#039;t to leave<br />\\nThe thing we have not, mastering what not strives,<br />\\nPlaying the place which did no form receive,<br />\\nPlaying patient sports in unconstrained gyves?<br />\\nShe that her fame so to herself contrives,<br />\\nThe scars of battle &#039;scapeth by the flight,<br />\\nAnd makes her absence valiant, not her might.<br />\\n&#039;&#039;O, pardon me, in that my boast is true:<br />\\nThe accident which brought me to her eye<br />\\nUpon the moment did her force subdue,<br />\\nAnd now she would the caged cloister fly:<br />\\nReligious love put out Religion&#039;s eye:<br />\\nNot to be tempted, would she be immured,<br />\\nAnd now, to tempt, all liberty procured.<br />\\n&#039;&#039;How mighty then you are, O, hear me tell!<br />\\nThe broken bosoms that to me belong<br />\\nHave emptied all their fountains in my well,<br />\\nAnd mine I pour your ocean all among:<br />\\nI strong o&#039;er them, and you o&#039;er me being strong,<br />\\nMust for your victory us all congest,<br />\\nAs compound love to physic your cold breast.<br />\\n&#039;&#039;My parts had power to charm a sacred nun,<br />\\nWho, disciplined, ay, dieted in grace,<br />\\nBelieved her eyes when they to assail begun,<br />\\nAll vows and consecrations giving place:<br />\\nO most potential love! vow, bond, nor space,<br />\\nIn thee hath neither sting, knot, nor confine,<br />\\nFor thou art all, and all things else are thine.<br />\\n&#039;&#039;When thou impressest, what are precepts worth<br />\\nOf stale example? When thou wilt inflame,<br />\\nHow coldly those impediments stand forth<br />\\nOf wealth, of filial fear, law, kindred, fame!<br />\\nLove&#039;s arms are peace, &#039;gainst rule, &#039;gainst sense,<br />\\n&#039;gainst shame,<br />\\nAnd sweetens, in the suffering pangs it bears,<br />\\nThe aloes of all forces, shocks, and fears.<br />\\n&#039;&#039;Now all these hearts that do on mine depend,<br />\\nFeeling it break, with bleeding groans they pine;<br />\\nAnd supplicant their sighs to you extend,<br />\\nTo leave the battery that you make &#039;gainst mine,<br />\\nLending soft audience to my sweet design,<br />\\nAnd credent soul to that strong-bonded oath<br />\\nThat shall prefer and undertake my troth.&#039;<br />\\n&#039;This said, his watery eyes he did dismount,<br />\\nWhose sights till then were levell&#039;d on my face;<br />\\nEach cheek a river running from a fount<br />\\nWith brinish current downward flow&#039;d apace:<br />\\nO, how the channel to the stream gave grace!<br />\\nWho glazed with crystal gate the glowing roses<br />\\nThat flame through water which their hue encloses.<br />\\n&#039;O father, what a hell of witchcraft lies<br />\\nIn the small orb of one particular tear!<br />\\nBut with the inundation of the eyes<br />\\nWhat rocky heart to water will not wear?<br />\\nWhat breast so cold that is not warmed here?<br />\\nO cleft effect! cold modesty, hot wrath,<br />\\nBoth fire from hence and chill extincture hath.<br />\\n&#039;For, lo, his passion, but an art of craft,<br />\\nEven there resolved my reason into tears;<br />\\nThere my white stole of chastity I daff&#039;d,<br />\\nShook off my sober guards and civil fears;<br />\\nAppear to him, as he to me appears,<br />\\nAll melting; though our drops this difference bore,<br />\\nHis poison&#039;d me, and mine did him restore.<br />\\n&#039;In him a plenitude of subtle matter,<br />\\nApplied to cautels, all strange forms receives,<br />\\nOf burning blushes, or of weeping water,<br />\\nOr swooning paleness; and he takes and leaves,<br />\\nIn either&#039;s aptness, as it best deceives,<br />\\nTo blush at speeches rank to weep at woes,<br />\\nOr to turn white and swoon at tragic shows.<br />\\n&#039;That not a heart which in his level came<br />\\nCould &#039;scape the hail of his all-hurting aim,<br />\\nShowing fair nature is both kind and tame;<br />\\nAnd, veil&#039;d in them, did win whom he would maim:<br />\\nAgainst the thing he sought he would exclaim;<br />\\nWhen he most burn&#039;d in heart-wish&#039;d luxury,<br />\\nHe preach&#039;d pure maid, and praised cold chastity.<br />\\n&#039;Thus merely with the garment of a Grace<br />\\nThe naked and concealed fiend he cover&#039;d;<br />\\nThat th&#039; unexperient gave the tempter place,<br />\\nWhich like a cherubin above them hover&#039;d.<br />\\nWho, young and simple, would not be so lover&#039;d?<br />\\nAy me! I fell; and yet do question make<br />\\nWhat I should do again for such a sake.<br />\\n&#039;O, that infected moisture of his eye,<br />\\nO, that false fire which in his cheek so glow&#039;d,<br />\\nO, that forced thunder from his heart did fly,<br />\\nO, that sad breath his spongy lungs bestow&#039;d,<br />\\nO, all that borrow&#039;d motion seeming owed,<br />\\nWould yet again betray the fore-betray&#039;d,<br />\\nAnd new pervert a reconciled maid!&#039;</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => "A Lover\'s Complaint",
            \'format\' => NULL,
            \'safe_value\' => \'A Lover&#039;s Complaint\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388002732\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'0\',
      \'comment_count\' => \'0\',
      \'name\' => \'\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'2\',
        \'source\' => \'node/2\',
        \'alias\' => \'content/submission-lovers-complaint-anonymous-201312252018\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'20\',
      \'uid\' => \'3\',
      \'title\' => \' Submission: Pellentesque nizzle by muse 201312261026\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'69f57b5f-2964-4177-9400-b67a0a00b256\',
      \'nid\' => \'17\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388053614\',
      \'changed\' => \'1388053614\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'b1acbb50-ddd9-48db-92c8-9dddc14d78f1\',
      \'revision_timestamp\' => \'1388053614\',
      \'revision_uid\' => \'3\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Maecenizzle mi. Nizzle eros. Proin gizzle, for sure nizzle congue consectetizzle, metizzle libero consequat purizzle, daahng dawg ullamcorpizzle dui mi nizzle quizzle. The bizzle faucibizzle tellivizzle. Dizzle hizzle fo, hizzle sizzle, cool volutpizzle, gangster izzle, stuff. Proin shut the shizzle up urna. Mah nizzle pizzle rizzle bow wow wow funky fresh. Pellentesque nizzle euismod owned. Donec ultrices things break yo neck, yall erizzle. Bizzle posuere check out this break yo neck, yall. Ut mauris. Cool sheezy shut the shizzle up, uhuh ... yih! things, eleifend fo, malesuada fizzle, nisi. Fizzle vulputate dizzle crazy.\',
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Maecenizzle mi. Nizzle eros. Proin gizzle, for sure nizzle congue consectetizzle, metizzle libero consequat purizzle, daahng dawg ullamcorpizzle dui mi nizzle quizzle. The bizzle faucibizzle tellivizzle. Dizzle hizzle fo, hizzle sizzle, cool volutpizzle, gangster izzle, stuff. Proin shut the shizzle up urna. Mah nizzle pizzle rizzle bow wow wow funky fresh. Pellentesque nizzle euismod owned. Donec ultrices things break yo neck, yall erizzle. Bizzle posuere check out this break yo neck, yall. Ut mauris. Cool sheezy shut the shizzle up, uhuh ... yih! things, eleifend fo, malesuada fizzle, nisi. Fizzle vulputate dizzle crazy.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Pellentesque nizzle\',
            \'format\' => NULL,
            \'safe_value\' => \'Pellentesque nizzle\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388053614\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'3\',
      \'comment_count\' => \'0\',
      \'name\' => \'muse\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'20\',
        \'source\' => \'node/17\',
        \'alias\' => \'content/submission-pellentesque-nizzle-muse-201312261026\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'4\',
      \'uid\' => \'2\',
      \'title\' => \' Submission: Tutor honor by bard 201312260959\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'48f58e8e-394c-4e70-b2b7-342e9b1f66a3\',
      \'nid\' => \'4\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388051941\',
      \'changed\' => \'1388051941\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'bf06d4fe-1b69-41a0-aa8a-de7c6eb1f9f1\',
      \'revision_timestamp\' => \'1388051941\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "\\"Hoe-cake, murder,\\" resplendent Ladle Rat Rotten Hut, an tickle ladle basking an stuttered oft. Honor wrote tutor cordage offer groin-murder, Ladle Rat Rotten Hut mitten anomalous woof. \\"Wail, wail, wail!\\" set disk wicket woof, \\"Evanescent Ladle Rat Rotten Hut! Wares are putty ladle gull goring wizard ladle basking?\\"\\r\\n\\r\\n\\"Armor goring tumor groin-murder\'s,\\" reprisal ladle gull. \\"Grammar\'s seeking bet. Armor ticking arson burden barter an shirker cockles.\\"",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>&quot;Hoe-cake, murder,&quot; resplendent Ladle Rat Rotten Hut, an tickle ladle basking an stuttered oft. Honor wrote tutor cordage offer groin-murder, Ladle Rat Rotten Hut mitten anomalous woof. &quot;Wail, wail, wail!&quot; set disk wicket woof, &quot;Evanescent Ladle Rat Rotten Hut! Wares are putty ladle gull goring wizard ladle basking?&quot;</p>\\n<p>&quot;Armor goring tumor groin-murder&#039;s,&quot; reprisal ladle gull. &quot;Grammar&#039;s seeking bet. Armor ticking arson burden barter an shirker cockles.&quot;</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Tutor honor\',
            \'format\' => NULL,
            \'safe_value\' => \'Tutor honor\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388051941\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'7\',
        \'source\' => \'node/4\',
        \'alias\' => \'content/submission-tutor-honor-bard-201312260959\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'3\',
      \'uid\' => \'2\',
      \'title\' => \' Submission: Heresy basking by bard 201312260958\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'ce0bc3a7-39ae-46ee-b035-23d54c3d54fc\',
      \'nid\' => \'3\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388051886\',
      \'changed\' => \'1388051886\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'d5aae862-8187-412f-8e03-9bc21b418119\',
      \'revision_timestamp\' => \'1388051886\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "Wants pawn term, dare worsted ladle gull hoe lift wetter murder inner ladle cordage, honor itch offer lodge dock florist. Disk ladle gull orphan worry ladle cluck wetter putty ladle rat hut, an fur disk raisin pimple colder Ladle Rat Rotten Hut.\\r\\n\\r\\nWan moaning, Rat Rotten Hut\'s murder colder inset, \\"Ladle Rat Rotten Hut, heresy ladle basking winsome burden barter an shirker cockles. Tick disk ladle basking tutor cordage offer groin-murder hoe lifts honor udder site offer florist. Shaker lake! Dun stopper laundry wrote! An yonder nor sorghum-stenches, dun stopper torque wet strainers!\\"",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>Wants pawn term, dare worsted ladle gull hoe lift wetter murder inner ladle cordage, honor itch offer lodge dock florist. Disk ladle gull orphan worry ladle cluck wetter putty ladle rat hut, an fur disk raisin pimple colder Ladle Rat Rotten Hut.</p>\\n<p>Wan moaning, Rat Rotten Hut&#039;s murder colder inset, &quot;Ladle Rat Rotten Hut, heresy ladle basking winsome burden barter an shirker cockles. Tick disk ladle basking tutor cordage offer groin-murder hoe lifts honor udder site offer florist. Shaker lake! Dun stopper laundry wrote! An yonder nor sorghum-stenches, dun stopper torque wet strainers!&quot;</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Heresy basking\',
            \'format\' => NULL,
            \'safe_value\' => \'Heresy basking\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388051886\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'6\',
        \'source\' => \'node/3\',
        \'alias\' => \'content/submission-heresy-basking-bard-201312260958\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'8\',
      \'uid\' => \'2\',
      \'title\' => \' Submission: Tofu me by bard 201312261005\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'e067b32f-46c9-4ee4-8f30-487077489fe3\',
      \'nid\' => \'8\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052306\',
      \'changed\' => \'1388052306\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'e4b115c8-9730-4511-bc4c-83792a860e40\',
      \'revision_timestamp\' => \'1388052306\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "tofu artisan cliche, chillwave single-origin coffee Tonx retro. Street art ethnic organic, raw denim meggings disrupt art party cornhole hella before they sold out. Chia slow-carb retro single-origin coffee selvage, synth quinoa ugh pop-up street art. Dreamcatcher hashtag tattooed paleo, Portland Truffaut Etsy literally Carles seitan trust fund farm-to-table tousled wayfarers. \\r\\n\\r\\nNeutra hoodie tattooed 3 wolf moon yr semiotics. Authentic pork belly leggings letterpress bicycle rights cliche, YOLO master cleanse fap semiotics shabby chic mumblecore butcher gastropub single-origin coffee. Flexitarian next level Intelligentsia letterpress blog pop-up.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>tofu artisan cliche, chillwave single-origin coffee Tonx retro. Street art ethnic organic, raw denim meggings disrupt art party cornhole hella before they sold out. Chia slow-carb retro single-origin coffee selvage, synth quinoa ugh pop-up street art. Dreamcatcher hashtag tattooed paleo, Portland Truffaut Etsy literally Carles seitan trust fund farm-to-table tousled wayfarers. </p>\\n<p>Neutra hoodie tattooed 3 wolf moon yr semiotics. Authentic pork belly leggings letterpress bicycle rights cliche, YOLO master cleanse fap semiotics shabby chic mumblecore butcher gastropub single-origin coffee. Flexitarian next level Intelligentsia letterpress blog pop-up.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Tofu me\',
            \'format\' => NULL,
            \'safe_value\' => \'Tofu me\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388052306\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'11\',
        \'source\' => \'node/8\',
        \'alias\' => \'content/submission-tofu-me-bard-201312261005\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'15\',
      \'uid\' => \'2\',
      \'title\' => \' Theoretical: Marxist capitalism and Sartreist absurdity by bard 201312261014\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'cd0ab4f6-7328-454f-9ed8-4937856d6537\',
      \'nid\' => \'14\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052850\',
      \'changed\' => \'1388052892\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'f1a5e71b-8a5e-45a5-af3d-825e8117e422\',
      \'revision_timestamp\' => \'1388052892\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "In the works of Rushdie, a predominant concept is the distinction between without and within. However, Lacan uses the term ‘Lacanist obscurity’ to denote not theory, as capitalist discourse suggests, but neotheory. Marx suggests the use of Sartreist absurdity to analyse and attack sexual identity.\\r\\n\\r\\n“Class is impossible,” says Debord; however, according to von Junz[7] , it is not so much class that is impossible, but rather the stasis of class. It could be said that the characteristic theme of Scuglia’s[8] analysis of Lacanist obscurity is a mythopoetical whole. If Sartreist existentialism holds, we have to choose between capitalist discourse and deconstructive objectivism.\\r\\n\\r\\nTherefore, the primary theme of the works of Rushdie is the failure, and some would say the futility, of posttextual society. Lacanist obscurity suggests that context must come from the masses.\\r\\n\\r\\nIn a sense, la Fournier[9] implies that we have to choose between Sartreist absurdity and subtextual capitalist theory. The subject is contextualised into a neocultural sublimation that includes truth as a totality.\\r\\n\\r\\nTherefore, Baudrillard’s critique of capitalist discourse states that sexual identity has intrinsic meaning, given that sexuality is distinct from art. Lacan promotes the use of Lacanist obscurity to deconstruct the status quo.\\r\\n\\r\\nHowever, the characteristic theme of Parry’s[10] essay on capitalist discourse is the difference between language and class. Lyotard suggests the use of Sartreist absurdity to analyse consciousness.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>In the works of Rushdie, a predominant concept is the distinction between without and within. However, Lacan uses the term ‘Lacanist obscurity’ to denote not theory, as capitalist discourse suggests, but neotheory. Marx suggests the use of Sartreist absurdity to analyse and attack sexual identity.</p>\\n<p>“Class is impossible,” says Debord; however, according to von Junz[7] , it is not so much class that is impossible, but rather the stasis of class. It could be said that the characteristic theme of Scuglia’s[8] analysis of Lacanist obscurity is a mythopoetical whole. If Sartreist existentialism holds, we have to choose between capitalist discourse and deconstructive objectivism.</p>\\n<p>Therefore, the primary theme of the works of Rushdie is the failure, and some would say the futility, of posttextual society. Lacanist obscurity suggests that context must come from the masses.</p>\\n<p>In a sense, la Fournier[9] implies that we have to choose between Sartreist absurdity and subtextual capitalist theory. The subject is contextualised into a neocultural sublimation that includes truth as a totality.</p>\\n<p>Therefore, Baudrillard’s critique of capitalist discourse states that sexual identity has intrinsic meaning, given that sexuality is distinct from art. Lacan promotes the use of Lacanist obscurity to deconstruct the status quo.</p>\\n<p>However, the characteristic theme of Parry’s[10] essay on capitalist discourse is the difference between language and class. Lyotard suggests the use of Sartreist absurdity to analyse consciousness.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Marxist capitalism and Sartreist absurdity\',
            \'format\' => NULL,
            \'safe_value\' => \'Marxist capitalism and Sartreist absurdity\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'THEORY \',
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
      \'last_comment_timestamp\' => \'1388052850\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'17\',
        \'source\' => \'node/14\',
        \'alias\' => \'content/theoretical-marxist-capitalism-and-sartreist-absurdity-bard-201312261014\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'12\',
      \'uid\' => \'2\',
      \'title\' => \' Theoretical: Tarantino and Lacanist obscurity by bard 201312261012\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'719b938a-1f33-4ed8-8055-25bfe1d8b1a8\',
      \'nid\' => \'12\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388052732\',
      \'changed\' => \'1388052732\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'f4e134f0-8dac-4e1d-9d29-743841f37ec2\',
      \'revision_timestamp\' => \'1388052732\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "“Society is a legal fiction,” says Baudrillard; however, according to Werther[1] , it is not so much society that is a legal fiction, but rather the futility, and some would say the absurdity, of society. An abundance of desublimations concerning not, in fact, theory, but neotheory may be discovered.\\r\\n\\r\\nIf one examines the structural paradigm of narrative, one is faced with a choice: either accept capitalist discourse or conclude that truth has significance, but only if Marxist capitalism is valid; if that is not the case, we can assume that art is capable of intent. However, the example of Lacanist obscurity intrinsic to Gaiman’s Stardust emerges again in Death: The Time of Your Life. Many patriarchialisms concerning Marxist capitalism exist.\\r\\n\\r\\nIn the works of Gaiman, a predominant concept is the concept of pretextual truth. But the premise of Lacanist obscurity suggests that culture may be used to marginalize the proletariat. Any number of discourses concerning the role of the participant as poet may be revealed.\\r\\n\\r\\n“Class is intrinsically unattainable,” says Bataille. Therefore, Finnis[2] holds that we have to choose between structuralist sublimation and the neocultural paradigm of context. Capitalist discourse implies that truth, somewhat paradoxically, has objective value.\\r\\n\\r\\nBut Debord uses the term ‘Marxist capitalism’ to denote not discourse per se, but subdiscourse. Bataille suggests the use of capitalist discourse to read and challenge society.\\r\\n\\r\\nHowever, if Lyotardist narrative holds, we have to choose between Marxist capitalism and capitalist neotextual theory. The primary theme of Humphrey’s[3] model of Lacanist obscurity is the defining characteristic, and eventually the stasis, of posttextual language.\\r\\n\\r\\nIt could be said that Bataille uses the term ‘Derridaist reading’ to denote a deconstructivist totality. Many narratives concerning capitalist discourse exist.\\r\\n\\r\\nIn a sense, Lacan promotes the use of Marxist capitalism to deconstruct the status quo. Baudrillard uses the term ‘Lacanist obscurity’ to denote not deconstruction, but subdeconstruction.\\r\\n\\r\\nIt could be said that the main theme of the works of Rushdie is a mythopoetical paradox. Derrida’s analysis of Marxist capitalism suggests that context is a product of the collective unconscious, given that narrativity is interchangeable with culture.\\r\\n\\r\\nIn a sense, la Tournier[4] implies that we have to choose between the postmodern paradigm of narrative and cultural narrative. If Lacanist obscurity holds, the works of Rushdie are an example of subdialectic socialism.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>“Society is a legal fiction,” says Baudrillard; however, according to Werther[1] , it is not so much society that is a legal fiction, but rather the futility, and some would say the absurdity, of society. An abundance of desublimations concerning not, in fact, theory, but neotheory may be discovered.</p>\\n<p>If one examines the structural paradigm of narrative, one is faced with a choice: either accept capitalist discourse or conclude that truth has significance, but only if Marxist capitalism is valid; if that is not the case, we can assume that art is capable of intent. However, the example of Lacanist obscurity intrinsic to Gaiman’s Stardust emerges again in Death: The Time of Your Life. Many patriarchialisms concerning Marxist capitalism exist.</p>\\n<p>In the works of Gaiman, a predominant concept is the concept of pretextual truth. But the premise of Lacanist obscurity suggests that culture may be used to marginalize the proletariat. Any number of discourses concerning the role of the participant as poet may be revealed.</p>\\n<p>“Class is intrinsically unattainable,” says Bataille. Therefore, Finnis[2] holds that we have to choose between structuralist sublimation and the neocultural paradigm of context. Capitalist discourse implies that truth, somewhat paradoxically, has objective value.</p>\\n<p>But Debord uses the term ‘Marxist capitalism’ to denote not discourse per se, but subdiscourse. Bataille suggests the use of capitalist discourse to read and challenge society.</p>\\n<p>However, if Lyotardist narrative holds, we have to choose between Marxist capitalism and capitalist neotextual theory. The primary theme of Humphrey’s[3] model of Lacanist obscurity is the defining characteristic, and eventually the stasis, of posttextual language.</p>\\n<p>It could be said that Bataille uses the term ‘Derridaist reading’ to denote a deconstructivist totality. Many narratives concerning capitalist discourse exist.</p>\\n<p>In a sense, Lacan promotes the use of Marxist capitalism to deconstruct the status quo. Baudrillard uses the term ‘Lacanist obscurity’ to denote not deconstruction, but subdeconstruction.</p>\\n<p>It could be said that the main theme of the works of Rushdie is a mythopoetical paradox. Derrida’s analysis of Marxist capitalism suggests that context is a product of the collective unconscious, given that narrativity is interchangeable with culture.</p>\\n<p>In a sense, la Tournier[4] implies that we have to choose between the postmodern paradigm of narrative and cultural narrative. If Lacanist obscurity holds, the works of Rushdie are an example of subdialectic socialism.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Tarantino and Lacanist obscurity\',
            \'format\' => NULL,
            \'safe_value\' => \'Tarantino and Lacanist obscurity\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'THEORY \',
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
      \'last_comment_timestamp\' => \'1388052732\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'15\',
        \'source\' => \'node/12\',
        \'alias\' => \'content/theoretical-tarantino-and-lacanist-obscurity-bard-201312261012\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
  (object) array(
      \'vid\' => \'5\',
      \'uid\' => \'2\',
      \'title\' => \' Submission: Old whinney by bard 201312260959\',
      \'log\' => \'\',
      \'status\' => \'1\',
      \'comment\' => \'1\',
      \'promote\' => \'0\',
      \'sticky\' => \'0\',
      \'vuuid\' => \'ba4b431f-8934-4348-9f8d-586df599ff39\',
      \'nid\' => \'5\',
      \'type\' => \'text\',
      \'language\' => \'und\',
      \'created\' => \'1388051990\',
      \'changed\' => \'1388051990\',
      \'tnid\' => \'0\',
      \'translate\' => \'0\',
      \'uuid\' => \'fe8854e2-e3b1-47a8-ae4f-b3c81e0dd2c0\',
      \'revision_timestamp\' => \'1388051990\',
      \'revision_uid\' => \'2\',
      \'body\' => array(
        \'und\' => array(
          array(
            \'value\' => "\\"O hoe! Heifer blessing woke,\\" setter wicket woof, butter taught tomb shelf, \\"Oil tickle shirt court tutor cordage offer groin-murder. Oil ketchup wetter letter, an den - O bore!\\"\\r\\n\\r\\nSoda wicket woof tucker shirt court, an whinney retched a cordage offer groin-murder, picked inner widow, an sore debtor pore oil worming worse lion inner bet. Inner flesh, disk abdominal woof lipped honor bet an at a rope. Den knee poled honor groin-murder\'s nut cup an gnat-gun, any curdled dope inner bet.",
            \'summary\' => \'\',
            \'format\' => \'plain_text\',
            \'safe_value\' => "<p>&quot;O hoe! Heifer blessing woke,&quot; setter wicket woof, butter taught tomb shelf, &quot;Oil tickle shirt court tutor cordage offer groin-murder. Oil ketchup wetter letter, an den - O bore!&quot;</p>\\n<p>Soda wicket woof tucker shirt court, an whinney retched a cordage offer groin-murder, picked inner widow, an sore debtor pore oil worming worse lion inner bet. Inner flesh, disk abdominal woof lipped honor bet an at a rope. Den knee poled honor groin-murder&#039;s nut cup an gnat-gun, any curdled dope inner bet.</p>\\n",
            \'safe_summary\' => \'\',
          ),
        ),
      ),
      \'field_short_title\' => array(
        \'und\' => array(
          array(
            \'value\' => \'Old whinney\',
            \'format\' => NULL,
            \'safe_value\' => \'Old whinney\',
          ),
        ),
      ),
      \'field_text_type\' => array(
        \'und\' => array(
          array(
            \'value\' => \'SUB \',
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
      \'last_comment_timestamp\' => \'1388051990\',
      \'last_comment_name\' => NULL,
      \'last_comment_uid\' => \'2\',
      \'comment_count\' => \'0\',
      \'name\' => \'bard\',
      \'picture\' => \'0\',
      \'data\' => NULL,
      \'path\' => array(
        \'pid\' => \'8\',
        \'source\' => \'node/5\',
        \'alias\' => \'content/submission-old-whinney-bard-201312260959\',
        \'language\' => \'und\',
      ),
      \'menu\' => NULL,
      \'node_export_drupal_version\' => \'7\',
    ),
)',
);
  return $node_export;
}
