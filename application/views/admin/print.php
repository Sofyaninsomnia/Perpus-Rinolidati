<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repot Sirkulasi Perpusdigital</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/css/bootstrap.css">
    <style>
        @media print {

            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            .container {
                width: 100% !important;
                padding: 0;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
                margin: 0;
            }

            .table th,
            .table td {
                border: 1px solid #000;
                padding: 8px;
            }

            .no-print {
                display: none !important;
            }

            h4 {
                text-align: center;
                margin-top: 20px;
                margin-bottom: 20px;
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h4 class="text-center mt-4">Report Data Sirkulasi</h4>
        <table class="table table-bordered mt-4">
            <thead>
                <th>No</th>
                <th>Username</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Denda</th>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($sirkulasi as $data) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data->username ?></td>
                        <td><?php echo $data->judul ?></td>
                        <td><?php echo date('d M Y', strtotime($data->tgl_pinjam)) ?></td>
                        <td><?php echo date('d M Y', strtotime($data->tgl_kembali)) ?></td>
                        <td><?php echo $data->status ?></td>
                        <td><?php echo number_format($data->denda, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>