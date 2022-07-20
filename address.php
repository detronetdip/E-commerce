<?php
require('require/top.php');
authorise_user2();
$userid = $_SESSION['USER_ID'];
$userData = mysqli_fetch_assoc(mysqli_query($con, "select users.*,user_wallet.ballance from users,user_wallet where users.id='$userid' and user_wallet.user_id=users.id"));
?>
<div class="path">
  <div class="container">
    <a href="index.php">Home</a>
    /
    <a href="address.php">My Address</a>
  </div>
</div>
<section class="address">
  <?php require('require/headbanner.php'); ?>
  <section class="myac-body">
    <div class="flex row">
      <?php require('require/ac-left.php'); ?>
      <div class="right">
        <h4><i class="uil uil-location-point"></i>My Address</h4>
        <div class="col-lg-12 col-md-12">
          <div class="pdpt-bg">
            <div class="pdpt-title">
              <h4>My Address</h4>
            </div>
            <div class="add-btn">
              <button onclick="control.redirect('add_address.php')">Add New Address</button>
            </div>
            <?php

            $template = '';
            $uid = $_SESSION['USER_ID'];
            $res = mysqli_query($con, "select user_address.*,city.city_name from user_address,city where user_address.uid='$uid' and user_address.user_city=city.id");
            while ($row = mysqli_fetch_assoc($res)) {
              $template = $template . '
                        <div class="address-item">
                        <div class="address-icon1">
                            <i class="uil uil-home"></i>
                        </div>
                        <div class="address-dt-all">
                            <h4>' . $row['type_ad'] . '</h4>
                            <p>
                                ' . $row['user_name'] . ', ' . $row['user_local'] . ', ' . $row['user_add'] . ',
                                ' . $row['city_name'] . ', ' . $row['user_pin'] . ',<br>' . $row['user_mobile'] . '
                            </p>
                            <ul class="action-btns">
                            <li>
                              <a href="edit_address.php?ad-id=' . $row['id'] . '" class="action-btn"
                                ><i class="uil uil-edit"></i
                              ></a>
                            </li>
                            <li>
                              <a href="javascript:void(0)" class="action-btn" onclick="del_address(' . $row['id'] . ')"
                                ><i class="uil uil-trash-alt"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                        </div>
                    ';
            }
            echo $template;
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>