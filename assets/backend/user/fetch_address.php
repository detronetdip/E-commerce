<?php
 require('../../../utility/utility.php');
 $template='';
 $uid=$_SESSION['USER_ID'];
 $res=mysqli_query($con,"select user_address.*,city.city_name from user_address,city where user_address.uid='$uid' and user_address.user_city=city.id");
 while($row=mysqli_fetch_assoc($res)){
     $template=$template.'
        <div class="address-item">
        <input type="radio" name="dv-ad" value="'.$row['id'].'"
        style="width:2rem; height:1.5rem;margin-right:0.8rem;margin-top:0;">
        <div class="address-icon1">
            <i class="uil uil-home"></i>
        </div>
        <div class="address-dt-all">
            <h4>'.$row['type_ad'].'</h4>
            <p>
                '.$row['user_name'].', '.$row['user_local'].', '.$row['user_add'].',
                '.$row['city_name'].', '.$row['user_pin'].',<br>'.$row['user_mobile'].'
            </p>
        </div>
        </div>
     ';
 }
echo $template;
?>