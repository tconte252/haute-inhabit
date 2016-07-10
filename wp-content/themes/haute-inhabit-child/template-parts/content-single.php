<?php
/**
 * Template part for displaying post content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Haute_Inhabit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php 
				
				$categories = get_the_category();
				
				if (!empty($categories)) {

	    			echo '<a class="post-categories" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';

				} 

			?>
			<time><?php the_time('F j, Y') ?></time>
		</div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="byline">by <?php the_author_posts_link(); ?></div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_post_thumbnail();

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'haute-inhabit' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->