<?php 
 require('../../../../utility/utility.php');
 $id=get_safe_value($con,$_POST['id']);
 $q="select * from filter where id='$id'";
 $r=mysqli_query($con,$q);
 $T=mysqli_fetch_assoc($r);
 $name=$T['name'];
 $qr="select * from subfilter where p_filter='$name'";
 $ra=mysqli_query($con,$qr);
 while($rw=mysqli_fetch_assoc($ra)){
     $sc=$rw['name'];
     mysqli_query($con,"delete from subfilter where name='$sc'");
 }
 mysqli_query($con,"delete from filter where id='$id'");
?>