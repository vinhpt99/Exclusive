<?php
function exclusive_theme_enqueue_styles() {
  wp_enqueue_style('main-style', get_stylesheet_uri());
  wp_enqueue_style('main-css-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all');

  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', array(), '6.0.0', 'all');

  if (is_front_page()) {
    wp_enqueue_style('product-css', get_template_directory_uri() . '/assets/css/product.css', array(), '1.0', 'all');
  }

  wp_enqueue_script('custom-jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'exclusive_theme_enqueue_styles');
