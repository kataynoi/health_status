<br>
<br>
<style>
    #page-wrapper {
        margin-left: 0px;
    }
</style>
<?php $ampurName = get_ampur_name($this->session->userdata('amp_code')); ?>
<div class="panel panel-info">
    <div class="panel-heading">
        ปีที่สูญเสียจากการตายก่อนวัยอันควร (Year Life Loss, YLL) รวม <?php echo $ampurName ?>
    </div>

    <div class="panel-body">

        <div class="navbar navbar-default">
            <form action="<?php echo site_url('report/amp_health/') ?>" class="form-row" method="post">
                <div class="row">
                    <div class="col col-mb-3">
                        <select id="sl_prov" name="prov_code" style="width: 200px;" class="form-control">
                            <option value="4" <?php echo $this->session->userdata('prov_code') == 4 ? 'selected' : ''; ?>>เขตสุขภาพที่ 7</option>
                            <option value="40" <?php echo $this->session->userdata('prov_code') == 40 ? 'selected' : ''; ?>>ขอนแก่น</option>
                            <option value="44" <?php echo $this->session->userdata('prov_code') == 44 ? 'selected' : ''; ?>>มหาสารคาม</option>
                            <option value="45" <?php echo $this->session->userdata('prov_code') == 45 ? 'selected' : ''; ?>>ร้อยเอ็ด</option>
                            <option value="46" <?php echo $this->session->userdata('prov_code') == 46 ? 'selected' : ''; ?>>กาฬสินธุ์</option>
                        </select>
                    </div>
                    <select id="sl_ampur" name="amp_code" style="width: 200px;" class="form-control">
                        <option value=""> อำเภอทั้งหมด </option>
                        <?php
                        $sl_amp = $this->session->userdata("amp_code");
                        foreach ($amp as $v) {
                            $sl_amp == $v->ampurcodefull ? $selected = 'selected ' : $selected = "";
                            echo '<option value=' . $v->ampurcodefull . ' ' . $selected . '>[' . $v->ampurcode . '] ' . $v->ampurname . '</option>';
                        }
                        ?>
                    </select>
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
                    <th rowspan="2">ชื่อโรคภาษาอังกฤษ</th>
                    <th rowspan="2">ชื่อโรคภาษาไทย</th>
                    <th colspan="6" class="text-center">(Year Life Loss, YLL)</th>
                </tr>
                <tr>

                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                    <th>2565</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($yll7 as $r) {
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$r->gr_disease </td>
                    <td>$r->gr_diseaseTH </td>
                    <td>" . number_format($r->y2018, 2) . " </td>
                    <td>" . number_format($r->y2019, 2) . " </td>
                    <td>" . number_format($r->y2020, 2) . " </td>
                    <td>" . number_format($r->y2021, 2) . " </td>
                    <td>" . number_format($r->y2022, 2) . " </td></tr>";
                    $n++;
                }

                ?>
            </tbody>

        </table>
        <hr class="hr">
    </div>
</div>


<script src="<?php echo base_url() ?>assets/apps/js/basic.js" charset="utf-8"></script>
<script>
    var amp_code = '<?php echo $this->session->userdata('amp_code') ?>';
    var prov_code = $('#sl_prov').val();
    if (prov_code != '') {}
</script>