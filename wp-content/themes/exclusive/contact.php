<?php
/* Template Name: Contact Page */
get_header();
?>

<h1>Liên hệ với chúng tôi</h1>

<form action="" method="post">
  <label for="name">Họ và Tên:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="message">Nội dung:</label>
  <textarea id="message" name="message" required></textarea>

  <button type="submit">Gửi</button>
</form>

<?php get_footer(); ?>