<?php
require('../../../../utility/utility.php');
$value=get_safe_value($con,$_POST['name']);
$pcat=get_safe_value($con,$_POST['pcat']);
$sale=get_safe_value($con,$_POST['sale']);
$status=1; 
$cq="select * from subcategories where subcat='$value'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
$result=array();
if($cro==0){
    $cq2="select * from subcategories where cat_id='$pcat'";
    $cr2=mysqli_query($con,$cq2);
    $cro2=mysqli_num_rows($cr2);
    if($cro2<5){
        $qyery="insert into subcategories(subcat,cat_id,status) values('$value','$pcat','$status')";
        if(mysqli_query($con,$qyery)){
            $id=mysqli_fetch_assoc(mysqli_query($con,"select * from subcategories where subcat='$value'"));
            $result['id']=$id['id'];
            $result['status']=1;
            echo json_encode($result);
        }else{
            $result['status']=0;
            echo json_encode($result);
        }
    }else{
        $result['status']=2;
        echo json_encode($result);
    }
}else{
    $result['status']=3;
    echo json_encode($result);
}

?>