<?php
require 'koneksi.php';
require 'cek.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
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
                                <!-- <div class="dropdown-divider"></div> -->
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
                            <a class="nav-link" href="anggota.php">
                                Anggota
                            </a>
                            <a class="nav-link" href="buku.php">
                                Buku
                            </a>
                            <a class="nav-link" href="pinjam.php">
                                Pinjam
                            </a>
                            
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Not Yet Setup
                    </div> -->
                    <div>
                    <a class="nav-link" href="logout.php ">
                        Logout
                    </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Sistem Informasi Perpustakaan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card-deck text-center">
                            <div class="card">
                                <img class="card-img-top" src="assets/img/anggota.jpg" alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title">Anggota</h5>
                                <p class="card-text">Halaman ini untuk menambahkan anggota baru <br>serta merubah isi data setiap anggota.</p>
                                <a class="btn btn-dark btn-block" href="anggota.php">Anggota</a>
                                </div>
                            </div>
                            <div class="card text-center">
                                <img class="card-img-top" src="assets/img/buku.jpg" alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title">Buku</h5>
                                <p class="card-text">Halaman ini untuk menambahkan koleksi buku pada perpustakaan <br> yang dapat dipinjamkan keanggota.</p>
                                <a class="btn btn-dark btn-block" href="buku.php">Buku</a>
                                </div>
                            </div>
                            <div class="card text-center">
                                <img class="card-img-top" src="assets/img/pinjam.jpg" alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title">Pinjam</h5>
                                <p class="card-text">Halaman ini untuk mencatat peminjaman buku perpustakaan.</p>
                                <a class="btn btn-dark btn-block" href="pinjma.php">Pinjam</a>
                                </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>