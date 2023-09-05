<?php
/**
 * KSAS Blocks Child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KSAS_Blocks
 */

add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );
	/**
	 * Sets up styles and scripts for this child theme
	 *
	 * Note that this function is hooked into the wp_enqueue_scripts
	 */
function child_theme_enqueue_styles() {
	$parent_style = 'ksas-blocks-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/dist/css/style.css', array(), filemtime( get_template_directory() . '/resources/css' ), 'all' );
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);

}

add_action( 'widgets_init', 'ksas_blocks_vertical_register_sidebar' );

function ksas_blocks_vertical_register_sidebar() {
	register_sidebar(
		array(
			'id'            => 'sidebar1',
			'name'          => __( 'Global Sidebar', 'ksasacademic' ),
			'description'   => __( 'The first (primary) sidebar.' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

/**
 *  Remove unnecessary classes for navigation menus
 */
function ksasaca_css_attributes_filter( $var ) {
	$newnavclasses = is_array( $var ) ? array_intersect(
		$var,
		array(
			'current_page_item',
			'current_page_parent',
			'current_page_ancestor',
			'external',
			'home',
			'authenticate',
		)
	) : '';
	return $newnavclasses;
}
add_filter( 'nav_menu_css_class', 'ksasaca_css_attributes_filter', 100, 1 );
