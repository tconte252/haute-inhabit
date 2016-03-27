<?php
/**
 * The template used for displaying About page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<img style="float: left; margin: 0 20px 50px 0;" class="alignnone size-full wp-image-3650" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2013/07/lainy-hedaya.jpg" alt="lainy-hedaya" width="476" height="713" />
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
