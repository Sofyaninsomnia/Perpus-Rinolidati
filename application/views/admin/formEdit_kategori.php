<?php $this->load->view('layouts/admin/header'); ?>

<body>

    <?php $this->load->view('layouts/admin/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Form input kategori</h3>
                        </div>
                        <?php foreach ($kategori as $data) : ?>
                            <form action="<?= base_url('index.php/admin/kategori/update_kategori/' . $data->id); ?>" method="POST">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control" value="<?php echo $data->nama_kategori ?>" placeholder="Nama Kategori">
                                </div>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                    <button class="btn btn-secondary btn-sm" type="reset">Reset</button>
                                    <a href="<?= base_url('index.php/admin/kategori/index'); ?>" class="btn btn-danger btn-sm">Kembali</a>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('layouts/admin/footer'); ?>