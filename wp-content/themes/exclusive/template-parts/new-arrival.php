<?php
$image_left_id = get_field('image_left');
$image_top_right_id = get_field('image_top_right');
$image_bottom_right_left_id = get_field('image_bottom_right_left');
$image_bottom_right_right_id = get_field('image_bottom_right_right');

?>
<div class="section-new-arrival">
  <div class="section-new-arrival__left">
    <img src="<?php echo wp_get_attachment_url($image_left_id) ?>" alt="" />
  </div>
  <div class="section-new-arrival__right">
    <div>
      <img
        src="<?php echo wp_get_attachment_url($image_top_right_id) ?>"
        alt="" />
    </div>
    <div class="section-new-arrival__right-bottom">
      <div>
        <img
          src="<?php echo wp_get_attachment_url($image_bottom_right_left_id) ?>"
          alt="" />
      </div>
      <div>
        <img
          src="<?php echo wp_get_attachment_url($image_bottom_right_right_id) ?>"
          alt="" />
      </div>
    </div>
  </div>
</div>
<style>
  .section-new-arrival {
    display: flex;
    max-width: var(--width-large);
    justify-content: space-between;
    height: 600px;
  }

  .section-new-arrival__right>div:nth-child(2) {
    display: flex;
    justify-content: space-between;
  }

  .section-new-arrival__left {
    width: 570px;
    background-color: #000000;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    border-radius: 4px;
  }

  .section-new-arrival__right>div:nth-child(1) {
    background-color: #0d0d0d;
    justify-content: flex-end;
    width: 100%;
    display: flex;
    border-radius: 4px;
  }

  .section-new-arrival__right {
    width: 570px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .section-new-arrival__right-bottom>div:nth-child(1) {
    background-color: #0d0d0d;
    width: 270px;
    height: 284px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
  }

  .section-new-arrival__right-bottom>div:nth-child(2) {
    background-color: #0d0d0d;
    width: 270px;
    height: 284px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
  }
</style>