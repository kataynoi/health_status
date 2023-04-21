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
        อายุคาดเฉลี่ย LE (Life Expectancy) เมื่อแรกเกิด เขตสุขภาพที่ 7 รวม
    </div>
    <div class="navbar navbar-default">
        <form action="<?php echo site_url('report/le/') ?>" class="form-row" method="post">
            <div class="row">
                <div class="col col-mb-3 input-group">
                    <select id="sl_prov" name="provcode" style="width: 200px;" class="form-control">
                        <option value=""> จังหวัดทั้งหมด </option>
                        <?php
                        $sl_prov = $this->session->userdata("provcode");
                        foreach ($prov as $v) {
                            $sl_prov == $v->changwatcode ? $selected = 'selected ' : $selected = "";
                            echo '<option value=' . $v->changwatcode . ' ' . $selected . '>' . $v->changwatname . '</option>';
                        }
                        ?>
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" id="btn_audit1" data-name='btn_show'> <i class="fa fa-search" aria-hidden="true"></i> แสดง</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">จังหวัด</th>
                    <th colspan="7" class="text-center">LE(Life Expectancy)</th>
                </tr>
                <tr>
                    <th>2559</th>
                    <th>2560</th>
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                    <th>2565</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                // print_r($le7);
                foreach ($le7 as $r) {
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>" . ($r->prov != '4' ? $r->name : 'เขตสุขภาพที่ 7') . "</td>
                    <td>" . number_format($r->y2016 ? $r->y2016 : 0, 4) . " </td>
                    <td>" . number_format($r->y2017 ? $r->y2017 : 0, 4) . " </td>
                    <td>" . number_format($r->y2018 ? $r->y2018 : 0, 4) . " </td>
                    <td>" . number_format($r->y2019 ? $r->y2019 : 0, 4) . " </td>
                    <td>" . number_format($r->y2020 ? $r->y2020 : 0, 4) . " </td>
                    <td>" . number_format($r->y2021 ? $r->y2021 : 0, 4) . " </td>
                    <td>" . number_format($r->y2022 ? $r->y2022 : 0, 4) . " </td></tr>";
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
        อายุคาดเฉลี่ย LE (Life Expectancy) เมื่อแรกเกิด เขตสุขภาพที่ 7 ชาย
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">จังหวัด</th>
                    <th colspan="7" class="text-center">LE(Life Expectancy)</th>
                </tr>
                <tr>
                    <th>2559</th>
                    <th>2560</th>
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                    <th>2565</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                foreach ($le7_male as $r) {

                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>" . ($r->prov != '4' ? $r->name : 'เขตสุขภาพที่ 7') . "</td>
                    <td>" . number_format($r->y2016 ? $r->y2016 : 0, 4) . " </td>
                    <td>" . number_format($r->y2017 ? $r->y2017 : 0, 4) . " </td>
                    <td>" . number_format($r->y2018 ? $r->y2018 : 0, 4) . " </td>
                    <td>" . number_format($r->y2019 ? $r->y2019 : 0, 4) . " </td>
                    <td>" . number_format($r->y2020 ? $r->y2020 : 0, 4) . " </td>
                    <td>" . number_format($r->y2021 ? $r->y2021 : 0, 4) . " </td>
                    <td>" . number_format($r->y2022 ? $r->y2022 : 0, 4) . " </td></tr>";
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
        อายุคาดเฉลี่ย LE (Life Expectancy) เมื่อแรกเกิด เขตสุขภาพที่ 7 หญิง
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">จังหวัด</th>
                    <th colspan="7" class="text-center">LE(Life Expectancy)</th>
                </tr>
                <tr>
                    <th>2559</th>
                    <th>2560</th>
                    <th>2561</th>
                    <th>2562</th>
                    <th>2563</th>
                    <th>2564</th>
                    <th>2565</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($le7_female as $r) {

                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>" . ($r->prov != '4' ? $r->name : 'เขตสุขภาพที่ 7') . "</td>
                    <td>" . number_format($r->y2016 ? $r->y2016 : 0, 4) . " </td>
                    <td>" . number_format($r->y2017 ? $r->y2017 : 0, 4) . " </td>
                    <td>" . number_format($r->y2018 ? $r->y2018 : 0, 4) . " </td>
                    <td>" . number_format($r->y2019 ? $r->y2019 : 0, 4) . " </td>
                    <td>" . number_format($r->y2020 ? $r->y2020 : 0, 4) . " </td>
                    <td>" . number_format($r->y2021 ? $r->y2021 : 0, 4) . " </td>
                    <td>" . number_format($r->y2022 ? $r->y2022 : 0, 4) . " </td></tr>";
                    $n++;
                }

                ?>
            </tbody>

        </table>
        <hr class="hr">
    </div>
</div>
<script src="<?php echo base_url() ?>assets/apps/js/basic.js" charset="utf-8"></script>