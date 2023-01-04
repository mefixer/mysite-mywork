<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>/img/logo.png">
    <title>Abrazaté</title>
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/w3.css">
    <!-- Custom styles for this page -->
    <!-- <link href="<?php echo base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/css/tienda.css" rel="stylesheet">
</head>
<style>
    .imglogo {
        position: relative;
        background-image: url("<?php echo base_url() ?>/img/logo.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 100%;
        width: 14vh;
        height: 14vh;
    }
</style>

<body id="page-top">
    <nav id="nav-portada" class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex justify-content-around align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="texto-nav" aria-current="page" href="<?php echo base_url(); ?>/tienda/lista"><strong>Tienda</strong></a>
                    </li>
                </ul>
                <a class="navbar-brand" href="<?php echo base_url(); ?>/tienda">
                    <div class="imglogo"></div>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="texto-nav" aria-current="page" href="<?php echo base_url(); ?>/tienda/ver"><i class="fas fa-shopping-cart"></i><strong><?php echo $items ?></strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="card" style="background-color: #faf8f5;">
            <br>
            <div class="container" style="padding-top: 10vh; padding-bottom: 10vh; font-family: Cormorant Garamond, sans-serif !important;  font-size: larger !important; ">
                <div class="row">
                    <div class="col-lg-5 col-sm-8" style="border-radius: 50%;">
                        <div class="producto-tarjeta" style="border-radius: 50%;">
                            <img src="<?php echo base_url() . '/img/productos/' . $producto['img']; ?>" alt="" class="imagen-producto">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <?php foreach ($imagenes as $imagen) { ?>
                            <?php if ($imagen['id_producto'] == $producto['id']) {; ?>
                                <div class="row">
                                    <div class="col">
                                        <div class="producto-tarjeta-costado">
                                            <img src="<?php echo base_url() . '/img/imagenes/' . $imagen['ruta']; ?>" alt="" class="imagen-producto-costado">
                                        </div>
                                    </div>
                                </div>
                            <?php }; ?>
                        <?php }; ?>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="container-fluid">
                            <div class="row">
                                <label><strong style="font-size: 44px;"><?php echo $producto['nombre']; ?></strong></label>
                                <label style="font-size: 34px;">$ <?php echo  number_format($producto['precio_venta'], 0); ?></label>
                                <p><?php echo $producto['descripcion']; ?></p>
                            </div>
                            <div>
                                <a href="<?php echo base_url() . '/tienda/insertar/' . $producto['id']; ?>" type="button" class="btn btn-pedido">Agregar al pedido</a>
                                <a href="<?php echo base_url(); ?>/tienda/lista" class="btn btn-lista">lista de productos</a>
                                <a href="<?php echo base_url(); ?>/tienda" class="btn btn-tienda"> Regresar al inicio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

    <style>
        .texto-nav {
            color: black;
            cursor: pointer;
            font-size: 24px;
            text-decoration: none;
        }

        .texto-nav:hover {
            color: #732002;
            cursor: pointer;
            text-decoration: none;
        }

        .producto-tarjeta {
            background-color: #faf8f5;
            display: contents;
            width: 100%;
        }

        .imagen-producto {
            object-fit: cover;
            align-items: center;
            width: 100%;
            height: 32rem;
            border-radius: 3px;
        }

        .producto-tarjeta-costado {
            background-color: #faf8f5;
            display: contents;
            height: 100%;
        }

        .imagen-producto-costado {
            object-fit: cover;
            align-items: center;
            width: 75%;
            height: 10rem;
            padding-bottom: 15px;
            padding-top: 15px;
            border-radius: 3px;
        }

        .btn-tienda {
            background-color: #D97D48;
            color: white;
            width: 10rem;
            height: auto;
            padding: 3px;
            padding-right: 5px;
        }

        .btn-tienda:hover {
            background-color: #F786C7;
            color: white;
            width: 10rem;
            height: auto;
            padding: 3px;
            padding-right: 5px;
        }

        .btn-pedido {
            background-color: #809bce;
            color: white;
            width: 10rem;
            height: auto;
            padding: 3px;
            padding-right: 5px;
        }

        .btn-pedido:hover {
            background-color: #F786C7;
            color: white;
            width: 10rem;
            height: auto;
            padding: 3px;
            padding-right: 5px;
        }
        .btn-lista {
            background-color: #45a8ae;
            color: white;
            width: 10rem;
            height: auto;
            padding: 3px;
            padding-right: 5px;
        }

        .btn-lista:hover {
            background-color: #F786C7;
            color: white;
            width: 10rem;
            height: auto;
            padding: 3px;
            padding-right: 5px;
        }

    </style>