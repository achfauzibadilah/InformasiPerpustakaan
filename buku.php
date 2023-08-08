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
                            <a class="nav-link collapsed" href="anggota.php" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                                Anggota
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav ">
                                    <a class="nav-link" href="anggota.php">List Anggota</a>
                                </nav>
                            </div>
                            <a class="nav-link active collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Buku
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="buku.php">List Buku</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pinjam
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="pinjam.php">List Peminjam</a>
                                </nav>
                            </div>                         
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
                        <h1 class="mt-4 text-center mb-5">Sistem Informasi Perpustakaan</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Tambah Buku
                                </button>                            
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th >No</th>
                                            <th >Kode Buku </th>
                                            <th >Judul Buku </th>
                                            <th >Pengarang </th>
                                            <th >jenis Buku</th>
                                            <th >penerbit</th>
                                            <th >Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php
                                $query = "SELECT * FROM buku ORDER BY kd_buku";
                                $sql = mysqli_query($koneksi, $query);
                                $no = 1;
                                while ($data = mysqli_fetch_array($sql)) {
                                    $kd_buku = $data['kd_buku']; // Definisi variabel kd_buku
                                    $judul_buku = $data['judul_buku'];
                                    $pengarang = $data['pengarang'];
                                    $jenis_buku = $data['jenis_buku'];
                                    $penerbit = $data['penerbit'];
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo ucwords($data['kd_buku']); ?></td>
                                    <td><?php echo ucwords($data['judul_buku']); ?></td>
                                    <td><?php echo ucwords($data['pengarang']); ?></td>
                                    <td><?php echo ucwords($data['jenis_buku']); ?></td>
                                    <td><?php echo ucwords($data['penerbit']); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$kd_buku;?>">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$kd_buku;?>">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                        
                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="edit<?=$kd_buku;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit Buku</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        <b>Kode Buku</b>
                                                        <input type="text" name="kd_buku" id="kd_buku" value="<?=$kd_buku;?>" class="form-control" required>
                                                        <br>
                                                        <b>Judul Buku</b>
                                                        <input type="text" name="judul_buku" id="judul_buku" value="<?=$judul_buku;?>" class="form-control" required>
                                                        <br>
                                                        <b>Pengarang</b>
                                                        <input type="text" name="pengarang" id="pengarang" value="<?=$pengarang;?>" class="form-control" required>
                                                        <br>
                                                        <b>Jenis</b>
                                                        <input type="text" name="jenis_buku" id="jenis_buku" value="<?=$jenis_buku;?>" class="form-control" required>
                                                        <br>
                                                        <b>Penerbit</b>
                                                        <input type="text" name="penerbit" id="penerbit" value="<?=$penerbit;?>" class="form-control" required>
                                                        <br>
                                                        <button type="submit" class="btn btn-warning" name="updatebuku">Submit</button>
                                                        </div>
                                                        </form>
                                                        
                                                        </div>
                                                        </div>
                                                        </div>
                                                

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete<?=$kd_buku;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Delete Buku ?</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        Apakah Anda Yakin Ingin Menghapus Barang <?=$judul_buku;?> ?
                                                        <input type="hidden" name="kd_buku" value="<?=$kd_buku;?>">
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="hapusbuku">Hapus</button>
                                                        </div>
                                                        </form>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                       

                                        <?php $no++; }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                        Kelompok 5
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
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Tambah Buku</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <form method="post">
                        <div class="modal-body">
                        <b>Kode Buku</b>
                        <input type="text" name="kd_buku" id="kd_buku" placeholder="Masukkan Kode Buku"class="form-control" required>
                        <br>
                        <b>Judul Buku</b>
                        <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Buku" class="form-control" required>
                        <br>
                        <b>Pengarang</b>
                        <input type="text" name="pengarang" id="pengarang" placeholder="Masukkan Nama Pengarang Buku" class="form-control" required>
                        <br>
                        <b>Jenis</b>
                        <input type="text" name="jenis" id="jenis" placeholder="Masukkan Jenis Buku" class="form-control" required>
                        <br>
                        <b>Penerbit</b>
                        <input type="text" name="penerbit" id="penerbit" placeholder="Masukkan Nama Penerbit" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-success" name="addnewbuku">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</html>