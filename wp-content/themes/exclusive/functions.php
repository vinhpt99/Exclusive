<?php
function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}

function exclusive_theme_enqueue_styles()
{
  wp_enqueue_style('main-style', get_stylesheet_uri());
  wp_enqueue_style('main-css-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all');
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', array(), '6.0.0', 'all');
  if (is_front_page()) {
    wp_enqueue_style('product-css', get_template_directory_uri() . '/assets/css/product.css', array(), '1.0', 'all');
  }
  wp_enqueue_script('custom-jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array(), null, true);
  wp_enqueue_script('product-js', get_template_directory_uri() . '/assets/js/product.js', array('jquery'), null, true);
  wp_localize_script("product-js", "my_ajax_object", array(
    "ajax_url" => admin_url("admin-ajax.php")
  ));
}
add_action('wp_enqueue_scripts', 'exclusive_theme_enqueue_styles');

function redirect_login_page()
{
  $login_page  = home_url('/login/');
  $request_uri = $_SERVER['REQUEST_URI'];
  if (strpos($request_uri, 'wp-login.php') !== false && $_SERVER['REQUEST_METHOD'] == 'GET') {
    wp_logout();
    wp_redirect($login_page);
    exit;
  }
}
add_action('init', 'redirect_login_page');

function add_to_cart()
{
  // $product_id = intval($_POST['product_id']);
  // $quantity = 1; 
  // error_log('product id'.$product_id);
  // $added = WC()->cart->add_to_cart($product_id);

  // error_log($added);

  // if ($added) {
  //     wp_send_json_success();
  //     error_log('Cart Count: ' . WC()->cart->get_cart_contents_count());
  // } else {
  //     error_log('Lỗi' .wp_send_json_error());
  //     wp_send_json_error();
  // }
  if (!isset($_POST["product_id"])) {
    wp_send_json_error("Thiếu ID sản phẩm.");
    return;
  }
  $product_id = intval($_POST["product_id"]);
  if ($product_id > 0) {
    WC()->cart->add_to_cart($product_id, 2);

    WC()->cart->get_cart_contents_count();
    $cart_count = WC()->cart->get_cart_contents_count();

    error_log('Session ID: ' . (WC()->session ? WC()->session->get_customer_id() : 'No Session'));
    error_log('Cart Count: ' . WC()->cart->get_cart_contents_count());
    error_log('Cart Data: ' . json_encode(WC()->cart->get_cart()));
    wp_send_json(['cart_count' => WC()->cart->get_cart_contents_count()]);

    // wp_send_json_success([
    //   "cart_count" => count( WC()->cart->get_cart() )
    // ]);
  } else {
    wp_send_json_error("Sản phẩm không hợp lệ.");
  }
}
add_action('wp_ajax_add_to_cart', 'custom_add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'custom_add_to_cart');

// add_action("wp_ajax_custom_add_to_cart", "custom_add_to_cart");
// add_action("wp_ajax_nopriv_custom_add_to_cart", "custom_add_to_cart");
// function custom_add_to_cart() {
//   if (!isset($_POST["product_id"])) {
//     wp_send_json_error("Thiếu ID sản phẩm.");
//     return;
//   }
//   $product_id = intval($_POST["product_id"]);
//   if ($product_id > 0) {
//     WC()->cart->add_to_cart(10, 2);
   
//     WC()->cart->get_cart_contents_count();
//     $cart_count = WC()->cart->get_cart_contents_count();

//     error_log('Session ID: ' . (WC()->session ? WC()->session->get_customer_id() : 'No Session'));
//   error_log('Cart Count: ' . WC()->cart->get_cart_contents_count());
//   error_log('Cart Data: ' . json_encode(WC()->cart->get_cart()));
//   wp_send_json(['cart_count' => WC()->cart->get_cart_contents_count()]);
    
//     // wp_send_json_success([
//     //   "cart_count" => count( WC()->cart->get_cart() )
//     // ]);
//   } else {
//     wp_send_json_error("Sản phẩm không hợp lệ.");
//   }
// }

// add_action('wp_ajax_get_cart_count', function () {
//   error_log('Session ID: ' . (WC()->session ? WC()->session->get_customer_id() : 'No Session'));
//   error_log('Cart Count: ' . WC()->cart->get_cart_contents_count());
//   error_log('Cart Data: ' . json_encode(WC()->cart->get_cart()));
//   wp_send_json(['cart_count' => WC()->cart->get_cart_contents_count()]);
// });

// function custom_enqueue_scripts() {
//   wp_localize_script("main-js", "my_ajax_object", array(
//       "ajax_url" => admin_url("admin-ajax.php")
//   ));
// }
// add_action("wp_enqueue_scripts", "custom_enqueue_scripts"); 