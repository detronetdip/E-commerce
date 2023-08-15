let ite, ife, control;
ite = true;
ife = true;
control = {
  globalShow: function (e) {
    document.getElementById(e).style.display = "initial";
  },
  globalShowGrid: function (e) {
    document.getElementById(e).style.display = "grid";
  },
  globalHide: function (e) {
    document.getElementById(e).style.display = "none";
  },
  reload: function () {
    window.location.href = window.location;
  },
  getInput: function (e) {
    let value;
    value = document.getElementById(e).value;
    return value;
  },
  getintInput: function (e) {
    let value, v;
    value = document.getElementById(e).value;
    if (Number.isInteger(value)) {
      v = parseInt(value);
    } else {
      v = parseFloat(value).toFixed(2);
    }
    return v;
  },
  putValue: function (e, k) {
    document.getElementById(e).value = k;
  },
  showLoader: function () {
    document.getElementById("loder").style.display = "flex";
  },
  hideLoader: function () {
    document.getElementById("loder").style.display = "none";
  },
  html: function (e, tml) {
    document.getElementById(e).innerHTML = tml;
  },
  disable: function (e) {
    document.getElementById(e).disabled = true;
  },
  enable: function (e) {
    document.getElementById(e).disabled = false;
  },
};

function redirect_to(path) {
  window.location.href = path;
}

function search(i_field, d_name) {
  let val;
  let text;
  let value = control.getInput(i_field);
  let upV = value.toUpperCase();
  let sp = document.getElementsByClassName(d_name);
  for (var i = 0; i < sp.length; i++) {
    val = sp[i].innerHTML;
    text = val.toUpperCase();
    if (text.indexOf(upV) > -1) {
      sp[i].parentElement.style.display = "";
    } else {
      sp[i].parentElement.style.display = "none";
    }
  }
}
function closeadct() {
  control.globalHide("floatwrap");
}
function showadct() {
  control.globalShowGrid("floatwrap");
}
function showadsctfa() {
  showadct2();
  let e = 2;
  $.ajax({
    url: "assets/backend/subcat/show-addsubcat.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("cataddboxsub", html);
    },
  });
}
function showadctfa() {
  showadct();
  let e = 2;
  $.ajax({
    url: "assets/backend/category/show-addcat.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("cataddbox", html);
    },
  });
}

function closeadct2() {
  control.globalHide("floatwrap2");
}

function closeadctp() {
  control.globalHide("globalfloatwrap");
}

function showadct2() {
  control.globalShowGrid("floatwrap2");
}

function changeview(src) {
  document.getElementById("mi").src = src;
}

function showdetailproduct(id) {
  control.globalShowGrid("globalfloatwrap");
  control.globalHide("updatebalance");
  control.globalHide("productviewapprove");
  $.ajax({
    url: "assets/backend/product/show-addproduct.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.html("productview", html);
    },
  });
}

function show_preview(e) {
  var reader = new FileReader();
  reader.onload = function () {
    var output = document.getElementById(e);
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}

function showwallet() {
  control.globalShowGrid("globalfloatwrap");
  control.globalHide("productview");
  control.globalHide("productviewapprove");
}

function viewseller() {
  control.globalShowGrid("globalfloatwrap");
  control.globalHide("productview");
  control.globalHide("updatebalance");
}

function closebalance() {
  control.globalHide("globalfloatwrap");
}

function viewproductapprove() {
  control.globalShowGrid("globalfloatwrap");
  control.globalHide("productview");
  control.globalHide("updatebalance");
  control.globalShow("productviewapprove");
}

function fetchcity() {
  const article = document.querySelectorAll(".cv");
  let m = document.getElementById("allcntry").value;
  article.forEach((element) => {
    let r = element.dataset.cn;
    if (m == "#") {
      console.log("u");
      element.parentElement.style.display = "";
    } else {
      if (r == m) {
        element.parentElement.style.display = "";
      } else {
        element.parentElement.style.display = "none";
      }
    }
  });
}

function editcat(e) {
  showadct();
  $.ajax({
    url: "assets/backend/category/editcat.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("cataddbox", html);
    },
  });
}

function editsubcat(e) {
  showadct2();
  $.ajax({
    url: "assets/backend/subcat/editsubcats.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("cataddboxsub", html);
    },
  });
}

function updatesubcat(e) {
  let nam = control.getInput("subcatname");
  let pcat = control.getInput("addsubcat");
  let sale = control.getInput("subcatsale");
  document.getElementById("esctbt").disabled = true;
  $.ajax({
    url: "assets/backend/subcat/updatesubcat.php",
    type: "post",
    data: "id=" + e + "&name=" + nam + "&pcat=" + pcat + "&sale=" + sale,
    success: function (html) {
      if (html == 3) {
        control.html("msg", nam + " Already exist in category " + pcat);
        document.getElementById("esctbt").disabled = false;
      } else {
        if (html == 0) {
          control.html("msg", " Something Went Wrong");
          document.getElementById("esctbt").disabled = false;
        } else {
          control.html("msg", nam + " Updated sucessfully");
          updatesubcatlist();
          setTimeout(() => {
            editsubcat(e);
          }, 1000);
        }
      }
    },
  });
}

function updatecat(e) {
  let nam = control.getInput("updtedcat");
  if (nam == "") {
    control.html("msg", "Enter Category Name");
  } else {
    document.getElementById("edctbt").disabled = true;
    $.ajax({
      url: "assets/backend/category/updatecat.php",
      type: "post",
      data: "id=" + e + "&name=" + nam,
      success: function (html) {
        if (html == 3) {
          control.html("msg", nam + " Already exist in category ");
          document.getElementById("edctbt").disabled = false;
        } else {
          if (html == 0) {
            control.html("msg", " Something Went Wrong");
            document.getElementById("edctbt").disabled = false;
          } else {
            control.html("msg", nam + " Updated sucessfully");
            updatecatlist();
            setTimeout(() => {
              editcat(e);
            }, 1000);
          }
        }
      },
    });
  }
}

function updatecatlist() {
  let e = 0;
  $.ajax({
    url: "assets/backend/category/catlist.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("catrows", html);
    },
  });
}

function updatesubcatlist() {
  let e = 0;
  $.ajax({
    url: "assets/backend/subcat/updatesubcatlist.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("subcatrows", html);
    },
  });
}

function cat_acdc(i, s) {
  $.ajax({
    url: "assets/backend/category/cat_acdc.php",
    type: "post",
    data: "id=" + i + "&status=" + s,
    success: function (html) {
      console.log(html);
      updatecatlist();
    },
  });
}

