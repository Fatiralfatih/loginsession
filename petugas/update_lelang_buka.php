<?php
// koneksi database
include '../config.php';

// update data ke database
mysqli_query($con, "UPDATE tb_lelang SET status='$_POST[status]', harga_akhir='$_POST[harga_akhir]' WHERE id_lelang='$_POST[id_lelang]'");

// mengalihkan halaman kembali ke index.php
header("location:aktivasi.php?info=update");
