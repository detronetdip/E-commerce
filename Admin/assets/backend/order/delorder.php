<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
mysqli_query($con,"delete from orders where o_id='$id'");
mysqli_query($con,"delete from order_detail where order_id='$id'");
?>