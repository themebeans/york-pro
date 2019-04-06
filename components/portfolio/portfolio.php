<?php
/**
 * The template for displaying the portfolio grid.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

?>

<div id="projects" class="projects clearfix">

	<?php
	// Pull pagination count setting from the Customizer.
	$portfolio_posts_count = get_theme_mod( 'portfolio_posts_count', york_defaults( 'portfolio_posts_count' ) );

	// Pull pagination from the WordPress reading settings.
	$paged = 1;

	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	}

	if ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	}
	?>

	<?php
	if ( is_tax() ) {

		global $query_string;

		query_posts( "{$query_string}&posts_per_page=-1" );

		if ( have_posts() ) :

			while ( have_posts() ) :

				the_post();

				if ( has_post_thumbnail() ) :

					get_template_part( 'components/portfolio/portfolio-loop' );

				endif;

			endwhile;
		endif;

		wp_reset_postdata();
		?>

	<?php
	} else {

		do_action( 'york_before_portfolio' );

		$args = array(
			'post_type'      => 'portfolio',
			'paged'          => $paged,
			'posts_per_page' => $portfolio_posts_count,
		);

		$wp_query = new WP_Query( apply_filters( 'york_portfolio_args', $args ) );

		if ( $wp_query->have_posts() ) :

			/* Start the Loop */
			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();

				if ( has_post_thumbnail() ) :

					get_template_part( 'components/portfolio/portfolio-loop' );

					endif;

				endwhile;

		endif;

		wp_reset_postdata();

		do_action( 'york_after_portfolio' );

	}
	?>

	<div id="page_nav">
		<?php next_posts_link(); ?>
	</div>

</div>
