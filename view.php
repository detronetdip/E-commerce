<?php
require('require/top.php');
$categories = get_all_categories($con);
$subcategories = get_all_sub_categories($con, $_GET['n']);
$all_product = array();
$key = $_GET['k'];
$cat = $_GET['n'];
if (isset($_GET['n'])  && !isset($_GET['scat']) && !isset($_GET['filter']) && !isset($_GET['subfilter'])) {
    $all_product = search_product($con, $key, $cat);
} else if (isset($_GET['n'])  && isset($_GET['scat']) && !isset($_GET['filter']) && !isset($_GET['subfilter'])) {
    $scat = $_GET['scat'];
    $all_product = search_product($con, $key, $cat, $scat);
} else if (isset($_GET['n'])  && isset($_GET['scat']) && isset($_GET['filter']) && !isset($_GET['subfilter'])) {
    $filter = $_GET['filter'];
    $scat = $_GET['scat'];
    $all_product = search_product($con, $key, $cat, $scat, $filter);
} else if (isset($_GET['n'])  && isset($_GET['scat']) && isset($_GET['filter']) && isset($_GET['subfilter'])) {
    $filter = $_GET['filter'];
    $scat = $_GET['scat'];
    $sfilter = $_GET['subfilter'];
    $all_product = search_product($con, $key, $cat, $scat, $filter, $sfilter);
}

?>

<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="">Search</a>
    </div>
</div>

<section class="view-product">
    <div class="row">
        <section class="search">
            <div class="searchrow">
                <div class="left">
                    <div class="shop-by-depertment">
                        <h2>Shop by depertment</h2>
                        <ul>
                            <?php
                            foreach ($categories as $cat) {
                            ?>
                                <li><a href="view.php?n=<?php echo $cat['id']; ?>&k="><?php echo $cat['category']; ?></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                    <div class="shop-by-depertment" style="margin-top:2rem;">
                        <h2>price range</h2>
                        <ul>
                            <input type="range" name="price" id="price-input" min="1" max="1000" value="1000" oninput="getprice()" style="accent-color:#f55d2c;border:none">
                            <div class="inrow" style="margin-top: 1.5rem;">
                                <div class="in">
                                    <h4>&#8377;0</h4>
                                </div>
                                <div class="in">
                                    <h4>&#8377;<span id="fnlp">1000</span></h4>
                                </div>
                                <div class="in">
                                    <h4 class="underline" onclick="filterPrice()" style="cursor:pointer">filter</h4>
                                </div>
                            </div>
                        </ul>

                    </div>
                    <div class="shop-by-depertment" style="border-top: 0;">
                        <h2>sub category</h2>
                        <ul>
                            <?php
                            foreach ($subcategories as $cat) {
                                if (isset($_GET['scat']) && $_GET['scat'] == $cat['id']) {
                            ?>
                                    <li>
                                        <input type="checkbox" name="check" value="<?php echo $cat['id']; ?>" onchange="checksubcat(this)" checked> <label for="none"><?php echo $cat['subcat']; ?></label>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li>
                                        <input type="checkbox" name="check" value="<?php echo $cat['id']; ?>" onchange="checksubcat(this)"> <label for="none"><?php echo $cat['subcat']; ?></label>
                                    </li>
                            <?php
                                }
                            } ?>
                        </ul>
                    </div>
                    <?php if (isset($_GET['scat'])) {
                        $filters = array();
                        $filters = get_all_sub_categories_filters($con, $_GET['scat']);
                    ?>
                        <div class="shop-by-depertment" style="border-top: 0;">
                            <h2>filter</h2>
                            <ul>
                                <?php
                                foreach ($filters as $filter) {
                                    if (isset($_GET['filter']) && $_GET['filter'] == $filter['id']) {
                                ?>
                                        <li>
                                            <input type="checkbox" name="check" value="<?php echo $filter['id']; ?>" onchange="checkfilter(this)" checked> <label for="none"><?php echo $filter['filter']; ?></label>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li>
                                            <input type="checkbox" name="check" value="<?php echo $filter['id']; ?>" onchange="checkfilter(this)"> <label for="none"><?php echo $filter['filter']; ?></label>
                                        </li>
                                <?php
                                    }
                                } ?>
                            </ul>
                        </div>
                    <?php }
                    if (isset($_GET['filter'])) {
                        $subfilters = array();
                        $subfilters = get_all_sub_filters($con, $_GET['filter']);
                    ?>

                        <div class="shop-by-depertment" style="border-top: 0;">
                            <h2>sub filter</h2>
                            <ul>
                                <?php
                                foreach ($subfilters as $filter) {
                                    if (isset($_GET['subfilter']) && $_GET['subfilter'] == $filter['id']) {
                                ?>
                                        <li>
                                            <input type="checkbox" name="check" value="<?php echo $filter['id']; ?>" onchange="checksfilter(this)" checked> <label for="none"><?php echo $filter['subfilter']; ?></label>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li>
                                            <input type="checkbox" name="check" value="<?php echo $filter['id']; ?>" onchange="checksfilter(this)"> <label for="none"><?php echo $filter['subfilter']; ?></label>
                                        </li>
                                <?php
                                    }
                                } ?>
                            </ul>
                        </div>
                    <?php } ?>

                </div>
                <div class="right">
                    <h1>Shop</h1>
                    <div class="outerbox">
                        <?php
                        if (count($all_product) != 0) {
                            foreach ($all_product as $product) {
                        ?>
                                <div class="product" style="background:#fff">
                                    <div class="image">
                                        <img src="media/product/<?php echo $product['img1'] ?>" alt="product">
                                    </div>
                                    <div class="detail">
                                        <h4>
                                            <a href="product_detail.php?pid=<?php echo ($product['id']); ?>&type='detail'&show='2'"><?php echo $product['product_name'] ?></a>
                                        </h4>
                                        <p class="price">&#8377;<span class="ftrp"><?php echo $product['fa'] ?></span></p>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<h1>Nothing Found</h1>";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>