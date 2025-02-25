<?php
get_header();
$args = array(
  'post_type'      => 'product',
  'posts_per_page' => 10,
);

$query = new WP_Query($args);
?>
<section class="hero-section">
  <div class="categories">
    <ul id="treeMenu">
      <li>Woman's Fashion <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/DropDown.png" alt="DropDown">
        <ul>
          <li>Subitem 1.1</li>
          <li>Subitem 1.2</li>
        </ul>
      </li>
      <li>Men's Fashion <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/DropDown.png" alt="DropDown">
        <ul>
          <li>Subitem 2.1</li>
          <li>Subitem 2.2</li>
        </ul>
      </li>
      <li>Electronics</li>
      <li>Home & Lifestyle</li>
      <li>Medicine</li>
      <li>Sports & Outdoor</li>
      <li>Baby's & Toys</li>
      <li>Groceries & Pets</li>
      <li>Health & Beauty</li>
    </ul>
  </div>
  <div class="slideshow">
    <div class="slides">
      <div class="slide">
        <img src="../assets/images/slide.png" alt="Slide 1">
      </div>
      <div class="slide">
        <img src="../assets/images/slide.png" alt="Slide 2">
      </div>
      <div class="slide">
        <img src="../assets/images/slide.png" alt="Slide 3">
      </div>
    </div>
  </div>
</section>
<article>
  <div class="container flash-sales-container">
    <div class="header-box">
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
      <div>
        <img src="../assets/icons/icons_arrow-left.png" alt="" />
        <img src="../assets/icons/icons arrow-right.png" alt="" />
      </div>
    </div>
    <div class="product-line">
      <?php
      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
          <div class="product-line">
            <?php get_template_part('template-parts/product'); ?>
          </div>
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