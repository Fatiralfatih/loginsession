<?php

include '../layouts/header.php';
if (isset($_SESSION["login"])) {
    header("Location: masyarakat/index.php");
}
?>

<!-- Page Wrapper -->
<div id="wrapper">


    <?php include '../layouts/sidebar_masyarakat.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php include '../layouts/navbar.php'; ?>


            <!-- Begin Page Content -->
            <div class="container-fluid">


                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                    <div class="input-group">

                    </div>
                </form>
                <!-- Content Row -->
                <div class="row">
                    <div class="col-lg-12 mb-4 mt-4">
                        <!-- Approach -->
                        <div class="card shadow mb-5">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang <?= $_SESSION['nama_lengkap']; ?></h6>
                            </div>
                            <div class="card-body">
                                <p>Anda adalah <?= $_SESSION['nama_lengkap']; ?> anda adalah masyarakat</p>
                            </div>
                        </div>

                        <div class=" mb-5">
                            <h1>Barang yang dilelang</h1>
                        </div>
                        <div class="card-group">

                            <div class="card col-5">
                                <?php
                                include '../config.php';
                                $tb_barang = mysqli_query($con, "SELECT * FROM tb_barang");
                                while ($barangs = mysqli_fetch_assoc($tb_barang)) {
                                ?>
                                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Barang : <?= $barangs['nama_barang']; ?> </h5>
                                        <p class="card-text">Deskripsi Barang : <?= $barangs['deskripsi_barang']; ?> </p>
                                        <p class="card-text"><small class="text-body-secondary">Harga Barang: <?= $barangs['harga_awal'] ?></small></p>
                                        <button type="submit" name="submit" class="btn btn-primary">Pesan</button>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->



        <?php

        include '../layouts/footer.php';

        ?>