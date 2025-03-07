// jQuery(document).ready(function($) { $('.add-to-cart').on('click', function(e) {
//   e.preventDefault(); var product_id = $(this).data('product_id'); $.ajax({ type:
//   'POST', url: wc_add_to_cart_params.ajax_url, data: { action: 'add_to_cart',
//   product_id: product_id, }, success: function(response) { if (response.success) {
//   alert('Sản phẩm đã được thêm vào giỏ hàng!'); } else { alert('Có lỗi xảy ra, vui
//   lòng thử lại.'); console.log(response) } } }); }); }); //
//   $(".add-to-cart").click(function (e) { // e.preventDefault(); // var product_id
//   = $(this).data("product_id"); // $.ajax({ // type: "POST", // url:
//   my_ajax_object.ajax_url, // Được khai báo trong PHP // data: { // action:
//   "custom_add_to_cart", // product_id: product_id, // }, // success: function
//   (response) { // if (response.success) { // alert("Sản phẩm đã được thêm vào giỏ
//   hàng!"); // console.log(response) // $(".badge").text(response.data.cart_count);
//   // Cập nhật số lượng giỏ hàng // } else { // alert("Lỗi: " + response.data); //
//   } // }, // }); // }); });