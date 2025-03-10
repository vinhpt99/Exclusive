jQuery(document).ready(function ($) {
  let currentIndex = 0;
  const slides = $(".slide");
  const dots = $(".dot");
  const slideCount = slides.length;

  function showSlide(index) {
    slides.hide();
    slides.eq(index).show();
    dots.removeClass("active");
    dots.eq(index).addClass("active");
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % slideCount;
    showSlide(currentIndex);
  }

  dots.click(function () {
    currentIndex = $(this).index();
    showSlide(currentIndex);
  });

  showSlide(currentIndex);
  setInterval(nextSlide, 3000);

  $('#next-page').on('click', function () {
    let button = $(this);
    let page = parseInt(button.attr('data-page')) + 1;
    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'load_more_products',
        page: page
      },
      beforeSend: function () {
        $('.loader').show();
      },
      success: function (response) {
        if (response) {
          $('.product-line').html(response);
          button.attr('data-page', page);
          $('.loader').hide();
        } else {
          button.addClass('disabled');
          $('.loader').hide();
        }
      }
    });
  });

});