function subcat_acdc(i, s) {
  $.ajax({
    url: "assets/backend/subcat/subcat_acdc.php",
    type: "post",
    data: "id=" + i + "&status=" + s,
    success: function (html) {
      console.log(html);
      updatesubcatlist();
    },
  });
}

function catdelete(i) {
  $.ajax({
    url: "assets/backend/category/cat_delete.php",
    type: "post",
    data: "id=" + i,
    success: function (html) {
      console.log(html);
      updatecatlist();
    },
  });
}

function subcatdelete(i) {
  $.ajax({
    url: "assets/backend/subcat/subcat_delete.php",
    type: "post",
    data: "id=" + i,
    success: function (html) {
      console.log(html);
      updatesubcatlist();
    },
  });
}

function delete_product(i) {
  $.ajax({
    url: "assets/backend/product/product_delete.php",
    type: "post",
    data: "id=" + i,
    success: function (html) {
      console.log(html);
      updateproductlist();
    },
  });
}

function addnewcat() {
  let nam = control.getInput("updtedcat");
  if (nam == "") {
    control.html("msg", "Enter Category Name");
  } else {
    document.getElementById("adctbt").disabled = true;
    $.ajax({
      url: "assets/backend/category/addcat.php",
      type: "post",
      data: "name=" + nam,
      success: function (html) {
        if (html == 3) {
          control.html("msg", nam + " Already exist in category ");
          document.getElementById("adctbt").disabled = false;
        } else {
          if (html == 0) {
            control.html("msg", " Something Went Wrong");
            document.getElementById("adctbt").disabled = false;
          } else {
            control.html("msg", nam + " Added sucessfully");
            updatecatlist();
            setTimeout(() => {
              showadctfa();
            }, 1000);
          }
        }
      },
    });
  }
}

function addnewsubcat() {
  let nam = control.getInput("subcatname");
  let pcat = control.getInput("addsubcat");
  let sale = control.getInput("subcatsale");
  if (nam == "" || pcat == "#" || sale == "") {
    control.html("msg", "All fields are mandatory");
  } else {
    document.getElementById("adsctbt").disabled = true;
    $.ajax({
      url: "assets/backend/subcat/addsubcat.php",
      type: "post",
      data: "name=" + nam + "&pcat=" + pcat + "&sale=" + sale,
      success: function (htm) {
        htl = JSON.parse(htm);
        html = htl.status;
        if (html == 3) {
          control.html("msg", nam + " Already exist in category " + pcat);
          document.getElementById("adsctbt").disabled = false;
        } else {
          if (html == 0) {
            control.html("msg", " Something Went Wrong");
            document.getElementById("adsctbt").disabled = false;
          } else if (html == 2) {
            control.html("msg", " Can not add more than 5 subcategory");
          } else {
            control.html("msg", nam + " Added sucessfully");
            addcommission(htl.id, sale);
            updatesubcatlist();
            setTimeout(() => {
              showadsctfa();
            }, 1000);
          }
        }
      },
    });
  }
}

function get_subcatfa() {
  let pcat = control.getInput("addcatname");
  if (pcat == "#") {
    alert("select category first");
  } else {
    $.ajax({
      url: "assets/backend/subcat/get_subcat.php",
      type: "post",
      data: "pcat=" + pcat,
      success: function (html) {
        control.html("addscatname", html);
      },
    });
  }
}
function add_product() {
  let img1 = document.getElementById("uploadimage1");
  let img2 = document.getElementById("uploadimage2");
  let img3 = document.getElementById("uploadimage3");
  let img4 = document.getElementById("uploadimage4");
  let category,
    scategory,
    name,
    quantity,
    price,
    sellprice,
    sd,
    d,
    taxx,
    return_p,
    rday,
    repref,
    tc,
    shipping,
    shippingex;
  category = control.getInput("addcatname");
  scategory = control.getInput("addscatname");
  name = control.getInput("pname");
  quantity = control.getInput("pqty");
  price = control.getInput("pprice");
  sellprice = control.getInput("psprice");
  taxx = control.getInput("tax");
  sd = control.getInput("shrtdsc");
  d = control.getInput("dsc");
  shipping = control.getInput("shippimg");
  shippingex = control.getInput("shippingex");
  return_p = control.getInput("return_selector");
  rday = 0;
  repref = control.getInput("return_refund");
  tc = control.getInput("tc");
  if (img1.files.length == 0) {
    control.html("pdstatus", "Select First Image");
  } else if (img2.files.length == 0) {
    control.html("pdstatus", "Select Second Image");
  } else if (return_p == "Custom" && rday == "") {
    checkpolicy();
    control.html("pdstatus", "Enter Return Day");
  } else if (repref == "0") {
    control.html("pdstatus", "Select Return or Refund");
  } else if (tc == "") {
    control.html("pdstatus", "Enter T&C");
  } else if (category == "#") {
    control.html("pdstatus", "Select Category");
  } else if (scategory == "#") {
    control.html("pdstatus", "Select Subcategory");
  } else if (name == "") {
    control.html("pdstatus", "Enter Name");
  } else if (quantity == "") {
    control.html("pdstatus", "Enter Quantity");
  } else if (price == "") {
    control.html("pdstatus", "Enter Price");
  } else if (sellprice == "") {
    control.html("pdstatus", "Enter Selling Price");
  } else if (taxx == "") {
    control.html("pdstatus", "Enter Tax");
  } else if (shipping == "") {
    control.html("pdstatus", "Enter Shipping Charge");
  } else if (shippingex == "") {
    control.html("pdstatus", "Enter Shipping Charge Per Extra Qty");
  } else if (sd == "") {
    control.html("pdstatus", "Enter short description");
  } else if (d == "") {
    control.html("pdstatus", "Enter description");
  } else {
    if (img3.files.length == 0) {
      ite = false;
    }
    if (img4.files.length == 0) {
      ife = false;
    }
    control.html("pdstatus", "Adding Images...");
    control.disable("pbtn");
    var fd = new FormData();
    var files = $("#uploadimage1")[0].files;
    fd.append("file", files[0]);
    $.ajax({
      url: "assets/backend/product/addmainimage.php",
      type: "post",
      data: fd,
      contentType: false,
      processData: false,
      success: function (html) {
        if (html == "Format of First Image Is Not supported") {
          control.html("pdstatus", html);
          control.enable("pbtn");
        } else {
          add_secondimage(html);
        }
      },
    });
  }
}

