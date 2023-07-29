<?php

include '../layouts/header.php';

if (isset($_SESSION["login"])) {
    header("Location: petugas/index.php");
}
?>

<!-- Page Wrapper -->
<div id="wrapper">


    <?php include '../layouts/sidebar_petugas.php'; ?>


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
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang <?= $_SESSION['nama_lengkap']; ?></h6>
                            </div>
                            <div class="card-body">
                                <p>Anda adalah <?= $_SESSION['nama_lengkap']; ?> Anda adalah petugas </p>
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