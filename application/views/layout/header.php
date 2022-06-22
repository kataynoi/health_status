<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">สถิติชีพ จังหวัดมหาสารคาม </a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ms-auto">
                <?php if ($this->session->userdata('user_level') == 'hospital') {

                ?>
                    <li class=" nav-item mx-0 mx-lg-1 dropdown">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            จัดการข้อมูล อสม.
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="<?php echo site_url('/asm'); ?>"> เพิ่ม ลบ แก้ไข อสม. </a></li>
                        </ul>
                        </i>
                    </li>
                <?php }
                if ($this->session->userdata('user_level') == 'asm') {
                ?>
                    <li class=" nav-item mx-0 mx-lg-1 dropdown">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            หลังคาเรือนรับผิดชอบ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="<?php echo site_url('/home'); ?>">กำหนดหลังคาเรือนรับผิดชอบ </a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('/person'); ?>"> ประชาชนที่อยู่ในบ้านรับผิดชอบ</a></li>
                        </ul>
                        </i>
                    </li>
                <?php } ?>
                <li class=" nav-item mx-0 mx-lg-1 dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo site_url('/import_death'); ?>">นำเข้าข้อมูลการตาย กยผ. </a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/runner_hosp'); ?>"> รายงานก้าวท้าใจใน หน่วยบริการ</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/runner_ampur'); ?>"> รายงานก้าวท้าใจ รายอำเภอ</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/runner_province'); ?>"> รายงานก้าวท้าใจรายจังหวัด</a></li>
                    </ul>
                    </i>
                </li>
                <li class=" nav-item mx-0 mx-lg-1 dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        อสม.หยิบ 10
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo site_url('/person_asm'); ?>">อสม.หยิบ 10 </a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/asm_hosp'); ?>">อสม. หยิบ 10 หน่วยบริการ</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/asm_ampur'); ?>"> อสม.หยิบ 10 รายอำเภอ</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/asm_province'); ?>"> อสม.หยิบ 10 รายจังหวัด</a></li>
                    </ul>
                    </i>
                </li>

                <?php

                if ($this->session->userdata('asm_login') == 1) {
                    echo "<li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='" . site_url('/user/logout') . "'>ออกจากระบบ</a></li>";
                } else {
                    echo "<li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='" . site_url('/user/login') . "'>เข้าสู่ระบบ</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>