<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap dari form login admin/petugas
$nama_lengkap = $_POST['nama_lengkap'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password

$login = mysqli_query($con, "SELECT * FROM users WHERE nama_lengkap='$nama_lengkap' and password='$password' ");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    // cek sebagai admin 
    if ($data['id_level'] == "1") {
        // session
        $_SESSION['nama_lengkap'] = $nama_lengkap;
        $_SESSION['id_level'] = "1";
        // redirect ke halaman admin
        header("Location: admin/index.php");
        // cek sebagai petugas
    } else if ($data['id_level'] == "2") {
        // session
        $_SESSION['nama_lengkap'] = $nama_lengkap;
        $_SESSION['id_level'] = "2";
        // redirect ke hal petugas
        header("Location:petugas/index.php");
    } else if ($data['id_level'] == "3") {
        // session
        $_SESSION['nama_lengkap'] = $nama_lengkap;
        $_SESSION['id_level'] = "3";
        header("Location: masyarakat/index.php");
    } else {
        // redirect ketika gagal login
        header("Location: index.php?info=gagal");
    }
} else {
    header("Location:index.php?info=gagal");
}
