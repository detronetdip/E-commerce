<?php
require('require/top.php');
$id = $_GET['sid'];
$o = mysqli_fetch_assoc(mysqli_query($con, "select * from seller_wallet where seller_id='$id'"));
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="manual_update.php">Manual Update </a>
    </div>
    <div class="catbox-row">
        <div class="catboxp">
            <h1><?php echo "Manual Update"; ?> </h1>
            <div class="formrow">
                <div class="heading">
                    Wallet Amount
                </div>
                <div class="catselect">
                    <input type="number" placeholder="Enter Email" id="bal" value="<?php echo $o['ballance']; ?>" readonly>
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Choose Methode
                </div>
                <div class="catselect">
                    <select name="" id="mtd" class="select">
                        <option value="#">--Chose Mode--</option>
                        <option value="1">Credit</option>
                        <option value="0">Debit</option>
                    </select>
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Amount
                </div>
                <div class="catselect">
                    <input type="number" placeholder="Enter amount" id="abal">
                </div>
            </div>
            <div class="formrow">
                <div class="heading">
                    Message
                </div>
                <div class="catselect">
                    <textarea name="" id="txn" placeholder="Enter txn Details"></textarea>
                </div>
            </div>
            <div class="formrow">
                <span id='pdstatus' style='font-size:1.3rem; color:#556ee6;'></span>
                <button class='add' onclick="manual_add(<?php echo $id; ?>)">
                    Update</button>
            </div>
        </div>
    </div>
</div>
<?php
require('require/foot.php');
?>