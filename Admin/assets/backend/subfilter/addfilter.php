<?php
require('../../../../utility/utility.php');
$value=get_safe_value($con,$_POST['filter']);
$subcat=get_safe_value($con,$_POST['subcat']);
$cq="select * from sub_filter where subfilter='$value'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
if($cro==0){
    $qyery="insert into sub_filter(filter_id,subfilter) values('$subcat','$value')";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 3;
}
?>