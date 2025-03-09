<?php 
    $banner_image_id = get_field('banner_image');
?>
<div class="promo-banner">
    <img src="<?php echo wp_get_attachment_url($banner_image_id) ?>" alt="Promo">
    <div class="promo-content">
        <h2><?php echo esc_html($banner_title); ?></h2>
        <p><?php echo esc_html($banner_description); ?></p>
        <p>Khuyến mãi kết thúc sau: <span id="countdown-timer"></span></p>
        <a href="<?php echo esc_url($banner_button_link); ?>" class="promo-button">
            <?php echo esc_html($banner_button_text); ?>
        </a>
    </div>
</div>