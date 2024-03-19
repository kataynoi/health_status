<br>
<br>

<div class="panel panel-info">
    <div class="panel-heading">
        จำนวนการตาย 10 ลำดับโรค จัดกลุ่ม 298 กลุ่มโรค <?php echo "ปี ".$this->session->userdata('year')." จังหวัด".
        get_province_name($this->session->userdata('provcode'))." อำเภอ ".get_ampur_name($this->session->userdata('ampurcode'))?>
    </div>
    <div class="panel-body">
        <?php echo "Year :" . $this->session->userdata('year_ngob'); ?>
        <div class="navbar navbar-default">
            <form action="<?php echo site_url('report/top10/')?>" class="form-row" method="post">
                <div class="row">
                    <div class="col col-mb-3">
                        <select id="year" name="year" style="width: 200px;" class="form-control">
                            <option value=""> ปีงบประมาณ </option>
                            <?php
                            $year_ngob = $this->config->item('year_ngob');
                            for ($i = $year_ngob; $i >= $year_ngob - 10; $i--) {
                                $selected = '';
                                if ($i == $this->session->userdata('year')) {
                                    $selected = 'selected';
                                }
                                echo '<option value=' . $i . ' ' . $selected . '>' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col col-mb-3">
                        <select id="sl_prov" name="provcode" style="width: 200px;" class="form-control">
                            <option value="4" <?php echo $this->session->userdata('provcode')==4 ? 'selected':'';?>>เขตสุขภาพที่ 7</option>
                            <option value="40" <?php echo $this->session->userdata('provcode')==40 ? 'selected':'';?>>ขอนแก่น</option>
                            <option value="44" <?php echo $this->session->userdata('provcode')==44 ? 'selected':'';?>>มหาสารคาม</option>
                            <option value="45" <?php echo $this->session->userdata('provcode')==45 ? 'selected':'';?>>ร้อยเอ็ด</option>
                            <option value="46" <?php echo $this->session->userdata('provcode')==46 ? 'selected':'';?>>กาฬสินธุ์</option>
                        </select>
                    </div>
                    <div class="col col-mb-3">
                    <select id="sl_ampur" name="ampurcode" style="width: 200px;" class="form-control">
                    <option value=""> อำเภอทั้งหมด </option>
                            <?php
                            $sl_amp = $this->session->userdata("ampurcode");
                            foreach ($amp as $v) {
                                $sl_amp == $v->ampurcodefull ? $selected = 'selected ' : $selected = "";
                                echo '<option value=' . $v->ampurcodefull . ' ' . $selected . '>['.$v->ampurcode.'] ' . $v->ampurname . '</option>';
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
                    <th rowspan="2">ชื่อกลุ่มโรคภาษาไทย</th>
                    <th rowspan="2">ชื่อกลุ่มโรคภาษาอังกฤษ</th>
                    <th colspan="3">จำนวนผู้เสียชีวิต</th>
                </tr>
                <tr>
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
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$r->t_name </td>
                    <td>$r->e_name </td>
                    <td>" . number_format($r->male) . " </td>
                    <td>" . number_format($r->female) . " </td>
                    <td>" . number_format($r->total) . " </td></tr>";
                    $n++;
                }
                ?>
            </tbody>

        </table>
        <hr class="hr">

    </div>
</div>