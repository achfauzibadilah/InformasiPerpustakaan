<html>
<head>
</head>
<body>
<table width="1000" border="1">
<tr>
<td colspan="2" align="center"><h1>Sistem Informasi Perpustakaan</h1></td>
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
<a href="input_anggota.php">Input anggota</a>
 <table border="1" >
                                        <thead>	

          <tr>
            <th >No</th>
            <th >id_anggota </th>
			<th >nama anggota </th>
			<th >alamat </th>
			<th >TTl </th>
			<th >Status</th>
			
			<th >Aksi</th>
          </tr>
        </thead>
                                    
									

                                    <tbody>
									<?php 
include "koneksi.php";
$query	= "select * from anggota order by id_anggota";
$sql	= mysqli_query ($koneksi,$query);
$no = 1;
while ($data=mysqli_fetch_array($sql)) {
?>			
                                        <tr class="odd gradeX">
                                            <td><?php echo $no?></td>
                                            <td><?php echo $data['id_anggota'];?></td>
											 <td><?php echo $data['nm_anggota'];?></td>
											  <td><?php echo $data['alamat'];?></td>
											   <td><?php echo $data['ttl_anggota'];?></td>
											    <td class="center"><?php echo $data['status_anggota'];?></td>
											
                                            <td class="center"><a href="edit_anggota.php?id=<?php echo $data['id_anggota']; ?>" > Edit </a>|<a href="hapus_anggota.php?id=<?php echo $data['id_anggota']; ?>" 
	                                            onClick = "return confirm('Apakah Anda ingin mengapus  <?php echo $data['nm_anggota']; ?>?')"> hapus</a></td>
                                        </tr>
										
                                        <?php $no++; }?>
                                    </tbody>
									
									

                                </table>
</td>
</tr>
<tr>
<td colspan="2" align="center">Kelompok 5<br><script type='text/javascript' src='//eclkmpsa.com/adServe/banners?tid=94091_154020_0&tagid=2'></script> <br> <script type='text/javascript' src='//eclkmpbn.com/adServe/banners?tid=94091_154020_2'></script></td>
</tr>
</table>
</body>
</html>