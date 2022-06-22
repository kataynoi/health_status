<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
   
    <script src="<?php echo base_url()?>assets/vendor/js/jquery.blockUI.js"></script>
    <!-- Bootstrap Core CSS -->

    <link href="<?php echo base_url()?>assets/vendor/css/style.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/vendor/css/metisMenu.min.css" rel="stylesheet">
    <!--<link href="<?php /*echo base_url()*/?>assets/vendor/css/left.css" rel="stylesheet"-->
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/vendor/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/vendor/css/freeow.css" rel="stylesheet">
    <!--Set Color Page-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <!--
        https://www.w3schools.com/w3css/w3css_color_themes.asp
    -->
    <!-- theme Color-->

    <!-- Alert Css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/v4-shims.css">
    <!-- Alert Css-->

    <!-- Custom Fonts -->
    <style>
    @import url('https://fonts.googleapis.com/css?family=Kanit');
    </style>
</head>
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
<style>
body {
    font-family: 'Kanit', sans-serif;
    font-size: 90%;
}
</style>
<!-- Custom Fonts -->

<!-- jQuery -->
<script>
$('#left_menu').hide();
</script>
<style>
#page-wrapper {
    margin-left: 0px;
}
</style>

<!-- Bootstrap Core JavaScript -->

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url()?>assets/vendor/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url()?>assets/vendor/js/sb-admin-2.min.js"></script>

<script src="<?php echo base_url()?>assets/vendor/js/underscore.min.js"></script>

<script src="<?php echo base_url()?>assets/vendor/js/jquery.cookie.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/jquery.freeow.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/jquery.numeric.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/numeral.min.js"></script>
<link href="<?php echo base_url()?>assets/vendor/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="<?php echo base_url()?>assets/vendor/js/bootstrap-datepicker-custom.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url()?>assets/apps/js/apps.js"></script>
<script type="text/javascript" charset="utf-8">
var site_url = '<?php echo site_url()?>';
var base_url = '<?php echo base_url()?>';
var user_id = '<?php echo $this->session->userdata('id')?>';
var user_name = '<?php echo $this->session->userdata('fullname')?>';
var year = '<?php echo date('Y')+543;?>';
var n_date = '<?php echo date('d/m/');?>' + year;
var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
console.log(n_date);
</script>

<body>

    <div id="wrapper">
        <div>
            <?php echo $header_for_layout?>
        </div>
        <!-- Navigation -->
        <div>
            <div id="page-wrapper" style="padding-left: 3%;border: 0px;">
                <!-- <button id="hide_left" data-show="true">Hide</button>-->
                <?php echo $content_for_layout?>
            </div>
        </div>
        <div>
            <?php echo $footer_for_layout?>
        </div>

        <!-- /#page-wrapper -->

    </div>
    <div id="freeow" class=" freeow freeow-info freeow-bottom-right"></div>
</body>

</html>