<?php
// koneksi database
include '../config.php';


// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$nama_lengkap = $_POST['nama_lengkap'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$id_level = $_POST['id_level'];
$password = $_POST['password'];

// menginput data ke database
mysqli_query($con, "INSERT into users values(null,'$nama','$nama_lengkap','$no_hp','$email','$password','$id_level')");

// mengalihkan halaman kembali ke index.php
header("location:http://localhost/webme/admin/data-masyarakat.php?info=simpan");
