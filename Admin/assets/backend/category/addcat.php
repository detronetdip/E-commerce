<?php
require('../../../../utility/utility.php');
$value=get_safe_value($con,$_POST['name']);
$status=1;
$cq="select * from categories where category='$value'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
if($cro==0){
    $qyery="insert into categories(category,status) values('$value','$status')";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 3;
}
?>