<?php
    /*
     *  Plugin Name: Instagram Import
    *   Plugin URI: http://mlitzinger.com
    *   Description: Import Instagram photos as posts to your WordPress site
    *   Version: 1.0
    *   Author: Tom Conte
    *   Author URI: http://www.cometton.com
    *   License: GPL2
     *
    */

//function custom_posts_from_instagram() {

    $access_token = '3258344245.0546445.fe333789a40848f8bb0bf3616edf1b0e';
    $user_id = '3258344245';

    // Get photos from Instagram
    $url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?access_token='.$access_token; 
    $args = stream_context_create(array('http'=>
        array(
            'timeout' => 2500,
        )
    ));

    $json_feed = file_get_contents( $url, false, $args );
    $json_feed = json_decode( $json_feed );

    //echo '<pre>';
    //print_r($json_feed);

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

            insta_import_image($post->images->standard_resolution->url, $new_post);

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

    function insta_import_image( $image_url, $post_id  ){
       // Set variables for storage, fix file filename for query strings.
        preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $image_url, $matches );
        if ( ! $matches ) {
             return new WP_Error( 'image_sideload_failed', __( 'Invalid image URL' ) );
        }

        $file_array = array();
        $file_array['name'] = basename( $matches[0] );

        // Download file to temp location.
        $file_array['tmp_name'] = download_url( $image_url );

        // If error storing temporarily, return the error.
        if ( is_wp_error( $file_array['tmp_name'] ) ) {
            return $file_array['tmp_name'];
        }

        // Do the validation and storage stuff.
        $id = media_handle_sideload( $file_array, $post_id );

        // If error storing permanently, unlink.
        if ( is_wp_error( $id ) ) {
            @unlink( $file_array['tmp_name'] );
            return $id;
        }

        return set_post_thumbnail( $post_id, $id );
    }

//}

//add_action( 'instagram_auto_fetch', 'custom_posts_from_instagram' );

/*
if ( ! wp_next_scheduled( 'instagram_auto_fetch' ) ) {
    wp_schedule_event( time(), 'daily', 'instagram_auto_fetch');
}
*/