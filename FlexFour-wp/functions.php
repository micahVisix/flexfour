<?php
/* =======================
ENQUEUE SCRIPTS AND STYLES
=========================*/
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script( 'child-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
/*==========================================
THEME OPTIONS : IMAGE SIZES
==========================================*/
function image_size() {
    //Resources
    add_image_size('sample_pack', 720, 337, true);
    add_image_size( 'slider', 1920, 500, true);
}
add_action( 'after_setup_theme', 'image_size_setup' );
/* END OF FILE */
?>