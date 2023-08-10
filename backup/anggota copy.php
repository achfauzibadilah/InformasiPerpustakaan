<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan - Anggota</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Sistem Informasi Perpustakaan</h1>
                </div>
            </div>
        </div>
            <div class="row mt-3">
                <div class="col-md-2 text-center">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="./" class="text-decoration-none">Home</a></li>
                        <li class="list-group-item"><a href="anggota.php" class="text-decoration-none">Anggota</a></li>
                        <li class="list-group-item"><a href="buku.php" class="text-decoration-none">Buku</a></li>
                        <li class="list-group-item"><a href="pinjam.php" class="text-decoration-none">Pinjam</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="input_anggota.php" class="btn btn-primary">Tambah Anggota</a>
                    </div>
                        <div class="card text-center">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Anggota</th>
                                            <th>Nama Anggota</th>
                                            <th>Alamat</th>
                                            <th>TTL</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        include "koneksi.php";
                                        $query = "SELECT * FROM anggota ORDER BY id_anggota";
                                        $sql = mysqli_query($koneksi, $query);
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($sql)) {
                                        ?>          
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['id_anggota']; ?></td>
                                            <td><?php echo ucwords($data['nm_anggota']); ?></td>
                                            <td><?php echo ucwords($data['alamat']); ?></td>
                                            <td><?php echo ucwords($data['ttl_anggota']); ?></td>
                                            <td><?php echo ucwords(($data['status_anggota'] == 1) ? 'Aktif' : 'Tidak Aktif'); ?></td>
                                            <td>
                                                <a href="edit_anggota.php?id=<?php echo $data['id_anggota']; ?>" class="btn btn-warning">Edit</a>
                                                <a href="hapus_anggota.php?id=<?php echo $data['id_anggota']; ?>" class="btn btn-danger" 
                                                    onClick="return confirm('Apakah Anda ingin menghapus <?php echo $data['nm_anggota']; ?>?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                Kelompok 5
                            </div>
                        </div>        
                    </div>  
            </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
