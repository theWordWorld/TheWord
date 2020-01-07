<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Razor Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-wrapper">
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta"><?php echo esc_html__( 'Post', 'razor-lite' ); ?></div>
		<?php endif; ?>
		<?php if ( 'page' == get_post_type() ) : ?>
			<div class="entry-meta"><?php echo esc_html__( 'Page', 'razor-lite' ); ?></div>
		<?php endif; ?>

		<?php the_title( sprintf( '<h3 class="search-result-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	</div>
</article><!-- #post-## -->


