<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$q="delete from subcategories where id='$id'";
mysqli_query($con,$q);
mysqli_query($con,"delete from commission where scat_id='$id'");
?>