<?php
function mytheme_add_woocommerce_support() {
  add_theme_support('woocommerce');
}

function exclusive_theme_enqueue_styles() {
  wp_enqueue_style('main-style', get_stylesheet_uri());
  wp_enqueue_style('main-css-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all');
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', array(), '6.0.0', 'all');
  if (is_front_page()) {
    wp_enqueue_style('product-css', get_template_directory_uri() . '/assets/css/product.css', array(), '1.0', 'all');
  }
  if (is_cart()) {
    wp_enqueue_style('custom-cart-css', get_stylesheet_directory_uri() . '/assets/css/custom-cart.css');
  }
  if (is_checkout()) {
    wp_enqueue_style('custom-checkout-css', get_stylesheet_directory_uri() . '/assets/css/custom-checkout.css');
  }
  if (is_wc_endpoint_url('order-received')) {
    wp_enqueue_style('custom-order-received-css', get_stylesheet_directory_uri() . '/assets/css/custom-order-received.css');
  }
  wp_enqueue_script('custom-jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array(), null, true);
  wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
  wp_enqueue_script('product-js', get_template_directory_uri() . '/assets/js/product.js', array('jquery'), null, true);
  wp_localize_script("product-js", "my_ajax_object", array(
    "ajax_url" =>
    admin_url("admin-ajax.php")
  ));
}
add_action(
  'wp_enqueue_scripts',
  'exclusive_theme_enqueue_styles'
);
function redirect_login_page() {
  $login_page
    = home_url('/login/');
  $request_uri = $_SERVER['REQUEST_URI'];
  if (
    strpos($request_uri, 'wp-login.php') !== false && $_SERVER['REQUEST_METHOD'] ==
    'GET'
  ) {
    wp_logout();
    wp_redirect($login_page);
    exit;
  }
}
add_action(
  'init',
  'redirect_login_page'
);
function custom_ajax_add_to_cart() {
  if (!isset($_POST['product_id'])) {
    wp_send_json_error("Thiếu product_id");
  }
  $product_id = absint($_POST['product_id']);
  $product =
    wc_get_product($product_id);
  if (!$product) {
    wp_send_json_error("Sản phẩm không
tồn tại");
  }
  $product = wc_get_product($product_id);
  if (!$product) {
    wp_send_json_error("Sản phẩm không tồn tại");
  }
  if (
    $product->get_status() !==
    'publish'
  ) {
    wp_send_json_error("Sản phẩm chưa được public");
  }
  if ($product->is_type('external') || $product->is_type('grouped')) {
    wp_send_json_error("Sản phẩm không phải loại có thể mua");
  }
  if (
    !$product_id ||
    get_post_type($product_id) !== 'product'
  ) {
    wp_send_json_error("ID sản phẩm
không hợp lệ");
  }
  $added = WC()->cart->add_to_cart($product_id);
  if ($added) {
    $cart_count = WC()->cart->get_cart_contents_count();
    error_log("$\cart_count" .
      $cart_count);
    wp_send_json_success(["message" => "Sản phẩm đã được thêm vào giỏ
hàng", "cart_count" => $cart_count]);
  } else {
    wp_send_json_error("Không thể
thêm sản phẩm");
  }
}
add_action(
  "wp_ajax_add_to_cart",
  "custom_ajax_add_to_cart"
);
add_action(
  "wp_ajax_nopriv_add_to_cart",
  "custom_ajax_add_to_cart"
);
function custom_ajax_script()
{
  wp_localize_script("jquery", "ajax_object", array("ajax_url" =>
  admin_url("admin-ajax.php")));
}
add_action(
  "wp_enqueue_scripts",
  "custom_ajax_script"
);
function custom_register_menus() {
  register_nav_menus(array('primary-menu' => __('Primary Menu'), 'footer-menu' =>
  __('Footer Menu')));
}
add_action(
  'after_setup_theme',
  'custom_register_menus'
);
function load_more_products() {
  $paged =
    isset($_POST['page']) ? intval($_POST['page']) : 1;
  $args = array('post_type'
  => 'product', 'posts_per_page' => 6, 'paged' => $paged);
  $query = new
    WP_Query($args);
  if ($query->have_posts()) : while ($query->have_posts()) :
      $query->the_post();
      get_template_part('template-parts/product');
    endwhile;
  endif;
  wp_reset_postdata();
  die();
}
add_action(
  'wp_ajax_load_more_products',
  'load_more_products'
);
add_action(
  'wp_ajax_nopriv_load_more_products',
  'load_more_products'
);
