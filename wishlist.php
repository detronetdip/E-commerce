<?php
require('require/top.php');
authorise_user2();
?>
<div class="path">
  <div class="container">
    <a href="index.html">Home</a>
    /
    <a href="index.html">My Wishlist</a>
  </div>
</div>
<section class="wishlist">
  <?php require('require/headbanner.php'); ?>
  <section class="myac-body">
    <div class="flex row">
      <?php require('require/ac-left.php'); ?>
      <div class="right">
        <h4><i class="uil uil-heart"></i>My Wishlist</h4>
        <div class="col-lg-12 col-md-12">
          <div class="pdpt-bg">
            <?php
            $uid = $_SESSION['USER_ID'];
            $query = "select wishlist.id,wishlist.p_id,product.product_name,product.price,product.fa,product.img1 from wishlist,product where wishlist.u_id='$uid' and wishlist.p_id=product.id";
            $res = mysqli_query($con, $query);
            if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="wish-item">
                  <div class="cart-product-img">
                    <img src="media/product/<?php echo $row['img1'] ?>" alt="" />
                    <div class="offer-badge">
                      <?php
                      $offn = ($row['fa'] * 100) / $row['price'];
                      $off = round(100 - $offn);
                      echo $off . '%';
                      ?>
                    </div>
                  </div>
                  <div class="cart-text">
                    <h4><?php echo $row['product_name'] ?></h4>
                    <div class="cart-item-price">&#8377;<?php echo $row['fa']; ?> <span>&#8377;<?php echo $row['price']; ?></span></div>
                    <button type="button" class="cart-close-btn" onclick="del_wish(<?php echo $row['id']; ?>)">
                      <i class="uil uil-trash-alt"></i>
                    </button>
                  </div>
                </div>
            <?php }
            } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>