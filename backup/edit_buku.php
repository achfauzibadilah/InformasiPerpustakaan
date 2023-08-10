<html>
<head>
</head>
<body>
<?php 
include "koneksi.php";
?>
<table width="700" border="1">
<tr>
<td colspan="2" align="center"><h1>Selamat Datang Di Sistem Perpustakaan</h1></td>
</tr>
<tr>
<td width = "200">
<ul>
<li><a href="anggota.php">Anggota</a></li>
<li><a href="buku.php">Buku</a></li>
<li><a href="pinjam.php">Pinjam</a></li>
<ul>

</td>
<td width="500">
<form method="post" action="proses_edit_buku.php?id=<?php echo $_GET['id'];?>" >

<?php 
    $id = $_GET['id'];
    $query = mysqli_query ($koneksi, "SELECT * FROM buku WHERE kd_buku=$id");
    $data= mysqli_fetch_array($query);
?>

<table border="0">
<tr>
<td>Kode Buku</td>
<td>:</td>
<td><input type="text" name="kode"  value="<?php echo $data['kd_buku']?>"></td>
</tr>
<tr>
<td>Judul Buku</td>
<td>:</td>
<td><input type="text" name="judul"  value="<?php echo $data['judul_buku']?>"></td>
</tr>
<tr>
<td>Pengarang</td>
<td>:</td>
<td><input type="text" name="pengarang"  value="<?php echo $data['pengarang']?>"></td>
</tr>
<tr>
<td>Jenis Buku</td>
<td>:</td>
<td><input type="text" name="jenis"  value="<?php echo $data['jenis_buku']?>">
</tr>
<tr>
<td>Penerbit Buku</td>
<td>:</td>
<td><input type="text" name="penerbit"  value="<?php echo $data['penerbit']?>">
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" name="simpan" value="simpan"></td>
</tr>

</table>
</form>
</td>
</tr>
<tr>
<td colspan="2" align="center">Kelompok 5<br><script type='text/javascript' src='//eclkmpsa.com/adServe/banners?tid=94091_154020_0&tagid=2'></script> <br> <script type='text/javascript' src='//eclkmpbn.com/adServe/banners?tid=94091_154020_2'></script></td>
</tr>
</table>

</body>
</html>