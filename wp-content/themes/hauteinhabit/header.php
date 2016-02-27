<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
		
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width">
		<meta name="MSSmartTagsPreventParsing" content="true" >		
		<meta name="description" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); echo " - "; bloginfo('description'); } ?>">
		
		<meta property="og:title" content="<?php bloginfo('name'); ?><?php wp_title(); ?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php if (is_home()) { echo site_url(); } else { the_permalink(); } ?>">
		<link rel="canonical" href="<?php if (is_home()) { echo site_url(); } else { the_permalink(); } ?>" /> 
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/hauteinhabit-files/img/hero.png">
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
		<meta property="fb:admins" content="">
		<meta property="og:description" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('name'); echo " - "; bloginfo('description'); } ?>">
	
		
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
		
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon-144x144.png">
		
		<link type="text/css" rel="stylesheet/less" href="<?php bloginfo( 'template_url' ); ?>/hauteinhabit-files/css/base.less" />
		
		<link href="http://i1138.photobucket.com/albums/n528/xlanesx/favicon_zps24944e70.png" rel="icon" type="image/x-icon">
		
		<link rel="alternate" type="application/atom+xml" title="Haute Inhabit - Atom" href="http://www.hauteinhabit.com/feeds/posts/default">
		<link rel="alternate" type="application/rss+xml" title="Haute Inhabit - RSS" href="http://www.hauteinhabit.com/feeds/posts/default?alt=rss">
		<link rel="service.post" type="application/atom+xml" title="Haute Inhabit - Atom" href="http://www.blogger.com/feeds/3025721496401663048/posts/default">
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.blogger.com/rsd.g?blogID=3025721496401663048">
		<link rel="me" href="http://www.blogger.com/profile/07375522568346424007">
		<link rel="openid.server" href="http://www.blogger.com/openid-server.g">
		<link rel="openid.delegate" href="http://www.hauteinhabit.com/">		
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/hauteinhabit-files/slick/slick.css"/>
		<script>var MEDIA_URL = '<?php bloginfo( 'template_url' ); ?>/hauteinhabit-files/';</script>
		<script src="http://ajax.googleapis.com/ajax/libs/webfont/1.0.19/webfont.js" ></script>
		<script src="<?php echo get_template_directory_uri(); ?>/hauteinhabit-files/js/lib/less-1.3.3.min.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/hauteinhabit-files/js/lib/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/google_top_exp.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/hauteinhabit-files/slick/slick.min.js"></script>

		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    </head>
    <body <?php body_class(); ?>>
	
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=493197827431645";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>	
	
		<header id="header">
			<div class="inner">
				<div class="wrapper clear">
					<a href="<?php echo site_url(); ?>" id="logo"><img src="<?php bloginfo( 'template_url' ); ?>/hauteinhabit-files/img/logo/hi_logo.png" alt="Haute Inhabit Logo"></a>
					<nav>
						<ul class="clear">
							<li class="cats btn" data-menu="categories"><a href="#">Categories</a></li>
							<li class="archive btn" data-menu="archives"><a href="#">Archive</a></li>
							<li class="shop btn" data-menu="shops"><a href="/shop">Shop</a></li>
							<li class="social"></li>
						</ul>
					</nav>
					
					<div class="search btn" data-menu="search">Search</div>

					<div class="sn clear">
			<div style="margin-right: 95px;"><?php include('inc/twitter_follow.php'); ?></div>
			<?php include('inc/fb_like.php'); ?>
		</div>
					
				
				</div>
			</div>
			
			<div id="menu_search" class="menu">
				<?php get_search_form(); ?>
			</div>
			
			<div class="categories menu" id="menu_categories">
				<div class="wrapper clear">
					<div class="carousel">
						<div class="overflow">
							<ul class="slides clear">
								<?php 
									//categories
									$categories = get_categories(array(
										'orderby' => 'name',
										'parent' => 0
									)); 
									foreach ($categories as $cat) { ?>
								<li><a href="<?php echo get_category_link($cat->term_id) ?>"><?php echo $cat->name; ?></a></li>
										
								<?php 
									}
								?> 
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="archives menu" id="menu_archives">
				<div class="wrapper clear">
					<div class="carousel">
						<div class="overflow">
							<ul class="slides clear">
								<?php
									global $wpdb;
									$limit = 0;
									$year_prev = null;
									$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,  YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
									foreach($months as $month) :
										$year_current = $month->year;
										if ($year_current != $year_prev) {
											if ($year_prev != null) { ?>
											<?php } ?>
										<li class="lead"><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/"><?php echo $month->year; ?></a></li>
										<?php } ?>
										<li><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>"><?php echo date_i18n("F", mktime(0, 0, 0, $month->month, 1, $month->year)) ?></a></li>
										
										<?php $year_prev = $year_current;
										if(++$limit >= 18) { break; }
									endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="shops menu" id="menu_shops">
				<div class="wrapper clear">
					<div class="carousel">
						<div class="overflow">
							<ul class="slides clear">
							
								<?php
									$shopCats = new Pod('shop_category');
									$shopCats->findRecords('id DESC');
								?>
								<?php while ($shopCats->fetchRecord()) { ?>
									<li><a href="<?php echo $shopCats->get_field('category_address'); ?>"><?php echo $shopCats->get_field('category_name'); ?></a></li>
								<? } ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>			
			
		</header>
		
		<div id="hero">
			<div class="wrapper">
				<div class="inner">
					<a href="<?php bloginfo('url');?>">
					<div class="site-header"><em>Haute</em> <span>Inhabit</span></div>
					<?php
						$hero = new Pod('header_image');
						$hero->findRecords('id DESC');
					?>		
					<?php while ($hero->fetchRecord()) { 
						if ($hero->get_field('active') === '1') {
					?>
					<img src="<?php echo $hero->get_field('image_file.guid'); ?>">
					
					<?php }
						}
					?>
					</a>
				</div>		
			</div>		
		</div>	