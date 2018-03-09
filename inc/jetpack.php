<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package shopline2018
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function shopline2018_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'shopline2018_jetpack_setup' );
