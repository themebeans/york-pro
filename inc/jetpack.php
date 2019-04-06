<?php
/**
 * Jetpack Compatibility
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

if ( ! function_exists( 'york_jetpack_setup' ) ) :
	/**
	 * JetPack compatibilites.
	 */
	function york_jetpack_setup() {
		/**
		 * Let JetPack manage the site logo.
		 * By adding theme support, we declare that this theme does use the default
		 * JetPack Site Logo functionality, if the module is activated.
		 *
		 * See: http://jetpack.me/support/site-logo/
		 */
		add_image_size( 'york-logo', 9999, 9999 );

		add_theme_support( 'site-logo', array( 'size' => 'york-logo' ) );

		/**
		 * Add theme support for Infinite Scroll.
		 *
		 * See: http://jetpack.me/support/infinite-scroll/
		 */
		add_theme_support(
			'infinite-scroll', array(
				'container' => 'hfeed',
				'render'    => 'york_scroll_render',
				'footer'    => 'page',
				'wrapper'   => false,
			)
		);
	}

	add_action( 'after_setup_theme', 'york_jetpack_setup' );

endif;

if ( ! function_exists( 'york_scroll_render' ) ) :
	/**
	 * Define the code that is used to render the posts added by Infinite Scroll.
	 * Create your own york_scroll_render() to override in a child theme.
	 */
	function york_scroll_render() {

		while ( have_posts() ) {
			the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'components/content', get_post_format() );

		}
	}
endif;

if ( ! function_exists( 'york_remove_infinitescroll_css' ) ) :
	/**
	 * Let's remove unnessary CSS loading.
	 */
	function york_remove_infinitescroll_css() {
		wp_deregister_style( 'the-neverending-homepage' );
	}

	add_action( 'wp_print_styles', 'york_remove_infinitescroll_css' );

	// Make sure Jetpack doesn't concatenate all its CSS.
	add_filter( 'jetpack_implode_frontend_css', '__return_false' );
endif;
