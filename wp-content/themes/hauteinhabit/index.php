<?php get_header();?>
<div id="content">
	<h1 class="hidden">Haute Inhabit</h1>
	<div class="wrapper clear">
		<div class="main section" id="main" role="main">
			<div class="widget Blog" id="Blog1">

					 <div class="blog-posts hfeed">
					<!-- google_ad_section_start(name=default) -->


					<?php 
					$instagram = do_shortcode("[thumbnailgrid cat='460' cycle='1' posts_per_page='999']");
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$year = ( get_query_var('year') ) ? get_query_var('year') : NULL;
					$monthnum  = ( get_query_var('monthnum') ) ? get_query_var('monthnum') : NULL;
					$args = array( 'paged' => $paged, 'year' => $year, 'monthnum' => $monthnum );
					if(get_query_var('category_name'))
						$args['category_name'] = get_query_var('category_name');
					else
						$args['cat'] = '-460';
					$query = new WP_Query( $args );	
					//$query = new WP_Query( 'cat=-460&posts_per_page=5' );
					if ( $query->have_posts() ):

						 /*$tmp = $wp_query;
						 $wp_query = null;
						 $wp_query = new WP_Query('showposts=3');*/
							   //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						//$my_query = new WP_Query('showposts=3&paged=' . $paged);
					$c = 0;
						while ($query->have_posts() ) : $query->the_post(); 
						$c++;
						if($c==3) {		    
						?>



<div style="display: none;">


										
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('instagram_widget') ) : 
 
endif; ?>

</div>



    <?php
    echo $instagram;
		 };?>

		
							<div class="post hentry">
								<a id="6576135133677080233" name=
								"6576135133677080233"></a>

								<h3 class="date-header"><span><?php echo get_the_date(); ?></span></h3>
								<h2 class="post-title entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

								<div class="post-lead entry-content">
									<?php echo get_first_paragraph() ?>
								</div>
								
								<div class="post-image">
									<a href="<?php the_permalink();?>">
									<?php 
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										the_post_thumbnail('full');
									} else {
									?>
										<img src="<?php echo catch_that_image() ?>">
									<?php } ?>
									</a>
								</div>

								<div class="post-utility">
									<div class="inner clear">
										<a href="<?php the_permalink();?>" class="view">View More</a>
										<div class="comments">
											<?php if ( comments_open() ) : ?><span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Comment', 'hautein' ) . '</span>', __( '<em>1</em> Comment', 'hautein' ), __( '<em>%</em> Comments', 'hautein' ) ); ?></span>
											<?php endif; // End if comments_open() ?>
										</div>
										<a href="#" class="share"><span>Share</span></a>
									</div>
									<?php include('inc/social.php'); ?>
								</div>		
							</div>

					
									<?php if ( $count == 1 ) : ?>
  <div class="special">

  	<div id="insta" class="cf">

<h4 class="hdr">On Instagram <a href="https://instagram.com/hauteinhabit/" target="_blank"> @HauteInhabit</a></h4>

 <div class="list_carousel">
    <ul id="foo2">


<?php
$catquery = new WP_Query( 'cat=460&posts_per_page=8' );
while($catquery->have_posts()) : $catquery->the_post();
?>
 <li>
<?php
    global $post;
    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 210,1000 ), false, 'homepage-featured' );
?>
<div class="box" style="background:url(<?php echo $src[0]; ?>) no-repeat 50% 10%;">
<a href="<?php the_permalink() ?>" rel="bookmark"><div class="overlay"><div class="overlay-text"><div style="display:table-cell; height:210px; width:210px; vertical-align:middle; padding: 40px;">
<?php the_title(); ?></div></div></div></a></li>

     <?php endwhile; ?>

</ul>
</div>


<div id="slider-nav">
<a id="prev2" class="prev" style="display: block;" href="#"> </a>
<a id="next2" class="next" style="display: block;" href="#"> </a>
</div>

<div class="post-utility">
	<div class="inner clear">
	<a class="view" href="https://instagram.com/hauteinhabit/" target="_blank">View all on Instagram</a>
</div>
</div>

</div>

  </div>
<?php endif // ( $count == 2 ) ?>

<?php $count++ ?>
						<?php endwhile;?>





						<?php
							// $wp_query=$tmp;
							//hautein_content_nav( 'nav-below' );
						endif;?>
						
						<div class="pagination clear">
						<?php
							global $wp_query;

							$big = 999999999; // need an unlikely integer

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages,
								'prev_text' => 'Prev',
								'next_text' => 'Next'
							) );
						?>


						</div>
				</div>
				<script type="text/javascript">
					window.___gcfg = {'lang': 'en'};
				</script>
			</div>
		</div>
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>
