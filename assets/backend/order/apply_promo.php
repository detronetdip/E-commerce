<?php
 require('../../../utility/utility.php');
 $promo=get_safe_value($con,$_POST['promo']);
 $result=array();
 $res=mysqli_query($con,"select * from promo where code='$promo'");
 $isExists=mysqli_num_rows($res);
 if($isExists==0){
     $result['status_code']=0;
     $result['msg']="Enter a vald promocode";
 }else{
    $row=mysqli_fetch_assoc($res);
    $subcat=$row['scat'];
    $minbal=$row['minbal'];
    $disc=$row['dis'];
    $checkout=get_chekout_products($con);
    $totalPrice=0;
    foreach($checkout as $product){
        if($subcat==$product['scat_id']){
           $totalPrice+=$product['fa']; 
        }
    }
    if($totalPrice!=0){
        if($totalPrice>=$minbal){
            $pcntg=($totalPrice*$disc)/100;
            $pcntg=round($pcntg,2);
            $utm=$_SESSION['utm_source'];
            $uid=$_SESSION['USER_ID'];
            $rs=mysqli_query($con,"select * from cart where u_id='$uid' and belonging_city='$utm'");
            $ct=mysqli_fetch_assoc($rs);
            $cid=$ct['id'];
            if($ct['is_add_w']==1){
                $result['status_code']=0;
                $result['msg']="Promo and wallet can not be used toghether";
            }else{
                mysqli_query($con,"update cart set is_applied='1',promo='$pcntg' where u_id='$uid' and belonging_city='$utm'");
                update_cart($con,$cid);
                $result['status_code']=1;
                $result['msg']="Applied successfully";
            }
        }else{
            $result['status_code']=0;
            $result['msg']="Minimum Balance not satisfied";
        }
    }else{
        $result['status_code']=0;
     $result['msg']="Promo code is not valid for these products";
    }
 }
 echo json_encode($result);
?>