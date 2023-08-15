<?php
require('../../../../utility/utility.php');
$query="select * from users order by id desc";
$res=mysqli_query($con,$query);
$i=1;
$template='';
$st='';
$cb="";
  while($row=mysqli_fetch_assoc($res)){
      $template=$template.'
      <div class="p_row">
      <div class="slno">'.$i.'</div>
      <div class="p_image">
      '.$row['email'].'&nbsp;';
      $idd=$row['id'];
      if($row['status']==1){
        $st="Active";
          $cb="<button class='deactive' onclick='user_acdc($idd, 0)'>
          <i class='fa fa-eye-slash' aria-hidden='true'></i>Deactive
        </button>";
        }else{
        $st="Deactive";
        $cb="
        <button class='active' onclick='user_acdc($idd, 1)'>
        <i class='fa fa-eye' aria-hidden='true'></i>Active
      </button>
        ";
        }
      if($row['e_vfd']==1){
        $template=$template.'<i class="fa fa-check-circle" aria-hidden="true" style="color:orange;"></i>';
      }else{
        $template=$template.'<i class="fa fa-times-circle" aria-hidden="true" style="color:orange;"></i>';
      }
      $template=$template.'</div>
       <div class="p_image">
     '.$row['mobile'].'
      &nbsp;';
      if($row['m_vfd']==1){
        $template=$template.'<i class="fa fa-check-circle" aria-hidden="true" style="color:orange;"></i>';
      }else{
        $template=$template.'<i class="fa fa-times-circle" aria-hidden="true" style="color:orange;"></i>';
      }
      $template=$template.'</div>
      <div class="p_status">
          <span>
          &#8377;';
             $u_id=$row['id'];
              $ro=mysqli_fetch_assoc(mysqli_query($con,"select * from user_wallet where user_id='$u_id'"));
              $template=$template.$ro['ballance'];
              $template=$template.'
          </span>
      </div>
      <div class="p_action">
          '.$cb.'
      </div>
  </div>
      ';
      $i++;
  }
  echo $template;
  ?>