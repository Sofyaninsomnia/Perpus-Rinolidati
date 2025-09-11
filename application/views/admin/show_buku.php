<?php $this->load->view('layouts/admin/header'); ?>

<body>

    <?php $this->load->view('layouts/admin/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="d-flex justify-content-center align-items-center flex-column container">
                <div class="card p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Detail Buku</h1>

                        <div class="row">
                            <div class="col-12 col-md-5 d-flex flex-column align-items-center mb-4 mb-md-0">
                                <img src="<?= base_url('uploads/' . $buku->cover); ?>" alt="Cover Buku" class="img-fluid rounded-3" style="max-width: 250px;">
                                <h4 class="card-title mt-3 text-center">Cover Buku</h4>
                            </div>

                            <div class="col-12 col-md-6 offset-md-1">
                                <div class="mb-3">
                                    <label class="fw-bold d-block">Kategori</label>
                                    <?php $buku_kategori_ids = explode(',', $buku->kategori_id ?? ''); ?>
                                    <?php foreach ($kategori_list as $kategori) : ?>
                                        <?php if (in_array($kategori->id, $buku_kategori_ids)) : ?>
                                            <span class="badge bg-secondary me-1 mt-1"><?= $kategori->nama_kategori; ?></span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <hr class="my-3">

                                <div class="d-flex gap-2 mb-2">
                                    <label class="fw-bold">Judul Buku</label>
                                    <span class="ms-auto"><?= htmlspecialchars($buku->judul) ?></span>
                                </div>
                                <hr class="my-3">

                                <div class="d-flex gap-2 mb-2">
                                    <label class="fw-bold">Penulis</label>
                                    <span class="ms-auto"><?= htmlspecialchars($buku->penulis) ?></span>
                                </div>
                                <hr class="my-3">

                                <div class="d-flex gap-2 mb-2">
                                    <label class="fw-bold">Penerbit</label>
                                    <span class="ms-auto"><?= htmlspecialchars($buku->penerbit) ?></span>
                                </div>
                                <hr class="my-3">

                                <div class="d-flex gap-2 mb-2">
                                    <label class="fw-bold">Tahun Terbit</label>
                                    <span class="ms-auto"><?= htmlspecialchars($buku->tahun_terbit) ?></span>
                                </div>
                                <hr class="my-3">

                                <div class="mb-3">
                                    <label class="fw-bold d-block">Deskripsi</label>
                                    <textarea class="form-control" rows="4" readonly><?= htmlspecialchars($buku->deskripsi) ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('index.php/admin/biografi/index'); ?>" class="btn btn-danger mt-4">Kembali</a>
            </div>
        </section>
    </div>

    <?php $this->load->view('layouts/admin/footer'); ?>