<?php
/**
 * Team post type metabox(s).
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

if ( ! function_exists( 'york_metabox_team' ) ) :
	/**
	 * Create a standard 'team' post type metabox.
	 */
	function york_metabox_team() {

		$prefix = '_bean_';

		$meta_box = array(
			'id'          => 'team-meta',
			'title'       => esc_html__( 'Team Member Settings', 'york-pro' ),
			'description' => '',
			'page'        => 'team',
			'context'     => 'normal',
			'priority'    => 'high',
			'fields'      => array(
				array(
					'name'    => esc_html__( 'Grid Thumbnail Size:', 'york-pro' ),
					'desc'    => esc_html__( 'Select the size of the project thumbnail.', 'york-pro' ),
					'id'      => $prefix . 'portfolio_grid_size',
					'type'    => 'radio',
					'std'     => 'project-med',
					'options' => array(
						'project-sml' => esc_html__( 'Small', 'york-pro' ),
						'project-med' => esc_html__( 'Medium', 'york-pro' ),
						'project-lrg' => esc_html__( 'Large', 'york-pro' ),
						'project-xlg' => esc_html__( 'Xtra-Large', 'york-pro' ),
					),
				),
			),
		);
		york_add_meta_box( $meta_box );
	}

	add_action( 'add_meta_boxes', 'york_metabox_team' );

endif;
