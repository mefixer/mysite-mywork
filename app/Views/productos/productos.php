<div class="container-fluid">
    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <h2 style="text-transform: uppercase;"><strong>Vista Previa</strong></h2>
        </div>
        <div class="col">

        </div>
    </div>
</div>
<div class="container">
</div>
<div class="container-fluid">

    <div class="card" style="background-color: #faf8f5;">
        <br>
        <?php $count = 0?>
        <?php foreach ($productos as $producto) {
            if ($count == 1) {
                break;
            }
            $count += 1 ;
        ?>
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
                                <a href="#" type="button" class="btn btn-tienda">Agregar al pedido</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>
        <br>
    </div>
</div>
<style>
    /* Global */
    @import url('https://fonts.googleapis.com/css?family=Cormorant+Garamond%3A300%2C400%2C400i%2C500%2C500i%2C600%2C700%7CEB+Garamond%3A300%2C400%2C400i%2C500%2C500i%2C600%2C700%7CSpectral%3A300%2C400%2C400i%2C500%2C500i%2C600%2C700%7CArimo%3A300%2C400%2C400i%2C500%2C500i%2C600%2C700&amp;subset=latin-ext&amp;display=swap&amp;ver=1.0.0');

    .producto-tarjeta {
        background-color: #faf8f5 !important;
        display: contents;
        width: 100%;
    }

    .imagen-producto {
        object-fit: cover;
        align-items: center;
        width: 100%;
        height: 42rem;
        border-radius: 3px;
    }

    .producto-tarjeta-costado {
        background-color: #faf8f5 !important;
        display: contents;
        height: 100%;
    }

    .imagen-producto-costado {
        object-fit: cover;
        align-items: center;
        width: 75%;
        height: 14rem;
        padding-bottom: 15px;
        padding-top: 15px;
        border-radius: 3px;
    }

    .btn-tienda {
        background-color: #D97D48 !important;
        color: white !important;
        width: 10rem !important;
        height: auto !important;
    }

    .btn-tienda:hover {
        background-color: #F786C7 !important;
        color: white !important;
        width: 10rem !important;
        height: auto !important;
    }

    body {
        background-color: #faf8f5 !important;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <!-- Page Heading -->
            <h2 class="mt-4"><strong><?php echo $titulo; ?></strong></h2>
            <div class="table-responsive">
                <p>
                    <a href="<?php echo base_url(); ?>/productos/nuevo" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Agregar un nuevo producto</a>
                </p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio de venta</th>
                            <th>Precio de compra</th>
                            <th>Existencias</th>
                            <th>Stock Mínimo</th>
                            <th>Inventariable</th>
                            <th>Imagen</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio de venta</th>
                            <th>Precio de compra</th>
                            <th>Existencias</th>
                            <th>Stock Mínimo</th>
                            <th>Inventariable</th>
                            <th>Imagen</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($productos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['codigo']; ?></td>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td>$ <?php echo  number_format($dato['precio_venta'], 0); ?></td>
                                <td>$ <?php echo  number_format($dato['precio_compra'], 0); ?></td>
                                <td><?php echo $dato['existencias']; ?></td>
                                <td><?php echo $dato['stock_minimo']; ?></td>
                                <td><?php echo $dato['inventariable']; ?></td>
                                <td>
                                    <a href="<?php echo base_url() . '/productos/imagen/' . $dato['id']; ?>" class="btn"><i class="fas fa-image"> + </i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . '/productos/editar/' . $dato['id']; ?>" class="btn"><i class="fas fa-edit"> </i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-href="<?php echo base_url() . '/productos/eliminar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn"><i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="modal-confirma"" tabindex=" -1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Registro</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de eliminiar éste registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No eliminar</button>
                <a class="btn btn-success btn-ok">Si eliminar</a>
            </div>
        </div>
    </div>
</div>