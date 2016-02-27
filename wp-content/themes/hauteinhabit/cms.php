<?php
/*
 * 
 * Template Name: CMS Page
 * 
 */

 get_header();?>
<div id="content" class="cms">
	<div class="wrapper clear">
	
		<div class="main section" id="main" role="main">
			<div class="widget Blog" id="Blog1">
			
				<div class="blog-posts hfeed">
					<!-- google_ad_section_start(name=default) --><?php if ( have_posts() ):           while ( have_posts() ) : the_post(); ?>

					<div class="date-outer">
						<div class="date-posts">
							<div class="post-outer">
								<div class="post hentry">
									<a id="6576135133677080233" name=
									"6576135133677080233"></a>

									<h1 class="post-title entry-title"><?php the_title();?></h1>

									<div class="post-body entry-content" id=
									"post-body-6576135133677080233">
										<?php the_content();?>
									</div>
								</div>
							</div>
						</div>
					</div><?php endwhile;?><?php endif;?>
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