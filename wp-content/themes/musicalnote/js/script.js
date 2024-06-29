$(document).ready(function () {
  $(".slider").slick({
    arrow: true,
    infinite: true,
    autoplay: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: false,
    variableWidth: false,
    fade: true,
    prevArrow: $(".prev"),
    nextArrow: $(".next"),
  });

  $(".new_slider").slick({
    centerMode: true,
    dots: false,
    slidesToShow: 3,
    arrow: true,
    variableWidth: false,
    adaptiveHeight: false,
    prevArrow: $(".before"),
    nextArrow: $(".after"),

    responsive: [
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        },
      },

      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrow: true,
          infinite: true,
          speed: 300,
          adaptiveHeight: true,
        },
      },
    ],
  });

  $(".feature_slider").slick({
    centerMode: true,
    // centerPadding: "60px",
    slidesToShow: 3,
    arrow: true,
    variableWidth: true,
    prevArrow: $(".forward"),
    nextArrow: $(".backward"),

    responsive: [
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        },
      },

      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  mobileOnlySlider(".mySlider", false, true, 767);

  function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint) {
    var slider = $($slidername);
    var settings = {
      mobileFirst: true,
      arrows: true,
      centerMode: true,
      slidesToShow: 1,
      variableWidth: true,
      prevArrow: $(".aforward"),
      nextArrow: $(".abackward"),
      responsive: [
        {
          breakpoint: $breakpoint,
          settings: "unslick",
        },
      ],
    };

    slider.slick(settings);

    $(window).on("resize", function () {
      if ($(window).width() > $breakpoint) {
        return;
      }
      if (!slider.hasClass("slick-initialized")) {
        return slider.slick(settings);
      }
    });
  }

  $("nav>ul>li,nav>ul>li>ul>li")
    .has("ul")
    .children("a")
    .click(function () {
      $(this).parent("li").children(".sub-menu").slideToggle();
    });

  $(".hamburger").click(function () {
    $("header").addClass("active");
  });
  $(".close").click(function () {
    $("header").removeClass("active");
  });

  $(".dropdown-btn").click(function () {
    $(".subMenu").addClass("active");
  });

  $("header.active .sub-menu").click(function () {
    $(".sub-menu").slideToggle("slow");
  });

  $(".woocommerce table.shop_table td.product-quantity .quantity").append(
    "<div class='add'>+</div>"
  );
  $(".woocommerce table.shop_table td.product-quantity .quantity").prepend(
    "<div class='minus'>-</div>"
  );

  $(".add").click(function () {
    if ($(this).prev().val() < 100) {
      $(this)
        .prev()
        .val(+$(this).prev().val() + 1);
    }
  });
  $(".minus").click(function () {
    if ($(this).nextAll("input").val() > 1) {
      var num = $(this).nextAll("input").val() - 1;
      $(this).nextAll("input").val(num);
    }
  });

  $(".single-product .qty").on("change", function () {
    var quantity = $(".qty").val();
    var iPrice = $(".woocommerce-Price-amount bdi").text();
    var price = parseFloat(iPrice.substring(1));
    var total = quantity * price;
    $(".calc_price").text(total);
  });

  $(".woocommerce-cart .minus,.woocommerce-cart .add").on("click", function () {
    var quantity = $(this).siblings(".qty").val();
    var $cartItem = $(this).closest(".cart_item");
    var price = parseFloat(
      $cartItem
        .find(".product-price .woocommerce-Price-amount bdi")
        .text()
        .substring(1)
    );
    var total = quantity * price;
    $cartItem
      .find(".product-subtotal .woocommerce-Price-amount bdi")
      .text("$" + total.toFixed(2));
  });
});

function display(link) {
  window.location.href = link;
}

(function ($) {
  $(document).ready(function () {
    $.ajax({
      type: "GET",
      url: wc_cart_params.ajax_url,
      data: {
        action: "get_cart_count",
      },
      success: function (response) {
        if (response.data.count > 0) {
          $(".cart-count-placeholder").text(response.data.count);
        }
      },
    });
  });
})(jQuery);
