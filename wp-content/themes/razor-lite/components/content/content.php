<?php
/**
 * Template part for displaying posts.
 *
 * @package Razor Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php
		endif; ?>
	
	<div class="entry-wrapper">

		<header class="entry-header">

		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
		<?php
			if ( false === get_theme_mod( 'meta_date_blog' ) ) {
				razor_lite_posted_on();
			}
			if ( false === get_theme_mod( 'meta_by_blog' ) ) {
				razor_lite_posted_by();
			}
		?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		</header><!-- .entry-header -->

	<div class="entry-content">

<?php
	if ( true === get_theme_mod( 'excerpt_enable' ) || !get_theme_mod( 'excerpt_enable' ) ) {
			the_excerpt();
	} else {
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'razor-lite' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
	} ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'razor-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

		
	<footer class="entry-footer">
		<?php
			if ( false === get_theme_mod( 'meta_cat_blog' ) ) {
				razor_lite_entry_footer();
			}
			if ( false === get_theme_mod( 'meta_comments_blog' ) ) {
				razor_lite_entry_footer_links();
			} ?>
	</footer><!-- .entry-footer -->


	</div>
</article><!-- #post-## -->