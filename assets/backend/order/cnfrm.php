<?php
 require('../../../utility/utility.php');
 $oid=get_safe_value($con,$_POST['id']);
 mysqli_query($con,"delete from cnfrm_delivery where od_id='$oid'");
mysqli_query($con,"update orders set u_cnfrm='1' where id='$oid'");
?>