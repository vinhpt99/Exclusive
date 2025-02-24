<?php
function exclusive_theme_enqueue_styles()
{
  wp_enqueue_style('main-style', get_stylesheet_uri());
  wp_enqueue_style('exclusive-style', get_template_directory_uri() . '/assets/css/exclusive.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'exclusive_theme_enqueue_styles');

function load_fontawesome()
{
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', array(), '6.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'load_fontawesome');
