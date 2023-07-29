<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register | Lelang Universe</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="http://localhost/webme/asset/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/webme/asset/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="http://localhost/webme/asset/modules/jquery-selectric/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="http://localhost/webme/asset/css/style.css">
    <link rel="stylesheet" href="http://localhost/webme/asset/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <h4>lelang Universe <sup>666</sup></h4>
                        </div>

                        <?php
                        if (isset($_GET['info'])) {
                            if ($_GET['info'] == "hapus") { ?>
                            <?php } else if ($_GET['info'] == "cekemail") { ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> email sudah dipake</h5>
                                </div>
                        <?php }
                        } ?>

                        <div class="card card-primary">
                            <div class="card-header justify-content-center">
                                <h4>Register Lelang Universe</h4>
                            </div>

                            <div class="card-body">
                                <form method="post" action="proses-register.php">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="nama">Nama : </label>
                                            <input id="nama" type="text" class="form-control" name="nama" autofocus required>
                                            <div class="invalid-feedback">
                                                Masukkan nama lengkap terlebih dahulu!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap : </label>
                                        <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" required>
                                        <div class="invalid-feedback">
                                            Masukkan nama lengkap terlebih dahulu!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No HP : </label>
                                        <input id="no_hp" type="number" class="form-control" name="no_hp" required>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email : </label>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="id_level" class="form-control select2" style="width: 100%;" hidden>
                                            <option default selected>3</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="password" class="d-block">Password : </label>
                                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                                                Register
                                            </button>
                                        </div>

                                        <div class="mt-5 text-muted text-center">
                                            Sudah punya akun? <a href="index.php">Login Disini</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Lelang Universe 2023
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="http://localhost/webme/asset/modules/jquery.min.js"></script>
    <script src="http://localhost/webme/asset/modules/popper.js"></script>
    <script src="http://localhost/webme/asset/modules/tooltip.js"></script>
    <script src="http://localhost/webme/asset/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://localhost/webme/asset/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="http://localhost/webme/asset/modules/moment.min.js"></script>
    <script src="http://localhost/webme/asset/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="http://localhost/webme/asset/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="http://localhost/webme/asset/modules/jquery-selectric/jquery.selectric.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="http://localhost/webme/asset/js/page/auth-register.js"></script>

    <!-- Template JS File -->
    <script src="http://localhost/webme/asset/js/scripts.js"></script>
    <script src="http://localhost/webme/asset/js/custom.js"></script>
</body>

</html>