function add_secondimage(img1) {
  let img2 = document.getElementById("uploadimage2");
  control.html("pdstatus", "Adding Images...");
  var fd = new FormData();
  var files = $("#uploadimage2")[0].files;
  fd.append("file", files[0]);
  $.ajax({
    url: "assets/backend/product/addsimage.php",
    type: "post",
    data: fd,
    contentType: false,
    processData: false,
    success: function (html) {
      if (html == "Format of Second Image Is Not supported") {
        control.html("pdstatus", html);
        control.enable("pbtn");
      } else {
        if (ite) {
          add_thirdimage(img1, html);
        } else {
          add_p_detailes(img1, html);
        }
      }
    },
  });
}

function add_thirdimage(img1, img2) {
  let img3 = document.getElementById("uploadimage3");
  control.html("pdstatus", "Adding Images...");
  var fd = new FormData();
  var files = $("#uploadimage3")[0].files;
  fd.append("file", files[0]);
  $.ajax({
    url: "assets/backend/product/addtimage.php",
    type: "post",
    data: fd,
    contentType: false,
    processData: false,
    success: function (html) {
      if (html == "Format of Third Image Is Not supported") {
        control.html("pdstatus", html);
        control.enable("pbtn");
      } else {
        if (ife) {
          add_fourthimage(img1, img2, html);
        } else {
          add_p_detailes(img1, img2, html);
        }
      }
    },
  });
}

function add_fourthimage(img1, img2, img3) {
  let img4 = document.getElementById("uploadimage4");
  control.html("pdstatus", "Adding Images...");
  var fd = new FormData();
  var files = $("#uploadimage4")[0].files;
  fd.append("file", files[0]);
  $.ajax({
    url: "assets/backend/product/addfimage.php",
    type: "post",
    data: fd,
    contentType: false,
    processData: false,
    success: function (html) {
      if (html == "Format of Fourth Image Is Not supported") {
        control.html("pdstatus", html);
        control.enable("pbtn");
      } else {
        add_p_detailes(img1, img2, img3, html);
      }
    },
  });
}

function add_p_detailes(img1 = 0, img2 = 0, img3 = 0, img4 = 0) {
  control.html("pdstatus", "Adding Detailes...");
  let category,
    scategory,
    name,
    quantity,
    price,
    sellprice,
    sd,
    d,
    bestsell,
    return_p,
    rday,
    repref,
    tc,
    shipping,
    shippingex;
  category = control.getInput("addcatname");
  shipping = control.getInput("shippimg");
  shippingex = control.getInput("shippingex");
  scategory = control.getInput("addscatname");
  name = control.getInput("pname");
  quantity = control.getInput("pqty");
  price = control.getInput("pprice");
  sellprice = control.getInput("psprice");
  taxx = control.getInput("tax");
  fa = control.getInput("fa");
  sku = control.getInput("sku");
  sd = control.getInput("shrtdsc");
  d = control.getInput("dsc");
  bestsell = control.getInput("addbs");
  return_p = control.getInput("return_selector");
  rday = 0;
  repref = control.getInput("return_refund");
  tc = control.getInput("tc");
  $.ajax({
    url: "assets/backend/product/addproduct.php",
    type: "post",
    data:
      "category=" +
      category +
      "&subcat=" +
      scategory +
      "&name=" +
      name +
      "&quantity=" +
      quantity +
      "&price=" +
      price +
      "&sellprice=" +
      sellprice +
      "&sd=" +
      sd +
      "&d=" +
      d +
      "&bestsell=" +
      bestsell +
      "&img1=" +
      img1 +
      "&img2=" +
      img2 +
      "&img3=" +
      img3 +
      "&img4=" +
      img4 +
      "&tax=" +
      taxx +
      "&fa=" +
      fa +
      "&sku=" +
      sku +
      "&return_p=" +
      return_p +
      "&rday=" +
      rday +
      "&repref=" +
      repref +
      "&tc=" +
      tc +
      "&shipping=" +
      shipping +
      "&shippingex=" +
      shippingex,
    success: function (htl) {
      let html = JSON.parse(htl);
      if (html.code == 3) {
        control.html("pdstatus", "Product exist with same name");
        control.enable("pbtn");
      } else {
        if (html.code == 1) {
          control.html("pdstatus", "Detailes added seccessfuly");
          get_all_filters(html.id);
          setTimeout(() => {
            control.html("pdstatus", "");
            control.reload();
          }, 2000);
        } else {
          control.html("pdstatus", "something went wrong");
          control.enable("pbtn");
        }
      }
    },
  });
}
function get_all_filters(pid) {
  control.html("pdstatus", "Adding filters..");
  var filters = document.getElementsByName("productFiltersName");
  var n = filters.length;
  var filterArr = [];
  for (let i = 0; i < n; i++) {
    filterArr[i] = filters[i].value;
  }
  filterArr[filterArr.length] = pid;
  $.ajax({
    url: "assets/backend/filter/add_product_filter.php",
    type: "POST",
    data: "json=" + JSON.stringify(filterArr),
    dataType: "json",
    async: false,
    success: function (msg) {
      console.log(msg);
    },
  });
  get_all_sub_filters(pid);
}
function get_all_sub_filters(pid) {
  control.html("pdstatus", "Adding sub-filters..");
  var filters = document.getElementsByName("productSubFiltersName");
  var subFilterArr = [];
  var k = 0;
  var n = filters.length;
  for (let i = 0; i < n; i++) {
    if (filters[i].checked) {
      subFilterArr[k] = filters[i].value;
      k++;
    }
  }
  subFilterArr[subFilterArr.length] = pid;
  $.ajax({
    url: "assets/backend/filter/add_product_sub_filter.php",
    type: "POST",
    data: "json=" + JSON.stringify(subFilterArr),
    dataType: "json",
    async: false,
    success: function (msg) {
      console.log(msg);
    },
  });
  control.html("pdstatus", "Product added seccessfuly");
}
function product_acdc(i, s) {
  $.ajax({
    url: "assets/backend/product/pt_acdc.php",
    type: "post",
    data: "id=" + i + "&status=" + s,
    success: function (html) {
      updateproductlist();
    },
  });
}

function updateproductlist() {
  let e = 0;
  $.ajax({
    url: "assets/backend/product/updateproductlist.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("productsecrow", html);
    },
  });
}

function edit_product(e) {
  updateimage1(e);
}

function updateimage1(id) {
  let img1 = document.getElementById("uploadimage1");
  if (img1.files.length != 0) {
    var fd = new FormData();
    var files = $("#uploadimage1")[0].files;
    fd.append("file", files[0]);
    $.ajax({
      url: "assets/backend/product/updatemainimage.php",
      type: "post",
      data: fd,
      contentType: false,
      processData: false,
      success: function (html) {
        if (html == "Format of First Image Is Not supported") {
          control.html("pdstatus", html);
        } else {
          update_secondimage(html, id);
        }
      },
    });
  } else {
    let html = "";
    update_secondimage(html, id);
  }
}

