<?php
/**
 * The file for displaying the team member post content.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hero">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header

		<div class="project-description entry-content">
			<?php the_content(); ?>
		</div>

	</div>

	<?php york_post_thumbnail(); ?>

</article>

<div class="project-navigation">
	<?php
	the_post_navigation(
		array(
			'next_text' => '<span class="meta-nav" aria-hidden="true"></span><span class="screen-reader-text">' . esc_html__( 'Next post:', 'york-pro' ) . ' %title</span><span class="post-title">' . esc_html__( 'Next', 'york-pro' ) . '</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true"></span><span class="screen-reader-text">' . esc_html__( 'Previous post:', 'york-pro' ) . ' %title</span><span class="post-title">' . esc_html__( 'Previous', 'york-pro' ) . '</span>',
		)
	);
	?>
</div>
