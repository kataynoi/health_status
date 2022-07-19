<script src="<?php echo base_url() ?>assets/vendor/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/vendor/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>assets/vendor/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<html>
<body>
<br>

<div class="row">
    <div class="panel panel-info ">
        <div class="panel-heading w3-theme">
            <i class="fa fa-user fa-2x "></i> รายงาน1
             </span>

        </div>
        <div class="panel-body">

        <div class="navbar navbar-default">
                    <form action="#" class="navbar-form">
                        <label class="control-label"> ปี </label>
        <select id="param1" style="width: 200px;" class="form-control">
            <option value=""> เลือก </option>
            <?php
              foreach ($account as $r) {echo "<option value=$r->id > $r->name </option>";} 
            ?>
</select>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" id="get_data" data-name='btn_get_data'>
                                <i class="glyphicon glyphicon-search"></i> แสดง
                            </button>
                        </div>
                    </form>
                <div id="container"></div>
                </div>

            <table id="table_data" class="table table-responsive">
                <thead>
                <tr>
                    <th>name</th><th>GROUP_STAT</th><th>2564_male</th><th>2564_female</th><th>2564_all</th><th>2563_male</th><th>2563_female</th><th>2563_all</th><th>2562_male</th><th>2562_female</th><th>2562_all</th><th>name</th><th>GROUP_STAT</th><th>2564_male</th><th>2564_female</th><th>2564_all</th><th>2563_male</th><th>2563_female</th><th>2563_all</th><th>2562_male</th><th>2562_female</th><th>2562_all</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th colspan="2" style="text-align:right">Total:</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/apps/js/death_group_stat.js" charset="utf-8"></script>

