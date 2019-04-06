<?php
/**
 * The file for displaying the portfolio sharing element.
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

if ( get_theme_mod( 'york_social_sharing', york_defaults( 'york_social_sharing' ) ) || is_customize_preview() ) : ?>

	<?php $visibility = ( false === get_theme_mod( 'york_social_sharing', york_defaults( 'york_social_sharing' ) ) ) ? 'hidden' : ''; ?>

	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>

	<div class="social-sharing <?php echo esc_attr( $visibility ); ?>">

		<input class="share-toggle" id="share-menu" type="checkbox">

		<label for="share-menu">
			<?php echo wp_kses( york_get_svg( array( 'icon' => 'share' ) ), york_svg_allowed_html() ); ?>
			<?php echo wp_kses( york_get_svg( array( 'icon' => 'close' ) ), york_svg_allowed_html() ); ?>
		</label>

		<ul>
			<li class="share-menu-item">
				<a class="outside-link" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[url]=<?php the_permalink(); ?>&amp;&amp;p[images][0]=','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">
					<div>
						<?php echo wp_kses( york_get_svg( array( 'icon' => 'facebook-mask' ) ), york_svg_allowed_html() ); ?>
					</div>
				</a>
			</li>
			<li class="share-menu-item">
				<a href="http://twitter.com/share?text=<?php the_title(); ?>" target="_blank">
					<div>
						<?php echo wp_kses( york_get_svg( array( 'icon' => 'twitter-mask' ) ), york_svg_allowed_html() ); ?>
					</div>
				</a>
			</li>
			<li class="share-menu-item">
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank">
					<div>
						<?php echo wp_kses( york_get_svg( array( 'icon' => 'google-mask' ) ), york_svg_allowed_html() ); ?>
					</div>
				</a>
			</li>
			<li class="share-menu-item">
				<a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_url( $feat_image ); ?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" target="_blank">
					<div>
						<?php echo wp_kses( york_get_svg( array( 'icon' => 'pinterest-mask' ) ), york_svg_allowed_html() ); ?>
					</div>
				</a>
			</li>
		</ul>

	</div>
<?php
endif;

