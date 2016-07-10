<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Haute_Inhabit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="large-12 columns">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		
		<header class="entry-header">

			<div class="entry-meta">
				<?php 
				
					$categories = get_the_category();
					
					if (!empty($categories)) {

		    			$category = '<a class="post-categories" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';

					} 

				?>
				<?php echo $category; ?> - <?php the_time('F j, Y'); ?> - <a href="<?php the_permalink(); ?>#disqus_thread"><?php comments_number(); ?></a>
				
			</div><!-- .entry-meta -->

			<?php the_title( '<strong class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></strong>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>">View more &gt;</a>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->