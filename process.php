<?php
require('utility/utility.php');
if (isset($_POST['order-id'])) {
    $order_id = $_POST['order-id'];
    $order = mysqli_fetch_assoc(mysqli_query($con, "select * from orders where id='$order_id'"));
    $payment_type = $order['payment_type'];
    if ($payment_type == 1) {
        mysqli_query($con, "update orders set order_status='2' where id='$order_id'");
        mysqli_query($con, "insert into order_time(oid,o_status) values('$order_id','2')");
        $uid = $_SESSION['USER_ID'];
        $utm = $_SESSION['utm_source'];
        $cart = mysqli_fetch_assoc(mysqli_query($con, "select * from cart where u_id='$uid' and belonging_city='$utm'"));
        $cart_id = $cart['id'];
        mysqli_query($con, "delete from cart where id='$cart_id'");
        mysqli_query($con, "delete from cart_detail where cart_id='$cart_id'");
        $orderRes = mysqli_query($con, "select * from order_detail where oid='$order_id'");
        while ($rw = mysqli_fetch_assoc($orderRes)) {
            $pidt = $rw['p_id'];
            $qt = $rw['qty'];
            mysqli_query($con, "update product set qty=qty-'$qt' where id='$pidt'");
        }
?>

        <form action="orderPlaced.php" method="POST" id="codform">
            <input type="hidden" name="orderId_user" value="<?php echo $order_id; ?>">
        </form>
        <script>
            document.getElementById("codform").submit();
        </script>
    <?php
    } else {
    ?>
        <form action="insert.php" method="POST" id="codform">
            <input type="hidden" name="orderId_user" value="<?php echo $order_id; ?>">
        </form>
        <script>
            document.getElementById("codform").submit();
        </script>
<?php
    }
}
?>