<?php get_header();?>


<div class="main section" id="main">
<div class="widget Blog" id="Blog1">
<div class="blog-posts hfeed">
<!-- google_ad_section_start(name=default) -->

       <?php if ( have_posts() ):

 /*$tmp = $wp_query;
 $wp_query = null;
 $wp_query = new WP_Query('showposts=3');*/
       //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//$my_query = new WP_Query('showposts=3&paged=' . $paged);

			 while (have_posts() ) : the_post(); ?>

          <div class="date-outer">
          <div class="date-posts">

<div class="post-outer">
<div class="post hentry">
<a name="6576135133677080233"></a>
<h3 class="post-title entry-title">
<a href="<?php the_permalink();?>"><?php the_title();?></a>
</h3>


<h2 class="date-header"><span><?php //the_date('', '', '', True);
			echo get_the_date();
			 ?></span></h2>
<div class="post-header">
<div class="post-header-line-1"></div>
</div>
<div class="post-body entry-content" id="post-body-6576135133677080233">
   <?php the_content();?>
   <div class="comments-link">
	<?php if ( comments_open() ) : ?>

		<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Comment', 'hautein' ) . '</span>', __( '<b>1</b> Comment', 'hautein' ), __( '<b>%</b> Comments', 'hautein' ) ); ?></span>
	<?php endif; // End if comments_open() ?>
	</div>
<div style="clear: both;"></div>
</div>
</div>
</div>

            </div></div>
            <?php endwhile;?>
            <?php
            // $wp_query=$tmp;
              hautein_content_nav( 'nav-below' );

            endif;?>


</div>


<script type="text/javascript">window.___gcfg = {'lang': 'en'};</script>
</div></div>
</div>
</div>


<?php get_sidebar();?>

<?php get_footer();?>