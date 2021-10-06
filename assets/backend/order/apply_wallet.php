<?php
 require('../../../utility/utility.php');
 $promo=get_safe_value($con,$_POST['promo']);
 $result=array();
 $uid=$_SESSION['USER_ID'];
 $res=mysqli_query($con,"select * from user_wallet where user_id='$uid'");
 $wt=mysqli_fetch_assoc($res);
 $d=mysqli_fetch_assoc($res);
 if($wt['ballance']==0){
     $result['status_code']=0;
     $result['msg']="Wallet ballance is 0";
 }else{
    $utm=$_SESSION['utm_source'];
    $uid=$_SESSION['USER_ID'];
    $rs=mysqli_query($con,"select * from cart where u_id='$uid' and belonging_city='$utm'");
    $ct=mysqli_fetch_assoc($rs);
    $cid=$ct['id'];
    if($ct['is_applied']==1){
        $result['status_code']=0;
     $result['msg']="Promo and wallet can not be used toghether";
    }else{
        $wallet=$wt['ballance'];
        $carttotal=$ct['final_amt'];
        if($carttotal>$wallet){
            $wlamt=$wallet;
        }else if($carttotal<=$wallet){
            $wlamt=$carttotal-1;
        }
        $utm=$_SESSION['utm_source'];
        $uid=$_SESSION['USER_ID'];
        mysqli_query($con,"update cart set is_add_w='1',wl_amt='$wlamt' where u_id='$uid' and belonging_city='$utm'");
        update_cart($con,$cid);
        $msg="Used in purchase";
        $ghj=$wallet-$wlamt;
        mysqli_query($con,"insert into user_w_msg(u_id,cod,msg,balance,is_new) values ('$uid','0','$msg','$wlamt','1')");
        mysqli_query($con,"update user_wallet set ballance='$ghj' where user_id='$uid'");
        $result['status_code']=0;
        $result['msg']="Applied";
    }
 }
 echo json_encode($result);
?>