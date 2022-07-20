<?php
require('require/top.php');
$order = getMyOrders($con, 2);
?>
<div class="path">
  <div class="container">
    <a href="index.php">Home</a>
    /
    <a href="order_received.php">Order Received</a>
  </div>
</div>
<div class="cartrow" id="catrow">
  <div class="gh">
    <div class="heading">
      <h3>Placed Orders</h3>
    </div>
    <div class="maincontainer">
      <table class="wishlist">
        <thead>
          <th>#</th>
          <th>Id</th>
          <th>Added On</th>
          <th>Status</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          if (count($order) > 0) {
            $i = 1;
            foreach ($order as $o) {
          ?>
              <tr>
                <td><?php echo $i;
                    $i++; ?></td>
                <td>
                  <a href="javascript:void(0)">
                    <?php echo $o['o_id']; ?>
                  </a>
                </td>
                <td><?php echo $o['added_on']; ?></td>
                <td>
                  <span class="badge orange"> Placed </span>
                </td>
                <td>
                  <div class="acn">
                    <a href="order-detail.php?id=<?php echo $o['id']; ?>" class="view">
                      <i class="uil uil-eye"></i>
                    </a>
                  </div>
                </td>
              </tr>

          <?php
            }
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
require("require/foot.php");
?>