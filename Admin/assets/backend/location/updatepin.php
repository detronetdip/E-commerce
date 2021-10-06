<?php
    require('../../../../utility/utility.php');
    $id=get_safe_value($con,$_POST['id']);
    $name=get_safe_value($con,$_POST['cntry']);
    $state=get_safe_value($con,$_POST['state']);
    $city=get_safe_value($con,$_POST['city']);
    $pin=get_safe_value($con,$_POST['pin']);
    $cq="select * from pin where s_id='$state' and cn_id='$name' and c_id='$city' and pincode='$pin'";
    $cr=mysqli_query($con,$cq);
    $cro=mysqli_num_rows($cr);
    if($cro==0){
        $q="update pin set pincode='$pin', cn_id='$name', s_id='$state', c_id='$city' where id='$id'";
        if(mysqli_query($con,$q)){
            echo 1;
        }else{
            echo 0;
        }
    }else{
        $r=mysqli_fetch_assoc($cr);
        $rg=$r['id'];
    if($cro>=1 && $rg==$id){
        $q="update pin set pincode='$pin', cn_id='$name', s_id='$state', c_id='$city' where id='$id'";
        if(mysqli_query($con,$q)){
            echo 1;
        }else{
            echo 0;
        }
    }else{
        echo 3;
    }
}
?>