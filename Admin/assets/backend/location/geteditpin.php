<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$query="select * from pin where id='$id'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
$c_cntry=$row['cn_id'];
$c_state=$row['s_id'];
$c_city=$row['c_id'];
$template='<select name="" id="fsc" onchange="getstatelist()">
<option value="#">Select Country</option>';
$query2="select * from country";
$query3="select * from state where c_id='$c_cntry'";
$query4="select * from city where c_id='$c_cntry' and s_id='$c_state'";
$res3=mysqli_query($con,$query3);
$res4=mysqli_query($con,$query4);


            $res2=mysqli_query($con,$query2);
            while($rowt=mysqli_fetch_assoc($res2)){
              if($rowt['id']==$c_cntry){
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
            <select name="" id="fscb" style="margin:1rem 0 0 0;" onchange="getcitylist()">
            <option value="#">Select State</option>
                ';
            while($rowtl=mysqli_fetch_assoc($res3)){
              if($rowtl['id']==$c_state){
                $template=$template.'
                <option value="'.$rowtl['id'].'" selected>'.$rowtl['state_name'].'</option>
                ';
              }else{
                $template=$template.'
                <option value="'.$rowtl['id'].'"> '.$rowtl['state_name'].'</option>
                ';
              }
            }
            $template=$template.'
            </select>
            <select name="" id="fscb2" style="margin:1rem 0 0 0;">
            <option value="#">Select City</option>
                ';
            while($rowtlu=mysqli_fetch_assoc($res4)){
              if($rowtlu['id']==$c_city){
                $template=$template.'
                <option value="'.$rowtlu['id'].'" selected>'.$rowtlu['city_name'].'</option>
                ';
              }else{
                $template=$template.'
                <option value="'.$rowtlu['id'].'"> '.$rowtlu['city_name'].'</option>
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
                value="'.$row['pincode'].'"
              />
              <button class="add" onclick="updatepin('.$row['id'].')" id="updtpn">
                <i class="fa fa-refresh" aria-hidden="true"></i> &nbsp;Update
              </button>
              <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
                ';
            
            echo $template;
?>