<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Haute_Inhabit
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main" role="main">

		<?php 

		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$year = ( get_query_var('year') ) ? get_query_var('year') : NULL;
		$monthnum  = ( get_query_var('monthnum') ) ? get_query_var('monthnum') : NULL;
		$args = array( 'paged' => $paged, 'year' => $year, 'monthnum' => $monthnum );
		if(get_query_var('category_name'))
			$args['category_name'] = get_query_var('category_name');
		else
			$args['cat'] = '-460';
			$query = new WP_Query( $args );	

		if ( $query->have_posts() ):

		$count = 0;

		?>

		<?php

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ($query->have_posts() ) : $query->the_post();
			$count++;

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				if (!get_post_format()) {

					get_template_part( 'template-parts/content', get_post_format() ); 

				} else if (has_post_format('image')) {

					get_template_part( 'template-parts/content', 'image' ); 
				}
			?>

			<?php if ( $count == 1 ) : ?>
 				<div class="special">
  					
  					<div id="insta" class="cf">

						<div class="list_carousel">
    						
    						<ul id="foo2">

								<?php

								$catquery = new WP_Query( 'cat=460&posts_per_page=10' );
								while($catquery->have_posts()) : $catquery->the_post();
								
								?>
								<li>
								<?php
								
							    global $post;
							    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 210,1000 ), false, 'homepage-featured' );
								?>
									<div class="box" style="background:url(<?php echo $src[0]; ?>) no-repeat 50% 10%;">
										<a href="<?php the_permalink() ?>" rel="bookmark">
											<div class="overlay">
												<div class="overlay-text">
													<div style="display:table-cell; height:210px; width:210px; vertical-align:middle; padding: 40px;">
														<?php the_title(); ?>
													</div>
												</div>
											</div>
										</a>
									</div>
								</li>

     							<?php endwhile; ?>

							</ul>

						</div>

						<div id="slider-nav">
							<a id="prev2" class="prev" style="display: block;" href="#"> </a>
							<a id="next2" class="next" style="display: block;" href="#"> </a>
						</div>

						<div>
							<div class="inner clear">
								<div class="small-11 large-centered columns">
									<span class="hdr">
										On Instagram <a href="https://www.instagram.com/lainyhedaya/" target="_blank"> @lainyhedaya</a>
									</span>
								</div>
							</div>
						</div>
						<div>
							<div class="small-11 large-centered columns">
								<a class="view" href="https://www.instagram.com/lainyhedaya/" target="_blank">VIEW MORE &gt;</a>
							</div>
						</div>
				
					</div>

				</div>

			<?php endif; ?>

			<?php $count++ ?>

			<?php

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();