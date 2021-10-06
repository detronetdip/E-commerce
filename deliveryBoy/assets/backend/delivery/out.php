<?php
require('../../../../utility/utility.php');
$oid=get_safe_value($con,$_POST['oid']);
$did=$_SESSION['DELIVERY_ID'];
mysqli_query($con,"delete from assigned_orders where od_id='$oid' and dv_id='$did'");
mysqli_query($con,"insert into ofd(od_id,dv_id) values('$oid','$did')");
mysqli_query($con,"update orders set order_status='4' where id='$oid'");
mysqli_query($con,"insert into order_time(oid,o_status) values('$oid','4')");
?>