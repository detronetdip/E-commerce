<?php
require('require/top.php');
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="addseller.php">Add Seller </a>
    </div>
    <div class="catbox-row">
        <div class="catboxp">
            <h1><?php echo "Add Seller"; ?> </h1>
            <div class="formrow">
                <div class="heading">
                    Email
                </div>
                <div class="catselect">
                    <input type="email" placeholder="Enter Email" id="umail">
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Mobile
                </div>
                <div class="catselect">
                    <input type="mobile" placeholder="Enter Mobile" id="umobile">
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Password
                </div>
                <div class="catselect">
                    <input type="password" placeholder="Enter Password" id="upass">
                </div>
            </div>
            <div class="formrow">
                <span id='pdstatus' style='font-size:1.3rem; color:#556ee6;'></span>
                <button class='add' onclick='add_neew_seller()'>
                    <i class='fa fa-plus' aria-hidden='true'></i>
                    Add</button>
            </div>
        </div>
    </div>
</div>
<?php
require('require/foot.php');
?>