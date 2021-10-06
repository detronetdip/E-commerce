<?php
require('../../../../utility/utility.php');
$email=get_safe_value($con,$_POST['email']);
$pass=get_safe_value($con,$_POST['pass']);
$mobile=get_safe_value($con,$_POST['mobile']);
$password=password_hash($pass, PASSWORD_DEFAULT);
$query="select * from sellers where email='$email'";
$res=mysqli_query($con,$query);
$n=mysqli_num_rows($res);
if($n>0){
    $msg="This Email is not available";
    echo $msg;
}else{
    mysqli_query($con,"insert into sellers (password,mobile,email,status,is_new) values ('$password','$mobile','$email','1','1')");
    
    echo 1;
}
?> 