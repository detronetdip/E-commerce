<?php
 require('../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $uid=$_SESSION['USER_ID'];
 $utm=$_SESSION['utm_source'];
 $res=mysqli_fetch_assoc(mysqli_query($con,"select * from user_address where id='$id'"));
 
 if($res['user_city']==$utm){
     echo 1;
 }else{
     echo 0;
 }
?>