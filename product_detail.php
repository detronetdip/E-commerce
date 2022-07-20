<?php
require('require/top.php');
$pid = $_GET['pid'];
$product = product_detail($con, $pid);
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href=""><?php echo $product['product_name']; ?></a>
    </div>
</div>

<section class="single-product">
    <div class="row">
        <div class="container">
            <div class="innerrow">
                <div class="left">
                    <div class="mainImage">
                        <img src="media/product/<?php echo $product['img1']; ?>" alt="main-image" id="mi" />
                    </div>
                    <div class="subimages flex">
                        <div class="sub">
                            <img src="media/product/<?php echo $product['img1']; ?>" alt="sub-image" id="mi" onclick="view(this)" />
                        </div>
                        <div class="sub">
                            <img src="media/product/<?php echo $product['img2']; ?>" alt="sub-image" id="mi" onclick="view(this)" />
                        </div>
                        <div class="sub">
                            <img src="media/product/<?php echo $product['img3']; ?>" alt="sub-image" id="mi" onclick="view(this)" />
                        </div>
                        <div class="sub">
                            <img src="media/product/<?php echo $product['img4']; ?>" alt="sub-image" id="mi" onclick="view(this)" />
                        </div>
                    </div>
                </div>
                <div class="right">
                    <h2 class="mt2"><?php echo $product['product_name']; ?></h2>
                    <div class="no-stock">
                        <p class="pd-no">Product No.<span><?php echo $product['sku']; ?></span></p>
                        <p class="stock-qty">
                            <?php
                            if ($product['qty'] > 0) {
                                echo "Available<span>(In Stock)</span>";
                            } else {
                                echo "Unavailable<span>(Out of Stock)</span>";
                            } ?></p>
                    </div>
                    <p class="pp-descp">
                        <?php echo $product['shrt_desc']; ?>
                    </p>
                    <div class="product-group-dt">
                        <ul>
                            <li>
                                <div class="main-price color-discount">
                                    Discount Price<span>&#8377;<?php echo $product['fa']; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="main-price mrp-price">
                                    MRP Price<span>&#8377;<?php echo $product['price']; ?></span>
                                </div>
                            </li>
                        </ul>
                        <ul class="gty-wish-share">
                            <li>
                                <?php
                                if (!isset($_SESSION['USER_LOGIN'])) {
                                    if (isset($_SESSION['USER_CART'])) {
                                        if (in_array($product['id'], $_SESSION['USER_CART'])) {
                                            $index = array_search($product['id'], $_SESSION['USER_CART']);
                                ?>

                                            <div class="qty-product">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                    <input type="number" name="quantity" value="<?php echo $_SESSION['CART_QTY'][$index]; ?>" class="input-text qty text" style="width:5rem" id="single-product-qty" />
                                                    <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                </div>
                                            </div>

                                        <?php
                                        } else {
                                        ?>

                                            <div class="qty-product">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                    <input type="number" name="quantity" value="1" class="input-text qty text" style="width:5rem" id="single-product-qty" />
                                                    <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                </div>
                                            </div>

                                        <?php
                                        }
                                    } else {
                                        ?>

                                        <div class="qty-product">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                <input type="number" name="quantity" value="1" class="input-text qty text" style="width:5rem" id="single-product-qty" />
                                                <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                            </div>
                                        </div>

                                    <?php
                                    }
                                } else {
                                    $p_idd = $product['id'];
                                    $u_id = $_SESSION['USER_ID'];
                                    $query = "select cart.u_id,cart_detail.qty from cart,cart_detail where cart.u_id='$u_id' and cart_detail.p_id='$p_idd' and cart_detail.cart_id=cart.id";
                                    $rs = mysqli_query($con, $query);
                                    $i = mysqli_num_rows($rs);
                                    if ($i > 0) {
                                        $g = mysqli_fetch_assoc($rs);
                                    ?>

                                        <div class="qty-product">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                <input type="number" name="quantity" value="<?php echo $g['qty'] ?>" class="input-text qty text" style="width:5rem" id="single-product-qty" />
                                                <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                            </div>
                                        </div>

                                    <?php
                                    } else {
                                    ?>

                                        <div class="qty-product">
                                            <div class="quantity buttons_added">
                                                <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                <input type="number" name="quantity" value="1" class="input-text qty text" style="width:5rem" id="single-product-qty" />
                                                <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                            </div>
                                        </div>

                                <?php
                                    }
                                }
                                ?>


                            </li>
                            <li>
                                <?php
                                if (!isset($_SESSION['USER_LOGIN'])) {
                                ?>
                                    <i class="uil uil-heart" onclick="addwish(<?php echo $product['id']; ?>)"></i>
                                    <?php
                                } else {
                                    $pid = $product['id'];
                                    $uid = $_SESSION['USER_ID'];
                                    $n = mysqli_num_rows(mysqli_query($con, "select * from wishlist where u_id='$uid' and p_id='$pid'"));
                                    if ($n > 0) {
                                    ?>
                                        <i class="uil uil-heart" onclick="gowish()"></i>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="uil uil-heart" onclick="addwish(<?php echo $product['id']; ?>)"></i>
                                <?php
                                    }
                                }
                                ?>
                            </li>
                        </ul>
                        <ul class="ordr-crt-share">
                            <li>
                                <?php
                                if (!isset($_SESSION['USER_LOGIN'])) {
                                    if (isset($_SESSION['USER_CART'])) {
                                        if (in_array($product['id'], $_SESSION['USER_CART'])) {
                                ?>
                                            <button class="order-btn hover-btn" onclick="go_to_cart()">
                                                <i class="uil uil-shopping-cart-alt"></i> Go to Cart
                                            </button>
                                        <?php
                                        } else {
                                        ?>
                                            <button class="order-btn hover-btn" onclick="addToCart(<?php echo $product['id']; ?>,this)">
                                                <i class="uil uil-shopping-cart-alt"></i> Add to Cart
                                            </button>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <button class="order-btn hover-btn" onclick="addToCart(<?php echo $product['id']; ?>,this)">
                                            <i class="uil uil-shopping-cart-alt"></i> Add to Cart
                                        </button>
                                    <?php
                                    }
                                } else {
                                    $p_idd = $product['id'];
                                    $u_id = $_SESSION['USER_ID'];
                                    $query = "select cart.u_id,cart_detail.qty from cart,cart_detail where cart.u_id='$u_id' and cart_detail.p_id='$p_idd' and cart_detail.cart_id=cart.id";
                                    $rs = mysqli_query($con, $query);
                                    $i = mysqli_num_rows($rs);
                                    if ($i > 0) {
                                    ?>
                                        <button class="order-btn hover-btn" onclick="go_to_cart()">
                                            <i class="uil uil-shopping-cart-alt"></i> Go to Cart
                                        </button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="order-btn hover-btn" onclick="addToCart(<?php echo $product['id']; ?>,this)">
                                            <i class="uil uil-shopping-cart-alt"></i> Add to Cart
                                        </button>
                                <?php
                                    }
                                }
                                ?>


                            </li>
                        </ul>
                    </div>
                    <div class="down">
                        <ul class="flex">
                            <li>
                                <div class="pdp-group-dt">
                                    <div class="pdp-icon">
                                        <i class="uil uil-usd-circle"></i>
                                    </div>
                                    <div class="pdp-text-dt">
                                        <span>Lowest Price Guaranteed</span>
                                        <p>
                                            Get difference refunded if you find it cheaper
                                            anywhere else.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pdp-group-dt">
                                    <div class="pdp-icon">
                                        <i class="uil uil-cloud-redo"></i>
                                    </div>
                                    <div class="pdp-text-dt">
                                        <span>Easy Returns &amp; Refunds</span>
                                        <p>
                                            Return products at doorstep and get refund in seconds.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="secondrow">
                <div class="innerrow">
                    <div class="mlt">
                        <div class="container">
                            <div class="heading">
                                <h4>more like this</h4>
                            </div>
                            <div class="product-container">
                                <?php
                                $catid = $product['cat_id'];
                                $rs = mysqli_query($con, "select * from product where cat_id='$catid' and status='1'");
                                if (mysqli_num_rows($rs) > 0) {
                                    while ($row = mysqli_fetch_assoc($rs)) {
                                ?>
                                        <div class="card">
                                            <a href="product_detail.php?pid=<?php echo $row['id']; ?>">
                                                <img src="media/product/<?php echo $row['img1']; ?>" alt="main-image" />
                                            </a>
                                            <div class="detail">
                                                <h4><?php echo $row['product_name']; ?></h4>
                                                <div class="qty-group">
                                                    <div class="cart-item-price">
                                                        &#8377;<?php echo $row['fa']; ?>
                                                        <span>&#8377;<?php echo $row['price']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="alldesc">
                        <div class="container">
                            <div class="heading">
                                <h4>Product details</h4>
                            </div>
                            <div class="desc-body">
                                <div class="pdct-dts-1">
                                    <div class="pdct-dt-step">
                                        <h4>Description</h4>
                                        <p>
                                            <?php echo $product['description']; ?>
                                        </p>
                                    </div>
                                    <div class="pdct-dt-step">
                                        <h4>Tearms & Conditions</h4>
                                        <div class="product_attr">
                                            <?php echo $product['disclaimer']; ?>
                                        </div>
                                    </div>
                                    <div class="pdct-dt-step">
                                        <h4>Seller</h4>
                                        <div class="product_attr">
                                            <?php
                                            $t = $product['added_by'];
                                            $ti = $product['id'];
                                            $h = mysqli_fetch_assoc(mysqli_query($con, "select b_name from sellers where id='$t'"));
                                            $hi = mysqli_fetch_assoc(mysqli_query($con, "select added_on from product_ad_on where pid='$ti'"));
                                            echo $h['b_name']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>