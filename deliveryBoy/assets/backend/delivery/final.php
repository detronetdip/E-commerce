<?php
require('../../../../utility/utility.php');
$oid=get_safe_value($con,$_POST['oid']);
$pid=get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
mysqli_query($con,"update order_detail set delivered_qty='$qty' where oid='$oid' and p_id='$pid'");
?>