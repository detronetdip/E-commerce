<?php
 require('../../../utility/utility.php');
 $result=array();
 $utm=$_SESSION['utm_source'];
 $uid=$_SESSION['USER_ID'];
 $rs=mysqli_query($con,"select * from cart where u_id='$uid' and belonging_city='$utm'");
 $ct=mysqli_fetch_assoc($rs);
 $cid=$ct['id'];
 $promo=$ct['promo'];
 $promo=$promo+$ct['final_amt'];
 mysqli_query($con,"update cart set is_applied='0',promo='0',final_amt='$promo' where u_id='$uid' and belonging_city='$utm'");
 update_cart($con,$cid);
 $result['status_code']=1;
 $result['msg']="Removed successfully";
 echo json_encode($result);
?>