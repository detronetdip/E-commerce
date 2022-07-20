<?php
require("require/top.php");
authorise($con);
$key = get_all_param($_GET);
authenticate_seller($_GET[$key[0]]);
$sid = $_SESSION['SELLER_ID'];
$r = mysqli_fetch_assoc(mysqli_query($con, "select * from seller_wallet where seller_id='$sid'"));
$sr = mysqli_query($con, "select * from seller_w_msg where s_id='$sid'");
?>
<div class="path">
  <div class="container">
    <a href="index.php">Home</a>
    /
    <a href="profile.php?<?php echo R_v(); ?>=<?php echo hash_code() ?>&v=<?php echo hash_code() ?>">Profile</a>
    /
    <a href="wallet.php?<?php echo R_v(); ?>=<?php echo hash_code() ?>">wallet</a>
  </div>
</div>
<div class="cartrow" id="catrow">
  <div class="gh">
    <div class="col-lg-12 col-md-12">
      <div class="pdpt-bg2">
        <div class="imgbox">
          <img src="../assets/images/money.svg" alt="">
        </div>
        <span class="rewrd-title">My Balance</span>
        <h4 class="cashbk-price">&#8377;<?php echo $r['ballance']; ?></h4>
        <button class='btn btn-main' onclick="control.redirect('witdraw.php')">Witdraw</button>
      </div>
      <div class="pdpt-bg">
        <div class="pdpt-title">
          <h4>History</h4>
        </div>
        <div class="order-body10">
          <ul class="history-list">
            <?php
            while ($row = mysqli_fetch_assoc($sr)) {
            ?>
              <li>
                <div class="purchase-history">
                  <div class="purchase-history-left">
                    <h4>
                      <?php
                      if ($row['cod'] == 1) {
                        echo "Credited";
                      } else {
                        echo "Debited";
                      }
                      ?>
                    </h4>
                    <p>Message:<ins><?php echo $row['msg'] ?></ins></p>
                    <span>
                      <?php
                      echo $row['added_on'];
                      ?>
                    </span>
                  </div>
                  <div class="purchase-history-right">
                    <span>

                      <?php
                      if ($row['cod'] == 1) {
                        echo "+";
                      } else {
                        echo "-";
                      }
                      echo "&#8377;" . $row['balance'];
                      ?>

                    </span>

                  </div>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require("require/foot.php");
?>