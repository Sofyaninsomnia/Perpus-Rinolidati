<?php $this->load->view('layouts/admin/header'); ?>

<body>

    <?php $this->load->view('layouts/admin/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Form input Buku</h3>
                        </div>
                        <form action="<?= base_url('index.php/admin/biografi/create_buku'); ?>" method="POST" class="form-input" enctype="multipart/form-data">
                            <label for="kategori" >Kategori</label>
                            <div class="form-group d-flex gap-2">
                                <?php foreach ($kategori_list as $kategori): ?>
                                <input type="checkbox" name="kategori[]" value="<?php echo $kategori->id; ?>" >
                                <?php echo $kategori->nama_kategori; ?><br>
                            <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Buku</label>
                                <input type="text" name="judul" class="form-control" placeholder="Judul buku..." required>
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input type="text" name="penulis" class="form-control" placeholder="Penulis buku..." required>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit buku..." required>
                            </div>
                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="number" value="<?php echo date('Y'); ?>" name="tahun_terbit" min="1800" max="<?php echo date('Y'); ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Buku</label>
                                <textarea name="deskripsi" rows="5" class="form-control" placeholder="Deskripsi buku..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cover">Cover buku</label>
                                <input type="file" name="cover" class="form-control" required>
                            </div>
                            <div class="d-flex gap-1">
                                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                <button class="btn btn-secondary btn-sm" type="reset">Reset</button>
                                <a href="<?= base_url('index.php/admin/biografi/index'); ?>" class="btn btn-danger btn-sm">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('layouts/admin/footer'); ?>