<script src="<?php echo base_url() ?>js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<link href="<?php echo base_url() ?>css/dataTables.bootstrap4.min.css" rel="stylesheet">

<html>

<body>
    <br>

    <div class="row">
        <div class="panel panel-info ">
            <div class="panel-heading w3-theme">
                <i class="fa fa-user fa-2x "></i> รายชื่อกลุ่มเป้าหมายลงทะเบียนก้าวท้าใจ <?php echo $this->session->userdata('fullname') ?>
                </span>
                <span class='pull-right'><a href="<?php echo site_url('home/search_home'); ?>" class="btn btn-success">เพิ่มหลังคาเรือนรับผิดชอบ</a></span>
            </div>
            <div class="panel-body">

                <table id="table_data" class="table table-responsive" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>HID</th>
                            <th>บ้านเลขที่</th>
                            <th>เจ้าของบ้าน</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() ?>assets/apps/js/home.js" charset="utf-8"></script>