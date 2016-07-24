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
<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit/css/foundation.css" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">

		<header id="header" class="header">
			<h1><a class="hide-for-small-only" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<!-- Small Navigation -->
			<div class="title-bar" data-responsive-toggle="nav-menu" data-hide-for="medium">
				<div class="title-bar-left">
					<button class="menu-icon" type="button" data-toggle></button>
					<div class="title-bar-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div>
				</div>
				<div class="title-bar-right">
					<a href="#">
						<img class="search btn" data-menu="search" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit-child/img/search.png" />
					</a>
				</div>
			</div>

			<nav class="top-bar stacked-for-large stacked-for-medium" id="nav-menu">
				<div class="top-bar-left">
					<ul class="menu center">
				      <li>
				      	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				      		<span class="h hide-for-small-only">H</span>
				      		<span class="i hide-for-small-only">I</span>
				      	</a>
				      </li>
				      <li>
				      	<a class="hide-for-small-only" href="#">BACK TO TOP</a>
				      </li>
				      <li>
				    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>' ) ); ?>
				      <li>
				    </ul>
				</div>
				<div class="top-bar-right">
					<ul class="menu center">
				    	<li>
				    		<a href="#">
								<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/email.png" />
							</a>
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
			</nav>

		</header>

		<div id="content" class="site-content">