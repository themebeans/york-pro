<?php
/**
 * Page post type metabox(s).
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

if ( ! function_exists( 'york_metabox_page' ) ) :
	/**
	 * Create a standard 'page' post type metabox.
	 */
	function york_metabox_page() {

		$prefix = '_bean_';

		// Set the context, based on whether or not Gutenberg is enabled.
		$context = ( function_exists( 'register_block_type' ) ) ? 'side' : 'normal';

		$meta_box = array(
			'id'       => 'bean-meta-box-page',
			'title'    => esc_html__( 'Page Settings', 'york-pro' ),
			'page'     => 'page',
			'context'  => $context,
			'priority' => 'high',
			'fields'   => array(
				array(
					'name' => esc_html__( 'Entry Header:', 'york-pro' ),
					'desc' => esc_html__( 'Add a header tagline to this page.', 'york-pro' ),
					'id'   => $prefix . 'entry_header',
					'type' => 'textarea',
					'std'  => '',
				),
			),
		);
		york_add_meta_box( $meta_box );
	}

	add_action( 'add_meta_boxes', 'york_metabox_page' );

endif;
