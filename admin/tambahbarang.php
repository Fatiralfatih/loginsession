<?php

// koneksi ke database

require '../config.php';

// input dari form  
$nama_barang = $_POST['nama_barang'];
$tgl = $_POST['tgl'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_barang = $_POST['deskripsi_barang'];

mysqli_query($con, "INSERT INTO tb_barang VALUES(null, '$nama_barang', '$tgl', '$harga_awal', '$deskripsi_barang')");

header("Location: barang.php?info=simpan");
