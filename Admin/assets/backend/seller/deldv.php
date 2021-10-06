<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
    $qyery="delete from delivery_boy where id='$id'";
    mysqli_query($con,$qyery);
?>