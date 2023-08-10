<?php
ob_start();
require 'function.php';
require 'koneksi.php';
require 'cek.php';
ob_end_clean();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">HOME</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                        <a class="nav-link collapsed" href="anggota.php" data-toggle="collapse" data-target="#collapseAnggota" aria-expanded="false" aria-controls="collapseAnggota">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            Anggota
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseAnggota" aria-labelledby="headingAnggota" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="anggota.php">List Anggota</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="buku.php" data-toggle="collapse" data-target="#collapseBuku" aria-expanded="false" aria-controls="collapseBuku">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Buku
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseBuku" aria-labelledby="headingBuku" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="buku.php">List Buku</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="pinjam.php" data-toggle="collapse" data-target="#collapsePinjam" aria-expanded="false" aria-controls="collapsePinjam">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Pinjam
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePinjam" aria-labelledby="headingPinjam" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="pinjam.php">List Peminjam</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div>
                    <a class="nav-link" href="logout.php">
                        Logout
                    </a>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4 text-center mb-5">Sistem Informasi Perpustakaan</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Pinjam Buku Perpustakaan</h2>
                        </div>
                        <div class="card-body">
                            <form method="post" action="proses_pinjam.php">
                                <div class="form-group">
                                    <label for="anggota">Nama Peminjam</label>
                                    <select class="form-control" id="anggota" name="anggota">
                                        <?php
                                        $sql_anggota = "SELECT * FROM anggota ORDER BY id_anggota";
                                        $kueri_anggota = mysqli_query($koneksi, $sql_anggota) or die(mysqli_connect_error());
                                        while ($row_anggota = mysqli_fetch_assoc($kueri_anggota)) {
                                            echo '<option value="' . $row_anggota['id_anggota'] . '">' . $row_anggota['nama_status'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="buku">Judul Buku</label>
                                    <select class="form-control" id="buku" name="buku">
                                        <?php
                                        $sql_buku = "SELECT * FROM buku ORDER BY kd_buku";
                                        $kueri_buku = mysqli_query($koneksi, $sql_buku) or die(mysqli_connect_error());
                                        while ($row_buku = mysqli_fetch_assoc($kueri_buku)) {
                                            echo '<option value="' . $row_buku['kd_buku'] . '">' . $row_buku['nama_status'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Tugas Web 2 - Kelompok 5</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
