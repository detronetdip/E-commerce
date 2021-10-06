<?php
require('../../../../utility/utility.php');
$pcat=get_safe_value($con,$_POST['pcat']);
$template='';
$q="select * from filter where subcat_id='$pcat'";
$res=mysqli_query($con,$q);
if(mysqli_num_rows($res)==0){
    $template="<option>No Data found</option>";
}else{
    while($row=mysqli_fetch_assoc($res)){
        $template=$template.'
        <div class="formrow">
        <div class="heading">
            Filter
        </div>
        <select name="productFiltersName" id="addfiltername">
            <option value="'.$row['id'].'">'.$row['filter'].'</option>
        </select>
        </div>
        <div class="formrow">
            <div class="heading">
                Sub Filter
            </div>
        <div id="subfilters" style="background-color: #f8f8fb;width:98%;padding: 0.8rem;
                    border: 0.5px solid #74788d;
                    border-radius: 5px;">';
            $filtername=$row['id'];
            $q2="select * from sub_filter where filter_id='$filtername'";
            $res2=mysqli_query($con,$q2);
            while($row2=mysqli_fetch_assoc($res2)){
                $template=$template.'<span style="font-size:1.2rem;float:left; margin:0 0.8rem">
                <input type="checkbox" name="productSubFiltersName"  style="display:block;height: 1.5rem;
                background-color: #f8f8fb;
                width: 1.5rem;
                padding: 0 0.8rem;
                border: 0.5px solid #74788d;
                border-radius: 5px;float:left" value="'.$row2['id'].'">
                &nbsp; '.$row2['subfilter'].'
            </span>';
            }
            $template=$template.'</div> </div>';
    }
}
echo $template;
?>