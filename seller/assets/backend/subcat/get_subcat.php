<?php
require('../../../../utility/utility.php');
$pcat=get_safe_value($con,$_POST['pcat']);
$template='';
$q="select * from subcategories where cat_id='$pcat'";
$res=mysqli_query($con,$q);
if(mysqli_num_rows($res)==0){
    $template="<option>No Data found</option>";
}else{
    $template="<option value='#'>Select Sub Category</option>";
    while($row=mysqli_fetch_assoc($res)){
        $name=$row['subcat'];
        $namei=$row['id'];
        $template=$template."
        <option value='$namei'>$name</option>
        ";
    }
}
echo $template;
?>