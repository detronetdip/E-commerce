<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $n=1;
    $qyery="update product set isappp='$n' where id='$id'";
    if(mysqli_query($con,$qyery)){
        echo 1;
    }else{
        echo 0;
    }
?>