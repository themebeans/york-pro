<?php
/**
 * Fonts functionality
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

/**
 * Returns an array of Google Font options
 *
 * @return array of font styles.
 */
function york_get_fonts() {

	$fonts = array(
		'Default'          => 'Default',
		'Abril Fatface'    => 'Abril Fatface',
		'georgia'          => 'Georgia',
		'helvetica'        => 'Helvetica',
		'PlayFair Display' => 'PlayFair Display',
		'Lato'             => 'Lato',
		'Karla'            => 'Karla',
		'Roboto'           => 'Roboto',
		'Montserrat'       => 'Montserrat',
		'Merriweather'     => 'Merriweather',
	);

	return apply_filters( 'york_fonts', $fonts );
}
