<?php

require_once("config.php");

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
header("location:index.php?info=daftar");

?>




// if (isset($_POST['submit'])) {

// // filter data yang diinputkan

// $nama = mysqli_real_escape_string($con, stripslashes($_POST['nama']));
// $nama_lengkap = mysqli_real_escape_string($con, stripslashes($_POST['nama_lengkap']));
// $no_hp = mysqli_real_escape_string($con, stripslashes($_POST['no_hp']));
// $email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
// $id_level = mysqli_real_escape_string($con, stripslashes($_POST['id_level']));
// $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));
// $repass = mysqli_real_escape_string($con, stripslashes($_POST['repass']));

// // enkripsi password
// $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));
// //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
// if (!empty(trim($nama)) && !empty(trim($nama_lengkap)) && !empty(trim($no_hp)) && !empty(trim($email)) && !empty(trim($id_level)) && !empty(trim($password)) && !empty(trim($repass))) {
// //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
// if ($password == $repass) {
// //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
// if (cek_nama($nama, $con) == 0) {
// //hashing password sebelum disimpan didatabase
// $pass = password_hash($password, PASSWORD_DEFAULT);
// //insert data ke database
// $query = "INSERT INTO users (nama_lengkap,nama,no_hp,email,id_level,password ) VALUES ('$nama_lengkap','$nama','$no_hp','$email','$id_level','$pass')";
// $result = mysqli_query($con, $query);
// //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
// if ($result) {
// $_SESSION['nama_lengkap'] = $nama_lengkap;

// header('Location: index.php?info=daftar');

// //jika gagal maka akan menampilkan pesan error
// }
// }
// }
// }
// }
// //fungsi untuk mengecek username apakah sudah terdaftar atau belum
// function cek_nama($nama_lengkap, $con)
// {
// $nama = mysqli_real_escape_string($con, $nama_lengkap);
// $query = "SELECT * FROM users WHERE nama_lengkap = '$nama'";
// if ($result = mysqli_query($con, $query)) return mysqli_num_rows($result);
// }