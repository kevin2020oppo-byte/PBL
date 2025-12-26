<?php
include "koneksi.php"; // pastikan koneksi dipanggil

$id = $_GET['id'];  // ambil id dari URL

// Query hapus
$hapus = mysqli_query($conn, "DELETE FROM tamu WHERE id='$id'");

// Redirect kembali ke halaman data tamu
if($hapus){
    header("Location: data_tamu.php?pesan=hapus-berhasil");
} else {
    echo "Gagal menghapus data!";
}
?>
