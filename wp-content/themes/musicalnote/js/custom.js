jQuery(document).ready(function ($) {
  $(".woocommerce-cart .minus,.woocommerce-cart .add").on(
    "click",
    function (e) {
      var $quantityInput = $(this).parent(".quantity").children(".qty");
      if ($quantityInput.val() < 1) {
        removeCartItem($quantityInput);
      } else {
        updateCartItemQuantity($quantityInput);
        var price = $(this)
          .parents(".cart_item")
          .find(".product-price>.woocommerce-Price-amount")
          .text();
        price = parseFloat(price.substring(2).replace(/,/g, ""));
        var item_total = $quantityInput.val() * price;
      }
    }
  );
  $(".cart_item .remove-item").click(function () {
    var $quantityInput = $(this).parents(".cart_item").find(".qty");
    $quantityInput.val(0);
    removeCartItem($quantityInput);
  });

  function updateCartItemQuantity($quantityInput) {
    var cartKey = $quantityInput
      .attr("name")
      .replace("cart[", "")
      .replace("][qty]", "");
    var newQuantity = parseInt($quantityInput.val());
    var data = {
      action: "update_cart_item_quantity",
      cart_key: cartKey,
      new_quantity: newQuantity,
    };
    // Add ajaxurl to the data object
    data.ajax_url = MyAjax.ajax_url;
    $.ajax({
      url: MyAjax.ajax_url,
      type: "POST",
      data: data,
      success: function (response) {
        if (response.success) {
          // Cart item quantity updated successfully
          updateCartTotals(response.data);
        } else {
          // Error updating cart item quantity
          console.log("Error updating quantity");
        }
      },
    });
  }
  // Remove cart item
  function removeCartItem($quantityInput) {
    $quantityInput.parents(".cart_item").fadeOut("slow", function () {
      $quantityInput.parents(".cart_item").remove();
    });
    var cartKey = $quantityInput
      .attr("name")
      .replace("cart[", "")
      .replace("][qty]", "");
    var data = {
      action: "remove_cart_item",
      cart_key: cartKey,
    };
    data.ajax_url = MyAjax.ajax_url;
    $.ajax({
      url: MyAjax.ajax_url,
      type: "POST",
      data: data,
      success: function (response) {
        if (response.success) {
          // Cart item removed successfully
          updateCartTotals(response.data);
          if (response.data.check !== "not_empty") {
            // If the cart is empty, asynchronously load the contents from cart-empty.php
            $.ajax({
              url: response.data.check, // Replace with the correct URL
              type: "GET",
              success: function (contents) {
                // Update the DOM element with the contents
                $(".entry-content").html(contents);
              },
              error: function (xhr, status, error) {
                console.log(error); // Handle any errors
              },
            });
          }
          console.log("Success removing cart item");
        } else {
          // Error removing cart item
          console.log("Error removing cart item");
        }
      },
    });
  }
  function updateCartTotals(data) {
    $(".cart-subtotal .woocommerce-Price-amount").html(data.subtotal);
    $(".order-total .woocommerce-Price-amount").html(data.total);
  }
});
