<?php
 require('../../../utility/utility.php');
 $name=get_safe_value($con,$_POST['name']);
 $mobile=get_safe_value($con,$_POST['mobile']);
 $city=get_safe_value($con,$_POST['city']);
 $address=get_safe_value($con,$_POST['address']);
 $pin=get_safe_value($con,$_POST['pin']);
 $locality=get_safe_value($con,$_POST['landmark']);
 $type=get_safe_value($con,$_POST['type']);
 $id=get_safe_value($con,$_POST['id']);
 $query="update user_address set type_ad='$type',user_name='$name',user_mobile='$mobile',user_city='$city',user_add='$address',user_pin='$pin',user_local='$locality'  where id='$id'";
 mysqli_query($con,$query);

?>