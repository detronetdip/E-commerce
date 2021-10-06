<?php
 require('../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $query="delete from user_address where id='$id'";
 mysqli_query($con,$query);
?>