function update_secondimage(img1, id) {
  let img2 = document.getElementById("uploadimage2");
  if (img2.files.length != 0) {
    control.html("pdstatus", "Adding Images...");
    var fd = new FormData();
    var files = $("#uploadimage2")[0].files;
    fd.append("file", files[0]);
    $.ajax({
      url: "assets/backend/product/updatesimage.php",
      type: "post",
      data: fd,
      contentType: false,
      processData: false,
      success: function (html) {
        if (html == "Format of Second Image Is Not supported") {
          control.html("pdstatus", html);
        } else {
          update_thirdimage(img1, html, id);
        }
      },
    });
  } else {
    let html = "";
    update_thirdimage(img1, html, id);
  }
}

function update_thirdimage(img1, img2, id) {
  let img3 = document.getElementById("uploadimage3");
  if (img3.files.length != 0) {
    control.html("pdstatus", "Adding Images...");
    var fd = new FormData();
    var files = $("#uploadimage3")[0].files;
    fd.append("file", files[0]);
    $.ajax({
      url: "assets/backend/product/updatetimage.php",
      type: "post",
      data: fd,
      contentType: false,
      processData: false,
      success: function (html) {
        if (html == "Format of Third Image Is Not supported") {
          control.html("pdstatus", html);
        } else {
          update_fourthimage(img1, img2, html, id);
        }
      },
    });
  } else {
    let html = "";
    update_fourthimage(img1, img2, html, id);
  }
}

function update_fourthimage(img1, img2, img3, id) {
  let img4 = document.getElementById("uploadimage4");
  if (img4.files.length != 0) {
    control.html("pdstatus", "Adding Images...");
    var fd = new FormData();
    var files = $("#uploadimage4")[0].files;
    fd.append("file", files[0]);
    $.ajax({
      url: "assets/backend/product/updatefimage.php",
      type: "post",
      data: fd,
      contentType: false,
      processData: false,
      success: function (html) {
        if (html == "Format of Fourth Image Is Not supported") {
          control.html("pdstatus", html);
        } else {
          update_p_detailes(img1, img2, img3, html, id);
        }
      },
    });
  } else {
    let html = "";
    update_p_detailes(img1, img2, img3, html, id);
  }
}

