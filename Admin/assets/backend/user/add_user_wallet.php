<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$value=get_safe_value($con,$_POST['tp']);
$row2=mysqli_fetch_assoc(mysqli_query($con,"select order_detail.order_id,orders.u_id from order_detail,orders where order_detail.id='$id' and orders.o_id=order_detail.order_id"));
$uid=$row2['u_id'];
$oid=$row2['order_id'];
$row=mysqli_fetch_assoc(mysqli_query($con,"select * from user_wallet where uid='$uid'"));
$current=$row['balance'];
 $now=$current+$value;
 echo "update user_wallet set balance='$now' where uid='$uid'";
 mysqli_query($con,"update user_wallet set balance='$now' where uid='$uid'");
 mysqli_query($con,"update order_detail set auw='1' where id='$id'");
 $date=date("y-m-d");
$msg=" &#8377;".$value." Credited";
 mysqli_query($con,"insert into wallet_msg_user(uid,date,msg,ballance,isnew) values ('$uid','$date','$msg','$now','1')");
 $n=mysqli_num_rows(mysqli_query($con,"select * from reforrep where oid='$id'"));
 if($n>0){
    mysqli_query($con,"update reforrep set isdone='1' where oid='$id'");
 }
?>