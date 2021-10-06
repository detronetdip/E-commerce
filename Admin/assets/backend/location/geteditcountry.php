<?php
require('../../../../utility/utility.php');
$id=get_safe_value($con,$_POST['id']);
$template='';
$query2="select * from country where id='$id'";
$res2=mysqli_query($con,$query2);
$i=1;
while($rowt=mysqli_fetch_assoc($res2)){
    $template=$template.'
    <input
    type="text"
    placeholder="Enter Country Name"
    id="sfield"
    style="width:98.5%;margin:1rem 0;"
    value="'.$rowt['cntry_name'].'"
  />
  <button class="add" onclick="updatecountry('.$rowt['id'].')" id="edctcntry">
    <i class="fa fa-refresh" aria-hidden="true"></i> &nbsp;Update
  </button>
  <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
    ';
}
echo $template;
?>