<?php
require("require/top.php");
$did = $_SESSION['DELIVERY_ID'];
$res = mysqli_query($con, "select ofd.od_id,orders.o_id,orders.id,order_time.added_on from ofd,orders,order_time where ofd.dv_id='$did' and ofd.od_id=orders.id and order_time.oid=orders.id and order_time.o_status=orders.order_status");
?>
<div class="path">
  <div class="container">
    <a href="index.php">Home</a>
    /
    <a href="outfordelivery.php">Out for Delivery</a>
  </div>
</div>
<div class="cartrow" id="catrow">
  <div class="gh">
    <div class="heading">
      <h3>Out for Delivery</h3>
    </div>
    <div class="maincontainer">
      <table class="wishlist">
        <thead>
          <th>#</th>
          <th>Id</th>
          <th>Time</th>
          <th>Status</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          $i = 1;
          while ($rw = mysqli_fetch_assoc($res)) {
          ?>
            <tr>
              <td><?php echo $i;
                  $i++; ?></td>
              <td><?php echo $rw['o_id']; ?></td>
              <td><?php echo $rw['added_on']; ?></td>
              <td>
                <span class="badge green"> Out for Delivery </span>
              </td>
              <td>
                <div class="acn">
                  <a href="order-detail.php?id=<?php echo $rw['id'] ?>" class="view">
                    <i class="uil uil-eye"></i>
                  </a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
require("require/foot.php");
?>