<?php
/**
 * The file for displaying the portfolio meta.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

// Log the view counts.
york_set_post_views( get_the_ID() );

/*
 * Set variables for the content below.
 */
$portfolio_cats = get_post_meta( $post->ID, '_bean_portfolio_cats', true );
$portfolio_tags = get_post_meta( $post->ID, '_bean_portfolio_tags', true ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hero">

		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<?php if ( 'on' === $portfolio_cats || 'on' === $portfolio_tags ) { ?>

				<div class="project-taxonomy">
					<p><?php york_entry_taxonomies(); ?></p>
				</div>

			<?php } ?>

		</header>

		<div class="project-description entry-content">
			<?php the_content(); ?>
			<?php get_template_part( 'components/portfolio/portfolio-meta' ); ?>
		</div>
	</div>

	<?php york_gallery( $post->ID, 'york-featured-image' ); ?>

</article>

<?php
if ( get_theme_mod( 'portfolio_single_navigation', york_defaults( 'portfolio_single_navigation' ) ) || is_customize_preview() ) :

	$visibility = ( false === get_theme_mod( 'portfolio_single_navigation', york_defaults( 'portfolio_single_navigation' ) ) ) ? 'hidden' : '';

	$is_last = null;
	// Check if this is the last post. If it is, let's loop back to the first.
	if ( ! get_adjacent_post( false, '', true ) ) {
		$is_last = 'is-last';
	}
	?>

	<div class="project-navigation <?php echo esc_attr( $visibility . '' . $is_last ); ?>">
		<?php
		the_post_navigation(
			array(
				'prev_text' => '<span class="meta-nav" aria-hidden="true"></span><span class="screen-reader-text">' . esc_html__( 'Next post:', 'york-pro' ) . ' %title</span><span class="post-title">' . esc_html__( 'Next', 'york-pro' ) . '</span>',
				'next_text' => '<span class="meta-nav" aria-hidden="true"></span><span class="screen-reader-text">' . esc_html__( 'Previous post:', 'york-pro' ) . ' %title</span><span class="post-title">' . esc_html__( 'Previous', 'york-pro' ) . '</span>',
			)
		);

		// Check if this is the last post. If it is, let's loop back to the first.
		if ( ! get_adjacent_post( false, '', true ) ) {

			$args = array(
				'post_type'      => 'portfolio',
				'posts_per_page' => '1',
			);

			$wp_query = new WP_Query( apply_filters( 'york_portfolio_pagination_args', $args ) );

			if ( $wp_query->have_posts() ) :

				/* Start the Loop */
				while ( $wp_query->have_posts() ) :
					$wp_query->the_post();
				?>

					<nav class="navigation post-navigation post-navigation--last">
						<?php echo '<a href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Next', 'york-pro' ) . '</a>'; ?>
					</nav>

				<?php
				endwhile;

			endif;

			wp_reset_query();
		}
		?>

	</div>

<?php endif; ?>

<?php
get_template_part( 'components/portfolio/portfolio-sharing' );