function update_p_detailes(img1, img2, img3, img4, id) {
  control.html("pdstatus", "Adding Detailes...");
  let category,
    scategory,
    name,
    quantity,
    price,
    sellprice,
    sd,
    d,
    bestsell,
    return_p,
    rday,
    repref,
    tc,
    shipping,
    shippingex;
  shipping = control.getInput("shippimg");
  shippingex = control.getInput("shippingex");
  category = control.getInput("addcatname");
  scategory = control.getInput("addscatname");
  name = control.getInput("pname");
  quantity = control.getInput("pqty");
  price = control.getInput("pprice");
  sellprice = control.getInput("psprice");
  taxx = control.getInput("tax");
  fa = control.getInput("fa");
  sku = control.getInput("sku");
  sd = control.getInput("shrtdsc");
  d = control.getInput("dsc");
  bestsell = control.getInput("addbs");
  return_p = control.getInput("return_selector");
  if (return_p == "7 days return" || return_p == "No Return") {
    rday = 0;
  } else {
    rday = 0;
  }
  repref = control.getInput("return_refund");
  tc = control.getInput("tc");
  $.ajax({
    url: "assets/backend/product/updateproduct.php",
    type: "post",
    data:
      "category=" +
      category +
      "&subcat=" +
      scategory +
      "&name=" +
      name +
      "&quantity=" +
      quantity +
      "&price=" +
      price +
      "&sellprice=" +
      sellprice +
      "&sd=" +
      sd +
      "&d=" +
      d +
      "&bestsell=" +
      bestsell +
      "&img1=" +
      img1 +
      "&img2=" +
      img2 +
      "&img3=" +
      img3 +
      "&img4=" +
      img4 +
      "&id=" +
      id +
      "&tax=" +
      taxx +
      "&fa=" +
      fa +
      "&sku=" +
      sku +
      "&return_p=" +
      return_p +
      "&rday=" +
      rday +
      "&repref=" +
      repref +
      "&tc=" +
      tc +
      "&shipping=" +
      shipping +
      "&shippingex=" +
      shippingex,
    success: function (htl) {
      let html = JSON.parse(htl);
      if (html.code == 3) {
        control.html("pdstatus", "Product exist with same name");
      } else {
        if (html.code == 1) {
          control.html("pdstatus", "Product updated seccessfuly");
          get_all_filters_update(html.id);
          setTimeout(() => {
            control.html("pdstatus", "");
            control.reload();
          }, 1000);
        } else {
          control.html("pdstatus", "Something went wrong");
        }
      }
    },
  });
}
function get_all_filters_update(pid) {
  control.html("pdstatus", "Adding filters..");
  var filters = document.getElementsByName("productFiltersName");
  var n = filters.length;
  var filterArr = [];
  for (let i = 0; i < n; i++) {
    filterArr[i] = filters[i].value;
  }
  filterArr[filterArr.length] = pid;
  $.ajax({
    url: "assets/backend/filter/add_product_filter_update.php",
    type: "POST",
    data: "json=" + JSON.stringify(filterArr),
    dataType: "json",
    async: false,
    success: function (msg) {
      console.log(msg);
    },
  });
  get_all_sub_filters_update(pid);
}
function get_all_sub_filters_update(pid) {
  control.html("pdstatus", "Adding sub-filters..");
  var filters = document.getElementsByName("productSubFiltersName");
  var subFilterArr = [];
  var k = 0;
  var n = filters.length;
  for (let i = 0; i < n; i++) {
    if (filters[i].checked) {
      subFilterArr[k] = filters[i].value;
      k++;
    }
  }
  subFilterArr[subFilterArr.length] = pid;
  $.ajax({
    url: "assets/backend/filter/add_product_sub_filter_update.php",
    type: "POST",
    data: "json=" + JSON.stringify(subFilterArr),
    dataType: "json",
    async: false,
    success: function (msg) {
      console.log(msg);
    },
  });
  control.html("pdstatus", "Product added seccessfuly");
}
function checklogin() {
  let un = control.getInput("seller_email");
  let up = control.getInput("seller_password");
  if (un == "" || up == "") {
    alert("All fields are mandatory");
  } else {
    $.ajax({
      url: "assets/backend/auth/validate.php",
      type: "post",
      data: "un=" + un + "&up=" + up,
      success: function (html) {
        if (html == 1) {
          redirect_to("index.php");
        } else {
          if (html == 0) {
            alert("Invalid Password");
          } else {
            alert("User Not Exist");
          }
        }
      },
    });
  }
}
function logout() {
  let un = 0;
  $.ajax({
    url: "assets/backend/auth/logout.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      if (html == 1) {
        redirect_to("index.php");
      }
    },
  });
}
function checkprice() {
  var sellprice = control.getintInput("psprice");
  var price = control.getintInput("pprice");
  if (sellprice > price) {
    control.html("ermsg", "Selling price must be lesser than actual price");
  } else {
    control.html("ermsg", "");
    var ap = document.getElementById("fa");
    ap.value = sellprice;
  }
}
function putacp() {
  var sellprice = control.getintInput("pprice");
  var ap = document.getElementById("fa");
  ap.value = sellprice;
}
function tax() {
  var tax = control.getintInput("tax");
  var ap = document.getElementById("fa");
  var sellprice = control.getintInput("psprice");
  var l = parseFloat(sellprice * (tax / 100)).toFixed(2);
  var k = parseFloat(sellprice) + parseFloat(l);
  ap.value = k.toFixed(2);
  sellprice = 0;
  tax = 0;
}
function addfilters() {
  var filter = control.getInput("sfield");
  var subcat = control.getInput("fsc");
  if (filter == "" || subcat == "#") {
    control.html("erm", "All fields are mandatory");
  } else {
    control.disable("adfltr");
    $.ajax({
      url: "assets/backend/filter/addfilter.php",
      type: "post",
      data: "filter=" + filter + "&subcat=" + subcat,
      success: function (html) {
        if (html == 3) {
          control.html("erm", filter + " Exist");
          control.enable("adfltr");
        } else {
          if (html == 1) {
            control.html("erm", filter + " Added");
            upadtefilter();
            control.reload();
          } else {
            control.html("erm", filter + " Can Not be Added");
            control.enable("adfltr");
          }
        }
      },
    });
  }
}
function upadtefilter() {
  let un = 0;
  $.ajax({
    url: "assets/backend/filter/updatefilterlist.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      control.html("filterlist", html);
    },
  });
}
function addsubfilters() {
  var filter = control.getInput("sfield");
  var subfilter = control.getInput("fsc");
  if (filter == "" || subfilter == "#") {
    control.html("erm", "All fields are mandatory");
  } else {
    control.disable("adsfltr");
    $.ajax({
      url: "assets/backend/subfilter/addfilter.php",
      type: "post",
      data: "filter=" + filter + "&subcat=" + subfilter,
      success: function (html) {
        if (html == 3) {
          control.html("erm", filter + " Exist");
          control.enable("adsfltr");
        } else {
          if (html == 1) {
            control.html("erm", filter + " Added");
            upadtesubfilter();
            control.reload();
          } else {
            control.html("erm", filter + " Can Not be Added");
            control.enable("adsfltr");
          }
        }
      },
    });
  }
}
function upadtesubfilter() {
  let un = 0;
  $.ajax({
    url: "assets/backend/subfilter/updatefilterlist.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      control.html("filterlist", html);
    },
  });
}
function get_filterfa() {
  let pcat = control.getInput("addscatname");
  if (pcat == "#") {
    alert("select sub category first");
  } else {
    $.ajax({
      url: "assets/backend/filter/get_subfilter.php",
      type: "post",
      data: "pcat=" + pcat,
      success: function (html) {
        control.html("filters", html);
      },
    });
  }
}
function get_sfilterfa() {
  let pcat = control.getInput("addfiltername");
  if (pcat == "#") {
    alert("select sub category first");
  } else {
    $.ajax({
      url: "assets/backend/subfilter/get_subfilter.php",
      type: "post",
      data: "pcat=" + pcat,
      success: function (html) {
        control.html("addsfiltername", html);
      },
    });
  }
}
function deletefilter(id) {
  $.ajax({
    url: "assets/backend/filter/deletefilter.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      console.log(html);
      upadtefilter();
    },
  });
}
function deletesubfilter(id) {
  $.ajax({
    url: "assets/backend/subfilter/deletesubfilter.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      console.log(html);
      upadtesubfilter();
    },
  });
}
function addcountry() {
  var filter = control.getInput("sfield");
  if (filter == "") {
    control.html("erm", "Enter Something First");
  } else {
    control.disable("adcntry");
    $.ajax({
      url: "assets/backend/location/addcountry.php",
      type: "post",
      data: "cntry=" + filter,
      success: function (html) {
        if (html == 3) {
          control.html("erm", filter + " Exist");
        } else {
          if (html == 1) {
            control.html("erm", filter + " Added");
            upadtecountryl();
            control.reload();
          } else {
            control.html("erm", filter + " Can Not be Added");
          }
        }
      },
    });
  }
}
function addexcludepin() {
  var filter = control.getInput("sfield");
  $.ajax({
    url: "assets/backend/location/addexcludepin.php",
    type: "post",
    data: "cntry=" + filter,
    success: function (html) {
      if (html == 3) {
        control.html("erm", filter + " Exist");
      } else {
        if (html == 1) {
          control.html("erm", filter + " Added");
          upadteexpin();
        } else {
          control.html("erm", filter + " Can Not be Added");
        }
      }
    },
  });
}
function upadtecountryl() {
  let un = 0;
  $.ajax({
    url: "assets/backend/location/updatecountrylist.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      control.html("filterlist", html);
    },
  });
}
function upadteexpin() {
  let un = 0;
  $.ajax({
    url: "assets/backend/location/updateexpinlist.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      control.html("filterlist", html);
    },
  });
}
function editcountry(id) {
  $.ajax({
    url: "assets/backend/location/geteditcountry.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.html("cpl", html);
    },
  });
}
function defaultform(id) {
  $.ajax({
    url: "assets/backend/location/getdefault.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.html("cpl", html);
    },
  });
}
function updatecountry(id) {
  var filter = control.getInput("sfield");
  if (filter == "") {
    control.html("erm", "Enter Something");
  } else {
    control.disable("edctcntry");
    $.ajax({
      url: "assets/backend/location/updatecountry.php",
      type: "post",
      data: "cntry=" + filter + "&id=" + id,
      success: function (html) {
        if (html == 3) {
          control.html("erm", filter + " Exist");
          control.enable("edctcntry");
        } else {
          if (html == 1) {
            control.html("erm", filter + " Updated");
            upadtecountryl();
            setTimeout(() => {
              defaultform(1);
            }, 3000);
          } else {
            control.html("erm", filter + " Can Not be Added");
            control.enable("edctcntry");
          }
        }
      },
    });
  }
}
function deletecountry(i) {
  $.ajax({
    url: "assets/backend/location/deletecountry.php",
    type: "post",
    data: "id=" + i,
    success: function (html) {
      console.log(html);
      upadtecountryl();
    },
  });
}
function deleteexclude(i) {
  $.ajax({
    url: "assets/backend/location/deleteexpin.php",
    type: "post",
    data: "id=" + i,
    success: function (html) {
      console.log(html);
      upadteexpin();
    },
  });
}
function addstate() {
  var state = control.getInput("sfield");
  var country = control.getInput("fsc");
  if (state == "" || country == "#") {
    control.html("erm", "All fields are mandatory");
  } else {
    control.disable("adstct");
    $.ajax({
      url: "assets/backend/location/addstate.php",
      type: "post",
      data: "cntry=" + country + "&state=" + state,
      success: function (html) {
        if (html == 3) {
          control.html("erm", state + " Exist");
          control.enable("adstct");
        } else {
          if (html == 1) {
            control.html("erm", state + " Added");
            upadtestatel();
            control.reload();
          } else {
            control.html("erm", state + " Can Not be Added");
            control.enable("adstct");
          }
        }
      },
    });
  }
}
function upadtestatel() {
  let un = 0;
  $.ajax({
    url: "assets/backend/location/updatestatelist.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      control.html("filterlist", html);
    },
  });
}
function editstate(id) {
  $.ajax({
    url: "assets/backend/location/geteditstate.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.html("cpl", html);
    },
  });
}
function updatestate(id) {
  var state = control.getInput("sfield");
  var country = control.getInput("fsc");
  if (state == "" || country == "#") {
    control.html("erm", "All fields are mandatory");
  } else {
    control.disable("edtupst");
    $.ajax({
      url: "assets/backend/location/updatestate.php",
      type: "post",
      data: "cntry=" + country + "&state=" + state + "&id=" + id,
      success: function (html) {
        if (html == 3) {
          control.html("erm", state + " Exist");
          control.enable("edtupst");
        } else {
          if (html == 1) {
            control.html("erm", state + " Added");
            upadtestatel();
            control.reload();
          } else {
            alert(html);
            control.html("erm", state + " Can Not be Added");
            control.enable("edtupst");
          }
        }
      },
    });
  }
}
function deletestate(i) {
  $.ajax({
    url: "assets/backend/location/deletestate.php",
    type: "post",
    data: "id=" + i,
    success: function (html) {
      console.log(html);
      upadtestatel();
    },
  });
}
function getstatelist() {
  var country = control.getInput("fsc");
  $.ajax({
    url: "assets/backend/location/getstatelist.php",
    type: "post",
    data: "id=" + country,
    success: function (html) {
      control.html("fscb", html);
    },
  });
}
function addcity() {
  var city = control.getInput("sfield");
  var country = control.getInput("fsc");
  var state = control.getInput("fscb");
  if (state == "#" || country == "#" || city == "") {
    control.html("erm", "All fields are mandatory");
  } else {
    control.disable("adcit");
    $.ajax({
      url: "assets/backend/location/addcity.php",
      type: "post",
      data: "cntry=" + country + "&state=" + state + "&city=" + city,
      success: function (html) {
        if (html == 3) {
          control.html("erm", city + " Exist");
          control.enable("adcit");
        } else {
          if (html == 1) {
            control.html("erm", city + " Added");
            upadtecityl();
            setTimeout(() => {
              control.reload();
            }, 1000);
          } else {
            control.html("erm", city + " Can Not be Added");
            control.enable("adcit");
          }
        }
      },
    });
  }
}
function upadtecityl() {
  let un = 0;
  $.ajax({
    url: "assets/backend/location/updatecitylist.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      control.html("filterlist", html);
    },
  });
}
function editcity(id) {
  $.ajax({
    url: "assets/backend/location/geteditcity.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.html("cpl", html);
    },
  });
}
function updatecity(id) {
  var city = control.getInput("sfield");
  var country = control.getInput("fsc");
  var state = control.getInput("fscb");
  if (state == "#" || country == "#" || city == "") {
    control.html("erm", "All fields are mandatory");
  } else {
    control.disable("edcit");
    $.ajax({
      url: "assets/backend/location/updatecity.php",
      type: "post",
      data:
        "cntry=" + country + "&state=" + state + "&city=" + city + "&id=" + id,
      success: function (html) {
        if (html == 3) {
          control.html("erm", city + " Exist");
          control.enable("edcit");
        } else {
          if (html == 1) {
            control.html("erm", city + " Updated");
            upadtecityl();
            control.reload();
          } else {
            control.html("erm", html);
            control.enable("edcit");
          }
        }
      },
    });
  }
}
function deletecity(i) {
  $.ajax({
    url: "assets/backend/location/deletecity.php",
    type: "post",
    data: "id=" + i,
    success: function (html) {
      console.log(html);
      upadtecityl();
    },
  });
}
function getcitylist() {
  var country = control.getInput("fscb");
  $.ajax({
    url: "assets/backend/location/getcitylist.php",
    type: "post",
    data: "id=" + country,
    success: function (html) {
      control.html("fscb2", html);
    },
  });
}
function addpin() {
  var pin = control.getInput("sfield");
  var country = control.getInput("fsc");
  var state = control.getInput("fscb");
  var city = control.getInput("fscb2");
  if (state == "#" || country == "#" || city == "#" || pin == "") {
    control.html("erm", "All fields are mandatory");
  } else {
    control.disable("adpn");
    $.ajax({
      url: "assets/backend/location/addpin.php",
      type: "post",
      data:
        "cntry=" +
        country +
        "&state=" +
        state +
        "&city=" +
        city +
        "&pin=" +
        pin,
      success: function (html) {
        if (html == 3) {
          control.html("erm", pin + " Exist");
          control.enable("adpn");
        } else {
          if (html == 1) {
            control.html("erm", pin + " Added");
            upadtepinl();
            control.reload();
          } else {
            control.html("erm", pin + " Can Not be Added");
            control.enable("adpn");
          }
        }
      },
    });
  }
}
function upadtepinl() {
  let un = 0;
  $.ajax({
    url: "assets/backend/location/updatepinlist.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      control.html("filterlist", html);
    },
  });
}
function editpin(id) {
  $.ajax({
    url: "assets/backend/location/geteditpin.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.html("cpl", html);
    },
  });
}
function updatepin(id) {
  var pin = control.getInput("sfield");
  var country = control.getInput("fsc");
  var state = control.getInput("fscb");
  var city = control.getInput("fscb2");
  if (state == "#" || country == "#" || city == "#" || pin == "") {
    control.html("erm", "All fields are mandatory");
  } else {
    control.disable("updtpn");
    $.ajax({
      url: "assets/backend/location/updatepin.php",
      type: "post",
      data:
        "cntry=" +
        country +
        "&state=" +
        state +
        "&city=" +
        city +
        "&pin=" +
        pin +
        "&id=" +
        id,
      success: function (html) {
        if (html == 3) {
          control.html("erm", pin + " Exist");
          control.enable("updtpn");
        } else {
          if (html == 1) {
            control.html("erm", pin + " Udated");
            upadtepinl();
            control.reload();
          } else {
            control.html("erm", pin + " Can Not be Added");
            control.enable("updtpn");
          }
        }
      },
    });
  }
}
function addbusiness() {
  var subcat = control.getInput("sfield");
  if (subcat == "") {
    control.html("erm", "Enter Something First");
  } else {
    document.getElementById("adbs").disabled = true;
    $.ajax({
      url: "assets/backend/business/addbusiness.php",
      type: "post",
      data: "bstype=" + subcat,
      success: function (html) {
        if (html == 3) {
          control.html("erm", subcat + " Exist");
          document.getElementById("adbs").disabled = false;
        } else {
          if (html == 1) {
            control.html("erm", subcat + " Added");
            upadtebs();
            control.reload();
          } else {
            control.html("erm", subcat + " Can Not be Added");
            document.getElementById("adbs").disabled = false;
          }
        }
      },
    });
  }
}
function upadtebs() {
  let un = 0;
  $.ajax({
    url: "assets/backend/business/businesslist.php",
    type: "post",
    data: "un=" + un,
    success: function (html) {
      control.html("filterlist", html);
    },
  });
}
function deletebusiness(id) {
  $.ajax({
    url: "assets/backend/business/deleteb.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      console.log(html);
      upadtebs();
    },
  });
}
function deletepin(id) {
  $.ajax({
    url: "assets/backend/location/deleteb.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      console.log(html);
      upadtepinl();
    },
  });
}
function approve_seller(id) {
  $.ajax({
    url: "assets/backend/seller/approve.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      if (html == 1) {
        redirect_to("sellerapprove.php");
      }
    },
  });
}
function reject_seller(id) {
  let r = control.getInput("rejection");
  if (r == "") {
    alert("Please Enter Reason of Rejection");
  } else {
    $.ajax({
      url: "assets/backend/seller/reject.php",
      type: "post",
      data: "id=" + id + "&reason=" + r,
      success: function (html) {
        if (html == 1) {
          redirect_to("sellerapprove.php");
        }
      },
    });
  }
}
function approve_product(id) {
  $.ajax({
    url: "assets/backend/product/approve_product.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      if (html == 1) {
        redirect_to("productapprove.php");
      }
    },
  });
}
function reject_product(id) {
  let reason = "";
  if (confirm("Are you sure?")) {
    while (!reason) {
      reason = prompt("Enter a reason");
    }
    $.ajax({
      url: "assets/backend/product/reject_product.php",
      type: "post",
      data: "id=" + id + "&reason=" + reason,
      success: function (html) {
        if (html == 1) {
          redirect_to("productapprove.php");
        }
      },
    });
  }
}
function checkpolicy() {
  let val = control.getInput("return_selector");
  if (val == "No Return") {
    document.getElementById("return_refund").value = 2;
    document.getElementById("custom_return").style.display = "none";
  } else {
    document.getElementById("custom_return").style.display = "flex";
    document.getElementById("return_refund").value = 0;
  }
}
function seller_acdc(i, s) {
  $.ajax({
    url: "assets/backend/seller/seller_acdc.php",
    type: "post",
    data: "id=" + i + "&status=" + s,
    success: function (html) {
      updateselerlist();
    },
  });
}
function user_acdc(i, s) {
  $.ajax({
    url: "assets/backend/user/user_acdc.php",
    type: "post",
    data: "id=" + i + "&status=" + s,
    success: function (html) {
      updateuserlist();
    },
  });
}
function updateselerlist() {
  let e = 0;
  $.ajax({
    url: "assets/backend/seller/updatesellerlist.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("sellersecroww", html);
    },
  });
}
function updateuserlist() {
  let e = 0;
  $.ajax({
    url: "assets/backend/user/updateuserlist.php",
    type: "post",
    data: "id=" + e,
    success: function (html) {
      control.html("sellersecroww", html);
    },
  });
}
function deleteseller(id) {
  $.ajax({
    url: "assets/backend/seller/deletes.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      console.log(html);
      upadtepinl();
    },
  });
}
function addcommission(subcat, filter) {
  $.ajax({
    url: "assets/backend/commission/addcommission.php",
    type: "post",
    data: "com=" + filter + "&subcat=" + subcat,
    success: function (html) {
      console.log("done");
    },
  });
}
function deletecommission(id) {
  $.ajax({
    url: "assets/backend/commission/deletecommission.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      window.location.href = window.location;
    },
  });
}
function pay(oid, id) {
  let c = document.getElementById("finalpay").value;
  console.log(c);
  $.ajax({
    url: "assets/backend/commission/addtowallet.php",
    type: "post",
    data: "oid=" + oid + "&sid=" + id + "&bal=" + c,
    success: function (html) {
      alert("Balance Added");
      window.location.href = window.location;
    },
  });
}
function approve_req(id) {
  let txn = document.getElementById("txn").value;
  let bal = document.getElementById("bal").value;
  if (txn != "" && bal != "") {
    $.ajax({
      url: "assets/backend/seller/approve_witdraw.php",
      type: "post",
      data: "id=" + id + "&txn=" + txn + "&bal=" + bal,
      success: function (html) {
        if (html == 0) {
          alert("Ammount must be lesser than actual wallet ammount");
        } else {
          redirect_to("seller_detail.php?sid=" + id);
        }
      },
    });
  } else {
    alert("All fields are mandatory");
  }
}
function manual_add(id) {
  let txn = document.getElementById("txn").value;
  let amt = document.getElementById("abal").value;
  let mtd = document.getElementById("mtd").value;
  if (txn != "" && amt != "" && mtd != "#") {
    $.ajax({
      url: "assets/backend/seller/manualUpdate.php",
      type: "post",
      data: "id=" + id + "&txn=" + txn + "&amt=" + amt + "&mtd=" + mtd,
      success: function (html) {
        let msg = JSON.parse(html);
        control.html("pdstatus", msg.msg);
        control.reload();
      },
    });
  } else {
    control.html("pdstatus", "All fields are mandatory");
  }
}
function reject_req(id) {
  $.ajax({
    url: "assets/backend/seller/reject_witdraw.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      redirect_to("seller_detail.php?sid=" + id);
    },
  });
}
function pay_user_wallet(odid, inid) {
  let tc = control.getInput(inid);
  if (tc != "") {
    $.ajax({
      url: "assets/backend/user/add_user_wallet.php",
      type: "post",
      data: "id=" + odid + "&tp=" + tc,
      success: function (html) {
        window.location.href = window.location;
      },
    });
  } else {
    alert("Enter ammount");
  }
}
function delete_seller(id) {
  $.ajax({
    url: "assets/backend/seller/delete_seller.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      window.location.href = window.location;
    },
  });
}
function add_neew_user() {
  let email, pass,mobile,name;
  email = control.getInput("umail");
  pass = control.getInput("upass");
  mobile = control.getInput("umobile");
  name = control.getInput("u-name");
  if (email == "" || pass == "" || mobile == ""|| name == "") {
    control.html("pdstatus", "All fields are mandatory");
  } else {
    $.ajax({
      url: "assets/backend/user/add_user.php",
      type: "post",
      data: "email=" + email + "&pass=" + pass + "&mobile=" + mobile+"&name="+name,
      success: function (html) {
        control.html("pdstatus", "Added successfully.");
        control.reload();
      },
    });
  }
}
function add_neew_seller() {
  let email, mobile, pass;
  email = control.getInput("umail");
  pass = control.getInput("upass");
  mobile = control.getInput("umobile");
  if (email == "" || pass == "" || mobile == "") {
    control.html("pdstatus", "All fields are mandatory");
  } else {
    $.ajax({
      url: "assets/backend/seller/add_seller.php",
      type: "post",
      data: "email=" + email + "&pass=" + pass + "&mobile=" + mobile,
      success: function (html) {
        if (html == 1) {
          control.html("pdstatus", "Added successfully.");
          control.reload();
        } else {
          control.html("pdstatus", "This Email is already registered");
        }
      },
    });
  }
}
function add_neew_dv() {
  let name, username, email, mobile, pass;
  email = control.getInput("dEmail");
  pass = control.getInput("dPassword");
  mobile = control.getInput("dMobile");
  name = control.getInput("dName");
  username = control.getInput("dUsername");
  if (
    email == "" ||
    pass == "" ||
    mobile == "" ||
    username == "" ||
    name == ""
  ) {
    control.html("pdstatus", "All fields are mandatory");
  } else {
    $.ajax({
      url: "assets/backend/seller/add_dv.php",
      type: "post",
      data:
        "email=" +
        email +
        "&pass=" +
        pass +
        "&mobile=" +
        mobile +
        "&username=" +
        username +
        "&name=" +
        name,
      success: function (html) {
        if (html == 1) {
          control.html("pdstatus", "Added successfully.");
          control.reload();
        } else {
          control.html("pdstatus", "This Email is already registered");
        }
      },
    });
  }
}
function checksell(id) {
  let d = document.getElementById("bsl").checked;
  let v;
  if (d == true) {
    v = 1;
  } else {
    v = 0;
  }
  $.ajax({
    url: "assets/backend/product/add_bs.php",
    type: "post",
    data: "val=" + v + "&id=" + id,
    success: function (html) {
      control.reload();
    },
  });
}
function ship_product(id, ship, name) {
  let sid = control.getInput(ship);
  let cname = control.getInput(name);
  $.ajax({
    url: "assets/backend/order/updatestat.php",
    type: "post",
    data: "id=" + id + "&couriername=" + cname + "&cid=" + sid,
    success: function (html) {
      control.reload();
    },
  });
}
function delete_order(oid) {
  $.ajax({
    url: "assets/backend/order/delorder.php",
    type: "post",
    data: "id=" + oid,
    success: function (html) {
      control.reload();
    },
  });
}
function del_dv(id) {
  $.ajax({
    url: "assets/backend/seller/deldv.php",
    type: "post",
    data: "id=" + id,
    success: function (html) {
      control.reload();
    },
  });
}
function filterseller() {
  let inp = control.getInput("filterseller");
  if (inp == "Active") {
    inp = 1;
  } else if (inp == "Deactive") {
    inp = 0;
  }
  $.ajax({
    url: "assets/backend/seller/getspecified.php",
    type: "post",
    data: "id=" + inp,
    success: function (html) {
      control.html("sellersecroww", html);
    },
  });
}
function earning_search() {
  let first = control.getInput("sfield1");
  let second = control.getInput("sfield2");
  if (first == "" || second == "") {
    alert("All fields are mandatory");
  } else {
    control.html("btn", "wait...");
    first = first + " 00:00:00";
    second = second + " 23:59:59";
    $.ajax({
      url: "assets/backend/order/eng.php",
      type: "post",
      data: "first=" + first + "&second=" + second,
      success: function (html) {
        let htl = JSON.parse(html);
        control.html("ttlod", htl.to);
        control.html("scod", htl.so);
        control.html("t", "&#8377; " + htl.t);
        control.html("uscod", htl.to - htl.so);
        control.html("btn", "Search");
      },
    });
  }
}
function dv_charge() {
  var first = control.getintInput("sfield");
  var first2 = control.getintInput("sfield2");
  if (first != "") {
    $.ajax({
      url: "assets/backend/order/dc1.php",
      type: "post",
      data: "first=" + first + "&first2=" + first2,
      success: function (html) {
        control.reload();
      },
    });
  } else {
    alert("Enter Something");
  }
}
function deletedvtime(e) {
  $.ajax({
    url: "assets/backend/order/dc.php",
    type: "post",
    data: "first=" + e,
    success: function (html) {
      control.reload();
    },
  });
}
function assign(id) {
  let dv = control.getInput("dvselect");
  $.ajax({
    url: "assets/backend/delivery/assign.php",
    type: "post",
    data: "oid=" + id + "&dboy=" + dv,
    success: function (html) {
      control.reload();
    },
  });
}
function reassign(id) {
  $.ajax({
    url: "assets/backend/delivery/reassign.php",
    type: "post",
    data: "oid=" + id,
    success: function (html) {
      redirect_to("orderassigned.php");
    },
  });
}
function hvr(e, oid) {
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
function finalize(id) {
  $.ajax({
    url: "assets/backend/delivery/finalize.php",
    type: "post",
    data: "oid=" + id,
    success: function (html) {
      redirect_to("setelmentpending.php");
    },
  });
}
function reassign_finalize(oid){
  $.ajax({
    url: "assets/backend/delivery/refinalize.php",
    type: "post",
    data: "oid=" + oid,
    success: function (html) {
      redirect_to("undelivered.php");
    },
  });
}
function finalizewithuser(id){
  var val=control.getInput("dfghert");
   $.ajax({
  url: "assets/backend/delivery/finalize_u.php",
  type: "post",
  data: "oid=" + id+ "&val=" + val,
  success: function (html) {
    redirect_to("setelmentpending.php");
  },
});
}