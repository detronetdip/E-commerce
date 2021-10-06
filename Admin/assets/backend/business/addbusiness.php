<?php
require('../../../../utility/utility.php');
$subcat=get_safe_value($con,$_POST['bstype']);
$cq="select * from business_type where type='$subcat'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
if($cro==0){
    $qyery="insert into business_type(type) values('$subcat')";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 3;
}
?>