<?php
    require('../../../../utility/utility.php');
    $id=get_safe_value($con,$_POST['id']);
    $name=get_safe_value($con,$_POST['name']);
    $pcat=get_safe_value($con,$_POST['pcat']);
    $sale=get_safe_value($con,$_POST['sale']);
    $cq="select * from subcategories where subcat='$name' and cat_id='$pcat'";
    $cr=mysqli_query($con,$cq);
    $cro=mysqli_num_rows($cr);
    if($cro==0){
        $q="update subcategories set subcat='$name',cat_id='$pcat' where id='$id'";
        if(mysqli_query($con,$q)){
            mysqli_query($con,"update comission set com='$sale' where scat_id='$id'");
            echo 1;
        }else{
            echo 0;
        }
    }else{
        $r=mysqli_fetch_assoc($cr);
        $rg=$r['id'];
    if($cro>=1 && $rg==$id){
            $q="update subcategories set subcat='$name',cat_id='$pcat' where id='$id'";
        if(mysqli_query($con,$q)){
            mysqli_query($con,"update commission set com='$sale' where scat_id='$id'");
            echo "update commission set com='$sale' where scat_id='$id'";
        }else{
            echo 0;
        }
    }else{
        echo 3;
    }
}
    
?>