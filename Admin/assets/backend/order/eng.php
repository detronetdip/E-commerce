<?php
require('../../../../utility/utility.php');
$first=get_safe_value($con,$_POST['first']);
$second=get_safe_value($con,$_POST['second']);
$query="select orders.id,orders.final_val,orders.ship_fee_order,orders.order_status,order_time.added_on from orders,order_time where order_time.added_on>='$first' and order_time.added_on<='$second' and order_time.o_status='2' and order_time.oid=orders.id";
$res=mysqli_query($con,$query);
$result['to']=mysqli_num_rows($res);
$countSuccess=0;
$total=0;
while($row=mysqli_fetch_assoc($res)){
    if($row['order_status']==5){
        $countSuccess++;
        $id=$row['id'];
		$order_total=$row['final_val'];
		$order_ship=$row['ship_fee_order'];
		$fc=mysqli_query($con,"select * from order_stlmnt where oid='$id'");
		$paid=0;
		while($w=mysqli_fetch_assoc($fc)){
            $paid+=$w['val'];
		}
		$total+=($order_total+$order_ship)-$paid;
    }
}
$result['so']=$countSuccess;
$result['t']=round($total,2);
echo json_encode($result);
?>