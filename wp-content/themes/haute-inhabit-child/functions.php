<?php

	function haute_inhabit_styles() {
	    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	}
	add_action( 'wp_enqueue_scripts', 'haute_inhabit_styles' );

	/*
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'haute-inhabit' ),
		'secondary' => esc_html__( 'Secondary', 'haute-inhabit' )
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Changes the text on the infinite scroll button.
	 */
	function filter_jetpack_infinite_scroll_js_settings( $settings ) {
		$settings['text'] = __( 'load more', 'l18n' );
		return $settings;
	}
	add_filter( 'infinite_scroll_js_settings', 'filter_jetpack_infinite_scroll_js_settings' );

	/*
	 * Register sidebars.
	 */
	function haute_inhabit_sidebars_init() {
		
		register_sidebar( array(
	    	'name' => __( 'Affiliate', 'haute-inhabit-child' ),
	        'id' => 'sidebar-2',
	        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
	        'before_widget' => '<aside id="%1$s" class="affiliate widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	    ) );

	    register_sidebar( array(
	    	'name' => __( 'Footer Subscribe', 'haute-inhabit-child' ),
	        'id' => 'sidebar-3',
	        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	    ) );

	    register_sidebar( array(
	    	'name' => __( 'Navigation Subscribe', 'haute-inhabit-child' ),
	        'id' => 'sidebar-4',
	        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' )
	    ) );
	}

	add_action( 'widgets_init', 'haute_inhabit_sidebars_init');

	function filter_ptags_on_images($content){

		$format = get_post_format();

		return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);

		return $content;
	}

	add_filter('the_content', 'filter_ptags_on_images');