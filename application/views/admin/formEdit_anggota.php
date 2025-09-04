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
                        <?php foreach ($users as $data) : ?>
                            <form action="<?= base_url('index.php/admin/keanggotaan/update_user/' . $data->id); ?>" method="POST">
                                <div class="form-control">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $data->username ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?php echo $data->email ?>" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" class="form-select">
                                            <option value="anggota" <?php if ($data->role == 'anggota') echo 'selected'; ?>>Anggota</option>
                                            <option value="admin" <?php if ($data->role == 'admin') echo 'selected'; ?>>Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kontak">Kontak</label>
                                        <input type="number" name="kontak" class="form-control" value="<?php echo $data->kontak ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" rows="5" class="form-control"><?php echo $data->alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="d-flex mt-2 gap-1">
                                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                    <button class="btn btn-secondary btn-sm" type="reset">Reset</button>
                                    <a href="<?= base_url('index.php/admin/keanggotaan/index'); ?>" class="btn btn-danger btn-sm">Kembali</a>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('layouts/admin/footer'); ?>