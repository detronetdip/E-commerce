<?php
function pre($arr)
{
	echo '<pre>';
	print_r($arr);
}

function prx($arr)
{
	echo '<pre>';
	print_r($arr);
	die();
}
function get_safe_value($con, $str)
{
	if ($str != '') {
		$str = trim($str);
		return mysqli_real_escape_string($con, $str);
	}
}
function redirect($path)
{
?>
	<script>
		window.location.href = '<?php echo $path; ?>';
	</script>
<?php
}
function get_code()
{
	$code = chr(64 + rand(1, 25)) . rand(11, 99) . chr(64 + rand(1, 25)) . chr(64 + rand(1, 25)) . rand(11, 99) . chr(64 + rand(1, 25));
	return $code;
}
function get_subcat_product($con, $p_id, $s_id)
{
	$sql = "select * from product where category='$p_id' and subcat='$s_id' and isapp='1' and status='1' order by id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_subcat_product_filter($con, $p_id, $s_id, $f_id)
{
	$sql = "select product.*,filters.name from product,filters where product.category='$p_id' and product.subcat='$s_id' and filters.subcat=product.subcat and filters.name='$f_id' and product.isapp='1' and product.status='1' order by product.id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_subcat_product_sfilter($con, $p_id, $s_id, $f_id, $sf_id)
{
	$sql = "select product.*,filters.name,product_subfilters.subfilter from product,filters,product_subfilters where product.category='$p_id' and product.subcat='$s_id' and filters.subcat=product.subcat and filters.name='$f_id' and product.isapp='1' and product.status='1' and product_subfilters.subfilter='$sf_id' and product_subfilters.pid=product.id order by product.id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function product_detail($con, $id)
{
	$sql = "select product.*,sellers.f_name from product,sellers where product.id='$id' and product.added_by=sellers.id";
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($res);
	return $row;
}
function encryptid($id)
{
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$encryption_iv = '1234567891011121';
	$key = "1top8ku";
	$encryption = openssl_encrypt($id, $ciphering, $key, $options, $encryption_iv);
	return $encryption;
}
function decryptid($id)
{
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$decryption_iv = '1234567891011121';
	$key = "1top8ku";
	$decryption = openssl_decrypt($id, $ciphering, $key, $options, $decryption_iv);
	return $decryption;
}
function get_treanding_products($con)
{
	$sql = "select * from product where status='1' and bs='1' and isapp='1' order by id desc limit 6";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_bestsell_products($con)
{
	$sql = "select * from product where status='1' and bs='1' and isapp='1' order by id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_all_products($con)
{
	$sql = "select * from product where status='1' and isapp='1' order by id desc limit 12";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_all_categories($con)
{
	$sql = "select * from categories where status='1' order by id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_all_sub_categories($con, $p_cat)
{
	$sql = "select * from subcategories where cat_id='$p_cat' order by id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_all_sub_categories_filters($con, $p_cat)
{
	$sql = "select * from filter where subcat_id='$p_cat' order by id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_all_sub_filters($con, $p_cat)
{
	$sql = "select * from sub_filter where filter_id='$p_cat' order by id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function search_product($con, $search_name, $cat, $scat = '', $filter = '', $sfilter = '')
{
	$add = "";
	$sql = "";
	if ($scat != '') {
		$add = " and scat_id='$scat'";
	}
	if (isset($cat) && $cat != '') {
		$gg = "and cat_id='$cat'";
	} else {
		$gg = '';
	}
	if ($filter == '' && $sfilter == '') {

		$sql = "select * from product where status='1' $gg and(product_name like '%$search_name%' or description like '%$search_name%') $add";
	} else {
		if ($filter != '' && $sfilter == '') {
			$sql = "select product.*,p_filter.fid from product,p_filter where product.status='1' and product.cat_id='$cat' and product.scat_id='$scat' and(product.product_name like '%$search_name%' or product.description like '%$search_name%') and p_filter.pid=product.id and p_filter.fid='$filter'";
		} else {
			$sql = "select product.*,p_filter.fid,p_sfilter.sfid from product,p_filter,p_sfilter where product.status='1' and product.cat_id='$cat' and product.scat_id='$scat' and(product.product_name like '%$search_name%' or product.description like '%$search_name%') and p_filter.pid=product.id and p_sfilter.pid=product.id and p_filter.fid='$filter' and p_sfilter.sfid='$sfilter'";
		}
	}
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_cart_products($con)
{
	if (!isset($_SESSION['USER_LOGIN'])) {
		if (isset($_SESSION['USER_CART'])) {
			$cart = array();
			foreach ($_SESSION['USER_CART'] as $cart_item) {
				array_push($cart, product_detail($con, $cart_item));
			}

			for ($i = 0; $i < count($cart); $i++) {
				$cart[$i]['product_qty'] = $_SESSION['CART_QTY'][$i];
			}
			return $cart;
		} else {
			return array();
		}
	} else if (isset($_SESSION['USER_LOGIN'])) {
		$uid = $_SESSION['USER_ID'];
		$utm = $_SESSION['utm_source'];
		$sql = "select cart.belonging_city,cart_detail.qty,product.img1,product.product_name,product.fa,product.id from cart,cart_detail,product where cart.u_id='$uid' and cart.belonging_city='$utm' and cart_detail.cart_id=cart.id and cart_detail.p_id=product.id";
		$res = mysqli_query($con, $sql);
		$product_arr = array();

		while ($row = mysqli_fetch_assoc($res)) {
			$product_arr[] = $row;
		}
		return $product_arr;
	}
}
function get_id()
{
	$code = chr(97 + rand(1, 25)) . rand(11, 99) . chr(97 + rand(1, 25)) . chr(97 + rand(1, 25)) . rand(11, 99) . chr(97 + rand(1, 25));
	return $code;
}
function OTP()
{
	$code = chr(65 + rand(1, 25)) . rand(11, 99) . chr(65 + rand(1, 25)) . chr(65 + rand(1, 25)) . rand(11, 99) . chr(65 + rand(1, 25));
	return $code;
}
function calc_discount($price, $discount)
{
	$t = ($price * $discount) / 100;
	$fp = $price - $t;
	return $fp;
}
function add_cart_a_login($con, $productid)
{
	$qty = 1;
	$u_id = $_SESSION['USER_ID'];
	$utm = $_SESSION['utm_source'];
	$res = mysqli_query($con, "select * from cart where u_id='$u_id' and belonging_city='$utm'");
	$count = mysqli_num_rows($res);
	if ($count > 0) {
		$f = mysqli_fetch_assoc($res);
		$cart_id = $f['id'];
		mysqli_query($con, "insert into cart_detail(cart_id,p_id,qty) values('$cart_id','$productid','$qty')");
		update_cart($con, $cart_id);
	} else {
		$query = "insert into cart(u_id,belonging_city) values('$u_id','$utm')";
		mysqli_query($con, $query);
		$f = mysqli_fetch_assoc(mysqli_query($con, "select * from cart where u_id='$u_id' and belonging_city='$utm'"));
		$cart_id = $f['id'];
		$pd = product_detail($con, $productid);
		$ta = $pd['fa'] * $qty;
		mysqli_query($con, "insert into cart_detail(cart_id,p_id,qty) values('$cart_id','$productid','$qty')");
		update_cart($con, $cart_id);
	}
}
function get_user_address($con)
{
	$id = $_SESSION['USER_ID'];
	$sql = "select * from user_address where u_id='$id' order by id desc";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function is_address_added($con)
{
	$id = $_SESSION['USER_ID'];
	$sql = "select * from users where id='$id'";
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($res);
	$isa = $row['a_added'];
	return $isa;
}
function is_mobile_verified($con)
{
	$id = $_SESSION['USER_ID'];
	$sql = "select * from users where id='$id'";
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($res);
	$isa = $row['m_vfd'];
	return $isa;
}
function is_email_verified($con)
{
	$id = $_SESSION['USER_ID'];
	$sql = "select * from users where id='$id'";
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($res);
	$isa = $row['e_vfd'];
	return $isa;
}
function fetch_address($con)
{
	$id = $_SESSION['USER_ID'];
	$sql = "select * from user_address where u_id='$id'";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_new_orderid()
{
	$code = "OD" . chr(65 + rand(1, 25)) . rand(1, 99) . time();
	return $code;
}
function get_total_categories($con)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from categories"));
	return $n;
}
function get_total_subcat($con)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from sub_cat"));
	return $n;
}
function get_total_order($con)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from orders"));
	return $n;
}
function get_total_orders_successfull($con)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from orders where order_status='5'"));
	return $n;
}
function get_total_orders($con)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from orders"));
	return $n;
}
function get_total_revenew($con)
{
	$rs = mysqli_query($con, "select * from orders where order_status='5'");
	$total = 0;
	while ($tu = mysqli_fetch_assoc($rs)) {
		$id = $tu['id'];
		$order_total = $tu['final_val'];
		$order_ship = $tu['ship_fee_order'];
		$fc = mysqli_query($con, "select * from order_stlmnt where oid='$id'");
		$paid = 0;
		while ($w = mysqli_fetch_assoc($fc)) {
			$paid += $w['val'];
		}
		$total += ($order_total + $order_ship) - $paid;
	}
	return round($total, 2);
}
function get_total_order_seller($con, $id)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from orders where seller_id='$id'"));
	return $n;
}
function get_total_product($con)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from product"));
	return $n;
}
function get_total_product_seller($con, $id)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from product where added_by='$id'"));
	return $n;
}
function get_total_seller($con)
{
	$n = mysqli_num_rows(mysqli_query($con, "select * from sellers"));
	return $n;
}
function getMyOrders2($con, $type, $uc = '')
{
	$sellerId = $_SESSION['SELLER_ID'];
	$int = 2;
	if ($type == 2) {
		$int = 2;
	} else if ($type == 3) {
		$int = 3;
	} else if ($type == 4) {
		$int = 4;
	}
	if ($type == 5) {
		$int = 5;
	}
	if ($type == 6) {
		$int = 6;
	}
	if ($type == 7) {
		$int = 7;
	}
	if ($uc != '') {
		$uc = "and orders.u_cnfrm='$uc'";
	}
	$query = "SELECT
     orders.o_id,
    order_time.added_on,
    order_detail.p_id,
    product.added_by
FROM
    orders,
    order_time,
    order_detail,
    product
WHERE
    order_detail.oid = orders.id AND order_time.oid = orders.id AND order_time.o_status = orders.order_status AND order_detail.p_id = product.id AND product.added_by = '$sellerId' AND orders.order_status='$int' $uc";
	$res = mysqli_query($con, $query);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return filterOrders($product_arr);
}
function filterOrders($order)
{
	$finalArray = array();
	foreach ($order as $product) {
		if (!in_array($product['o_id'], $finalArray)) {
			array_push($finalArray, $product['o_id']);
		}
	}
	return $finalArray;
}
function getMyOrders($con, $type, $f = '')
{
	$product_arr = array();
	$allOrders = getMyOrders2($con, $type, $f);
	foreach ($allOrders as $order) {
		$od = $order;
		$res = mysqli_query($con, "select orders.id,orders.o_id,order_time.added_on from orders,order_time where orders.o_id='$od' and order_time.oid = orders.id and order_time.o_status = orders.order_status");
		while ($row = mysqli_fetch_assoc($res)) {
			$product_arr[] = $row;
		}
	}
	return $product_arr;
}
function getSubArray($arr, $size)
{
	$temp = array();
	for ($i = 0; $i < count($arr); $i += $size) {
		array_push($temp, array_slice($arr, $i, $i + $size));
	}
	return $temp;
}
function authorise_user()
{
	if (!isset($_SESSION['USER_LOGIN'])) {
		redirect('auth/v2/');
	}
}
function authorise_user2()
{
	if (!isset($_SESSION['USER_LOGIN'])) {
		redirect('auth/v2/');
	}
}
function authorise($con)
{
	if (!isset($_SESSION['SELLER_LOGIN'])) {
		redirect('auth/v2/');
	}
}
function authorise_delivery($con)
{
	if (!isset($_SESSION['DELIVERY_LOGIN'])) {
		redirect('auth/v2/');
	}
}
function profile_completed($con)
{
	$seller_id = $_SESSION['SELLER_ID'];
	$row = mysqli_fetch_assoc(mysqli_query($con, "select * from sellers where id='$seller_id'"));
	return $row['is_cp'];
}
function seller_name($con)
{
	$name = '';
	$seller_id = $_SESSION['SELLER_ID'];
	$row = mysqli_fetch_assoc(mysqli_query($con, "select * from sellers where id='$seller_id'"));
	if ($row['f_name'] == '') {
		return "Hii";
	} else {
		return $row['f_name'];
	}
}

function R_v()
{
	$h = chr(97 + rand(1, 25)) . chr(97 + rand(1, 25)) . chr(97 + rand(1, 25)) . chr(97 + rand(1, 25)) . chr(97 + rand(1, 25));
	return $h;
}
function access_token()
{
	$code = chr(97 + rand(1, 25)) . rand(11, 99) . chr(97 + rand(1, 25)) . chr(97 + rand(1, 25)) . rand(11, 99) . chr(97 + rand(1, 25)) . chr(97 + rand(1, 25)) . chr(97 + rand(1, 25)) . rand(11, 99) . chr(97 + rand(1, 25));
	$sv_name = R_v();
	$_SESSION[$sv_name] = $code;
	$final = $code . "&verify=" . $sv_name;
	return $final;
}
function authenticate_user($con, $access_token, $verify)
{
	if (!isset($_SESSION[$verify])) {
		redirect('index.php');
	} else {
		if ($_SESSION[$verify] != $access_token) {
			unset($_SESSION[$verify]);
			redirect('index.php');
		} else {
			unset($_SESSION[$verify]);
		}
	}
}
function hash_code()
{
	return password_hash($_SESSION['SELLER_ID'], PASSWORD_DEFAULT);
}
function authenticate_seller($access_token)
{
	if (!password_verify($_SESSION['SELLER_ID'], $access_token)) {
		redirect('index.php');
	}
}
function profle_verified($con)
{
	$seller_id = $_SESSION['SELLER_ID'];
	$row = mysqli_fetch_assoc(mysqli_query($con, "select * from sellers where id='$seller_id'"));
	return $row['isapp'];
}
function get_all_param($g)
{
	$result = array();
	foreach ($_GET as $j => $g) {
		array_push($result, $j);
	}
	return $result;
}
function get_featured_products($con)
{
	$source = $_SESSION['utm_source'];
	$sql = "select * from product where belonging_city='$source' and status='1' and isappp='1'";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function verify_source($con, $source)
{
	$c = mysqli_num_rows(mysqli_query($con, "select * from city where id='$source'"));
	if ($c == 0) {
		redirect('index.php');
	} else {
		if (isset($_SESSION['utm_source'])) {
			if ($_SESSION['utm_source'] != $source) {
				if (isset($_SESSION['USER_CART'])) {
					unset($_SESSION['USER_CART']);
					unset($_SESSION['CART_QTY']);
				}
				$_SESSION['utm_source'] = $source;
			}
		} else {
			$_SESSION['utm_source'] = $source;
		}
	}
}
function getcity($con, $source)
{
	$y = mysqli_fetch_assoc(mysqli_query($con, "select * from city where id='$source'"));
	return $y['city_name'];
}
function user_vfd_efd($con)
{
	$id = $_SESSION['USER_ID'];
	$m = mysqli_fetch_assoc(mysqli_query($con, "select * from users where id='$id'"));
	if ($m['m_vfd'] != 1 && $m['e_vfd'] != 1) {
		redirect('verify_ME.php');
	}
}
function user_vfd_efd2($con)
{
	$id = $_SESSION['USER_ID'];
	$m = mysqli_fetch_assoc(mysqli_query($con, "select * from users where id='$id'"));
	if ($m['m_vfd'] == 1 && $m['e_vfd'] == 1) {
		redirect('index.php');
	}
}
function myOrders($con,$source)
{
	$sql = "select * from product where belonging_city='$source' and status='1' and isappp='1'";
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function update_cart($con, $cart_id)
{
	$res = mysqli_query($con, "select * from cart_detail where cart_id='$cart_id'");
	$totalPrice = 0;
	$finalPrice = 0;
	$ship = 0;
	$isship = 1;
	$wallet_amt = 0;
	$promo = 0;
	while ($row = mysqli_fetch_assoc($res)) {
		$product = product_detail($con, $row['p_id']);
		$totalPrice += ($product['fa'] * $row['qty']);
	}
	$f = mysqli_fetch_assoc(mysqli_query($con, "select * from cart where id='$cart_id'"));
	$fn = mysqli_fetch_assoc(mysqli_query($con, "select * from dc"));
	if ($totalPrice <= $fn['dc']) {
		$ship = $fn['pc'];
	} else {
		$ship = 0;
		$isship = 0;
	}
	if ($f['is_add_w'] == 1) {
		$wallet_amt = $f['wl_amt'];
	} else {
		$wallet_amt = 0;
	}
	if ($f['is_applied'] == 1) {
		$promo = $f['promo'];
	} else {
		$promo = 0;
	}
	$finalPrice = ($totalPrice + $ship) - ($wallet_amt + $promo);
	mysqli_query($con, "update cart set total='$totalPrice',ship_fee='$ship',final_amt='$finalPrice' where id='$cart_id'");
}
function get_chekout_products($con)
{
	$id = $_SESSION['USER_ID'];
	$utm = $_SESSION['utm_source'];
	$query = "SELECT cart.belonging_city,cart.total,cart.promo,cart.is_add_w,cart.wl_amt,cart.is_applied,cart.final_amt,cart.ship_fee,cart_detail.id,cart_detail.p_id,cart_detail.qty,product.scat_id,product.img1,product.product_name,product.fa,product.price FROM cart,cart_detail,product WHERE cart.u_id='$id' AND cart.belonging_city='$utm' and cart_detail.cart_id=cart.id AND cart_detail.p_id=product.id";
	$h = mysqli_query($con, $query);
	$product = array();
	while ($row = mysqli_fetch_assoc($h)) {
		$product[] = $row;
	}
	return $product;
}

?>