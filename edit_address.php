<?php
require('require/top.php');
authorise_user2();
$userid = $_SESSION['USER_ID'];
if (!isset($_GET['ad-id'])) {
    redirect('address.php');
    die();
}
$id = $_GET['ad-id'];
$query = "select * from user_address where id='$id' and uid='$userid'";
if (mysqli_num_rows(mysqli_query($con, $query)) == 0) {
    redirect('address.php');
    die();
}
$row = mysqli_fetch_assoc(mysqli_query($con, $query));
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="address.php">My Address</a>
        /
        <a href="edit_address.php">Edit Address</a>
    </div>
</div>
<section class="newaddress">
    <?php require('require/headbanner.php'); ?>
    <section class="myac-body">
        <div class="flex row">
            <?php require('require/ac-left.php'); ?>
            <div class="right">
                <h4><i class="uil uil-location-point"></i>Add New Address</h4>
                <div class="col-lg-12 col-md-12">
                    <div class="pdpt-bg">
                        <div class="pdpt-title">
                            <h4>Add Address</h4>
                        </div>

                        <div class="formbody">
                            <form action="javascript:void(0)">
                                <div class="form-group">
                                    <div class="product-radio">
                                        <ul class="product-now">
                                            <li>
                                                <input type="radio" id="ad1" name="address1" <?php if ($row['type_ad'] == "Home") {
                                                                                                    echo "checked";
                                                                                                } ?> value="Home" />
                                                <label for="ad1">Home</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="ad2" name="address1" <?php if ($row['type_ad'] == "Office") {
                                                                                                    echo "checked";
                                                                                                } ?> value="Office" />
                                                <label for="ad2">Office</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="ad3" name="address1" <?php if ($row['type_ad'] == "Other") {
                                                                                                    echo "checked";
                                                                                                } ?> value="Other" />
                                                <label for="ad3">Other</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="address-fieldset">
                                    <div class="row">
                                        <div class="row2">
                                            <div class="lt">
                                                <label for="ft">Name*</label>
                                                <input type="text" placeholder="Name" id="dv-name" value="<?php echo $row['user_name'] ?>""
                                                />
                                            </div>
                                            <div class=" ft">
                                                <label for="ft">Mobile*</label>
                                                <input type="number" placeholder="Number" id="dv-number" oninput="validate_number()" value="<?php echo $row['user_mobile'] ?>" />
                                            </div>
                                        </div>
                                        <label for="ft">City*</label>
                                        <select name="" id="dv-city">
                                            <option value="#">Select City</option>
                                            <?php
                                            $querys = "select * from city order by id desc";
                                            $ress = mysqli_query($con, $querys);
                                            while ($rows = mysqli_fetch_assoc($ress)) {
                                                if ($row['user_city'] == $rows['id']) {
                                            ?>
                                                    <option value="<?php echo $rows['id'] ?>" selected>
                                                        <?php echo $rows['city_name'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $rows['id'] ?>">
                                                        <?php echo $rows['city_name'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="ft">Flat / House / Office No.*</label>
                                        <input type="text" placeholder="Address" id="dv-address" value="<?php echo $row['user_add'] ?>" />
                                        <div class="row2">
                                            <div class="lt">
                                                <label for="ft">Pincode*</label>
                                                <input type="text" placeholder="Pincode" id="dv-pin" value="<?php echo $row['user_pin'] ?>" />
                                            </div>
                                            <div class="ft">
                                                <label for="ft">Landmark*</label>
                                                <input type="text" placeholder="Landmark" id="dv-land" value="<?php echo $row['user_local'] ?>" />
                                            </div>
                                        </div>
                                        <div class="row2">
                                            <button class="save-address" onclick="update_address(<?php echo $id; ?>)">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>