<?php
$conn = mysqli_connect("localhost", "root", "", "bukutamu");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
