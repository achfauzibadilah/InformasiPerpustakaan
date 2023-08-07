<?php
include "koneksi.php";

$kode		= $_POST['kode'];
$judul		= $_POST['judul'];
$pengarang	= $_POST['pengarang'];
$jenis		= $_POST['jenis'];
$penerbit	= $_POST['penerbit'];

$query = mysqli_query($koneksi,"UPDATE buku SET 	kd_buku			='$kode',
										judul_buku		='$judul',
										pengarang		='$pengarang',
										jenis_buku		='$jenis',
										penerbit		='$penerbit' 
										where kd_buku	='$_GET[id]'");
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='buku.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='buku.php'</script>\n";
}
?>