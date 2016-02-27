<?php

//hooks
add_action('wp_head','gi_head_embed');
add_action('admin_head','gi_admin_head');
add_action('wp_enqueue_scripts','gi_add_scripts');

//add scripts in the head
function gi_add_scripts(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('galleryimagefunctions',WP_PLUGIN_URL.'/gallery-image/js/functions.js');
}

//writing in frontend head
function gi_head_embed()
{
	
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.WP_PLUGIN_URL.'/gallery-image/css/style.css" />';

}

//writing in backend head
function gi_admin_head()
{
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.WP_PLUGIN_URL.'/gallery-image/css/style.css" />';	
	
}

?>
