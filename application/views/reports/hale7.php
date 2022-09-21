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
        อายุคาดเฉลี่ยสุขภาพดีเมื่อแรกเกิด (health adjusted life expectancy: HALE) เขตสุขภาพที่ 7 รวม
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">จังหวัด</th>
                    <th colspan="6" class="text-center">HALE(Health adjusted life expectancy)</th>
                </tr>
                <tr>
                    <th>2559</th>
                    <th>2560</th>
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($hale7 as $r) {
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
                    <td>$provname </td>
                    <td>" . number_format($r->y2016, 4) . " </td>
                    <td>" . number_format($r->y2017, 4) . " </td>
                    <td>" . number_format($r->y2018, 4) . " </td>
                    <td>" . number_format($r->y2019, 4) . " </td>
                    <td>" . number_format($r->y2020, 4) . " </td>
                    <td>" . number_format($r->y2021, 4) . " </td></tr>";
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
        อายุคาดเฉลี่ยสุขภาพดีเมื่อแรกเกิด (health adjusted life expectancy: HALE) เขตสุขภาพที่ 7 ชาย
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">จังหวัด</th>
                    <th colspan="6" class="text-center">HALE(health adjusted life expectancy)</th>
                </tr>
                <tr>
                    <th>2559</th>
                    <th>2560</th>
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($hale7_male as $r) {
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
                    <td>$provname </td>
                    <td>" . number_format($r->y2016, 4) . " </td>
                    <td>" . number_format($r->y2017, 4) . " </td>
                    <td>" . number_format($r->y2018, 4) . " </td>
                    <td>" . number_format($r->y2019, 4) . " </td>
                    <td>" . number_format($r->y2020, 4) . " </td>
                    <td>" . number_format($r->y2021, 4) . " </td></tr>";
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
        อายุคาดเฉลี่ยสุขภาพดีเมื่อแรกเกิด (health adjusted life expectancy: HALE) เขตสุขภาพที่ 7 หญิง
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">จังหวัด</th>
                    <th colspan="6" class="text-center">HALE(Health adjusted life expectancy)</th>
                </tr>
                <tr>
                    <th>2559</th>
                    <th>2560</th>
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($hale7_female as $r) {
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
                    <td>$provname </td>
                    <td>" . number_format($r->y2016, 4) . " </td>
                    <td>" . number_format($r->y2017, 4) . " </td>
                    <td>" . number_format($r->y2018, 4) . " </td>
                    <td>" . number_format($r->y2019, 4) . " </td>
                    <td>" . number_format($r->y2020, 4) . " </td>
                    <td>" . number_format($r->y2021, 4) . " </td></tr>";
                    $n++;
                }

                ?>
            </tbody>

        </table>
        <hr class="hr">
    </div>
</div>
<script src="<?php echo base_url() ?>assets/apps/js/basic.js" charset="utf-8"></script>