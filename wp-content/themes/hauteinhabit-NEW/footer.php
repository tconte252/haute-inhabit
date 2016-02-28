<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
	<?php if(is_home() || is_page('Mood')) : ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Afilliate') ) : ?><?php endif; ?>
	<?php endif; ?> 

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-info">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'after' => '<span class="divider"> | </span>' ) ); ?>
		</div><!-- .site-info -->
		<div class="newsletter">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Subscribe') ) : ?><?php endif; ?>
		</div>
		<div class="copyright">
			<p>HAUTE INHABIT, LLC all rights reserved.</p>
		</div>
		
	</footer><!-- .site-footer -->

	<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/js/plugins.js" type="text/javascript"></script>
	<!--<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/js/base.js" type="text/javascript"></script>-->
	<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/js/searchBar.js" type="text/javascript"></script>
	<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/js/fixed-nav.js" type="text/javascript"></script>
	<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/hauteinhabit-NEW/js/responsive-menu.js" type="text/javascript"></script>

	<script>
 
jQuery(document).ready(function() {
 
var offset = 250;
 
var duration = 300;
 
jQuery(window).scroll(function() {
 
if (jQuery(this).scrollTop() > offset) {
 
jQuery('.back-to-top').fadeIn(duration);
 
} else {
 
jQuery('.back-to-top').fadeOut(duration);
 
}
 
});
 
&nbsp;
 
jQuery('.back-to-top').click(function(event) {
 
event.preventDefault();
 
jQuery('html, body').animate({scrollTop: 0}, duration);
 
return false;
 
})
 
});
 
</script>

	<?php wp_footer(); ?>

</body>
</html>
