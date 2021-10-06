<div class="head">
    <div class="ham-name">
        <div class="mnu vy" onclick="hide()" id="mn">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="mnu ty" onclick="op_n()" id="mn">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="nm">Dashbord</div>
    </div>
    <div class="profile">
        <a href="javascript:void(0)">
            <img src="assets/images/pic1.jpg" alt="" />
        </a>
        <div class="name">
            <span style="width: 4rem; text-overflow: ellipsis; overflow: hidden;">
            <?php 
                print_r(explode(" ",seller_name($con))[0]);
            ?>
        </span>
            <small>seller</small>
        </div>
        <div class="hover-bot">
            <ul>
                <li>
                    <a href="profile.php?<?php echo R_v(); ?>=<?php echo hash_code() ?>&v=<?php echo hash_code() ?>">
                        <i class="uil uil-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="logout()">
                        <i class="uil uil-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>