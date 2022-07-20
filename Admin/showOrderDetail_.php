<?php
require('require/top.php');
$oid = $_GET['id'];
$allSeller = array();
$sellerInfo = array();
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
                                $query = "select orders.payment_type,orders.dv_time,orders.order_status,orders.id,orders.o_id,orders.total_amt,orders.ship_fee_order,orders.final_val,dv_time.from,dv_time.tto,order_status.o_status from orders,dv_time,order_status where orders.id='$oid' and orders.dv_date=dv_time.id and not orders.order_status='1' and orders.order_status=order_status.id";
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
                                                $rs = mysqli_query($con, "select order_detail.delivered_qty,order_detail.hover,order_detail.rcvd,order_detail.qty,product.product_name,product.img1,product.id,product.fa,product.added_by,sellers.f_name,commission.com from order_detail,product,sellers,commission where order_detail.oid='$oid' and order_detail.p_id=product.id and product.added_by=sellers.id and product.scat_id=commission.scat_id");
                                                $totalOrderedPricePerSeller = 0;
                                                $totalReceivedPricePerSeller = 0;
                                                while ($rw = mysqli_fetch_assoc($rs)) {
                                                    $totalOrderedPricePerSeller = $rw['qty'] * $rw['fa'];
                                                    $totalReceivedPricePerSeller = $rw['delivered_qty'] * $rw['fa'];
                                                    $commissionperproduct = ($rw['fa'] * $rw['com']) / 100;
                                                    $actualcommission = $commissionperproduct * $rw['qty'];
                                                    $g = $rw['added_by'];
                                                    if (count($allSeller) == 0) {
                                                        array_push($allSeller, $rw['added_by']);
                                                        $sellerInfo[$g]["ordered"] = $totalOrderedPricePerSeller;
                                                        $sellerInfo[$g]["received"] = $totalReceivedPricePerSeller;
                                                        $sellerInfo[$g]["commission"] = $actualcommission;
                                                    } else if (!in_array($rw['added_by'], $allSeller)) {
                                                        array_push($allSeller, $rw['added_by']);
                                                        $sellerInfo[$g]["ordered"] = $totalOrderedPricePerSeller;
                                                        $sellerInfo[$g]["received"] = $totalReceivedPricePerSeller;
                                                        $sellerInfo[$g]["commission"] = $actualcommission;
                                                    } else {
                                                        $sellerInfo[$g]["ordered"] = $totalOrderedPricePerSeller + $sellerInfo[$g]["ordered"];
                                                        $sellerInfo[$g]["received"] = $totalReceivedPricePerSeller + $sellerInfo[$g]["received"];
                                                        $sellerInfo[$g]["commission"] = $actualcommission + $sellerInfo[$g]["commission"];
                                                    }


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
                                                                    Ordered: <?php echo $rw['qty']; ?> Items
                                                                </div>
                                                                <div class="order-title">
                                                                    Received: <?php echo $rw['delivered_qty']; ?> Items
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="order-dt47">
                                                                <h4>Price</h4>
                                                                <div class="order-title">
                                                                    &#8377;<?php echo $rw['qty'] * $rw['fa']; ?>
                                                                </div>
                                                                <div class="order-title">
                                                                    &#8377;<?php echo $rw['delivered_qty'] * $rw['fa']; ?>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="order-dt47">
                                                                <h4>Commission</h4>
                                                                <div class="order-title">
                                                                    &#8377;<?php echo $actualcommission; ?>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php


                                                }
                                                ?>
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
                                                        <div class="cart-total-dil pt-3">
                                                            <h4>Payment Mode</h4>
                                                            <span><?php
                                                                    if ($row['payment_type'] == 1) {
                                                                        echo "COD";
                                                                    } else {
                                                                        echo "Online";
                                                                    }
                                                                    ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="main-total-cart">
                                                        <h2>Total</h2>
                                                        <span>&#8377;<?php echo $row['final_val']; ?></span>
                                                    </div>
                                                    <div class="main-total-cart">
                                                        <h2>User Paid</h2>
                                                        <span>&#8377;<?php echo $row['final_val']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <br>
                            </div>
                            <div class="pdpt-bg">
                                <div class="pdpt-title flex justify-between">
                                    <h4>Info</h4>
                                </div>
                                <div class="order-body10">
                                    <div class="total-dt">
                                        <?php
                                        foreach ($allSeller as $seller) {
                                            $rs2 = mysqli_query($con, "select sellers.f_name from sellers where id='$seller'");
                                            $sellerRes = mysqli_fetch_assoc($rs2);
                                        ?>
                                            <div class="total-checkout-group bt0">
                                                <div class="cart-total-dil">
                                                    <h4>Seller Name</h4>
                                                    <span><?php echo $sellerRes['f_name'] ?></span>
                                                </div>
                                                <div class="cart-total-dil pt-3">
                                                    <h4>Ordered Price</h4>
                                                    <span>&#8377;<?php echo $sellerInfo[$seller]["ordered"] ?></span>
                                                </div>
                                                <div class="cart-total-dil pt-3">
                                                    <h4>Received Price</h4>
                                                    <span style="word-wrap:break-word;">
                                                        &#8377;<?php echo $sellerInfo[$seller]["received"] ?>
                                                    </span>
                                                </div>
                                                <div class="cart-total-dil pt-3">
                                                    <h4>Commission</h4>
                                                    <span style="word-wrap:break-word;">
                                                        &#8377;<?php echo $sellerInfo[$seller]["commission"] ?>
                                                    </span>
                                                </div>
                                                <div class="cart-total-dil pt-3">
                                                    <h4>Final Payable</h4>
                                                    <span style="word-wrap:break-word;">
                                                        &#8377;<?php echo ($sellerInfo[$seller]["received"] - $sellerInfo[$seller]["commission"]) ?>
                                                    </span>
                                                </div>
                                                <?php
                                                $sts = mysqli_query($con, "select * from order_stlmnt where oid='$oid' and sid='$seller'");
                                                if (mysqli_num_rows($sts) == 0) {
                                                ?>
                                                    <div class="cart-total-dil pt-3">
                                                        <h4>Pay</h4>
                                                        <span style="word-wrap:break-word;">
                                                            <input type="text" id="finalpay" style="border:1px solid #eaeaea;padding:0.8rem;" value="<?php echo ($sellerInfo[$seller]["received"] - $sellerInfo[$seller]["commission"]) ?>">
                                                            <button style="
                                                    border-radius: 4px;
                                                    padding: 0.8rem;
                                                    background-color: #556ee6;
                                                    color: #fff;
                                                    float: right;
                                                    " onclick="pay('<?php echo $oid; ?>','<?php echo $seller; ?>')">Pay</button>
                                                        </span>
                                                    </div>
                                                <?php } else {
                                                    echo '<div class="cart-total-dil pt-3">
                                            <h4>Pay</h4>
                                            <span style="word-wrap:break-word;">
                                            Paid
                                            </span>
                                            </div>
                                            ';
                                                } ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
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