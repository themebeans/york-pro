<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     York Pro
 * @link        https://themebeans.com/themes/york-pro
 */

if ( ! defined( 'YORK_DEBUG' ) ) :
	/**
	 * Check to see if development mode is active.
	 * If set to false, the theme will load un-minified assets.
	 */
	define( 'YORK_DEBUG', true );
endif;

if ( ! defined( 'YORK_ASSET_SUFFIX' ) ) :
	/**
	 * If not set to true, let's serve minified .css and .js assets.
	 * Don't modify this, unless you know what you're doing!
	 */
	if ( ! defined( 'YORK_DEBUG' ) || true === YORK_DEBUG ) {
		define( 'YORK_ASSET_SUFFIX', null );
	} else {
		define( 'YORK_ASSET_SUFFIX', '.min' );
	}
endif;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function york_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on York Pro, use a find and replace
	 * to change 'york-pro' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'york-pro', get_parent_theme_file_path( '/languages' ) );

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Filter York Pro's custom-background support argument.
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 * }
	 */
	add_theme_support(
		'custom-background',
		apply_filters(
			'york_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'york-featured-image', 9999, 9999, false );

	/*
	 * This theme uses wp_nav_menu() in the following locations.
	 */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'york-pro' ),
			'footer'  => esc_html__( 'Footer Menu', 'york-pro' ),
			'social'  => esc_html__( 'Social Menu', 'york-pro' ),
		)
	);

	/*
	 * Switch default core yorkup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'video',
		)
	);

	/*
	 * Enable support for the WordPress default Theme Logo
	 * See: https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo', array(
			'height'      => 200,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/*
	 * Enable support for Customizer Selective Refresh.
	 * See: https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support responsive embedded content
	 * See: https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#responsive-embedded-content
	 */
	add_theme_support( 'responsive-embeds' );

	/**
	 * Custom colors for use in the editor.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
	 */
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Black', 'york-pro' ),
				'slug'  => 'black',
				'color' => '#2a2a2a',
			),
			array(
				'name'  => esc_html__( 'Gray', 'york-pro' ),
				'slug'  => 'gray',
				'color' => '#727477',
			),
			array(
				'name'  => esc_html__( 'Light Gray', 'york-pro' ),
				'slug'  => 'light-gray',
				'color' => '#f8f8f8',
			),
			array(
				'name'  => esc_html__( 'White', 'york-pro' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Titan White', 'york-pro' ),
				'slug'  => 'titan-white',
				'color' => '#E0D8E2',
			),
			array(
				'name'  => esc_html__( 'Tropical Blue', 'york-pro' ),
				'slug'  => 'tropical-blue',
				'color' => '#C5DCF3',
			),
			array(
				'name'  => esc_html__( 'Peppermint', 'york-pro' ),
				'slug'  => 'peppermint',
				'color' => '#d0eac4',
			),
			array(
				'name'  => esc_html__( 'Iceberg', 'york-pro' ),
				'slug'  => 'iceberg',
				'color' => '#D6EFEE',
			),
			array(
				'name'  => esc_html__( 'Bridesmaid', 'york-pro' ),
				'slug'  => 'bridesmaid',
				'color' => '#FBE7DD',
			),
			array(
				'name'  => esc_html__( 'Pipi', 'york-pro' ),
				'slug'  => 'pipi',
				'color' => '#fbf3d6',
			),
			array(
				'name'  => esc_html__( 'Accent', 'york-pro' ),
				'slug'  => 'accent',
				'color' => esc_html( get_theme_mod( 'theme_accent_color', york_defaults( 'theme_accent_color' ) ) ),
			),
		)
	);

	/**
	 * Custom font sizes for use in the editor.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-font-sizes
	 */
	add_theme_support(
		'editor-font-sizes', array(
			array(
				'name'      => esc_html__( 'Small', 'york-pro' ),
				'shortName' => esc_html__( 'S', 'york-pro' ),
				'size'      => 16,
				'slug'      => 'small',
			),
			array(
				'name'      => esc_html__( 'Medium', 'york-pro' ),
				'shortName' => esc_html__( 'M', 'york-pro' ),
				'size'      => 19,
				'slug'      => 'medium',
			),
			array(
				'name'      => esc_html__( 'Large', 'york-pro' ),
				'shortName' => esc_html__( 'L', 'york-pro' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => esc_html__( 'Huge', 'york-pro' ),
				'shortName' => esc_html__( 'XL', 'york-pro' ),
				'size'      => 30,
				'slug'      => 'huge',
			),
		)
	);

	// Add support for default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'assets/css/style-editor' . YORK_ASSET_SUFFIX . '.css' );

	// Enqueue fonts in the editor.
	add_editor_style( york_fonts_url() );

	/*
	 * Define starter content for the theme.
	 * See: https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
	 */
	$starter_content = array(
		'options'     => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
		),

		'attachments' => array(
			'image-logo' => array(
				'post_title' => _x( 'Logo', 'Theme starter content', 'york-pro' ),
				'file'       => 'inc/customizer/images/logo.png',
			),
		),

		'theme_mods'  => array(
			'show_on_front'         => 'page',
			'blogdescription'       => _x( 'York Pro, A beautiful portfolio WordPress theme by ThemeBeans', 'Theme starter content', 'york-pro' ),
			'custom_logo_max_width' => york_defaults( 'custom_logo_max_width' ),
		),

		'widgets'     => array(
			'sidebar-1' => array(
				'text_about',
			),
		),

		'posts'       => array(
			'home'  => array(
				'post_title' => _x( 'Portfolio', 'Theme starter content', 'york-pro' ),
			),
			'about' => array(
				'post_title' => _x( 'About Me', 'Theme starter content', 'york-pro' ),
			),
			'blog'  => array(),
		),

		'nav_menus'   => array(

			'primary' => array(
				'name'  => esc_html__( 'Primary', 'york-pro' ),
				'items' => array(
					'page_home',
					'page_about',
				),
			),

			'footer'  => array(
				'name'  => esc_html__( 'Footer', 'york-pro' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_contact',
				),
			),

			'social'  => array(
				'name'  => esc_html__( 'Social Menu', 'york-pro' ),
				'items' => array(
					'link_twitter',
					'link_instagram',
					'link_facebook',
				),
			),
		),
	);

	/**
	 * Filters York Pro array of starter content.
	 *
	 * @since York Pro 1.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'york_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'york_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function york_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'york_content_width', 700 );
}
add_action( 'after_setup_theme', 'york_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function york_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Flyout', 'york-pro' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears on the theme flyout sidebar.', 'york-pro' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'york-pro' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Appears at the top of the site footer.', 'york-pro' ),
			'before_widget' => '<aside id="%1$s" class="widget footer-widget %2$s clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'york_widgets_init' );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function york_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js');})(document.documentElement);</script>\n";
}
add_action( 'wp_enqueue_scripts', 'york_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function york_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'york-fonts', york_fonts_url(), false, '@@pkg.version', 'all' );

	// Load theme styles.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'york-style', get_parent_theme_file_uri( '/style' . YORK_ASSET_SUFFIX . '.css' ), false, '@@pkg.version' );
		wp_enqueue_style( 'york-child-style', get_theme_file_uri( '/style.css' ), false, '@@pkg.version', 'all' );
	} else {
		wp_enqueue_style( 'york-style', get_theme_file_uri( '/style' . YORK_ASSET_SUFFIX . '.css' ), false, '@@pkg.version' );
	}

	// Load the standard WordPress comments reply javascript.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Now let's check the same for the scripts.
	 */
	if ( SCRIPT_DEBUG || YORK_DEBUG ) {

		// Vendor scripts.
		wp_enqueue_script( 'unviel', get_theme_file_uri( '/assets/js/vendors/unveil.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/vendors/isotope.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'infinitescroll', get_theme_file_uri( '/assets/js/vendors/infinitescroll.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'fitvids', get_theme_file_uri( '/assets/js/vendors/fitvids.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'photoswipe', get_theme_file_uri( '/assets/js/vendors/photoswipe.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'photoswipe-ui', get_theme_file_uri( '/assets/js/vendors/photoswipe-ui-default.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'lity', get_theme_file_uri( '/assets/js/vendors/lity.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'animsition', get_theme_file_uri( '/assets/js/vendors/animsition.js' ), array( 'jquery' ), '@@pkg.version', true );

		// Custom scripts.
		wp_enqueue_script( 'york-typography', get_theme_file_uri( '/assets/js/custom/typography.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'york-global', get_theme_file_uri( '/assets/js/custom/global.js' ), array( 'jquery', 'masonry', 'imagesloaded' ), '@@pkg.version', true );

		$translation_handle = 'york-global'; // Variable for wp_localize_script.

	} else {
		wp_enqueue_script( 'york-vendors-min', get_theme_file_uri( '/assets/js/vendors.min.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'york-custom-min', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery', 'masonry', 'imagesloaded' ), '@@pkg.version', true );

		$translation_handle = 'york-custom-min'; // Variable for wp_localize_script for minified javascript.
	}

	// Translations in the custom functions.
	$translation_array = array(
		'york_comment' => esc_html__( 'Write a comment . . .', 'york-pro' ),
		'york_author'  => esc_html__( 'Name', 'york-pro' ),
		'york_email'   => esc_html__( 'email@example.com', 'york-pro' ),
	);

	wp_localize_script( $translation_handle, 'york_translation', $translation_array );

}
add_action( 'wp_enqueue_scripts', 'york_scripts' );

/**
 * Remove the duplicate stylesheet enqueue for older versions of the child theme.
 *
 * Since v2.1.2 York Pro has a built-in auto-loader for loading the appropriate
 * parent theme stylesheet, without the need for a wp_enqueue_scripts function within
 * the child theme. This means that stylesheets will "just work" and there's less chance
 * that users will accidently disrupt stylesheet loading.
 */
function york_remove_duplicate_child_parent_enqueue_scripts() {
	remove_action( 'wp_enqueue_scripts', 'york_child_scripts', 10 );
}
add_action( 'init', 'york_remove_duplicate_child_parent_enqueue_scripts' );

if ( ! function_exists( 'york_fonts_url' ) ) :
	/**
	 * Register custom fonts.
	 */
	function york_fonts_url() {
		$fonts_url     = '';
		$font_families = array();

		/*
		 * Translators: If there are characters in your language that are not
		 * supported by Playfair Display, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$playfair = esc_html_x( 'on', 'Playfair Display font: on or off', 'york-pro' );

		/*
		 * Translators: If there are characters in your language that are not
		 * supported by Lora, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$lora = esc_html_x( 'on', 'Lora font: on or off', 'york-pro' );

		/**
		 * Get font selections from Customizer options.
		 */
		$heading = get_theme_mod( 'pagetitle_font_family', york_defaults( 'pagetitle_font_family' ) );
		$body    = get_theme_mod( 'body_font_family', york_defaults( 'body_font_family' ) );

		// Heading font.
		if ( 'off' !== $playfair ) {

			$font_families[] = 'Playfair Display:400,400i,700,700i';

			if ( 'Default' !== $heading ) {
				$font_families[] = get_theme_mod( 'pagetitle_font_family', york_defaults( 'pagetitle_font_family' ) );
			}
		}

		// Body font.
		if ( 'off' !== $lora ) {

			$font_families[] = 'Lora:400,400i,700,700i';

			if ( 'Default' !== $body ) {
				$font_families[] = get_theme_mod( 'body_font_family', york_defaults( 'body_font_family' ) );
			}
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', array_unique( $font_families ) ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		return esc_url_raw( $fonts_url );
	}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @param  array  $urls           URLs to print for resource hints.
 * @param  string $relation_type  The relation type the URLs are printed.
 * @return array  $urls           URLs to print for resource hints.
 */
function york_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'york-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}

add_filter( 'wp_resource_hints', 'york_resource_hints', 10, 2 );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function york_enqueue_admin_style() {
	wp_enqueue_style( 'york-admin', get_theme_file_uri( '/assets/css/admin-style.css' ), false, '@@pkg.version', 'all' );
	wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'york_enqueue_admin_style' );

/**
 * Enqueue a script in the WordPress admin, for edit.php, post.php and post-new.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function york_enqueue_admin_script( $hook ) {

	global $pagenow, $wp_customize;

	if ( 'widgets.php' === $pagenow || isset( $wp_customize ) ) {
		wp_enqueue_media();
		wp_enqueue_script( 'widget-image-upload', get_theme_file_uri( '/assets/js/admin/admin.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'jquery-ui-core' );
	}

	// Don't enqueue post meta if Gutenberg is enabled.
	if ( function_exists( 'register_block_type' ) ) {
		return;
	}

	if ( 'edit.php' !== $hook ) {
		wp_enqueue_script( 'york-meta', get_theme_file_uri( '/assets/js/admin/post-meta.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'wp-color-picker' );
	}
}
add_action( 'admin_enqueue_scripts', 'york_enqueue_admin_script' );

/**
 * Checks to see if we're on the homepage or not.
 */
function york_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function york_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'york_front_page_template' );

/**
 * TinyMCE callback function to insert 'styleselect' into the $buttons array
 *
 * @param string $buttons TinyMCE buttons.
 */
function york_mce_formats_button( $buttons ) {

	// If Gutenberg exists, return.
	if ( function_exists( 'register_block_type' ) ) {
		return $buttons;
	}

	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}

add_filter( 'mce_buttons_2', 'york_mce_formats_button' );

/**
 * TinyMCE Callback function to filter the MCE settings
 *
 * @param array $init_array TinyMCE buttons.
 */
function york_mce_before_init_insert_formats( $init_array ) {

	// If Gutenberg exists, return.
	if ( function_exists( 'register_block_type' ) ) {
		return $init_array;
	}

	$style_formats = array(

		array(
			'title'   => esc_html__( 'Highlight', 'york-pro' ),
			'inline'  => 'span',
			'classes' => 'yorkup--highlight',
			'wrapper' => false,
		),
		array(
			'title'   => esc_html__( 'Button', 'york-pro' ),
			'inline'  => 'span',
			'classes' => 'button',
			'wrapper' => false,
		),
	);

	$init_array['style_formats'] = wp_json_encode( $style_formats );

	return $init_array;
}

add_filter( 'tiny_mce_before_init', 'york_mce_before_init_insert_formats' );

if ( ! function_exists( 'york_protected_title_format' ) ) :
	/**
	 * Filter the text prepended to the post title for protected posts.
	 * Create your own york_protected_title_format() to override in a child theme.
	 *
	 * @param  array $title The post's title.
	 * @link https://developer.wordpress.org/reference/hooks/protected_title_format/
	 */
	function york_protected_title_format( $title ) {
		return '%s';
	}

	add_filter( 'protected_title_format', 'york_protected_title_format' );

endif;

if ( ! function_exists( 'york_protected_form' ) ) :
	/**
	 * Filter the HTML output for the protected post password form.
	 * Create your own york_protected_form() to override in a child theme.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/the_password_form/
	 * @link https://codex.wordpress.org/Using_Password_Protection
	 */
	function york_protected_form() {
		global $post;

		$label = 'pwbox-' . ( empty( $post->ID ) ? wp_rand() : $post->ID );

		$o = '<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		<label for="' . $label . '">' . esc_html__( 'Password:', 'york-pro' ) . ' </label><input name="post_password" placeholder="' . esc_attr__( 'Enter password & press enter...', 'york-pro' ) . '" type="password" placeholder=""/><input type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'york-pro' ) . '" />
		</form>
		';

		return $o;
	}

	add_filter( 'the_password_form', 'york_protected_form' );

endif;

if ( ! function_exists( 'york_get_post_views' ) ) :
	/**
	 * Loop by post view count.
	 * Create your own york_get_post_views() to override in a child theme.
	 *
	 * @param  array $id The post id.
	 */
	function york_get_post_views( $id ) {
		$count_key = 'post_views_count';
		$count     = get_post_meta( $id, $count_key, true );

		if ( '' === $count ) {
			delete_post_meta( $id, $count_key );
			add_post_meta( $id, $count_key, '0' );

			return '0';
		}

		return $count;
	}
endif;

if ( ! function_exists( 'york_set_post_views' ) ) :
	/**
	 * Output the view count.
	 * Create your own york_set_post_views() to override in a child theme.
	 *
	 * @param  array $id The post id.
	 */
	function york_set_post_views( $id ) {
		$count_key = 'post_views_count';
		$count     = get_post_meta( $id, $count_key, true );

		if ( '' === $count ) {
			$count = 0;
			delete_post_meta( $id, $count_key );
			add_post_meta( $id, $count_key, '0' );
		} else {
			$count++;
			update_post_meta( $id, $count_key, $count );
		}
	}
endif;

/**
 * Convert HEX to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 * HEX code, empty array otherwise.
 */
function york_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( 3 === strlen( $color ) ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( 6 === strlen( $color ) ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function york_widget_tag_cloud_args( $args ) {
	$args['largest']  = .8;
	$args['smallest'] = .8;
	$args['unit']     = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'york_widget_tag_cloud_args' );

if ( ! function_exists( 'york_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	function york_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
		}
	}

	add_action( 'wp_head', 'york_pingback_header' );

endif;

if ( ! function_exists( 'york_comments' ) ) :
	/**
	 * Define custom callback for comment output.
	 * Based strongly on the output from Twenty Sixteen.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
	 * @link https://wordpress.org/themes/twentysixteen/
	 *
	 * Create your own york_comments() to override in a child theme.
	 */
	function york_comments( $comment, $args, $depth ) {

		$allowed_html_array = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'cite'   => array(),
			'em'     => array(),
			'strong' => array(),
		);

		$GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>">

				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, $size = '76' ); ?>
					<?php printf( wp_kses( __( '<cite class="fn">%s</cite> ', 'york-pro' ), $allowed_html_array ), get_comment_author_link() ); ?></span>
				</div>

				<p class="comment-meta commentmetadata subtext">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( esc_html__( ' %1$s at %2$s', 'york-pro' ), get_comment_date(), get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( 'Edit', 'york-pro' ), ' &middot; ', '' ); ?>
										<?php
										comment_reply_link(
											array_merge(
												$args, array(
													'before' => ' &middot; ',
													'depth'  => $depth,
													'max_depth' => $args['max_depth'],
												)
											)
										);
?>
				</p>

				<div class="comment-body">
					<?php if ( '0' === $comment->comment_approved ) : ?>
						<span class="moderation"><?php esc_html_e( 'Awaiting Moderation', 'york-pro' ); ?></span>
					<?php endif; ?>
				<?php comment_text(); ?>
				</div>

			</div>
		</li>
	<?php
	}
endif;

/**
 * Post meta.
 */
if ( is_admin() ) {
	require get_theme_file_path( '/inc/meta/meta.php' );
	require get_theme_file_path( '/inc/meta/meta-page.php' );
	require get_theme_file_path( '/inc/meta/meta-portfolio.php' );
	require get_theme_file_path( '/inc/meta/meta-team.php' );
}

/**
 * Customizer additions.
 */
require get_theme_file_path( '/inc/customizer/defaults.php' );
require get_theme_file_path( '/inc/customizer/customizer.php' );
require get_theme_file_path( '/inc/customizer/customizer-css.php' );
require get_theme_file_path( '/inc/customizer/customizer-editor.php' );
require get_theme_file_path( '/inc/customizer/sanitization.php' );
require get_theme_file_path( '/inc/customizer/fonts.php' );

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_theme_file_path( '/inc/template-functions.php' );

/**
 * Load Jetpack compatibility file.
 */
require get_theme_file_path( '/inc/jetpack.php' );

/**
 * SVG icons functions and filters.
 */
require get_theme_file_path( '/inc/icons.php' );

/**
 * Add Widgets.
 */
require get_theme_file_path( '/inc/widgets/widget-flickr.php' );
require get_theme_file_path( '/inc/widgets/widget-portfolio-menu.php' );
require get_theme_file_path( '/inc/widgets/widget-profile.php' );
require get_theme_file_path( '/inc/widgets/widget-clients.php' );

/**
 * Admin specific functions.
 */
require get_parent_theme_file_path( '/inc/admin/init.php' );

/**
 * Disable Merlin WP.
 */
function themebeans_merlin() {}
