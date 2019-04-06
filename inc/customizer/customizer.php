<?php
/**
 * Theme Customizer functionality.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function york_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'settings'        => array( 'blogname' ),
			'render_callback' => 'york_customize_partial_blogname',
		)
	);

	/**
	 * Remove unnecessary sections and controls.
	 */
	$wp_customize->remove_section( 'background_image' );

	/**
	 * Add custom controls.
	 */
	require get_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . 'class-themebeans-range-control.php' );

	/**
	 * Top-Level Customizer sections and panels.
	 */
	$wp_customize->add_panel(
		'york_theme_options', array(
			'title'       => esc_html__( 'Theme Options', 'york-pro' ),
			'description' => esc_html__( 'Customize various options throughout the theme with the settings within this panel.', 'york-pro' ),
			'priority'    => 30,
		)
	);

	$wp_customize->add_section(
		'york_pro_typography', array(
			'title'    => esc_html__( 'Typography', 'york-pro' ),
			'priority' => 40,
		)
	);

	/**
	 * Add the site logo max-width options to the Site Identity section.
	 */
	$wp_customize->add_setting(
		'custom_logo_max_width', array(
			'default'           => york_defaults( 'custom_logo_max_width' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'custom_logo_max_width', array(
				'default'     => york_defaults( 'custom_logo_max_width' ),
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Max Width', 'york-pro' ),
				'description' => 'px',
				'section'     => 'title_tagline',
				'priority'    => 8,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 300,
					'step' => 2,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'custom_logo_mobile_max_width', array(
			'default'           => york_defaults( 'custom_logo_mobile_max_width' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'custom_logo_mobile_max_width', array(
				'default'     => york_defaults( 'custom_logo_mobile_max_width' ),
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Mobile Max Width', 'york-pro' ),
				'description' => 'px',
				'section'     => 'title_tagline',
				'priority'    => 9,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 200,
					'step' => 2,
				),
			)
		)
	);

	/**
	 * Theme Customizer Sections.
	 * For more information on Theme Customizer settings and default sections:
	 *
	 * @see https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
	 */

	/**
	 * Add the colors section.
	 */

	$wp_customize->add_setting(
		'header_typography_color', array(
			'default'           => york_defaults( 'header_typography_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'header_typography_color', array(
				'label'   => esc_html__( 'Heading Color', 'york-pro' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'body_typography_color', array(
			'default'           => york_defaults( 'body_typography_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'body_typography_color', array(
				'label'   => esc_html__( 'Text Color', 'york-pro' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'body_secondary_typography_color', array(
			'default'           => york_defaults( 'body_secondary_typography_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'body_secondary_typography_color', array(
				'label'   => esc_html__( 'Secondary Text Color', 'york-pro' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'york_sitetitle_color', array(
			'default'           => york_defaults( 'york_sitetitle_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'york_sitetitle_color', array(
				'label'   => esc_html__( 'Site Title', 'york-pro' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'york_navigationicon_color', array(
			'default'           => york_defaults( 'york_navigationicon_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'york_navigationicon_color', array(
				'label'   => esc_html__( 'Menu Icon', 'york-pro' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'york_sidebarsocial_color', array(
			'default'           => york_defaults( 'york_sidebarsocial_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'york_sidebarsocial_color', array(
				'label'   => esc_html__( 'Social Icons', 'york-pro' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'theme_accent_color', array(
			'default'           => york_defaults( 'theme_accent_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'theme_accent_color', array(
				'label'       => esc_html__( 'Accent Color', 'york-pro' ),
				'description' => esc_html__( 'Add a color to use throughout the theme and within the block editor color palette.', 'york-pro' ),
				'section'     => 'colors',
			)
		)
	);

	/**
	 * Add the header section.
	 */
	$wp_customize->add_section(
		'york_pro_flyout', array(
			'title' => esc_html__( 'Flyout', 'york-pro' ),
			'panel' => 'york_theme_options',
		)
	);

		$wp_customize->add_setting(
			'flyout_layout', array(
				'default'           => york_defaults( 'flyout_layout' ),
				'sanitize_callback' => 'york_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'flyout_layout', array(
				'type'    => 'select',
				'label'   => esc_html__( 'Flyout Layout', 'york-pro' ),
				'section' => 'york_pro_flyout',
				'choices' => array(
					'standard' => esc_html__( 'Standard', 'york-pro' ),
					'centered' => esc_html__( 'Vertically Centered', 'york-pro' ),
				),
			)
		);

		$wp_customize->add_setting(
			'nav_social_icons', array(
				'default'           => york_defaults( 'nav_social_icons' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'nav_social_icons', array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Navigation Social Icons', 'york-pro' ),
				'description' => esc_html__( 'Display the social icons below the site navigation in the sidebar flyout.', 'york-pro' ),
				'section'     => 'york_pro_flyout',
			)
		);

	/**
	 * Add the portfolio section.
	 */
	$wp_customize->add_section(
		'york_pro_portfolio', array(
			'title' => esc_html__( 'Portfolio', 'york-pro' ),
			'panel' => 'york_theme_options',
		)
	);

		$wp_customize->add_setting(
			'portfolio_posts_count', array(
				'default' => york_defaults( 'portfolio_posts_count' ),
			)
		);

		$wp_customize->add_control(
			'portfolio_posts_count', array(
				'type'        => 'number',
				'label'       => esc_html__( 'Portfolio Count', 'york-pro' ),
				'description' => esc_html__( 'Set the number of posts to display on the portfolio template. Use "-1" to load them all.', 'york-pro' ),
				'section'     => 'york_pro_portfolio',
			)
		);

		$wp_customize->add_setting(
			'york_portfolio_lightbox', array(
				'default'           => york_defaults( 'york_portfolio_lightbox' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'york_portfolio_lightbox', array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'PhotoSwipe Lightbox', 'york-pro' ),
				'description' => esc_html__( 'Add a JavaScript image gallery to single views for mobile and desktop viewports, with touch gestures, zooming and optimized asset delivery.', 'york-pro' ),
				'section'     => 'york_pro_portfolio',
			)
		);

		$wp_customize->add_setting(
			'portfolio_lightbox-colorscheme', array(
				'default'           => york_defaults( 'portfolio_lightbox-colorscheme' ),
				'sanitize_callback' => 'york_sanitize_select',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'portfolio_lightbox-colorscheme', array(
				'type'    => 'select',
				'label'   => esc_html__( 'Color Scheme', 'york-pro' ),
				'section' => 'york_pro_portfolio',
				'choices' => array(
					'light' => esc_html__( 'Light', 'york-pro' ),
					'dark'  => esc_html__( 'Dark', 'york-pro' ),
				),
			)
		);

		$wp_customize->add_setting(
			'york_portfolio_lazyload', array(
				'default'           => york_defaults( 'york_portfolio_lazyload' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'york_portfolio_lazyload', array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Portfolio Lazy Loading', 'york-pro' ),
				'description' => esc_html__( 'Boosts performance by delaying the loading of images outside of the visible viewport.', 'york-pro' ),
				'section'     => 'york_pro_portfolio',
			)
		);

		$wp_customize->add_setting(
			'york_social_sharing', array(
				'default'           => york_defaults( 'york_social_sharing' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'york_social_sharing', array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Portfolio Sharing', 'york-pro' ),
				'description' => esc_html__( 'Add a social flyout menu on the singular portfolio views.', 'york-pro' ),
				'section'     => 'york_pro_portfolio',
			)
		);

		$wp_customize->add_setting(
			'portfolio_single_navigation', array(
				'default'           => york_defaults( 'portfolio_single_navigation' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'portfolio_single_navigation', array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Portfolio Navigation', 'york-pro' ),
				'description' => esc_html__( 'Enable the "Next" project post-to-post navigation element on single portfolio pages.', 'york-pro' ),
				'section'     => 'york_pro_portfolio',
			)
		);

		$wp_customize->add_setting(
			'york_overlay_color', array(
				'default'           => york_defaults( 'york_overlay_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_overlay_color', array(
					'label'   => esc_html__( 'Overlay', 'york-pro' ),
					'section' => 'york_pro_portfolio',
				)
			)
		);

		$wp_customize->add_setting(
			'york_overlay_text_color', array(
				'default'           => york_defaults( 'york_overlay_text_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_overlay_text_color', array(
					'label'   => esc_html__( 'Overlay Text', 'york-pro' ),
					'section' => 'york_pro_portfolio',
				)
			)
		);

		$wp_customize->add_setting(
			'york_portfolio_social_color', array(
				'default'           => york_defaults( 'york_portfolio_social_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_portfolio_social_color', array(
					'label'   => esc_html__( 'Social Share Color', 'york-pro' ),
					'section' => 'york_pro_portfolio',
				)
			)
		);

	/**
	 * Add the footer section.
	 */
	$wp_customize->add_section(
		'york_theme_options_footer', array(
			'title' => esc_html__( 'Footer', 'york-pro' ),
			'panel' => 'york_theme_options',
		)
	);

		$wp_customize->add_setting(
			'powered_by_york', array(
				'default'           => york_defaults( 'powered_by_york' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'powered_by_york', array(
				'type'      => 'checkbox',
				'label'     => esc_html__( 'Powered by York Pro', 'york-pro' ),
				'section'   => 'york_theme_options_footer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'york_footer_cta', array(
				'default'           => york_defaults( 'york_footer_cta' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'york_footer_cta', array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Footer Call to Action', 'york-pro' ),
				'description' => esc_html__( 'Enable the footer call to action to display on all non-masonry pages. Add your text, link and select your settings from the options below.', 'york-pro' ),
				'section'     => 'york_theme_options_footer',
			)
		);

		$wp_customize->add_setting(
			'york_footer_cta_text1', array(
				'default'           => york_defaults( 'york_footer_cta_text1' ),
				'sanitize_callback' => 'york_sanitize_nohtml',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'york_footer_cta_text1', array(
				'type'            => 'text',
				'label'           => esc_html__( 'Text', 'york-pro' ),
				'description'     => esc_html__( 'Text:', 'york-pro' ),
				'section'         => 'york_theme_options_footer',
				'active_callback' => 'york_footer_cta_callback',
			)
		);

		$wp_customize->add_setting(
			'york_footer_cta_text2', array(
				'default'           => york_defaults( 'york_footer_cta_text2' ),
				'sanitize_callback' => 'york_sanitize_html',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'york_footer_cta_text2', array(
				'type'            => 'text',
				'section'         => 'york_theme_options_footer',
				'active_callback' => 'york_footer_cta_callback',
			)
		);

		$wp_customize->add_setting(
			'york_footer_cta_link', array(
				'default'           => york_defaults( 'york_footer_cta_link' ),
				'sanitize_callback' => 'york_sanitize_html',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'york_footer_cta_link', array(
				'type'            => 'url',
				'label'           => esc_html__( 'Link', 'york-pro' ),
				'description'     => esc_html__( 'Link:', 'york-pro' ),
				'section'         => 'york_theme_options_footer',
				'active_callback' => 'york_footer_cta_callback',
			)
		);

		$wp_customize->add_setting(
			'york_footer_cta_link_target', array(
				'default'           => york_defaults( 'york_footer_cta_link_target' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'york_footer_cta_link_target', array(
				'type'            => 'checkbox',
				'label'           => esc_html__( 'Open link in a new window', 'york-pro' ),
				'section'         => 'york_theme_options_footer',
				'active_callback' => 'york_footer_cta_callback',
			)
		);

		$wp_customize->add_setting(
			'york_footer_cta_shapes', array(
				'default'           => york_defaults( 'york_footer_cta_shapes' ),
				'sanitize_callback' => 'york_sanitize_checkbox',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'york_footer_cta_shapes', array(
				'type'            => 'checkbox',
				'label'           => esc_html__( 'Add shapes background', 'york-pro' ),
				'section'         => 'york_theme_options_footer',
				'active_callback' => 'york_footer_cta_callback',
			)
		);

		$wp_customize->add_setting(
			'york_cta_background_color', array(
				'default'           => york_defaults( 'york_cta_background_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_cta_background_color', array(
					'label'           => esc_html__( 'Background', 'york-pro' ),
					'section'         => 'york_theme_options_footer',
					'active_callback' => 'york_footer_cta_callback',
				)
			)
		);

		$wp_customize->add_setting(
			'york_cta_text_color', array(
				'default'           => york_defaults( 'york_cta_text_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_cta_text_color', array(
					'label'           => esc_html__( 'Text', 'york-pro' ),
					'section'         => 'york_theme_options_footer',
					'active_callback' => 'york_footer_cta_callback',
				)
			)
		);

		$wp_customize->add_setting(
			'york_cta_shape_color', array(
				'default'           => york_defaults( 'york_cta_shape_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_cta_shape_color', array(
					'label'           => esc_html__( 'Shapes', 'york-pro' ),
					'section'         => 'york_theme_options_footer',
					'active_callback' => 'york_footer_cta_callback',
				)
			)
		);

		$wp_customize->add_setting(
			'york_footertext_color', array(
				'default'           => york_defaults( 'york_footertext_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_footertext_color', array(
					'label'   => esc_html__( 'Footer Text', 'york-pro' ),
					'section' => 'york_theme_options_footer',
				)
			)
		);

		$wp_customize->add_setting(
			'york_footernav_a_color', array(
				'default'           => york_defaults( 'york_footernav_a_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_footernav_a_color', array(
					'label'   => esc_html__( 'Footer Link', 'york-pro' ),
					'section' => 'york_theme_options_footer',
				)
			)
		);

		$wp_customize->add_setting(
			'york_footertexthover_color', array(
				'default'           => york_defaults( 'york_footertexthover_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_footertexthover_color', array(
					'label'   => esc_html__( 'Footer Link Hover', 'york-pro' ),
					'section' => 'york_theme_options_footer',
				)
			)
		);

		$wp_customize->add_setting(
			'york_footersocial_color', array(
				'default'           => york_defaults( 'york_footersocial_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 'york_footersocial_color', array(
					'label'   => esc_html__( 'Social Icons', 'york-pro' ),
					'section' => 'york_theme_options_footer',
				)
			)
		);

	/**
	 * Typography.
	 */
	$wp_customize->add_setting(
		'pagetitle_font_family', array(
			'default'           => york_defaults( 'pagetitle_font_family' ),
			'sanitize_callback' => 'york_sanitize_nohtml',
		)
	);

	$wp_customize->add_control(
		'pagetitle_font_family', array(
			'type'        => 'select',
			'label'       => esc_html__( 'Heading Font', 'york-pro' ),
			'description' => esc_html__( 'Customize the default font family of the theme headings.', 'york-pro' ),
			'section'     => 'york_pro_typography',
			'choices'     => york_get_fonts(),
		)
	);

	$wp_customize->add_setting(
		'body_font_family', array(
			'default'           => york_defaults( 'body_font_family' ),
			'sanitize_callback' => 'york_sanitize_nohtml',
		)
	);

	$wp_customize->add_control(
		'body_font_family', array(
			'type'        => 'select',
			'label'       => esc_html__( 'Body Font', 'york-pro' ),
			'description' => esc_html__( 'Customize the default font family of the theme default body text.', 'york-pro' ),
			'section'     => 'york_pro_typography',
			'choices'     => york_get_fonts(),
		)
	);

	$wp_customize->add_setting(
		'body_font_size', array(
			'default'           => york_defaults( 'body_font_size' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'body_font_size', array(
				'default'     => york_defaults( 'body_font_size' ),
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Font Size', 'york-pro' ),
				'description' => 'px',
				'section'     => 'york_pro_typography',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 30,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'body_letter_spacing', array(
			'default'           => york_defaults( 'body_letter_spacing' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'body_letter_spacing', array(
				'default'     => york_defaults( 'body_letter_spacing' ),
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Letter Spacing', 'york-pro' ),
				'description' => 'px',
				'section'     => 'york_pro_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'body_word_spacing', array(
			'default'           => york_defaults( 'body_word_spacing' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'body_word_spacing', array(
				'default'     => york_defaults( 'body_word_spacing' ),
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Word Spacing', 'york-pro' ),
				'description' => 'px',
				'section'     => 'york_pro_typography',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
			)
		)
	);
}

add_action( 'customize_register', 'york_customize_register', 11 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @see york_customize_register()
 *
 * @return void
 */
function york_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Footer callback
 *
 * Only displays the current skin customizer options, if neccessary.
 *
 * @return boolean
 */
function york_footer_cta_callback( $control ) {
	if ( $control->manager->get_setting( 'york_footer_cta' )->value() === true ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function york_customize_preview_js() {
	wp_enqueue_script( 'york-customize-preview', get_theme_file_uri( '/assets/js/admin/customize-preview' . YORK_ASSET_SUFFIX . '.js' ), array( 'customize-preview' ), '@@pkg.version', true );
}
add_action( 'customize_preview_init', 'york_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function york_customize_controls_js() {
	wp_enqueue_script( 'york-customize-controls', get_theme_file_uri( '/assets/js/admin/customize-controls' . YORK_ASSET_SUFFIX . '.js' ), array( 'customize-controls' ), '@@pkg.version', true );
}
add_action( 'customize_controls_enqueue_scripts', 'york_customize_controls_js' );
