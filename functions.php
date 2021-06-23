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

/** Disable/Clean Inline Styles */
function clean_post_content( $content ) {
	// Remove inline styling.
	// $content = preg_replace( '/(<[^>]+) style=".*?"/i', '$1', $content );.
	$content = preg_replace( '/(<[span>]+) style=".*?"/i', '$1', $content );
	$content = preg_replace( '/font-family\:.+?;/i', '', $content );
	$content = preg_replace( '/color\:.+?;/i', '', $content );

	// Remove font tag.
	$content = preg_replace( '/<font[^>]+>/', '', $content );

	// Remove empty tags.
	$post_cleaners = array(
		'<p></p>'             => '',
		'<p> </p>'            => '',
		'<p>&nbsp;</p>'       => '',
		'<span></span>'       => '',
		'<span> </span>'      => '',
		'<span>&nbsp;</span>' => '',
		'<span>'              => '',
		'</span>'             => '',
		'<font>'              => '',
		'</font>'             => '',
	);
	$content       = strtr( $content, $post_cleaners );

	return $content;
}
add_filter( 'the_content', 'clean_post_content' );