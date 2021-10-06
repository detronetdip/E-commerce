<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
    $qyery="delete from sellers where id='$id'";
    mysqli_query($con,$qyery);
?>