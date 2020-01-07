<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Razor Lite
 */

/**
 * Jetpack Sharing display
 */
function razor_lite_remove_share() {
    		remove_filter( 'the_excerpt', 'sharing_display',19 );
}
add_action( 'get_header', 'razor_lite_remove_share' );

/**
* Add theme support for Responsive Videos.
*/
add_theme_support( 'jetpack-responsive-videos' );

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function razor_lite_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'	=> 'razor_lite_infinite_scroll_render',
		'type'	=> 'click',
		'footer'	=> false,
	) );
}
add_action( 'after_setup_theme', 'razor_lite_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function razor_lite_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'components/content/content', get_post_format() );
	}
}