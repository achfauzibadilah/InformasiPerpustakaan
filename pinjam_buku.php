<html>
<head>
</head>
<body>
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
<?php include "koneksi.php";?>
<form method="post" action="proses_pinjam.php" >
<table border="0">
<tr>
<td>Nama Peminjam</td>
<td>:</td>
<td><?php

$sql_anggota="select * from anggota order by id_anggota";
$kueri_anggota=mysqli_query($koneksi,$sql_anggota) or die(mysqli_connect_error());
?>
                                            <select name="anggota">
                                             <?php
 while (list($kode,$nama_status)=mysqli_fetch_array($kueri_anggota))
   {
?>
      <option  value="<?php echo $kode ?>"><?php echo $nama_status ?></option>
<?php
  }
?>
                                            </select></td>
</tr>
<tr>
<td>Judul Buku </td>
<td>:</td>
<td><?php

$sql_buku="select * from buku order by kd_buku";
$kueri_buku=mysqli_query($koneksi, $sql_buku) or die(mysqli_connect_error());
?>
                                            <select name="buku">
                                             <?php
 while (list($kode,$nama_status)=mysqli_fetch_array($kueri_buku))
   {
?>
      <option  value="<?php echo $kode ?>"><?php echo $nama_status ?></option>
<?php
  }
?>
                                            </select><td>
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