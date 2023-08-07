<?php
include "koneksi.php";



$query = mysqli_query($koneksi,"UPDATE meminjam SET tgl_kembali		='date(Y-m-d)'
										
										where id_pinjam	='$_GET[id]'");
if ($query) {
echo "<script>alert('Buku Sudah Dikembalikan');
document.location.href='pinjam.php'</script>\n";
} else {
echo "<script>alert('gagal');
document.location.href='pinjam.php'</script>\n";
}
?>