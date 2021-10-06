<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);

$template='';
if($id==1){
  $template=$template.'
  <input
  type="text"
  placeholder="Enter Country Name"
  id="sfield"
  style="width:98.5%;margin:1rem 0;"
/>
<button class="add" onclick="addcountry()">
  <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add
</button>
<span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
  ';
}else if($id==2){
$template='<select name="" id="fsc">
<option value="#">Select Country</option>';
$query2="select * from country";
            $res2=mysqli_query($con,$query2);
            while($rowt=mysqli_fetch_assoc($res2)){
                $template=$template.'
                <option value="'.$rowt['id'].'"> '.$rowt['cntry_name'].'</option>
                ';
            }
            $template=$template.'
            </select>
            <input
            type="text"
            placeholder="Enter State Name"
            id="sfield"
            style="width:98.5%;margin:1rem 0;"
          />
          <button class="add" onclick="addstate()">
            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add
          </button>
          <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
                ';
}else if($id==3){
$query="select * from city";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
$template='<select name="" id="fsc" onchange="getstatelist()">
<option value="#">Select Country</option>';
$query2="select * from s_country";


            $res2=mysqli_query($con,$query2);
            while($rowt=mysqli_fetch_assoc($res2)){
                $template=$template.'
                <option value="'.$rowt['name'].'"> '.$rowt['name'].'</option>
                ';
            }
            $template=$template.'
            </select>
            <select name="" id="fscb" style="margin:1rem 0 0 0;">
            <option value="#">Select State</option>
                ';
            $template=$template.'
            </select>
                <input
                type="text"
                placeholder="Enter Country Name"
                id="sfield"
                style="width:98.5%;margin:1rem 0;"
              />
              <button class="add" onclick="addcity()">
                <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add
              </button>
              <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
                ';
            
}else{
  $query="select * from s_city";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
$template='<select name="" id="fsc" onchange="getstatelist()">
<option value="#">Select Country</option>';
$query2="select * from s_country";


            $res2=mysqli_query($con,$query2);
            while($rowt=mysqli_fetch_assoc($res2)){
                $template=$template.'
                <option value="'.$rowt['name'].'"> '.$rowt['name'].'</option>
                ';
            }
            $template=$template.'
            </select>
            <select name="" id="fscb" style="margin:1rem 0 0 0;" onchange="getcitylist()">
            <option value="#">Select State</option>
            </select>
            <select name="" id="fscb2" style="margin:1rem 0 0 0;">
            <option value="#">Select City</option>
            </select>
                <input
                type="text"
                placeholder="Enter Country Name"
                id="sfield"
                style="width:98.5%;margin:1rem 0;"
              />
              <button class="add" onclick="addpin()">
                <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add
              </button>
              <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
                ';
            
}
                
            echo $template;
?>