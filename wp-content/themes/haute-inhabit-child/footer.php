<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Haute_Inhabit
 */

?>

	</div><!-- #content -->

	<?php if(is_front_page()) : ?>
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php endif; ?>
	<?php endif; ?> 

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="site-info">
			<div class="row">
				<div class="large-9 columns">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'after' => ' | ', 'menu_class' => 'vertical medium-horizontal menu' ) ); ?>
				</div>
				<div class="large-3 columns">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Subscribe') ) : ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="column row">
				<p class="copyright">haute inhabit, llc all rights reserved.</p>
			</div>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit-child/js/searchBar.js"></script>
<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit/js/vendor/jquery.js"></script>
<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit/js/vendor/what-input.js"></script>
<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit/js/vendor/foundation.min.js"></script>
<script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/haute-inhabit/js/app.js"></script>

</body>
</html>