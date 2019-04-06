/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

( function() {

	wp.customize.bind( 'ready', function() {

		/**
		 * Function to hide/show Customizer options, based on another control.
		 *
		 * Parent option, Affected Control, Value which affects the control.
		 */
		function customizer_option_display( parent_setting, affected_control, value, speed ) {
			wp.customize( parent_setting, function( setting ) {
				wp.customize.control( affected_control, function( control ) {
					var visibility = function() {
						if ( value === setting.get() ) {
							control.container.slideDown( speed );
						} else {
							control.container.slideUp( speed );
						}
					};

					visibility();
					setting.bind( visibility );
				});
			});
		}

		/**
		 * Function to hide/show Customizer options, based on another control.
		 *
		 * Parent option, Affected Control, Value which affects the control.
		 */
		function customizer_image_option_display( parent_setting, affected_control, speed ) {
			wp.customize( parent_setting, function( setting ) {
				wp.customize.control( affected_control, function( control ) {
					var visibility = function() {
						if ( setting.get() && 'none' !== setting.get() && '0' !== setting.get() ) {
							control.container.slideDown( speed );
						} else {
							control.container.slideUp( speed );
						}
					};

					visibility();
					setting.bind( visibility );
				});
			});
		}

		/**
		 * Function to hide/show Customizer options, based on another control.
		 *
		 * Parent option, Affected Control, Value which affects the control.
		 */
		function customizer_no_image_option_display( parent_setting, affected_control, speed ) {
			wp.customize( parent_setting, function( setting ) {
				wp.customize.control( affected_control, function( control ) {
					var visibility = function() {
						if ( setting.get() && 'none' !== setting.get() && '0' !== setting.get() ) {
							control.container.slideUp( speed );
						} else {
							control.container.slideDown( speed );
						}
					};

					visibility();
					setting.bind( visibility );
				});
			});
		}

		// Only show the logo max width options, if a logo is uploaded.
		customizer_image_option_display( 'custom_logo', 'custom_logo_max_width', 140 );
		customizer_image_option_display( 'custom_logo', 'custom_logo_mobile_max_width', 140 );
		customizer_no_image_option_display( 'custom_logo', 'york_sitetitle_color', 140 );

		// Show the Color Scheme setting, if the lightbox is enabled.
		customizer_option_display( 'york_portfolio_lightbox', 'portfolio_lightbox-colorscheme', true, 140 );
	});

} )( jQuery );