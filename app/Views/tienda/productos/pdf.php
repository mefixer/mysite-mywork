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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
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
    <div class="container" id="div_pdf" style="background-color: white;">
        <div class="block">

        </div>
        <div class="block">

        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1><?php echo $titulo ?></h1>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="block">

        </div>
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-4">
                <label for=""><?php echo $cliente['nombre']; ?></label>
                <label for=""><?php echo $cliente['apellidos']; ?></label>
            </div>
            <div class="col-2">

            </div>
        </div>
        <div class="block">

        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6"><?php foreach ($productos as $producto) { ?>
                    <div class="row" style="padding: 3px;">
                        <div class="col-lg-1 col-sm-1"></div>
                        <div class="col-lg-8 col-sm-10">
                            <div class="row">
                                <div class="col">
                                    <div class="producto-tarjeta">
                                        <img src="<?php echo base_url() . '/img/productos/' . $producto['img']; ?>" alt="" class="imagen-producto">
                                    </div>
                                    <label style="font-size: 18px;"> <strong> <?php echo $producto['nombre']; ?></strong></label>
                                </div>
                                <div class="col">
                                    <div class="row" style="padding-top: 18px;">
                                        <div class="col">
                                            <div style="text-align: right;">
                                                <label style="font-size: 18px;"> $ <?php echo $producto['precio_venta']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-1"></div>
                    </div>
                <?php }; ?>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8" style="font-size: 18px;">
                    <div class="row">
                        <div class="col">
                            <strong>Total:</strong>
                        </div>
                        <div class="col">
                            <label><strong>$ <?php echo $subtotal; ?></strong></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-2">
            <button id="print-btn" class="btn btn-info" onclick="generaPDF()">Imprimir Comprobante</button>
            <a href="<?php echo base_url(); ?>/tienda" class="btn btn-lista"> Volver al Inicio</a>
        </div>
    </div>
</body>
<style>
    .texto-nav {
        color: black;
        cursor: pointer;
        font-size: 24px;
        text-decoration: none;
    }

    .block {
        width: 100%;
        height: 4vh;
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
        width: 10rem;
        height: 10rem;
        border-radius: 3px;

    }

    .btn-pedido {
        width: 100%;
        height: auto;
        padding: 3px;
    }

    .btn-pedido:hover {
        border-color: black;
        width: 100%;
        height: auto;
        padding: 3px;
    }

    .btn-info {
        background-color: #809bce;
        color: white;
        width: 100%;
        height: 35px;
        padding: 3px;
        padding-right: 5px;
    }

    .btn-info:hover {
        background-color: #F786C7;
        color: white;
        width: 100%;
        height: 35px;
        padding: 3px;
        padding-right: 5px;
    }

    .btn-lista {
        background-color: #45a8ae;
        color: white;
        width: 100%;
        height: auto;
        padding: 3px;
        padding-right: 5px;
    }

    .btn-lista:hover {
        background-color: #F786C7;
        color: white;
        width: 100%;
        height: auto;
        padding: 3px;
        padding-right: 5px;
    }

    /* Footer */
    .img-footer {
        width: 20rem;
    }

    .card-footer-left label {
        color: white;
        font-weight: bolder;
    }

    .card-footer-center label {
        color: white;
        font-weight: bolder;
    }

    .card-footer-right label {
        color: white;
        font-weight: bolder;
    }

    .footer h2 {
        color: white;
        font-size: 25px;
        font-weight: bolder;
    }

    .footer p {
        color: white;
        font-size: 16px;
    }

    .footer {
        padding-top: 30px;
        background-color: #732002;
    }

    .baja {
        padding-top: 10vh;
        object-fit: cover;
    }

    .informacion {
        background-color: #f7d6e6;
    }

    .pedido {
        background-color: #cfe2ff;
    }
</style>

<script>
    function generaPDF() {
        //se carga el div que contiene el detalle del pedido
        var div = document.getElementById("div_pdf");
        var pdf = new jsPDF("landscape", "pt", "a4");

        pdf.addHTML(div, 0, 0, {}, function() {
            // Llamar al método save para descargar el PDF
            pdf.save("Comprobante_Abrazate.pdf");
        });

    }
</script>