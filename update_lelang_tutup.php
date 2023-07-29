<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_lelang = $_POST['id_lelang'];
$status = $_POST['status'];
// update data ke database
mysqli_query($koneksi, "update tb_lelang set status='$status'");

// mengalihkan halaman kembali ke index.php
header("location:aktivasi.php?info=update");
