<?php
require('../../../../utility/utility.php');
$oid=get_safe_value($con,$_POST['oid']);
$val=get_safe_value($con,$_POST['val']);
$f=mysqli_fetch_assoc(mysqli_query("select * from orders where id='$oid'"));
$pt=$f['payment_type'];
$pricei=$f['o_id'];
$uid=$f['u_id'];
if($pt==2){
    $msg="Refund for ".$pricei;
    mysqli_query($con,"insert into user_w_msg(u_id,cod,msg,balance,is_new) values ('$uid','1','$msg','$val','1')");
     mysqli_query($con,"update user_wallet set ballance=ballance+'$val' where user_id='$uid'");
}
mysqli_query($con,"update orders set ptu='1' where id='$oid'");
?>