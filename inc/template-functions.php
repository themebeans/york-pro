<?php
/**
 * Additional features to allow styling of the templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function york_body_classes( $classes ) {
	global $post;

	// Adds a class to the body.
	$classes[] = 'clearfix';

	// Adds a class of post-thumbnail to pages with post thumbnails for hero areas.
	if ( is_customize_preview() ) {
		$classes[] = 'is-customize-preview';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'york-front-page';
	}

	/*
	 * If comments are open or we have at least one comment, load up the comment template.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/comments_open/
	 * @link https://codex.wordpress.org/Template_Tags/get_comments_number/
	 */
	if ( ! is_search() && ! is_404() ) {
		if ( comments_open() || get_comments_number() ) {
			$classes[] = 'is-page-with-comments';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'york_body_classes' );

/**
 * Adds data attributes to the body, based on Customizer entries.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function york_body_data( $classes ) {
	/**
	 * Layout variables used throughout the theme.
	 * These are all managed through the use of the Customizer API.
	 */
	$lightbox_scheme = get_theme_mod( 'portfolio_lightbox-colorscheme', york_defaults( 'portfolio_lightbox-colorscheme' ) );

	$classes[] = '" data-lightbox-scheme="' . esc_attr( $lightbox_scheme ) . '"';

	return $classes;
}
add_filter( 'body_class', 'york_body_data', 999 );
