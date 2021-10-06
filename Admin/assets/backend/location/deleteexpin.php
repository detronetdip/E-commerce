<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$q="delete from expin where id='$id'";
if(mysqli_query($con,$q)){
    echo 1;
}else{
    echo 0;
}
?>