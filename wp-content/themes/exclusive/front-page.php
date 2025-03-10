<?php
/*
Template Name: Home page Template
*/
get_header();
$args = array(
  'post_type'      => 'product',
  'parent' => 0,
  'posts_per_page' => 6,
);

$query = new WP_Query($args);

// Lấy danh sách danh mục sản phẩm 
$categories = get_terms('product_cat', array(
  'orderby'    => 'name',
  'order'      => 'ASC',
  'hide_empty' => true,
));

$args = array(
  'post_type' => 'product',
  'posts_per_page' => 4,
  'meta_key' => 'total_sales',
  'orderby' => 'meta_value_num',
  'order' => 'DESC',
);

$bestSellArgs = array(
  'post_type' => 'product',
  'posts_per_page' => 4,
  'meta_key' => 'total_sales',
  'orderby' => 'meta_value_num',
  'order' => 'DESC',
);
$bestSellingProducts = new WP_Query($bestSellArgs);

$slide_image_1 = get_field('slide_image_1');
$slide_image_2 = get_field('slide_image_2');
$slide_image_3 = get_field('slide_image_3');
?>
<main>
  <section class="hero-section container">
    <?php get_template_part('template-parts/category-tree', null, array('categories' => $categories)); ?>
    <div class="slideshow">
      <div class="slides">
        <div class="slide">
          <img src="<?php echo wp_get_attachment_url($slide_image_1) ?>" alt="Slide 1">
        </div>
        <div class="slide">
          <img src="<?php echo wp_get_attachment_url($slide_image_2) ?>" alt="Slide 2">
        </div>
        <div class="slide">
          <img src="<?php echo wp_get_attachment_url($slide_image_3) ?>" alt="Slide 3">
        </div>
      </div>
      <div class="dots">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </div>
  </section>
  <article>
    <div class="container flash-sales-container">
      <div class="header-box-title">
        <span>Today's</span>
      </div>
      <div class="header-box-action">
        <div>
          <div class="heading-title">Flash Sales</div>
          <div class="countdown">
            <?php echo do_shortcode('[sales_countdown_timer id="salescountdowntimer"]') ?>
          </div>
        </div>
        <div class="paging">
          <div>
            <i class="fa-solid fa-arrow-left"></i>
          </div>
          <div id="next-page" data-page="1">
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
      </div>
      <div class="product-line">
        <?php
        if ($query->have_posts()) : while ($query->have_posts()) :
            $query->the_post(); ?>
            <?php get_template_part('template-parts/product'); ?>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
      <div class="action">
        <button class="btn">View All Product</button>
      </div>
    </div>
  </article>
  <article>
    <div class="container">
      <div class="header-box-title">
        <span>Categories</span>
      </div>
      <div class="header-box-action">
        <div>
          <div class="heading-title">Browse By Category</div>
        </div>
        <div class="paging">
          <div>
            <i class="fa-solid fa-arrow-left"></i>
          </div>
          <div>
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
      </div>
      <div class="category-line">
        <?php
        foreach ($categories as $category) {
          $thumbnail_id = get_term_meta(
            $category->term_id,
            'thumbnail_id',
            true
          );
          $image_url = wp_get_attachment_url($thumbnail_id); ?>
          <div>
            <img
              src="<?php echo esc_url($image_url); ?>"
              alt=""
              class="category-img" />
            <p class="category-name"><?php echo esc_html($category->name); ?></p>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </article>
  <article>
    <div class="container">
      <div class="header-box-title">
        <span>This Month</span>
      </div>
      <div class="header-box-action">
        <div>
          <div class="heading-title">Best Selling Products</div>
        </div>
        <div>
          <button class="btn">View All</button>
        </div>
      </div>
      <div class="best-selling-line">
        <?php
        if ($bestSellingProducts->have_posts()) : while ($bestSellingProducts->have_posts()) :
            $bestSellingProducts->the_post(); ?>
            <?php get_template_part('template-parts/product'); ?>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
      <div>
        <?php get_template_part('template-parts/banner'); ?>
      </div>
    </div>
  </article>
  <article>
    <div class="container">
      <div class="header-box-title">
        <span>Our Products</span>
      </div>
      <div class="header-box-action">
        <div>
          <div class="heading-title">Explore Our Products</div>
        </div>
        <div class="paging">
          <div>
            <i class="fa-solid fa-arrow-left"></i>
          </div>
          <div>
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
      </div>
      <div class="best-selling-line">

      </div>
      <div class="action">
        <button class="btn">View All Product</button>
      </div>
    </div>
  </article>
  <article>
    <div class="container">
      <div class="header-box-title">
        <span>Featured</span>
      </div>
      <div class="header-box-action">
        <div>
          <div class="heading-title">New Arrival</div>
        </div>
      </div>
      <div class="new-arrival-line">
        <div>
          <?php get_template_part('template-parts/new-arrival'); ?>
        </div>
        <div class="new-arrival-footer">
          <div class="wrap-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-delivery.png" alt="" />
            <h3>FREE AND FAST DELIVERY</h3>
            <p>Free delivery for all orders over $140</p>
          </div>
          <div class="wrap-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-secure.png" alt="" />
            <h3>24/7 CUSTOMER SERVICE</h3>
            <p>Friendly 24/7 customer support</p>
          </div>
          <div class="wrap-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-customer.png" alt="" />
            <h3>MONEY BACK GUARANTEE</h3>
            <p>We return money within 30 days</p>
          </div>
        </div>
      </div>
    </div>
  </article>
</main>
<?php get_footer(); ?>