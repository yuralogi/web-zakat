<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WebZakat | Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/sbadmin2-templating')?> /vendor/fontawesome-free/css/all.min.css"
        rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/sbadmin2-templating')?> /css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/sbadmin2-templating')?> /css/script.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="<?php echo base_url('assets/sbadmin2-templating')?>/img/logoMasjid.png" type="image/x-icon">

</head>
<br>


<body class="bg-gradient-success">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center ">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <br>
                <br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-myimg"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
                                    </div>
                                    <form action="<?php echo base_url() . 'auth'?>" method="post"
                                        class="needs-validation">
                                        <div class="form-group">
                                            <input name="inputUsername" type="email"
                                                class="form-control form-control-user" id="inputUsername"
                                                aria-describedby="emailHelp" placeholder="Masukan Username Anda"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input name="inputPassword" type="password"
                                                class="form-control form-control-user" id="inputPassword"
                                                placeholder="Masukan Password" required>
                                            <div class="invalid-feedback">
                                                Nama Mustahik Wajib diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <?php if ($this->session->flashdata('flash')) : ?>

                                        <div class=" mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Login Gagal!</strong> User Tidak Ditemukan
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php endif; ?>

                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/sbadmin2-templating')?> /vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/sbadmin2-templating')?> /vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/sbadmin2-templating')?> /vendor/jquery-easing/jquery.easing.min.js">
    </script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/sbadmin2-templating')?> /js/sb-admin-2.min.js"></script>
</body>

</html>