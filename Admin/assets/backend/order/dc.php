<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['first']);
mysqli_query($con,"delete from dv_time where id='$id'");
?>