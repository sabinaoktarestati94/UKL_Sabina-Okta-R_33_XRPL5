<?php session_start(); ?>
<?php if (isset($_SESSION["session_karyawan"])): ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JINI'S RENT CAR</title>
        <!-- Load bootstrap css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Load jquery and bootstrap js -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-warning navbar-dark sticky-top">
      <!--
    Navbar-expand-md -> menu akan dihiden ketika tampilan device berukuran medium
  bg-danger -> navbar akan mempunyai background warna merah -->
  <a href="#" class="text-white">
    <h3>JINI'S RENT CAR</h3>
  </a>

  <!-- panggilan icon menu saat menubar disembunyikan -->
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
  <span class="navbar navbar-toggler-icon"></span>
</button>

    <!-- daftar menu pada navbar -->
    <div class="collapse navbar-collapse" id="menu">
    <h5 class="text-white"> ~~~~~ </h5>
    <h5 class="text-white">Hello! <?php echo $_SESSION["session_karyawan"]["nama_karyawan"]; ?></h5>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="template.php?page=karyawan" class="nav-link">Karyawan</a></li>
        <li class="nav-item"><a href="template.php?page=pelanggan" class="nav-link">Pelanggan</a></li>
        <li class="nav-item"><a href="template.php?page=mobil" class="nav-link">Mobil</a></li>
        <li class="nav-item"><a href="template.php?page=list_mobil" class="nav-link">Penyewaan</a></li>
        <li class="nav-item"><a href="template.php?page=laporan" class="nav-link">Laporan</a></li>
        <li class="nav-item"><a href="proses_login.php" class="nav-link">Logout</a></li>
      </ul>
      </div>
        <a href="template.php?page=list_sewa">
			  <b class="text-white">Cek Sewa: <?php echo count($_SESSION["session_sewa"]);?></b>
		</a>
    </nav>
    <div class="container my-2">
      <?php if (isset($_GET["page"])): ?>
        <?php if ((@include $_GET["page"].".php") === true): ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </body>
</html>
<?php else: ?>
 <?php echo "Anda belum login!"; ?>
 <br>
 <a href="login.php">
 Login di sini!
</a>
<?php endif; ?>
