<?php
require('require/top.php');
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="incomplete.php">Incomplete Orders</a>
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
                <div class="p_action" style="width: 7rem">Action</div>
            </div>
            <div class="bspace">
                <?php
                $query = "select orders.id,orders.o_id,order_status.o_status from orders,order_status where orders.order_status='1' and orders.order_status=order_status.id order by orders.id desc";
                $res = mysqli_query($con, $query);
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) {

                ?>
                    <div class="p_row">
                        <div class="slno"><?php echo $i;
                                            $i++; ?></div>
                        <div class="p_name"><?php echo $row['o_id']; ?></div>
                        <div class="p_status">
                            <span class="active_span"><?php echo $row['o_status']; ?></span>
                        </div>
                        <div class="p_action" style="width: 7rem">
                            <button class="edit" onclick="delete_order('<?php echo $row['o_id']; ?>')">
                                <i class="fa fa-trash" aria-hidden="true"></i>Delete
                            </button>
                        </div>
                    </div>
                <?php } ?>
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