<?php
 require('../../../utility/utility.php');
 $productid=get_safe_value($con,$_POST['id']);
 $qty=get_safe_value($con,$_POST['cq']);
 if(!isset($_SESSION['USER_LOGIN'])){
    $index=array_search($productid,$_SESSION['USER_CART']);
    $qty--;
    $_SESSION['CART_QTY'][$index]=$qty;
 }else{
    $uid=$_SESSION['USER_ID'];
    $utm=$_SESSION['utm_source'];
    $query= "SELECT cart.belonging_city,cart_detail.id,cart_detail.qty FROM cart,cart_detail WHERE cart.u_id='$uid' AND cart.belonging_city='$utm' and cart_detail.cart_id=cart.id AND cart_detail.p_id='$productid'";
    $h=mysqli_fetch_assoc(mysqli_query($con,$query));
    $fq=$h['qty']-1;
    $d=$h['id'];
    mysqli_query($con,"UPDATE cart_detail SET qty='$fq' WHERE id='$d'");
    $ih=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM cart WHERE u_id='$uid' AND belonging_city='$utm'"));
    update_cart($con,$ih['id']);
 }
?>