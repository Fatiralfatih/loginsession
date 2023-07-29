<?php

include '../layouts/header.php';

?>

<!-- Page Wrapper -->
<div id="wrapper">


    <?php include '../layouts/sidebar_petugas.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php require_once '../layouts/navbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">





                <!-- Content Row -->
                <div class="row">
                    <?php
                    if (isset($_GET['info'])) {
                        if ($_GET['info'] == "hapus") { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-trash"></i> Data berhasil di hapus</h5>
                            </div>
                        <?php } else if ($_GET['info'] == "simpan") { ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Data berhasil di simpan</h5>
                            </div>
                        <?php } else if ($_GET['info'] == "update") { ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-edit"></i> Data berhasil di update</h5>
                            </div>
                    <?php }
                    } ?>
                    <div class="card shadow mb-4 col-12">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                                    <i class="fas fa-plus"></i> Tambah Barang
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Barang </th>
                                            <th>Harga barang</th>
                                            <th>Deskripsi Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        include "../config.php";
                                        $tb_barang    = mysqli_query($con, "SELECT * FROM tb_barang");
                                        while ($barangs = mysqli_fetch_array($tb_barang)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?= $barangs['nama_barang'] ?></td>
                                                <td><?= $barangs['tgl'] ?></td>
                                                <td><?= number_format($barangs['harga_awal']) ?></td>
                                                <td><?= $barangs['deskripsi_barang'] ?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahdata<?= $barangs['id_barang']; ?>">
                                                        <i class="fas fa-edit"></i> edit </button>
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $barangs['id_barang'] ?>">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="modal-hapus<?= $barangs['id_barang']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Data Barang</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form>
                                                            <div class="modal-body">
                                                                <p>Apakah Anda Yakin Akan Menghapus Data <b><?= $barangs['nama_barang'] ?></b>?</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <a href="hapus_barang.php?id_barang=<?= $barangs['id_barang']; ?>" class="btn btn-primary">Hapus</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                            <div class="modal fade" id="tambahdata<?= $barangs['id_barang']; ?>" tabindex="-1" aria-labelledby="juduldata" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data Barang <?= $barangs['nama_barang'] ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" action="update_barang.php">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Nama Barang</label>
                                                                    <input type="text" name="id_barang" value="<?php echo $barangs['id_barang']; ?>" hidden>
                                                                    <input type="text" class="form-control" value="<?php echo $barangs['nama_barang']; ?>" name="nama_barang" required placeholder="Nama Barang ...">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tanggal Barang</label>
                                                                    <input type="text" class="form-control" name="tgl" value="<?php echo $barangs['tgl']; ?>" required placeholder="Tanggal Barang">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Harga Barang</label>
                                                                    <input type="number" class="form-control" name="harga_awal" value="<?php echo $barangs['harga_awal']; ?>" required placeholder="Harga Awal ...">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi Barang</label>
                                                                    <textarea name="deskripsi_barang" class="form-control" required="required" rows="3"><?php echo $barangs['deskripsi_barang']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-tambah">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Barang</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="tambahbarang.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" required placeholder="Nama Barang ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Barang</label>
                                        <input type="date" class="form-control" name="tgl" required placeholder="Tanggal Barang">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Barang</label>
                                        <input type="number" class="form-control" name="harga_awal" required placeholder="Harga Awal ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Barang</label>
                                        <input name="deskripsi_barang" class="form-control" rows="3" required></input>
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


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->


        <script>
            history.pushState({}, "", 'barang.php');
        </script>
        <?php

        require_once '../layouts/footer.php';

        ?>