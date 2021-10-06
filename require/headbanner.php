<?php
$userid=$_SESSION['USER_ID'];
$userData=mysqli_fetch_assoc(mysqli_query($con,"select users.*,user_wallet.ballance from users,user_wallet where users.id='$userid' and user_wallet.user_id=users.id"));
?>
<div class="headbanner">
    <div class="userimage">
        <img src="assets/images/img-5.jpg" alt="" />
    </div>
    <h4><?php echo $userData['name'] ?></h4>
    <p>
        +91 <?php echo $userData['mobile'] ?>
        <a href="#"><i class="uil uil-edit"></i></a>
    </p>
    <div class="earn-points">
        <img src="assets/images/Dollar.svg" alt="" />Ballance :
        <span>&#8377;<?php echo $userData['ballance'] ?></span>
    </div>
</div>