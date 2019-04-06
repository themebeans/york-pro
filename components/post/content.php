<?php
/**
 * Template part for displaying the singular post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php
		if ( is_sticky() && is_home() ) :
			echo wp_kses( york_get_svg( array( 'icon' => 'sticky' ) ), york_svg_allowed_html() );
		endif;

		york_entry_categories();

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>

		<?php york_entry_meta(); ?>

	</header>

	<?php york_post_thumbnail(); ?>

	<div class="entry-content">

		<?php
		the_content(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '@@pkg.textdomain' ),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', '@@pkg.textdomain' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>

		<?php if ( is_singular( 'post' ) ) : ?>
			<?php get_template_part( 'components/post/biography' ); ?>
		<?php endif; ?>

	</div>

</article>
