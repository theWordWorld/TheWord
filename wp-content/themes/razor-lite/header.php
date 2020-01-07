<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Razor Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'razor-lite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<div class="header-nav wrap-in">

		<?php if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu( 'mobile-menu' ) || has_nav_menu ( 'social' ) ) : ?>
			<button class="menu-toggle animated" aria-expanded="false" ><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'razor-lite' ); ?></span><span class="action-text"></span></button>
			<div class="slide-panel animated closed">
				<div class="panel-dimmer">

				<?php get_template_part( 'components/branding/branding' ); ?>
				<?php get_template_part( 'components/menu/menu' ); ?>

				<?php if ( is_active_sidebar( 'sidebar-1' ) ) { get_sidebar(); } ?>
				<?php razor_lite_social_menu(); ?>

				</div>
			</div><!-- .slide-panel -->
		<?php endif; ?>

		<?php get_template_part( 'components/branding/branding' ); ?>

	</div><!-- .wrap-in -->
	</header><!-- #masthead -->

	<?php get_template_part( 'components/hero/header-image' ); ?>

	<div id="content" class="site-content wrap-in">