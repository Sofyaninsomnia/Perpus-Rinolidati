<div id="app">
    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <img src="<?= base_url(); ?>assets/admin/images/logo.svg" alt="" srcset="">
            </div>
            <div class="sidebar-menu">
                <ul class="menu">


                    <li class='sidebar-title'>Home</li>

                    <?php $current_url = $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>

                    <li class="sidebar-item <?= ($current_url == 'admin/dashboard/index') ? 'active' : '' ?> ">

                        <a href="<?= base_url('index.php/admin/dashboard/index'); ?>" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Dashboard</span>
                        </a>


                    </li>



                    <li class='sidebar-title'>Main menu</li>



                    <li class="sidebar-item <?= ($current_url == 'admin/kategori/index') ? 'active' : '' ?> ">

                        <a href="<?= base_url('index.php/admin/kategori/index'); ?>" class='sidebar-link'>
                            <i data-feather="grid" width="20"></i>
                            <span>Kategori</span>
                        </a>

                    </li>



                    <li class="sidebar-item <?= ($current_url == 'admin/biografi/index') ? 'active' : '' ?> ">

                        <a href="<?= base_url('index.php/admin/biografi/index'); ?>" class='sidebar-link'>
                            <i data-feather="book-open" width="20"></i>
                            <span>Management Buku</span>
                        </a>


                    </li>



                    <li class="sidebar-item <?= ($current_url == 'admin/keanggotaan/index') ? 'active' : '' ?> ">

                        <a href="<?= base_url('index.php/admin/keanggotaan/index'); ?>" class='sidebar-link'>
                            <i data-feather="users" width="20"></i>
                            <span>Management Anggota</span>
                        </a>


                    </li>



                    <li class="sidebar-item <?= ($current_url == 'admin/sirkulasi/index') ? 'active' : '' ?> ">

                        <a href="<?= base_url('index.php/admin/sirkulasi/index'); ?>" class='sidebar-link'>
                            <i data-feather="book" width="20"></i>
                            <span>Sirkulasi</span>
                        </a>


                    </li>


                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <nav class="navbar navbar-header navbar-expand navbar-light">
            <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
            <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                    <li class="dropdown nav-icon me-2">
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="<?= base_url(); ?>"><i data-feather="log-out"></i> Logout</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="avatar me-1">
                                <img src="<?= base_url(); ?>assets/admin/images/avatar/avatar-s-1.png" alt="" srcset="">
                            </div>
                            <div class="d-none d-md-block d-lg-inline-block">Hallo, <?= $this->session->username; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="<?= base_url('index.php/auth/logout'); ?>"><i data-feather="log-out"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>