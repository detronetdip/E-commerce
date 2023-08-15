<?php
require('require/top.php');
authorise_user();
user_vfd_efd($con);
$checkout = array();
$checkout = get_chekout_products($con);
$subtotal = 0;
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="checkout.php">Checkout</a>
    </div>
</div>
<section class="checkout">
    <section class="myac-body">
        <div class="flex row">
            <div class="right">
                <div class="col-lg-12 col-md-12">
                    <div class="pdpt-bg">
                        <form action="process.php" method="POST" id="checkout-form">
                            <div class="step">
                                <div class="tittle" onclick="open_address(this)" id="ct-ad">
                                    <span>1</span>
                                    <h4>Delivery Address</h4>
                                </div>
                                <div class="span" id="chekout_address" style="height: 0">
                                    <div class="formbody">
                                        <div class="form-group">
                                            <div class="product-radio">
                                                <ul class="product-now">
                                                    <li>
                                                        <input type="radio" id="ad1" name="address1" checked="" value="Home" />
                                                        <label for="ad1">Home</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="ad2" name="address1" value="Office" />
                                                        <label for="ad2">Office</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="ad3" name="address1" value="Other" />
                                                        <label for="ad3">Other</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="address-fieldset">
                                            <div class="row">
                                                <div class="row2">
                                                    <div class="lt">
                                                        <label for="ft">Name*</label>
                                                        <input type="text" placeholder="Name" id="dv-name" />
                                                    </div>
                                                    <div class="ft">
                                                        <label for="ft">Mobile*</label>
                                                        <input type="number" placeholder="Number" id="dv-number" oninput="validate_number()" />
                                                    </div>
                                                </div>
                                                <label for="ft">City*</label>
                                                <select name="" id="dv-city">
                                                    <option value="#">Select City</option>
                                                    <?php
                                                    $querys = "select * from city order by id desc";
                                                    $ress = mysqli_query($con, $querys);
                                                    while ($rows = mysqli_fetch_assoc($ress)) {
                                                    ?>
                                                        <option value="<?php echo $rows['id'] ?>">
                                                            <?php echo $rows['city_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="ft">Flat / House / Office No.*</label>
                                                <input type="text" placeholder="Address" id="dv-address" />
                                                <div class="row2">
                                                    <div class="lt">
                                                        <label for="ft">Pincode*</label>
                                                        <input type="text" placeholder="Pincode" id="dv-pin" />
                                                    </div>
                                                    <div class="ft">
                                                        <label for="ft">Landmark*</label>
                                                        <input type="text" placeholder="Landmark" id="dv-land" />
                                                    </div>
                                                </div>
                                                <div class="row2">
                                                    <a href="javascript:void(0)" onclick="add_new_address()" class="save-address">Save</a>
                                                    <a href="javascript:void(0)" class="next-step" onclick="nex_ad()">Next</a>
                                                </div>
                                                <br>
                                                <h4>Added Address</h4>
                                                <div class="row2 mt2" style="display:block" id="ad-ad">
                                                    <?php

                                                    $template = '';
                                                    $uid = $_SESSION['USER_ID'];
                                                    $res = mysqli_query($con, "select user_address.*,city.city_name from user_address,city where user_address.uid='$uid' and user_address.user_city=city.id");
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                        $template = $template . '
                                                                <div class="address-item">
                                                                <input type="radio" name="dv-ad" value="' . $row['id'] . '"
                                                                    style="width:2rem; height:1.5rem;margin-right:0.8rem;margin-top:0;">
                                                                <div class="address-icon1">
                                                                    <i class="uil uil-home"></i>
                                                                </div>
                                                                <div class="address-dt-all">
                                                                    <h4>' . $row['type_ad'] . '</h4>
                                                                    <p>
                                                                        ' . $row['user_name'] . ', ' . $row['user_local'] . ', ' . $row['user_add'] . ',
                                                                        ' . $row['city_name'] . ', ' . $row['user_pin'] . ',<br>' . $row['user_mobile'] . '
                                                                    </p>
                                                                </div>
                                                                </div>
                                                            ';
                                                    }
                                                    echo $template;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <div class="tittle" onclick="open_dvt(this)" id="ct-dt">
                                    <span>2</span>
                                    <h4>Delivery Time & Date</h4>
                                </div>
                                <div class="span" id="chekout_dvt" style="height: 0">
                                    <div class="formbody">
                                        <div class="form-group">
                                            <div class="product-radio">
                                                <ul class="product-now">
                                                    <li>
                                                        <input type="radio" id="ad5" name="address3" checked="" value="Today" />
                                                        <label for="ad5">Today</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="ad4" name="address3" value="Tomorrow" />
                                                        <label for="ad4">Tomorrow</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="time-radio">
                                            <div class="form">
                                                <div class="fields">
                                                    <?php
                                                    $res = mysqli_query($con, "select * from dv_time");
                                                    while ($r = mysqli_fetch_assoc($res)) {
                                                    ?>
                                                        <div class="field">
                                                            <div class="ui radio checkbox chck-rdio">
                                                                <input type="radio" name="fruit" tabindex="0" class="hidden" value="<?php echo $r['id'] ?>" />
                                                                <label><?php echo $r['from'] ?> - <?php echo $r['tto'] ?></label>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row2">
                                        <a href="javascript:void(0)" class="next-step" onclick="nex_pt()">Proceed To
                                            Pay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <div class="tittle" onclick="open_pt(this)" id="ct-pt">
                                    <span>3</span>
                                    <h4>Payment</h4>
                                </div>
                                <div class="span" id="chekout_pt" style="height: 0">
                                    <div class="formbody">
                                        <div class="rpt100">
                                            <ul class="radio--group-inline-container_1" style="flex-direction:column;display:flex;">
                                                <li style="width:100%;height:6rem;">
                                                    <div class="radio-item_1">
                                                        <input id="cashondelivery1" value="1" name="paymentmethod" type="radio" />
                                                        <label for="cashondelivery1" class="radio-label_1">Cash on
                                                            Delivery</label>
                                                    </div>
                                                </li>
                                                <li style="width:100%; height:6rem;">
                                                    <div class="radio-item_1">
                                                        <input id="card1" value="2" name="paymentmethod" type="radio" />
                                                        <label for="card1" class="radio-label_1">Credit / Debit
                                                            Card</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="hidden" name="order-id" id="order-id">
                                    <div class="row2">
                                        <button class="next-step">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="left">
                <div class="ul-wrapper">
                    <h4>Order Summary</h4>
                    <?php foreach ($checkout as $product) { ?>
                        <div class="cart-item border_radius">
                            <div class="cart-product-img">
                                <img src="media/product/<?php echo $product['img1']; ?>" alt="" />
                                <div class="offer-badge">
                                    <?php
                                    $offn = ($product['fa'] * 100) / $product['price'];
                                    $off = round(100 - $offn);
                                    echo $off . '%';
                                    ?>
                                </div>
                            </div>
                            <div class="cart-text">
                                <h4><?php echo $product['product_name']; ?></h4>
                                <div class="cart-item-price">&#8377;<?php echo $product['fa'];
                                                                    $subtotal += $product['fa'] * $product['qty'];
                                                                    ?>
                                    <span>&#8377;<?php echo $product['price']; ?></span>
                                </div>
                                <br>
                                <div class="cart-item-price">
                                    <?php echo "x" . $product['qty']; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="total-checkout-group">
                        <div class="cart-total-dil">
                            <h4>Subtotal</h4>
                            <span>&#8377;<?php echo $product['total']; ?></span>
                        </div>
                        <div class="cart-total-dil pt-3">
                            <h4>Delivery Charges</h4>
                            <span>&#8377;<?php
                                            echo $product['ship_fee'];
                                            ?></span>
                        </div>
                        <?php
                        if ($product['is_applied']) {
                        ?>
                            <div class="cart-total-dil pt-3">
                                <h4>Promo Applied</h4>
                                <span>- &#8377;<?php
                                                echo $product['promo'];
                                                ?></span>
                            </div>
                        <?php } ?>
                        <?php
                        if ($product['is_add_w']) {
                        ?>
                            <div class="cart-total-dil pt-3">
                                <h4>From Wallet</h4>
                                <span>- &#8377;<?php
                                                echo $product['wl_amt'];
                                                ?></span>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="main-total-cart">
                        <h2>Total</h2>
                        <span>&#8377;<?php echo $product['final_amt']; ?></span>
                    </div>
                    <div class="cktout">
                        <i class="uil uil-padlock"></i> Secure Checkout
                    </div>
                </div>
                <div class="promocode">
                    <a href="javascript:void(0)" onclick="show_promo()">Have A Promocode?</a>
                </div>
                <div class="promoform" id="promoform">
                    <form action="javascript:void(0)">
                        <?php
                        if ($product['is_applied'] == 0) {
                        ?>
                            <input type="text" placeholder="Enter Promocode" id="promocode" />
                            <button onclick="apply_promo()">Apply</button>
                        <?php } else {
                        ?>
                            <button onclick="remove_promo()" style="width:100%;border-radius:0;">Remove Promo</button>
                        <?php
                        } ?>
                    </form>
                </div>
                <div class="promocode">
                    <a href="javascript:void(0)" onclick="show_wt()">Use wallet Ballance</a>
                </div>
                <div class="promoform" id="wt">
                    <form action="javascript:void(0)">
                        <?php
                        if ($product['is_add_w'] == 0) {
                        ?>
                            <button onclick="apply_wallet()" style="width:100%;border-radius:0;">Use</button>
                        <?php } else {
                        ?>
                            <button onclick="remove_wallet()" style="width:100%;border-radius:0;">Remove</button>
                        <?php
                        } ?>

                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
<script src="assets/js/ckt.js"></script>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>