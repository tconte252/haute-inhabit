<?php
    /*
     *  Plugin Name: Instagram Import
    *   Plugin URI: http://mlitzinger.com
    *   Description: Imports Instagram photos as posts to your WordPress site
    *   Version: 1.0
    *   Author: Matt Litzinger
    *   Author URI: http://mlitzinger.com
    *   License: GPL2
     *
    */

$access_token = '3258344245.0546445.fe333789a40848f8bb0bf3616edf1b0e';
$user_id = '3258344245';

// Get photos from Instagram
$url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?access_token='.$access_token; 
$args = stream_context_create(
    array('http'=>
        array(
            'timeout' => 2500,
        )
    )
);
$json_feed = file_get_contents( $url, false, $args );
$json_feed = json_decode( $json_feed );

//echo '<pre>';
//print_r($json_feed);

function insta_import_image( $image_url, $post_id  ){
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = basename($image_url);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
}

foreach ($json_feed->data as $post):
    if( !slug_exists($post->id) ) :
        $new_post = wp_insert_post( array(
            'post_content'  => '<a href="'. esc_url( $post->link ) .'" target="_blank"><img src="'. esc_url( $post->images->standard_resolution->url ) .'" alt="'. $post->caption->text .'" /></a>',
            'post_date'     => date("Y-m-d H:i:s", $post->created_time),
            'post_date_gmt' => date("Y-m-d H:i:s", $post->created_time),
            'post_status'   => 'publish',
            'post_title'    => $post->id,
            'post_name'     => $post->id,
            'post_category' => array(460)
        ), true );
    endif;
endforeach;

function slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A'))  :
        return true;
    else :
        return false;
    endif;
} 