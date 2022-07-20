<?php
require('require/top.php');
$q = "select * from product where isappp='0'";
$r = mysqli_query($con, $q);
while ($g = mysqli_fetch_assoc($r)) {
    $ids = $g['id'];
    mysqli_query($con, "update product set isnew='0' where id='$ids'");
}
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="productapprove.php">Product Approve</a>
    </div>
    <div class="rowbtn">
        <div class="b">
            <input type="text" placeholder="Search by Name" id="sfield" onkeyup="search('sfield','p_name')" />
            <div style="display:none;width:0rem;transition:0.8s;" id="reasonbox">
                <input type="text" placeholder="Enter Reason" id="sfield2" />
                <button style="background:#556ee6;color:white;padding:0 0.5rem;margin-left:0.8rem;border-radius:5px;">Submit</button>
            </div>
        </div>
    </div>
    <div class="catbox-row">
        <div class="catbox">
            <div class="heading">
                <div class="slno">Sl no</div>
                <div class="p_image">Image</div>
                <div class="p_namee">Name</div>
                <div class="p_status">Status</div>
                <div class="p_action">Action</div>
            </div>
            <div class="bspace" id="productsecrow">
                <?php
                $query = "select * from product where isappp='0' order by id desc";
                $res = mysqli_query($con, $query);
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $st = '';
                    $cb = '';
                    $idd = $row['id'];
                    if ($row['status'] == 1) {
                        $st = "Active";
                        $cb = "<button class='deactive' onclick='product_acdc($idd, 0)'>
              <i class='fa fa-eye-slash' aria-hidden='true'></i>Deactive
            </button>";
                    } else {
                        $st = "Deactive";
                        $cb = "
            <button class='active' onclick='product_acdc($idd, 1)'>
            <i class='fa fa-eye' aria-hidden='true'></i>Active
          </button>
            ";
                    }
                ?>
                    <div class="p_row">
                        <div class="slno"><?php echo $i; ?></div>
                        <div class="p_image">
                            <img src="../media/product/<?php echo $row['img1']; ?>" alt="product" />
                        </div>
                        <div class="p_name"><?php echo $row['product_name']; ?> </div>
                        <div class="p_status">
                            <span class="active_span" style="color: red">Pending</span>
                        </div>
                        <div class="p_action">
                            <button class="edit" onclick="showdetailproduct(<?php echo $row['id']; ?>)">
                                <i class="fa fa-wifi" aria-hidden="true"></i>View
                            </button>
                            <button class="active" onclick="approve_product(<?php echo $row['id']; ?>)">
                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>Approve
                            </button>
                            <button class="delete" onclick="reject_product(<?php echo $row['id']; ?>)">
                                <i class="fa fa-times" aria-hidden="true"></i>Reject
                            </button>
                        </div>
                    </div>
                <?php
                    $i++;
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row" style="
              display: block;
              margin-bottom: 2rem;
              font-size: 1.2rem;
              color: #6a7187;
            ">
        @ Developed by Ayondip Jana
    </div>
</div>
<?php
require('require/foot.php');
?>