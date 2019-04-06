<?php
/**
 * Add customizer colors to the block editor.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

/**
 * Add customizer colors to the block editor.
 */
function york_editor_customizer_generated_values() {

	// Retrieve colors from the Customizer.
	$background_color    = get_theme_mod( 'background_color', '#ffffff' );
	$accent              = get_theme_mod( 'theme_accent_color', york_defaults( 'theme_accent_color' ) );
	$text_color          = get_theme_mod( 'body_typography_color', york_defaults( 'body_typography_color' ) );
	$heading_color       = get_theme_mod( 'header_typography_color', york_defaults( 'header_typography_color' ) );
	$body_font           = get_theme_mod( 'body_font_family', york_defaults( 'body_font_family' ) );
	$body_font_size      = get_theme_mod( 'body_font_size', york_defaults( 'body_font_size' ) );
	$body_letter_spacing = get_theme_mod( 'body_letter_spacing', york_defaults( 'body_letter_spacing' ) );
	$body_word_spacing   = get_theme_mod( 'body_word_spacing', york_defaults( 'body_word_spacing' ) );
	$heading_font        = get_theme_mod( 'pagetitle_font_family', york_defaults( 'pagetitle_font_family' ) );

	$css  = '';
	$css .= '.block-editor__container { background-color: #' . esc_attr( $background_color ) . '; }';
	$css .= '.editor-styles-wrapper.edit-post-visual-editor { color: ' . esc_attr( $text_color ) . '; }';
	$css .= '.wp-block-heading h1, .wp-block-heading h2, .wp-block-heading h3, .wp-block-heading h4, .wp-block-heading h5, .wp-block-heading h6 { color: ' . esc_attr( $heading_color ) . ' !important; }';
	$css .= '.editor-styles-wrapper.edit-post-visual-editor .editor-post-title__block .editor-post-title__input { color: ' . esc_attr( $heading_color ) . '; }';

	// Typography.
	if ( 19 !== $body_font_size ) {
		$css .= 'div.editor-styles-wrapper { font-size: ' . esc_attr( $body_font_size ) . 'px; } div.editor-styles-wrapper p { font-size: ' . esc_attr( $body_font_size ) . 'px; }';
	}

	if ( 'Default' !== $body_font ) {
		$css .= 'div.editor-styles-wrapper { font-family: ' . esc_attr( $body_font ) . '; }';
	}

	if ( 0 !== $body_letter_spacing ) {
		$css .= 'div.editor-styles-wrapper p { letter-spacing: ' . esc_attr( $body_letter_spacing ) . 'px; }';
	}

	if ( 0 !== $body_word_spacing ) {
		$css .= 'div.editor-styles-wrapper p { word-spacing: ' . esc_attr( $body_word_spacing ) . 'px; }';
	}

	if ( 'Default' !== $heading_font ) {
		$css .= '.editor-styles-wrapper .wp-block-heading h1, .editor-styles-wrapper .wp-block-heading h2, .editor-styles-wrapper .wp-block-heading h3, .editor-styles-wrapper .wp-block-heading h4, .editor-styles-wrapper .wp-block-heading h5, .editor-styles-wrapper .wp-block-heading h6 { font-family: ' . esc_attr( $heading_font ) . '; }';
		$css .= '.editor-styles-wrapper.edit-post-visual-editor .editor-post-title__block .editor-post-title__input { font-family: ' . esc_attr( $heading_font ) . '; }';
	}

	return wp_strip_all_tags( apply_filters( 'york_editor_customizer_generated_values', $css ) );
}


/**
 * Enqueue Customizer settings into the block editor.
 */
function york_editor_customizer_styles() {

	// Register Customizer styles within the editor to use for inline additions.
	wp_register_style( 'york-editor-customizer-styles', false, '@@pkg.version', 'all' );

	// Enqueue the Customizer style.
	wp_enqueue_style( 'york-editor-customizer-styles' );

	// Add custom colors to the editor.
	wp_add_inline_style( 'york-editor-customizer-styles', york_editor_customizer_generated_values() );
}
add_action( 'enqueue_block_editor_assets', 'york_editor_customizer_styles' );
