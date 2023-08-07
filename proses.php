<?php
include "koneksi.php";

$nama   = $_POST['nama'];
$alamat = $_POST['alamat'];
$ttl    = $_POST['ttl'];
$status = $_POST['status'];

if (empty($nama) || empty($status)) {
    echo "<script>alert('Kolom Nama dan Status tidak boleh kosong');
    window.location.href = 'input_anggota.php';</script>";
} else {
    $query = "INSERT INTO anggota(nm_anggota,alamat,ttl_anggota,status_anggota) VALUES ('$nama','$alamat','$ttl','$status')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil disimpan');
        window.location.href = 'anggota.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan');
        window.location.href = 'input_anggota.php';</script>";
    }
}
?>
