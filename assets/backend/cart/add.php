<?php
 require('../../../utility/utility.php');
 $productid=get_safe_value($con,$_POST['id']);
 $qty=get_safe_value($con,$_POST['qty']);
 $d=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$productid'"));
 $cqty=$d['qty'];
 $result=array();
 if($qty>$cqty){
    $result['msg']="Out of Stock";
    $result['code']=0;
    echo json_encode($result);
 }else{
 if(!isset($_SESSION['USER_LOGIN'])){
    if(!isset($_SESSION['USER_CART'])){
        $_SESSION['USER_CART']=array();
        $_SESSION['CART_QTY']=array();
        array_push($_SESSION['USER_CART'],$productid);
        array_push($_SESSION['CART_QTY'],$qty);
    }else{
        if(!in_array($productid,$_SESSION['USER_CART'])){
            array_push($_SESSION['USER_CART'],$productid);
            array_push($_SESSION['CART_QTY'],$qty);
        }
    }
 }else{
    $u_id=$_SESSION['USER_ID'];
    $utm=$_SESSION['utm_source'];
    $res=mysqli_query($con,"select * from cart where u_id='$u_id' and belonging_city='$utm'");
    $count=mysqli_num_rows($res);
    if($count>0){
        $f=mysqli_fetch_assoc($res);
        $cart_id=$f['id'];
        mysqli_query($con,"insert into cart_detail(cart_id,p_id,qty) values('$cart_id','$productid','$qty')");
        update_cart($con,$cart_id);
    }else{
        $query="insert into cart(u_id,belonging_city) values('$u_id','$utm')";
        mysqli_query($con,$query);
        $f=mysqli_fetch_assoc(mysqli_query($con,"select * from cart where u_id='$u_id' and belonging_city='$utm'"));
        $cart_id=$f['id'];
        $pd=product_detail($con,$productid);
        $ta=$pd['fa']*$qty;
        mysqli_query($con,"insert into cart_detail(cart_id,p_id,qty) values('$cart_id','$productid','$qty')");
        update_cart($con,$cart_id);
    }
 }
 $result['msg']="Added to Cart";
 $result['code']=1;
 echo json_encode($result);
}
?>