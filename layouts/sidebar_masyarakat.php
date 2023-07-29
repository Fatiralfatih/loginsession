<?php

session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['id_level'] == "") {
    header("location:../index.php?info=login");
}

?>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <?php if ($_SESSION['id_level'] == "3") { ?>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/webme/masyarakat/index.php">
                <div class="sidebar-brand-text">Lelang Universe <sup>666</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/webme/masyarakat/index.php">
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/webme/masyarakat/penawaran.php">
                    <span>Penawaran</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->
        <?php } else
            header("Location:http://localhost/webme/masyarakat/index.php"); { ?>

        <?php } ?>

    </ul>

</div>
<!-- End of Sidebar -->