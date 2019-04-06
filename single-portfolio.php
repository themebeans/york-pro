<?php
/**
 * The template for displaying the single portfolio posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

get_header();

// Start the loop.
while ( have_posts() ) :

	the_post();

	// Include the single post and single portfolio content template.
	get_template_part( 'components/portfolio/single' );

	// Include Photoswipe on single portfolio pages.
	if ( true === get_theme_mod( 'york_portfolio_lightbox', york_defaults( 'york_portfolio_lightbox' ) ) ) {
		get_template_part( 'components/portfolio/photoswipe' );
	}

endwhile;

get_footer();
