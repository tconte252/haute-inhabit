<?php
/**
 * Plugin Name: Insta WP
 * Plugin URI: https://github.com/tconte252
 * Description: Tools for working with the WordPress media library and converting images to attachments and featured images
 * Version: 1.0
 * Author: Tom Conte
 * Author URI: http://www.cometton.com
 * License: GPL v2
 * 
 */

/*  Copyright 2016  Tom Conte  (email : toms@bigwrm.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 
$bigwrm_insta_wp = new BIGWRM_Insta_WP();
register_activation_hook( __FILE__, array( $bigwrm_insta_wp, 'activate' ) );


class BIGWRM_Insta_WP {

	var $media_settings;
	var $media_tools;
	static $regen;
	private $media_tabs_key = 'media_tabs';
	private static $thumbnail_support;
	private $media_tools_key = 'media_tools';
	//private $media_settings_key = 'media_options';
	private $media_settings_tabs = array();

	function __construct() {
		self::$thumbnail_support = current_theme_supports( 'post-thumbnails' ) ? true : add_theme_support( 'post-thumbnails' );
		//$this->add_image_sizes();
		$this->actions();
	}

	 /**
	  * Plugin Activation hook function to check for Minimum PHP and WordPress versions
	  * @param string $wp Minimum version of WordPress required for this plugin
	  * @param string $php Minimum version of PHP required for this plugin
	  */
	 function activate( $wp = '3.1', $php = '5.2.4' ) {
		global $wp_version;
		if ( version_compare( PHP_VERSION, $php, '<' ) )
			$flag = 'PHP';
		elseif
			( version_compare( $wp_version, $wp, '<' ) )
			$flag = 'WordPress';
		else
			return;
		$version = 'PHP' == $flag ? $php : $wp;
		deactivate_plugins( basename( __FILE__ ) );
		wp_die('<p>The <strong>Media Tools</strong> plugin requires'.$flag.'  version '.$version.' or greater.</p>','Plugin Activation Error',  array( 'response'=>200, 'back_link'=>TRUE ) );
	}

	function actions() {
		//add_action( 'admin_menu', array ( $this, 'admin_menu' ) );
		//add_action( 'init', array( $this, 'load_settings' ) );
		//add_action( 'admin_enqueue_scripts', array ( $this, 'media_tools_js' ) );
		//add_action( 'wp_ajax_convert-featured', array ( $this, 'ajax_handler' ) );
		//add_action( 'wp_ajax_process-data', array( $this, 'process_image' ) );
		//add_action( 'ap_ajax_ajax-done', array( $this, 'ajax_complete') );
		//add_action( 'admin_init', array( $this, 'register_media_options' ) );
		//add_action( 'admin_init', array ( $this, 'register_media_tools' ) );
		add_action( 'save_post', array ( $this, 'extract_multi' ) );
	}

	function extract_multi($post) {
		$html = $post->post_content;
		$path = wp_upload_dir();
		$path = $path['baseurl'];
		$error = 0;
		$response = '';
		if ( stripos( $html, '<img' ) !== false ) {

			$regex = '#<\s*img [^\>]*src\s*=\s*(["\'])(.*?)\1#im';
			preg_match_all( $regex, $html, $matches );

			if ( is_array( $matches ) && ! empty( $matches ) ) {
				$new = array();
				$old = array();
				foreach( $matches[2] as $img ) {
					/** Compare image source against upload directory to prevent adding same attachment multiple times  */

					if (  stripos( $img, $path ) !== false ) {
						$response .= 'Img already in media library<br>';
						continue;
					}

					$tmp = download_url( $img );

					preg_match('/[^\?]+\.(jpg|JPG|jpe|JPE|jpeg|JPEG|gif|GIF|png|PNG)/', $img, $matches);
					$file_array['name'] = basename($matches[0]);
					$file_array['tmp_name'] = $tmp;
					// If error storing temporarily, unlink
	                if ( is_wp_error( $tmp ) ) {
	                    @unlink($file_array['tmp_name']);
	                    $file_array['tmp_name'] = '';
		                continue;
	                }

					$id = media_handle_sideload( $file_array, $post->ID );

					if ( ! is_wp_error( $id ) ) {
  						$url  = wp_get_attachment_url( $id );
						$thumb = wp_get_attachment_thumb_url( $id );
						array_push( $new, $url );
						array_push( $old, $img );

						$response .= '<p><a href="'. wp_nonce_url( get_edit_post_link( $id, true ) ).'" title="edit-image"><img src="'.esc_url( $thumb ).'" style="max-width:100px;" /></a><br>';
						$response .= '<a href="'. wp_nonce_url( get_edit_post_link( $id, true ) ).'" >'.get_the_title( $id ). '</a>  Imported and attached</p>';
					} else {
						$response .= '<span style="color:red">Upload Error: Could not upload image. Check for malformed img src url</span><br>';
						$error ++;
					}
				}
				if( !empty( $new ) ) {
					$content = str_ireplace( $old, $new, $html );
					$post_args = array( 'ID' => $post->ID, 'post_content' => $content, );
					if ( !empty( $content ) )
						$post_id = wp_update_post( $post_args );
						if ( isset( $post_id ) )
							$response .= 'Post Content updated for Post: '.esc_html( $post->post_title).'<br>';
						return array( 'error' => $error, 'response' => $response );
				} else
					 $response .= 'No external images found for ' . esc_html( $post->post_title ) . '<br>';
					return array ( 'error' => $error, 'response' => $response );

			} else {
				 $response .= 'Error processing images for '. esc_html( $post->post_title ) .'<br>';
				return array ( 'error' => $error, 'response' => $response );
			  }
		} else {
			 $response .= 'No images found for ' . esc_html( $post->post_title) . '<br>';
			return array ( 'error' => $error, 'response' => $response );
		  }
	}

}