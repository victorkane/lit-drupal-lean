<?php 

// Just do stuff :)
//$n = node_load(1);
//print $n->title . '\n';

// Let's get rid of the unsightly user login block
db_delete('block')->condition('module', 'user')->execute();

// Get difficult login link into user menu
$link = array(
		'link_title' => 'Log in',
		'link_path' => 'user/login',
		'menu_name' => 'user-menu',
		'weight' => 0,
		'expanded' => 0,
);

$item = array(
		'link_path' => $link['link_path'],
		'link_title' => $link['link_title'],
		'menu_name' => $link['menu_name'],
		'weight' => $link['weight'],
		'expanded' => $link['expanded'],
);

$exists = db_query("SELECT mlid from {menu_links} WHERE link_title=:link_title AND link_path=:link_path", array(':link_title' =>  $link['link_title'], ':link_path' => $link['link_path']))->fetchField();
// Save the record if the data does not exist
if(!$exists) {
	menu_link_save($item);
  menu_rebuild();
}

