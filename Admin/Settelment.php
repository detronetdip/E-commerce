<?php require('require/top.php'); ?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="allorder.php">Orders</a>
        <span>/</span>
        <a href="Settelment.php">Settelment</a>
    </div>
    <div class="rowbtn">
        <div class="b">
            <input type="text" placeholder="Search by Order Id" id="sfield" onkeyup="search('sfield','p_name')" />
        </div>
    </div>
    <div class="catbox-row">
        <div class="catbox">
            <div class="heading">
                <div class="slno">Sl no</div>
                <div class="p_namee">Order Id</div>
                <div class="p_status">Status</div>
                <div class="date">Date</div>
                <div class="p_action" style="width: 7rem">Action</div>
            </div>
            <div class="bspace">
                <?php
                $sid = $_SESSION['ID'];
                $query = "select * from orders order by id desc";
                $res = mysqli_query($con, $query);
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $oid = $row['o_id'];
                    $innerres = mysqli_query($con, "select * from order_detail where order_id='$oid' and status='Delivered' and stlment='0' and clearence='1'");
                    $tw = mysqli_fetch_assoc($innerres);
                    if (mysqli_num_rows($innerres) > 0) {

                ?>
                        <div class="p_row">
                            <div class="slno"><?php echo $i;
                                                $i++; ?></div>
                            <div class="p_name"><?php echo $row['o_id']; ?></div>
                            <div class="p_status">
                                <span class="active_span"><?php echo "Delivered"; ?></span>
                            </div>
                            <div class="date"><?php echo $row['added_on']; ?></div>
                            <div class="p_action" style="width: 7rem">
                                <button class="edit" onclick="redirect_to('settelmentDetail.php?id=<?php echo $row['o_id']; ?>')">
                                    <i class="fa fa-wifi" aria-hidden="true"></i>View
                                </button>
                            </div>
                        </div>
                <?php }
                } ?>
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
<?php require('require/foot.php'); ?>