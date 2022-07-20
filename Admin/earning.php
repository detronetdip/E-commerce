<?php
require('require/top.php');
?>
<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="earning.php">Earnngs</a>
    </div>
    <div class="row">
        <div class="card">
            <div class="logo">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            </div>
            <div class="rest">
                <h4>Total Orders</h4>
                <h3 id="ttlod"><?php echo get_total_orders($con); ?></h3>
            </div>
        </div>
        <div class="card">
            <div class="logo">
                <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <div class="rest">
                <h4>Total Revenue</h4>
                <h3 id="t">&#8377;<?php echo get_total_revenew($con); ?></h3>
            </div>
        </div>
        <div class="card">
            <div class="logo">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            </div>
            <div class="rest">
                <h4>Successfull Orders</h4>
                <h3 id="scod"><?php echo get_total_orders_successfull($con); ?></h3>
            </div>
        </div>
        <div class="card">
            <div class="logo">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            </div>
            <div class="rest">
                <h4>Unsuccessfull Orders</h4>
                <h3 id="uscod"><?php echo (get_total_orders($con) - get_total_orders_successfull($con)); ?></h3>
            </div>
        </div>
    </div>
    <br><br>
    <div class="rowbtn">
        <div class="b" style="display:flex;flex-direction:column;padding:3rem 2rem">
            <div class="mask" style="display:flex;flex-direction:row;align-items:center">
                <h1 style="color:#40464d">From:&nbsp;&nbsp; </h1>
                <input type="date" placeholder="Enter Business Type" id="sfield1" style="width:98.5%;margin:1rem 0;" />
            </div>
            <div class="mask" style="display:flex;flex-direction:row;align-items:center">
                <h1 style="color:#40464d">To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h1>
                <input type="date" placeholder="Enter Business Type" id="sfield2" style="width:98.5%;margin:1rem 0;" />
            </div>
            <div class="mask" style="display:flex;flex-direction:row;align-items:end">

                <button class="add" onclick="earning_search()" id="btn">Search</button>
            </div>
            <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
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