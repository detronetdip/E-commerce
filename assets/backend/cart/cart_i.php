<?php
 require('../../../utility/utility.php');
 $productid=get_safe_value($con,$_POST['id']);
 $qty=get_safe_value($con,$_POST['cq']);
 $d=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$productid'"));
 $cqty=$d['qty'];
 $result=array();
 if($qty==$cqty){
    $result['msg']="Out of Stock";
    $result['code']=0;
    echo json_encode($result);
 }else{
    if(!isset($_SESSION['USER_LOGIN'])){
        $index=array_search($productid,$_SESSION['USER_CART']);
        $qty++;
    $_SESSION['CART_QTY'][$index]=$qty;
    }else{
        $uid=$_SESSION['USER_ID'];
        $utm=$_SESSION['utm_source'];
        $query= "SELECT cart.belonging_city,cart_detail.id,cart_detail.qty FROM cart,cart_detail WHERE cart.u_id='$uid' AND cart.belonging_city='$utm' and cart_detail.cart_id=cart.id AND cart_detail.p_id='$productid'";
        $h=mysqli_fetch_assoc(mysqli_query($con,$query));
        $fq=$h['qty']+1;
        $d=$h['id'];
        mysqli_query($con,"UPDATE cart_detail SET qty='$fq' WHERE id='$d'");
        $ih=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM cart WHERE u_id='$uid' AND belonging_city='$utm'"));
        update_cart($con,$ih['id']);
    }
    $result['msg']="Added to Cart";
    $result['code']=1;
    echo json_encode($result);
 }
?>