<?php
require('../../../../utility/utility.php');
$response=array();
$value=get_safe_value($con,$_POST['oid']);
$seller_id=$_SESSION['SELLER_ID'];
$u=mysqli_fetch_assoc(mysqli_query($con,"select * from seller_wallet where seller_id='$seller_id'"));
$e_a=$u['ballance'];
if($value>$e_a){
    $response['error_code']=0;
    $response['msg']="Invalid Amount";
    $json=json_encode($response);
    echo $json;
}else{
    $q="insert into witdraw_req(s_id,amount_w,amount_r,isnew) values('$seller_id','$e_a','$value','1')";
    mysqli_query($con,$q);
    $response['error_code']=1;
    $response['msg']="Witdraw Requested. Process may take upto 3 days.";
    $msg="Witdraw Requested";
    mysqli_query($con,"insert into seller_w_msg(s_id,cod,msg,balance) values('$seller_id','0','$msg','0')");

    $json=json_encode($response);
    echo $json;
}
?>