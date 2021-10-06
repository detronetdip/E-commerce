<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $txn=get_safe_value($con,$_POST['txn']);
 $bal=get_safe_value($con,$_POST['bal']);
 $row=mysqli_fetch_assoc(mysqli_query($con,"select * from witdraw_req where s_id='$id'"));
 $current=$row['amount_w'];
 if($bal>$current){
     echo 0;
 }else{
    $now=$current-$bal;
    mysqli_query($con,"update seller_wallet set ballance='$now' where seller_id='$id'");
    $msg="Witdraw approved <br>".$txn;
    mysqli_query($con,"insert into seller_w_msg(s_id,cod,msg,balance) values('$id','0','$msg','$bal')");
    mysqli_query($con,"delete from witdraw_req where s_id='$id'");
    echo 1;
 }
?>