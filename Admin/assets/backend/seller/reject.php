<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $reason=get_safe_value($con,$_POST['reason']);
 $n=2;
 $cp=2;
$q="insert into rejection(s_id,reason) values('$id','$reason')";
mysqli_query($con,$q);
$qyery="update sellers set isapp='$n',is_cp='$cp' where id='$id'";
if(mysqli_query($con,$qyery)){
    echo 1;
}else{
    echo 0;
}
?>