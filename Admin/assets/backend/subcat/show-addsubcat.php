<?php
     require('../../../../utility/utility.php');
     $template="
     <div class='row'>
     <h2>Add Sub Category</h2>
   </div>
   <div class='row ndr'>
   <select name='catnameadd' id='addsubcat'>
       <option value='#'>Select Parent Category</option>";
 
       $query="select * from categories order by id desc";
       $resi=mysqli_query($con,$query);
       $i=1;
       while($ropw=mysqli_fetch_assoc($resi)){
           $cname=$ropw['category'];
           $cid=$ropw['id'];
             $template=$template."
           <option value='$cid'>$cname</option>
           ";
       }
       $template=$template."
     </select>
     <input type='text'  id='subcatname' placeholder='Enter New Sub Category'/>
     <input type='number'  id='subcatsale' placeholder='Enter Sale commission in %'/>
     <button class='adcatbtn' onclick='addnewsubcat()' id='adsctbt'>
     <i class='fa fa-plus' aria-hidden='true'></i> Add
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