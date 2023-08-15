<?php
require('require/top.php');
$id = $_GET['sid'];
$q = "select sellers.*,country.cntry_name,state.state_name,city.city_name,pin.pincode,business_type.type from sellers,country,state,city,pin,business_type where sellers.id='$id' and sellers.country=country.id and sellers.state=state.id and sellers.city=city.id and sellers.pin=pin.id and sellers.tob=business_type.id";
$ts = mysqli_query($con, "select * from seller_wallet where seller_id='$id'");
$k = mysqli_num_rows($ts);
if ($k > 0) {
    $t = mysqli_fetch_assoc($ts);
    $wb = $t['ballance'];
} else {
    $wb = 0;
}
$r = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($r);
$is_gst = $row['is_gst'];
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="seller.php">Sellers </a><span>/</span>
        <a href="seller_detail.php">View</a>
    </div>
    <div class="headrow">
        <div class="wrap" style="height: 30rem;">
            <div class="pp">
                <img src="assets/images/2.jpg" alt="" />
            </div>
            <div class="detail">
                <h3><?php echo $row['f_name']; ?></h3>
                <h2><?php echo $row['b_name']; ?></h2>
                <h4><?php echo $row['email']; ?></h4>
                <h4><?php echo $row['mobile']; ?></h4>
                <p>
                    <?php echo $row['address']; ?>
                </p>
                <br><br><br><br>
                <h2>Business address</h2>
                <br>
                <p>
                    <?php echo $row['city_name']; ?>, <?php echo $row['state_name']; ?>, <?php echo $row['cntry_name']; ?>,
                    <?php echo $row['pincode']; ?>
                </p>
            </div>
            <div class="detail">
                <h3>Bank Details</h3>
                <h4><?php echo $row['acc_num']; ?></h4>
                <h4><?php echo $row['acc_holder']; ?></h4>
                <p> <?php echo $row['bank']; ?> (<?php echo $row['branch']; ?> )</p>
                <h4> <?php echo $row['ifsc']; ?></h4>
                <br><br><br><br>
            </div>
            <div class="detail" style="float: right">
                <h4>GST Number: <span style="color:#6a7187;"><?php echo $row['gst_id']; ?></span></h4>
                <a href="../media/seller_profile/<?php echo $row['b_crft']; ?>" target="_blank">
                    <button class="upw" style="width:14rem;">
                        View Certificate
                    </button>
                </a>
                <?php if ($is_gst == 1) {  ?>
                    <a href="../media/seller_profile/<?php echo $row['gst_crft']; ?>" target="_blank">
                        <button class="upw" style="width:14rem;">
                            View GST Proof
                        </button>
                    </a>
                <?php } ?>
                <br>
                <a href="../media/seller_profile/<?php echo $row['adhar']; ?>" target="_blank">
                    <button class="upw" style="width:14rem;">
                        View Adhar
                    </button>
                </a>
                <br>
                <a href="../media/seller_profile/<?php echo $row['pan']; ?>" target="_blank">
                    <button class="upw" style="width:14rem;">
                        View PAN
                    </button>
                </a>
            </div>
        </div>
        <div class="wrap">
            <div class="detail" style="margin-bottom:4rem">
                <h3>Wallet Balance: &#8377;<span><?php echo $wb; ?></span></h3>
                <a style="font-size:1.3rem; color:#40464d; text-decoration:underline" href="manual_update.php?sid=<?php echo $_GET['sid'] ?>">Manual Update</a>
                &nbsp;
                <a style="font-size:1.3rem; color:#40464d; text-decoration:underline" href="view_seller_wallet_history.php?sid=<?php echo $_GET['sid'] ?>">View Wallet History</a>
            </div>
            <?php
            if (isset($_GET['req']) && $_GET['req'] == 1) {
                $o = mysqli_fetch_assoc(mysqli_query($con, "select * from witdraw_req where s_id='$id'"));
            ?>
                <div class="detail" style="margin-bottom:4rem">
                    <h3>Requested: &#8377;<span><?php echo $o['amount_r']; ?></span></h3>
                    <button style="background:#556ee6;color:#fff; padding:0.8rem; border-radius:5px" onclick="redirect_to('txn.php?sid=<?php echo $id;  ?>')">Approve Request</button>
                    <button style="background:#556ee6;color:#fff; padding:0.8rem; border-radius:5px" onclick="reject_req(<?php echo $id;  ?>)">Reject</button>
                </div>
            <?php } ?>
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