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
function hide() {
  var left = control.get("lft");
  var mn = control.get("mn");
  left.style.overflow = "hidden";
  left.style.flexBasis = "0%";
  mn.setAttribute("onclick", "op_en()");
}
function op_en() {
  if (window.innerWidth > 860) {
    var left = control.get("lft");
    var mn = control.get("mn");
    left.style.overflow = "hidden";
    left.style.flexBasis = "33%";
    mn.setAttribute("onclick", "hide()");
  } else {
    var left = control.get("lft");
    var mn = control.get("mn");
    left.style.transform = "translateX(0%)";
  }
}
function op_n() {
  var left = control.get("lft");
  var mn = control.get("mn");
  left.style.transform = "translateX(0%)";
}

function close_res_nav() {
  var left = control.get("lft");
  var mn = control.get("mn");
  left.style.transform = "translateX(-120%)";
  mn.setAttribute("onclick", "op_en()");
}
window.addEventListener("resize", () => {
  if (window.innerWidth > 860) {
    op_en();
  } else {
    var left = control.get("lft");
    left.style.overflow = "visible";
  }
});
function show_preview(e, f) {
  if (validatefile(f)) {
    var reader = new FileReader();
    reader.onload = function () {
      var output = document.getElementById(e);
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  } else {
    swal("File should be in JPEG,JPG or PNG format", "", "warning");
  }
}
function validatefile(e) {
  var fileInput = document.getElementById(e);
  var filePath = fileInput.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
  if (!allowedExtensions.exec(filePath)) {
    fileInput.value = "";
    return 0;
  } else {
    return 1;
  }
}
function view(e) {
  let div = control.get("mi");
  div.src = e.src;
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
          control.redirect("../../");
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
function rcvd(e, oid) {
  var pid = e.value;
  if (e.checked) {
    $.ajax({
      url: "assets/backend/delivery/handover.php",
      type: "post",
      data: "oid=" + oid + "&pid=" + pid,
      success: function (html) {
        control.reload();
      },
    });
  }
}
function out(oid) {
  $.ajax({
    url: "assets/backend/delivery/out.php",
    type: "post",
    data: "oid=" + oid,
    success: function (html) {
      control.redirect("outfordelivery.php");
    },
  });
}
function final_submit(e,pid,oid) {
  var qty = e.previousElementSibling.value;
  $.ajax({
    url: "assets/backend/delivery/final.php",
    type: "post",
    data: "qty=" + qty+ "&pid=" + pid+ "&oid=" + oid,
    success: function (html) {
      control.reload();
    },
  });
}
function delivered(oid){
  $.ajax({
    url: "assets/backend/delivery/delivered.php",
    type: "post",
    data: "oid=" + oid,
    success: function (html) {
      control.redirect("delivery_confirmation.php");
    },
  });
}
function out_undelivered(oid){
  $.ajax({
    url: "assets/backend/delivery/undelivered.php",
    type: "post",
    data: "oid=" + oid,
    success: function (html) {
      control.redirect("undelivery_cnfrm.php");
    },
  });
}