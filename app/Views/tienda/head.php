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
    .imglogowhite {
        image-rendering: optimizeQuality;
        background-image: url("<?php echo base_url() ?>/img/logo-white.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 100%;
        width: 14vh;
        height: 14vh;
    }
    .imglogowhite:hover {
        image-rendering: optimizeQuality;
        background-image: url("<?php echo base_url() ?>/img/logo.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 100%;
        width: 14vh;
        height: 14vh;
    }
    .imglogocolor {
        image-rendering: optimizeQuality;
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
                        <a id="tienda" class="text-nav" aria-current="page" href="<?php echo base_url(); ?>tienda/lista"><strong>Tienda</strong></a>
                    </li>
                </ul>
                <a class="navbar-brand" href="<?php echo base_url(); ?>tienda">
                    <div id="logo" class="imglogowhite"></div>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="carro" class="text-nav" aria-current="page" href="<?php echo base_url(); ?>tienda/ver"><i class="fas fa-shopping-cart"></i><strong><?php echo $items?></strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>