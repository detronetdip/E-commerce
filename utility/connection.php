<?php
session_start();
/* 
$con= mysqli_connect('localhost','aicgroce_aicgroc','r-&,l!F*-=Is');
mysqli_select_db($con,'aicgroce_grocerry'); */

$con= mysqli_connect('localhost','root','');
mysqli_select_db($con,'grocerry');
define('D',"/backend_projects/grocerry");
// define('D',"https://aic-grocery.xyz/");
?>