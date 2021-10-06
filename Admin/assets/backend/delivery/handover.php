<?php
require('../../../../utility/utility.php');
$oid=get_safe_value($con,$_POST['oid']);
$pid=get_safe_value($con,$_POST['pid']);
mysqli_query($con,"update order_detail set hover='1' where oid='$oid' and p_id='$pid'");
?>