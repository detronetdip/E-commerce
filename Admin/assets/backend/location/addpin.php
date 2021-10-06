<?php
require('../../../../utility/utility.php');
$value=get_safe_value($con,$_POST['cntry']);
$state=get_safe_value($con,$_POST['state']);
$city=get_safe_value($con,$_POST['city']);
$pin=get_safe_value($con,$_POST['pin']);
$cq="select * from pin where pincode='$pin' and cn_id='$value' and s_id='$state' and c_id='$city'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
if($cro==0){
    $qyery="insert into pin(cn_id,s_id,c_id,pincode) values('$value','$state','$city','$pin')";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 3;
}
?>