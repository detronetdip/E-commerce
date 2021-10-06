<?php
 require('../../../utility/utility.php');
 $address=get_safe_value($con,$_POST['address']);
 $time=get_safe_value($con,$_POST['time']);
 $time_type=get_safe_value($con,$_POST['time_type']);
 $pay=get_safe_value($con,$_POST['pay']);
 $order_id=get_new_orderid();
 $uid=$_SESSION['USER_ID'];
 $utm=$_SESSION['utm_source'];
 $cart=mysqli_fetch_assoc(mysqli_query($con,"select * from cart where u_id='$uid' and belonging_city='$utm'"));
 $total_amt=$cart['total'];
 $ship=$cart['ship_fee'];
 $final_amt=$cart['final_amt'];
 $is_applied=$cart['is_applied'];
 $promo=$cart['promo'];
 $is_add_w=$cart['is_add_w'];
 $wl_amt=$cart['wl_amt'];
 $txnid= substr(hash('sha256', mt_rand() . microtime()), 0, 20);
 $query="INSERT INTO `orders`(`o_id`, `u_id`, `ad_id`, `dv_date`, `dv_time`, `payment_type`, `payment_status`, `order_status`, `txnid`,`total_amt`, `ship_fee_order`, `final_val`, `isnew`,`is_p_app`,`is_w_ap`,`prmo`,`wlmt`) VALUES ('$order_id','$uid','$address','$time','$time_type','$pay','0','1','$txnid','$total_amt','$ship','$final_amt','1','$is_applied','$is_add_w','$promo','$wl_amt')";
 mysqli_query($con,$query);
 $order=mysqli_fetch_assoc(mysqli_query($con,"select * from orders where u_id='$uid' and o_id='$order_id'"));
 $order_table_id=$order['id'];
 $cart_id=$cart['id'];
 $res=mysqli_query($con,"select * from cart_detail where cart_id='$cart_id'");
 while($row=mysqli_fetch_assoc($res)){
     $pid=$row['p_id'];
     $qty=$row['qty'];
     mysqli_query($con,"insert into order_detail(oid,p_id,qty) values('$order_table_id','$pid','$qty')");
 }
 echo $order_table_id;
?>