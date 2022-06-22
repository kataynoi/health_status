<br>
<br>

<style>
#page-wrapper {
    margin-left: 0px;
}
</style>
<div class="panel panel-info">
    <div class="panel-heading">
        กลุ่มเป้าหมายก้าวท้าใจของจังหวัดมหาสารคาม
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อ อสม.</th>
                    <th>หมู่บ้าน</th>
                    <th>จำนวนเป้าหมาย</th>
                    <th>จำนวนลงทะเบียนก้าวท้าใจ (Season 4)</th>
                    <th>ร้อยละ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n=1;$total1=0;$total2=0;
                foreach ($report as $r) {
                    $percent=($r->result==0)? 0 :$r->result*100/$r->target;
                echo "<tr>";
                echo "<td>$n</td>
                    <td>$r->NAME $r->LNAME </td>
                    <td>".get_address($r->vhid)." </td>
                    <td>".number_format($r->target)." </td>
                    <td>".number_format($r->result)." </td>
                    <td>".number_format($percent,2)." </td>

                    "
                    ;
                    $n++;
                    $total1 +=$r->target;
                    $total2 +=$r->result;
            }
            echo "<tr>
                  <td colspan='3'> รวม</td>
                    
                    <td class='text-center'>" . number_format($total1) . "</td>
                    <td class='text-center'>" . number_format($total2) . "</td>
                    <td class='text-center'>" . @number_format($total2*100/$total1,2) . "</td>
  
                    </tr>"
            ?>
            </tbody>

        </table>
        <hr class="hr">

    </div>
</div>

<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>