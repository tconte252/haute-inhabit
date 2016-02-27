<?php get_header();?>


<div class="main section" id="main">
<div class="widget Blog" id="Blog1">
<div class="blog-posts hfeed">
<!-- google_ad_section_start(name=default) -->

       <?php if ( have_posts() ):
			 while ( have_posts() ) : the_post(); ?>  
          
          <div class="date-outer">	
          <div class="date-posts">
        
<div class="post-outer">
<div class="post hentry">
<a name="6576135133677080233"></a>
<h3 class="post-title entry-title">
<?php the_title();?>
</h3>


<h2 class="date-header"><span><?php the_date('', '', '', True);?></span></h2>
<div class="post-header">
<div class="post-header-line-1"></div>
</div>
<div class="post-body entry-content" id="post-body-6576135133677080233">
   <?php the_content();?>
 <?php comments_template( '', true ); ?>
<div style="clear: both;"></div>
</div>
</div>
</div>

            </div></div>
            <?php endwhile;?>
            <?php endif;?>
            
            
          

</div>


<script type="text/javascript">window.___gcfg = {'lang': 'en'};</script>
</div></div>
</div>
</div>


<?php get_sidebar();?>



<?php get_footer();?>