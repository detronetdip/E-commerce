<?php
  require('../../../../utility/utility.php');
    $result=array();
    unset($_SESSION['SELLER_LOGIN']);
    unset($_SESSION['SELLER_ID']);
    $result['status']=1;
    echo json_encode($result);
    die();
?>