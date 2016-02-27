<?php get_header();?>
<div id="content">
	<div class="wrapper clear">
	
		<div class="main section" id="main" role="main">
			<div class="widget Blog" id="Blog1">
				<div class="blog-posts hfeed">
					<!-- google_ad_section_start(name=default) -->
					<?php 
					//if(in_category('Instagram')) query_posts('cat=460'); else query_posts('cat=-460');
					if ( have_posts() ):
						while ( have_posts() ) : the_post(); ?>
					
						<div class="post hentry">

							<h1 class="post-title entry-title"><?php the_title();?></h1>
							
							<div class="post-lead entry-content" style="display: none;">
								<?php echo get_first_paragraph() ?>
							</div>

							<h2 class="date-header"><span><?php the_date('', '', '', True);?></span></h2>
              <div class="post-body entry-content">
								<?php the_content();?>
							</div>
              <div class="entry-content">
                
							<?php
							if(in_category('Instagram')) {
							?>
  						<h4 class="hdr">On Instagram @HauteInhabit</h4>
							<?php echo do_shortcode("[thumbnailgrid cat='460' cycle='1' posts_per_page='999']"); ?>
							<?php
							}
							?>
								
								<?php comments_template( '', true ); ?>
							</div>
							
							<div class="post-utility" data-url="<?php the_permalink();?>">
								<div class="wrap">
									<div class="inner clear">
										<?php include('inc/social.php'); ?>
									</div>	
								</div>
								<hr>
							</div>
							
							<nav class="nav clear">
								<div class="next"><?php 
								//echo in_category('Instagram');
								if(in_category('Instagram'))
									next_post_link('%link', 'Next Article', TRUE);  
								else
									next_post_link('%link', 'Next Article', false, '460');
									//next_post('%','Next Article', 'no'); 
								?></div>
								<div class="prev"><?php
								if(in_category('Instagram'))
									previous_post_link('%link', 'Prev. Article', TRUE);  
								else
									previous_post_link('%link', 'Prev. Article', false, '460');
								 //previous_post('%','Prev. Article', 'no'); 
								 ?></div>
							</nav>
						</div>
					<?php endwhile;?>
					<?php endif;?>					
					
				</div>
				<script type="text/javascript">
					window.___gcfg = {'lang': 'en'};
				</script>
			</div>
		</div>	
		<?php get_sidebar();?>
	</div>
	
	
	<?php
		$orig_post = $post;
		global $post;
		$tags = wp_get_post_tags($post->ID);
		
		if ($tags) {
	?>
		<div class="related" id="related">
			<div class="wrapper">
				<h2>You Might Also Like</h2>
				
				<div class="carousel">
					<div class="overflow">
						<ul class="slides clear hfeed">
						<?php
								$tag_ids = array();
								foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
								$args=array(
									'tag__in' => $tag_ids,
									'post__not_in' => array($post->ID),
									'posts_per_page'=>9999, // Number of related posts to display.
									'caller_get_posts'=>1
								);
							
								$my_query = new wp_query( $args );

								while( $my_query->have_posts() ) {
									$my_query->the_post();
							?>
							
								<li class="slide hentry">
									<a href="<? the_permalink()?>">
										
										<?php 
										if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
											the_post_thumbnail('full');
										} else {
										?>
										<img src="<?php echo catch_that_image() ?>">
										
										<?php } ?>
										<div class="mask">
											<div class="inner">
												<h3 class="post-title entry-title"><?php the_title(); ?></h3>
												
												<div class="comments">
													<?php comments_number(); ?>
												</div>
											</div>
										</div>
										
									</a>
								</li>
							
							<? } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php	}
		$post = $orig_post;
		wp_reset_query();
	?>
	
	
</div>
<?php get_footer();?>