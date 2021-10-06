<?php
    require('../../../utility/utility.php');
    $id=get_safe_value($con,$_POST['id']);
    $return_msg=array();
    if(!isset($_SESSION['USER_LOGIN'])){
        $return_msg['err_code']=0;
        $return_msg['msg']="Login to access wishlist";
        echo json_encode($return_msg);
    }else{
        $uid=$_SESSION['USER_ID'];
        mysqli_query($con,"insert into wishlist (u_id,p_id) values ('$uid','$id')");
        $return_msg['err_code']=1;
        $return_msg['msg']="Added";
        echo json_encode($return_msg);
    }
    
?>