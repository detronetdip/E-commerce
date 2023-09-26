<?php
require('utility/utility.php');
$payment_mode = $_POST['mode'];
$pay_id = $_POST['mihpayid'];
$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];

$MERCHANT_KEY = "merchant key";
$SALT = "salt key";
$udf5 = '';
$keyString 	= $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $productinfo . '|' . $firstname . '|' . $email . '|||||' . $udf5 . '|||||';
$keyArray 	= explode("|", $keyString);
$reverseKeyArray = array_reverse($keyArray);
$reverseKeyString =	implode("|", $reverseKeyArray);
$saltString     = $SALT . '|' . $status . '|' . $reverseKeyString;
$sentHashString = strtolower(hash('sha512', $saltString));


if ($sentHashString != $posted_hash) {
	$statusse = "Failed";
	echo $statusse;
	$placed = "Failed";
	mysqli_query($con, "update orders set payment_status='$statusse',order_status='$placed',payu_status='$status', mihpayid='$pay_id' where txnid='$txnid'");
?>
	<script>
		alert('Failed');
		window.location.href = 'index.php';
	</script>
<?php
} else {
	$statusse = "Successfull";
	echo $statusse;
	$placed = "2";
	$_SESSION['USER_LOGIN'] = "YES";
	$q = mysqli_fetch_assoc(mysqli_query($con, "select * from orders where txnid='$txnid'"));
	$_SESSION['USER_ID'] = $q['u_id'];
	$_SESSION['utm_source'] = $productinfo;
	$uid = $q['u_id'];
	mysqli_query($con, "update orders set payment_status='1',order_status='$placed',payu_status='$status', mihpayid='$pay_id' where txnid='$txnid'");
	$rw = mysqli_fetch_assoc(mysqli_query($con, "select * from orders where txnid='$txnid'"));
	$oid = $rw['id'];
	mysqli_query($con, "insert into order_time(oid,o_status) values('$oid','2')");
	$cart = mysqli_fetch_assoc(mysqli_query($con, "select * from cart where u_id='$uid' and belonging_city='$productinfo'"));
	$cart_id = $cart['id'];
	mysqli_query($con, "delete from cart where id='$cart_id'");
	mysqli_query($con, "delete from cart_detail where cart_id='$cart_id'");
	$orderRes = mysqli_query($con, "select * from order_detail where oid='$oid'");
	while ($rw = mysqli_fetch_assoc($orderRes)) {
		$pidt = $rw['p_id'];
		$qt = $rw['qty'];
		mysqli_query($con, "update product set qty=qty-'$qt' where id='$pidt'");
	}
?>
	<form action="orderPlaced.php" method="POST" id="codform">
		<input type="hidden" name="orderId_user" value="<?php echo $oid; ?>">
	</form>
	<script>
		document.getElementById("codform").submit();
	</script>
<?php
}
?>