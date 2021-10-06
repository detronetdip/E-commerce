<?php
require('../../../../utility/utility.php');
$value=json_decode($_POST['json']);
$productId=$value[count($value)-1];
for($i=0;$i<count($value)-1;$i++){
    $query='insert into product_filters (pid,filter) values("'.$productId.'","'.$value[$i].'")';
    mysqli_query($con,$query);
}
?>