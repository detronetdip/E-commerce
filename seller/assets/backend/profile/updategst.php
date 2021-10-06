<?php
 require('../../../../utility/utility.php');
 if($_FILES['file']['type']!='' && $_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/jpg'&& $_FILES['file']['type']!='image/png'){
    $msg['msg']="Format of Business Certificate Is Not supported";
    $msg['code']=0;
    echo json_encode($msg);
}else{
    $id=$_SESSION['SELLER_ID'];
    $row=mysqli_fetch_assoc(mysqli_query($con,"select * from sellers where id='$id'"));
    // echo $row['gst_certificate'];
    // die();
    if($row['gst_crft']!="0"){
        $path="../../../../media/seller_profile/".$row['gst_crft'];
        unlink($path);
    }
    $temp = explode(".", $_FILES["file"]["name"]);
    $filename = rand(111111111,999999999).round(microtime(true)) . '.' . end($temp);
    $location = "../../../../media/seller_profile/".$filename;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
        $msg['code']=1;
        $msg['filename']=$filename;
        mysqli_query($con,"update sellers set gst_crft='$filename' where id='$id'");
        echo json_encode($msg);
    }
}
?>