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
    value = parseInt(document.getElementById(e).value);
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
$(function () {
  $(".all-cat-sr li").click(function () {
    $(this)
      .addClass("active-search-li")
      .siblings()
      .removeClass("active-search-li");
  });
});
function set(e) {
  let ul = e.getElementsByTagName("a");
  control.putValue("cat", ul[0].innerHTML);
}
function open_address(e) {
  e.setAttribute("onclick", "close_address(this)");
  let span = control.get("chekout_address");
  span.style.overflow = "visible";
  span.style.minHeight = 0;
  span.style.removeProperty("height");
  close_dvt(control.get("ct-dt"))
  close_pt(control.get("ct-pt"))
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
  close_address(control.get("ct-ad"))
  close_pt(control.get("ct-pt"))
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
  close_dvt(control.get("ct-dt"))
  close_address(control.get("ct-ad"))
}
function close_pt(e) {
  e.setAttribute("onclick", "open_pt(this)");
  let span = control.get("chekout_pt");
  span.style.overflow = "hidden";
  span.style.height = 0;
}
function nex_ad(){
  open_dvt(control.get("ct-ad"));
}
function nex_pt(){
  open_pt(control.get("ct-pt"));
}