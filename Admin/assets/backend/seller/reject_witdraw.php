<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 mysqli_query($con,"delete from witdraw_req where s_id='$id'");
 $msg="Witdraw Rejected";
 mysqli_query($con,"insert into seller_w_msg(s_id,cod,msg,balance) values('$id','0','$msg','0')");
?>