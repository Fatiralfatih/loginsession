<?php
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$id_lelang = $_POST['id_lelang'];
$harga_akhir = $_POST['harga_akhir'];
$status = $_POST['status'];
// update data ke database
mysqli_query($con, "UPDATE tb_lelang SET STATUS='$status', harga_akhir='$harga_akhir' WHERE id_lelang='$id_lelang'");

// mengalihkan halaman kembali ke index.php
header("location:aktivasi.php?info=update");
