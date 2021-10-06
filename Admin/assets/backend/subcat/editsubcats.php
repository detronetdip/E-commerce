<?php
    require('../../../../utility/utility.php');
    $id=get_safe_value($con,$_POST['id']);
    $q="select * from subcategories where id='$id'";
    $res=mysqli_query($con,$q);
    $row=mysqli_fetch_assoc($res);
    $name=$row['subcat'];
    $pact=$row['cat_id'];
    $scat=$row['id'];
    $query2="select * from commission where scat_id='$scat'";
    $res2=mysqli_query($con,$query2);
    $rowt=mysqli_fetch_assoc($res2);
    $cmsn=$rowt['com'];
    $template="
    <div class='row'>
    <h2>Edit Sub Category</h2>
  </div>
  <div class='row ndr'>
  <select name='catnameadd' id='addsubcat'>
      <option value=' '>Select Parent Category</option>";

      $query="select * from categories order by id desc";
      $resi=mysqli_query($con,$query);
      $i=1;
      while($ropw=mysqli_fetch_assoc($resi)){
     
          $cname=$ropw['id'];
          $cnam_e=$ropw['category'];
          if($pact==$cname){
            $template=$template."
            <option value='$cname' selected>$cnam_e</option>
            ";
          }else{
            $template=$template."
          <option value='$cname'>$cnam_e</option>
          ";
          }
      }
      $template=$template."
    </select>
    <input type='text' value='$name'  id='subcatname'/>
    <input type='number'  id='subcatsale' placeholder='Enter Sale commission in %' value='$cmsn'/>
    <button class='adcatbtn' onclick='updatesubcat($id)' id='esctbt'>
    <i class='fa fa-refresh' aria-hidden='true'></i> Update
    </button>
  </div>
  <div class='row nm'>
          <span id='msg' style='font-size:1.3rem;'></span>
        </div>
  <div class='row nm'>
    <button class='adcatbtn' onclick='closeadct2()'>
      <i class='fa fa-close' aria-hidden='true'></i> Close
    </button>
  </div>
    ";
    echo $template;
?>