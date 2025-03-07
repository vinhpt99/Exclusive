jQuery(document).ready(function ($) {
  console.log("load js scucess !")
  $(".add-to-cart").click(function (e) {
    console.log("load js scucess !")
    e.preventDefault();
    var product_id = $(this).data("product_id");
    $.ajax({
      type: "POST",
      url: ajax_object.ajax_url, 
      data: {
        action: "add_to_cart",
        product_id: product_id,
      },
      beforeSend: function () {
        console.log("Đang thêm sản phẩm...");
      },
      success: function (response) {
        if (response.success) {
          alert("Đã thêm sản phẩm vào giỏ hàng!");
          jQuery("#cart-count").text(response.data.cart_count);
        } else {
          alert("Lỗi: " + response.data);
        }
      },
    });
  });
});
