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
                            <button class="btn btn-primary mb-2" onclick="location.href='<?= base_url('index.php/admin/kategori/form_add'); ?>'">Tambah</button>
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
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->nama_kategori ?></td>
                                                <td class="d-flex gap-1">
                                                    <a href="<?= base_url('index.php/admin/kategori/form_edit/' . $data->id); ?>" class="btn btn-primary btn-sm"><i data-feather="edit"></i></a>
                                                    <form class="delete-form" action="<?= base_url('index.php/admin/kategori/hapus/' . $data->id); ?>" method="POST">
                                                        <button class="btn btn-danger btn-sm"><i data-feather="trash"></i></button>
                                                    </form>
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