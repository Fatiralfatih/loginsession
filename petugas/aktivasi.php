<?php

include '../layouts/header.php';


?>


<div id="wrapper">


    <?php require_once '../layouts/sidebar_petugas.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php require_once '../layouts/navbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php
                if (isset($_GET['info'])) {
                    if ($_GET['info'] == "simpan") { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Barang berhasil di Lelang</h5>
                        </div>k
                    <?php } else if ($_GET['info'] == "update") { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-edit"></i> Barang berhasil di update</h5>
                        </div>
                <?php }
                } ?>
                <!-- Content Row -->
                <div class="row">
                    <div class="card shadow mb-4 col-12">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Aktivasi Lelang</h6>
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                                    <i class="fas fa-plus"></i> Tambah Lelang
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Lelang</th>
                                            <th>Harga Tertinggi</th>
                                            <th>Status Lelang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        include "../config.php";
                                        $tb_lelang = mysqli_query($con, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang");
                                        while ($d_tb_lelang = mysqli_fetch_array($tb_lelang)) {
                                        ?>
                                            <tr>
                                                <td> <?= $no++ ?></td>
                                                <td><?= $d_tb_lelang['nama_barang'] ?></td>
                                                <td><?= $d_tb_lelang['tgl_lelang'] ?></td>
                                                <td><?= number_format($d_tb_lelang['harga_akhir']) ?></td>
                                                <td>
                                                    <?php if ($d_tb_lelang['status'] == '') { ?>
                                                        <div class="btn btn-warning btn-sm">Lelang Belum Aktif</div>
                                                    <?php } else if ($d_tb_lelang['status'] == 'dibuka') { ?>
                                                        <div class="btn btn-success btn-sm">Lelang Dibuka</div>
                                                    <?php } else { ?>
                                                        <div class="btn btn-danger btn-sm">Lelang Ditutup</div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-buka<?= $d_tb_lelang['id_lelang']; ?>">Buka Lelang</button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-tutup<?= $d_tb_lelang['id_lelang']; ?>">Tutup Lelang</button>
                                                </td>
                                            </tr>


                                            <div class="modal fade" id="modal-tutup<?= $d_tb_lelang['id_lelang']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Aktivasi Tutup Lelang</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="form-group">
                                                            <form method="post" action="update_lelang_tutup.php">
                                                                <div class="modal-body">
                                                                    <p>Apakah anda ingin menutup lelang...?</p>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" value="ditutup" name="status" hidden="">
                                                                        <input type="text" class="form-control" value="<?= $d_tb_lelang['harga_akhir']; ?>" name="harga_akhir" hidden="">
                                                                        <input type=" text" class="form-control" value="<?= $d_tb_lelang['id_lelang']; ?>" name="id_lelang" hidden="">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Tutup</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>


                                            <div class="modal fade" id="modal-buka<?= $d_tb_lelang['id_lelang']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Aktivasi Buka Lelang</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="form-group">
                                                            <form method="post" action="update_lelang_buka.php">
                                                                <div class="modal-body">
                                                                    <p>Apakah anda ingin membuka lelang...?</p>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" value="dibuka" name="status" hidden="">
                                                                        <input type="text" class="form-control" value="<?= $d_tb_lelang['harga_akhir']; ?>" name="harga_akhir" hidden="">
                                                                        <input type="text" class="form-control" value="<?= $d_tb_lelang['id_lelang']; ?>" name="id_lelang" hidden="">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->





        <div class="modal fade" id="modal-tambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Lelang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="simpan_lelang.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <select name="id_barang" class="form-control select2" style="width: 100%;">
                                    <option disabled selected>--- Pilih Barang ---</option>
                                    <?php
                                    include "../config.php";
                                    $tb_barang = mysqli_query($con, "SELECT * FROM tb_barang");
                                    while ($d_tb_barang = mysqli_fetch_array($tb_barang)) {
                                    ?>
                                        <option value="<?= $d_tb_barang['id_barang']; ?>"><?= $d_tb_barang['nama_barang']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lelang</label>
                                <input type="date" class="form-control" name="tgl_lelang" placeholder="Harga Awal ...">
                            </div>
                            <div class="form-group">
                                <label>Harga Akhir</label>
                                <input type="number" class="form-control" name="harga_akhir" placeholder="Masukkan Harga Akhir Lelang">
                            </div>
                            <div class="form-group">
                                <select name="status" class="form-control select2" style="width: 100%;" hidden>
                                    <option disabled selected>pilih status</option>
                                    <option value="dibuka">dibuka</option>
                                    <option value="dibuka">ditutup</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <script>
            history.pushState({}, "", 'aktivasi.php');
        </script>
        <?php

        require_once '../layouts/footer.php';

        ?>