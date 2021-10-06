<?php
 require('../../../utility/utility.php');
 $result=array();
 $utm=$_SESSION['utm_source'];
 $uid=$_SESSION['USER_ID'];
 $rs=mysqli_query($con,"select * from cart where u_id='$uid' and belonging_city='$utm'");
 $ct=mysqli_fetch_assoc($rs);
 $cid=$ct['id'];
 $promo=$ct['wl_amt'];
 $pm=$promo;
 $promo=$promo+$ct['final_amt'];
 $msg="get form purchase";

 mysqli_query($con,"insert into user_w_msg(u_id,cod,msg,balance,is_new) values ('$uid','1','$msg','$pm','1')");
 mysqli_query($con,"update user_wallet set ballance=ballance+'$pm' where user_id='$uid'");
 mysqli_query($con,"update cart set is_add_w='0',wl_amt='0',final_amt='$promo' where u_id='$uid' and belonging_city='$utm'");
 update_cart($con,$cid);
 $result['status_code']=1;
 $result['msg']="Removed successfully";
 echo json_encode($result);
?>