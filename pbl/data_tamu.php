<?php
session_start();

// Cek login admin
if (!isset($_SESSION['username'])) {
    header("Location: beranda.php");
    exit();
}

// Koneksi database
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Guestly</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { background-color:#eef5ff; font-family:'Poppins', sans-serif; }

    /* Sidebar */
    .sidebar {
      width:240px; height:100vh; position:fixed;
      background:linear-gradient(180deg,#a3c9f9,#bdd6ff);
      padding:25px 18px; color:white;
    }

    .sidebar a {
      text-decoration:none; color:white;
      display:block; padding:10px 15px;
      border-radius:8px; margin-bottom:6px;
    }

    .sidebar a:hover, .sidebar a.active {
      background:rgba(255,255,255,0.25);
    }

    /* Content */
    .content {
      margin-left:240px;
      padding:30px;
    }
  </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <h4 class="text-center mb-4">Guestly</h4>
  <a href="dashboard.php"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
  <a href="data_tamu.php" class="active"><i class="bi bi-people me-2"></i>Data Tamu</a>
  <a href="#" data-bs-toggle="modal" data-bs-target="#modalLogout">
    <i class="bi bi-box-arrow-right me-2"></i>Logout
  </a>
</div>


<!-- CONTENT -->
<div class="content">

  <!-- HEADER -->
  <div class="bg-white shadow-sm p-4 rounded mb-4 text-center">
    <h2 class="fw-semibold">📋 Daftar Buku Tamu Tata Usaha</h2>
    <p class="text-muted">Berikut adalah daftar tamu yang telah melakukan kunjungan</p>
  </div>


  <!-- CARD TABLE -->
  <div class="bg-white shadow-sm p-3 rounded mb-3">

    <!-- ===========================
         FILTER SATU BARIS (OPSI 2)
    ============================-->
    <form method="GET" class="row g-2 mb-3">

      <div class="col-md-10">
        <label class="form-label">Cari apa saja (Nama / instansi / Keperluan / Petugas / Tanggal)</label>
        <input type="text" name="q" class="form-control"
               placeholder="Masukkan kata kunci..."
               value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
      </div>

      <div class="col-md-2 d-flex align-items-end">
        <button class="btn btn-primary w-100">🔍 Cari</button>
      </div>

    </form>


    <!-- TABLE -->
    <div class="table-responsive">
      <table class="table table-striped table-bordered align-middle">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>instansi</th>
            <th>No Hp</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Keperluan</th>
            <th>Petugas</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

<?php
// ==== FILTER QUERY ====
$whereSQL = "";

if (!empty($_GET['q'])) {
    $q = mysqli_real_escape_string($conn, $_GET['q']);
    $whereSQL = "WHERE 
      nama LIKE '%$q%' OR
      instansi LIKE '%$q%' OR
      hp LIKE '%$q%' OR
      tanggal LIKE '%$q%' OR
      waktu LIKE '%$q%' OR
      keperluan LIKE '%$q%' OR
      petugas LIKE '%$q%'";
}
// Query ambil data tamu
$sql = "SELECT * FROM tamu $whereSQL ORDER BY id DESC";
$data = mysqli_query($conn, $sql);
$no = 1;

// === LOOP DATA ===
while ($d = mysqli_fetch_assoc($data)) {
?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['instansi'] ?? '-' ?></td>
            <td><?= $d['hp'] ?></td>
            <td><?= $d['tanggal'] ?></td>
            <td><?= $d['waktu'] ?></td>
            <td><?= $d['keperluan'] ?></td>
            <td><?= $d['petugas'] ?></td>
            

            <td>
              <!-- BUTTON EDIT -->
              <button class="btn btn-warning btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#edit<?= $d['id'] ?>">Edit</button>

              <!-- BUTTON HAPUS -->
              <button class="btn btn-danger btn-sm" 
                      data-bs-toggle="modal" 
                      data-bs-target="#hapus<?= $d['id'] ?>">Hapus</button>
            </td>
          </tr>


          <!-- ================= MODAL EDIT ================= -->
          <div class="modal fade" id="edit<?= $d['id'] ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header" style="background:#82a8f8; color:white;">
                  <h5 class="modal-title">✏️ Edit Data Tamu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                  <form action="update.php" method="POST">

                    <input type="hidden" name="id" value="<?= $d['id'] ?>">

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $d['nama'] ?>" required>
                      </div>

                      <div class="col-md-6 mb-3">
                        <label class="form-label">instansi</label>
                        <input type="text" class="form-control" name="instansi" value="<?= $d['instansi'] ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" class="form-control" name="hp" value="<?= $d['hp'] ?>">
                      </div>

                      <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= $d['tanggal'] ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Waktu</label>
                        <input type="time" class="form-control" name="waktu" value="<?= $d['waktu'] ?>">
                      </div>

                      <div class="col-md-6 mb-3">
                        <label class="form-label">Petugas</label>
                        <input type="text" class="form-control" name="petugas" value="<?= $d['petugas'] ?>">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Keperluan</label>
                      <textarea class="form-control" name="keperluan" rows="3"><?= $d['keperluan'] ?></textarea>
                    </div>

                    <button type="submit" class="btn w-100" style="background:#82a8f8; color:white;">
                      💾 Simpan Perubahan
                    </button>

                  </form>
                </div>
              </div>
            </div>
          </div>


          <!-- ================= MODAL HAPUS ================= -->
          <div class="modal fade" id="hapus<?= $d['id'] ?>" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header bg-danger text-white">
                  <h5 class="modal-title">⚠️ Hapus Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                  <p>Yakin ingin menghapus tamu <strong><?= $d['nama'] ?></strong>?</p>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <a href="hapus.php?id=<?= $d['id'] ?>" class="btn btn-danger">Hapus</a>
                </div>

              </div>
            </div>
          </div>

<?php } // end while ?>
        </tbody>
      </table>
    </div>
  </div> <!-- END TABLE CARD -->

</div> <!-- END CONTENT -->


<!-- MODAL LOGOUT -->
<div class="modal fade" id="modalLogout" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Konfirmasi Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        Apakah Anda yakin ingin keluar dari Guestly?
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="logout.php" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
