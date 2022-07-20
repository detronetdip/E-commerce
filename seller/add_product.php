<?php
require('require/top.php');
$h_t = get_safe_value($con, $_GET['b']);
if (isset($_GET['idp'])) {
    $productid = get_safe_value($con, $_GET['idp']);
}
$name = '';
$category = '';
$subcategory = '';
$qty = '';
$price = '';
$sellprice = '';
$tax = '';
$fa = '0.00';
$sku = '';
$shipping = '';
$shippingex = '';
$sd = '';
$dc = '';
$bs = '';
$filter = '';
$subfilter = '';
$tc = '';
$rday = '';
$return_p = '';
$repref = '';
$sku = get_code();
$img1 = "../assets/images/product/big-2.jpg";
$img2 = "../assets/images/product/big-2.jpg";
$img3 = "../assets/images/product/big-2.jpg";
$img4 = "../assets/images/product/big-2.jpg";
if ($h_t == '1973') {
    $heading = "Add Product";
    $cb = '<a href="javascript:void(0)" class="btn d-flex-center-a-j bg-main br-15" onclick="add_product()" id="pbtn">
     <i class="uil uil-plus"></i>
     <span>Add</span>
   </a>';
} else if ($h_t == '2846') {
    $heading = "Edit Product";
    $productid = get_safe_value($con, $_GET['idp']);
    $cq = "select * from product where id='$productid'";
    $cr = mysqli_query($con, $cq);
    $nor = mysqli_num_rows($cr);
    if ($nor > 0) {
        $r = mysqli_fetch_assoc($cr);
        $name = $r['product_name'];
        $category = $r['cat_id'];
        $subcategory = $r['scat_id'];
        $qty = $r['qty'];
        $price = $r['price'];
        $sellprice = $r['sell_price'];
        $tax = $r['tax'];
        $fa = $r['fa'];
        $sku = $r['sku'];
        $sd = $r['shrt_desc'];
        $dc = $r['description'];
        $tc = $r['disclaimer'];
        $img1 = "../media/product/" . $r['img1'];
        $img2 = "../media/product/" . $r['img2'];
        if (!empty($r['img3'])) {
            $img3 = "../media/product/" . $r['img3'];
        }
        if (!empty($r['img4'])) {
            $img4 = "../media/product/" . $r['img4'];
        }
        $cb = '<a href="javascript:void(0)" class="btn d-flex-center-a-j bg-main br-15" onclick="edit_product(' . $_GET['idp'] . ')" id="pbtn">
      <i class="uil uil-plus"></i>
      <span>Add</span>
    </a>';
    } else {
        redirect('product.php');
    }
} else {
    redirect('product.php');
}
?>
<div class="path">
    <div class="container">
        <a href="index.html">Home</a>
        /
        <a href="product.php">product</a>
        /
        <a href="add_product.php">add product</a>
    </div>
