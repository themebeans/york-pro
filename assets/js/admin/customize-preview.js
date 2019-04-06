/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. This javascript will grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */

( function( $ ) {

	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a' ).html( newval );
		} );
	} );

	wp.customize( 'custom_logo', function( value ) {
		value.bind( function( to ) {

			if ( to ) {

				$( 'h1.site-title' ).css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				});

			} else {

				// Give it a few ms to remove the image before we show the title back.
				setTimeout( function() {
					$( 'h1.site-title' ).css({
						clip: 'auto',
						position: 'relative'
					});

					$( 'h1.site-title' ).removeClass( 'hidden' );
				}, 900 );
			}
		} );
	} );

	wp.customize( 'custom_logo_max_width', function( value ) {
		value.bind( function( to ) {
			var style, el;

			style = '<style class="custom_logo_max_width">@media (min-width: 600px) { body .custom-logo-link img.custom-logo { width: ' + to + 'px; } }</style>';

			el =  $( '.custom_logo_max_width' );

			if ( el.length ) {
				el.replaceWith( style );
			} else {
				$( 'head' ).append( style );
			}
		} );
	} );

	wp.customize( 'custom_logo_mobile_max_width', function( value ) {
		value.bind( function( to ) {
			var style, el;

			style = '<style class="custom_logo_mobile_max_width">@media (max-width: 599px) { body .custom-logo-link img.custom-logo { width: ' + to + 'px; } }</style>';

			el =  $( '.custom_logo_mobile_max_width' );

			if ( el.length ) {
				el.replaceWith( style );
			} else {
				$( 'head' ).append( style );
			}
		} );
	} );

	wp.customize( 'body_typography_color', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'portfolio_lightbox-colorscheme', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).attr('data-lightbox-scheme', newval );
		} );
	} );

	wp.customize( 'body_font_family', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="body_font_family"> body { font-family: ' + newval + '!important; }</style>';

			el =  $( '.body_font_family' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'pagetitle_font_family', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="pagetitle_font_family">h1, h2, h3, h4, h5, h6, body .project-caption, body.single .navigation a { font-family: ' + newval + '!important; }</style>';

			el =  $( '.pagetitle_font_family' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );


	wp.customize( 'body_font_size', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="body_font_size"> body { font-size: ' + newval + 'px !important; }</style>';

			el =  $( '.body_font_size' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'body_letter_spacing', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="body_letter_spacing"> body p { letter-spacing: ' + newval + 'px !important; }</style>';

			el =  $( '.body_letter_spacing' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'body_word_spacing', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="body_word_spacing"> body p { word-spacing: ' + newval + 'px!important; }</style>';

			el =  $( '.body_word_spacing' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'body_secondary_typography_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="body_secondary_typography_color">body .post-meta a, body .post-meta span, body .post-meta span:before, body .project-meta p, body .project-meta p:before, body .widget_bean_tweets a.twitter-time-stamp { color: ' + newval + '!important; }</style>';

			el =  $( '.body_secondary_typography_color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'body_typography_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="body_typography_color">body,body button,body input,body select,body textarea, p a:hover,body #content a:hover, body .widget-area a:hover, body #modal-content a:hover,body .tagcloud > a, body .tagcloud > a:hover, body .post-meta a:hover, body .project-meta a:hover { color: ' + newval + '!important; } body blockquote { border-color: ' + newval + '!important; }</style>';

			el =  $( '.body_typography_color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="background_color">body.logged-in, body .site { background: ' + newval + '!important; } body .cta a:after { border-color: ' + newval + '!important; } body .cd-words-wrapper.selected b { color: ' + newval + '!important; }</style>';

			el =  $( '.background-color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'body .sidebar' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'york_sitetitle_color', function( value ) {
		value.bind( function( newval ) {
			$('body h1.site-title').css('color', newval );
		} );
	} );

	wp.customize( 'header_typography_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'color', newval );
			$( '.main-navigation a, .mobile-navigation--arrow' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'york_sidebarsocial_color', function( value ) {
		value.bind( function( newval ) {
			$('body .sidebar .social-navigation svg, body .widget-area .menu-social-menu-container .icon').css('fill', newval );
		} );
	} );

	wp.customize( 'york_navigationicon_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="site-title-a-hover">.hamburger-inner, .hamburger-inner::before, .hamburger-inner::after { background: ' + newval + '!important; }</style>';

			el =  $( '.navigation-icon-color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'york_portfolio_social_color', function( value ) {
		value.bind( function( newval ) {
			$('body .share-toggle + label').css('background', newval );
			$('body .share-menu-item svg').css('fill', newval );
		} );
	} );

	wp.customize( 'york_footertext_color', function( value ) {
		value.bind( function( newval ) {
			$('body .site-footer').css('color', newval );
		} );
	} );

	wp.customize( 'york_footernav_a_color', function( value ) {
		value.bind( function( newval ) {
			$('body .site-footer .footer-navigation a').css('color', newval );
		} );
	} );

	wp.customize( 'york_footertexthover_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="site-footer-a-hover">body #colophon.site-footer span a:hover, body .site-footer .footer-navigation a:hover { color: ' + newval + '; }</style>';

			el =  $( '.site-footer-a-hover' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'york_footersocial_color', function( value ) {
		value.bind( function( newval ) {
			$('body .site-footer .social-navigation svg').css('fill', newval );
		} );
	} );

	wp.customize( 'powered_by_york', function( value ) {
		value.bind( function( newval ) {
			if ( true === newval ) {
				$( '.site-theme' ).removeClass( 'hidden' );
			} else {
				$( '.site-theme' ).addClass( 'hidden' );
			}
		} );
	} );

	wp.customize( 'york_footer_cta_text1', function( value ) {
		value.bind( function( newval ) {
			$( '.cta h2.intro-text' ).html( newval );
		} );
	} );

	wp.customize( 'york_footer_cta_text2', function( value ) {
		value.bind( function( newval ) {
			$( '.cta h2.lets-chat' ).html( newval );
		} );
	} );

	wp.customize( 'york_footer_cta_link', function( value ) {
		value.bind( function( newval ) {
			$('.cta .cta-link').attr('href', newval );
		} );
	} );

	wp.customize( 'york_footer_cta_link_target', function( value ) {
		value.bind( function( newval ) {
			if ( true === newval ) {
				$('.cta .cta-link').attr('target', '_blank' );
			} else {
				$('.cta .cta-link').attr('target', '_self' );
			}
		} );
	} );

	wp.customize( 'york_footer_cta_shapes', function( value ) {
		value.bind( function( newval ) {
			if ( true === newval ) {
				$( '.cta .float' ).removeClass( 'hidden' );
			} else {
				$( '.cta .float' ).addClass( 'hidden' );
			}
		} );
	} );

	wp.customize( 'nav_social_icons', function( value ) {
		value.bind( function( newval ) {
			if ( true === newval ) {
				$( '.sidebar .sidebar-social' ).removeClass( 'hidden' );
			} else {
				$( '.sidebar .sidebar-social' ).addClass( 'hidden' );
			}
		} );
	} );

	wp.customize( 'portfolio_single_navigation', function( value ) {
		value.bind( function( newval ) {
			if ( true === newval ) {
				$( '.project-navigation' ).removeClass( 'hidden' );
			} else {
				$( '.project-navigation' ).addClass( 'hidden' );
			}
		} );
	} );

	wp.customize( 'york_social_sharing', function( value ) {
		value.bind( function( newval ) {
			if ( true === newval ) {
				$( '.social-sharing' ).removeClass( 'hidden' );
			} else {
				$( '.social-sharing' ).addClass( 'hidden' );
			}
		} );
	} );

	wp.customize( 'portfolio_cta_button', function( value ) {
		value.bind( function( newval ) {
			$( '.project-form .button' ).html( newval );
		} );
	} );

	wp.customize( 'portfolio_cta_email', function( value ) { } );

	wp.customize( 'york_cta_text_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="cta-text-color">body .cta h2 { color: ' + newval + '!important; }</style>';

			el =  $( '.cta-text-color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'york_cta_shape_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="cta-shapes-color">body .cta svg { fill: ' + newval + '!important; }</style>';

			el =  $( '.cta-shapes-color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'york_cta_background_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="cta-background-color">body .cta { background: ' + newval + '!important; }</style>';

			el =  $( '.cta-background-color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'york_overlay_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="project-overlay-color">body .project .overlay { background: ' + newval + '!important; } .portfolio-professional__pinterest.portfolio-professional__pinterest--york-pro .icon { fill:' + newval + '!important; }</style>';

			el =  $( '.project-overlay-color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

	wp.customize( 'york_overlay_text_color', function( value ) {
		value.bind( function( newval ) {
			var style, el;
			style = '<style class="project-overlay-text-color">body .project .overlay h3 { color: ' + newval + '!important; } body .lightbox-play svg { fill: ' + newval + '!important; } .portfolio-professional__pinterest.portfolio-professional__pinterest--york-pro { background:' + newval + '!important; } </style>';

			el =  $( '.project-overlay-text-color' );

			if ( el.length ) {
				el.replaceWith( style ); // style element already exists, so replace it
			} else {
				$( 'head' ).append( style ); // style element doesn't exist so add it
			}
		} );
	} );

} )( jQuery );