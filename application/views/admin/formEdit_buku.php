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
                        <form action="<?= base_url('index.php/admin/biografi/update_buku/' . $buku->id); ?>" method="POST" class="form-input" enctype="multipart/form-data">
                            <div class="form-control">
                                <label for="kategori">Kategori</label>
                                <div class="form-group d-flex gap-2">
                                    <?php $buku_kategori_ids = explode(',', $buku->kategori_id ?? ''); ?>
                                    <?php foreach ($kategori_list as $kategori) :
                                        $is_checked = in_array($kategori->id, $buku_kategori_ids); ?>
                                        <input type="checkbox" name="kategori[]" value="<?php echo $kategori->id; ?>" id="kategori_<?php echo $kategori->id; ?>" <?php echo $is_checked ? 'checked' : ''; ?>>
                                        <?php echo $kategori->nama_kategori; ?><br>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul Buku</label>
                                    <input type="text" name="judul" value="<?php echo $buku->judul ?>" class="form-control" placeholder="Judul buku..." required>
                                </div>
                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" name="penulis" value="<?php echo $buku->penulis ?>" class="form-control" placeholder="Penulis buku..." required>
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" name="penerbit" value="<?php echo $buku->penerbit ?>" class="form-control" placeholder="Penerbit buku..." required>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="number" value="<?php echo $buku->tahun_terbit ?>" name="tahun_terbit" min="1800" max="<?php echo date('Y'); ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Buku</label>
                                    <textarea name="deskripsi" rows="5" class="form-control" placeholder="Deskripsi buku..."><?php echo $buku->deskripsi ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cover">Cover buku</label><small class="text-danger"> Kosongkan jika cover tidak ingin diubah</small><br>
                                    <?php if (!empty($buku->cover)) : ?>
                                        <div class="mb-2">
                                            <img src="<?= base_url('uploads/' . $buku->cover); ?>" alt="Cover Buku" style="max-width: 150px; border-radius: 8px;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="cover" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex mt-2 gap-1">
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