<?php
$categories = $args['categories'] ?? [];
function display_product_categories_tree($categories)
{
?>
  <div class="categories">
    <ul id="treeMenu">
      <?php
      foreach ($categories as $category) {
        $sub_categories = get_terms(array(
          'taxonomy'   => 'product_cat',
          'hide_empty' => false,
          'parent'     => $category->term_id,
        ));
      ?>
        <li> <?php echo $category->name ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/DropDown.png" alt="DropDown">
          <?php if (!empty($sub_categories)) { ?>
            5
            <ul>
              <li>
                <?php
                // print_r($sub_categories);
                display_product_categories_tree($sub_categories);
                print_r(5)
                ?>
                <!-- <ul>
                  <li>Subitem 1.2.1</li>
                  <li>Subitem 1.2.2</li>
                </ul> -->
              </li>
              <li>Subitem 1.2</li>
            </ul>
        </li>
      <?php } ?>
    <?php } ?>
    </ul>
  </div>
<?php }
display_product_categories_tree($categories);
?>
<style>
  /* tree menu */
  #treeMenu>li {
    font-size: 16px;
    line-height: 24px;
    font-family: "Poppins", sans-serif;
    list-style: none;
    cursor: pointer;
    padding-top: 10px;
    padding-bottom: 10px;
    position: relative;
    width: 217px;
    display: block;
  }

  #treeMenu li img {
    position: absolute;
    right: 0;
  }

  #treeMenu ul {
    list-style-type: none;
    width: 217px;
    padding-left: 0;
    margin: 0;
  }

  ul ul {
    display: none;
    margin-top: 10px;
  }

  ul ul li {
    padding: 8px 0px 8px 25px;
  }

  .open>img {
    transform: rotate(180deg);
  }
</style>

<script>
  jQuery(document).ready(function($) {
    $('#treeMenu li').click(function(e) {
      $(this).children('ul').slideToggle();
      $(this).toggleClass('open');
      e.stopPropagation();
    });
  });
</script>