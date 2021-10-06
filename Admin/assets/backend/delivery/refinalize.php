<?php
require('../../../../utility/utility.php');
$oid=get_safe_value($con,$_POST['oid']);
mysqli_query($con,"delete from cnfrm_undelivery where od_id='$oid'");
$f=mysqli_fetch_assoc(mysqli_query($con,"select * from orders where id='$oid'"));
if($f['payment_type']==2){
   $uid=$f['u_id'];
   $price=$f['final_val']; 
   $pricei=$f['o_id']; 
    $row=mysqli_fetch_assoc(mysqli_query($con,"select * from user_wallet where user_id='$uid'"));
    $current=$row['ballance'];
    $now=$current+$price;
    $msg="Refund for ".$pricei;
 mysqli_query($con,"insert into user_w_msg(u_id,cod,msg,balance,is_new) values ('$uid','1','$msg','$price','1')");
 mysqli_query($con,"update orders set udvc='1' where id='$oid'");
 mysqli_query($con,"update user_wallet set ballance='$now' where user_id='$uid'");
}
?>