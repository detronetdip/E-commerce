<?php
 require('../../../utility/utility.php');
 $name=get_safe_value($con,$_POST['name']);
 $mobile=get_safe_value($con,$_POST['mobile']);
 $city=get_safe_value($con,$_POST['city']);
 $address=get_safe_value($con,$_POST['address']);
 $pin=get_safe_value($con,$_POST['pin']);
 $locality=get_safe_value($con,$_POST['landmark']);
 $type=get_safe_value($con,$_POST['type']);
 $uid=$_SESSION['USER_ID'];
 $query="insert into user_address(uid,type_ad,user_name,user_mobile,user_city,user_add,user_pin,user_local) values('$uid','$type','$name','$mobile','$city','$address','$pin','$locality')";
 mysqli_query($con,$query);
?>