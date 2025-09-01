<?php $this->load->view('layouts/admin/header'); ?>

<body>

    <?php $this->load->view('layouts/admin/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Kategori</h3>
                            <button class="btn btn-primary mb-2">Tambah</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php if (empty($kategori)) : ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Data kategori tidak ada.</td>
                                    </tr>
                                    <?php
                                    else : 
                                    $no = 1;
                                    foreach ($kategori as $data) : ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('layouts/admin/footer'); ?>