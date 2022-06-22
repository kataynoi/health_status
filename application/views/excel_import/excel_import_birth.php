<!DOCTYPE html>
<html>

<head>
    <title>How to Import Excel Data into Mysql in Codeigniter</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
    <script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <h3 align="center">นำเข้าข้อมูลจาก Excel</h3>

        <div class="panel panel-primary">
            <div class="panel-heading">
                นำเข้าข้อมูลการเกิดจาก กยผ.
            </div>
            <div class="panel-body">
                <form method="post" id="import_form" enctype="multipart/form-data">
                    <p><label>Select Excel File</label>
                        <input type="file" name="file_birth" id="file_birth" required accept=".xls, .xlsx" />
                    </p>
                    <input type="submit" name="import" value="Import" class="btn btn-info" />
                </form>
                <div class="table-responsive" id="numrow_import_r7"></div>
            </div>
        </div>

    </div>
</body>

</html>

<script>
$(document).ready(function() {

    //load_data();

    function load_data() {
        $.ajax({
            url: "<?php echo site_url(); ?>/excel_import/fetch",
            method: "POST",
            success: function(data) {
                $('#customer_data').html(data);
            }
        })
    }

    $('#import_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo site_url(); ?>/excel_import/import_birth",
            method: "POST",
            data: new FormData(this),
            beforeSend: function() {
                app.show_loading();
            },
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                app.hide_loading();
                $('#file_birth').val('');
                //load_data();
                swal('นำเข้าข้อมูลทั้งหมด ' + data + ' รายการ');
                //$('#numrow_import_r7').html('นำเข้าข้อมูลทั้งหมด ' + data + ' รายการ')
            }
        })
    });


});
</script>