<?php
require('require/top.php');
authorise_user2();
$oid = $_GET['id'];
?>
<div class="path">
    <div class="container">
        <a href="index.html">Home</a>
        /
        <a href="index.html">My Orders</a>
    </div>
</div>
<section class="myorders">
    <section class="myac-body">
        <div class="flex row">
            <div class="right" style="flex-basis:100%">
                <h4><i class="uil uil-box"></i>My Orders</h4>
                <div class="col-lg-12 col-md-12" id="bill-sec">
                    <?php
                    $uid = $_SESSION['USER_ID'];
                    $query = "select orders.dv_time,orders.order_status,orders.id,orders.o_id,orders.total_amt,orders.ship_fee_order,orders.final_val,dv_time.from,dv_time.tto from orders,dv_time where orders.id='$oid' and orders.u_id='$uid' and orders.dv_date=dv_time.id and not orders.order_status='1'";
                    $res = mysqli_query($con, $query);
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {

                    ?>
                            <div class="pdpt-bg">
                                <div class="pdpt-title flex justify-between">
                                    <h6>Order Id: <?php echo $row['o_id']; ?></h6>
                                    <h6>Delivery Timing: <?php echo $row['dv_time']; ?>,<?php echo $row['from']; ?> -
                                        <?php echo $row['tto']; ?></h6>
                                </div>
                                <div class="order-body10">
                                    <?php
                                    $oid = $row['id'];
                                    $rs = mysqli_query($con, "select order_detail.delivered_qty,order_detail.qty,product.product_name,product.img1 from order_detail,product where order_detail.oid='$oid' and order_detail.p_id=product.id");
                                    while ($rw = mysqli_fetch_assoc($rs)) {
                                    ?>
                                        <ul class="order-dtsll">
                                            <li>
                                                <div class="order-dt-img">
                                                    <img src="media/product/<?php echo $rw['img1']; ?>" alt="" />
                                                </div>
                                            </li>
                                            <li>
                                                <div class="order-dt47">
                                                    <h4><?php echo $rw['product_name']; ?></h4>
                                                    <div class="order-title">
                                                        Ordered Qty: <?php echo $rw['qty']; ?> Items
                                                    </div>
                                                    <div class="order-title">
                                                        Delivered Qty: <?php echo $rw['delivered_qty']; ?> Items
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                    <div class="total-dt">
                                        <div class="total-checkout-group">
                                            <div class="cart-total-dil">
                                                <h4>Sub Total</h4>
                                                <span>&#8377;<?php echo $row['total_amt']; ?></span>
                                            </div>
                                            <div class="cart-total-dil pt-3">
                                                <h4>Delivery Charges</h4>
                                                <span>&#8377;<?php echo $row['ship_fee_order']; ?></span>
                                            </div>
                                        </div>
                                        <div class="main-total-cart">
                                            <h2>Total</h2>
                                            <span>&#8377;<?php echo $row['final_val']; ?></span>
                                        </div>
                                    </div>
                                    <div class="track-order">
                                        <h4>Track Order</h4>
                                        <?php
                                        $fade = "bs-wizard-dot fade";
                                        $cfade = "bs-wizard-dot";
                                        $progress = "progress-bar";
                                        $fadeBar = "fade-bar";
                                        ?>
                                        <div class="bs-wizard" style="border-bottom: 0">
                                            <div class="bs-wizard-step complete">
                                                <div class="text-center bs-wizard-stepnum">Placed</div>
                                                <div class="progress">
                                                    <div class="<?php
                                                                if ($row['order_status'] == 3 || $row['order_status'] == 4 || $row['order_status'] == 5 || $row['order_status'] == 6 || $row['order_status'] == 7) {
                                                                    echo $progress;
                                                                } else {
                                                                    echo $fadeBar;
                                                                } ?>">&nbsp;
                                                    </div>
                                                </div>
                                                <a href="#" class="
                                        <?php
                                        echo $cfade;  ?>
                                        "></a>
                                            </div>
                                            <div class="bs-wizard-step complete">
                                                <div class="text-center bs-wizard-stepnum">Packed</div>
                                                <div class="progress">
                                                    <div class="<?php
                                                                if ($row['order_status'] == 4 || $row['order_status'] == 5 || $row['order_status'] == 6 || $row['order_status'] == 7) {
                                                                    echo $progress;
                                                                } else {
                                                                    echo $fadeBar;
                                                                } ?>">&nbsp;&nbsp;</div>
                                                </div>
                                                <a href="#" class="<?php
                                                                    if ($row['order_status'] == 3 || $row['order_status'] == 4 || $row['order_status'] == 5 || $row['order_status'] == 6 || $row['order_status'] == 7) {
                                                                        echo $cfade;
                                                                    } else {
                                                                        echo $fade;
                                                                    } ?>"></a>
                                            </div>
                                            <div class="bs-wizard-step active">
                                                <div class="text-center bs-wizard-stepnum">
                                                    On the way
                                                </div>
                                                <div class="progress">
                                                    <div class="<?php
                                                                if ($row['order_status'] == 5 || $row['order_status'] == 6 || $row['order_status'] == 7) {
                                                                    echo $progress;
                                                                } else {
                                                                    echo $fadeBar;
                                                                } ?>">&nbsp;</div>
                                                </div>
                                                <a href="#" class="<?php
                                                                    if ($row['order_status'] == 4 || $row['order_status'] == 5 || $row['order_status'] == 6 || $row['order_status'] == 7) {
                                                                        echo $cfade;
                                                                    } else {
                                                                        echo $fade;
                                                                    } ?>"></a>
                                            </div>
                                            <div class="bs-wizard-step disabled">
                                                <div class="text-center bs-wizard-stepnum">
                                                    <?php
                                                    if ($row['order_status'] == 5) {
                                                        echo "Delivered";
                                                    } else if ($row['order_status'] == 6) {
                                                        echo "Undelivered";
                                                    } else if ($row['order_status'] == 7) {
                                                        echo "Issue";
                                                    } else {
                                                        echo "Delivered";
                                                    }
                                                    ?>
                                                </div>
                                                <div class="progress" style="width: 0%;">
                                                    <div class="progress-bar"></div>
                                                </div>
                                                <a href="#" class="<?php
                                                                    if ($row['order_status'] == 5 || $row['order_status'] == 6 || $row['order_status'] == 7) {
                                                                        echo $cfade;
                                                                    } else {
                                                                        echo $fade;
                                                                    } ?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($row['order_status'] == 5) {
                                    ?>
                                        <div class="call-bill justify-between">
                                            <div class="order-bill-slip">
                                                <a href="javascript:void(0)" class="bill-btn5 hover-btn" onclick="confirm_delivered_order(<?php echo $oid ?>)">Confirm</a>
                                            </div>
                                            <div class="order-bill-slip" style="margin-left:1rem">
                                                <a href="javascript:void(0)" class="bill-btn5 hover-btn" onclick="not_confirm_delivered_order(<?php echo $oid ?>)">Not Confirm</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</section>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>