<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <h2><?php echo $titulo ?></h2>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="block">

    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <a href="<?php echo base_url(); ?>/pedidos" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Volver a los pedidos</a>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
    <div class="block">

    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <div class="container box">
                <div class="row">
                    <div class=""><label><strong>Fecha:</strong> <?php echo $pedido['fecha_edicion'] ?></label></div>
                    <div class=""><label><strong>Rut:</strong> <?php echo $cliente['rut'] ?></label></div>
                    <div class=""><label><strong>Nombre:</strong> <?php echo $cliente['nombre'] ?> <?php echo $cliente['apellidos'] ?></label></div>
                    <div class=""><label><strong>Celular:</strong> +56<?php echo $cliente['telefono'] ?></label></div>
                    <div class=""><label><strong>Correo:</strong> <?php echo $cliente['email'] ?></label></div>
                    <div class=""><label><strong>Region:</strong> <?php echo $cliente['region'] ?></label></div>
                    <div class=""><label><strong>Ciudad:</strong> <?php echo $cliente['ciudad'] ?></label></div>
                    <div class=""><label><strong>Dirección:</strong> <?php echo $cliente['direccion'] ?></label></div>
                    <div class=""><label><strong>Casa:</strong> <?php echo $cliente['casa'] ?></label></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container box">
                <div class="row">
                    <?php $total = 0; ?>
                    <?php foreach ($productos as $producto) { ?>
                        <div class="col">
                            <div class=""><label><strong>Codigo:</strong> <?php echo $producto['codigo']; ?></label></div>
                            <div class=""><label><strong>Nombre:</strong> <?php echo $producto['nombre']; ?></label></div>
                            <div class=""><label><strong>Valor:</strong> $ <?php echo $producto['precio_venta']; ?></label></div>
                            <div class=""><img src="<?php echo base_url() . '/img/productos/' . $producto['img']; ?>" alt="" class="imagen-producto"></div>
                            <div class=""><label><strong>Cantidad:</strong> <?php echo $producto['cantidad']; ?></label></div>
                        </div>
                        <?php $total += $producto['precio_venta']; ?>
                    <?php }; ?>
                    <div class="col">
                        <div class=""><label for=""><strong>Total:</strong> <?php echo $total ?> </label></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="block">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <label for="estado">Estado del Pedido</label>
                <select class="form-select" name="estado" id="estado">
                    <option disabled>Seleccione el estado del pedido</option>
                    <?php foreach ($estados as $estado) { ?>
                        <option value="<?php echo $estado['id']; ?>" <?php if ($estado['id'] == $pedido['id_estado']) { ?> <?php echo 'selected'; ?> <?php   }; ?>><?php echo $estado['nombre']; ?></option>
                    <?php }; ?>
                </select>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</div>
<script>
    var select = document.getElementById("estado");
    select.onchange = function() {
        var valorSeleccionado = this.value;
        var pedido = <?php echo $pedido['id']?>;
        console.log(valorSeleccionado);
        $.ajax({
            url: '<?php echo base_url(); ?>/mascomprados/actualiza_estado',
            type: 'POST',
            data: {
                estado: valorSeleccionado,
                pedido: pedido
            },
            success: function(response) {
                // Aquí puedes manejar la respuesta del controlador
                try {
                    var responseArray = JSON.parse(response);
                    alert(responseArray);
                } catch (e) {
                    console.log(e);
                }

            }
        });
    }
</script>
<style>
    .imagen-producto {
        object-fit: cover;
        align-items: center;
        width: 10rem;
        height: 10rem;
        border-radius: 3px;
    }

    .block {
        width: 100%;
        height: 4vh;
    }

    .pedido {
        background-color: #cfe2ff;
    }

    .box {
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 20px;
        background-color: #faf8f5;
        border-style: solid;
        border-color: black;
    }
</style>