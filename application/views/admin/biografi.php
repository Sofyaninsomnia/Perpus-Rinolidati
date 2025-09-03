<?php $this->load->view('layouts/admin/header'); ?>

<body>

    <?php $this->load->view('layouts/admin/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Management Buku</h3>
                            <button class="btn btn-primary mb-2" onclick="location.href='<?= base_url('index.php/admin/biografi/form_buku'); ?>'">Tambah</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun terbit</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php if (empty($buku)) : ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Data buku tidak ada.</td>
                                        </tr>
                                        <?php
                                    else :
                                        $no = 1;
                                        foreach ($buku as $data) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->judul ?></td>
                                                <td>
                                                    <?php
                                                    $kategori_array = explode(', ', $data->kategori_nama);
                                                    foreach ($kategori_array as $kategori) {
                                                        echo '<span class="badge bg-secondary me-1 mt-1">' . $kategori . '</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $data->penulis ?></td>
                                                <td><?php echo $data->penerbit ?></td>
                                                <td><?php echo $data->tahun_terbit ?></td>
                                                <td style="text-align: center;">
                                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                                        <a href="<?= base_url('index.php/admin/biografi/form_edit/' . $data->id); ?>" class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                                        <a href="" class="btn btn-warning btn-sm"><i data-feather="eye"></i></a>
                                                        <form class="delete-form" action="<?= base_url('index.php/admin/biografi/delete_buku/' . $data->id); ?>" method="POST">
                                                            <button class="btn btn-danger btn-sm"><i data-feather="trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: "Apa kamu yakin?",
                        text: "Data ini akan dihapus secara permanen!!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, saya yakin!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            });
        });
    </script>

    <?php $this->load->view('layouts/admin/footer'); ?>