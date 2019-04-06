/**
* Theme javascript functions file.
*
*/
( function( a ) {
	"use strict";

	var
	body        = a("body"),
	active      = ("js--active"),
	projects    = a('#projects'),
	loaded      = ('js--loaded');

	/**
	* Test if inline SVGs are supported.
	* @link https://github.com/Modernizr/Modernizr/
	*/
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}

	/* Masonry for portfolio template */
	function masonry() {
		var container = projects.imagesLoaded( function() {
			container.isotope({
				itemSelector: '.project',
				layoutMode: 'masonry',
				masonry: {
					columnWidth: 50
				}
			});
		});
		container.infinitescroll({

			errorCallback : function(selector, msg) {
				a('.cta').addClass(active);
				a('.cta-spacer').addClass(active);
			},

			navSelector  : "#page_nav",
			nextSelector : "#page_nav a",
			itemSelector : ".project",
			loading : {
				finishedMsg: 'No more pages to load.'
			}
		},

		// Trigger Masonry as a callback
		function( newElements ) {
			var newElems = a( newElements ).addClass("js--loading");
			newElems.imagesLoaded(function(){
				newElems.each(function(a) {
					setTimeout(function() {
						newElems.eq(a).addClass("js--loaded");
					}, 150 * a);
				}),
				container.isotope( 'appended', newElems, true );
			});
		});
	}

	function scrollingDiv() {
		var
		$window = a(window),
		windowHeight    = a(window).height(),
		sidebarSection  = a(".sidebar--section"),
		scroll          = ("js--scroll");

		if($window.width() > 768) {
			sidebarSection.children().each(function(){
				if ( windowHeight < a(this).innerHeight() ) {
					a(this).parent().addClass(scroll);
				} else {
					a(this).parent().removeClass(scroll);
				}
			});
		}
	}

	function mobile_dropdowns() {
		var navigationHolder = a('.main-navigation');
		var dropdownOpener = a('.main-navigation .mobile-navigation--arrow, main-navigation h6, .main-navigation a.york-mobile-no-link');
		var animationSpeed = 200;

		if(dropdownOpener.length) {
			dropdownOpener.each(function() {
				a(this).on('tap click', function(e) {
					var dropdownToOpen = a(this).nextAll('ul').first();

					if(dropdownToOpen.length) {
						e.preventDefault();
						e.stopPropagation();

						var openerParent = a(this).parent('li');
						if(dropdownToOpen.is(':visible')) {
							dropdownToOpen.slideUp(animationSpeed);
							openerParent.removeClass('york-opened');
						} else {
							dropdownToOpen.slideDown(animationSpeed);
							openerParent.addClass('york-opened');
						}
					}

				});
			});
		}
	}

	/* Document Ready */
	a(document).ready(function() {

		scrollingDiv();

		supportsInlineSVG();

		mobile_dropdowns();

		if ( true === supportsInlineSVG() ) {
			document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
		}

		/* fitVids */
		if( body.hasClass( 'single-portfolio' ) ) {
			body.fitVids();
		}

		/* Close the flyout when you click a menu item in the mobile menu */
		a( '#site-navigation .menu-item a' ).on( 'click', function() {
			body.removeClass( 'nav-open' );
		} );

		a(".animsition").animsition({
			inClass: 'fade-in-up-sm',
			outClass: 'fade-out-up-sm',
			inDuration: 800,
			outDuration: 700,
			linkElement: 'a:not(#cancel-comment-reply-link)a:not(.outside-link):not(.customize-unpreviewable):not([target="_blank"]):not([href^="tel"]):not([href^="#"]):not([href^="mailto"]):not(.lightbox-link):not(.comment-reply-link):not(.input-control submit):not(.ab-item)',
			loading: false,
			unSupportCss: [
			'animation-duration',
			'-webkit-animation-duration',
			'-o-animation-duration'
			],
		});

		a( '.mobile-menu-toggle' ).on( 'click', function() {
			body.toggleClass( 'nav-open' );
		} );

		a( '#nav-close' ).on( 'click', function() {
			body.toggleClass( 'nav-open' );
		} );

		a('.subscribe-field').bind('focus blur', function () {
			a(this).closest('.mc4wp-subscribe-wrapper').toggleClass('js--focus');
		});

		a(".subscribe-field").hover( function () {
			a(this).closest('.mc4wp-subscribe-wrapper').toggleClass('js--hover');
		});

		/* Project Lazy Loading */
		if( a(body).hasClass('single-portfolio') ) {
			a(".project-assets .lazy-load img").unveil(25, function() {
				a(this).load(function() {
					this.style.opacity = 1;
				});
			});
		}

	});

	a(window).load(function() {
		if ( body.is( '.york-front-page, .tax-portfolio_category, .tax-portfolio_tag' ) ) {
			masonry();
		}
	});

	/* Resize functions */
	a(window).resize(function(){
		scrollingDiv();
	});

} )( jQuery );