<?php
require('../../../../utility/utility.php');
$value=get_safe_value($con,$_POST['cntry']);
$state=get_safe_value($con,$_POST['state']);
$city=get_safe_value($con,$_POST['city']);
$cq="select * from city where s_id='$state' and city_name='$city'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
if($cro==0){
    $qyery="insert into city(s_id,c_id,city_name) values('$state','$value','$city')";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 3;
}
?>