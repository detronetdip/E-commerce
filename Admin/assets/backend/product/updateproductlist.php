<?php
require('../../../../utility/utility.php');
$query="select * from product order by id desc";
$res=mysqli_query($con,$query);
$i=1;
$template='';
while($row=mysqli_fetch_assoc($res)){
$st='';
$cb='';
$img1=$row['img1'];
$name=$row['name'];
$id=$row['id'];
if($row['status']==1){
$st="Active";
$cb="<button class='deactive' onclick='product_acdc($id, 0)'>
<i class='fa fa-eye-slash' aria-hidden='true'></i>Deactive
</button>";
}else{
$st="Deactive";
$cb="
<button class='active' onclick='product_acdc($id, 1)'>
<i class='fa fa-eye' aria-hidden='true'></i>Active
</button>
";
}
      $template=$template."
      <div class='p_row'>
      <div class='slno'>$i</div>
      <div class='p_image'>
        <img src='../media/product/$img1' alt='product' />
      </div>
      <div class='p_name'>$name </div>
      <div class='p_status'>
      $st
      </div>
      <div class='p_action'>
        <button class='edit' onclick='showdetailproduct($id)'>
          <i class='fa fa-wifi' aria-hidden='true'></i>View
        </button> 
        $cb
        <button class='delete'>
          <i class='fa fa-trash' aria-hidden='true'></i>Delete
        </button>
      </div>
    </div>
      ";
     $i++;
  }
  echo $template;
  ?>       