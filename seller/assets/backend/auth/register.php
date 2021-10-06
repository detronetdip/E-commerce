<?php
  require('../../../../utility/utility.php');
  $email=get_safe_value($con,$_POST['email']);
  $password=get_safe_value($con,$_POST['password']);
  $mobile=get_safe_value($con,$_POST['mobile']);
  $q="select * from sellers where email='$email' and status='1'";
  $result=array();
if ($password == "") {
    $result['status']=0;
    $result['msg']="Enter Password";
  } else if ($email == "") {
    $result['status']=0;
    $result['msg']="Enter Email";
  } else if ($mobile == "") {
    $result['status']=0;
    $result['msg']="Enter Mobile";
  } else {

$query="select * from sellers where email='$email'";
$res=mysqli_query($con,$query);
$n=mysqli_num_rows($res);
if($n>0){
    $result['status']=0;
    $result['msg']="Email is not available";
}else{
  $password=password_hash($password, PASSWORD_DEFAULT);
    $q="insert into sellers(password,mobile,email,status,is_new) values('$password','$mobile','$email','1','1')";
    if(mysqli_query($con,$q)){
        $row=mysqli_fetch_assoc(mysqli_query($con,"select * from sellers where mobile='$mobile' and email='$email'"));
        $_SESSION['SELLER_LOGIN']="YES";
        $_SESSION['SELLER_ID']=$row['id'];
        $result['status']=1;
        $result['msg']="Account Created Successfully";
    }else{
            $result['status']=0;
            $result['msg']="Something Went Wrong";
    }
}
  }
    echo json_encode($result);
?>