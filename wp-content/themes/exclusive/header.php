<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php wp_head(); ?>
</head>

<body>
  <?php get_template_part('template-parts/topbar'); ?>
  <header>
    <div class="container header">
      <div class="logo">
        <a href="/Exclusive">Exclusive</a>
      </div>
      <nav class="nav-menu">
        <button class="menu-toggle"><i class="fa-solid fa-bars"></i></button>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary-menu',
          'menu_class'     => 'menu-list',
          'container'      => 'nav',
        ));
        ?>
      </nav>
      <div class="utilities">
        <div class="input-search">
          <input type="text" placeholder="What are you looking for?">
          <i class="fas fa-search"></i>
        </div>
        <div>
          <i class="fa-regular fa-heart fa-2x"></i>
        </div>
        <div class="shopping-cart">
          <a href="<?php echo wc_get_cart_url(); ?>">
            <i class="fa fa-shopping-cart fa-2x"></i>
            <span id="cart-count" class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
          </a>
        </div>
      </div>
    </div>
  </header>