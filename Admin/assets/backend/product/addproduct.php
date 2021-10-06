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
 $bs=get_safe_value($con,$_POST['bestsell']);
 $tax=get_safe_value($con,$_POST['tax']);
 $fa=get_safe_value($con,$_POST['fa']);
 $sku=get_safe_value($con,$_POST['sku']);
 $return_p=get_safe_value($con,$_POST['return_p']);
 $rday=get_safe_value($con,$_POST['rday']);
 $repref=get_safe_value($con,$_POST['repref']);
 $tc=get_safe_value($con,$_POST['tc']);
 $shipping=get_safe_value($con,$_POST['shipping']);
 $shippingex=get_safe_value($con,$_POST['shippingex']);
 $added_by= "ADMIN"; 
 $status=1;
 $inapprove=1;
 $cq="select * from product where name='$name'and category='$category' and subcat='$subcategory'";
$cr=mysqli_query($con,$cq);
$cro=mysqli_num_rows($cr);
$return=array();
if($cro==0){
    $qyery="insert into product(name,img1,img2,img3,img4,category,subcat,qty,price,sellprice,tax,fa,sku,sd,dc,return_p,rday,repref,tc,bs,added_by,isapp,shippingcharge,scpe,status,isnew) values('$name','$img1','$img2','$img3','$img4','$category','$subcategory','$qty','$price','$sellprice','$tax','$fa','$sku','$sd','$dc','$return_p','$rday','$repref','$tc','$bs','$added_by','$inapprove','$shipping','$shippingex','$status','1')";
    if(mysqli_query($con,$qyery)){
        $row=mysqli_fetch_assoc(mysqli_query($con,"select * from product where name='$name' and category='$category' and subcat='$subcategory'"));
        $product_id=$row['id'];
        $return['code']=1;
        $return['id']=$product_id;
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