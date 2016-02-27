<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
	<div id="content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			if (!get_post_format()) {

				get_template_part( 'content-standard', get_post_format() ); 

			} else if (has_post_format('image')) {

				get_template_part( 'content-image', get_post_format() ); 
			
			} else if (has_post_format('gallery')) {

				get_template_part( 'content-gallery', get_post_format() ); 
			}

		?>

  		<?php 
			
		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	</div>
	<span style="background: #fff; display: block; width:100%; height: 50px; margin:0 0 -50px 0; position: relative;"></span>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<div class="nav-previous">
				<?php previous_post_link('%link', '&lt; Previous Post', TRUE); ?>
			</div>
			<div class="nav-next">
				<?php next_post_link( '%link', 'Newer Post &gt;', TRUE ); ?>
			</div>
		</div>
	</nav>


	<div id="commentsDisqus">
		<h4>Comments...</h4>
	</div>

	<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

	get_footer(); ?>
