<?php
 require('../../../../utility/utility.php');
 $name=get_safe_value($con,$_POST['name']);
 $category=get_safe_value($con,$_POST['category']);
 $subcategory=get_safe_value($con,$_POST['subcat']);
 $img1=get_safe_value($con,$_POST['img1']);
 $img2=get_safe_value($con,$_POST['img2']);
 $img3=get_safe_value($con,$_POST['img3']);
 $img4=get_safe_value($con,$_POST['img4']);
 $qty=get_safe_value($con,$_POST['quantity']);
 $price=get_safe_value($con,$_POST['price']);
 $sellprice=get_safe_value($con,$_POST['sellprice']);
 $sd=get_safe_value($con,$_POST['sd']);
 $dc=get_safe_value($con,$_POST['d']);
 $fa=get_safe_value($con,$_POST['fa']);
 $sku=get_safe_value($con,$_POST['sku']);
 $tc=get_safe_value($con,$_POST['tc']);
 $tax=get_safe_value($con,$_POST['tax']);
 $added_by= $_SESSION['SELLER_ID'];
 $jkl=mysqli_fetch_assoc(mysqli_query($con,"select * from sellers where id='$added_by'"));
 $added_city=$jkl['city'];
 $status=1;
 $inapprove=0;
 $cq="select * from product where product_name='$name'and cat_id='$category' and scat_id='$subcategory'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
$return=array();
if($cro==0){
    $qyery="insert into product(cat_id,scat_id,product_name,img1,img2,img3,img4,price,sell_price,fa,shrt_desc,description,qty,disclaimer,isappp,isnew,bs,status,added_by,belonging_city,tax,sku) values('$category','$subcategory','$name','$img1','$img2','$img3','$img4','$price','$sellprice','$fa','$sd','$dc','$qty','$tc','$inapprove','1','0','$status','$added_by','$added_city','$tax','$sku')";

    if(mysqli_query($con,$qyery)){
        $row=mysqli_fetch_assoc(mysqli_query($con,"select * from product where product_name='$name' and cat_id='$category' and scat_id='$subcategory'"));
        $product_id=$row['id'];
        $return['code']=1;
        $return['id']=$product_id;
        mysqli_query($con,"insert into product_ad_on(pid) values('$product_id')");
        echo json_encode($return);
    }else{
        $return['code']=0;
        echo json_encode($return);
    }
}else{
    $return['code']=3;
    echo json_encode($return);
}
?>