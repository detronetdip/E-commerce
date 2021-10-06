<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$cid=get_safe_value($con,$_POST['cid']);
$cname=get_safe_value($con,$_POST['couriername']);
mysqli_query($con,"update order_detail set status='Shipped',shipping_id='$cid',ship_name='$cname' where id='$id'");
?>