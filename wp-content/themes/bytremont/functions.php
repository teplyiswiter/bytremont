<?php
    /**
    *   Theme: Pure Bootstrap
    *   Theme functions file
    *   @package Pure Bootstrap
    *   @version Pure Bootstrap 1.1.1
    */

    /** custom folder */
    $theme_dir_uri = get_template_directory_uri();
    $custom                 = 'custom';
    
    $custom_dir_name        = '@' . $custom;
    $custom_dir             = get_template_directory() . '/' . $custom_dir_name;
    /** file name only */
    $custom_style_file      = $custom.(!WP_DEBUG?'.min':'').'.css';
      // }'.css';
    $custom_script_file     = $custom.'.min.js';
    $custom_functions_file  = $custom.'_functions.php';
    /** full path and file */
    $custom_style           = $custom_dir . '/'. $custom_style_file;
    $custom_script          = $custom_dir . '/'. $custom_script_file;
    $custom_functions       = $custom_dir . '/'. $custom_functions_file;

    /** include the users custom functions */
    if ( file_exists($custom_functions) ) {
        include( $custom_functions );
    }

    /** custom navwalker for bootstrap navbar */
    require_once('inc/wp_bootstrap_navwalker.php');

    /** admin theme options */
    include('inc/admin/theme-options.php');

    /** styles and script */
    include('inc/functions/base-styles-and-scripts.php');
    include('inc/functions/custom-styles-and-scripts.php');


    /** start basic wp overides
    ========================================================================== */

    // string (string)
    function publish_later_on_feed($where)
    {
        /** delay feed update */
        global $wpdb;
        if (is_feed()) {
            // timestamp in WP-format
            $now = gmdate('Y-m-d H:i:s');
            // value for wait; + device
            $wait = '5'; // integer
            // http://dev.mysql.com/doc/refman/5.0/en/date-and-time-functions.html#function_timestampdiff
            $device = 'MINUTE'; // MINUTE, HOUR, DAY, WEEK, MONTH, YEAR
            // add SQL-sytax to default $where
            $where .= " AND TIMESTAMPDIFF($device, $wpdb->posts.post_date_gmt, '$now') > $wait ";
        }
        return $where;
    }

    /* Add feautured image support to theme */
    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
    }


    /* Delay xml feed update after new posts */
    if (function_exists('add_filter')) {
        add_filter('posts_where', 'publish_later_on_feed');
    }


    // Add a larger thumbnail
    if (function_exists('add_image_size')) {
        add_image_size( 'larger', 1920, 1080, true );
    }
    /** end overides
    ========================================================================== */



    /** start shortcodes
    ========================================================================== */
    /**
      * Facebook album shortcode examples:
      * [fb-album token=YOUR_ACCESS_TOKEN album=156033841132513 limit=20]
      * [fb-album token=YOUR_ACCESS_TOKEN album=156033841132513 limit=20 reverse=true]
      */
    include('inc/functions/fb-album.php');

    /**
      * Contact Form shortcode examples:
      * [contact] (sent to default wp-admin)
      * [contact email=user@example.com]
      */
    include('inc/functions/contact-form.php');
    /** end shortcodes
    ========================================================================== */


    /** menus and widgets */
    include('inc/functions/menus.php');
    include('inc/functions/widgets.php');


    // void (void)
    function get_thumbnail_or_placeholder()
    {
        /** If no featured image is set, get the theme image placeholder */
        $featured_image = get_template_directory_uri() . '/img/featured-placeholder.jpg';
        if ( has_post_thumbnail()) the_post_thumbnail('large', array('class' => 'img-responsive'));
        else echo '<img src="'.$featured_image.'" alt="no featured image" class="img-responsive">';
    }


    // void (void)
    function fullscreen_nav()
    {
        /** This is the nave for the full-screen-no-nav template */
        include('inc/fullscreen-navbar.php');
    }


    // bool (void)
    function use_cdn()
    {
        /** Use CDNs */
        return get_option( 'pure_bootstrap_option', 'use_cdn' );
    }


    // bool (void)
    function show_header()
    {
        /** Theme option to show header. */
        return get_option( 'pure_bootstrap_option', 'show_header' );
    }

    // int (int)
    function custom_excerpt_length( $length )
    {
        /** Custom excerpt length */
        // return 35; // may ghage this back
        return $length;
    }

    /*
      * Que functions
      * ======================================================================= */
    if (function_exists('add_filter')) {
        /* Shorten the excerpt length */
        add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
    }

    if (function_exists('add_theme_support')) {
        /* Jetpack infinite-scroll support */
        add_theme_support( 'infinite-scroll', array(
            'container' => 'content',
            'footer' => 'page',
        ));
    }
    function wpb_filter_query( $query, $error = true ) {
      if ( is_search() ) {
      $query->is_search = false;
      $query->query_vars[s] = false;
      $query->query[s] = false;
      if ( $error == true )
      $query->is_404 = true;
      }
    }
    add_action( 'parse_query', 'wpb_filter_query' );
    add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
    function remove_search_widget() {
        unregister_widget('WP_Widget_Search');
    }  
    add_action( 'widgets_init', 'remove_search_widget' );

?>
