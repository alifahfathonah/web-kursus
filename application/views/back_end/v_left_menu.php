<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url(<?php echo base_url('assets/backend/assets/images/background/user-info.jpg')?>) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="<?php echo base_url('assets/backend/assets/images/users/avatar.png')?>" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"><a><?php echo $this->session->userdata('USERNAME') ?></a>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation admin-->
        <?php if($this->session->userdata('LEVEL_ROLE') == 1){ ?>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Web Content</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>web_content/banner/">Banner</a></li>
                        <li><a href="<?php echo base_url(); ?>web_content/tentangkami/">Tentang Kami</a></li>
                        <li><a href="<?php echo base_url(); ?>web_content/program/">Program</a></li>
                        <li><a href="<?php echo base_url(); ?>web_content/blog/">Blog</a></li>
                        <li><a href="<?php echo base_url(); ?>web_content/galeri/">Galeri</a></li>
                        <li><a href="<?php echo base_url(); ?>web_content/hubungikami/">Hubungi Kami</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Manage Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>user/">List User</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-gears"></i><span class="hide-menu">Web Config</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>web_config/">Web Config</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php } ?>
        <!-- End Sidebar navigation admin-->
        <!-- Sidebar navigation akuntan-->
        <?php if($this->session->userdata('LEVEL_ROLE') == 2){ ?>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">List Transaksi</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>akuntan/list_transaksi/">List Transaksi</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">My Profile</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>akuntan/myprofile/">My Profile</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php } ?>
        <!-- End Sidebar navigation akuntan -->
        <!-- Sidebar navigation siswa-->
        <?php if($this->session->userdata('LEVEL_ROLE') == 3){ ?>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="has-arrow waves-effect waves-dark " href="#" aria-expanded="false"><i class="fa fa-product-hunt"></i><span class="hide-menu">Program</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>siswa/program/">Program</a></li>
                        <li><a href="<?php echo base_url(); ?>siswa/history/">History Transaksi</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">My Profile</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>siswa/myprofile/">My Profile</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php } ?>
        <!-- End Sidebar navigation siswa -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
