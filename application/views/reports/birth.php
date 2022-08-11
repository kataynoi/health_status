<br>
<br>

<script>
    $('#left_menu').hide();
    $('[data-toggle="tooltip"]').tooltip();
    $('#btn-28').on('click', function() {
        alert('OK');
    });
</script>
<style>
    #page-wrapper {
        margin-left: 0px;
    }
</style>
<div class="panel panel-info">
    <div class="panel-heading">
        อัตราการเกิดต่อแสนประชากร 
    </div>
    <div class="panel-body">
<?php echo "Year :".$this->session->userdata('year_ngob');?>
        <div class="navbar navbar-default">
            <form action="<?php echo site_url('report/birth/');?>" class="form-row" method="post">
                <div class="row">
                    <div class="col col-mb-3">
                        <select id="year_ngob" name="year_ngob" style="width: 200px;" class="form-control">
                            <option value=""> ปีงบประมาณ </option>
                            <?php
                            $year_ngob = $this->config->item('year_ngob');
                            for ($i = $year_ngob; $i >= $year_ngob - 10; $i--) {
                                $selected='';
                                if($i==$this->session->userdata('year_ngob')){
                                    $selected = 'selected';
                                }
                                echo '<option value=' . $i . ' ' . $selected . '>' . $i . '</option>';
                            }

                            ?>
                        </select>
                    </div>
                    <div class="col col-mb-2">
                        <button type="submit" class="btn btn-primary" id="btn_audit1" data-name='btn_show'> <i class="fa fa-search" aria-hidden="true"></i> แสดง</button>
                    </div>

                </div>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">รายการ</th>
                    <th colspan="3">ประชากร</th>
                    <th colspan="3">จำนวนการเกิด</th>
                    <th colspan="3">อัตราเกิดต่อแสน</th>
                </tr>
                <tr>
                    <th>ชาย</th>
                    <th>หญิง</th>
                    <th>รวม</th>
                    <th>ชาย</th>
                    <th>หญิง</th>
                    <th>รวม</th>
                    <th>ชาย</th>
                    <th>หญิง</th>
                    <th>รวม</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                $total_person = 0;
                $total_person_male = 0;
                $total_person_female = 0;
                $total_death = 0;
                $total_male = 0;
                $total_female = 0;

                foreach ($report as $r) {
                    $person = 100;
                    $percent = '';
                    if ($r->death_total > 0) {
                        //$percent = $r->death_total * 100 / $person;
                        $r->person_all>0 ?$percent_all = $r->death_total*100000/$r->person_all:$percent_all = 0.00;;
                        $r->person_male >0 ?$percent_male = $r->male*100000/$r->person_male:$percent_male = 0.00;;
                        $r->person_female >0 ?$percent_female = $r->female*100000/$r->person_female:$percent_female = 0.00;;
                    } else {
                        $percent_all = 0.00;
                        $percent_male = 0.00;
                        $percent_female = 0.00;
                    }
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$r->name </td>
                    <td>" . number_format($r->person_male) . " </td>
                    <td>" . number_format($r->person_female) . " </td>
                    <td>" . number_format($r->person_all) . " </td>
                    <td>" . number_format($r->male) . " </td>
                    <td>" . number_format($r->female) . " </td>
                    <td>" . number_format($r->death_total) . " </td>
                    <td>" . number_format($percent_male, 2) . " </td>
                    <td>" . number_format($percent_female, 2) . " </td>
                    <td>" . number_format($percent_all, 2) . " </td></tr>";
                    $n++;

                    $total_male += $r->male;
                    $total_female += $r->female;
                    $total_death += $r->death_total;
                    $total_person += $r->person_all;
                    $total_person_male += $r->person_male;
                    $total_person_female += $r->person_female;
                    // $total_asm10 +=$r->asm_10; 
                }
                echo "<tr>
                    <td colspan='2'> รวม</td>
                    
                    <td class=''>" . number_format($total_person_male) . "</td>
                    <td class=''>" . number_format($total_person_female) . "</td>
                    <td class=''>" . number_format($total_person) . "</td>
                    <td class=''>" . number_format($total_male) . "</td>
                    <td class=''>" . number_format($total_female) . "</td>
                    <td class=''>" . number_format($total_death) . "</td>
                    <td class=''>" . number_format($total_person_male >0 ?$total_male*100000/$total_person_male:0,2) . "</td>
                    <td class=''>" . number_format($total_person_female >0 ?$total_female*100000/$total_person_female:0,2) . "</td>
                    <td class=''>" . number_format($total_person >0?$total_death*100000/$total_person:0,2) . "</td>
                    </tr>";

                ?>
            </tbody>

        </table>
        <hr class="hr">

    </div>
</div>

<script src="<?php echo base_url() ?>assets/apps/js/basic.js" charset="utf-8"></script>