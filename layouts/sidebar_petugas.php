<?php

session_start();
if ($_SESSION['id_level'] == "") {
    header("location:../index.php?info=login");
}
?>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php if ($_SESSION['id_level'] == "2") { ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/webme/petugas/index.php">
                <div class="sidebar-brand-text">Lelang Universe <sup>666</sup></div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/webme/petugas/index.php">
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/webme/petugas/barang.php">
                    <span>Data Barang</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/webme/petugas/aktivasi.php">
                    <span>Aktivasi Barang</span></a>
            </li>
        <?php } else
            header("Location:http://localhost/webme/admin/index.php"); { ?>
        <?php } ?>

        <!-- Sidebar Toggler (Sidebar)
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div> -->

    </ul>

</div>
<!-- End of Sidebar -->