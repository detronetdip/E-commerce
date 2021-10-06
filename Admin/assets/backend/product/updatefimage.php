<?php
 require('../../../../utility/utility.php');
 if($_FILES['file']['type']!='' && $_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/jpg'&& $_FILES['file']['type']!='image/png'){
    $msg="Format of Fourth Image Is Not supported";
    echo $msg;
}else{
    $filename = rand(1111111,9999999).$_FILES['file']['name'];
    $location = "../../../../media/product/".$filename;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location))
    {
	    echo $filename;
    }
}
?>