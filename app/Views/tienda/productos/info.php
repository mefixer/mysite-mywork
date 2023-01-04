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
    <div class="block">

    </div>
    <div class="block">

    </div>
    <div class="block">

    </div>
    <div class="block">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-10">

                <h2><?php echo $titulo ?></h2>

            </div>
            <div class="col-1">

            </div>
        </div>
    </div>
    <div class="block">

    </div>
    <div class="conteiner">
        <div class="row">
            <div class="col-lg-6">
                <div class="block">

                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-0"></div>
                    <div class="col-lg-8 col-sm-12">
                        <form method="POST" action="<?php echo base_url(); ?>/tienda/continuar">
                            <div class="row">
                                <div class="col-4">
                                    <label for="rut_cliente" class="form-label">Rut</label>
                                    <input type="text" placeholder="Ej: 11111111-1" onblur="checkRut(this), buscarut(this)" minlength="9" maxlength="9" class="form-control" id="rut_cliente" name="rut_cliente" required>
                                </div>
                                <div class="col-8">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" placeholder="hola@hola.com" maxlength="100" class="form-control" id="email_cliente" name="email_cliente" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="nombre_cliente" class="form-label">Nombre</label>
                                    <input type="text" placeholder="Ingresa tu nombre." minlength="3" maxlength="50" class="form-control" id="nombre_cliente" name="nombre_cliente"  required>
                                </div>
                                <div class="col-6">
                                    <label for="apellidos_cliente" class="form-label">Apellidos</label>
                                    <input type="text" placeholder="Ingresa tus apellidos." class="form-control" id="apellidos_cliente" name="apellidos_cliente" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="telefono_cliente" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" minlength="8" maxlength="12" placeholder="ingresa tu celular" id="telefono_cliente" name="telefono_cliente">
                                </div>
                                <div class="col-8">
                                    <label for="direccion_cliente" class="form-label">Dirección</label>
                                    <input type="text" placeholder="Ingresa tu dirección." minlength="5" maxlength="150" class="form-control" id="direccion_cliente" name="direccion_cliente"  required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="casa_cliente" class="form-label">Casa, apartamento, etc</label>
                                    <input type="text" placeholder="Ingresa el número de tu casa o depto." minlength="1" maxlength="7" class="form-control" id="casa_cliente" name="casa_cliente"  required>
                                </div>
                                <div class="col-6">
                                    <label for="postal_cliente" class="form-label">Código Postal</label>
                                    <input type="text" placeholder="Ingresa el código postal de tu ciudad" minlength="3" maxlength="12" class="form-control" id="postal_cliente" name="postal_cliente"  required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="region_cliente" class="form-label">Región</label>
                                    <select class="form-select" id="region_cliente" name="region_cliente" onchange="ciudad(this)">
                                        <option selected style="color: #d853fc;" disabled>Seleciona tu región</option>
                                        <?php foreach ($regiones as $region) { ?>
                                            <option value="<?php echo $region['id']; ?>"><?php echo $region['nombre']; ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="ciudad_cliente" class="form-label">Ciudad</label>
                                    <select class="form-select" id="ciudad_cliente" name="ciudad_cliente">
                                        <option selected style="color: #d853fc;" disabled>Primero selecciona la región</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <a href="<?php echo base_url(); ?>/tienda/ver" class="btn btn-pedido"><i class="fas fa-chevron-left"> </i>  Volver al pedido</a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-pedido">Continuar al método de envío <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </form>
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
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <div class="block">

                </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="row">
                            <?php if (isset($validation)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $validation->listErrors(); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="block">

    </div>

    <script>
        function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.', '');
            // Despejar Guión
            valor = valor.replace('-', '');
            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0, -1);
            dv = valor.slice(-1).toUpperCase();

            // Formatear RUN
            rut.value = cuerpo + '-' + dv

            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if (cuerpo.length < 7) {
                rut.setCustomValidity("RUT Incompleto");
                return false;
            }

            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;

            // Para cada dígito del Cuerpo
            for (i = 1; i <= cuerpo.length; i++) {

                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);

                // Sumar al Contador General
                suma = suma + index;

                // Consolidar Múltiplo dentro del rango [2,7]
                if (multiplo < 7) {
                    multiplo = multiplo + 1;
                } else {
                    multiplo = 2;
                }

            }

            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);

            // Casos Especiales (0 y K)
            dv = (dv == 'K') ? 10 : dv;
            dv = (dv == 0) ? 11 : dv;

            // Validar que el Cuerpo coincide con su Dígito Verificador
            if (dvEsperado != dv) {
                rut.setCustomValidity("RUT Inválido");
                return false;
            }

            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity('');
        }

        function ciudad(region) {
            var id = region.selectedIndex;
            var select = document.getElementById('ciudad_cliente');
            $.ajax({
                url: '<?php echo base_url(); ?>/tienda/ciudad',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    try {
                        var responseArray = JSON.parse(response);
                        var ciudades = responseArray;
                        var options = select.querySelectorAll('option');

                        for (let i = 0; i < options.length; i++) {
                            select.removeChild(options[i]);
                        }
                        for (let index = 0; index < ciudades.length; index++) {
                            var ciudad = document.createElement('option');
                            ciudad.id = "ciudad" + index;
                            ciudad.value = ciudades[index]['id'];
                            ciudad.text = ciudades[index]['nombre'];
                            select.appendChild(ciudad);
                        }
                    } catch (e) {
                        console.log(e);
                    }
                }
            });
        }

        function buscarut(rut) {
            var rut_cliente = rut['value'];
            $.ajax({
                url: '<?php echo base_url(); ?>/tienda/buscarut',
                type: 'POST',
                data: {
                    rut: rut_cliente
                },
                success: function(response) {
                    // Aquí puedes manejar la respuesta del controlador
                    try {
                        var responseArray = JSON.parse(response);
                        var cliente = responseArray;
                        var input_email = document.getElementById('email_cliente');
                        input_email.value = cliente['email'];
                        var input_nombre = document.getElementById('nombre_cliente');
                        input_nombre.value = cliente['nombre'];
                        var input_apellidos = document.getElementById('apellidos_cliente');
                        input_apellidos.value = cliente['apellidos'];
                        var input_telefono = document.getElementById('telefono_cliente');
                        input_telefono.value = cliente['telefono'];
                        var input_direccion = document.getElementById('direccion_cliente');
                        input_direccion.value = cliente['direccion'];
                        var input_casa = document.getElementById('casa_cliente');
                        input_casa.value = cliente['casa'];
                        var input_postal = document.getElementById('postal_cliente');
                        input_postal.value = cliente['codigo_postal'];                    
                    } catch (e) {
                        console.log(e);
                    }

                }
            });
        }

        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key);
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
            especiales = "8-37-39-46,.;:-_¿?¡!()";
            tecla_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                // Obtenemos el valor actual del campo de texto
                var campo = document.getElementById("nombre_cliente");
                // Obtenemos el valor actual del campo de texto
                var valor = "";
                // Eliminamos el último carácter del campo de texto
                campo.value = valor.substring(0, valor.length - 1);
            }
        }


        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            if (key == 8) {
                return key;
            } else {
                return (key >= 48 && key <= 57)
            }
        }
        // function soloNumeros(event) {
        //     // Get the pressed key
        //     const key = event.keyCode || event.which;

        //     // Allow the backspace key (key code 8)
        //     if (key === 8) {
        //         return true;
        //     }

        //     // Allow numbers (key codes 48-57)
        //     if (key >= 48 && key <= 57) {
        //         return true;
        //     }

        //     // Otherwise, return false
        //     return false;
        // }
    </script>
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