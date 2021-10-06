<?php
 require('../../../utility/utility.php');
 $oid=get_safe_value($con,$_POST['id']);
 mysqli_query($con,"insert into isue(oid) values('$oid')");
mysqli_query($con,"insert into order_time(oid,o_status) values('$oid','7')");
 mysqli_query($con,"delete from cnfrm_delivery where od_id='$oid'");
 mysqli_query($con,"update orders set order_status='7' where id='$oid'");
?>