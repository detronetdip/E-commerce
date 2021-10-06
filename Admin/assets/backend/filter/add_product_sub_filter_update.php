<?php
require('../../../../utility/utility.php');
$value=json_decode($_POST['json']);
$productId=$value[count($value)-1];
mysqli_query($con,"delete from product_subfilters where pid='$productId'");
for($i=0;$i<count($value)-1;$i++){
    $query='insert into product_subfilters (pid,subfilter) values("'.$productId.'","'.$value[$i].'")';
    mysqli_query($con,$query);
}
?>