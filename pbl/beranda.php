<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku Tamu Digital</title>

  <!-- Bootstrap -->
  <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">

  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #cde8ff, #e4f1ff, #f5faff);
      color: #1b1b2f;
      overflow-x: hidden;
      scroll-behavior: smooth;
    }

    /* NAVBAR */
    .navbar {
      background: #8ecae6;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      font-weight: 700;
      color: #023047 !important;
    }
    .nav-link {
      color: #023047 !important;
      font-weight: 500;
      margin-left: 15px;
      transition: 0.3s;
    }
    .nav-link:hover {
      color: #219ebc !important;
    }

    /* HERO */
    .hero {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      background: linear-gradient(135deg, #bde0fe, #a2d2ff);
      color: #023047;
      animation: fadeIn 1.2s ease-in-out;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .btn-custom {
      padding: 12px 28px;
      font-size: 1.1rem;
      border-radius: 30px;
      transition: 0.3s ease;
      font-weight: 600;
    }
    .btn-light-custom {
      background-color: #caf0f8;
      color: #023047;
      border: none;
    }
    .btn-light-custom:hover {
      background-color: #90e0ef;
      color: #023047;
      transform: translateY(-2px);
    }
    .btn-outline-custom {
      border: 2px solid #023047;
      color: #023047;
    }
    .btn-outline-custom:hover {
      background-color: #023047;
      color: #fff;
      transform: translateY(-2px);
    }

    /* FITUR SECTION */
    .fitur {
      padding: 80px 0;
      text-align: center;
    }
    .fitur h2 {
      font-weight: 700;
      color: #023047;
      margin-bottom: 40px;
    }
    .fitur .card {
      border: none;
      border-radius: 15px;
      transition: transform 0.3s;
    }
    .fitur .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* KONTAK */
    .kontak {
      background: #caf0f8;
      padding: 60px 0;
    }
    .kontak h2 {
      font-weight: 700;
      color: #023047;
    }
    .btn{
       background-color: #8ecae6;
    }

    /* FOOTER */
    footer {
      background: #8ecae6;
      color: #023047;
      text-align: center;
      padding: 15px 0;
      font-weight: 500;
      box-shadow: 0 -3px 10px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">Guestly</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="#beranda" class="nav-link">Beranda</a></li>
          <li class="nav-item"><a href="#fitur" class="nav-link">Fitur</a></li>
          <li class="nav-item"><a href="#kontak" class="nav-link">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section class="hero" id="beranda">
    <div class="container">
      <h1>Selamat Datang di Buku Tamu TU</h1>
      <p>Kelola dan catat kunjungan dengan mudah, cepat, dan efisien.</p>
      <div>
      <button class="btn btn-outline-custom btn-custom" data-bs-toggle="modal" data-bs-target="#modalLogin">
  LOGIN
</button>


         <button type="button" class="btn btn-outline-custom btn-custom" data-bs-toggle="modal" data-bs-target="#DataModal">
        <i class=""></i>FORM BUKU TAMU
      </button>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
      </div>
    </div>
  </section>

<!-- Modal Isi Buku Tamu -->
<div class="modal fade" id="DataModal" tabindex="-1" aria-labelledby="DataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background:#f7faff; border-radius:18px;">

      <!-- HEADER -->
      <div class="modal-header" 
           style="background:linear-gradient(90deg,#a3c9f9,#bdd6ff); color:white; border-radius:18px 18px 0 0;">
        <h5 class="modal-title fw-bold">📝 Form Buku Tamu</h5>
        <button type="button" class="btn-close bg-white p-2 rounded-circle" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <form action="proses_tamu.php" method="POST">

          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Instansi / Asal</label>
            <input type="text" name="instansi" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Nomor HP / WhatsApp</label>
            <input type="tel" name="hp" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Tanggal Kunjungan</label>
            <input type="date" name="tanggal" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Waktu</label>
            <input type="time" name="waktu" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Keperluan</label>
            <textarea name="keperluan" class="form-control" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Petugas TU yang Ditemui</label>
            <input type="text" name="petugas" class="form-control">
          </div>

          <button type="submit" 
                  class="btn w-100 fw-semibold text-white mt-2"
                  style="background:#82a8f8; border-radius:10px;">
            Submit
          </button>
        </form>
      </div>

    </div>
  </div>
</div>

 <!-- Modal Login Admin -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold">🔐 Login </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <!-- Pesan error dari PHP -->
        <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

       <form action="process_login.php" method="POST">
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-dark w-100">Masuk</button>
</form>

        </form>
      </div>

    </div>
  </div>
</div>

  <!-- FITUR -->
  <section class="fitur" id="fitur">
    <div class="container">
      <h2>Fitur Unggulan</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card p-4">
            <div class="card-body">
              <h5 class="card-title fw-bold">🔹 Pencatatan Cepat</h5>
              <p class="card-text text-muted">Isi data tamu hanya dalam hitungan detik dengan tampilan yang mudah dipahami.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-4">
            <div class="card-body">
              <h5 class="card-title fw-bold">🔹 Dashboard Admin</h5>
              <p class="card-text text-muted">Pantau semua data tamu dalam satu halaman dengan tampilan visual yang menarik.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-4">
            <div class="card-body">
              <h5 class="card-title fw-bold">🔹 Laporan Otomatis</h5>
              <p class="card-text text-muted">Dapatkan laporan kunjungan secara real-time tanpa input manual.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   <section class="fitur" id="fitur">
    <div class="container">
      <h2>Anggota PBL</h2>
      <div class="row g-4">
        <div class="col-md">
          <div class="card p">
            <div class="card-body">
              <h5 class="card-title fw-bold">🔹 Aliya Putri Ramadhani</h5>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card p">
            <div class="card-body">
              <h5 class="card-title fw-bold">🔹 Muhammad Kevin Fadillah</h5>
            </div>
          </div>
        </div>
  </section>
  

  <!-- KONTAK -->
  <section class="kontak" id="kontak">
    <div class="container text-center">
      <h2>Hubungi Kami</h2>
      <p class="text-muted mb-4">Ada pertanyaan atau masukan? Kami siap membantu Anda.</p>
      <a href="aliya.putriramadhani01@gmail.com" class="btn btn-outline-custom btn-custom">Email Kami</a>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    © 2025 Buku Tamu TU | Sistem Informasi Administrasi Digital
  </footer>

<?php if(isset($_GET['error'])): ?>
<?php endif; ?>


  <!-- Bootstrap JS -->
  <script src="bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
</body>
</html>
