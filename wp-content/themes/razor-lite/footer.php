<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Razor Lite
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer wrap-in" role="contentinfo">
		<div class="site-info">
			<?php get_template_part( 'components/site-info/site-credits' ); ?>
			<?php get_template_part( 'components/site-info/site-info' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
