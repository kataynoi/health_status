<br>
<br>

<div class="panel panel-info">
    <div class="panel-heading">

    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ปี</th>
                    <th>มกราคม</th>
                    <th>กุมภาภันธ์</th>
                    <th>มีนาคม</th>
                    <th>เมษายน</th>
                    <th>พฤษภาคม</th>
                    <th>มิถุนายน</th>
                    <th>กรกฎาคม</th>
                    <th>สิงหาคม</th>
                    <th>กันยายน</th>
                    <th>ตุลาคม</th>
                    <th>พฤศจิกายน</th>
                    <th>ธันวาคม</th>
                    <th>รวม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                foreach ($report as $r) {
                    echo "<tr>";
                    echo "<td>$n</td>
                            <td>" . ($r->n_year+543). " </td>
                            <td>" . number_format($r->M01) . " </td>
                            <td>" . number_format($r->M02) . " </td>
                            <td>" . number_format($r->M03) . " </td>
                            <td>" . number_format($r->M04) . " </td>
                            <td>" . number_format($r->M05) . " </td>
                            <td>" . number_format($r->M06) . " </td>
                            <td>" . number_format($r->M07) . " </td>
                            <td>" . number_format($r->M08) . " </td>
                            <td>" . number_format($r->M09) . " </td>
                            <td>" . number_format($r->M10) . " </td>
                            <td>" . number_format($r->M11) . " </td>
                            <td>" . number_format($r->M12) . " </td>
                            <td>" . number_format($r->total) . " </td></tr>";
                    $n++;
                }
                ?>
            </tbody>

        </table>
        <hr class="hr">

    </div>
</div>