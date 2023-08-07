<?php
include "koneksi.php";

$anggota = $_POST['anggota'];
$buku = $_POST['buku'];

$tgl_kembali = date('Y-m-d', strtotime('+7 days')); // Menambahkan 7 hari dari tanggal peminjaman

$query = "INSERT INTO meminjam(tgl_pinjam, jumlah_pinjam, tgl_kembali, id_anggota, kd_buku, kembali) VALUES ('" . date('Y-m-d') . "', 1, '$tgl_kembali', '$anggota', '$buku', 1)";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Data berhasil disimpan');
    window.location.href='pinjam.php';</script>";
} else {
    echo "<script>alert('Data gagal disimpan');
    window.location.href='pinjam.php';</script>";
}
?>
