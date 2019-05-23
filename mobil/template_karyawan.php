<?php session_start(); ?>
<?php if(isset($_SESSION["session_karyawan"])): ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap Navbar</title>
        <!-- Load bootstrap css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Load bootstrap jquery and bootstrap js -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-secondary navbar-dark sticky-top ">
        <!--
            navbar-expend-md -> menu akan dihidden ketika tampilan device berukuran medium
            bg-dager-> navbar akan memunyai background warna merah
            navbar-dark -> tulisan pada navbar akan lebih gelap
            fixed-top -> navbar akan berposisi SELALU DI ATAS-->
            <a href="#" class="text-white">
                <h3>RENT CAR</h3>
            </a>

            <!-- pemanggilan icon menu saat menubar disembunyikan -->
            <button type="button" class="navbar-toggler" data-toggler="collapse" data-target="#menu">
                <span class="navbar navbar-toggler-icon"></span>
            </button>

            <!-- daftar menu pad navbar-->
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nev-item"><a href="template_karyawan.php?page=karyawan" class="nav-link">Karyawan</a></li>
                    <li class="nev-item"><a href="template_karyawan.php?page=pelanggan" class="nav-link">Pelanggan</a></li>
                    <li class="nev-item"><a href="template_karyawan.php?page=mobil" class="nav-link">Tambah Mobil</a></li>
                    <li class="nev-item"><a href="template_karyawan.php?page=list_mobil" class="nav-link">Mobil </a></li>
                    <li class="nev-item"><a href="template_karyawan.php?page=daftar_penyewaan" class="nav-link">Daftar Penyewaan</a></li>
                    <li class="nev-item"><a href="proses_login_karyawan.php?logout=true" class="nav-link">Logout</a></li>
                    
                    
                </ul> 
            </div>
            <h5 class="text-white">Selamat Datang  ,  <?php echo $_SESSION["session_karyawan"]["nama_karyawan"]; ?> </h5>
            <a href="template_karyawan.php?page=list_sewa">
            <b class="text-white">Sewa: <?php echo count($_SESSION);?> </b> 
            </a>

        </nav>
        <div class="container my-2">
            <?php if(isset($_GET["page"])): ?>
            <?php if((@include $_GET["page"].".php") === true): ?>
            <?php include $_GET["page"].".php";?>
            <?php endif; ?>
            <?php endif; ?>

            
    </div>
    <CENTEr><H1>SEMOGA SUKSES</H1></CENTEr>
    </body>
</html>
<?php else: ?>
   <?php echo "Anda belum login:"; ?>
   <bR>
   <a href="login_karyawan.php">
   Loginya ada disini :)
   </a>
<?php endif; ?>