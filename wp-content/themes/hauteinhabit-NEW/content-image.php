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


	<header class="entry-header">
		<?php 
			
			$categories = get_the_category();
			
			if (!empty($categories)) {

    			echo '<a class="post-categories" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';

			} 

		?>
		<div class="entry-meta">
			<time><?php the_time('F j, Y') ?></time>
		</div>
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<div class="byline-author">by <?php the_author(); ?></div>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_post_thumbnail(); ?>

		<?php $floatLeftImages = get_post_meta($post->ID, 'img-float-left'); ?>
		<div class="alignleft">
			<?php foreach($floatLeftImages as $floatLeftImage): ?>
				<img src="<?php echo $floatLeftImage; ?>" />
			<?php endforeach; ?>
		</div>
		<div id="post-content">
			<?php the_content(); ?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->