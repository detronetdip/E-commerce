<?php
require('require/top.php');
if (isset($_POST['orderId_user'])) {
  $order_id = $_POST['orderId_user'];
  $query = "select orders.o_id,orders.final_val,orders.payment_type,user_address.user_name,user_address.user_mobile,user_address.user_add,user_address.user_pin,user_address.user_local,city.city_name,dv_time.from,dv_time.tto from orders,user_address,city,dv_time where orders.id='$order_id' and orders.ad_id=user_address.id and user_address.user_city=city.id and orders.dv_date=dv_time.id";
  $row = mysqli_fetch_assoc(mysqli_query($con, $query));
} else {
  redirect('index.php');
}
?>
<div class="path">
  <div class="container">
    <a href="index.php">Home</a>
    /
    <a href="orderPlaced.php">My Orders</a>
  </div>
</div>

<section class="order-placed">
  <div class="all-product-grid">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="order-placed-dt">
            <i class="uil uil-check-circle icon-circle"></i>
            <h2>Order Successfully Placed</h2>
            <p>
              Thank you for your order! will received order timing -
              <span>(Today, <?php echo $row['from'] ?> - <?php echo $row['tto'] ?>)</span>
            </p>
            <div class="delivery-address-bg">
              <div class="title585">
                <div class="pln-icon">
                  <i class="uil uil-box"></i>
                </div>
                <h4>Order Id: <?php echo $row['o_id'] ?></h4>
              </div>
              <div class="title585">
                <div class="pln-icon">
                  <i class="uil uil-telegram-alt"></i>
                </div>
                <h4>Your order will be sent to this address</h4>
              </div>
              <ul class="address-placed-dt1">
                <li>
                  <p>
                    <i class="uil uil-map-marker-alt"></i>Address :<span><?php echo $row['user_local'] ?>,<?php echo $row['user_add'] ?>,<?php echo $row['city_name'] ?>,<?php echo $row['user_pin'] ?></span>
                  </p>
                </li>
                <li>
                  <p>
                    <i class="uil uil-phone-alt"></i>Phone Number :<span>+91<?php echo $row['user_mobile'] ?></span>
                  </p>
                </li>
              </ul>
              <div class="stay-invoice">
                <div class="st-hm">
                  Stay Home<i class="uil uil-smile"></i>
                </div>
                <a href="myac.php" class="invc-link hover-btn">Ok</a>
              </div>
              <?php
              if ($row['payment_type'] == 1) {
              ?>
                <div class="placed-bottom-dt">
                  The payment of <span>&#8377;<?php echo $row['final_val'] ?></span> you'll make when the deliver
                  arrives with your order.
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>