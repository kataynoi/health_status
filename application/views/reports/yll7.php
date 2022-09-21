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
    ปีที่สูญเสียจากการตายก่อนวัยอันควร (Year Life Loss, YLL)  รวม
    </div>

    <div class="panel-body">

        <div class="navbar navbar-default">
            <form action="<?php echo site_url('report/yll7/') ?>" class="form-row" method="post">
                <div class="row">
                    <div class="col col-mb-3">
                        <select id="prov_code" name="prov_code" style="width: 200px;" class="form-control">
                            <option value="4" <?php echo $this->session->userdata('prov_code')==4 ? 'selected':'';?>>เขตสุขภาพที่ 7</option>
                            <option value="40" <?php echo $this->session->userdata('prov_code')==40 ? 'selected':'';?>>ขอนแก่น</option>
                            <option value="44" <?php echo $this->session->userdata('prov_code')==44 ? 'selected':'';?>>มหาสารคาม</option>
                            <option value="45" <?php echo $this->session->userdata('prov_code')==45 ? 'selected':'';?>>ร้อยเอ็ด</option>
                            <option value="46" <?php echo $this->session->userdata('prov_code')==46 ? 'selected':'';?>>กาฬสินธุ์</option>
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
                    <th rowspan="2">ชื่อโรคภาษาอังกฤษ</th>
                    <th rowspan="2">ชื่อโรคภาษาไทย</th>
                    <th colspan="5" class="text-center">(Year Life Loss, YLL)</th>
                </tr>
                <tr>
                    
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($yll7 as $r) {
                    switch ($r->prov) {
                        case '4':
                            $provname = 'เขตสุขภาพที่ 7';
                            break;
                        case '40':
                            $provname = 'ขอนแก่น';
                            break;
                        case '44':
                            $provname = 'มหาสารคาม';
                            break;
                        case '45':
                            $provname = 'ร้อยเอ็ด';
                            break;
                        case '46':
                            $provname = 'กาฬสินธ์ุ';
                            break;
                    }
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$r->gr_disease </td>
                    <td>$r->gr_diseaseTH </td>
                    <td>" . number_format($r->y2018, 2) . " </td>
                    <td>" . number_format($r->y2019, 2) . " </td>
                    <td>" . number_format($r->y2020, 2) . " </td>
                    <td>" . number_format($r->y2021, 2) . " </td></tr>";
                    $n++;
                }

                ?>
            </tbody>

        </table>
        <hr class="hr">
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading">
    ปีที่สูญเสียจากการตายก่อนวัยอันควร (Year Life Loss, YLL)  ชาย
    </div>

    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">ชื่อโรคภาษาอังกฤษ</th>
                    <th rowspan="2">ชื่อโรคภาษาไทย</th>
                    <th colspan="5" class="text-center">(Year Life Loss, YLL)</th>
                </tr>
                <tr>
                    
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($yll7_male as $r) {
                    switch ($r->prov) {
                        case '4':
                            $provname = 'เขตสุขภาพที่ 7';
                            break;
                        case '40':
                            $provname = 'ขอนแก่น';
                            break;
                        case '44':
                            $provname = 'มหาสารคาม';
                            break;
                        case '45':
                            $provname = 'ร้อยเอ็ด';
                            break;
                        case '46':
                            $provname = 'กาฬสินธ์ุ';
                            break;
                    }
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$r->gr_disease </td>
                    <td>$r->gr_diseaseTH </td>
                    <td>" . number_format($r->y2018, 2) . " </td>
                    <td>" . number_format($r->y2019, 2) . " </td>
                    <td>" . number_format($r->y2020, 2) . " </td>
                    <td>" . number_format($r->y2021, 2) . " </td></tr>";
                    $n++;
                }

                ?>
            </tbody>

        </table>
        <hr class="hr">
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading">
    ปีที่สูญเสียจากการตายก่อนวัยอันควร (Year Life Loss, YLL) หญิง
    </div>

    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">ชื่อโรคภาษาอังกฤษ</th>
                    <th rowspan="2">ชื่อโรคภาษาไทย</th>
                    <th colspan="5" class="text-center">(Year Life Loss, YLL)</th>
                </tr>
                <tr>
                    
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($yll7_female as $r) {
                    switch ($r->prov) {
                        case '4':
                            $provname = 'เขตสุขภาพที่ 7';
                            break;
                        case '40':
                            $provname = 'ขอนแก่น';
                            break;
                        case '44':
                            $provname = 'มหาสารคาม';
                            break;
                        case '45':
                            $provname = 'ร้อยเอ็ด';
                            break;
                        case '46':
                            $provname = 'กาฬสินธ์ุ';
                            break;
                    }
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$r->gr_disease </td>
                    <td>$r->gr_diseaseTH </td>
                    <td>" . number_format($r->y2018, 2) . " </td>
                    <td>" . number_format($r->y2019, 2) . " </td>
                    <td>" . number_format($r->y2020, 2) . " </td>
                    <td>" . number_format($r->y2021, 2) . " </td></tr>";
                    $n++;
                }

                ?>
            </tbody>

        </table>
        <hr class="hr">
    </div>
</div>

<script src="<?php echo base_url() ?>assets/apps/js/basic.js" charset="utf-8"></script>