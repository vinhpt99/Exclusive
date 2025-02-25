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

function custom_product_category_taxonomy() {
  register_taxonomy(
      'product_category', 
      'product', 
      array(
          'label'        => 'Danh mục sản phẩm',
          'rewrite'      => array('slug' => 'product-category'),
          'hierarchical' => true, 
          'show_admin_column' => true, 
      )
  );
}
add_action('init', 'custom_product_category_taxonomy');

function add_product_category_icon_field() {
  ?>
  <div class="form-field">
      <label for="product_category_icon">Icon</label>
      <input type="hidden" name="product_category_icon" id="product_category_icon" value="" />
      <button class="button upload-icon-button">Chọn Icon</button>
      <p>Chọn icon cho danh mục sản phẩm.</p>
      <div id="icon-preview"></div>
  </div>
  <script>
  jQuery(document).ready(function($) {
      $('.upload-icon-button').click(function(e) {
          e.preventDefault();
          var mediaUploader = wp.media({
              title: 'Chọn Icon',
              button: { text: 'Sử dụng Icon' },
              multiple: false
          }).on('select', function() {
              var attachment = mediaUploader.state().get('selection').first().toJSON();
              $('#product_category_icon').val(attachment.url);
              $('#icon-preview').html('<img src="' + attachment.url + '" style="max-width: 40px; height: auto;" />');
          }).open();
      });
  });
  </script>
  <?php
}
add_action('product_category_add_form_fields', 'add_product_category_icon_field', 10, 2);

// 4️⃣ Thêm trường tải lên icon vào form chỉnh sửa danh mục
function edit_product_category_icon_field($term) {
  $icon = get_term_meta($term->term_id, 'product_category_icon', true);
  ?>
  <tr class="form-field">
      <th scope="row"><label for="product_category_icon">Icon</label></th>
      <td>
          <input type="hidden" name="product_category_icon" id="product_category_icon" value="<?php echo esc_attr($icon); ?>" />
          <button class="button upload-icon-button">Chọn Icon</button>
          <p class="description">Chọn icon cho danh mục sản phẩm.</p>
          <div id="icon-preview">
              <?php if ($icon) { echo '<img src="' . esc_url($icon) . '" style="max-width: 40px; height: auto;" />'; } ?>
          </div>
      </td>
  </tr>
  <script>
  jQuery(document).ready(function($) {
      $('.upload-icon-button').click(function(e) {
          e.preventDefault();
          var mediaUploader = wp.media({
              title: 'Chọn Icon',
              button: { text: 'Sử dụng Icon' },
              multiple: false
          }).on('select', function() {
              var attachment = mediaUploader.state().get('selection').first().toJSON();
              $('#product_category_icon').val(attachment.url);
              $('#icon-preview').html('<img src="' + attachment.url + '" style="max-width: 40px; height: auto;" />');
          }).open();
      });
  });
  </script>
  <?php
}
add_action('product_category_edit_form_fields', 'edit_product_category_icon_field', 10, 2);

// 5️⃣ Lưu giá trị icon vào metadata
function save_product_category_icon_meta($term_id) {
  if (isset($_POST['product_category_icon'])) {
      update_term_meta($term_id, 'product_category_icon', sanitize_text_field($_POST['product_category_icon']));
  }
}
add_action('created_product_category', 'save_product_category_icon_meta', 10, 2);
add_action('edited_product_category', 'save_product_category_icon_meta', 10, 2);


