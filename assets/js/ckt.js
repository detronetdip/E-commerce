var ckt = document.getElementById("checkout-form");
ckt.addEventListener("submit", (e) => {
  e.preventDefault();
  validate_checkout();
});
function validate_checkout() {
  try {
    var type = document.querySelector('input[name="dv-ad"]:checked').value;
    try {
      var time = document.querySelector('input[name="fruit"]:checked').value;
      try {
        var pay = document.querySelector(
          'input[name="paymentmethod"]:checked'
        ).value;
        var time = document.querySelector('input[name="fruit"]:checked').value;
        var type = document.querySelector('input[name="dv-ad"]:checked').value;
        check_address(time, type, pay);
      } catch {
        swal("Select Payment Methode");
      }
    } catch {
      swal("Select Delivery Time");
    }
  } catch {
    swal("Select Address");
  }
}
function check_address(time, type, pay) {
  $.ajax({
    url: "assets/backend/user/match_address.php",
    type: "post",
    data: "id=" + type,
    success: function (html) {
      if (html == 1) {
        checkout();
      } else {
        swal(
          "Your Address Not Matched With Your Current City, Select a relavent address"
        );
      }
    },
  });
}
function checkout() {
  var pay = document.querySelector('input[name="paymentmethod"]:checked').value;
  var time = document.querySelector('input[name="fruit"]:checked').value;
  var time_type = document.querySelector(
    'input[name="address3"]:checked'
  ).value;
  var address = document.querySelector('input[name="dv-ad"]:checked').value;
  $.ajax({
    url: "assets/backend/order/checkout.php",
    type: "post",
    data:
      "address=" +
      address +
      "&time=" +
      time +
      "&time_type=" +
      time_type +
      "&pay=" +
      pay,
    success: function (html) {
      submitForm(html);
    },
  });
}
function submitForm(e) {
  document.getElementById("order-id").value = e;
  document.getElementById("checkout-form").submit();
}
function apply_promo() {
  var promo = document.getElementById("promocode").value;
  $.ajax({
    url: "assets/backend/order/apply_promo.php",
    type: "post",
    data: "promo=" + promo,
    success: function (html) {
      var htl = JSON.parse(html);
      swal(htl.msg).then((e) => {
        window.location.href = window.location;
      });
    },
  });
}
function remove_promo() {
  var promo = 3;
  $.ajax({
    url: "assets/backend/order/remove_promo.php",
    type: "post",
    data: "promo=" + promo,
    success: function (html) {
      var htl = JSON.parse(html);
      swal(htl.msg).then((e) => {
        window.location.href = window.location;
      });
    },
  });
}
function apply_wallet() {
  var promo = 1;
  $.ajax({
    url: "assets/backend/order/apply_wallet.php",
    type: "post",
    data: "promo=" + promo,
    success: function (html) {
      var htl = JSON.parse(html);
      swal(htl.msg).then((e) => {
        window.location.href = window.location;
      });
    },
  });
}
function remove_wallet() {
  var promo = 3;
  $.ajax({
    url: "assets/backend/order/remove_wallet.php",
    type: "post",
    data: "promo=" + promo,
    success: function (html) {
      var htl = JSON.parse(html);
      swal(htl.msg).then((e) => {
        window.location.href = window.location;
      });
    },
  });
}