<?php
require('require/top.php');
if (isset($_POST['submit'])) {
    $id = get_safe_value($con, $_POST['sfield']);
    $to = get_safe_value($con, $_POST['sfield2']);
    if ($id == '' && $to == '') {
?>
        <script>
            alert("Enter value")
        </script>
<?php
    } else {

        mysqli_query($con, "INSERT INTO `dv_time`(`from`, `tto`) VALUES ('$id','$to')");
    }
}
?>
<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="filters.php">Filter</a>
    </div>
    <div class="rowbtn">
        <div class="b" style="display:flex;flex-direction:column;padding:3rem 2rem">
            <form action="ad_dv_time.php" method="post">
                <label for="sfield" style="font-size:1.2rem">From</label>
                <input type="time" placeholder="Enter Filter Name" name="sfield" style="width:98.5%;margin:1rem 0;" />
                <label for="sfields" style="font-size:1.2rem">To</label>
                <input type="time" placeholder="Enter Filter Name" name="sfield2" style="width:98.5%;margin:1rem 0;" />
                <input type="submit" value="Submit" name="submit">
            </form>
            <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
        </div>
    </div>

    <div class="rowbtn" style="margin:3rem 0 0 0;" id="filterlist">
        <div class="b" style="display:flex;flex-direction:column;padding:3rem 2rem">
            <div class="row" style="height:3rem; display:flex;justify-content:space-between;">
                <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
                    Slno
                </div>
                <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
                    Time
                </div>
                <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
                    Action
                </div>
            </div>
        </div>
        <?php
        $query2 = "select * from dv_time";
        $res2 = mysqli_query($con, $query2);
        $i = 1;
        while ($rowt = mysqli_fetch_assoc($res2)) {
        ?>
            <div class="b" style="display:flex;flex-direction:column;padding:0.4rem 2rem">
                <div class="row" style="height:3rem; display:flex;justify-content:space-between;">
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                        <?php echo $i; ?>
                    </div>
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                        <?php echo $rowt['from']; ?> -&nbsp;<?php echo $rowt['tto']; ?>
                    </div>
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                        <i class="fa fa-trash" aria-hidden="true" onclick="deletedvtime(<?php echo $rowt['id']; ?>)"></i>
                    </div>
                </div>
            </div>
        <?php $i++;
        } ?>
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