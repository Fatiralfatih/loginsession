<?php
// koneksi database
include '../config.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($con, "DELETE FROM users WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:data-masyarakat.php?info=hapus");
