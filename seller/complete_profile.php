<?php
require("require/top.php");
if (!isset($_GET['hash'])) {
    redirect('index.php');
    die();
}
authorise($con);
authenticate_seller($_GET['hash']);
$rt = 0;
if (isset($_GET['rt'])) {
    $rt = $_GET['rt'];
}
$sid = $_SESSION['SELLER_ID'];
$fullname = '';
$type = '';
$bname = '';
$cntry = '';
$state = '';
$city = '';
$pin = '';
$is_gst = '';
$gstnum = '';
$acn = '';
$ach = '';
$bank = '';
$branch = '';
$ifsc = '';
$b_sc = "../assets/images/product/big-2.jpg";
$g_sc = "../assets/images/product/big-2.jpg";
$a_sc = "../assets/images/product/big-2.jpg";
$p_sc = "../assets/images/product/big-2.jpg";
$query = "select * from sellers where id='$sid'";
$seller_res = mysqli_query($con, $query);
$seller_row = mysqli_fetch_assoc($seller_res);
$is_approve = $seller_row['isapp'];
$cp = $seller_row['is_cp'];
if ($is_approve == 2 && $cp == 2 || isset($_GET['rt'])) {
    $fullname = $seller_row['f_name'];
    $type = $seller_row['tob'];
    $bname = $seller_row['b_name'];
    $cntry = $seller_row['country'];
    $state = $seller_row['state'];
    $city = $seller_row['city'];
    $pin = $seller_row['pin'];
    $is_gst = $seller_row['is_gst'];
    $gstnum = $seller_row['gst_id'];
    $acn = $seller_row['acc_num'];
    $ach = $seller_row['acc_holder'];
    $bank = $seller_row['bank'];
    $branch = $seller_row['branch'];
    $ifsc = $seller_row['ifsc'];
    if (!empty($seller_row['b_crft'])) {
        $b_sc = "../media/seller_profile/" . $seller_row['b_crft'];
    }
    if (!empty($seller_row['gst_crft'])) {
        $g_sc = "../media/seller_profile/" . $seller_row['gst_crft'];
    }
    if (!empty($seller_row['adhar'])) {
        $a_sc = "../media/seller_profile/" . $seller_row['adhar'];
    }
    if (!empty($seller_row['pan'])) {
        $p_sc = "../media/seller_profile/" . $seller_row['pan'];
    }
}
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="complete_profile.php?hash=<?php echo hash_code() ?>">Complete profile</a>
    </div>
