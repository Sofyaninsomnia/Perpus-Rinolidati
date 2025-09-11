<?php $this->load->view('layouts/admin/header'); ?>

<body>

    <?php $this->load->view('layouts/admin/aside'); ?>

    <div class="main-content container-fluid">
        <section class="section">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Sirkulasi peminjaman dan pengembalian</h3>
                        <div class="table-responsive">
                            <a href="<?= base_url('index.php/admin/sirkulasi/print'); ?>" class="btn btn-success btn-sm mb-2 "><i data-feather="printer"></i></a>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Buku</th>
                                    <th>status</th>
                                    <th>Denda</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php if (empty($sirkulasi)){ ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $no = 1;
                                    foreach ($sirkulasi as $data) :?>
                                    <tr>
                                        <td><?php echo $no++ ;?></td>
                                        <td><?php echo $data->username ?></td>
                                        <td><?php echo $data->judul ?></td>
                                        <td><?php echo $data->status ?></td>
                                        <td>Rp. <?php echo number_format($data->denda, 0, ',' , '.') ?></td>
                                        <td>
                                            <form class="delete-form" action="<?= base_url('index.php/admin/sirkulasi/delete/' . $data->id); ?>" method="POST">
                                                <button class="btn btn-danger btn-sm"><i data-feather="trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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