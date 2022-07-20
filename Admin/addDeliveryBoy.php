<?php
require('require/top.php');
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="addseller.php">Add Deliveryboy </a>
    </div>
    <div class="catbox-row">
        <div class="catboxp">
            <h1><?php echo "Add Deliveryboy"; ?> </h1>
            <div class="formrow">
                <div class="heading">
                    Name
                </div>
                <div class="catselect">
                    <input type="text" placeholder="Enter Name" id="dName">
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Username
                </div>
                <div class="catselect">
                    <input type="text" placeholder="Enter Username" id="dUsername">
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Email
                </div>
                <div class="catselect">
                    <input type="email" placeholder="Enter Email" id="dEmail">
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Mobile
                </div>
                <div class="catselect">
                    <input type="mobile" placeholder="Enter Mobile" id="dMobile">
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Password
                </div>
                <div class="catselect">
                    <input type="password" placeholder="Enter Password" id="dPassword">
                </div>
            </div>
            <div class="formrow">
                <span id='pdstatus' style='font-size:1.3rem; color:#556ee6;'></span>
                <button class='add' onclick='add_neew_dv()'>
                    <i class='fa fa-plus' aria-hidden='true'></i>
                    Add</button>
            </div>
        </div>
    </div>
</div>
<?php
require('require/foot.php');
?>