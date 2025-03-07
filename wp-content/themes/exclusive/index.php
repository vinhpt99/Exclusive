<?php
get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_title('<h2>', '</h2>');
        the_content();
      endwhile;
    else :
      echo '<p>No content found</p>';
    endif;
    ?>
  </main>
</div>

<?php
get_footer();
?>