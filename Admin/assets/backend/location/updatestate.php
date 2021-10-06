<?php
    require('../../../../utility/utility.php');
    $id=get_safe_value($con,$_POST['id']);
    $name=get_safe_value($con,$_POST['cntry']);
    $state=get_safe_value($con,$_POST['state']);
    $cq="select * from state where state_name='$state' and c_id='$name'";
    $cr=mysqli_query($con,$cq);
    $cro=mysqli_num_rows($cr);
    if($cro==0){
        $q="update state set state_name='$state', c_id='$name' where id='$id'";
        if(mysqli_query($con,$q)){
            echo 1;
        }else{
            echo $q;
        }
    }else{
        $r=mysqli_fetch_assoc($cr);
        $rg=$r['id'];
    if($cro>=1 && $rg==$id){
        $q="update state set state_name='$state', c_id='$name' where id='$id'";
        if(mysqli_query($con,$q)){
            echo 1;
        }else{
            echo $q;
        }
    }else{
        echo 3;
    }
}
?>