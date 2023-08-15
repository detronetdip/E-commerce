<?php
require("require/top.php");
$oid = $_GET['id'];
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="order-detail.php?id=<?php echo $oid; ?>">Order Detail</a>
    </div>
</div>
<div class="cartrow" id="catrow">
    <div class="gh">
        <?php
        $query = "select orders.dv_time,orders.order_status,orders.id,orders.o_id,orders.total_amt,orders.ship_fee_order,orders.final_val,dv_time.from,dv_time.tto,order_status.o_status from orders,dv_time,order_status where orders.id='$oid' and orders.dv_date=dv_time.id and not orders.order_status='1' and orders.order_status=order_status.id";
        $res = mysqli_query($con, $query);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {

        ?>
                <div class="pdpt-bg">
                    <div class="pdpt-title flex justify-between">
                        <h6>Order Id: <?php echo $row['o_id']; ?></h6>
                        <h6>Delivery Timing: <?php echo $row['dv_time']; ?>,<?php echo $row['from']; ?>
                            -
                            <?php echo $row['tto']; ?></h6>
                    </div>
                    <div class="order-body10">
                        <?php
                        $oid = $row['id'];
                        $rs = mysqli_query($con, "select order_detail.hover,order_detail.rcvd,order_detail.qty,product.product_name,product.img1,product.id from order_detail,product where order_detail.oid='$oid' and order_detail.p_id=product.id");
                        while ($rw = mysqli_fetch_assoc($rs)) {
                        ?>
                            <ul class="order-dtsll">
                                <li>
                                    <div class="order-dt-img">
                                        <img src="../media/product/<?php echo $rw['img1']; ?>" alt="" />

                                    </div>
                                </li>
                                <li>
                                    <div class="order-dt47">
                                        <h4><?php echo $rw['product_name']; ?></h4>
                                        <div class="order-title">
                                            <?php echo $rw['qty']; ?> Items
                                        </div>
                                        <?php
                                        if ($rw['hover'] == 1) {
                                        ?>
                                            <div class="order-title">
                                                Handed Over <i class="uil uil-check-circle"></i>
                                            </div>
                                            <?php
                                            if ($rw['rcvd'] == 1) {

                                            ?>
                                                <div class="order-title">
                                                    Received <i class="uil uil-check-circle"></i>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="order-title">
                                                    Received <input type="checkbox" id="h-hover" value="<?php echo $rw['id'] ?>" oninput="rcvd(this,<?php echo $oid; ?>)">
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="order-title">
                                                Not Handed Over
                                            </div>
                                        <?php
                                        }
                                        ?>
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
                        <div class="track-order flex justify-between">
                            <span class="badge green"> <?php echo $row['o_status']; ?> </span>
                            <?php
                            if ($row['o_status'] != "Delivered") {
                                if (mysqli_num_rows(mysqli_query($con, "select * from ofd where od_id='$oid'")) == 0) {
                            ?>
                                    <button onclick="out(<?php echo $oid; ?>)">Out for Delivery</button>
                                <?php } else {

                                ?>
                                    <button onclick="control.redirect('final_delivery.php?id=<?php echo $oid ?>')">Delivered</button>
                                    <button onclick="out_undelivered(<?php echo $oid; ?>)">Undelivered</button>


                            <?php
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>

        <div class="pdpt-bg">
            <div class="pdpt-title flex justify-between">
                <h4>Delivery Address</h4>
            </div>
            <?php
            $f = "select orders.ad_id,user_address.*,city.city_name from orders,user_address,city where orders.id='$oid' and orders.ad_id=user_address.id and user_address.user_city=city.id";

            $d = mysqli_fetch_assoc(mysqli_query($con, $f));
            ?>
            <div class="order-body10">
                <div class="total-dt">
                    <div class="total-checkout-group bt0">
                        <div class="cart-total-dil">
                            <h4>Name</h4>
                            <span><?php echo $d['user_name'] ?></span>
                        </div>
                        <div class="cart-total-dil pt-3">
                            <h4>Phone</h4>
                            <span><?php echo $d['user_mobile'] ?></span>
                        </div>
                        <div class="cart-total-dil pt-3">
                            <h4>Address</h4>
                            <span style="word-wrap:break-word;"><?php echo $d['user_local'] ?>, <br>
                                <?php echo $d['user_add'] ?>, <br>
                                <?php echo $d['city_name'] ?>,<?php echo $d['user_pin'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require("require/foot.php");
?>