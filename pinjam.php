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
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                                Buku
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="buku.php">List Buku</a>
                                </nav>
                            </div>
                            <a class="nav-link active collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                    <a class="nav-link btn btn-danger" href="logout.php ">
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
                                <a type="button" class="btn btn-success btn-block" href="pinjam_buku.php">
                                Pinjam Buku
                                </a>                            
                            </div>
                            <div class="card-body">
                            <h2 class="breadcrumb mb-4">Buku yang sedang dipinjam</h2>
                            <table class="table table-bordered table-striped text-center">
                                    <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th>No</th>
                                            <th>Tanggal Pinjam Buku</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Nama Peminjam</th>
                                            <th>Nama Buku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query	= "select * from meminjam,buku,anggota
                                            where meminjam.id_anggota = anggota.id_anggota and
                                            meminjam.kd_buku = buku.kd_buku and meminjam.kembali = 1
                                            order by id_pinjam";
                                            $sql	= mysqli_query ($koneksi,$query);
                                            $no = 1;
                                            while ($data=mysqli_fetch_array($sql)) {
                                                $id_pinjam =$data['id_pinjam'];
                                                $tgl_pinjam =$data['tgl_pinjam'];
                                                $jumlah_pinjam =$data['jumlah_pinjam'];
                                                $tgl_kembali =$data['tgl_kembali'];
                                                $nm_anggota =$data['nm_anggota'];
                                                $judul_buku =$data['judul_buku'];

                                        ?>   
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['tgl_pinjam']; ?></td>
                                            <td><?php echo ucwords($data['jumlah_pinjam']); ?></td>
                                            <td><?php echo ucwords($data['tgl_kembali']); ?></td>
                                            <td><?php echo ucwords($data['nm_anggota']); ?></td>
                                            <td><?php echo ucwords($data['judul_buku']); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$id_pinjam;?>">
                                                    Edit
                                                </button>
                                                <a class="btn btn-info" href="kembali_buku.php?id=<?php echo $data['id_pinjam']; ?>"
                                                onClick="return confirm('Apakah Anda ingin mengembalikan <?php echo $data['judul_buku']; ?>?')">Kembalikan</a>

                                            </td>
                                            </td>
                                        </tr>
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$id_pinjam;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Peminjam</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="form-group">
                                                                <label for="anggota">Nama Peminjam</label>
                                                                <select name="anggota" class="form-control">
                                                                <?php
                                                                    $sql_anggota = "SELECT * FROM anggota ORDER BY id_anggota";
                                                                    $kueri_anggota = mysqli_query($koneksi, $sql_anggota);
                                                                    if (!$kueri_anggota) {
                                                                        die("Error: " . mysqli_error($koneksi));
                                                                    }

                                                                    while ($row_anggota = mysqli_fetch_array($kueri_anggota)) {
                                                                        $selected = '';
                                                                        if ($row_anggota['id_anggota'] == $data['id_anggota']) {
                                                                            $selected = 'selected';
                                                                        }

                                                                        echo "<option value='" . $row_anggota['id_anggota'] . "' " . $selected . ">" . $row_anggota['nm_anggota'] . "</option>";
                                                                    }

                                                                    mysqli_free_result($kueri_anggota);
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="buku">Judul Buku</label>
                                                                <select name="buku" class="form-control">
                                                                    <?php
                                                                    $sql_buku = "SELECT * FROM buku ORDER BY kd_buku";
                                                                    $kueri_buku = mysqli_query($koneksi, $sql_buku) or die(mysqli_connect_error());
                                                                    while ($row_buku = mysqli_fetch_array($kueri_buku)) {
                                                                        $selected = ($row_buku['kd_buku'] == $data['kd_buku']) ? 'selected' : '';
                                                                        echo "<option value='{$row_buku['kd_buku']}' {$selected}>{$row_buku['judul_buku']}</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-warning" name="updatepinjam">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no++; }?>
                                    </tbody>
                            </table>
                            <br>
                            <h2 class="breadcrumb mb-4">Buku yang sudah dikembalikan</h2>
                            <table class="table table-bordered table-striped text-center">
                                <thead class="thead-dark">
                                        <tr class="text-uppercase">
                                            <th >No</th>
                                            <th >Tanggal Pinjam Buku </th>
                                            <th >Jumlah Pinjam </th>
                                            <th >Tanggal Kembali </th>
                                            <th >Nama Peminjam</th>
                                            <th >Nama Buku</th>
                                            <th >Aksi</th>
                                        </tr>
                                </thead>
                                    <tbody>
                                    <?php 
                                        $query	= "select * from meminjam,buku,anggota
                                        where meminjam.id_anggota = anggota.id_anggota and
                                        meminjam.kd_buku = buku.kd_buku and meminjam.kembali = 2
                                        order by id_pinjam";
                                        $sql	= mysqli_query ($koneksi,$query);
                                        $no = 1;
                                        while ($data=mysqli_fetch_array($sql)) {
                                    ?>
                                    <tr>
                                            <td><?php echo $no?></td>
                                            <td><?php echo ucwords($data['tgl_pinjam']);?></td>
											 <td><?php echo ucwords($data['jumlah_pinjam']);?></td>
											  <td><?php echo ucwords($data['tgl_kembali']);?></td>
											   <td><?php echo ucwords($data['nm_anggota']);?></td>
											    <td><?php echo ucwords($data['judul_buku']);?></td>
											
                                                <td><a class="btn btn-danger" href="function.php?action=hapus_pinjam&id=<?php echo $data['id_pinjam']; ?>" 
                                                onClick="return confirm('Apakah Anda ingin menghapus <?php echo $data['id_pinjam']; ?>?')">Hapus</a></td>

                                    </tr>
										
                                    <?php $no++; }?>
                                    </tbody>
                                </table>
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
</html>