<?php
/* Template Name: Contact Page */
get_header();
?>
<main>
  <div class="container contact-container">
    <div class="section-left">
      <div>
        <h3>Call To Us</h3>
        <span> We are available 24/7, 7 days a week. </span>
        <span> Phone: +8801611112222 </span>
      </div>
      <div>
        <h3>Write To US</h3>
        <span>Fill out our form and we will contact you within 24 hours.</span>
        <span>Emails: customer@exclusive.com</span>
        <span>Emails: support@exclusive.com</span>
      </div>
    </div>
    <div>
      <?php echo do_shortcode('[wpforms id="124"]'); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
<style>
  .contact-container {
    display: grid;
    grid-template-columns: 40% 60%;
    gap: 10px;
    font-family: var(--font-poppins);
  }

  .section-left {
    padding-top: 10%;
  }

  .section-left span {
    display: block;
  }

  .wpforms-submit-container {
    display: flex;
    justify-content: flex-end;
  }

  .wpforms-submit-container button {
    background-color: #DB4444 !important;
  }
</style>