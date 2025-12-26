<?php
include "koneksi.php";

// Ambil data dari form (pakai huruf kecil sesuai form)
$nama      = $_POST['nama'];
$instansi  = $_POST['instansi'];
$hp        = $_POST['hp'];
$tanggal   = $_POST['tanggal'];
$waktu     = $_POST['waktu'];
$keperluan = $_POST['keperluan'];
$petugas   = $_POST['petugas'];

// Query insert (sesuaikan nama kolom dengan database)
$sql = "INSERT INTO tamu 
(nama, instansi, hp, tanggal, waktu, keperluan, petugas)
VALUES 
('$nama', '$instansi', '$hp', '$tanggal', '$waktu', '$keperluan', '$petugas')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data tamu berhasil disimpan!');
          window.location='data_tamu.php';</script>";
} else {
    echo "SQL ERROR: " . mysqli_error($conn);
}
?>
