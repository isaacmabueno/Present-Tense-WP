<?php
    define('parent_theme_name', 'divi');
    define('child_theme_name', 'ptfa');
    define('greensock_url', '');
    define('google_fonts_url', '');

    //enqueue stylesheets
    function enqueue_ptfa_theme_styles() {
        $parent_name = constant("parent_theme_name");
        $child_name = constant("child_theme_name");

        //Load parent theme stylesheet
        wp_enqueue_style( $parent_name . '-style', get_template_directory_uri() . '/style.css' );

        //load child theme stylesheet
        wp_enqueue_style( $child_name . '-style', get_stylesheet_directory_uri() . '/style.css' );

    }
    add_action( 'wp_enqueue_scripts', 'enqueue_ptfa_theme_styles');

    //enqueue scripts
    function enqueue_ptfa_theme_scripts() {
        $greensock_url = constant("greensock_url");
        $child_name = constant("child_theme_name");

        //load greensock js file if needed
        if($greensock_url){
            wp_enqueue_script($child_name . '_gs_script', $greensock_url, array('jquery'),'1.1', false);
        }

        //load child theme js file
        wp_enqueue_script($child_name . '_script', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'),'1.1', true);
    }
    add_action( 'get_footer', 'enqueue_ptfa_theme_scripts');

    //Enqueue Google Fonts
    function enqueue_ptfa_theme_fonts() {
        $google_url = constant("google_fonts_url");
        $child_name = constant("child_theme_name");

        if($google_url){
            wp_enqueue_style( $child_name . '-google-fonts', $google_url, false );
        }
    }
    add_action( 'get_footer', 'enqueue_ptfa_theme_fonts' );
