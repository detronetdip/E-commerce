<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $reason=get_safe_value($con,$_POST['reason']);
 $n=2;
 $cp=2;
    $q="insert into p_reject(product_id,cause) values('$id','$reason')";
    mysqli_query($con,$q);
    $qyery="update product set isappp='$n' where id='$id'";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
?>