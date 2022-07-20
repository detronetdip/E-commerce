<?php
require('require/top.php');
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="product.php">product</a>
    </div>
</div>
<div class="cartrow" id="catrow">
    <div class="gh">
        <div class="heading">
            <h3>All products</h3>
            <a href="add_product.php?b=1973">Add Product</a>
        </div>
        <div class="maincontainer">
            <table class="wishlist">
                <thead>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $sellerid = $_SESSION['SELLER_ID'];
                    $query = "select * from product where added_by='$sellerid' order by id desc";
                    $res = mysqli_query($con, $query);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $st = '';
                        $cb = '';
                        $idd = $row['id'];
                        if ($row['isappp'] == 0) {
                            $st = "<span class='badge ofd'> Pending </span>";
                        } else if ($row['isappp'] == 2) {
                            $st = "<span class='badge red'> Rejected </span>";
                        } else if ($row['status'] == 1) {
                            $st = "<span class='badge green'> Active </span>";
                            $cb = '<a href="javascript:void(0)" class="nedit" onclick="product_acdc(' . $idd . ', 0)">
                            <i class="uil uil-wifi-slash"></i>
                        </a>';
                        } else {
                            $st = "<span class='badge ofd'> Deactive </span>";

                            $cb = '<a href="javascript:void(0)" class="edit" onclick="product_acdc(' . $idd . ', 1)">
                            <i class="uil uil-wifi"></i>
                            </a>';
                        }
                    ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <a href="javascript:void(0)">
                                    <img src="../media/product/<?php echo $row['img1']; ?>" alt="product" />
                                </a>
                            </td>
                            <td> <?php echo $row['product_name']; ?></td>
                            <td>
                                <?php echo $st; ?>
                            </td>
                            <td>
                                <div class="acn">
                                    <?php echo $cb; ?>
                                    <a href="product-detail.php?d=<?php echo $row['id']; ?>" class="view">
                                        <i class="uil uil-eye"></i>
                                    </a>
                                    <a href="" class="del">
                                        <i class="uil uil-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require("require/foot.php");
?>