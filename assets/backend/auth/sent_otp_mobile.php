<?php
    require('../../../utility/utility.php');
    $otp=OTP($con);
    $_SESSION['OTP']=$otp;
    echo $otp;
?>