<?php
    require('../../../../utility/utility.php');
    $id=get_safe_value($con,$_POST['id']);
    $name=get_safe_value($con,$_POST['name']);
    $cq="select * from categories where category='$name'";
    $cr=mysqli_query($con,$cq);
    $cro=mysqli_num_rows($cr);
    if($cro==0){
        $q="update categories set category='$name' where id='$id'";
        if(mysqli_query($con,$q)){
            echo 1;
        }else{
            echo 0;
        }
    }else{
        $r=mysqli_fetch_assoc($cr);
        $rg=$r['id'];
    if($cro>=1 && $rg==$id){
        $q="update categories set category='$name' where id='$id'";
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