<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Easy Plan Financial
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function easy_plan_financial_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'easy_plan_financial_jetpack_setup' );
