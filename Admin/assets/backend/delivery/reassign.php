<?php
require('../../../../utility/utility.php');
$oid=get_safe_value($con,$_POST['oid']);
$f=mysqli_fetch_assoc(mysqli_query($con,"select * from cnfrm_undelivery where od_id='$oid'"));
$db=$f['dv_id'];
mysqli_query($con,"delete from order_time where oid='$oid' and not o_status='2'");
mysqli_query($con,"delete from cnfrm_undelivery where od_id='$oid'");
mysqli_query($con,"insert into assigned_orders(od_id,dv_id) values('$oid','$db')");
mysqli_query($con,"insert into order_time(oid,o_status) values('$oid','3')");
mysqli_query($con,"update orders set order_status='3' where id='$oid'");

?>