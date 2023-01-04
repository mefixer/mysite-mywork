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
    <a href="<?php echo base_url(); ?>/pedidos" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Volver a los pedidos</a>
    </div>
    <div class="block">

    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <label><strong>Fecha:</strong> <?php echo $pedido['fecha_edicion'] ?></label>
            <div class=""><?php echo $cliente['rut'] ?></div>
            <div class=""><?php echo $cliente['nombre'] ?> <?php echo $cliente['apellidos'] ?></div>
            <div class="">+56<?php echo $cliente['telefono'] ?></div>
            <div class=""><?php echo $cliente['email'] ?></div>
            <div class=""><?php echo $cliente['region'] ?></div>
            <div class=""><?php echo $cliente['ciudad'] ?></div>
            <div class=""><?php echo $cliente['direccion'] ?></div>
            <div class=""><?php echo $cliente['casa'] ?></div>
        </div>
        <div class="col">
            <div class="row">
                <?php foreach ($productos as $producto) { ?>
                    <div class="col">
                        <div class="row"><?php echo $producto['codigo']; ?></div>
                        <div class="row"><?php echo $producto['nombre']; ?></div>
                        <div class="row"><?php echo $producto['precio_venta']; ?></div>
                        <div class="row"><img src="<?php echo base_url() . '/img/productos/' . $producto['img']; ?>" alt="" class="imagen-producto"></div>
                        <div class="row"><?php echo $producto['cantidad']; ?> <?php echo $producto['unidad']; ?></div>
                    </div>

                <?php }; ?>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
<style>
    .imagen-producto {
        object-fit: cover;
        align-items: center;
        width: 5rem;
        height: 5rem;
        border-radius: 3px;

    }

    .block {
        width: 100%;
        height: 4vh;
    }
</style>