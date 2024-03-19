<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">สถิติชีพ เขตสุขภาพที่ 7 <?php echo " " . $this->session->userdata('prov'); ?></a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ms-auto">
                <?php if ($this->session->userdata('user_level') == 'admin') {

                ?>
                    <li class=" nav-item mx-0 mx-lg-1 dropdown">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="<?php echo site_url('/excel_import/death_home'); ?>">นำเข้าข้อมูลการตาย [HOME] กยผ. </a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('/excel_import/death_hos'); ?>">นำเข้าข้อมูลการตาย [HOSPITAL] กยผ. </a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('/excel_import/birth'); ?>">นำเข้าข้อมูลการเกิด กยผ. </a></li>
                            <li class="divider"></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('/report/deathInMonth'); ?>">ข้อมูลการตายรายเดือน</a></li>

                        </ul>
                        </i>
                    </li>

                <?php } ?>
                <li class=" nav-item mx-0 mx-lg-1 dropdown">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Reports
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo site_url('//report/birth'); ?>">อัตราเกิดต่อแสนประชากร </a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('//report/death_disease/19'); ?>">อัตราตายต่อแสนประชากร </a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/disease'); ?>">สาเหตุการตายรายโรค </a></li>
                        <li class="divider"></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/le'); ?>">LE (Life Expectancy)</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/hale'); ?>">HALE (Health-adjusted life expectancy)</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/yll7'); ?>">YLL (Years of life lost)</a></li>
                        <li class="divider"></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/amp_health'); ?>">ข้อมูลพื้นฐานรายอำเภอ </a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('/report/top10'); ?>">จำนวนการตาย 10 ลำดับแรก </a></li>

                    </ul>
                    </i>
                </li>

                <?php

                if ($this->session->userdata('prov_login') == 1) {
                    echo "<li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='" . site_url('/user/logout') . "'>ออกจากระบบ</a></li>";
                } else {
                    echo "<li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='" . site_url('/user/login') . "'>เข้าสู่ระบบ</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>