<?php
require("require/top.php");
authorise($con);
$sid = $_SESSION['SELLER_ID'];
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="promo.php">Promo</a>
        /
        <a href="add_promo.php">Add promo</a>
    </div>
</div>
<div class="cartrow" id="catrow">
    <div class="gh">
        <div class="heading">
            <h3>Add Promo</h3>
        </div>
        <div class="maincontainer2">

            <form action="#">
                <div class="formrow">
                    <div class="heading">Sub-category</div>
                    <select name="addscatname" id="addscatname">
                        <option value="#">select sub-category</option>
                        <?php

                        $query2 = "select * from subcategories order by id desc";
                        $resi2 = mysqli_query($con, $query2);
                        while ($ropw2 = mysqli_fetch_assoc($resi2)) {
                            $cname2 = $ropw2['subcat'];
                            $cname2i = $ropw2['id'];
                            echo "<option value='$cname2i'>$cname2</option> ";
                        }

                        ?>
                    </select>
                </div>
                <div class="formrow">
                    <div class="heading">Code</div>
                    <input type="text" placeholder="Enter Promo Code" id="promocode">
                </div>
                <div class="formrow">
                    <div class="heading">Discount</div>
                    <input type="number" placeholder="Enter Discount" id="disc">
                </div>
                <div class="formrow">
                    <div class="heading">Min bal</div>
                    <input type="number" placeholder="Enter Min balance" id="minbal">
                </div>
                <div class="formrow">
                    <a href="javascript:void(0)" class="btn d-flex-center-a-j bg-main br-15" onclick="addpromo()">
                        <span>Add</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require("require/foot.php");
?>