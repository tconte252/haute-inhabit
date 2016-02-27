<?php
/*
Plugin Name: Gallery Image
Plugin URI: http://www.danycode.com/gallery-image/
Description: Create unlimited images galleries
Version: 1.17
Author: Danilo Andreini
Author URI: http://www.danycode.com
License: GPLv2 or later
*/

/*  Copyright 2012  Danilo Andreini (email : andreini.danilo@gmail.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

//embedding external files
require_once('includes/activation.php');//create the table
require_once('includes/head.php');//add head
require_once('includes/credits.php');//credits function
require_once('includes/shortcode.php');//add shortcode to display the gallery

require_once('includes/menu_gallery_image.php');//menu manage gallery
require_once('includes/menu_gallery_add.php');//menu add gallery
require_once('includes/menu_options.php');//menu options
require_once('includes/menu_tutorial.php');//menu tutorial page

//options initialization
if(strlen(get_option('gallery_image_images_width'))==0){update_option('gallery_image_images_width',"630");}
if(strlen(get_option('gallery_image_vertical_margin'))==0){update_option('gallery_image_vertical_margin',"10");}
if(strlen(get_option('gallery_image_author_link'))==0){update_option('gallery_image_author_link',"0");}

//create the mail list menu
add_action( 'admin_menu', 'gallery_image_wp_menu' );
function gallery_image_wp_menu() {
	$form_name='Gallery Image';
	add_menu_page($form_name, $form_name, 'manage_options', 'mlmenu','gallery_image_menu',plugins_url().'/gallery-image/img/icon16.png');
	add_submenu_page('mlmenu', $form_name.' - Manage Galleries', 'Manage Galleries', 'manage_options', 'mlmenu', 'gallery_image_menu');
	add_submenu_page('mlmenu', $form_name.' - Add Gallery', 'Add Gallery', 'manage_options', 'gallery_image_add', 'gallery_image_add');
	add_submenu_page('mlmenu', $form_name.' - Options', 'Options', 'manage_options', 'gi_menu_options', 'gi_menu_options');
		add_submenu_page('mlmenu', $form_name.' - Tutorial', 'Tutorial', 'manage_options', 'gi_menu_tutorial', 'gi_menu_tutorial');
}

//delete database and options when the plugin is uninstalled
register_uninstall_hook( __FILE__, 'mail_list_uninstall' );
function mail_list_uninstall(){

	//deleting table
	global $wpdb;$table_name=$wpdb->prefix . "gallery_image_table";
	$sql = "DROP TABLE $table_name";
	mysql_query($sql);
	
	//deleting table
	global $wpdb;$table_name=$wpdb->prefix . "gallery_image_temp_table";
	$sql = "DROP TABLE $table_name";
	mysql_query($sql);
	
	//deleting options
	delete_option('gallery_image_images_width');
	delete_option('gallery_image_vertical_margin');
	delete_option('gallery_image_author_link');
	
}

?>
