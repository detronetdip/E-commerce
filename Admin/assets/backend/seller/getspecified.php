<?php
require('../../../../utility/utility.php');
$sts=$_POST['id'];
$query="select * from seller where status='$sts' order by id desc";
$res=mysqli_query($con,$query);
$i=1;
$template='';

while($row=mysqli_fetch_assoc($res)){
$st='';
$cb='';
$name=$row['fname'];
$email=$row['email'];
$id=$row['id'];
$y="'seller_detail.php?sid=$id'";
if($row['status']==1){
$st="Active";
$cb="<button class='deactive' onclick='seller_acdc($id, 0)'>
<i class='fa fa-eye-slash' aria-hidden='true'></i>Deactive
</button>";
}else{
$st="Deactive";
$cb="
<button class='active' onclick='seller_acdc($id, 1)'>
<i class='fa fa-eye' aria-hidden='true'></i>Active
</button>
";
}
      $template=$template.'
      <div class="p_row">
                  <div class="slno"> '.$i.'</div>
                  <div class="p_name">'.$row['fname'].'</div>
                  <div class="p_image"> '.$row['email'].'</div>
                  <div class="p_status">
                    <span class="active_span"> '.$st.'</span>
                  </div>
                  <div class="p_action">
                    <button
                      class="edit"
                      onclick="redirect_to('.$y.')"
                    >
                      <i class="fa fa-wifi" aria-hidden="true"></i>View
                    </button>
                     '.$cb.'
                    <button class="delete" onclick="deleteseller('.$id.')">
                      <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </button>
                  </div>
                </div>
      ';
     $i++;
  }
  echo $template;
  ?>    