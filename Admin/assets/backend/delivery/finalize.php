<?php
require('../../../../utility/utility.php');
$oid=get_safe_value($con,$_POST['oid']);
mysqli_query($con,"update orders set ptu='1' where id='$oid'");
?>