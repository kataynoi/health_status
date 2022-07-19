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
        <?php echo $report_name; ?>
    </div>
    <div class="panel-body">
<?php echo "Year :".$this->session->userdata('year_ngob');?>
        <div class="navbar navbar-default">
            <form action="<?php echo site_url('report/death_disease/') . $id ?>" class="form-row" method="post">
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
                    <div class="col col-mb-3">
                        <select id="sl_ampurx" name="ampurcode" style="width: 200px;" class="form-control">
                            <option value=""> อำเภอทั้งหมด </option>
                            <?php
                            $sl_amp = $this->session->userdata("ampur");
                            foreach ($amp as $v) {
                                $sl_amp == $v->ampurcodefull ? $selected = 'selected ' : $selected = "";
                                echo '<option value=' . $v->ampurcodefull . ' ' . $selected . '>' . $v->ampurname . '</option>';
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
                    <th>#</th>
                    <th>รายการ</th>
                    <th>ประชากร</th>

                    <th>ชาย</th>
                    <th>หญิง</th>
                    <th>จำนวนผู้เสียชีวิต</th>
                    <th>อัตราตายต่อแสน</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                $total_death = 0;
                $total_male = 0;
                $total_female = 0;

                foreach ($report as $r) {
                    $person = 100;
                    $percent = '';
                    if ($r->death_total > 0) {
                        //$percent = $r->death_total * 100 / $person;
                        $percent = 0.00;
                    } else {
                        $percent = 0.00;
                    }
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$r->name </td>
                    <td>" . number_format(1) . " </td>
                    <td>" . number_format($r->male) . " </td>
                    <td>" . number_format($r->female) . " </td>
                    <td>" . number_format($r->death_total) . " </td>
                    <td>" . number_format($percent, 2) . " </td></tr>";
                    $n++;

                    $total_male += $r->male;
                    $total_female += $r->female;
                    $total_death += $r->death_total;
                    // $total_asm10 +=$r->asm_10; 
                }
                echo "<tr>
                    <td colspan='2'> รวม</td>
                    <td class=''>" . number_format(1) . "</td>
                    <td class=''>" . number_format($total_male) . "</td>
                    <td class=''>" . number_format($total_female) . "</td>
                    <td class=''>" . number_format($total_death) . "</td>
                    <td class=''>" . number_format(1) . "</td>
                    </tr>";

                ?>
            </tbody>

        </table>
        <hr class="hr">

    </div>
</div>

<script src="<?php echo base_url() ?>assets/apps/js/basic.js" charset="utf-8"></script>