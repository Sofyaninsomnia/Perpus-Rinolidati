<?php $this->load->view('layouts/user/header'); ?>

<body>
    <?php $this->load->view('layouts/user/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Daftar buku yang dipinjam</h2>
                    <?php
                    if (empty($peminjaman)) : ?>
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Denda</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <?php if (empty($list_peminjaman)) : ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                    <?php else : ?>
                                        <?php $no = 1;
                                        foreach ($list_peminjaman as $data) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->judul_buku ?></td>
                                                <td><?php echo date('d M Y', strtotime($data->tgl_pinjam)); ?></td>
                                                <td><?php echo date('d M Y', strtotime($data->tgl_kembali)); ?></td>
                                                <td><?php echo number_format($data->denda, 0, ',', '.') ?></td>
                                                <td><?php echo $data->status ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <?php foreach ($peminjaman as $pinjam) : ?>
                            <div class="d-flex gap-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-column">
                                        <img src="<?= base_url('uploads/' . $pinjam->cover_buku); ?>" alt="Cover buku" class="img-fluid" style="max-width: 200px;">
                                        <p>Jatuh Tempo: <?= date('d M Y', strtotime($pinjam->tgl_kembali)); ?></p>
                                        <form action="<?= base_url('index.php/user/sirkulasi/kembalikan_buku/' . $pinjam->id); ?>" method="POST">
                                            <input type="hidden" name="tanggal_pengembalian" value="<?= date('Y-m-d'); ?>">
                                            <button type="submit" class="btn btn-danger mt-2 btn-sm">Kembalikan</button>
                                        </form>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif ?>
                                </div>
                            </div>
                </div>
            </div>
        </section>
    </div>
    <?php $this->load->view('layouts/user/footer'); ?>