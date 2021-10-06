<?php
require('../../../../utility/utility.php');
$pcat=get_safe_value($con,$_POST['pcat']);
$template='';
$q="select * from sub_filter where p_filter='$pcat'";
$res=mysqli_query($con,$q);
if(mysqli_num_rows($res)==0){
    $template="<option>No Data found</option>";
}else{
    $template="<option value='#'>Select Filter</option>";
    while($row=mysqli_fetch_assoc($res)){
        $name=$row['filter'];
        $d=$row['id'];
        $template=$template."
        <option value='$d'>$name</option>
        ";
    }
}
echo $template;
?>