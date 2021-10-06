<?php
require('../../../../utility/utility.php');
$balance=get_safe_value($con,$_POST['bal']);
$oid=get_safe_value($con,$_POST['oid']);
$sid=get_safe_value($con,$_POST['sid']);
mysqli_query($con,"insert into order_stlmnt(oid,sid,val) values('$oid','$sid','$balance')");
$j=mysqli_fetch_assoc(mysqli_query($con,"select * from orders where id='$oid'"));
$oi_d=$j['o_id'];
$msg=" For ".$oi_d;
$qyery="update seller_wallet set ballance=ballance+'$balance' where seller_id='$sid'";
mysqli_query($con,"insert into seller_w_msg(s_id,cod,msg,balance) values('$sid','1','$msg','$balance')");
mysqli_query($con,$qyery);
?>