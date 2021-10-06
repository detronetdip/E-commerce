<?php
require('../../../../utility/utility.php');
$name=get_safe_value($con,$_POST['id']);
$query2="select * from city where s_id='$name' order by id desc";
$res2=mysqli_query($con,$query2);
$r=mysqli_num_rows($res2);
$template='';
if($r==0){
    $template='<option value="#">No City Listed</option>';
}else{
    $template='<option value="#">Select City</option>';
    while($rowt=mysqli_fetch_assoc($res2)){
     $template=$template.'
     <option value="'.$rowt['id'].'">'.$rowt['city_name'].'</option>
     ';
    }
}
echo $template;
?>