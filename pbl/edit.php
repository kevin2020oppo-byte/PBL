<?php
session_start();

// Samakan session dengan file lain
if (!isset($_SESSION['username'])) {
    header("Location: beranda.php");
    exit();
}

include "koneksi.php";

// Cek parameter id
if (!isset($_GET['id'])) {
    header("Location: data_tamu.php");
    exit();
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tamu WHERE id='$id'");
$dt = mysqli_fetch_assoc($data);

if (!$dt) {
    header("Location: data_tamu.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Data Tamu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        background-color: #eef5ff;
        font-family: 'Poppins', sans-serif;
    }

    .container-box {
        max-width: 620px;
        margin: 60px auto;
        background: white;
        padding: 25px 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-top: 5px solid #82a8f8;
    }

    h3 {
        color: #023047;
        font-weight: 600;
        text-align: center;
        margin-bottom: 25px;
    }

    .btn-save {
        background: #82a8f8;
        border: none;
        color: white;
        font-weight: 600;
    }

    .btn-save:hover {
        background: #4b7ed6;
        color: white;
    }

    .btn-back {
        background: #adb5bd;
        border: none;
    }

    .btn-back:hover {
        background: #6c757d;
        color: white;
    }
</style>
</head>

<body>

<div class="container-box">
    <h3>✏️ Edit Data Tamu</h3>

    <form action="update.php" method="POST">

        <input type="hidden" name="id" value="<?= $dt['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" value="<?= $dt['nama'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Instansi / Asal</label>
            <input type="text" name="instansi" class="form-control" value="<?= $dt['instansi'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor HP / WhatsApp</label>
            <input type="text" name="hp" class="form-control" value="<?= $dt['hp'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Kunjungan</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $dt['tanggal'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu</label>
            <input type="time" name="waktu" class="form-control" value="<?= $dt['waktu'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Keperluan</label>
            <textarea name="keperluan" class="form-control" rows="3" required><?= $dt['keperluan'] ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Petugas TU yang Ditemui</label>
            <input type="text" name="petugas" class="form-control" value="<?= $dt['petugas'] ?>">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="data_tamu.php" class="btn btn-back px-4"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-save px-4">💾 Simpan Perubahan</button>
        </div>

    </form>
</div>

</body>
</html>
