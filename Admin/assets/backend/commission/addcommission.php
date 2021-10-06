<?php
require('../../../../utility/utility.php');
$value=get_safe_value($con,$_POST['com']);
$subcat=get_safe_value($con,$_POST['subcat']);
$cq="select * from commission where com='$value' and scat_id='$subcat'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
if($cro==0){
    $qyery="insert into commission(com,scat_id) values('$value','$subcat')";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 3;
}
?>