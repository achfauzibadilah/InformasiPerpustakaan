<?php
include 'koneksi.php';

//menambah anggota baru
if(isset($_POST['addnewanggota'])){
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $ttl    = $_POST['ttl'];
    $status = $_POST['status'];

    $addtotable = mysqli_query($koneksi, "INSERT INTO anggota(nm_anggota,alamat,ttl_anggota,status_anggota) VALUES ('$nama','$alamat','$ttl','$status')");

    if($addtotable){
        echo "<script>alert('Data berhasil disimpan');
        window.location.href = 'anggota.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan');
        window.location.href = 'anggota.php';</script>";
    }
};

//update info anggota
if(isset($_POST['updateanggota'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $status = $_POST['status'];
    
    $update = mysqli_query($koneksi, "UPDATE anggota set nm_anggota ='$nama', alamat='$alamat', ttl_anggota='$ttl', status_anggota	='$status' WHERE id_anggota= '$id_anggota'");
    if($update){
        header('location:anggota.php');
        } else {
            echo 'Gagal';
            header('location:anggota.php');
        }
    };

//Menghapus anggota
if(isset($_POST['hapusanggota'])) {
    $id_anggota = $_POST['id_anggota'];

    $hapus = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota= '$id_anggota'");
    if($hapus){
        header('location:anggota.php');
        } else {
            echo 'Gagal';
            header('location:anggota.php');
        }
    };


// Menambah buku baru
if (isset($_POST['addnewbuku'])) {
    $kd_buku    = $_POST['kd_buku'];
    $judul_buku = $_POST['judul'];
    $pengarang  = $_POST['pengarang'];
    $jenis_buku = $_POST['jenis'];
    $penerbit   = $_POST['penerbit'];

    $addtotable = mysqli_query($koneksi, "INSERT INTO buku(kd_buku, judul_buku, pengarang, jenis_buku, penerbit) VALUES ('$kd_buku', '$judul_buku', '$pengarang', '$jenis_buku', '$penerbit')");

    if($addtotable){
        echo "<script>alert('Data berhasil disimpan');
        window.location.href = 'buku.php';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan');
        window.location.href = 'buku.php';</script>";
    }
};


//update info buku
if(isset($_POST['updatebuku'])) {
    $kd_buku = $_POST['kd_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $jenis_buku = $_POST['jenis_buku'];
    $penerbit = $_POST['penerbit'];
    
    $update = mysqli_query($koneksi, "UPDATE buku SET judul_buku = '$judul_buku', pengarang = '$pengarang', jenis_buku = '$jenis_buku', penerbit = '$penerbit' WHERE kd_buku = '$kd_buku'");
    
    if($update){
        header('location:buku.php');
    } else {
        echo 'Gagal';
        header('location:buku.php');
    }
}

//Menghapus buku
if(isset($_POST['hapusbuku'])) {
    $kd_buku = $_POST['kd_buku'];

    $hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE kd_buku= '$kd_buku'");
    if($hapus){
        header('location:buku.php');
        } else {
            echo 'Gagal';
            header('location:buku.php');
        }
    };

//kembalikan buku

$tgl = date('Y-m-d');
$query = mysqli_query($koneksi,"UPDATE meminjam SET tgl_kembali	= '$tgl', kembali = '2' where id_pinjam	='$_GET[id]'");

if ($query) {
    echo "<script>alert('Buku Sudah Dikembalikan');
    document.location.href='pinjam.php'</script>\n";
} else {
    echo "<script>alert('gagal');
    document.location.href='pinjam.php'</script>\n";
}

//pinjam
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

// hapus pinjam
$id	= $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM meminjam WHERE id_pinjam='$id'");
if ($query) {
    echo "<script>alert('data berhasil dihapus');
    document.location.href='pinjam.php'</script>\n";
    } else {
    echo "<script>alert('data gagal dihapus');
    document.location.href='pinjam.php'</script>\n";
    }
?>