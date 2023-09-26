<?php
require('utility/utility.php');
//4012 0010 3714 1112
if (isset($_POST['orderId_user'])) {
  $order_id = $_POST['orderId_user'];
  $query = "select orders.txnid,orders.o_id,orders.final_val,user_address.user_name,user_address.user_mobile,users.email from orders,user_address,users where orders.id='$order_id' and orders.ad_id=user_address.id and orders.u_id=users.id";
  $row = mysqli_fetch_assoc(mysqli_query($con, $query));
}
$MERCHANT_KEY = "merchant key";
$SALT = "salt key";

$txnid = $row['txnid'];
$name = $row['user_name'];
$mobile = $row['user_mobile'];
$email = $row['email'];
$amount = $row['final_val'];
$lead = $_SESSION['utm_source'];

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";    // For Sandbox Mode
// $PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if (!empty($_POST)) {
  //print_r($_POST);
  foreach ($_POST as $key => $value) {
    $posted[$key] = $value;
  }
}

$formError = 0;
$txnid = '';
if (empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = $row['txnid'];
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if (empty($posted['hash']) && sizeof($posted) > 0) {
  if (
    empty($posted['key'])
    || empty($posted['txnid'])
    || empty($posted['amount'])
    || empty($posted['firstname'])
    || empty($posted['email'])
    || empty($posted['phone'])
    || empty($posted['productinfo'])
    || empty($posted['surl'])
    || empty($posted['furl'])
    || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
    foreach ($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif (!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>

<head>
  <script>
    var hash = '<?php echo $hash ?>';

    function submitPayuForm() {
      if (hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
</head>

<body onload="submitPayuForm()">

  <form id="payForm" action="<?php echo $action; ?>" method="post" name="payuForm">
    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>" />
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input type="hidden" name="amount" value="<?php echo $amount ?>" />
    <input type="hidden" name="email" value="<?php echo $email ?>" />
    <input type="hidden" name="productinfo" value="<?php echo $lead ?>" />
    <input type="hidden" name="orderId_user" value="<?php echo $_POST['orderId_user']; ?>" />
    <input type="hidden" name="surl" value="http://localhost/backend_projects/grocerry/payment_complete.php" />
    <input type="hidden" name="furl" value="http://localhost/backend_projects/grocerry/payment_fail.php" />
    <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
    <input type="hidden" name="firstname" value="<?php echo $name ?>" />
    <input type="hidden" name="phone" value="<?php echo $mobile ?>" />
  </form>
</body>
<script type="text/javascript">
  window.onload = function() {
    document.getElementById("payForm").submit();
  }
</script>

</html>