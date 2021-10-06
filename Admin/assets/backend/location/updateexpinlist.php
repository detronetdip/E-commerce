<?php
require('../../../../utility/utility.php');
$template=' <div class="b" style="display:flex;flex-direction:column;padding:3rem 2rem">
<div class="row" style="height:3rem; display:flex;justify-content:space-between;">
    <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
    Slno
    </div>
    <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
    Pin
    </div>
    <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
    Action
    </div>
</div>
</div>';
$query2="select * from expin order by id desc";
            $res2=mysqli_query($con,$query2);
            $i=1;
            while($rowt=mysqli_fetch_assoc($res2)){
                $template=$template.'
                <div class="b" style="display:flex;flex-direction:column;padding:3rem 2rem">
                <div class="row" style="height:3rem; display:flex;justify-content:space-between;">
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                    '. $i.'
                    </div>
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                    '.$rowt['pin'].'
                    </div>
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                    <i class="fa fa-trash" aria-hidden="true" onclick="deleteexclude('.$rowt['id'].')"></i>
                    </div>
                </div>
            </div>
                ';
                $i++;
            }
            echo $template;
?>