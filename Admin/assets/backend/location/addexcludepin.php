<?php
require('../../../../utility/utility.php');
$value=get_safe_value($con,$_POST['cntry']);
$cq="select * from expin where pin='$value'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
if($cro==0){
    $qyery="insert into expin(pin) values('$value')";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 3;
}
?>