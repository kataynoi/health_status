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
    </div>
    <div class="panel-body">
        <div class="navbar navbar-default">

        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รายงาน</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;

                foreach ($report_items as $r) {

                    echo "<tr>";
                    echo "<td>$n</td>
                    <td><a href=".site_url('/report/death_disease/').$r->id." target='_blank' class='text-decoration-none'>$r->name </a></td></tr>";
                    $n++;
                }

                ?>
            </tbody>

        </table>
        <hr class="hr">

    </div>
</div>

<script src="<?php echo base_url() ?>assets/apps/js/basic.js" charset="utf-8"></script>