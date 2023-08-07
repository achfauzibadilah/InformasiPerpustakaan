<?php
include "koneksi.php";

$nama	= $_POST['nama'];
$alamat	= $_POST['alamat'];
$ttl	= $_POST['ttl'];
$status	= $_POST['status'];

$query = "INSERT INTO anggota(nm_anggota,alamat,ttl_anggota,status_anggota) VALUES ('$nama','$alamat','$ttl','$status')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Data berhasil disimpan');
    document.location.href='anggota.php'</script>\n";
} else {
    echo "<script>alert('Data gagal disimpan');
    document.location.href='input_anggota.php'</script>\n";
}
?>