<?php
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>
	<?php if ( ! is_404() ) : ?>

		<div id="page" class="site clearfix">

			<header id="masthead" class="site-header clearfix">

				<div class="site-header--left">
					<?php york_site_logo(); ?>
				</div>

				<div class="site-header--right">

					<div class="hamburger mobile-menu-toggle">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>

				</div>

			</header>

			<div id="content" class="site-content animsition clearfix">

				<?php $entry_header = get_post_meta( $post->ID, '_bean_entry_header', true ); ?>

				<?php if ( york_is_frontpage() || $entry_header ) : ?>

					<header class="hero entry-header">

						<div class="hero-wrapper">

							<?php
							if ( $entry_header ) :

								$allowed_html_array = array(
									'span'   => array(
										'class' => array(),
									),
									'b'      => array(
										'class' => array(),
									),
									'i'      => array(),
									'em'     => array(),
									'strong' => array(),
								);
								?>
								<h1 class="entry-title cd-headline letters type"><?php echo wp_kses( $entry_header, $allowed_html_array ); ?></h1>
							<?php else : ?>
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<?php endif; ?>

							<?php
							$content = $post->post_content;

							if ( york_is_frontpage() && $content ) {

								while ( have_posts() ) :

									the_post();
									?>

									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

										<div class="entry-content">
											<?php
												the_content();

												wp_link_pages(
													array(
														'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'york-pro' ),
														'after'  => '</div>',
													)
												);
											?>
										</div>

									</article>


									<?php
								endwhile;
							}
							?>

						</div>

					</header>

				<?php endif; ?>

	<?php
	endif;
