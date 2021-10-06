<?php
require('../../../../utility/utility.php');
$name=get_safe_value($con,$_POST['id']);
$query2="select * from pin where c_id='$name' order by id desc";
$res2=mysqli_query($con,$query2);
$r=mysqli_num_rows($res2);
$template='';
if($r==0){
    $template='<option value="#">No Pincode Listed</option>';
}else{
    $template='<option value="#">Select Pincode</option>';
    while($rowt=mysqli_fetch_assoc($res2)){
     $template=$template.'
     <option value="'.$rowt['id'].'">'.$rowt['pincode'].'</option>
     ';
    }
}
echo $template;
?>