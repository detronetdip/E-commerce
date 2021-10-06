<?php
require('../../../../utility/utility.php');
            $query="select * from categories order by id desc";
            $res=mysqli_query($con,$query);
            $i=1;
            $template='';
            while($row=mysqli_fetch_assoc($res)){
            $st='';
            $cb='';
            $id=$row['id'];
            if($row['status']==1){
              $st="Active";
                $cb="<button class='deactive' onclick='cat_acdc($id, 0)'>
                <i class='fa fa-eye-slash' aria-hidden='true'></i>Deactive
              </button>";
              }else{
              $st="Deactive";
              $cb="
              <button class='active' onclick='cat_acdc($id, 1)'>
              <i class='fa fa-eye' aria-hidden='true'></i>Active
            </button>
              ";
              }
            $h=$row['category'];
            $template=$template."
            <div class='detailrow'>
            <div class='sl'> $i</div>
            <div class='catname'>$h</div>";
              $nm=$row['id'];
              $q="select * from subcategories where cat_id='$nm'";
              $r=mysqli_query($con,$q);
              $nor=mysqli_num_rows($r);
            $template=$template."
            <div class='nos'>$nor</div>
            <div class='status'>
              <span class='active_span'>
               $st
              </span>
            </div>
            <div class='action'>
              <button class='edit' onclick='editcat($id)'>
                <i class='fa fa-pen' aria-hidden='true'></i>Edit
              </button>
              $cb
              <button class='delete' onclick='catdelete($id)'>
                <i class='fa fa-trash' aria-hidden='true'></i>Delete
              </button>
            </div>
          </div>
            ";

     $i++;
  }
  echo $template;
?>             