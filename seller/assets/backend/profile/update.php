<?php
 require('../../../../utility/utility.php');
 $fullname=get_safe_value($con,$_POST['fullname']);
 $type=get_safe_value($con,$_POST['type']);
 $bname=get_safe_value($con,$_POST['bname']);
 $cntry=get_safe_value($con,$_POST['cntry']);
 $state=get_safe_value($con,$_POST['state']);
 $city=get_safe_value($con,$_POST['city']);
 $pin=get_safe_value($con,$_POST['pin']);
 $is_gst=get_safe_value($con,$_POST['is_gst']);
 $gstnum=get_safe_value($con,$_POST['gstnum']);
 $acn=get_safe_value($con,$_POST['acn']);
 $ach=get_safe_value($con,$_POST['ach']);
 $bank=get_safe_value($con,$_POST['bank']);
 $branch=get_safe_value($con,$_POST['branch']);
 $ifsc=get_safe_value($con,$_POST['ifsc']);
 $email=get_safe_value($con,$_POST['email']);
 $mobile=get_safe_value($con,$_POST['mobile']);
 $address=get_safe_value($con,$_POST['address']);
 $id=$_SESSION['SELLER_ID'];
 $j=mysqli_fetch_assoc(mysqli_query($con,"select * from sellers where id='$id'"));
 $q="update sellers set email='$email',mobile='$mobile',address='$address',f_name='$fullname',tob='$type',b_name='$bname',country='$cntry',state='$state',city='$city',pin='$pin',is_gst='$is_gst',gst_id='$gstnum',acc_num='$acn',acc_holder='$ach',bank='$bank',branch='$branch',ifsc='$ifsc' where id='$id'";
 if(mysqli_query($con,$q)){
     echo 1;
 }else{
     echo 0;
 }
 ?>