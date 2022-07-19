<body class=" w3-theme">
    <br>
    <div class="container w3-theme ">

        <div class="row" id="pwd-container">
            <div class="col-md-4">
                <section class="login-form">
                    <form method="post" action="#" role="login" id="frm_login">
                        <h4 class="text-center">เข้าสู่ระบบ</h4>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="USername">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <input type="hidden" name="csrf_token" value="<?php echo $this->security->get_csrf_hash() ?>">
                    </form method="post">
                    <div class="text-center">
                        <button type="submit" id='btn_login' class="btn btn-primary btn-lg">เข้าสู่ระบบ</button>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="<?php echo base_url() ?>assets/apps/js/users.login.js"></script>