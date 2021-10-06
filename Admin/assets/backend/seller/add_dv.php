<?php
require('../../../../utility/utility.php');
$email=get_safe_value($con,$_POST['email']);
$pass=get_safe_value($con,$_POST['pass']);
$mobile=get_safe_value($con,$_POST['mobile']);
$username=get_safe_value($con,$_POST['username']);
$name=get_safe_value($con,$_POST['name']);
$password=password_hash($pass, PASSWORD_DEFAULT);
$query="select * from delivery_boy where dv_email='$email'";
$res=mysqli_query($con,$query);
$n=mysqli_num_rows($res);
if($n>0){
    $msg="This Email is not available";
    echo $msg;
}else{
    mysqli_query($con,"insert into delivery_boy (dv_password,dv_mobile,dv_email,dv_username,dv_name) values ('$password','$mobile','$email','$username','$name')");
    echo 1;
}
?> 