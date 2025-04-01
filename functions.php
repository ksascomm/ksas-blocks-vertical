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
 * Hide Parent Templates
 */
add_filter( 'theme_page_templates', 'child_theme_remove_page_template', 20, 3 );
/**
 * Remove page templates inherited from the parent theme.
 *
 * @param array $page_templates List of currently active page templates.
 *
 * @return array Modified list of page templates.
 */
function child_theme_remove_page_template( $page_templates ) {
	// Remove the template we don’t need.
	unset( $page_templates['page-templates/bulletin-board.php'] );
	unset( $page_templates['page-templates/classroom-directory.php'] );
	unset( $page_templates['page-templates/graduate-fields-of-study.php'] );
	unset( $page_templates['page-templates/people-directory-sort.php'] );
	unset( $page_templates['page-templates/profiles.php'] );
	unset( $page_templates['page-templates/research-projects.php'] );
	return $page_templates;
}

function child_theme_dequeue_script() {
	wp_dequeue_script('navbar');
}
add_action( 'wp_enqueue_scripts', 'child_theme_dequeue_script', 100 );