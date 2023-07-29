<?php
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$nama_barang = $_POST['nama_barang'];
$tgl = $_POST['tgl'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_barang = $_POST['deskripsi_barang'];

// menginput data ke database
mysqli_query($con, "INSERT INTO tb_barang VALUES(null, '$nama_barang', '$tgl', '$harga_awal', '$deskripsi_barang')");



// mengalihkan halaman kembali ke index.php
header("location:barang.php?info=simpan");
