<?php
  require('../../../../utility/utility.php');
    $result=array();
    unset($_SESSION['DELIVERY_LOGIN']);
    unset($_SESSION['DELIVERY_ID']);
    $result['status']=1;
    echo json_encode($result);
    die();
?>