<?php
    require('../../../utility/utility.php');
    $otp=get_safe_value($con,$_POST['id']);
    $email=get_safe_value($con,$_POST['email']);
    $s_otp=$_SESSION['OTP'];
    $result=array();
    if($s_otp==$otp){
        unset($_SESSION['OTP']);
        $uid=$_SESSION['USER_ID'];
        mysqli_query($con,"update users set e_vfd='1',email='$email' where id='$uid'");
        $result['res']=1;
        $result['msg']="Email Verified";
        $JSON = json_encode($result);
        echo $JSON;
    }else{
        $result['res']=0;
        $result['msg']="Enter Correct OTP";
        $JSON = json_encode($result);
        echo $JSON;
    }
?>