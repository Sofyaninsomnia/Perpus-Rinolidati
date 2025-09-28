<?php $this->load->view('layouts/admin/header'); ?>

<body>

    <?php $this->load->view('layouts/admin/aside'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Dashboard</h3>
        </div>
        <section class="section">
            <div class="row mb-2">
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center ">
                                <i data-feather="book-open" style="width: 50px; height: 50px;"></i>
                                <div class="d-flex align-items-center mt-4">
                                    <h4><span>Total Buku: </span><?php echo $buku ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center ">
                                <i data-feather="users" style="width: 50px; height: 50px;"></i>
                                <div class="d-flex align-items-center mt-4">
                                    <h4><span>Anggota: </span><?php echo $anggota ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center ">
                                <i data-feather="grid" style="width: 50px; height: 50px;"></i>
                                <div class="d-flex align-items-center mt-4">
                                    <h4><span>Kategori: </span><?php echo $kategori ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center ">
                                <i data-feather="book" style="width: 50px; height: 50px;"></i>
                                <div class="d-flex align-items-center mt-4">
                                    <h4><span>Pinjaman: </span><?php echo $pinjam ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('layouts/admin/footer'); ?>