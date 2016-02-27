<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="thumbnail-full">
		<?php the_post_thumbnail(); ?>
	</div>

	<header class="entry-header">

		<div class="entry-meta">
		<?php 
			
			$categories = get_the_category();
			
			if (!empty($categories)) {

    			$category = '<a class="post-categories" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';

			} 

		?>
			<?php echo $category; ?> - <?php the_time('F j, Y'); ?> - <?php comments_number(); ?>
		</div>
	</header><!-- .entry-header -->

	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<!--<div class="post-lead">

			<?php //echo get_first_paragraph(); ?>
			
		</div>-->

	
	<div class="entry-excerpt">

		<?php the_excerpt(); ?>

	</div>

</article><!-- #post-## -->