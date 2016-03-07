<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="msvalidate.01" content="C72342CAEFA3725DD2B5D774DDE48072" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<script>(function(){document.documentElement.className='js'})();</script>
	<?php wp_head(); ?>
	<script>var MEDIA_URL = 'http://www.hauteinhabit.com/wp-content/themes/hauteinhabit/hauteinhabit-files/';</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/webfont/1.0.19/webfont.js" ></script>
	<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/js/less-1.3.3.min.js" type="text/javascript"></script>
	<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<!--<script src="http://www.hauteinhabit.com/wp-content/themes/hauteinhabit/google_top_exp.js" type="text/javascript"></script>-->
    <script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/js/slick/slick.min.js" type="text/javascript"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-28575165-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>

	<header id="masthead">
	
	  <?php // wp_nav_menu( array( 'theme_location' => 'primary', 'after' => '<span class="divider"> - </span>' ) ); ?>

	  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

	</header>

	<nav class="main-menu">
	  	
	  	<div id="colLeft">
	  		<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="h">H</span><span class="i">I</span></a>

	  		<a class="back-to-top" href="#">BACK TO TOP</a>
	  	</div>
	  	<div id="colwrap">
	  		
	  		<div id="colRight">
	  			<div class="search btn" data-menu="search">SEARCH</div>

			  	<ul id="social">
			  		<li class="email"><a href="#"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/email.png" /></a><ul class="nav-newsletter">
			<li><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Nav Subscribe') ) : ?><?php endif; ?></li>
		</ul></li>
			  		<li class="rss"><a href="/feed/" rel="external" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/rss.png" /></a></li>
			  		<li class="twitter"><a href="https://twitter.com/hauteinhabit" rel="external" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/twitter.png" /></a></li>
					<li class="facebook"><a href="https://www.facebook.com/hauteinhabit" rel="external" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/facebook.png" /></a></li>
					<li class="tumblr"><a href="http://hauteinhabit.tumblr.com/" rel="external" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/tumblr.png" /></a></li>
					<li class="pinterest"><a href="http://pinterest.com/hauteinhabit/" rel="external" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/pinterest.png" /></a></li>
					<li class="instagram"><a href="http://instagram.com/hauteinhabit" rel="external" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/instagram.png" /></a></li>
					<li class="bloglovin"><a href="https://www.bloglovin.com/blogs/haute-inhabit-6728795" rel="external" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/bloglovin.png" /></a></li>
				</ul>
			</div>
			<div id="colCenter">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</div>
		
		<div style="clear: both;"></div>
	</nav>
	
	<div class="search-wrapper">
		<div id="menu_search" class="search-menu">
			<?php get_search_form(); ?>
		</div>
	</div>