</div>
<div class="cartrow" id="catrow">
    <div class="gh">
        <div class="heading">
            <h3><?php echo $heading; ?></h3>
        </div>
        <div class="maincontainer2">
            <form action="#">
                <div class="formrow">
                    <div class="heading">Category</div>
                    <select name="addcatname" id="addcatname" onchange="get_subcatfa()">
                        <option value="#">select category</option>
                        <?php
                        $query = "select * from categories order by id desc";
                        $resi = mysqli_query($con, $query);
                        $i = 1;
                        while ($ropw = mysqli_fetch_assoc($resi)) {
                            $cname = $ropw['category'];
                            $cnamei = $ropw['id'];
                            if ($cnamei == $category) {
                                echo "<option value='$cnamei' selected>$cname</option> ";
                            } else {
                                echo "<option value='$cnamei'>$cname</option> ";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="formrow">
                    <div class="heading">Sub-category</div>
                    <select name="addscatname" id="addscatname" onchange="get_filterfa()">
                        <option value="#">select sub-category</option>
                        <?php
                        if ($h_t == 2846) {
                            $query2 = "select * from subcategories where cat_id='$category' order by id desc";
                            $resi2 = mysqli_query($con, $query2);
                            while ($ropw2 = mysqli_fetch_assoc($resi2)) {
                                $cname2 = $ropw2['subcat'];
                                $cname2i = $ropw2['id'];
                                if ($cname2i == $subcategory) {
                                    echo "<option value='$cname2i' selected>$cname2</option>";
                                } else {
                                    echo "<option value='$cname2i'>$cname2</option> ";
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <div id="filters">
                    <?php
                    if ($h_t == 2846) {
                        $productSubFilters = array();
                        $subfilterRes = mysqli_query($con, "select * from p_sfilter where pid='$productid'");
                        while ($subfilterRow = mysqli_fetch_assoc($subfilterRes)) {
                            $productSubFilters[] = $subfilterRow['sfid'];
                        }
                        $qn = "select * from filter where subcat_id='$subcategory'";
                        $resn = mysqli_query($con, $qn);
                        $template = '';
                        while ($rown = mysqli_fetch_assoc($resn)) {
                            $template = $template . '
                            <div class="formrow">
                            <div class="heading">
                                Filter
                            </div>
                            <select class="select" name="productFiltersName" id="addfiltername">
                                <option value="' . $rown['id'] . '">' . $rown['filter'] . '</option>
                            </select>
                            </div>
                            <div class="formrow">
                                <div class="heading">
                                    Sub Filter
                                </div>
                            <div id="subfilters" style="background-color: #f8f8fb;width:100%;padding: 0.8rem;
                                        border: 0.5px solid #74788d;
                                        border-radius: 5px;">';
                            $filtername = $rown['id'];
                            $q2 = "select * from sub_filter where filter_id='$filtername'";

                            $res2 = mysqli_query($con, $q2);
                            while ($row2 = mysqli_fetch_assoc($res2)) {
                                if (in_array($row2['id'], $productSubFilters)) {
                                    $template = $template . '<span style="font-size:1.2rem;float:left; margin:0 0.8rem">
                                        <input type="checkbox" name="productSubFiltersName"  style="display:block;height: 1.5rem;
                                        background-color: #f8f8fb;
                                        width: 1.5rem;
                                        padding: 0 0.8rem;
                                        border: 0.5px solid #74788d;
                                        border-radius: 5px;float:left" value="' . $row2['id'] . '" checked>
                                        &nbsp; ' . $row2['subfilter'] . '
                                     </span>';
                                } else {
                                    $template = $template . '<span style="font-size:1.2rem;float:left; margin:0 0.8rem">
                                        <input type="checkbox" name="productSubFiltersName"  style="display:block;height: 1.5rem;
                                        background-color: #f8f8fb;
                                        width: 1.5rem;
                                        padding: 0 0.8rem;
                                        border: 0.5px solid #74788d;
                                        border-radius: 5px;float:left" value="' . $row2['id'] . '">
                                        &nbsp; ' . $row2['subfilter'] . '
                                    </span>';
                                }
                            }
                            $template = $template . '</div> </div>';
                        }
                        echo $template;
                        unset($productSubFilters);
                    }
                    ?>
                </div>
                <div class="formrow">
                    <div class="heading">Name</div>
                    <input type="text" placeholder="Enter Product Name *" id="pname" value="<?php echo $name; ?>" />
                </div>

                <div class="formrow">
                    <div class="heading">Price</div>
                    <input type="number" placeholder="Enter Product Price *" id="pprice" value="<?php echo $price; ?>" oninput="putacp()" />
                </div>
                <div class="formrow">
                    <div class="heading">Selling Price</div>
                    <input type="number" placeholder="Enter Product Selling Price *" id="psprice" value="<?php echo $sellprice; ?>" oninput="checkprice()" valueAsNumber />
                </div>
                <div class="formrow">
                    <div class="heading">Tax</div>
                    <input type="number" placeholder="Enter Product Tax *" id="tax" oninput="t_ax()" value="<?php echo $tax; ?>" />
                </div>
                <div class="formrow">
                    <div class="heading">Final Price</div>
                    <input type="number" placeholder="0.00" id="fa" value="<?php echo $fa; ?>" readonly />
                </div>
                <div class="formrow">
                    <div class="heading">SKU</div>
                    <input type="text" id="sku" value="<?php echo $sku; ?>" readonly />
                </div>
                <div class="formrow">
                    <div class="heading">Quantity</div>
                    <input type="number" placeholder="Enter Product Quantity *" id="pqty" value="<?php echo $qty; ?>" />
                </div>
                <div class="formrow f">
                    <div class="heading">Terms & Condition</div>
                    <textarea name="shrtdsc" id="tc" placeholder="Terms & Condition *"><?php echo $tc; ?></textarea>
                </div>
                <div class="formrow f">
                    <div class="heading">Short Description</div>
                    <textarea name="shrtdsc" id="shrtdsc" placeholder="Short Description *"><?php echo $sd; ?></textarea>

                </div>
                <div class="formrow f">
                    <div class="heading">Description</div>
                    <textarea class="desc" name="dsc" id="dsc" placeholder="Description *"><?php echo $dc; ?></textarea>
                </div>
                <div class="formrow ig">
                    <div class="imgdiv">
                        <div class="img">
                            <img src="<?php echo $img1; ?>" alt="" id="preview1" />
                        </div>
                        <div class="file">
                            <label for="uploadimage1">
                                Browse
                                <input type="file" name="productimage1" id="uploadimage1" onchange="show_preview('preview1','uploadimage1')" />
                            </label>
                        </div>
                    </div>
                    <div class="imgdiv">
                        <div class="img">
                            <img src="<?php echo $img2; ?>" alt="" id="preview2" />
                        </div>
                        <div class="file">
                            <label for="uploadimage2">
                                Browse
                                <input type="file" name="productimage2" id="uploadimage2" onchange="show_preview('preview2','uploadimage2')" />
                            </label>
                        </div>
                    </div>
                    <div class="imgdiv">
                        <div class="img">
                            <img src="<?php echo $img3; ?>" alt="" id="preview3" />
                        </div>
                        <div class="file">
                            <label for="uploadimage3">
                                Browse
                                <input type="file" name="productimage3" id="uploadimage3" onchange="show_preview('preview3','uploadimage3')" />
                            </label>
                        </div>
                    </div>
                    <div class="imgdiv">
                        <div class="img">
                            <img src="<?php echo $img4; ?>" alt="" id="preview4" />
                        </div>
                        <div class="file">
                            <label for="uploadimage4">
                                Browse
                                <input type="file" name="productimage4" id="uploadimage4" onchange="show_preview('preview4','uploadimage4')" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="formrow">
                    <span id="pdstatus" style="color:red; font-size:1.4rem; text-transform:capitalize;">

                    </span>
                </div>
                <div class="formrow">
                    <?php echo $cb; ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require("require/foot.php");
?>