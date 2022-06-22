<script src="<?php echo base_url() ?>js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>css/dataTables.bootstrap4.min.css" rel="stylesheet">

<html>

<body>
    <br>

    <div class="row">
        <div class="panel panel-info ">
            <div class="panel-heading w3-theme">
                <i class="fa fa-user fa-2x "></i> รายชื่อ อสม. <?php echo $this->session->userdata('fullname') ?>
                </span>
                <span class='pull-right'><a href="<?php echo site_url('asm/search_person'); ?>" class="btn btn-success">เพิ่ม อสม.</a></span>
            </div>
            <div class="panel-body">

                <table id="table_data" class="table table-responsive" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>เลขบัตรประชาชน</th>
                            <th>ชื่อ</th>
                            <th>สกุล</th>
                            <th>วันเดือนปีเกิด</th>
                            <th>ที่อยู่</th>
                            <th>อายุ</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() ?>assets/apps/js/asm.js" charset="utf-8"></script>