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
	<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/css/foundation.css" />
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
    <?php if (strpos($_SERVER['SERVER_NAME'], 'localhost') === false) : ?>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-28575165-1', 'auto');
	  ga('send', 'pageview');
	</script>
	<?php endif; ?>

<script type="text/javascript">
	
	//mandatory----------------
	var tumblrBlogLink="http://hauteinhabit.tumblr.com/";	
	var tumblrApiKey="Ld2DyaUPZK2nkn4PnDkjVwcoJt0Fkez3A4q085HUq8z0hVtZgV";
	
	//optional-----------------
	var tumbaxWidgetWidth = 800; 
	var pathToLoadingImage = '<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/loader.gif';
	var tumbaxColumns = 4;

	
	
	/*
	var tumblrBlogLink="http://loor-audiovisual.tumblr.com";
	var tumblrBlogLink="http://assassincreeds.tumblr.com";
	var tumblrBlogLink="http://starsinatelescope.tumblr.com";
	var tumblrBlogLink="http://edoro.tumblr.com";
	var tumblrBlogLink="http://pizzeta.tumblr.com";
	var tumblrBlogLink="http://aegilaetus.tumblr.com/";
	
	
	var tumblrApiKey="fuiKNFp9vQFvjLNvx4sUwti4Yb5yGutBN4Xh10LXZhhRKjWlV4";
	*/
	//optional parameters-----------------------------------------------
	
	
	function goClicked() {
		$('#tumbax').empty();
		tumblrBlogLink=$('#tumblrBlogLink').val();
		
		prepareTumbax();
	}
	
	</script>
</head>



<body <?php body_class(); ?>>

	<header id="header" class="header">
		<h1><a class="hide-for-small-only" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
		<div data-sticky-container>

			<div data-sticky data-options="marginTop:0;" style="width:100%" data-sticky-on="small">

				<!-- Small Navigation -->
				<div class="title-bar" data-responsive-toggle="nav-menu" data-hide-for="medium">
					<a class="logo-small show-for-small-only" href="#">
						<img class="search btn" data-menu="search" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/search.png" />
					</a>
					<button class="menu-icon" type="button" data-toggle></button>
					<div class="title-bar-title">Haute Inhabit</div>
				</div>

				
				<!-- Medium-Up Navigation -->
				<nav class="top-bar" id="nav-menu">

					<div class="logo-wrapper">
					    <div class="logo">
					      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>' ) ); ?>
					    </div>
					</div>

				  	<!-- Left Nav Section -->
				 	<div class="top-bar-left">
					    <ul class="vertical medium-horizontal menu">
					      <li><a class="hide-for-small-only" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="h">H</span><span class="i">I</span></a></li>
					      <li><a class="back-to-top hide-for-small-only" href="#">BACK TO TOP</a></li>
					    </ul>
				  	</div>
		  
				  	<!-- Right Nav Section -->
				  	<div class="top-bar-right">
					    <ul class="vertical medium-horizontal menu hide-for-small-only" data-responsive-menu="drilldown medium-dropdown">
					    	<li class="rss">
					    		<a href="/feed/" rel="external" target="_blank">
					    			<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/rss.png" />
					    		</a>
					    	</li>
					      	<li class="twitter">
					      		<a href="https://twitter.com/LainyHedaya" rel="external" target="_blank">
					      			<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/twitter.png" />
					      		</a>
					      	</li>
					        <li class="facebook">
					        	<a href="https://www.facebook.com/hauteinhabit" rel="external" target="_blank">
					        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/facebook.png" />
					        	</a>
					        </li>
					        <li class="tumblr">
					        	<a href="http://hauteinhabit.tumblr.com/" rel="external" target="_blank">
					        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/tumblr.png" />
					        	</a>
					        </li>
					        <li class="pinterest">
					        	<a href="http://pinterest.com/hauteinhabit/" rel="external" target="_blank">
					        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/pinterest.png" />
					        	</a>
					        </li>
					        <li class="instagram">
					        	<a href="https://www.instagram.com/lainyhedaya/" rel="external" target="_blank">
					        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/instagram.png" />
					        	</a>
					        </li>
					        <li class="bloglovin">
					        	<a href="https://www.bloglovin.com/blogs/haute-inhabit-6728795" rel="external" target="_blank">
					        		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/bloglovin.png" />
					        	</a>
					        </li>
					        <li class="search btn" data-menu="search">SEARCH</li>
					    </ul>
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