<?php
if ( ! function_exists( 'st2_setup' ) ) :

function st2_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'st2', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'st2' ),
        'social'  => __( 'Social Links Menu', 'st2' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; // st2_setup

add_action( 'after_setup_theme', 'st2_setup' );


if ( ! function_exists( 'st2_init' ) ) :

function st2_init() {


    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    /* Pinegrow generated Custom Post Types End */

    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    /* Pinegrow generated Taxonomies End */

}
endif; // st2_setup

add_action( 'init', 'st2_init' );


if ( ! function_exists( 'st2_widgets_init' ) ) :

function st2_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    register_sidebar( array(
        'name' => __( 'Left Sidebar', 'st2' ),
        'id' => 'left-sidebar',
        'description' => 'Left Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Right Sidebar', 'st2' ),
        'id' => 'right-sidebar',
        'description' => 'Right Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Hero Slider', 'st2' ),
        'id' => 'hero',
        'description' => 'Hero slider area. Place two or more widgets here and they will slide!',
        'before_widget' => '<div class="carousel-item">',
        'after_widget' => '</div>',
        'before_title' => ' ',
        'after_title' => ' '
    ) );

    register_sidebar( array(
        'name' => __( 'Hero Canvas', 'st2' ),
        'id' => 'herocanvas',
        'description' => 'Full size canvas hero area for Bootstrap and other custom HTML markup',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ) );

    register_sidebar( array(
        'name' => __( 'Top Full', 'st2' ),
        'id' => 'statichero',
        'description' => 'Full top widget with dynamic grid',
        'before_widget' => '<div id="%1$s" class="static-hero-widget %2$s '. st2_slbd_count_widgets( 'statichero' ) .'">',
        'after_widget' => '</div><!-- .static-hero-widget -->',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Left Sidebar', 'st2' ),
        'id' => 'left-sidebar',
        'description' => 'Left Sidebar widget area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Right Sidebar', 'st2' ),
        'id' => 'right-sidebar',
        'description' => 'Right Sidebar widget area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ) );

    register_sidebar( array(
        'name' => __( 'Bottom Full', 'st2' ),
        'id' => 'footerfull',
        'description' => 'Full bottom widget with dynamic grid',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s '. st2_slbd_count_widgets( 'footerfull' ) .'">',
        'after_widget' => '</div><!-- .footer-widget -->',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ) );

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'st2_widgets_init' );
endif;// st2_widgets_init



if ( ! function_exists( 'st2_customize_register' ) ) :

function st2_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    $wp_customize->add_section( 'footer_settings', array(
        'title' => __( 'Footer Settings', 'st2' ),
        'description' => __( 'Footer Settings', 'st2' ),
        'priority' => '2'
    ));

    $wp_customize->add_section( 'header_settings', array(
        'title' => __( 'Header Settings', 'st2' ),
        'description' => __( 'Header Settings', 'st2' ),
        'priority' => '1'
    ));

    $wp_customize->add_section( 'theme_settings', array(
        'title' => __( 'Theme Settings', 'st2' ),
        'description' => __( 'Theme Settings', 'st2' ),
        'priority' => '0'
    ));

    $wp_customize->add_setting( 'show_left_sidebar', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'show_left_sidebar', array(
        'label' => __( 'Show Left Sidebar', 'st2' ),
        'description' => __( 'Activate the Left Sidebar', 'st2' ),
        'type' => 'checkbox',
        'section' => 'theme_settings'
    ));

    $wp_customize->add_setting( 'show_right_sidebar', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'show_right_sidebar', array(
        'label' => __( 'Show Right Sidebar', 'st2' ),
        'description' => __( 'Activate the Right Sidebar', 'st2' ),
        'type' => 'checkbox',
        'section' => 'theme_settings'
    ));

    $wp_customize->add_setting( 'body_color', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_color', array(
        'label' => __( 'Body Color', 'st2' ),
        'type' => 'color',
        'section' => 'theme_settings'
    ) ) );

    $wp_customize->add_setting( 'body_background', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'body_background', array(
        'label' => __( 'Body Background Images', 'st2' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'theme_settings'
    ) ) );

    $wp_customize->add_setting( 'show_jumbotron', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'show_jumbotron', array(
        'label' => __( 'Show Jumbotron', 'st2' ),
        'description' => __( 'Activate the Jumbotron', 'st2' ),
        'type' => 'checkbox',
        'section' => 'theme_settings'
    ));

    $wp_customize->add_setting( 'jumbotron_bg_color', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jumbotron_bg_color', array(
        'label' => __( 'Jumbotron Background color', 'st2' ),
        'type' => 'color',
        'section' => 'header_settings'
    ) ) );

    $wp_customize->add_setting( 'jumbotron_bg_image', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'jumbotron_bg_image', array(
        'label' => __( 'Jumbotron Background image', 'st2' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'header_settings'
    ) ) );

    $wp_customize->add_setting( 'footer_text', array(
        'type' => 'theme_mod',
        'default' => 'Proudly powered by WordPress | Theme: Starter Theme 2 by Pinegrow 2018. (Version: 0.0.0)'
    ));

    $wp_customize->add_control( 'footer_text', array(
        'label' => __( 'Footer Content', 'st2' ),
        'type' => 'textarea',
        'section' => 'footer_settings'
    ));

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'st2_customize_register' );
endif;// st2_customize_register


if ( ! function_exists( 'st2_enqueue_scripts' ) ) :
    function st2_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_deregister_script( 'carousel_init' );
    wp_enqueue_script( 'carousel_init', get_template_directory_uri() . '/assets/js/carousel_init.js', false, null, true);

    wp_deregister_script( 'popper' );
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.js', false, null, true);

    wp_deregister_script( 'bootstrap' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    wp_deregister_style( 'style' );
    wp_enqueue_style( 'style', get_bloginfo('stylesheet_url'), false, null, 'all');

    wp_deregister_style( 'woocommerce' );
    wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/bootstrap_theme/woocommerce.css', false, null, 'all');

    wp_deregister_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css', false, null, 'all');

    wp_deregister_style( 'theme' );
    wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/css/theme.css', false, null, 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'st2_enqueue_scripts' );
endif;

/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
require_once "inc/bootstrap/wp_bootstrap4_navwalker.php";

    /* Pinegrow generated Include Resources End */

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
       $content = '<span class="onsale">'.__( 'SALE', 'woocommerce' ).'</span>';
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
?>
