<?php
require('require/top.php');

?>
<div class="wrwr">
    <div class="path">
        <a href=""><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
    </div>

    <div class="row">
        <div class="card" style="border:1px solid #e1e4e8;border-radius:0 5px 5px 0">
            <div class="logo">
                <i class="fa fa-list" aria-hidden="true"></i>
            </div>
            <div class="rest">
                <h4>Total Categories</h4>
                <h3><?php echo get_total_categories($con); ?></h3>
            </div>
        </div>
        <div class="card" style="border:1px solid #e1e4e8;border-radius:0 5px 5px 0">
            <div class="logo">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
            <div class="rest">
                <h4>Total Products</h4>
                <h3><?php echo get_total_product($con); ?></h3>
            </div>
        </div>
        <div class="card" style="border:1px solid #e1e4e8;border-radius:0 5px 5px 0">
            <div class="logo">
                <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <div class="rest">
                <h4>Total Sellers</h4>
                <h3><?php echo get_total_seller($con); ?></h3>
            </div>
        </div>
        <div class="card" style="border:1px solid #e1e4e8;border-radius:0 5px 5px 0">
            <div class="logo">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            </div>
            <div class="rest">
                <h4>Total Orders</h4>
                <h3><?php echo get_total_order($con); ?></h3>
            </div>
        </div>
    </div>
    <div class="rowbtn">
        <div class="b" style="display:flex;flex-direction:column;padding:3rem 2rem" id="cpl">
            <?php
            $t = mysqli_fetch_assoc(mysqli_query($con, "select * from dc where id='1'"));
            ?>
            <h2>Current Minimum Order Amount Without Delivery Charge: <?php echo $t['dc']; ?></h2>
            <input value="<?php echo $t['dc']; ?>" type="text" placeholder="Enter minimum amount for delivery charge" id="sfield" style="width:98.5%;margin:1rem 0;" />
            <h2>Delivery Charge: <?php echo $t['pc']; ?></h2>
            <input value="<?php echo $t['pc']; ?>" type="text" placeholder="Enter minimum amount for delivery charge" id="sfield2" style="width:98.5%;margin:1rem 0;" />
            <button class="add" onclick="dv_charge()">
                <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Update
            </button>
            <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
        </div>
    </div>
    <div class="row2">
        <div class="chart">
            <div class="row">
                <h4>All Sales</h4>
            </div>
            <div class="sd" id="chart_div"></div>
        </div>
        <div class="right">
            <div class="row">
                <h4>All Orders</h4>
            </div>
            <div class="sd" id="piechart"></div>
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
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChartV);
    let y = 20;

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Task", "Hours per Day"],
            ["Total Orders", 20],
            ["Pending", 20],
            ["Confirm", 20],
            ["Intransit", y],
            ["Delivered", 20],
        ]);

        var options = {
            title: "Orders Chart",
            is3D: true,
        };

        var chart = new google.visualization.PieChart(
            document.getElementById("piechart")
        );

        chart.draw(data, options);
    }

    function drawChartV() {
        var data = google.visualization.arrayToDataTable([
            ["Year", "Sales", ""],
            ["12", 1000, 0],
            ["2014", 1170, 0],
            ["2015", 660, 0],
            ["2016", 1030, 0],
        ]);

        var options = {
            title: "All Sales",
            hAxis: {
                title: "Day",
                titleTextStyle: {
                    color: "#333"
                }
            },
            vAxis: {
                title: "Product",
                minValue: 0
            },
        };

        var chart = new google.visualization.AreaChart(
            document.getElementById("chart_div")
        );
        chart.draw(data, options);
    }
</script>
<?php
require('require/foot.php');
?>