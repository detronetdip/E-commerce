<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $txn=get_safe_value($con,$_POST['txn']);
 $amt=get_safe_value($con,$_POST['amt']);
 $mtd=get_safe_value($con,$_POST['mtd']);
 $row=mysqli_fetch_assoc(mysqli_query($con,"select * from seller_wallet where seller_id='$id'"));
 $current=$row['ballance'];
 $response=array();
 if($mtd==1){
   $finalAmmount=$current+$amt;
   $msg=$txn;
   mysqli_query($con,"update seller_wallet set ballance='$finalAmmount' where seller_id='$id'");
   $date=date("y-m-d");
   mysqli_query($con,"insert into seller_w_msg(s_id,msg,balance,cod) values('$id','$msg','$amt','$mtd')");
   $response['code']=1;
   $response['msg']="Credited successfully";
 }else if($mtd==0){
     if($amt>$current){
        $response['code']=0;
        $response['msg']="In case of debit, amount must be lesser than wallet amount";
     }else{
        $finalAmmount=$current-$amt;
        $msg=$txn;
        mysqli_query($con,"update seller_wallet set ballance='$finalAmmount' where seller_id='$id'");
        $date=date("y-m-d");
        mysqli_query($con,"insert into seller_w_msg(s_id,msg,balance,cod) values('$id','$msg','$amt','$mtd')");
        $response['code']=1;
        $response['msg']="Debited successfully";
     }
 }
 echo json_encode($response);
?>