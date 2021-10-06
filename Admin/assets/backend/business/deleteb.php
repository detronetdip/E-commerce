<?php 
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 mysqli_query($con,"delete from business_type where id='$id'");
?>