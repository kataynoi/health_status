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
        กลุ่มเป้าหมายก้าวท้าใจของจังหวัดมหาสารคาม
    </div>
    <div class="panel-body">

        <div class="navbar navbar-default">
            <form action="<?php echo site_url('report/runner_ampur') ?>" class="form-inline" method="post">
                <div class="input-group mb-3">
                    <select id="sl_ampurx" name="ampurcode" style="width: 200px;" class="form-control">
                        <option value=""> อำเภอทั้งหมด </option>
                        <?php
                        $sl_amp = $this->session->userdata("sl_amp");
                        foreach ($amp as $v) {
                            $sl_amp == $v->ampurcodefull ? $selected = 'selected ' : $selected = "";
                            echo '<option value=' . $v->ampurcodefull . ' ' . $selected . '>' . $v->ampurname . '</option>';
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary" id="btn_audit1" data-name='btn_show'> <i class="fa fa-search" aria-hidden="true"></i> แสดง</button>
                </div>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รายการ</th>
                    <th>จำนวน อสม.</th>
                    <th>อสม. ที่ลงทะเบียนหยิบ 10 ก้าวท้าใจ</th>
                    <th>ร้อยละ อสม. ที่ลงทะเบียนหยิบ 10 ก้าวท้าใจ</th>
                    <th>จำนวนที่หยิบ 10 ก้าวท้าใจ</th>
                    <th>จำนวนที่หยิบ 10 ก้าวท้าใจ และสมัครแล้ว (Season 4)</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                $total1 = 0;
                $total2 = 0;
                $total_asm = 0;
                $total_asm10 = 0;
                foreach ($report as $r) {
                    $percent = '';
                    if ($r->target > 0) {
                        $percent = $r->result * 100 / $r->target;
                    } else {
                        $percent = 0.00;
                    }
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$r->name </td>
                    <td>" . number_format($r->asm) . " </td>
                    <td>" . number_format($r->asm_10) . " </td>
                    <td>" . number_format($r->asm_10 * 100 / $r->asm, 2) . " </td>
                    <td>" . number_format($r->target) . " </td>
                    <td>" . number_format($r->result) . " </td>
                    <td>" . number_format($percent, 2) . " </td></tr>
                    ";
                    $n++;
                    $total1 += $r->target;
                    $total2 += $r->result;
                    $total_asm += $r->asm;
                    $total_asm10 += $r->asm_10;
                }
                echo "<tr>
                    <td colspan='2'> รวม</td>
                    <td class=''>" . number_format($total_asm) . "</td>
                    <td class=''>" . number_format($total_asm10) . "</td>
                    <td class=''>" . number_format($total_asm10 * 100 / $total_asm, 2) . "</td>
                    <td class=''>" . number_format($total1) . "</td>
                    <td class=''>" . number_format($total2) . "</td>
                    <td class=''>" . number_format($total2 * 100 / $total1, 2) . "</td>
                    </tr>";
                ?>
            </tbody>

        </table>
        <hr class="hr">

    </div>
</div>

<script src="<?php echo base_url() ?>assets/apps/js/basic.js" charset="utf-8"></script>