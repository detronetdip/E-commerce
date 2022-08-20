<?php
require('require/top.php');
?>
<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="categories.php">Categories</a><span> /</span>
        <a href="sub-cat.php">Sub-Categories</a>
    </div>
    <div class="rowbtn">
        <div class="b">
            <button class="add" onclick="showadsctfa()">
                <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add
            </button>
            <input type="text" placeholder="Search by Category" id="sfield" onkeyup="search('sfield','catname')" />
        </div>
    </div>
    <div class="catbox-row">
        <div class="catbox">
            <div class="heading">
                <div class="sl">SL no</div>
                <div class="catnameh">Sub Category</div>
                <div class="nos">Main Category</div>
                <div class="nos">Comission</div>
                <div class="status">
                    <span class="active_span">Status</span>
                </div>
                <div class="action">Action</div>
            </div>
            <div class="bspace" id="subcatrows">
                <?php
                $query = "select * from subcategories order by id desc";

                $res = mysqli_query($con, $query);
                $i = 1;
                $template = '';
                while ($row = mysqli_fetch_assoc($res)) {
                    $st = '';
                    $cb = '';
                    $idd = $row['id'];
                    $scat = $row['id'];
                    $query2 = "select * from commission where scat_id='$scat'";
                    $res2 = mysqli_query($con, $query2);
                    $rowt = mysqli_fetch_assoc($res2);
                    $cmsn = $rowt['com'];
                    if ($row['status'] == 1) {
                        $st = "Active";
                        $cb = "<button class='deactive' onclick='subcat_acdc($idd, 0)'>
                  <i class='fa fa-eye-slash' aria-hidden='true'></i>Deactive
                </button>";
                    } else {
                        $st = "Deactive";
                        $cb = "
                <button class='active' onclick='subcat_acdc($idd, 1)'>
                <i class='fa fa-eye' aria-hidden='true'></i>Active
                </button>
                ";
                    }
                    $id = $row['id'];
                    $name = $row['subcat'];
                    $pcat = $row['cat_id'];
                    $h = mysqli_fetch_assoc(mysqli_query($con, "select * from categories where id='$pcat'"));
                    $pcat = $h['category'];
                    $template = $template . "
<div class='detailrow'>
<div class='sl'>  $i </div>
<div class='catname'> $name</div>
<div class='nos'> $pcat </div>
<div class='nos'>$cmsn%</div>
<div class='status'>
  <span class='active_span'>
  $st
  </span>
</div>
<div class='action'>
  <button class='edit' onclick='editsubcat($id)'>
    <i class='fa fa-pen' aria-hidden='true'></i>Edit
  </button>
  $cb
  <button class='delete' onclick='subcatdelete($id)'>
    <i class='fa fa-trash' aria-hidden='true'></i>Delete
  </button>
</div>
</div>
";
                    $i++;
                }
                echo $template;
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