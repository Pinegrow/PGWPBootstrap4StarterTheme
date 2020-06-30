<?php
/**
 * Plugin Name: Pinegrow Starter Theme 2 Custom Settings Plugin
 * Plugin URI: https://www.pinegrow.com
 * Description: Extended Features for the ST2
 * Version: 1.0
 * Text Domain: st2
 * Author: Pinegrow Team
 * Author URI: https://www.pinegrow.com
 */

 //* Add theme info box into WordPress Dashboard
add_action('wp_dashboard_setup', 'st2_add_dashboard_widgets');
function st2_add_dashboard_widgets()
{

	wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'st2_theme_info');

}

//* Disable any and all mention of emoji's
//* Source code credit: http://ottopress.com/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');


//* Remove items from the <head> section
remove_action('wp_head', 'wp_generator');                            //* Remove WP Version number
remove_action('wp_head', 'wlwmanifest_link');                        //* Remove wlwmanifest_link
remove_action('wp_head', 'rsd_link');                                //* Remove rsd_link
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);            //* Remove shortlink
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);    //* Remove previous/next post links

//* Display content using a shortcode to insert in a page, post, widget and more

function st2_render_wc_login_form( $atts ) { 
    if ( ! is_user_logged_in() ) {  
      if ( function_exists( 'woocommerce_login_form' ) && 
          function_exists( 'woocommerce_output_all_notices' ) ) {
        //render the WooCommerce login form   
        ob_start();
        woocommerce_output_all_notices();
        woocommerce_login_form();
        return ob_get_clean();
      } else { 
        //render the WordPress login form
        return wp_login_form( array( 'echo' => false ));
      }
    } else {
      return "Hello there! Welcome back.";
    }
  }
  
  add_shortcode( 'st2_wc_login_form', 'st2_render_wc_login_form' );

 // Register the shortcode to wrap html around the Youtube video content
 // Inspiration 1: http://www.wpstuffs.com/youtube-videos-responsive-wordpress/
 // Inspiration 2: https://code.tutsplus.com/tutorials/creating-a-shortcode-for-responsive-video--wp-32469
 // Inspiration 3: http://www.vtubetools.com/
 // Option: &playlist=' . $identifier . '
 // Example [youtube id="BK6pKsEq4FA"]

 function st2_youtube_video_shortcode( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
    return '<div class="video-container"><iframe width="320" height="240" src="//www.youtube.com/embed/' . $id . '?&rel=0&theme=light&loop=1&showinfo=1&modestbranding=1&hd=1&autohide=1" frameborder="0" allowfullscreen></iframe></div>';
}
add_shortcode ('youtube', 'st2_youtube_video_shortcode' );

// Register stylesheet with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
function st2_youtube_video_add_stylesheet() {
    wp_register_style( 'st2_youtube_video_style', plugins_url( 'youtube-video.css', __FILE__ ) );
    wp_enqueue_style( 'st2_youtube_video_style' );
}
add_action( 'wp_enqueue_scripts', 'st2_youtube_video_add_stylesheet' );