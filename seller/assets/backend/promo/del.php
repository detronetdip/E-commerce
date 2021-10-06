<?php
require('../../../../utility/utility.php');
$response=array();
$id=get_safe_value($con,$_POST['oid']);
$response['error_code']=1;
$response['msg']="Deleted successfully";
mysqli_query($con,"delete from promo where id='$id'");
echo json_encode($response);
?>