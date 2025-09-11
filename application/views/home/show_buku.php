<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/app.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/admin/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css">
</head>

<body>
    <div class="main-content container-fluid">
        <section class="section">
            <div class="d-flex justify-content-center align-items-center flex-column container">
                <div class="card p-4 mt-4">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Detail Buku</h1>

                        <div class="row">
                            <div class="col-12 col-md-5 d-flex flex-column align-items-center mb-4 mb-md-0">
                                <img src="<?= base_url('uploads/' . $buku->cover); ?>" alt="Cover Buku" class="img-fluid rounded-3" style="max-width: 250px;">
                                <h4 class="card-title mt-3 text-center">Cover Buku</h4>
                            </div>

                            <div class="col-12 col-md-6 offset-md-1">
                                <div class="mb-3">
                                    <label class="fw-bold d-block">Kategori</label>
                                    <?php $buku_kategori_ids = explode(',', $buku->kategori_id ?? ''); ?>
                                    <?php foreach ($kategori_list as $kategori) : ?>
                                        <?php if (in_array($kategori->id, $buku_kategori_ids)) : ?>
                                            <span class="badge bg-secondary me-1 mt-1"><?= $kategori->nama_kategori; ?></span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <hr class="my-3">

                                <div class="d-flex gap-2 mb-2">
                                    <label class="fw-bold">Judul Buku</label>
                                    <span class="ms-auto"><?= htmlspecialchars($buku->judul) ?></span>
                                </div>
                                <hr class="my-3">

                                <div class="d-flex gap-2 mb-2">
                                    <label class="fw-bold">Penulis</label>
                                    <span class="ms-auto"><?= htmlspecialchars($buku->penulis) ?></span>
                                </div>
                                <hr class="my-3">

                                <div class="d-flex gap-2 mb-2">
                                    <label class="fw-bold">Penerbit</label>
                                    <span class="ms-auto"><?= htmlspecialchars($buku->penerbit) ?></span>
                                </div>
                                <hr class="my-3">

                                <div class="d-flex gap-2 mb-2">
                                    <label class="fw-bold">Tahun Terbit</label>
                                    <span class="ms-auto"><?= htmlspecialchars($buku->tahun_terbit) ?></span>
                                </div>
                                <hr class="my-3">

                                <div class="mb-3">
                                    <label class="fw-bold d-block">Deskripsi</label>
                                    <textarea class="form-control" rows="4" readonly><?= htmlspecialchars($buku->deskripsi) ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url(); ?>" class="btn btn-danger mt-4">Kembali</a>
            </div>
        </section>
    </div>
    <script src="<?= base_url(); ?>assets/admin/js/feather-icons/feather.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/app.js"></script>

    <script src="<?= base_url(); ?>assets/admin/vendors/chartjs/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/js/pages/dashboard.js"></script>

    <script src="<?= base_url(); ?>assets/admin/js/main.js"></script>
</body>

</html>