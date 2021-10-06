<?php
require('../../../../utility/utility.php');
$response=array();
$scat=get_safe_value($con,$_POST['scat']);
$code=get_safe_value($con,$_POST['code']);
$minbal=get_safe_value($con,$_POST['minbal']);
$disc=get_safe_value($con,$_POST['disc']);
$seller_id=$_SESSION['SELLER_ID'];
$u=mysqli_num_rows(mysqli_query($con,"select * from promo where adb='$seller_id' and code='$code'"));
if($u>0){
    $response['error_code']=0;
    $response['msg']="Code Already Exists";
    $json=json_encode($response);
    echo $json;
}else{
    $q="insert into promo(code,dis,minbal,scat,adb) values('$code','$disc','$minbal','$scat','$seller_id')";
    mysqli_query($con,$q);
    $response['error_code']=1;
    $response['msg']="Added Successfully";
    $json=json_encode($response);
    echo $json;
}
?>