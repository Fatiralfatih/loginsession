<?php
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nama_lengkap = $_POST['nama_lengkap'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];
// update data ke database
mysqli_query($con, "update users set nama='$nama',nama_lengkap='$nama_lengkap',password='$password',id_level='$id_level' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:data-petugas.php?info=update");
