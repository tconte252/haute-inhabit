<?php

add_shortcode( 'galleryimage', 'gi_display_gallery');

function gi_display_gallery( $atts ) {
	extract( shortcode_atts( array('id' => 'player1'), $atts ) );	
		
	//find the related image gallery and display it
	global $wpdb;
	$table_name=$wpdb->prefix."gallery_image_table";
	$result = $wpdb->get_row("SELECT * FROM $table_name WHERE id='$id'", ARRAY_A);		
	
	//front end container	
	$res.='<div style="width: '.get_option('gallery_image_images_width').'px; margin: '.get_option('gallery_image_vertical_margin').'px 0" class="gi-gallery-image-front-end-container" >';
	
	//main image	
	$res.='<img style="width: '.get_option('gallery_image_images_width').'px;" id="gi-front-image-'.$result['id'].'" class="gi-front-image" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_1'].'">';
	
	//thumb container
	$res.='<div style="width: '.(get_option('gallery_image_images_width')-40).'px;" class="gi-front-thumb-container" id="00000000000000'.$result['id'].'" >';
	
	//thumb images
	if(strlen($result['image_url_1'])>0){$res.='<img class="selected gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_1'].'" alt="'.$result['image_alt_1'].'" >';}
	if(strlen($result['image_url_2'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_2'].'" alt="'.$result['image_alt_2'].'" >';}
	if(strlen($result['image_url_3'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_3'].'" alt="'.$result['image_alt_3'].'" >';}
	if(strlen($result['image_url_4'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_4'].'" alt="'.$result['image_alt_4'].'" >';}
	if(strlen($result['image_url_5'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_5'].'" alt="'.$result['image_alt_5'].'" >';}
	if(strlen($result['image_url_6'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_6'].'" alt="'.$result['image_alt_6'].'" >';}
	if(strlen($result['image_url_7'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_7'].'" alt="'.$result['image_alt_7'].'" >';}
	if(strlen($result['image_url_8'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_8'].'" alt="'.$result['image_alt_8'].'" >';}
	if(strlen($result['image_url_9'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_9'].'" alt="'.$result['image_alt_9'].'" >';}
	if(strlen($result['image_url_10'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_10'].'" alt="'.$result['image_alt_10'].'" >';}
	if(strlen($result['image_url_11'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_11'].'" alt="'.$result['image_alt_11'].'" >';}
	if(strlen($result['image_url_12'])>0){$res.='<img class="gi-front-image-thumb gi-front-image-thumb-'.$result['id'].'" src="'.WP_PLUGIN_URL.'/gallery-image/upload/'.$result['image_url_12'].'" alt="'.$result['image_alt_12'].'" >';}
	
	//end thumb container
	$res.='</div>';
	
	//author link
	if(get_option('gallery_image_author_link')=="1"){$res.='<div id="gi-author-link"><a href="http://www.danycode.com/gallery-image" title="Image Gallery for Wordpress" >Gallery Image</a></div>';}
	
	//end front end container
	$res.='</div>';
	
	return $res;
}

?>
