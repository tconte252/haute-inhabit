<?php

//hook
register_activation_hook(WP_PLUGIN_DIR.'/gallery-image/main.php','gallery_image_create_table');

//create prefix+mail_list_table
function gallery_image_create_table(){
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	//create *prefix*_gallery_image_table
	global $wpdb;$table_name=$wpdb->prefix . "gallery_image_table";
	$sql = "CREATE TABLE $table_name (
	  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  name VARCHAR(255) DEFAULT '' NOT NULL,
	  image_url_1 TEXT DEFAULT '' NOT NULL,
	  image_url_2 TEXT DEFAULT '' NOT NULL,
	  image_url_3 TEXT DEFAULT '' NOT NULL,
	  image_url_4 TEXT DEFAULT '' NOT NULL,
	  image_url_5 TEXT DEFAULT '' NOT NULL,
	  image_url_6 TEXT DEFAULT '' NOT NULL,
	  image_url_7 TEXT DEFAULT '' NOT NULL,
	  image_url_8 TEXT DEFAULT '' NOT NULL,
	  image_url_9 TEXT DEFAULT '' NOT NULL,
	  image_url_10 TEXT DEFAULT '' NOT NULL,
	  image_url_11 TEXT DEFAULT '' NOT NULL,
	  image_url_12 TEXT DEFAULT '' NOT NULL,
	  image_alt_1 TEXT DEFAULT '' NOT NULL,
	  image_alt_2 TEXT DEFAULT '' NOT NULL,
	  image_alt_3 TEXT DEFAULT '' NOT NULL,
	  image_alt_4 TEXT DEFAULT '' NOT NULL,
	  image_alt_5 TEXT DEFAULT '' NOT NULL,
	  image_alt_6 TEXT DEFAULT '' NOT NULL,
	  image_alt_7 TEXT DEFAULT '' NOT NULL,
	  image_alt_8 TEXT DEFAULT '' NOT NULL,
	  image_alt_9 TEXT DEFAULT '' NOT NULL,
	  image_alt_10 TEXT DEFAULT '' NOT NULL,
	  image_alt_11 TEXT DEFAULT '' NOT NULL,
	  image_alt_12 TEXT DEFAULT '' NOT NULL
	)
	COLLATE = utf8_general_ci
	";
	
	dbDelta($sql);
	
	//create *prefix*_temporary_gallery_table
	global $wpdb;$table_name=$wpdb->prefix . "gallery_image_temp_table";
	$sql = "CREATE TABLE $table_name (
	  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  image_url TEXT DEFAULT '' NOT NULL
	)
	COLLATE = utf8_general_ci
	";
	
	dbDelta($sql);
	
}

?>
