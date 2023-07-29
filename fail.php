<?php
session_start();

require_once("config.php");

// $nama_lengkap = $_POST['nama_lengkap'];
// $password = ($_POST['password']);

// // menyeleksi data admin dengan nama_lengkap dan password yang sesuai
// $data = mysqli_query($koneksi, "select * from users where nama_lengkap='$nama_lengkap' and password='$password'");

// // menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($data);

// if ($cek > 0) {
//     $_SESSION['nama_lengkap'] = $nama_lengkap;
//     $_SESSION['password'] = $password;
//     $_SESSION['status'] = "login";
//     header("location:masyarakat/index.php");
// } else {
//     header("location:index.php?info=gagal");
// }

// mengecek apakah form disubmit atau tidak
if (isset($_POST['login'])) {

    // menghilangkan backshlases
    $nama_lengkap = mysqli_real_escape_string($con, stripslashes($_POST['nama_lengkap']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));

    //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
    if (!empty(trim($nama_lengkap)) && !empty(trim($password))) {
        //select data berdasarkan username dari database
        $query      = "SELECT * FROM users WHERE nama_lengkap = '$nama_lengkap'";
        $result     = mysqli_query($con, $query);
        $rows       = mysqli_num_rows($result);
        if ($rows != 0) {
            $hash   = mysqli_fetch_assoc($result)['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['nama_lengkap'] = $nama_lengkap;
                $_SESSION['login'] = true;
                header('Location: masyarakat/index.php');
            }
        }
        if ($rows != 1) {
            header("Location:index.php?info=gagal");
        }
    }
}
