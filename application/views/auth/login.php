<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Rinolidati</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/custom/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css">
</head>

<body>
    <div class="container">
        <div class="heading">Sign In</div>
        <form class="form" action="<?= base_url('index.php/auth/login'); ?>" method="POST">
            <input
                placeholder="Username"
                name="username"
                type="username"
                class="input"
                required />
            <?= form_error('username'); ?><br>
            <input
                placeholder="Password"
                id="password"
                name="password"
                type="password"
                class="input"
                required="" />
            <?= form_error('password'); ?><br>
            <button type="submit" class="login-button">Sign in</button>
        </form>
        <span class="agreement"><a href="<?= base_url(); ?>">Kembali</a></span>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            const errorMessage = "<?= $this->session->flashdata('error_message'); ?>";
            const logoutMessage = "<?= $this->session->flashdata('logout'); ?>";

            if (errorMessage) {
                Swal.fire({
                    title: 'Kesalahan!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            } else if (logoutMessage) {
                Swal.fire({
                    title: 'Sukses!',
                    html: logoutMessage,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }

        });
    </script>
</body>

</html>