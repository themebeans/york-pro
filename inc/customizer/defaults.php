<?php
/**
 * Customizer defaults
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

/**
 * Get the default option for York Pro's Customizer settings.
 *
 * @param  string|string $name Option key name to get.
 * @return mixin
 */
function york_defaults( $name ) {
	static $defaults;

	if ( ! $defaults ) {
		$defaults = apply_filters(
			'york_defaults', array(

				// Identity.
				'custom_logo_max_width'           => '90',
				'custom_logo_mobile_max_width'    => '90',

				// Colors.
				'body_typography_color'           => '#232323',
				'body_secondary_typography_color' => '#909090',

				'body_secondary_typography_color' => '#909090',
				'header_typography_color'         => '#232323',
				'theme_accent_color'              => '#ff5c5c',
				'york_sitetitle_color'            => '#232323',
				'york_navigationicon_color'       => '#000000',
				'york_sidebarsocial_color'        => '#232323',
				'york_overlay_color'              => '#ffffff',
				'york_overlay_text_color'         => '#232323',
				'york_portfolio_social_color'     => '#232323',
				'york_cta_background_color'       => '#1c1c1c',
				'york_cta_text_color'             => '#ffffff',
				'york_cta_shape_color'            => '#ffffff',
				'york_footertext_color'           => '#232323',
				'york_footernav_a_color'          => '#909090',
				'york_footertexthover_color'      => '#ff5c5c',
				'york_footersocial_color'         => '#232323',

				// Options.
				'flyout_layout'                   => 'centered',
				'nav_social_icons'                => true,
				'york_portfolio_lightbox'         => true,
				'portfolio_lightbox-colorscheme'  => 'light',
				'york_portfolio_lazyload'         => true,
				'york_social_sharing'             => true,
				'portfolio_single_navigation'     => true,
				'portfolio_posts_count'           => '-1',
				'powered_by_york'                 => true,
				'york_footer_cta'                 => true,
				'york_footer_cta_text1'           => esc_html__( 'Have a cool project?', 'york-pro' ),
				'york_footer_cta_text2'           => esc_html__( 'Then lets chat!', 'york-pro' ),
				'york_footer_cta_link'            => 'https://themebeans.com',
				'york_footer_cta_link_target'     => true,
				'york_footer_cta_shapes'          => true,

				// Typography.
				'body_font_family'                => 'Default',
				'body_font_size'                  => '19',
				'body_letter_spacing'             => '0',
				'body_word_spacing'               => '0',
				'pagetitle_font_family'           => 'Default',
			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
