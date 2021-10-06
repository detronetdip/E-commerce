<?php
require('../../../../utility/utility.php');
$email=get_safe_value($con,$_POST['email']);
$name=get_safe_value($con,$_POST['name']);
$pass=get_safe_value($con,$_POST['pass']);
$mobile=get_safe_value($con,$_POST['mobile']);
$password=password_hash($pass, PASSWORD_DEFAULT);
mysqli_query($con,"insert into users (name,password,email,mobile,status) values ('$name','$password','$email','$mobile','1')");
$y=mysqli_fetch_assoc(mysqli_query($con,"select * from users where email='$email' and mobile='$mobile'"));
$idd=$y['id'];
$msg="Wallet created";
mysqli_query($con,"insert into user_wallet (user_id,ballance) values ('$idd','0')");
mysqli_query($con,"insert into user_w_msg (u_id,cod,msg,balance,is_new) values ('$idd','1','$msg','0','1')");
echo 1;
?>