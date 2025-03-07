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
        <p>Exclusive</p>
      </div>
      <nav class="nav-menu">
        <button class="menu-toggle"><i class="fa-solid fa-bars"></i></button>
        <ul class="menu-list">
          <li>Home</li>
          <li>Contact</li>
          <li>About</li>
          <li>Sign up</li>
        </ul>
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
          <i class="fa fa-shopping-cart fa-2x"></i>
          <span id="cart-count" class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        </div>
      </div>
    </div>
  </header>