<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Classic Ecommerce
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function classic_ecommerce_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'classic_ecommerce_jetpack_setup' );