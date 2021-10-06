<?php
require('../../../../utility/utility.php');
$value=get_safe_value($con,$_POST['cntry']);
$state=get_safe_value($con,$_POST['state']);
$cq="select * from state where state_name='$state' and c_id='$value'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
if($cro==0){
    $qyery="insert into state(c_id,state_name) values('$value','$state')";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 3;
}
?>