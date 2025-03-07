<?php
/* Template Name: Login Template */
get_header();
?>

<div class="login-form">
  <div>
    <img
      src="<?php echo get_template_directory_uri(); ?>/assets/images/login-image.png"
      alt="" />
  </div>
  <div>
    <form action="<?php echo wp_login_url(); ?>" method="post">
      <div>
        <p class="title">Log in to Exclusive</p></br>
        <span class="subtitle">Enter your details below</span>
      </div>
      <input type="text" name="log" id="username" required placeholder="Email or Username">
      <input type="password" name="pwd" id="password" required placeholder="Password">
      <div class="auth-action">
        <input class="btn" type="submit" value="Login">
        <a href="">Forget Password?</a>
      </div>
    </form>
  </div>
</div>

<?php get_footer(); ?>

<style>
  .title {
    font-family: var(--font-inter);
    line-height: 30px;
    font-weight: 500;
    font-size: 36px;
  }

  .subtitle {
    display: block;
    font-family: var(--font-poppins);
    line-height: 24px;
    font-size: 16px;
    font-weight: 400;
  }

  .login-form {
    display: flex;
    width: var(--width-max);
    margin: 0 auto;
    padding-top: 30px;
    padding-bottom: 50px;
    max-height: 781px;
  }

  .login-form>div:nth-child(1) {
    max-width: 805px;
  }

  .login-form>div:nth-child(2) {
    margin-left: auto;
    padding-right: 135px;
    justify-content: center;
    align-items: center;
    display: flex;
  }

  .login-form form {
    display: flex;
    flex-direction: column;
    row-gap: 25px;
  }

  input::placeholder {
    font-size: 16px;
    font-weight: 400;
    line-height: 24px;
    font-family: var(--font-poppins);
  }

  input[type="text"],
  input[type="password"] {
    border: none;
    border-bottom: 2px solid #ccc;
    padding: 13px;
    width: 100%;
    background: white;
  }

  input:-webkit-autofill {
    background-color: white !important;
  }

  input[type="text"]:focus,
  input[type="password"]:focus {
    outline: none;
    border-bottom: 2px solid #000;
  }

  .auth-action {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .auth-action>a {
    font-family: var(--font-poppins);
    font-size: 16px;
    color: #DB4444;
  }
</style>