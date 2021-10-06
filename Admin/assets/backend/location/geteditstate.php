<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$query="select * from state where id='$id'";
$template='<select name="" id="fsc">
<option value="#">Select Country</option>';
$query2="select * from country";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
$c_state=$row['c_id'];
            $res2=mysqli_query($con,$query2);
            while($rowt=mysqli_fetch_assoc($res2)){
              if($rowt['id']==$c_state){
                $template=$template.'
                <option value="'.$rowt['id'].'" selected>'.$rowt['cntry_name'].'</option>
                ';
              }else{
                $template=$template.'
                <option value="'.$rowt['id'].'"> '.$rowt['cntry_name'].'</option>
                ';
              }
            }
            $template=$template.'
            </select>
                <input
                type="text"
                placeholder="Enter Country Name"
                id="sfield"
                style="width:98.5%;margin:1rem 0;"
                value="'.$row['state_name'].'"
              />
              <button class="add" onclick="updatestate('.$row['id'].')" id="edtupst">
                <i class="fa fa-refresh" aria-hidden="true"></i> &nbsp;Update
              </button>
              <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
                ';
            
            echo $template;
?>