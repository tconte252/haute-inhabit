<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Haute_Inhabit
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	
	<?php $posts = query_posts($query_string); if (have_posts()) : while (have_posts()) : the_post(); ?>
		<nav class="navigation post-navigation menu-centered" role="navigation">
			<ul class="vertical medium-horizontal menu">
				<li><?php previous_post_link('%link', '&lt; Previous'); ?></li>
				<li class="social">
			    	<a href="mailto:?body=Read this post: <?php the_permalink(); ?>" target="_blank">
			    		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/email-2.png" />
			    	</a>
			  	</li>
			  	<li class="social">
			    	<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=hauteinhabit" target="_blank">
			    		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/twitter-2.png" />
			    	</a>
			  	</li>
				<li class="social">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">	
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/facebook-2.png" />
					</a>
				</li>
				<li class="social">
					<a href="http://www.tumblr.com/share?v=3&u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank">	
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/tumblr-2.png" />
					</a>
				</li>
				<li class="social">
					<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" target="_blank">
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/img/pinterest-2.png" />
					</a>
				</li>
				<li><?php next_post_link('%link', 'Next &gt;'); ?></li>
			</ul>
		</nav>
	<?php endwhile; endif; ?>

	<div id="disqus" class="column row">
		<h4>Comments...</h4>

	<?php

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
	</div>

<?php
get_footer();