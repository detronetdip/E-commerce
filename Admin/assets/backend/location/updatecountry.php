<?php
    require('../../../../utility/utility.php');
    $id=get_safe_value($con,$_POST['id']);
    $name=get_safe_value($con,$_POST['cntry']);
    $cq="select * from country where cntry_name='$name'";
    $cr=mysqli_query($con,$cq);
    $cro=mysqli_num_rows($cr);
    if($cro==0){
        $q="update country set cntry_name='$name' where id='$id'";
        if(mysqli_query($con,$q)){
            echo 1;
        }else{
            echo 0;
        }
    }else{
        $r=mysqli_fetch_assoc($cr);
        $rg=$r['id'];
    if($cro>=1 && $rg==$id){
        $q="update country set cntry_name='$name' where id='$id'";
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