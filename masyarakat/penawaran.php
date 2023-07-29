<?php

include '../layouts/header.php';

?>

<!-- Page Wrapper -->
<div id="wrapper">


    <?php include '../layouts/sidebar_masyarakat.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php require_once '../layouts/navbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Content Row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->


        <script>
            history.pushState({}, "", 'penawaran.php');
        </script>

        <?php

        require_once '../layouts/footer.php';

        ?>