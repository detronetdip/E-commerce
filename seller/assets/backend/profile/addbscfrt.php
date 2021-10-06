<?php
 require('../../../../utility/utility.php');
 if($_FILES['file']['type']!='' && $_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/jpg'&& $_FILES['file']['type']!='image/png'){
    $msg="Format of Business Certificate Is Not supported";
    echo $msg;
}else{
    $temp = explode(".", $_FILES["file"]["name"]);
    $filename = rand(111111111,999999999).round(microtime(true)) . '.' . end($temp);
    $location = "../../../../media/seller_profile/".$filename;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location))
    {
	    echo $filename;
    }
}
?>