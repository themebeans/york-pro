<?php
/**
 * Enqueues front-end CSS for Customizer options.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

/**
 * Set the Custom CSS via Customizer options.
 */
function york_customizer_css() {

	$theme_accent_color     = get_theme_mod( 'theme_accent_color', york_defaults( 'theme_accent_color' ) );
	$background_color       = get_theme_mod( 'background_color', york_defaults( 'background_color' ) );
	$sitetitle_color        = get_theme_mod( 'york_sitetitle_color', york_defaults( 'york_sitetitle_color' ) );
	$navigationicon_color   = get_theme_mod( 'york_navigationicon_color', york_defaults( 'york_navigationicon_color' ) );
	$footertext_color       = get_theme_mod( 'york_footertext_color', york_defaults( 'york_footertext_color' ) );
	$footernav_a_color      = get_theme_mod( 'york_footernav_a_color', york_defaults( 'york_footernav_a_color' ) );
	$footertexthover_color  = get_theme_mod( 'york_footertexthover_color', york_defaults( 'york_footertexthover_color' ) );
	$footersocial_color     = get_theme_mod( 'york_footersocial_color', york_defaults( 'york_footersocial_color' ) );
	$sidebarsocial_color    = get_theme_mod( 'york_sidebarsocial_color', york_defaults( 'york_sidebarsocial_color' ) );
	$cta_background_color   = get_theme_mod( 'york_cta_background_color', york_defaults( 'york_cta_background_color' ) );
	$cta_text_color         = get_theme_mod( 'york_cta_text_color', york_defaults( 'york_cta_text_color' ) );
	$cta_shape_color        = get_theme_mod( 'york_cta_shape_color', york_defaults( 'york_cta_shape_color' ) );
	$overlay_color          = get_theme_mod( 'york_overlay_color', york_defaults( 'york_overlay_color' ) );
	$overlay_text_color     = get_theme_mod( 'york_overlay_text_color', york_defaults( 'york_overlay_text_color' ) );
	$cta_shape_color_rgb    = york_hex2rgb( $cta_shape_color );
	$portfolio_social_color = get_theme_mod( 'york_portfolio_social_color', york_defaults( 'york_portfolio_social_color' ) );
	$site_logo_width        = get_theme_mod( 'custom_logo_max_width', york_defaults( 'custom_logo_max_width' ) );
	$site_logo_mobile_width = get_theme_mod( 'custom_logo_mobile_max_width', york_defaults( 'custom_logo_mobile_max_width' ) );

	// Convert main text hex color to rgba.
	$theme_accent_color_rgb = york_hex2rgb( $theme_accent_color );

	// If the rgba values are empty return early.
	if ( empty( $theme_accent_color_rgb ) ) {
		return;
	}

	$rgb_10_opacity = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.075)', $theme_accent_color_rgb );
	$rgb_50_opacity = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.25)', $theme_accent_color_rgb );
	$rgb_15_opacity = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.15)', $cta_shape_color_rgb );

	$body_typography_color           = get_theme_mod( 'body_typography_color', york_defaults( 'body_typography_color' ) );
	$header_typography_color         = get_theme_mod( 'header_typography_color', york_defaults( 'header_typography_color' ) );
	$body_secondary_typography_color = get_theme_mod( 'body_secondary_typography_color', york_defaults( 'body_secondary_typography_color' ) );

	$body_font_family    = get_theme_mod( 'body_font_family', york_defaults( 'body_font_family' ) );
	$body_font_size      = get_theme_mod( 'body_font_size', york_defaults( 'body_font_size' ) );
	$body_letter_spacing = get_theme_mod( 'body_letter_spacing', york_defaults( 'body_letter_spacing' ) );
	$body_word_spacing   = get_theme_mod( 'body_word_spacing', york_defaults( 'body_word_spacing' ) );

	$pagetitle_font_family = get_theme_mod( 'pagetitle_font_family', york_defaults( 'pagetitle_font_family' ) );

	$css =
	'
	body .cat-links,
	body .cat-links a,
	body .entry-meta,
	body .entry-meta a,
	body .post-meta a,
	body .post-meta span,
	body .post-meta span:before,
	body .project-meta p,
	body .project-taxonomy,
	body .project-taxonomy a,
	body .project-taxonomy a:before,
	body .project-meta p:before,
	.project-meta a,
	.project-taxonomy a:not(:last-of-type)::after,
	body .widget_bean_tweets a.twitter-time-stamp  {
		color: ' . esc_attr( $body_secondary_typography_color ) . '!important;
	}

	body blockquote cite,
	body blockquote small {
		color: ' . esc_attr( $body_secondary_typography_color ) . ';
	}

	body {
		color:' . esc_attr( $body_typography_color ) . ';
	}

	body .site {
		background-color: #' . esc_attr( $background_color ) . ';
	}

	body .cta a::after {
		border-color: #' . esc_attr( $background_color ) . ';
	}

	.has-accent-color { color: ' . esc_attr( $theme_accent_color ) . '; }

	.has-accent-background-color { background-color: ' . esc_attr( $theme_accent_color ) . '; }

	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.main-navigation a,
	.mobile-navigation--arrow,
	body .project-caption, body.single .navigation a, body .main-navigation a {
		color:' . esc_attr( $header_typography_color ) . ';
	}

	@media (min-width: 600px) {
		body .cd-words-wrapper::after,
		body .cd-words-wrapper.selected {
			background-color: ' . esc_attr( $header_typography_color ) . ';
		}
	}

	body .sidebar {
		background-color: #' . esc_attr( $background_color ) . ';
	}

	body .cta a:after {
		border-color: ' . esc_attr( $background_color ) . ';
	}

	@media (min-width: 600px) {
		body .cd-words-wrapper.selected b {
			color: ' . esc_attr( $background_color ) . ';
		}
	}

	body .custom-logo-link img.custom-logo {
		width: ' . esc_attr( $site_logo_mobile_width ) . 'px;
	}

	@media (min-width: 600px) {
		body .custom-logo-link img.custom-logo {
			width: ' . esc_attr( $site_logo_width ) . 'px;
		}
	}

	body .share-toggle + label {
		background:' . esc_attr( $portfolio_social_color ) . ';
	}

	body .share-menu-item svg {
		fill:' . esc_attr( $portfolio_social_color ) . ';
	}

	body .project .overlay {
		background:' . esc_attr( $overlay_color ) . ';
	}

	body .project .overlay h3 {
		color:' . esc_attr( $overlay_text_color ) . ';
	}

	body .lightbox-play svg {
		fill:' . esc_attr( $overlay_text_color ) . ';
	}

	body .cta {
		background:' . esc_attr( $cta_background_color ) . ' !important;
	}

	body .cta h2 {
		color:' . esc_attr( $cta_text_color ) . ' !important;
	}

	body .cta h2 i {
		border-color:' . esc_attr( $rgb_15_opacity ) . ' !important;
	}

	body .cta svg {
		fill:' . esc_attr( $cta_shape_color ) . ' !important;
	}

	body h1.site-title {
		color: ' . esc_attr( $sitetitle_color ) . ' ;
		border-color: ' . esc_attr( $sitetitle_color ) . ' ;
	}

	.hamburger-inner, .hamburger-inner::before, .hamburger-inner::after {
		background-color:' . esc_attr( $navigationicon_color ) . ';
	}

	body .site-footer {
		color:' . esc_attr( $footertext_color ) . ';
	}

	body .site-footer .footer-navigation a {
		color:' . esc_attr( $footernav_a_color ) . ';
	}

	body #colophon.site-footer span a:hover {
		color:' . esc_attr( $footertexthover_color ) . ';
	}

	body .site-footer .social-navigation svg {
		fill:' . esc_attr( $footersocial_color ) . ';
	}

	body.single-portfolio .navigation a:hover {
		color:' . esc_attr( $theme_accent_color ) . ' !important;
		border-color:' . esc_attr( $theme_accent_color ) . ' !important;
	}

	body .sidebar .social-navigation .icon,
	body .widget-area .menu-social-menu-container .icon {
		fill:' . esc_attr( $sidebarsocial_color ) . ';
	}
	';

	if ( 19 !== $body_font_size ) {
		$css .= 'body { font-size: ' . esc_attr( $body_font_size ) . 'px; }';
	}

	if ( 'Default' !== $body_font_family ) {
		$css .= 'body { font-family: ' . esc_attr( $body_font_family ) . '; }';
	}

	if ( 0 !== $body_letter_spacing ) {
		$css .= 'body p { letter-spacing: ' . esc_attr( $body_letter_spacing ) . 'px; }';
	}

	if ( 0 !== $body_word_spacing ) {
		$css .= 'body p { word-spacing: ' . esc_attr( $body_word_spacing ) . 'px; }';
	}

	if ( 'Default' !== $pagetitle_font_family ) {
		$css .= 'h1, h2, h3, h4, h5, h6, body .project-caption, body.single .navigation a, body .main-navigation a { font-family: ' . esc_attr( $pagetitle_font_family ) . '; }';
	}

	// Minify.
	if ( function_exists( 'themebeans_minify_css' ) ) {
		$css = themebeans_minify_css( $css );
	}

	return wp_strip_all_tags( $css );
}

/**
 * Enqueue the Customizer styles on the front-end.
 */
function york_customizer_styles() {
	wp_add_inline_style( 'york-style', york_customizer_css() );
}
add_action( 'wp_enqueue_scripts', 'york_customizer_styles' );
