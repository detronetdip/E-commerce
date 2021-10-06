<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['first']);
$id2=get_safe_value($con,$_POST['first2']);
mysqli_query($con,"update dc set dc='$id',pc='$id2' where id='1'");
?>