</div>
<div class="cartrow" id="catrow">
    <div class="gh">
        <div class="heading">
            <h3>Complete profile</h3>
        </div>
        <div class="maincontainer2">
            <form action="#">
                <h1 style="color:#556ee6" class="mt3">Basic Details</h1>
                <div class="formrow">
                    <div class="heading">Full Name</div>
                    <input type="text" placeholder="Enter Your Full Name" id="seller_full_name" value="<?php echo $fullname; ?>">
                </div>
                <div class="formrow">
                    <div class="heading">Email</div>
                    <input type="email" placeholder="Enter Email Id" id="email" value="<?php echo $seller_row['email']; ?>">
                </div>
                <div class="formrow">
                    <div class="heading">Mobile </div>
                    <input type="text" placeholder="Enter Mobile Number" id="mobile" value="<?php echo $seller_row['mobile']; ?>">
                </div>
                <div class="formrow">
                    <div class="heading">Address </div>
                    <input type="text" placeholder="Enter Mobile Number" id="address" value="<?php echo $seller_row['address']; ?>">
                </div>
                <h1 style="color:#556ee6" class="mt3">Business Details</h1>
                <div class="formrow">
                    <div class="heading">Type</div>
                    <select class="select" name="addscatname" id="seller_b_type">
                        <option value="#">Select Business Type</option>
                        <?php
                        $queryi = "select * from business_type order by id desc";
                        $resi = mysqli_query($con, $queryi);
                        while ($rowi = mysqli_fetch_assoc($resi)) {
                            if ($rowi['id'] == $type) {
                        ?>
                                <option value="<?php echo $rowi['id']; ?>" selected><?php echo $rowi['type']; ?>
                                </option>
                            <?php } else { ?>
                                <option value="<?php echo $rowi['id']; ?>"><?php echo $rowi['type']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="formrow">
                    <div class="heading">Business name</div>
                    <input type="text" placeholder="Enter Your Business Name" id="seller_b_name" value="<?php echo $bname; ?>">
                </div>
                <div class="formrow">
                    <div class="heading">Country</div>
                    <select class="select" id="fsc" onchange="getstatelist()">
                        <option value="#">Select Country</option>
                        <?php
                        $query = "select * from country order by id desc";
                        $res = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($res)) {
                            if ($row['id'] == $cntry) {
                        ?>
                                <option value="<?php echo $row['id']; ?>" selected><?php echo $row['cntry_name']; ?>
                                </option>
                            <?php } else { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['cntry_name']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="formrow">
                    <div class="heading">State</div>
                    <?php if ($state == '') { ?>
                        <select class="select" id="fscb" style="margin:1rem 0 0 0;" onchange="getcitylist()">
                            <option value="#">Select State</option>
                        </select>
                    <?php } else { ?>
                        <select class="select" id="fscb" style="margin:1rem 0 0 0;" onchange="getcitylist()">
                            <?php
                            $querys = "select * from state where c_id='$cntry' order by id desc";
                            $ress = mysqli_query($con, $querys);
                            while ($rows = mysqli_fetch_assoc($ress)) {
                                if ($rows['id'] == $state) {
                            ?>
                                    <option value="<?php echo $rows['id']; ?>" selected><?php echo $rows['state_name']; ?>
                                    </option>
                                <?php } else { ?>
                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['state_name']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    <?php } ?>
                </div>
                <div class="formrow">
                    <div class="heading">City</div>
                    <?php if ($city == '') { ?>
                        <select class="select" id="fscb2" style="margin:1rem 0 0 0;" onchange="getpinlist()">
                            <option value="#">Select City</option>
                        </select>
                    <?php } else { ?>
                        <select class="select" id="fscb2" style="margin:1rem 0 0 0;" onchange="getcitylist()">
                            <?php
                            $querys = "select * from city where s_id='$state' order by id desc";
                            $ress = mysqli_query($con, $querys);
                            while ($rows = mysqli_fetch_assoc($ress)) {
                                if ($rows['id'] == $state) {
                            ?>
                                    <option value="<?php echo $rows['id']; ?>" selected><?php echo $rows['city_name']; ?>
                                    </option>
                                <?php } else { ?>
                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['city_name']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    <?php } ?>
                </div>
                <div class="formrow">
                    <div class="heading">Pincode</div>
                    <?php if ($city == '') { ?>
                        <select class="select" id="fscb3" style="margin:1rem 0 0 0;">
                            <option value="#">Select Pincode</option>
                        </select>
                    <?php } else { ?>
                        <select class="select" id="fscb3" style="margin:1rem 0 0 0;" onchange="getcitylist()">
                            <?php
                            $querys = "select * from pin where c_id='$city' order by id desc";
                            $ress = mysqli_query($con, $querys);
                            while ($rows = mysqli_fetch_assoc($ress)) {
                                if ($rows['id'] == $pin) {
                            ?>
                                    <option value="<?php echo $rows['id']; ?>" selected><?php echo $rows['pincode']; ?>
                                    </option>
                                <?php } else { ?>
                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['pincode']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    <?php } ?>
                </div>
                <div class="formrow">
                    <div class="heading">GST</div>
                    <?php if ($is_gst == '') { ?>
                        <select class="select" name="addscatname" id="isgst" onchange="is_gst()">
                            <option value="#">Select GST</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    <?php } else { ?>

                        <?php if ($is_gst == 1) { ?>
                            <select class="select" name="addscatname" id="isgst" onchange="is_gst()">
                                <option value="1" selected>Yes</option>
                                <option value="2">No</option>
                            </select>
                        <?php } else { ?>
                            <select class="select" name="addscatname" id="isgst" onchange="is_gst()">
                                <option value="1">Yes</option>
                                <option value="2" selected>No</option>
                            </select>
                    <?php }
                    } ?>
                </div>
                <?php if ($is_gst == '' || $is_gst == 2) { ?>
                    <div class="formrow" id='isgst1' style="display:none;">
                        <div class="heading">GST Number</div>
                        <input type="text" placeholder="Enter GST number *" id="seller_gst_num" value="<?php echo $gstnum; ?>" />
                    </div>
                <?php } else if ($is_gst == 1) { ?>
                    <div class="formrow" id='isgst1'>
                        <div class="heading">GST Number</div>
                        <input type="text" placeholder="Enter GST number *" id="seller_gst_num" value="<?php echo $gstnum; ?>" />
                    </div>
                <?php } ?>
                <h1 style="color:#556ee6" class="mt3">Bank Details</h1>
                <div class="formrow">
                    <div class="heading">Account Number</div>
                    <input type="number" placeholder="Enter bank account number *" id="seller_ac" value="<?php echo $acn; ?>" />
                </div>
                <div class="formrow">
                    <div class="heading">Account Holder's Name</div>
                    <input type="text" id="seller_bank_holder" placeholder="Enter account holder's name *" value="<?php echo $ach; ?>" />
                </div>
                <div class="formrow">
                    <div class="heading">Bank Name</div>
                    <input type="text" id="seller_bank_name" placeholder="Enter bank name *" value="<?php echo $bank; ?>" />
                </div>
                <div class="formrow">
                    <div class="heading">Branch Name</div>
                    <input type="text" id="seller_branch_name" placeholder="Enter Branch name *" value="<?php echo $branch; ?>" />
                </div>
                <div class="formrow">
                    <div class="heading">IFSC code</div>
                    <input type="text" id="seller_ifsc" placeholder="Enter IFSC code *" value="<?php echo $ifsc; ?>" />
                </div>

                <h1 style="color:#556ee6" class="mt3">Upload Documents</h1>
                <div class="formrow ig" style="margin-top:3rem">
                    <div class="imgdiv">
                        <div class="img">
                            <img src="<?php echo $a_sc; ?>" alt="" id="preview1" />
                        </div>
                        <div class="file">
                            <label for="seller_adhar">
                                Adhar
                                <input type="file" name="productimage1" id="seller_adhar" onchange="show_preview('preview1','seller_adhar')" />
                            </label>
                        </div>
                    </div>
                    <div class="imgdiv">
                        <div class="img">
                            <img src="<?php echo $p_sc; ?>" alt="" id="preview2" />
                        </div>
                        <div class="file">
                            <label for="seller_pan">
                                Pan
                                <input type="file" name="productimage2" id="seller_pan" onchange="show_preview('preview2','seller_pan')" />
                            </label>
                        </div>
                    </div>
                    <div class="imgdiv">
                        <div class="img">
                            <img src="<?php echo $b_sc; ?>" alt="" id="preview3" />
                        </div>
                        <div class="file">
                            <label for="seller_b_crft">
                                Business Certificate
                                <input type="file" name="productimage3" id="seller_b_crft" onchange="show_preview('preview3','seller_b_crft')" />
                            </label>
                        </div>
                    </div>
                    <?php echo $is_gst;
                    if ($is_gst == '' || $is_gst == 2) { ?>
                        <div class="imgdiv" id="isgst2" style="display:none">
                            <div class="img">
                                <img src="<?php echo $g_sc; ?>" alt="" id="preview4" />
                            </div>
                            <div class="file">
                                <label for="seller_gst_crft">
                                    Gst Proof
                                    <input type="file" name="productimage4" id="seller_gst_crft" onchange="show_preview('preview4','seller_gst_crft')" />
                                </label>
                            </div>
                        </div>
                    <?php } else if ($is_gst == 1) {
                    ?>
                        <div class="imgdiv" id="isgst2">
                            <div class="img">
                                <img src="<?php echo $g_sc; ?>" alt="" id="preview4" />
                            </div>
                            <div class="file">
                                <label for="seller_gst_crft">
                                    Gst Proof
                                    <input type="file" name="productimage4" id="seller_gst_crft" onchange="show_preview('preview4','seller_gst_crft')" />
                                </label>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
                <div class="formrow">
                    <span id="pdstatus" style="color:red; font-size:1.4rem; text-transform:capitalize;">

                    </span>
                </div>
                <div class="formrow">
                    <a href="javascript:void(0)" class="btn d-flex-center-a-j bg-main br-15" onclick="completep(<?php echo $rt; ?>)">
                        <i class="uil uil-plus"></i>
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