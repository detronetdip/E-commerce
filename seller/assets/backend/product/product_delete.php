<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$query="select * from product where id='$id'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
$img1=$row['img1'];
$img2=$row['img2'];
$img3=$row['img3'];
$img4=$row['img4'];
$link1="../../../../media/product/$img1";
$link2="../../../../media/product/$img2";
$link3="../../../../media/product/$img3";
$link4="../../../../media/product/$img4";
unlink($link1);
unlink($link2);
unlink($link3);
unlink($link4);
$q="delete from product where id='$id'";
if(mysqli_query($con,$q)){
    echo 1;
}else{
    echo 0;
}
?>