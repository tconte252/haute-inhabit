<?php

	add_theme_support( 'post-thumbnails' );

function register_main_menus() {

   register_nav_menus(

      array(

         'primary-menu' => __( 'Primary Menu' ),
         'top-menu' => __( 'Top Menu' ),

         'footer1-menu' => __( 'Footer1 Menu' ),

		 'footer2-menu' => __( 'Footer2 Menu' ),

      )

   );

}

if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

function se_widgets_init() {


	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'serveroid' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


}
add_action( 'widgets_init', 'se_widgets_init' );




add_theme_support( 'custom-background', array(
	// Background color default
	'default-color' => '000',
	// Background image default
	'default-image' => get_template_directory_uri() . '/images/bg1.jpg'
) );



/**
 * Add our theme options page to the admin menu, including some help documentation.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Twenty Eleven 1.0
 */
function serveroid_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'serveroid' ),   // Name of page
		__( 'Theme Options', 'serveroid' ),   // Label in menu
		'edit_theme_options',                    // Capability required
		'theme_options',                         // Menu slug, used to uniquely identify the page
		'serveroid_theme_options_render_page' // Function that renders the options page
	);


}
add_action( 'admin_menu', 'serveroid_theme_options_add_page' );


function serveroid_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', 'serveroid' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="">

		<?php
        $page_id=get_option('home_page_id',1);
		if($_POST['page_id']){?>
		<p style="background:#3aa934;padding:5px 20px;width:200px;text-align:center;">Successfully Saved</p>
		<?php
		$page_id=get_option('home_page_id',1);

		if($page_id==1)
		  add_option( 'home_page_id', $_POST['page_id'], null, 'yes' );
		else
		  update_option( 'home_page_id', $_POST['page_id']);


		$page_id=$_POST['page_id'];
		?>

	<?php }?>



		<?php $pages=get_pages();?>

		 <label>Select Page For Home:</label>
         <select name="page_id">
         <?php

         if($pages)
         {

          foreach($pages as $page)

          {
         ?>
         <option value="<?php echo $page->ID?>" <?php if($page_id==$page->ID) echo 'selected="selected"';?>><?php echo $page->post_title;?></option>
         <?php }}?>
         </select>
			<?php
				settings_fields( 'serveroid_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

if ( ! function_exists( 'hautein_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function hautein_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $nav_id; ?>">
				<div class="nav-previous"><?php next_posts_link( __( ' Older posts  <span class="meta-nav">&rarr;</span>','hautein' )); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer posts', 'hautein' )); ?></div>
					<div class="mid-home"><a href="<?php bloginfo('url');?>">Home</a></div>


		</div><!-- #nav-above -->
	<?php endif;
}
endif; // twentyeleven_content_nav

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

function get_first_paragraph(){
	global $post;
	
	$str = wpautop( get_the_content() );
	$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
	$str = strip_tags($str, '<a><strong><em>');
 
	return '<p>' . $str . '</p>';
}


function php_execute($html){
if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text','php_execute',100);


/**
 * Register Widget Area.
 *
 */
function wpgyan_widgets_init() {
 
	register_sidebar( array(
		'name' => 'Instagram Widget',
		'id' => 'instagram_widget',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpgyan_widgets_init' );

function wptuts_load_caroufredsel() {
    // Enqueue carouFredSel, note that we specify 'jquery' as a dependency, and we set 'true' for loading in the footer:
    wp_register_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), '6.2.1', true );
 
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'wptuts-caroufredsel', get_template_directory_uri() . '/js/wptuts-caroufredsel.js', array( 'caroufredsel' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'wptuts_load_caroufredsel' );
