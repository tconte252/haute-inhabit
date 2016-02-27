<?php
/*
Template Name: Mood
*/

get_header(); ?>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Banner') ) : ?><?php endif; ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content-mood', 'page' );

		// End the loop.
		 endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>