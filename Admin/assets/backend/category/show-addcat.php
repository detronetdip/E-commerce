<?php
    require('../../../../utility/utility.php');
    $template="
    <div class='row'>
          <h2>Add Category</h2>
        </div>
        <div class='row ndr'>
          <br />
          <input type='text' id='updtedcat' placeholder='Enter category name'/>
          <button class='adcatbtn' onclick='addnewcat()' id='adctbt'>
            <i class='fa fa-plus' aria-hidden='true'></i> Add
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