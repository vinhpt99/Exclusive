<?php
  function exclusive_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/exclusive.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'exclusive_theme_enqueue_styles');
?>