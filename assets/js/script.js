"use strict";
const S = "success";
const W = "warning";
let control = {
  globalShow: function (e) {
    document.getElementById(e).style.display = "initial";
  },
  globalShowFlex: function (e) {
    document.getElementById(e).style.display = "flex";
  },
  globalShowGrid: function (e) {
    document.getElementById(e).style.display = "grid";
  },
  globalHide: function (e) {
    document.getElementById(e).style.display = "none";
  },
  getInput: function (e) {
    let value;
    value = document.getElementById(e).value;
    return value;
  },
  getintInput: function (e) {
    let value;
    value = parseInt(document.getElementById(e).valueAsNumber);
    return value;
  },
  putValue: function (e, k) {
    document.getElementById(e).value = k;
  },
  html: function (e, tml) {
    document.getElementById(e).innerHTML = tml;
  },
  reload: function () {
    window.location.href = window.location;
  },
  readonly: function (e) {
    document.getElementById(e).setAttribute("readonly", true);
  },
  disable: function (e) {
    document.getElementById(e).setAttribute("disabled", true);
  },
  enable: function (e) {
    document.getElementById(e).setAttribute("disabled", false);
  },
  popup: function (e, state = "") {
    if (state == "") {
      swal(e);
    } else {
      swal(e, "", state);
    }
  },
  get: (e) => {
    return document.getElementById(e);
  },
  redirect: (path) => {
    window.location.href = path;
  },
};
function test() {
  control.popup("new popup");
}
function show_userpanel() {
  let div = control.get("userpanel");
  let show = div.getAttribute("show");
  if (!show) {
    div.style.display = "initial";
    div.setAttribute("show", true);
  } else {
    div.style.display = "none";
    div.removeAttribute("show");
  }
}
function show_location() {
  let div = control.get("lcnpnl");
  let show = div.getAttribute("show");
  if (!show) {
    div.style.display = "initial";
    div.setAttribute("show", true);
  } else {
    div.style.display = "none";
    div.removeAttribute("show");
  }
}
function show_cat() {
  let div = control.get("ctcnpnl");
  let show = div.getAttribute("show");
  if (!show) {
    div.style.display = "initial";
    div.setAttribute("show", true);
  } else {
    div.style.display = "none";
    div.removeAttribute("show");
  }
}
function search_city() {
  let value = control.getInput("location_search");
  let all = document.querySelectorAll(".lcn-search");
  all.forEach((e) => {
    if (e.innerHTML.toLowerCase().includes(value.toLowerCase())) {
      e.parentElement.style.display = "";
    } else {
      e.parentElement.style.display = "none";
    }
  });
}
function search_cat() {
  let value = control.getInput("cat_search");
  let all = document.querySelectorAll(".cn-search");
  all.forEach((e) => {
    if (e.innerHTML.toLowerCase().includes(value.toLowerCase())) {
      e.parentElement.style.display = "";
    } else {
      e.parentElement.style.display = "none";
    }
  });
}
function sidebar() {
  let div = control.get("sidebar");
  let open = div.getAttribute("on");
  if (open) {
    div.style.transform = "translateX(-100%)";
    div.removeAttribute("on");
  } else {
    div.style.transform = "translateX(0%)";
    div.setAttribute("on", true);
  }
}
function expand(e) {
  let current = e.parentElement;
  let ul = current.getElementsByClassName("inner-ul");
  let open = ul[0].getAttribute("on");
  if (open) {
    ul[0].style.height = "0";
    ul[0].removeAttribute("on");
  } else {
    ul[0].style.height = "auto";
    ul[0].setAttribute("on", true);
  }
}
function closerss() {
  let div = control.get("rss");
  div.style.display = "none";
}
function openrss() {
  let div = control.get("rss");
  div.style.display = "flex";
}
function view(e) {
  let div = control.get("mi");
  div.src = e.src;
}
function show_promo() {
  let div = control.get("promoform");
  let open = div.getAttribute("on");
  if (open) {
    div.style.display = "none";
    div.removeAttribute("on");
  } else {
    div.style.display = "flex";
    div.setAttribute("on", true);
  }
}
function show_wt() {
  let div = control.get("wt");
  let open = div.getAttribute("on");
  if (open) {
    div.style.display = "none";
    div.removeAttribute("on");
  } else {
    div.style.display = "flex";
    div.setAttribute("on", true);
  }
}
$(function () {
  $(".all-cat-sr li").click(function () {
    $(this)
      .addClass("active-search-li")
      .siblings()
      .removeClass("active-search-li");
  });
});
function set(e) {
  control.putValue("cat", e);
}
function open_address(e) {
  e.setAttribute("onclick", "close_address(this)");
  let span = control.get("chekout_address");
  span.style.overflow = "visible";
  span.style.minHeight = 0;
  span.style.removeProperty("height");
  close_dvt(control.get("ct-dt"));
  close_pt(control.get("ct-pt"));
}
function close_address(e) {
  e.setAttribute("onclick", "open_address(this)");
  let span = control.get("chekout_address");
  span.style.overflow = "hidden";
  span.style.height = 0;
}
function open_dvt(e) {
  e.setAttribute("onclick", "close_dvt(this)");
  let span = control.get("chekout_dvt");
  span.style.overflow = "visible";
  span.style.minHeight = 0;
  span.style.removeProperty("height");
  close_address(control.get("ct-ad"));
  close_pt(control.get("ct-pt"));
}
function close_dvt(e) {
  e.setAttribute("onclick", "open_dvt(this)");
  let span = control.get("chekout_dvt");
  span.style.overflow = "hidden";
  span.style.height = 0;
}
function open_pt(e) {
  e.setAttribute("onclick", "close_pt(this)");
  let span = control.get("chekout_pt");
  span.style.overflow = "visible";
  span.style.minHeight = 0;
  span.style.removeProperty("height");
  close_dvt(control.get("ct-dt"));
  close_address(control.get("ct-ad"));
}
function close_pt(e) {
  e.setAttribute("onclick", "open_pt(this)");
  let span = control.get("chekout_pt");
  span.style.overflow = "hidden";
  span.style.height = 0;
}
function nex_ad() {
  open_dvt(control.get("ct-ad"));
}
function nex_pt() {
  open_pt(control.get("ct-pt"));
}
function convertNumber(x) {
  if (typeof x == "number" && !isNaN(x)) {
    if (Number.isInteger(x)) {
      return parseInt(x);
    } else {
      return parseFloat(x);
    }
  }
}
function increment(e) {
  var v = convertNumber(e.previousElementSibling.valueAsNumber);
  e.previousElementSibling.value = ++v;
}
function decrement(e) {
  var v = convertNumber(e.nextElementSibling.valueAsNumber);
  if (v == 1) {
    swal("1 is minimum qty", "", W);
  } else {
    e.nextElementSibling.value = --v;
  }
}
function go_to_cart() {
  control.redirect("cart.php");
}
function addToCart(id, q) {
  var qty = control.getintInput("single-product-qty");
  $.ajax({
    url: "assets/backend/cart/add.php",
    type: "post",
    data: "id=" + id + "&qty=" + qty,
    success: function (html) {
      var ht = JSON.parse(html);
      if (ht.code == 1) {
        var tp = `
        <button class="order-btn hover-btn" onclick="go_to_cart()">
          <i class="uil uil-shopping-cart-alt"></i> Go to Cart
      </button>
    `;
        q.parentElement.innerHTML = tp;
        control.popup("Added successfully", S);
      } else {
        swal(ht.msg);
      }
    },
  });
}
function add_cart(p, q) {
  var qty = q.previousElementSibling.childNodes[3].valueAsNumber;
  $.ajax({
    url: "assets/backend/cart/add.php",
    type: "post",
    data: "id=" + p + "&qty=" + qty,
    success: function (html) {
      var ht = JSON.parse(html);
      if (ht.code == 1) {
        var tp = `
        <div class="quantity buttons_added">
          <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
          <input type="number" name="quantity" value="${qty}" class="qty-text" />
          <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
        </div>
        <div class="ct-icon" onclick="go_to_cart()">
            <i class="uil uil-shopping-cart-alt"></i>
        </div>
    `;
        q.parentElement.innerHTML = tp;
        control.popup("Added successfully", S);
      } else {
        swal(ht.msg);
      }
    },
  });
}
function inc(e, pid) {
  var cq = parseInt(e.parentElement.previousElementSibling.value);
  console.log(cq);
  $.ajax({
    url: "assets/backend/cart/cart_i.php",
    type: "post",
    data: "id=" + pid + "&cq=" + cq,
    success: function (html) {
      var ht = JSON.parse(html);
      if (ht.code == 1) {
        control.reload();
      } else {
        swal(ht.msg);
      }
    },
  });
}
function de_sc(e, pid) {
  var cq = parseInt(e.parentElement.previousElementSibling.value);
  if (cq == 1) {
    swal("1 is minimum qty", "", W);
  } else {
    $.ajax({
      url: "assets/backend/cart/cart_d.php",
      type: "post",
      data: "id=" + pid + "&cq=" + cq,
      success: function (html) {
        control.reload();
      },
    });
  }
}
function del_cart(id) {
  $.ajax({
    url: "assets/backend/cart/del_cart.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      swal("Deleted", "", S).then(() => {
        control.reload();
      });
    },
  });
}
function register() {
  var email = control.getInput("email");
  var mobile = control.getInput("mobile");
  var password = control.getInput("password");
  var name = control.getInput("name");
  if (name == "") {
    control.popup("Enter Name", W);
  } else if (email == "") {
    control.popup("Enter Email", W);
  } else if (password == "") {
    control.popup("Enter Password", W);
  } else if (mobile == "") {
    control.popup("Enter Mobile", W);
  } else {
    control.html("lgbtn", "wait...");
    $.ajax({
      url: "../assets/backend/auth/register.php",
      type: "post",
      data:
        "email=" +
        email +
        "&password=" +
        password +
        "&mobile=" +
        mobile +
        "&name=" +
        name,
      success: function (htl) {
        var html = JSON.parse(htl);
        if (html.status != 1) {
          control.popup(html.msg, W);
          control.html("lgbtn", "Register");
        } else {
          control.redirect("../");
        }
      },
    });
  }
}
function login() {
  var username = control.getInput("username");
  var password = control.getInput("password");
  if (username == "") {
    control.popup("Enter Username", W);
  } else if (password == "") {
    control.popup("Enter Password", W);
  } else {
    control.html("lgbtn", "wait...");
    $.ajax({
      url: "../../assets/backend/auth/validate.php",
      type: "post",
      data: "username=" + username + "&password=" + password,
      success: function (htl) {
        var html = JSON.parse(htl);
        if (html.status != 1) {
          control.popup(html.msg, W);
          control.html("lgbtn", "Login");
        } else {
          control.redirect("../../index.php");
        }
      },
    });
  }
}
function logout() {
  var email = 0;
  $.ajax({
    url: "assets/backend/auth/logout.php",
    type: "post",
    data: "email=" + email,
    success: function (htl) {
      control.reload();
    },
  });
}
function mobile_sent_otp() {
  let id = control.getInput("verify_mobile");
  if (id != "") {
    control.html("mobile-sent_otp", "wait..");
    control.disable("mobile-sent_otp");
    $.ajax({
      url: "assets/backend/auth/sent_otp_mobile.php",
      type: "post",
      data: "id=" + id,
      success: function (html) {
        alert(html);
        swal("Sent", "", S).then(function () {
          control.readonly("verify_mobile");
          control.enable("mobile-sent_otp");
          let r = control.get("mobile-sent_otp");
          r.removeAttribute("disabled");
          control.html("mobile-sent_otp", "Verify");
          r.setAttribute("onclick", "verify_mobile_otp()");
          var t = control.get("verifymobile_otp");
          var tb = control.get("verifymobile_otp_label");
          t.style.display = "flex";
          tb.style.display = "flex";
        });
      },
    });
  } else {
    swal("Enter Mobile First", "", "warning");
  }
}
function verify_mobile_otp() {
  let otp = control.getInput("verifymobile_otp");
  let mobile = control.getInput("verify_mobile");
  $.ajax({
    url: "assets/backend/auth/verify_otp_mobile.php",
    type: "post",
    data: "id=" + otp + "&mobile=" + mobile,
    success: function (html) {
      let res = JSON.parse(html);
      if (res.res == 1) {
        control.globalHide("verifymobile_otp");
        control.globalHide("verifymobile_otp_label");
        control.html("mobile-sent_otp", "Verified");
        control.get("mobile-sent_otp").removeAttribute("onclick");
        control.readonly("mobile-sent_otp");
        swal(res.msg);
      } else {
        swal(res.msg);
      }
    },
  });
}
function email_sent_otp() {
  let id = control.getInput("verify_email");
  if (id != "") {
    control.html("email-sent_otp", "wait..");
    $.ajax({
      url: "assets/backend/auth/sent_otp_email.php",
      type: "post",
      data: "id=" + id,
      success: function (html) {
        alert(html);
        swal("Sent", "", S).then(function () {
          control.readonly("verify_email");
          control.enable("email-sent_otp");
          let r = control.get("email-sent_otp");
          r.removeAttribute("disabled");
          control.html("email-sent_otp", "Verify");
          r.setAttribute("onclick", "verify_email_otp()");
          var t = control.get("verifyemail_otp");
          var tb = control.get("verifyemail_otp_label");
          t.style.display = "flex";
          tb.style.display = "flex";
        });
      },
    });
  } else {
    swal("Enter Email First", "", "warning");
  }
}
function verify_email_otp() {
  let otp = control.getInput("verifyemail_otp");
  let email = control.getInput("verify_email");
  $.ajax({
    url: "assets/backend/auth/verify_otp_email.php",
    type: "post",
    data: "id=" + otp + "&email=" + email,
    success: function (html) {
      let res = JSON.parse(html);
      if (res.res == 1) {
        control.globalHide("verifyemail_otp");
        control.globalHide("verifyemail_otp_label");
        control.html("email-sent_otp", "Verified");
        control.get("email-sent_otp").removeAttribute("onclick");
        control.readonly("email-sent_otp");
        swal(res.msg);
      } else {
        swal(res.msg);
      }
    },
  });
}
function validate_number() {
  var _number = control.getInput("dv-number");
  if (_number.length > 10) {
    control.popup("Mobile no must be 10 digit only", W);
  }
}
function validate_number2() {
  var _number = control.getInput("verify_mobile");
  if (_number.length > 10) {
    control.popup("Mobile no must be 10 digit only", W);
  }
}
function add_new_address() {
  var name, mobile, city, address, pin, landmark;
  var type = document.querySelector('input[name="address1"]:checked').value;
  name = control.getInput("dv-name");
  mobile = control.getInput("dv-number");
  city = control.getInput("dv-city");
  address = control.getInput("dv-address");
  pin = control.getInput("dv-pin");
  landmark = control.getInput("dv-land");
  if (name == "") {
    control.popup("Enter Name", W);
  } else if (mobile == "") {
    control.popup("Enter Mobile", W);
  } else if (city == "#=") {
    control.popup("Enter city", W);
  } else if (address == "") {
    control.popup("Enter address", W);
  } else if (pin == "") {
    control.popup("Enter pin", W);
  } else if (landmark == "") {
    control.popup("Enter landmark", W);
  } else {
    $.ajax({
      url: "assets/backend/user/add_new_address.php",
      type: "post",
      data:
        "name=" +
        name +
        "&mobile=" +
        mobile +
        "&address=" +
        address +
        "&city=" +
        city +
        "&pin=" +
        pin +
        "&landmark=" +
        landmark +
        "&type=" +
        type,
      success: function (html) {
        fetch_address();
        control.putValue("dv-name", "");
        control.putValue("dv-number", "");
        control.putValue("dv-city", "Select City");
        control.putValue("dv-address", "");
        control.putValue("dv-pin", "");
        control.putValue("dv-land", "");
        swal("Added Successfully");
      },
    });
  }
}
function fetch_address() {
  var id = 1;
  $.ajax({
    url: "assets/backend/user/fetch_address.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.html("ad-ad", html);
    },
  });
}
function update_address(id) {
  var name, mobile, city, address, pin, landmark;
  var type = document.querySelector('input[name="address1"]:checked').value;
  name = control.getInput("dv-name");
  mobile = control.getInput("dv-number");
  city = control.getInput("dv-city");
  address = control.getInput("dv-address");
  pin = control.getInput("dv-pin");
  landmark = control.getInput("dv-land");
  if (name == "") {
    control.popup("Enter Name", W);
  } else if (mobile == "") {
    control.popup("Enter Mobile", W);
  } else if (city == "#=") {
    control.popup("Enter city", W);
  } else if (address == "") {
    control.popup("Enter address", W);
  } else if (pin == "") {
    control.popup("Enter pin", W);
  } else if (landmark == "") {
    control.popup("Enter landmark", W);
  } else {
    $.ajax({
      url: "assets/backend/user/update_address.php",
      type: "post",
      data:
        "name=" +
        name +
        "&mobile=" +
        mobile +
        "&address=" +
        address +
        "&city=" +
        city +
        "&pin=" +
        pin +
        "&landmark=" +
        landmark +
        "&type=" +
        type +
        "&id=" +
        id,
      success: function (html) {
        swal("Updated Successfully").then(() => {
          control.redirect("address.php");
        });
      },
    });
  }
}
function del_address(id) {
  $.ajax({
    url: "assets/backend/user/delete_address.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      swal("Deleted Successfully").then(() => {
        control.reload();
      });
    },
  });
}
function addwish(id) {
  $.ajax({
    url: "assets/backend/wishlist/wish.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      let o = JSON.parse(html);
      if (o.err_code == 0) {
        swal(o.msg);
      } else if (o.err_code == 1) {
        swal(o.msg, "", "success").then((e) => {
          control.reload();
        });
      }
    },
  });
}
function gowish() {
  control.redirect("wishlist.php");
}
function del_wish(id) {
  $.ajax({
    url: "assets/backend/wishlist/del_wish.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.reload();
    },
  });
}
function getprice() {
  var val = control.getInput("price-input");
  control.html("fnlp", val);
}
function filterPrice() {
  let r = document.querySelectorAll(".ftrp");
  var val = control.getInput("price-input");
  r.forEach((e) => {
    if (parseInt(e.innerHTML) <= val) {
      e.parentElement.parentElement.parentElement.style.display = "initial";
    } else {
      console.log(e.parentElement.parentElement);
      e.parentElement.parentElement.parentElement.style.display = "none";
    }
  });
}
function removeParam(key, sourceURL) {
  var rtn = sourceURL.split("?")[0],
    param,
    params_arr = [],
    queryString = sourceURL.indexOf("?") !== -1 ? sourceURL.split("?")[1] : "";
  if (queryString !== "") {
    params_arr = queryString.split("&");
    for (var i = params_arr.length - 1; i >= 0; i -= 1) {
      param = params_arr[i].split("=")[0];
      if (param === key) {
        params_arr.splice(i, 1);
      }
    }
    if (params_arr.length) rtn = rtn + "?" + params_arr.join("&");
  }
  return rtn;
}
function checksubcat(e) {
  let d = e.checked;
  if (d) {
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("scat", e.value);
    history.replaceState(null, null, "?" + queryParams.toString());
    control.reload();
  } else {
    var originalURL = String(window.location);
    var alteredURL = removeParam("scat", originalURL);
    var alteredURL = removeParam("filter", alteredURL);
    var alteredURL = removeParam("subfilter", alteredURL);
    window.location.href = alteredURL;
  }
}
function checkfilter(e) {
  let d = e.checked;
  if (d) {
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("filter", e.value);
    history.replaceState(null, null, "?" + queryParams.toString());
    control.reload();
  } else {
    var originalURL = String(window.location);
    var alteredURL = removeParam("filter", originalURL);
    var alteredURL = removeParam("subfilter", alteredURL);
    window.location.href = alteredURL;
  }
}
function checksfilter(e) {
  let d = e.checked;
  if (d) {
    var queryParams = new URLSearchParams(window.location.search);
    queryParams.set("subfilter", e.value);
    history.replaceState(null, null, "?" + queryParams.toString());
    control.reload();
  } else {
    var originalURL = String(window.location);
    var alteredURL = removeParam("subfilter", originalURL);
    window.location.href = alteredURL;
  }
}
function confirm_delivered_order(oid) {
  $.ajax({
    url: "assets/backend/order/cnfrm.php",
    type: "post",
    data: "id=" + oid,
    success: function (html) {
      control.redirect("myac.php");
    },
  });
}
function not_confirm_delivered_order(oid) {
  $.ajax({
    url: "assets/backend/order/ncnfrm.php",
    type: "post",
    data: "id=" + oid,
    success: function (html) {
      control.redirect("myac.php");
    },
  });
}
