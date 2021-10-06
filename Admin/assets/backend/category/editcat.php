<?php
    require('../../../../utility/utility.php');
    $id=get_safe_value($con,$_POST['id']);
    $q="select * from categories where id='$id'";
    $res=mysqli_query($con,$q);
    $row=mysqli_fetch_assoc($res);
    $name=$row['category'];
    $template="
    <div class='row'>
          <h2>Edit Category</h2>
        </div>
        <div class='row ndr'>
          <br />
          <input type='text' value='$name' id='updtedcat'/>
          <button class='adcatbtn' id='edctbt' onclick='updatecat($id)'>
          <i class='fa fa-refresh' aria-hidden='true'></i> Update
          </button>
        </div>
        <div class='row nm'>
          <span id='msg' style='font-size:1.3rem;'></span>
        </div>
        <div class='row nm'>
          <button class='adcatbtn' onclick='closeadct()'>
            <i class='fa fa-close' aria-hidden='true'></i> Close
          </button>
        </div>
    ";
    echo $template;
?>