<?php
require("require/top.php");
authorise($con);
$sid = $_SESSION['SELLER_ID'];
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="profile.php?<?php echo R_v(); ?>=<?php echo hash_code() ?>&v=<?php echo hash_code() ?>">Profile</a>
        /
        <a href="wallet.php?<?php echo R_v(); ?>=<?php echo hash_code() ?>">wallet</a>
        /
        <a href="witdraw.php">Witdraw</a>
    </div>
</div>
<div class="cartrow" id="catrow">
    <div class="gh">
        <div class="heading">
            <h3>Witdraw</h3>
        </div>
        <div class="maincontainer2">

            <form action="#">
                <?php
                $y = mysqli_num_rows(mysqli_query($con, "select * from witdraw_req where s_id='$sid'"));
                if ($y > 0) {

                ?>
                    <div class="formrow">
                        <div class="heading" style="width:100%;">You already have an active witdraw request.</div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="formrow">
                        <div class="heading">Ammount</div>
                        <input type="number" placeholder="Enter Ammount" id="seller_full_name">
                    </div>
                    <div class="formrow">
                        <a href="javascript:void(0)" class="btn d-flex-center-a-j bg-main br-15" onclick="withdraw()">
                            <span>Witdraw</span>
                        </a>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
require("require/foot.php");
?>