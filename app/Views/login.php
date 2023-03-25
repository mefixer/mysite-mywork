
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url(); ?>img/logo-white.png">
    <title>Abrazaté</title>
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body id="page-top">
    <!-- Main Content -->
    <div id="content">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->

                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h2>Inicio de Abrazaté</h2>
                                            <br>
                                            <br>
                                        </div>
                                        <form method="POST" action="<?php echo base_url(); ?>usuarios/valida" autocomplete="off">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12">
                                                        <label for="nombre_usuario">Nombre usuario</label>
                                                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" autofocus>
                                                    </div>
                                                    <div class="col-12 col-sm-12">
                                                        <label for="password">Contraseña</label>
                                                        <input type="password" class="form-control" id="password" name="password" >
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Ingresar
                                            </button>
                                        </form>
                                        <br>
                                    </div>
                                    <br>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <?php if (isset($validation)) { ?>
        <div class="alert alert-danger">
            <?php echo $validation->listErrors(); ?>
        </div>
    <?php } ?>
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Abrazate 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>js/demo/datatables-demo.js"></script>

</body>

</html>