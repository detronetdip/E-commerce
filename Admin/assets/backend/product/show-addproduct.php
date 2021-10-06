<?php
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $cq="select product.*,categories.category,subcategories.subcat,sellers.f_name from product,categories,subcategories,sellers where product.cat_id=categories.id and product.scat_id=subcategories.id and product.added_by=sellers.id and product.id='$id'";
 $cr=mysqli_query($con,$cq);
 $r=mysqli_fetch_assoc($cr);
 $name= $r['product_name'];
 $category= $r['category'];
 $subcategory= $r['subcat'];
 $img1= $r['img1'];
 $img2= $r['img2'];
 $img3= $r['img3'];
 $img4= $r['img4'];
 $qty= $r['qty'];
 $price= $r['price'];
 $sellprice= $r['fa'];
 $sku= $r['sku'];
 $sd= $r['shrt_desc'];
 $dc= $r['description'];
 $bs= $r['bs'];
 $tc= $r['disclaimer'];
 $added_by=$r['f_name'];
 $added_byn='';
 $g='';
 if($bs==1){
   $g="checked";
 }
  $added_byn=$added_by;
 $offn=($sellprice*100)/$price;
 $off=round(100-$offn);
 $timage='';
 $fimage='';
 if($img3!=0){
   $pi3="'../media/product/$img3'";
    $timage='
    <div class="imb" onclick="changeview('.$pi3.')">
       <img src="../media/product/'.$img3.'"/>
     </div>
    ';
 }
 if($img4!=0){
   $pi4="'../media/product/$img4'";
    $fimage='
    <div class="imb" onclick="changeview('.$pi4.')">
       <img src="../media/product/'.$img4.'"/>
     </div>
    ';
 }
 $edit_path="'product_management.php?b=2846&idp=$id'";
 $stk='';
 $bss='';
 if($bs==1){
     $bss="Yes";
 }else{
    $bss="No";
 }
 if($qty>0){
     $stk="In Stock";
 }else{
    $stk="Out of Stock";
 }
 $pi2="'../media/product/$img2'";
 $template='
 <div class="row">
 <div class="left">
   <div class="image">
     <img src="../media/product/'.$img1.'" alt="" id="mi" />
   </div>
   <div class="imgrow">
     <div class="imb" onclick="changeview('.$pi2.')">
       <img src="../media/product/'.$img2.'" alt="" />
     </div>
    '.$timage.'
    '.$fimage.'
   </div>
   <div class="namebox">
     <h3>'.$name.'</h3>
   </div>
   <div class="namebox">'.$category.' | <span>'.$subcategory.'</span></div>
   <div class="namebox">
     <span class="price">
       Price:
       <span class="tag">
         &#8377; '.$sellprice.' |&nbsp; <em class="crs">&#8377; '.$price.'</em>
       </span>
     </span>
   </div>
   <div class="namebox">
     <span class="price">
     SKU:
       <span class="tag">
           &nbsp;  '.$sku.'
       </span>
     </span>
   </div>
   <div class="namebox">
     <span class="price">
       <span class="tag" style="color:green;">
         '.$off.'% off 
       </span>
     </span>
   </div>
   <div class="namebox">
     <span class="price">
      '.$added_by.'
     </span>
   </div>
   <div class="update" style="margin-top:1.2rem;font-size:1.3rem; display:flex;align-items:center;">
    <input type="checkbox" onchange="checksell('.$id.')" id="bsl" '.$g.'> &nbsp; Mark as best sell
   </div>
 </div>
 <div class="right">
   <h3>Short Description:</h3>
   <br />
   <p>
     '.$sd.'
   </p>
   <br />
   <h3>Description:</h3>
   <br />
   <p>
     '.$dc.'
   </p>
   <br />
   <h3>T&C:</h3>
   <br />
   <p>
     '.$tc.'
   </p>
   <br>
   <h3>Filters:</h3>
   <br />
   <p>
     ';
  $fg=mysqli_query($con,"select p_filter.id,filter.filter from p_filter,filter where p_filter.pid='$id' and p_filter.fid=filter.id");
   while($f=mysqli_fetch_assoc($fg)){
    $template=$template.'<span>'.$f['filter'].'</span>';
   }
     $template=$template.'
   </p>
   <br>
   <h3>Sub-filters:</h3>
   <br />
   <p>
     ';
  $fg=mysqli_query($con,"select p_sfilter.id,sub_filter.subfilter from p_sfilter,sub_filter where p_sfilter.pid='$id' and p_sfilter.sfid=sub_filter.id");
   while($f=mysqli_fetch_assoc($fg)){
    $template=$template.'<span>'.$f['subfilter'].'</span>';
   }
     $template=$template.'
   </p>
   <div class="stock">
     <span>'.$stk.'</span>
   </div>
   <div class="stock">
     <span class="qty"> Quantity: '.$qty.' pc. </span>
   </div>
   <div class="stock">
     <span class="qty"> Added By: <span class="n">'.$added_byn.'</span> </span>
   </div>
   <div class="btnrow">';
if($added_byn=='ADMIN'){
   $template=$template.'<button class="edit" onclick="redirect_to('.$edit_path.')">
       <i class="fa fa-pen" aria-hidden="true"></i>Edit
     </button>';
}
     $template=$template.'
     <button class="adcatbtn" onclick="closeadctp()">
       <i class="fa fa-times" aria-hidden="true"></i> Close
     </button>
   </div>
 </div>
</div>
 ';
 echo $template;
?>