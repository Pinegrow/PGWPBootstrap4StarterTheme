<?php
// Pinegrow Starter Theme 2
// THEME TWEAKS

// Remove WordPress Emoji Things
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

// Customize Selective Refresh Widget
add_theme_support( 'customize-selective-refresh-widgets' );

// Set up the WordPress core custom background feature.
add_theme_support( 'custom-background', apply_filters( 'st2_custom_background_args', array(
	'default-color' => 'ffffff',
	'default-image' => '',
) ) );

// Set up the WordPress Theme logo feature.
add_theme_support( 'custom-logo' );

// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'st2_change_logo_class' );

if ( ! function_exists( 'st2_change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function st2_change_logo_class( $html ) {

		$html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
		$html = str_replace( 'alt=""', 'title="Home" alt="logo"' , $html );

		return $html;
	}
}


    // EDITOR TWEAKS
    // Load Editor functions.

require get_template_directory() . '/inc/editor.php';

    // COMMENTS FORM TWEAKS
    // Custom Comments file.

require get_template_directory() . '/inc/custom-comments.php';

    // END OF COMMENTS FORM TWEAKS


    // WIDGETS/SIDEBARS DISPLAY TWEAKS
    // Count number of widgets in a sidebar
    // Used to add classes to widget areas so widgets can be displayed one, two, three or four per row

if ( ! function_exists( 'st2_slbd_count_widgets' ) ) {
	function st2_slbd_count_widgets( $sidebar_id ) {
		// If loading from front page, consult $_wp_sidebars_widgets rather than options
		// to see if wp_convert_widget_settings() has made manipulations in memory.
		global $_wp_sidebars_widgets;
		if ( empty( $_wp_sidebars_widgets ) ) :
			$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
		endif;

		$sidebars_widgets_count = $_wp_sidebars_widgets;

		if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
			$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
			if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
				// Four widgets per row if there are exactly four or more than six
				$widget_classes .= ' col-md-3';
			elseif ( 6 == $widget_count ) :
				// If two widgets are published
				$widget_classes .= ' col-md-2';
			elseif ( $widget_count >= 3 ) :
				// Three widgets per row if there's three or more widgets 
				$widget_classes .= ' col-md-4';
			elseif ( 2 == $widget_count ) :
				// If two widgets are published
				$widget_classes .= ' col-md-6';
			elseif ( 1 == $widget_count ) :
				// If just on widget is active
				$widget_classes .= ' col-md-12';
			endif; 
			return $widget_classes;
		endif;
	}
}


    // WOOCOMMERCE TWEAKS
    // WooCommerce Init

    add_action( 'after_setup_theme', 'st2_woocommerce_support' );
    if ( ! function_exists( 'st2_woocommerce_support' ) ) {

    	// Declares WooCommerce theme support.
    	function st2_woocommerce_support() {
    		add_theme_support( 'woocommerce' );

    		// Add New Woocommerce 3.0.0 Product Gallery support
    		add_theme_support( 'wc-product-gallery-lightbox' );
    		add_theme_support( 'wc-product-gallery-zoom' );
    		add_theme_support( 'wc-product-gallery-slider' );

    	}
    }

    // Remove each style one by one
    add_filter( 'woocommerce_enqueue_styles', 'st2_woocommerce_styles' );
    function st2_woocommerce_styles( $enqueue_styles ) {
    	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    	// unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    	// unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    	return $enqueue_styles;
    }

    // Change Sale Badge Text
    add_filter('woocommerce_sale_flash', 'st2_change_sale_content', 10, 3);
    function st2_change_sale_content($content, $post, $product){
       $content = '<span class="onsale">'.__( 'SALE', 'st2' ).'</span>';
       return $content;
    }
    // END OF WOOCOMMERCE TWEAKS



    // JETPACK TWEAKS
    // Jetpack setup function.
    // See: https://jetpack.me/support/infinite-scroll/
    // See: https://jetpack.me/support/responsive-videos/

add_action( 'after_setup_theme', 'st2_components_jetpack_setup' );

if ( ! function_exists ( 'st2_components_jetpack_setup' ) ) {
	function st2_components_jetpack_setup() {
		// Add theme support for Infinite Scroll.
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'components_infinite_scroll_render',
			'footer'    => 'page',
		) );

		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );

		// Add theme support for Social Menus
		add_theme_support( 'jetpack-social-menu' );

	}
}

    // Custom render function for Infinite Scroll.

if ( ! function_exists ( 'st2_components_infinite_scroll_render' ) ) {
	function st2_components_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( is_search() ) :
				get_template_part( 'loop-templates/content', 'search' );
			else :
				get_template_part( 'loop-templates/content', get_post_format() );
			endif;
		}
	}
}

if ( ! function_exists ( 'st2_components_social_menu' ) ) {
	function st2_components_social_menu() {
		if ( ! function_exists( 'jetpack_social_menu' ) ) {
			return;
		} else {
			jetpack_social_menu();
		}
	}
}


	// Temporary Hotfix for authenticated arbitrary file deletion vulnerability in the WordPress core
	// https://blog.ripstech.com/2018/wordpress-file-delete-to-code-execution/
	add_filter( 'wp_update_attachment_metadata', 'st2_rips_unlink_tempfix' );

	function st2_rips_unlink_tempfix( $data ) {
		if( isset($data['thumb']) ) {
			$data['thumb'] = basename($data['thumb']);
		}
	
		return $data;
	}

	// Theme Check Fix comment-reply
	// https://codex.wordpress.org/Migrating_Plugins_and_Themes_to_2.7/Enhanced_Comment_Display

	if ( ! function_exists( 'st2_comment_reply' ) ) {
		function st2_comment_reply() {
				if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'st2_comment_reply' );


	// Theme Check Fix sanitization callback function
	// For new projects function is included in functions.php.
	// For existing projects needs to be added at the end of functions.php
	
	function pgwp_sanitize_placeholder($input) { return $input; }
?>
