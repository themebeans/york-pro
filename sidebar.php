<?php
/**
 * The sidebar containing the flyout widget area.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

// Add a class if there is no widget area active.
$is_active = ( ! is_active_sidebar( 'sidebar-1' ) ) ? 'no-widget-area' : 'has-widget-area'; ?>

<div id="nav-close" class="nav-close-overlay"></div>

<aside id="secondary" class="sidebar <?php echo esc_attr( $is_active ); ?>">

	<div class="hamburger hamburger--spin mobile-menu-toggle close-toggle">
		<div class="hamburger-box">
			<div class="hamburger-inner"></div>
		</div>
	</div>

	<div class="sidebar--section">

		<div class="sidebar--section-inner">

			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="site-navigation" class="main-navigation nav primary" aria-label="<?php esc_attr_e( 'Primary Menu', 'york-pro' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
							'depth'          => '2',
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'walker'         => new YorkClassMobileNavigationWalker(),
						)
					);
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php
			if ( true === get_theme_mod( 'nav_social_icons', york_defaults( 'nav_social_icons' ) ) || is_customize_preview() ) :
				/*
				 * If selected in the Customizer.
				 * The visibility classes area used to show/hide the elements in the Customizer live preview.
				 */
				$visibility = ( false === get_theme_mod( 'nav_social_icons', york_defaults( 'nav_social_icons' ) ) ) ? 'hidden' : '';
				?>

				<div class="sidebar-social <?php echo esc_attr( $visibility ); ?>">
					<?php york_social_navigation(); ?>
				</div>

			<?php endif; ?>

		</div>

	</div>

	<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) :

		$flyout_layout = ( 'standard' === get_theme_mod( 'flyout_layout', york_defaults( 'flyout_layout' ) ) ) ? 'not-vertically-centered' : '';
		?>

		<div class="sidebar--section widget-area <?php echo esc_attr( $flyout_layout ); ?>">
			<div class="sidebar--section-inner">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		</div>
	<?php endif; ?>

</aside>
