<?php
/*
Template Name: About
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content-about', 'page' ); ?>

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
							<h4 class="hdr">
								<span>
									On Instagram <a href="https://instagram.com/hauteinhabit/" target="_blank"> @HauteInhabit</a>
									<a class="view" href="https://instagram.com/hauteinhabit/" target="_blank">VIEW MORE &gt;</a>
								</span>
							</h4>
						</div>
					</div>
				
				</div>

			</div>
			
  		</div>

		<?php
		// End the loop.
		 endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>