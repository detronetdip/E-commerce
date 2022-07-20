<?php
require("require/top.php");
$did = $_SESSION['DELIVERY_ID'];
$res = mysqli_query($con, "select orders.o_id,orders.id,order_time.added_on from orders,order_time where orders.delivered_by='$did' and  order_time.oid=orders.id and order_time.o_status=orders.order_status and orders.order_status='6'");
?>
<div class="path">
  <div class="container">
    <a href="index.php">Home</a>
    /
    <a href="delivery_confirmation.php">Delivery confirmations</a>
  </div>
</div>
<div class="cartrow" id="catrow">
  <div class="gh">
    <div class="heading">
      <h3>Delivery confirmation</h3>
    </div>
    <div class="maincontainer">
      <table class="wishlist">
        <thead>
          <th>#</th>
          <th>Id</th>
          <th>Time</th>
          <th>Status</th>
          <th>Confirmed</th>
        </thead>
        <tbody>
          <?php
          $i = 1;
          while ($rw = mysqli_fetch_assoc($res)) {
            $did = $_SESSION['DELIVERY_ID'];
            $oid = $rw['id'];
            $query = "select * from cnfrm_undelivery where od_id='$oid' and dv_id='$did'";
            $rs = mysqli_query($con, $query);
            if (mysqli_num_rows($rs) == 0) {
          ?>
              <tr>
                <td><?php echo $i;
                    $i++; ?></td>
                <td><?php echo $rw['o_id']; ?></td>
                <td><?php echo $rw['added_on']; ?></td>
                <td>
                  <span class="badge green"> undelivered</span>
                </td>
                <td>
                  <span class="badge green"> Yes </span>
                </td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
require("require/foot.php");
?>