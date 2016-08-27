<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Haute_Inhabit
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit-child/img/iphone-icon.png?m=<?php echo filemtime('apple-touch-icon.png'); ?>"/>
<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit/css/foundation.css" />

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-28575165-1', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">

		<header id="header" class="header">
			<h1 class="hide-for-small-only"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				
			<div data-sticky-container>

				<div class="sticky" data-sticky data-options="marginTop:0;" style="width:100%" data-sticky-on="small">

					<!-- Small Navigation -->
					<div class="title-bar" data-responsive-toggle="nav-menu" data-hide-for="medium">
						<a class="logo-small" href="#">
							<img class="search btn" data-menu="search" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit-child/img/search.png" />
						</a>
						<button class="menu-icon" type="button" data-toggle></button>
						<div class="title-bar-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</div>
					</div>
					
					<!-- Medium-Up Navigation -->
					<nav class="top-bar stacked-for-medium stacked-for-large" id="nav-menu">

					  	<!-- Left Nav Section -->
					 	<div class="top-bar-left hide-for-small-only">
						    <ul class="vertical medium-horizontal menu center">
						      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="h">H</span><span class="i">I</span></a></li>
						      <li><a class="back-to-top" href="#">BACK TO TOP</a></li>
						      <li class="hide-for-xlarge-only"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>' ) ); ?></li>
						    </ul>
					  	</div>
			  
					  	<!-- Right Nav Section -->
					  	<div class="top-bar-right hide-for-small-only">
						    <ul class="vertical medium-horizontal dropdown menu center" data-dropdown-menu>
						    	<li>
						    		<a href="#">
										<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/email.png" />
									</a>
									<ul class="menu mail-drop">
										<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Navigation Subscribe') ) : ?><?php endif; ?>
									</ul>
						    	</li>
						    	<li>
						    		<a href="/feed/" rel="external" target="_blank">
						    			<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/rss.png" />
						    		</a>
						    	</li>
						      	<li>
						      		<a href="https://twitter.com/LainyHedaya" rel="external" target="_blank">
						      			<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/twitter.png" />
						      		</a>
						      	</li>
						        <li>
						        	<a href="https://www.facebook.com/hauteinhabit" rel="external" target="_blank">
						        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/facebook.png" />
						        	</a>
						        </li>
						        <li>
						        	<a href="http://hauteinhabit.tumblr.com/" rel="external" target="_blank">
						        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/tumblr.png" />
						        	</a>
						        </li>
						        <li>
						        	<a href="http://pinterest.com/hauteinhabit/" rel="external" target="_blank">
						        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/pinterest.png" />
						        	</a>
						        </li>
						        <li>
						        	<a href="https://www.instagram.com/lainyhedaya/" rel="external" target="_blank">
						        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/instagram.png" />
						        	</a>
						        </li>
						        <li>
						        	<a href="https://www.bloglovin.com/blogs/haute-inhabit-6728795" rel="external" target="_blank">
						        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/bloglovin.png" />
						        	</a>
						        </li>
						        <li class="search btn" data-menu="search">SEARCH</li>
						    </ul>
					  	</div>

					  	<!-- Center Nav Section -->
						<div class="logo-wrapper hide-for-medium-only hide-for-large-only">
						    <div class="logo">
						      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '<ul id="%1$s" class="%2$s center" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>' ) ); ?>
						    </div>
						</div>
					</nav>
				
					<div class="search-wrapper">
						<div id="menu_search" class="search-menu">
							<?php get_search_form(); ?>
						</div>
					</div>

				</div>

			</div>

		</header>

		<div id="content" class="site-content">