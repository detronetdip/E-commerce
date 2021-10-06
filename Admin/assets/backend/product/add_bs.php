<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $bs=get_safe_value($con,$_POST['val']);
 mysqli_query($con,"update product set bs='$bs' where id='$id'");
?>