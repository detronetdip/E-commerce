<?php
require('require/top.php');
$oid = $_GET['id'];
$qu = "select order_detail.*,product.img1,product.fa,product.product_name from order_detail,product where order_detail.oid='$oid' and product.id=order_detail.p_id";
$rs = mysqli_query($con, $qu);
$t = array();
while ($rt = mysqli_fetch_assoc($rs)) {
    $t[] = $rt;
}
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="showOrderDetail.php?id=<?php echo $_GET['id']; ?>">Order Detail</a>
    </div>
    <div class="catbox-row">
        <div class="catbox">
            <section class="myorders">
                <section class="myac-body">
                    <div class="flex row">
                        <div class="right">
                            <div class="col-lg-12 col-md-12" id="bill-sec">
                                <?php
                                $query = "select orders.is_p_app,orders.is_w_ap,orders.prmo,orders.wlmt,orders.dv_time,orders.order_status,orders.id,orders.o_id,orders.total_amt,orders.ship_fee_order,orders.final_val,dv_time.from,dv_time.tto,order_status.o_status from orders,dv_time,order_status where orders.id='$oid' and orders.dv_date=dv_time.id and not orders.order_status='1' and orders.order_status=order_status.id";
                                $res = mysqli_query($con, $query);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {

                                ?>
                                        <div class="call-bill">
                                            <div class="order-bill-slip">
                                                <span style="
                                        padding: 0.6rem 1rem;
                                        font-size:1.3rem;
                                        border-radius: 15px;
                                        background-color: #e6faee;
                                        color: #43dc80;
                                    "> <?php echo $row['o_status']; ?> </span>
                                            </div>
                                        </div>
                                        <div class="pdpt-bg">
                                            <div class="pdpt-title flex justify-between">
                                                <h4>Order Id: <?php echo $row['o_id']; ?></h4>
                                                <h6>Delivery Timing: <?php echo $row['dv_time']; ?>,<?php echo $row['from']; ?>
                                                    -
                                                    <?php echo $row['tto']; ?></h6>
                                                <h6><?php
                                                    $fg = mysqli_query($con, "select order_time.added_on,order_status.o_status from order_time,order_status where order_time.oid='$oid' and order_time.o_status=order_status.id");
                                                    while ($rw = mysqli_fetch_assoc($fg)) {
                                                        echo $rw['o_status'] . " : " . $rw['added_on'] . "<br>";
                                                    }

                                                    ?></h6>
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
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="order-dt47">
                                                                <h4>Handed Over
                                                                    <?php if ($rw['hover'] == 1) {
                                                                    ?>
                                                                        <input type="checkbox" id="h-hover" checked disabled>
                                                                        <?php
                                                                        if ($rw['rcvd'] == 1) {
                                                                            echo "&nbsp; Confirmed <i class='fa fa-check-square' aria-hidden='true' style='color:#0066ff'></i>";
                                                                        } else {
                                                                            echo "&nbsp; Not Confirmed";
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <input type="checkbox" id="h-hover" value="<?php echo $rw['id'] ?>" oninput="hvr(this,<?php echo $oid; ?>)">
                                                                    <?php
                                                                    } ?>
                                                                </h4>

                                                                <div class="order-title">
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
                                                        <?php

                                                        if ($row['is_p_app'] == 1) {
                                                        ?>
                                                            <div class="cart-total-dil pt-3">
                                                                <h4>From Promo</h4>
                                                                <span>-&#8377;<?php echo $row['prmo']; ?></span>
                                                            </div>
                                                        <?php
                                                        }
                                                        if ($row['is_w_ap'] == 1) {
                                                        ?>

                                                            <div class="cart-total-dil pt-3">
                                                                <h4>From Wallet</h4>
                                                                <span>-&#8377;<?php echo $row['wlmt']; ?></span>
                                                            </div>

                                                        <?php
                                                        }


                                                        ?>
                                                    </div>
                                                    <div class="main-total-cart">
                                                        <h2>Total</h2>
                                                        <span>&#8377;<?php echo $row['final_val']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="call-bill">
                                                    <?php
                                                    $n = mysqli_num_rows(mysqli_query($con, "select * from assigned_orders where od_id='$oid'"));
                                                    $n2 = mysqli_num_rows(mysqli_query($con, "select * from ofd where od_id='$oid'"));

                                                    if ($n == 0 && $n2 == 0 && $row['order_status'] < 5) {
                                                    ?>
                                                        <div class="delivery-man">
                                                            Assign To -
                                                            <select name="" id="dvselect" style="border:1px solid #cecbcb;">
                                                                <option value="#">Select delivery Boy</option>
                                                                <?php
                                                                $rse = mysqli_query($con, "select * from delivery_boy");
                                                                while ($r = mysqli_fetch_assoc($rse)) {
                                                                ?>
                                                                    <option value="<?php echo $r['id']; ?>"><?php echo $r['dv_name']; ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="order-bill-slip">
                                                            <a href="javascript:void()0" onclick="assign(<?php echo $oid; ?>)" class="bill-btn5 hover-btn">Assign</a>
                                                        </div>
                                                    <?php } else {
                                                        $rs1 = mysqli_query($con, "select assigned_orders.*,delivery_boy.dv_name from assigned_orders,delivery_boy where assigned_orders.od_id='$oid' and assigned_orders.dv_id=delivery_boy.id");
                                                        $rs2 = mysqli_query($con, "select ofd.*,delivery_boy.dv_name from ofd,delivery_boy where ofd.od_id='$oid' and ofd.dv_id=delivery_boy.id");
                                                        $rs3 = mysqli_query($con, "select cnfrm_delivery.*,delivery_boy.dv_name from cnfrm_delivery,delivery_boy where cnfrm_delivery.od_id='$oid' and cnfrm_delivery.dv_id=delivery_boy.id");
                                                        $rs4 = mysqli_query($con, "select cnfrm_undelivery.*,delivery_boy.dv_name from cnfrm_undelivery,delivery_boy where cnfrm_undelivery.od_id='$oid' and cnfrm_undelivery.dv_id=delivery_boy.id");
                                                        if (mysqli_num_rows($rs1) > 0) {
                                                            $d = mysqli_fetch_assoc($rs1);
                                                        } else if (mysqli_num_rows($rs2)) {
                                                            $d = mysqli_fetch_assoc($rs2);
                                                        } else if (mysqli_num_rows($rs3)) {
                                                            $d = mysqli_fetch_assoc($rs3);
                                                        } else if (mysqli_num_rows($rs4)) {
                                                            $d = mysqli_fetch_assoc($rs4);
                                                            echo '<div class="delivery-man">
                                                    <a href="javascript:void()0" onclick="reassign(' . $oid . ')"
                                                    class="bill-btn5 hover-btn">Reassign</a>
                                                    <a href="javascript:void()0" onclick="reassign_finalize(' . $oid . ')"
                                                    class="bill-btn5 hover-btn">Finalize</a>
                                                </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                                        } else {
                                                            $d = mysqli_fetch_assoc(mysqli_query($con, "select delivery_boy.dv_name,orders.delivered_by from delivery_boy,orders where orders.delivered_by=delivery_boy.id"));
                                                        }

                                                    ?>

                                                        <div class="delivery-man">
                                                            Assigned To -
                                                            <?php
                                                            echo $d['dv_name'];
                                                            ?>
                                                        </div>
                                                    <?php
                                                    } ?>
                                                </div>
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
        </div>
    </div>
    <div class="row" style="
              display: block;
              margin-bottom: 2rem;
              font-size: 1.2rem;
              color: #6a7187;
            ">
        @ Developed by Ayondip Jana
    </div>
</div>
<?php
require('require/foot.php');
?>