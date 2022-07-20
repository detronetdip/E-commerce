<?php
require('require/top.php');
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="seller.php">Sellers</a>
    </div>
    <div class="rowbtn">
        <div class="b">
            <input type="text" placeholder="Search by Name" id="sfield" onkeyup="search('sfield','p_name')" />

        </div>
    </div>
    <div class="catbox-row">
        <div class="catbox">
            <div class="heading">
                <div class="slno">Sl no</div>
                <div class="p_namee">Name</div>
                <div class="p_image">Email</div>
                <div class="p_statuse">Mobile</div>
                <div class="p_action">Action</div>
            </div>
            <div class="bspace" id="sellersecroww">
                <?php
                $query = "select * from delivery_boy order by id desc";
                $res = mysqli_query($con, $query);
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $st = '';
                    $cb = '';
                    $idd = $row['id'];
                ?>
                    <div class="p_row">
                        <div class="slno"><?php echo $i; ?></div>
                        <div class="p_name"><?php echo $row['dv_name']; ?></div>
                        <div class="p_image"><?php echo $row['dv_email']; ?></div>
                        <div class="p_status">
                            <span class="active_span"><?php echo $row['dv_mobile'];; ?></span>
                        </div>
                        <div class="p_action">
                            <button class="edit" onclick="del_dv(<?php echo $row['id']; ?>)">
                                <i class="fa fa-trash" aria-hidden="true"></i>Delete
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