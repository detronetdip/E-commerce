<?php
$path    = $_GET['path'];
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));
foreach($files as $file){
 unlink($file);
}
?>