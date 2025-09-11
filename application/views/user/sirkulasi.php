<?php $this->load->view('layouts/user/header'); ?>

<body>
    <?php $this->load->view('layouts/user/aside'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Sirkulasi Peminjaman & Pengembalian Buku</h3>
        </div>
        <section class="section">
            <div class="" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <form action="<?= base_url('index.php/user/sirkulasi/search'); ?>" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari buku...">
                        <button class="btn btn-outline-primary" type="submit" id="button-subscribe"><i data-feather="search"></i></button>
                    </div>
                </form>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <?php if(empty($buku)){ ?>
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="col-lg-8 text-center alert alert-danger">Buku tidak ditemukan</div>
                            <button onclick="location.href='<?= base_url('index.php/user/sirkulasi/index'); ?>'" class="btn btn-info btn-sm"><i data-feather="refresh-cw"></i></button>
                        </div>
                    <?php } ?>
                    <?php foreach ($buku as $data) : ?>
                        <?php
                        $kategori_list = explode(', ', $data->kategori_nama ?? '');
                        ?>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                            <img src="<?= base_url('uploads/' . $data->cover); ?>" class="img-fluid rounded-3" alt="">
                            <div class="mt-2 d-flex gap-1">
                                <?php
                                $buku_id = $data->id;
                                $user_id = $this->session->userdata('id');
                                $cek = $this->Sirkulasi_model->cek_pinjaman($buku_id, $user_id);
                                if ($cek): ?>
                                   <button class="btn btn-info">Buku ini sudah anda pinjam</button>
                                <?php else: ?>
                                    <a href="<?= base_url('index.php/user/sirkulasi/pinjam_buku/' . $data->id); ?>" class="btn btn-success btn-sm">Pinjam</a>
                                    <?php endif ?>
                                    <a href="<?= base_url('index.php/user/sirkulasi/show_buku/' . $data->id); ?>" class="btn btn-warning btn-sm">Detail</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>


        </section>
    </div>

     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.form-pengembalian');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: "Kembalikan buku?",
                        text: "Buku ini akan dikembalikan!",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, balikin!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            });
        });
    </script>

    <?php $this->load->view('layouts/user/footer'); ?>