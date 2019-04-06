<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $entry_header = get_post_meta( $post->ID, '_bean_entry_header', true ); ?>

	<?php if ( ! $entry_header ) { ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
	<?php } ?>

	<?php york_post_thumbnail(); ?>

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
