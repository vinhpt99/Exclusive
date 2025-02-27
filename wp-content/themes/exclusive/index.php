<?php
get_header();
$args = array(
  'post_type' => 'product',
  'parent' => 0
);
$query = new WP_Query($args);
// Lấy danh sách danh mục sản phẩm 
$categories = get_terms('product_cat', array(
  'orderby' => 'name',
  'order' => 'ASC',
  'hide_empty' => true,
)); ?>
<main>
  <section class="hero-section">
    <?php get_template_part('template-parts/category-tree', null, array('categories' =>
    $categories)); ?>
    <div class="slideshow">
      <div class="slides">
        <div class="slide">
          <img src="../assets/images/slide.png" alt="Slide 1" />
        </div>
        <div class="slide">
          <img src="../assets/images/slide.png" alt="Slide 2" />
        </div>
        <div class="slide">
          <img src="../assets/images/slide.png" alt="Slide 3" />
        </div>
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
            <div>
              <span class="label">Days</span>
              <strong>03</strong>
            </div>
            <div class="separator">:</div>
            <div>
              <span class="label">Hours</span>
              <strong>23</strong>
            </div>
            <div class="separator">:</div>
            <div>
              <span class="label">Minutes</span>
              <strong>19</strong>
            </div>
            <div class="separator">:</div>
            <div>
              <span class="label">Seconds</span>
              <strong>56</strong>
            </div>
          </div>
        </div>
        <div class="paging">
          <div>
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/icons/icons_arrow-left.png"
              alt="" />
          </div>
          <div>
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/icons/icons_arrow-right.png"
              alt="" />
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
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/icons/icons_arrow-left.png"
              alt="" />
          </div>
          <div>
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/icons/icons_arrow-right.png"
              alt="" />
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
        if ($query->have_posts()) : while ($query->have_posts()) :
            $query->the_post(); ?>
            <?php get_template_part('template-parts/product'); ?>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </article>
</main>
<?php get_footer(); ?>