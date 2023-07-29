<?php

include '../layouts/header.php';

?>

<!-- Page Wrapper -->
<div id="wrapper">


    <?php include '../layouts/sidebar_admin.php'; ?>

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
                                <h6 class="m-0 font-weight-bold text-primary">Data Petugas dan admin</h6>
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                                    <i class="fas fa-plus"></i> Tambah Petugas
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Nama</th>
                                            <th>Nama Lengkap</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        include '../config.php';
                                        $tb_petugas = mysqli_query($con, "SELECT * FROM users INNER JOIN tb_level ON users.id_level=tb_level.id_level WHERE level='petugas' OR level='administrator' ORDER by level ASC");
                                        while ($d_tb_petugas = mysqli_fetch_assoc($tb_petugas)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $d_tb_petugas['nama']; ?></td>
                                                <td><?= $d_tb_petugas['nama_lengkap']; ?></td>
                                                <td><?= $d_tb_petugas['no_hp']; ?></td>
                                                <td><?= $d_tb_petugas['email']; ?></td>
                                                <td><?= $d_tb_petugas['level']; ?></td>
                                                <td style="color:red;">--Tidak ditampilkan--</td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubah-data<?= $d_tb_petugas['nama_lengkap']; ?>">
                                                        <i class="fas fa-edit"></i> edit </button>
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?= $d_tb_petugas['id']; ?>">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                    </tbody>

                                    <div class="modal fade" id="modal-hapus<?= $d_tb_petugas['id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Petugas/Admin</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda Yakin Akan Menghapus Data <b><?= $d_tb_petugas['nama_lengkap'] ?></b>?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                        <a href="hapus-petugas.php?id=<?= $d_tb_petugas['id']; ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>


                                    <div class="modal fade" id="ubah-data<?= $d_tb_petugas['nama_lengkap']; ?>" tabindex="-1" aria-labelledby="juduldata" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Admin/Petugas <?= $d_tb_petugas['nama_lengkap']; ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="update-petugas.php">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nama </label>
                                                            <input type="text" name="id" value="<?php echo $d_tb_petugas['id']; ?>" hidden>
                                                            <input type="text" class="form-control" value="<?= $d_tb_petugas['nama']  ?>" name="nama" required placeholder="Nama ...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Lengkap </label>
                                                            <input type="text" class="form-control" value="<?= $d_tb_petugas['nama_lengkap']  ?>" name="nama_lengkap" required placeholder="Nama lengkap ...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Hp </label>
                                                            <input type="number" class="form-control" value="<?= $d_tb_petugas['no_hp']  ?>" name="no_hp" required placeholder="No Hp ...">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email </label>
                                                            <input type="email" class="form-control" value="<?= $d_tb_petugas['email']  ?>" name="email" required placeholder="Email ...">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control" name="password" value="<?= $d_tb_petugas['password']; ?>" placeholder="Masukan Password">
                                                                <i>
                                                                    <font color="red">Abaikan jika password tidak di rubah *</font>
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Level</label>
                                                            <select name="id_level" class="form-control select2" style="width: 100%;">
                                                                <option disabled selected>--- Pilih Level ---</option>
                                                                <?php
                                                                include "../config.php";
                                                                $tb_level    = mysqli_query($con, "SELECT * FROM tb_level");
                                                                while ($d_tb_level = mysqli_fetch_array($tb_level)) {
                                                                ?>
                                                                    <option value="<?= $d_tb_level['id_level'] ?>" <?php if ($d_tb_level['id_level'] == $d_tb_petugas['id_level']) {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>><?= $d_tb_level['level'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php } ?>

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
                        <h4 class="modal-title">Tambah Data Petugas/Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="tambah-petugas.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" required placeholder="Masuukan Nama ...">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" required placeholder="Masukkan Nama Lengkap ...">
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control" name="no_hp" required placeholder="Masuukan No Hp ...">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="Masukkan Email ...">
                            </div>
                            <div class="form-group">
                                <!-- <label for="id_level">Level</label> -->
                                <select name="id_level" id="id_level" class="form-control select2" style="width: 100%;" hidden>
                                    <option default value="2">petugas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" name="password" class="form-control" required placeholder="Masukkan password ...">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>

        <script>
            history.pushState({}, "", 'data-petugas.php');
        </script>

        <?php

        require_once '../layouts/footer.php';

        ?>