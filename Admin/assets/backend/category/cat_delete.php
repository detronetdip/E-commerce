<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$q="delete from categories where id='$id'";
$res=mysqli_query($con,"select * from subcategories where cat_id='$id'");
while($r=mysqli_fetch_assoc($res)){
    $sid=$r['id'];
    mysqli_query($con,"delete from commission where scat_id='$sid'");
    $res2=mysqli_query($con,"select * from filter where subcat_id='$sid'");
    while($r2=mysqli_fetch_assoc($res2)){
        $fid=$r2['id'];
        mysqli_query($con,"delete from sub_filter where filter_id='$sid'");
    }
    mysqli_query($con,"delete from filter where subcat_id='$sid'");
}
mysqli_query($con,"delete from subcategories where cat_id='$id'");
if(mysqli_query($con,$q)){
    echo 1;
}else{
    echo 0;
}
?>