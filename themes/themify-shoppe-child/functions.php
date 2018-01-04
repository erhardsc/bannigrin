<?php
/**
* Enqueues child theme stylesheet, loading first the parent theme stylesheet.
*/
function themify_custom_enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'themify_custom_enqueue_child_theme_styles', 11 );


function enqueue_child_theme_styles_scripts() {

  // To edit styles, go to the sass folder
  wp_enqueue_style( 'css', get_stylesheet_directory_uri() . '/css/style.css' );

  wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/js/app.js', array('jquery'), true );

}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles_scripts', 20 );
