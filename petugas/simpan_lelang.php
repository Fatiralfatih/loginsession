<?php
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$id_barang = $_POST['id_barang'];
$harga_akhir = $_POST['harga_akhir'];
$tgl_lelang = date('Y-m-d');

// menginput data ke database
mysqli_query($con, "INSERT INTO tb_lelang VALUES(null, '$id_barang', '$harga_akhir', '$tgl_lelang', null)");

// mengalihkan halaman kembali ke index.php
header("location:aktivasi.php?info=simpan");
