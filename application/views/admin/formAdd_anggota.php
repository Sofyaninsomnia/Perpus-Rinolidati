<?php $this->load->view('layouts/admin/header'); ?>

<body>

    <?php $this->load->view('layouts/admin/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Form input anggota</h3>
                        </div>
                        <form action="<?= base_url('index.php/admin/keanggotaan/create_anggota'); ?>" method="POST">
                            <div class="form-control">
                                <div class="form-group">
                                    <label for="nama_kategori">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username anggota..." required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Password..." required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email..." required>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-select">
                                        <option value="" selected disabled>Pilih role</option>
                                        <option value="anggota">Anggota</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <input type="number" name="kontak" class="form-control" placeholder="Nomor aktif...">
                                </div>
                                <div class="form-gorup">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" rows="5" class="form-control" placeholder="Alamat lengkap..."></textarea>
                                </div>
                            </div>
                            <div class="d-flex mt-2 gap-1">
                                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                <button class="btn btn-secondary btn-sm" type="reset">Reset</button>
                                <a href="<?= base_url('index.php/admin/keanggotaan/index'); ?>" class="btn btn-danger btn-sm">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('layouts/admin/footer'); ?>