<?php get_header();?>
<div id="content">
	<div class="wrapper clear">
		<div id="main" role="main">
			<?php if (have_posts()) : ?>
			
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			
			<?php while (have_posts()) : the_post(); ?>
			
				<div class="post hentry">
					<a id="6576135133677080233" name=
					"6576135133677080233"></a>

					<h3 class="date-header"><span><?php echo get_the_date(); ?></span></h3>
					<h2 class="post-title entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

					<div class="post-lead entry-content">
						<?php echo get_first_paragraph() ?>
					</div>
					
					<div class="post-image">
						<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail('full');
						} else {
						?>
							<a href="<?php the_permalink();?>"><img src="<?php echo catch_that_image() ?>"></a>
						<?php } ?>
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
			
			<?php endwhile; else: ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
			</header>
			<?php endif; ?>
		</div>
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer(); ?>

