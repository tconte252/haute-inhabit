<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
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

		$c = 0;

		?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ($query->have_posts() ) : $query->the_post();
			$c++;

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				if (!get_post_format()) {

					get_template_part( 'content', get_post_format() ); 

				} else if (has_post_format('image')) {

					get_template_part( 'content-new', get_post_format() ); 
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

					<div class="post-utility">
						<div class="inner clear">
						<h4 class="hdr"><span>On Instagram <a href="https://www.instagram.com/lainyhedaya/" target="_blank"> @lainyhedaya</a></span></h4>
						<a class="view" href="https://www.instagram.com/lainyhedaya/" target="_blank">VIEW MORE &gt;</a>
					</div>
				
				</div>

			</div>
			
  		</div>
			<?php endif // ( $count == 2 ) ?>

			<?php $count++ ?>

			
			<?php 
			// End the loop.
			 endwhile;
			
			if ( !class_exists( 'Jetpack' ) && !Jetpack::is_module_active( 'infinite-scroll' ) ) :

					// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
					'next_text'          => __( 'Next page', 'twentyfifteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
				) );

			endif;

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
