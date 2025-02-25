<?php
function exclusive_theme_enqueue_styles() {
  // Load CSS chung
  wp_enqueue_style('main-style', get_stylesheet_uri());
  wp_enqueue_style('exclusive-style', get_template_directory_uri() . '/assets/css/exclusive.css', array(), '1.0.0', 'all');

  // Load FontAwesome
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', array(), '6.0.0', 'all');

  // Load CSS riêng cho trang product nếu cần
  if (is_singular('product') || is_front_page()) {
    wp_enqueue_style('product-css', get_template_directory_uri() . '/assets/css/product.css', array(), '1.0', 'all');
  }
}
add_action('wp_enqueue_scripts', 'exclusive_theme_enqueue_styles');

function custom_post_type_product() {
  $labels = array(
    'name'               => 'Products',
    'singular_name'      => 'Product',
    'menu_name'          => 'Products',
    'name_admin_bar'     => 'Product',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Product',
    'new_item'           => 'New Product',
    'edit_item'          => 'Edit Product',
    'view_item'          => 'View Product',
    'all_items'          => 'All Products',
    'search_items'       => 'Search Products',
    'parent_item_colon'  => 'Parent Products:',
    'not_found'          => 'No products found.',
    'not_found_in_trash' => 'No products found in Trash.'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-cart',
    'supports'           => array(['title']),
    'taxonomies'         => array('category', 'post_tag'),
    'rewrite'            => array('slug' => 'product'),
  );

  register_post_type('product', $args);
}
add_action('init', 'custom_post_type_product');

function custom_product_columns($columns) {
  unset($columns['title']); 
  $columns['product_name'] = 'Product Name';
  return $columns;
}
add_filter('manage_edit-product_columns', 'custom_product_columns');

function custom_product_column_content($column, $post_id) {
    if ($column == 'product_name') {
      $product_name = get_post_meta($post_id, 'product_name', true);
      echo '<strong><a href="' . get_edit_post_link($post_id) . '">' . esc_html($product_name) . '</a></strong>';
    }
}
add_action('manage_product_posts_custom_column', 'custom_product_column_content', 10, 2);

