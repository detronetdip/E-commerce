<?php
    require('../../../../utility/utility.php');
    $username=get_safe_value($con,$_POST['un']);
    $password=get_safe_value($con,$_POST['up']);
    $q="select * from admin where username='$username'";
    $rs=mysqli_query($con,$q);
    $nor=mysqli_num_rows($rs);
    if($nor==0){
        echo 3;
    }else{
        $row=mysqli_fetch_assoc($rs);
        $dps=$row['password'];
        $verify = password_verify($password, $dps);
        if ($verify) {
            $_SESSION['IS_LOGIN_ADMIN']="YES";
            $_SESSION['PVL_ADMIN']="ADMIN";
            $_SESSION['ADMIN_ID']=$row['id'];
             echo 1;
        } else {
            echo 0;
        }
    }
?>