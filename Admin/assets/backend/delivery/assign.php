<?php
require('../../../../utility/utility.php');
$oid=get_safe_value($con,$_POST['oid']);
$db=get_safe_value($con,$_POST['dboy']);
mysqli_query($con,"insert into assigned_orders(od_id,dv_id) values('$oid','$db')");
mysqli_query($con,"insert into order_time(oid,o_status) values('$oid','3')");
mysqli_query($con,"update orders set order_status='3' where id='$oid'");

?>