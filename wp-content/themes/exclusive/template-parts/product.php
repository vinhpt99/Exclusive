<?php
$product_image_id = get_field('product_image');
$image_url = wp_get_attachment_image_src($product_image_id, 'full');
?>

<div class="product-item">
  <div class="product-thumbnail">
    <div class="product-discount">-40%</div>
    <div class="product-actions">
      <i class="far fa-heart"></i>
      <i class="far fa-eye"></i>
    </div>
    <img src="<?php echo esc_url($image_url[0]); ?>" alt="Product Image" class="product-image">
  </div>
  <div class="product-info">
    <h3 class="product-name"><?php the_field('product_name'); ?></h3>
    <div class="product-price">
      <span class="price-current">$120</span>
      <span class="price-old">$160</span>
    </div>
    <div class="product-rating">
      <span class="stars">⭐⭐⭐⭐⭐</span>
      <span class="review-count">(88)</span>
    </div>
  </div>
</div>