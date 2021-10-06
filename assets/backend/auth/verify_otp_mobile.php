<?php
    require('../../../utility/utility.php');
    $otp=get_safe_value($con,$_POST['id']);
    $mobile=get_safe_value($con,$_POST['mobile']);
    $s_otp=$_SESSION['OTP'];
    $result=array();
    if($s_otp==$otp){
        unset($_SESSION['OTP']);
        $uid=$_SESSION['USER_ID'];
        mysqli_query($con,"update users set m_vfd='1',mobile='$mobile' where id='$uid'");
        $result['res']=1;
        $result['msg']="Mobile Verified";
        $JSON = json_encode($result);
        echo $JSON;
    }else{
        $result['res']=0;
        $result['msg']="Enter Correct OTP";
        $JSON = json_encode($result);
        echo $JSON;
    }
?>