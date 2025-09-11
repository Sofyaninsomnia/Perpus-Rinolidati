<?php $this->load->view('layouts/user/header'); ?>

<body>
    <?php $this->load->view('layouts/user/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="d-flex justify-content-center align-items-center flex-column container">
                <div class="card p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Pinjam Buku</h1>

                        <div class="row">
                            <div class="col-12 col-md-6 mb-4 mb-md-0">
                                <img src="<?= base_url('uploads/' . $buku->cover); ?>" alt="Cover Buku" class="img-fluid rounded-3" style="max-width: 150px;">
                            </div>
                            <div class="col-12 col-md-5 offset-md-1">
                               <form action="<?= base_url('index.php/user/sirkulasi/simpan_pinjaman'); ?>" method="POST">
                                <input type="hidden" name="buku_id" value="<?= $buku->id ?>">   
                                 <div class="form-group">
                                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                                    <input type="date" name="tgl_pinjam" value="<?= date('Y-m-d'); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_kembali">Tanggal Kembali</label>
                                    <input type="date" name="tgl_kembali" class="form-control">
                                </div>
                                <input type="hidden" name="denda" value="0">
                                <button type="submit" class="btn btn-primary">Pinjam</button>
                               </form>
                            </div>
                            <div class="col-6 col-md-12">
                                <div class="mt-4">
                                        <label class="fw-bold d-block">Kategori</label>
                                        <?php $buku_kategori_ids = explode(',', $buku->kategori_id ?? ''); ?>
                                        <?php foreach ($kategori_list as $kategori) : ?>
                                            <?php if (in_array($kategori->id, $buku_kategori_ids)) : ?>
                                                <span class="badge bg-secondary me-1 mt-1"><?= $kategori->nama_kategori; ?></span>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <hr class="me-y">   
                                    <div class="d-flex justify-content-between mb-2">
                                        <label class="fw-bold">Judul Buku</label>
                                        <span class="ms-auto"><?= htmlspecialchars($buku->judul) ?></span>
                                    </div>
                                    <hr class="me-y">
                                    <div class="d-flex justify-content-between mb-2">
                                        <label class="fw-bold">Penulis</label>
                                        <span class="ms-auto"><?= htmlspecialchars($buku->penulis) ?></span>
                                    </div>
                                    <hr class="me-y">
                                    <div class="d-flex justify-content-between mb-2">
                                        <label class="fw-bold">Penerbit</label>
                                        <span class="ms-auto"><?= htmlspecialchars($buku->penerbit) ?></span>
                                    </div>
                                    <hr class="me-y">
                                    <div class="d-flex justify-content-between mb-2">
                                        <label class="fw-bold">Tahun Terbit</label>
                                        <span class="ms-auto"><?= htmlspecialchars($buku->tahun_terbit) ?></span>
                                    </div>
                                    <hr class="me-y">
                                    <div class="mb-3">
                                        <label class="fw-bold d-block">Deskripsi</label>
                                        <textarea class="form-control" rows="4" readonly><?= htmlspecialchars($buku->deskripsi) ?></textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('index.php/user/sirkulasi/index'); ?>" class="btn btn-danger mt-4">Kembali</a>
            </div>

        </section>

    </div>

    <?php $this->load->view('layouts/user/footer'); ?>