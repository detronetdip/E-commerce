<?php
require('require/top.php');
$id = $_GET['sid'];
$q = "select * from sellers where id='$id'";
$r = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($r);
$q1 = "select * from seller_wallet where seller_id='$id'";
$r1 = mysqli_query($con, $q1);
?>
<div class="wrwr">
    <div class="path" id="path">
        <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="view_seller_wallet_history.php?sid=<?php echo $_GET['sid']; ?>">Wallet history of seller </a>
    </div>
    <div class="headrow">
        <div class="wrap">
            <div class="detail" style="float: right">
                <h3>Wallet Balance: &#8377;<span style="color:#6a7187;">
                        <?php
                        $y = mysqli_fetch_assoc(mysqli_query($con, "select * from seller_wallet where seller_id='$id'"));
                        $r = $y['ballance'];
                        echo $r;
                        ?></span></h3>
            </div>
        </div>
        <div style="background:#fff;padding:2rem 0">
            <table style="width:100%">
                <thead>
                    <th style="font-size:1.4rem;font-weight:400;text-align:left;padding:0.2rem 1rem;border-bottom:1px solid #e2e2e2;">
                        <h4>Date</h4>
                    </th>
                    <th style="font-size:1.4rem;font-weight:400;text-align:left;padding:0.2rem;border-bottom:1px solid #e2e2e2;">
                        <h4>Message</h4>
                    </th>
                    <th style="font-size:1.4rem;font-weight:400;text-align:left;padding:0.2rem;border-bottom:1px solid #e2e2e2;">
                        <h4>Balance</h4>
                    </th>
                </thead>
                <tbody>
                    <?php
                    $res = mysqli_query($con, "select * from seller_w_msg where s_id='$id'");
                    while ($roww = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td style="padding: 1rem 0.8rem;border-bottom:1px solid #e2e2e2;font-size:1.4rem;">
                                <?php echo $roww['added_on'] ?>
                            </td>
                            <td style="padding: 1rem 0.8rem;border-bottom:1px solid #e2e2e2;font-size:1.4rem;">
                                <?php echo $roww['msg'] ?>
                            </td>
                            <td style="padding: 1rem 0.8rem;border-bottom:1px solid #e2e2e2;font-size:1.4rem;">
                                &#8377;<?php echo $roww['balance'] ?>
                                ( <?php
                                    if ($roww['cod'] == 1) {
                                        echo "+";
                                    } else {
                                        echo "-";
                                    }
                                    ?> )
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="
              display: block;
              margin-bottom: 2rem;
              font-size: 1.2rem;
              color: #6a7187;
            ">
        @ Developed by Ayondip Jana
    </div>
</div>
<?php
require('require/foot.php');
?>