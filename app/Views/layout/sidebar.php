<?php
$uri = service('uri')->getSegments();

(isset($uri[0]))? $uri0 = $uri[0] : $uri0 = "";
(isset($uri[1]))? $uri1 = $uri[1] : $uri1 = "";

?>



<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url()?>">
                <img src="<?=base_url('Asset') ?>/img/logo/in-logo.png" alt="" style="width:65px">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> --> 
                <!-- <div class="sidebar-brand-text mx-3" style="font-size:9px"></div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($uri0 == '') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mb-0">

                        <!-- Heading -->
                        <!-- <div class="sidebar-heading">
                            Keuangan
                        </div> -->

                    <?php if (in_groups('user')|| in_groups('bendahara') ) : ?>

                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item  <?= ($uri0 == 'kas') ? 'active' : '' ?>  ">
                            <a class="nav-link" href="<?= base_url('kas') ?>">
                                <i class="fa-thin fa-money-bills-simple"></i>                    
                                <span> Kas</span>
                            </a>
                        </li>
                    <?php endif; ?>


            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

                        <!-- Heading -->
                        <!-- <div class="sidebar-heading">
                            Interface
                        </div> -->
                        
                    <?php if (in_groups('sekretaris') || in_groups('ketuadanwakil') ) : ?>
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item <?= ($uri0 == 'anggota') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('anggota') ?>">
                                <i class="fa-regular fa-users" style="font-size: 13px;"></i>                    
                                <span> Anggota</span>
                            </a>
                        </li> 
                    <?php endif; ?>


                    <?php if (in_groups('sekretaris') || in_groups('user') ) : ?>

                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item <?= ($uri0 == 'presensi') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('presensi') ?>">
                                <i class="fa-solid fa-timer" style="font-size: 15px;"></i>           
                                <span> Presensi</span>
                            </a>
                        </li>
                    <?php endif; ?>
             
                    <?php if (in_groups('sekretaris') || in_groups('user') ) : ?> 
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item <?= ($uri0 == 'kegiatan') ? 'active' : '' ?>">
                            <a class="nav-link  " href="<?= base_url('kegiatan') ?>">
                                <i class="fa-solid fa-check" style="font-size: 15px;"></i>           
                                <span> Kegiatan</span>
                            </a>
                        </li>
                    <?php endif; ?>
             
                    <?php if (in_groups('sekretaris')) : ?>  
                        <li class="nav-item <?= ($uri0 == 'laporan') ? 'active' : '' ?>">
                            <a class="nav-link  " href="<?= base_url('laporan') ?>">
                            <i class="fa-solid fa-file" style="font-size: 18px;"></i>           
                                <span> Laporan</span>
                            </a>
                        </li>
                    <?php endif; ?>



            <!-- Divider -->
          <!--   <hr class="sidebar-divider"> -->

                        <!-- Heading -->
                       <!--  <div class="sidebar-heading">
                            Laporan
                        </div> -->

                    
                        <!-- Nav Item - Dashboard -->
                       <!--  <li class="nav-item ">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
                                <i class="fa-solid fa-print"></i>                    
                                <span> Report</span>
                            </a>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="<?=base_url('iuran/report-iuran')?>">Iuran</a>
                                    <a class="collapse-item" href="">Cards</a>
                                </div>
                            </div>
                        </li>
 -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
 
 


            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Persediaan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->



            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

 
            
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
 

</ul>