<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {

        $_SESSION['username'] = $username;

        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
        <script>
            Swal.fire({
                title: 'Login Berhasil!',
                text: 'Selamat datang $username',
                icon: 'success',
                timer: 1800,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'dashboard.php';
            });
        </script>
        </body>
        </html>";
        exit();

    } else {

        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
        <script>
            Swal.fire({
                title: 'Login Gagal!',
                text: 'Username atau password salah!',
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'beranda.php?login=gagal';
            });
        </script>
        </body>
        </html>";
        exit();
    }
}
?>
