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
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="block"></div>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-8">
                <h1><?php echo $titulo ?></h1>
            </div>
            <div class="col-1">

            </div>
        </div>
    </div>
    <div class="block"></div>
    <form method="POST" action="<?php echo base_url(); ?>/tienda/finalizar" autocomplete="">
        <div class="conteiner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="block">

                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-0">

                        </div>
                        <div class="col-lg-8 col-sm-12">

                            <div class="row">
                                <label for="contacto" class="form-label"><strong> Contacto:</strong></label>
                                <div class="col-12">
                                    <p><?php echo $cliente['nombre']; ?> <?php echo $cliente['apellidos']; ?></p>
                                    <p><?php echo $cliente['email']; ?></p>
                                </div>
                            </div>
                            <div class="block">
                            </div>
                            <div class="row">
                                <label for="enviar" class="form-label"><strong>Enviar a:</strong> </label>
                                <div>
                                    <p><?php echo $cliente['direccion']; ?> <?php echo $cliente['casa']; ?>, <?php echo $ciudad['nombre']; ?>, <?php echo $region['nombre']; ?>.</p>
                                </div>
                            </div>
                            <div class="block">
                            </div>
                            <div class="row">
                                <?php foreach ($envios as $envio) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_envio" id="radio_envio" value="<?php echo $envio['id']; ?>" require>
                                        <label class="form-check-label" for="radio_envio">
                                            <?php echo $envio['nombre']; ?> <?php echo $envio['descripcion']; ?> <?php echo $envio['valor']; ?>
                                        </label>
                                    </div>
                                <?php }; ?>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-0">
                        </div>
                    </div>
                    <div class="block">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="block">

                    </div>
                    <div class="block">

                    </div>
                    <?php foreach ($productos as $producto) { ?>
                        <div class="row" style="padding: 3px;">
                            <div class="col-lg-1 col-sm-1"></div>
                            <div class="col-lg-8 col-sm-10">
                                <div class="row">
                                    <div class="col">
                                        <div class="producto-tarjeta">
                                            <img src="<?php echo base_url() . '/img/productos/' . $producto['img']; ?>" alt="" class="imagen-producto">
                                        </div>
                                        <label><strong style="font-size: 18px;"><?php echo $producto['nombre']; ?></strong></label>
                                    </div>
                                    <div class="col">
                                        <div class="row" style="padding-top: 18px;">
                                            <div class="col">
                                                <div style="text-align: right;">
                                                    <label style="font-size: 18px;"><strong> $ <?php echo $producto['precio_venta']; ?></strong></label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-1"></div>
                        </div>
                    <?php }; ?>
                    <br>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8" style="font-size: 18px;">
                            <div class="row">
                                <div class="col">
                                    <strong>Subtotal:</strong>
                                </div>
                                <div class="col">
                                    <label><strong>$ <?php echo $subtotal; ?></strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>Total:</strong>
                                </div>
                                <div class="col">
                                    <label><strong>$</strong> <strong id="total"> <?php echo $subtotal; ?></strong></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="block">

                                </div>
                                <div class="col">
                                    <input type="text" id="rut_cliente" name="rut_cliente" value="<?php echo $cliente['rut']; ?>" hidden>
                                    <button type="submit" class="btn btn-pedido"> Finalizar pedido</button>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="block">

                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="block">

    </div>
    <style>
        /* @import url('https://fonts.googleapis.com/css?family=Cormorant+Garamond%3A300%2C400%2C400i%2C500%2C500i%2C600%2C700%7CEB+Garamond%3A300%2C400%2C400i%2C500%2C500i%2C600%2C700%7CSpectral%3A300%2C400%2C400i%2C500%2C500i%2C600%2C700%7CArimo%3A300%2C400%2C400i%2C500%2C500i%2C600%2C700&amp;subset=latin-ext&amp;display=swap&amp;ver=1.0.0');

        body {
            font-family: "Cormorant Garamond", sans-serif;
            background-color: #faf8f5;
        } */

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
            width: 5rem;
            height: 5rem;
            border-radius: 3px;

        }

        .btn-pedido {
            color: white;
            background-color: #F786C7;
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
        // Obtenemos todos los radio buttons del formulario
        var radio_buttons = document.getElementsByName('radio_envio');
        // Asignamos un evento change a cada radio button
        for (var i = 0; i < radio_buttons.length; i++) {
            radio_buttons[i].addEventListener('change', function() {
                // Llamamos a la función que queremos ejecutar
                valor_envio();
            });
        }

        function valor_envio() {
            // Obtenemos todos los radio buttons del formulario
            var radio_buttons = document.getElementsByName('radio_envio');
            // Recorremos todos los radio buttons para comprobar cuál está seleccionado
            for (var i = 0; i < radio_buttons.length; i++) {
                // Si encontramos un radio button seleccionado
                if (radio_buttons[i].checked) {
                    // Guardamos su valor en una variable
                    var selected_value = radio_buttons[i].value;
                    var valor_envio = 0;
                    <?php foreach ($envios as $envio) { ?>
                        if (<?php echo $envio['id'] ?> == selected_value) {
                            valor_envio = <?php echo $envio['valor'] ?>;
                        }
                    <?php }; ?>
                    var subtotal = <?php echo $subtotal; ?>;
                    var strong_element = document.getElementById('total');
                    var total = (Number(valor_envio) + Number(subtotal));
                    strong_element.innerHTML = total;
                }
            }
        }
    </script>