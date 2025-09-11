<?php $this->load->view('layouts/user/header'); ?>

<body>
    <?php $this->load->view('layouts/user/aside'); ?>

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
                                    <h4><span>Total Buku: </span>1234</h4>
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
                                    <h4><span>Anggota: </span>1234</h4>
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
                                    <h4><span>Kategori: </span>1234</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center ">
                                <i data-feather="star" style="width: 50px; height: 50px;"></i>
                                <div class="d-flex align-items-center mt-4">
                                    <h4><span>Rating: </span>1234</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('layouts/user/footer'); ?>