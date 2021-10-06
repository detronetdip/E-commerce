<?php
  require('../../../../utility/utility.php');
  $username=get_safe_value($con,$_POST['username']);
  $password=get_safe_value($con,$_POST['password']);
  $q="select * from delivery_boy where dv_email='$username'";
  $q2="select * from delivery_boy where dv_mobile='$username'";
  $q3="select * from delivery_boy where dv_username='$username'";
    $rs=mysqli_query($con,$q);
    $rs2=mysqli_query($con,$q2);
    $rs3=mysqli_query($con,$q3);
    $nor=mysqli_num_rows($rs);
    $nor2=mysqli_num_rows($rs2);
    $nor3=mysqli_num_rows($rs3);
    $result=array();
    if ($password == "") {
        $result['status']=0;
        $result['msg']="Enter Password";
      } else if ($username == "") {
        $result['status']=0;
        $result['msg']="Enter Username";
      }else if($nor==0 && $nor2==0 && $nor3==0){
        $result['status']=0;
        $result['msg']="Invalid Credentials";
    }else{
        if($nor>0){
            $rs=$rs;
        }else if($nor2>0){
            $rs=$rs2;
        }else{
            $rs=$rs3;
        }
        $row=mysqli_fetch_assoc($rs);
        $dps=$row['dv_password'];
        $verify = password_verify($password, $dps);
        if ($verify) {
            $_SESSION['DELIVERY_LOGIN']="YES";
            $_SESSION['DELIVERY_ID']=$row['id'];
            $result['status']=1;
            $result['msg']="Login Successfull";
        } else {
            $result['status']=2;
            $result['msg']="Something Went Wrong";
        }
    }
    echo json_encode($result);
?>