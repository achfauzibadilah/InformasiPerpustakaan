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
?>