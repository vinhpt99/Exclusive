<?php
$categories = $args['categories'] ?? [];
function display_product_categories_tree($categories)
{
?>
  <div class="categories">
    <ul id="treeMenu">
      <?php
      foreach ($categories as $category) {
        $sub_category = get_terms(array(
          'taxonomy'   =>
          'product_cat',
          'hide_empty' => false,
          'parent' => $category->term_id,
        )); ?>
        <li>
          <?php echo $category->name;
          if (!empty($sub_category)) {
            echo '<img
        src="' . get_template_directory_uri() . '/assets/icons/DropDown.png"
        alt="DropDown"
      />'; ?>
            <ul>
              <?php
              is_array($sub_category) ? display_array_child_node($sub_category) : display_object_child_node($sub_category);
              ?>
            </ul>
        </li>
      <?php } ?>
    <?php } ?>
    </ul>
  </div>
<?php }
display_product_categories_tree($categories);

function display_array_child_node($sub_categories)
{
  foreach ($sub_categories as $sub_category) {
    $child_nodes = get_terms(array(
      'taxonomy'   =>
      'product_cat',
      'hide_empty' => false,
      'parent' => $sub_category->term_id,
    ));
    echo '
<li>
  ' . $sub_category->name;
    if (!empty($child_nodes)) {
      echo '<img
    src="' . get_template_directory_uri() . '/assets/icons/DropDown.png"
    alt="DropDown"
  />';
      echo '
  <ul>
    ';
      foreach ($child_nodes as $node) {
        if (is_array($node))
          display_array_child_node($node);
        else display_object_child_node($node);
      }
      echo '
  </ul>
  ';
    }
    echo '
</li>
';
  }
}
function display_object_child_node($sub_category)
{
  $child_nodes =
    get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false, 'parent' =>
    $sub_category->term_id,));
  echo '
<li>
  ' . $sub_category->name;
  if (!empty($child_nodes)) {
    echo '<img
    src="' . get_template_directory_uri() . '/assets/icons/DropDown.png"
    alt="DropDown"
  />';
    echo '
  <ul>
    ';
    foreach ($child_nodes as $node) {
      if (is_array($node))
        display_array_child_node($node);
      else display_object_child_node($node);
    }
    echo '
  </ul>
  ';
  }
  echo '
</li>
';
} ?>
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
    $("#treeMenu li").click(function(e) {
      if (!$(this).hasClass("open")) $(this).children("ul").find("img").show();
      else $(this).children("ul").find("img").hide();
      $(this).children("ul").slideToggle();
      $(this).toggleClass("open");
      e.stopPropagation();
    });
  });
</script>