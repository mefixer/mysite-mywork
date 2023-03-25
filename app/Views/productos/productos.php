
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <!-- Page Heading -->
            <h2 class="mt-4"><strong><?php echo $titulo; ?></strong></h2>
            <div class="table-responsive">
                <p>
                    <a href="<?php echo base_url(); ?>productos/nuevo" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Agregar un nuevo producto</a>
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
                                    <a href="<?php echo base_url() . 'productos/imagen/' . $dato['id']; ?>" class="btn"><i class="fas fa-image"> + </i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'productos/editar/' . $dato['id']; ?>" class="btn"><i class="fas fa-edit"> </i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'productos/eliminar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn"><i class="fas fa-trash-alt"></i>
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

<div class="modal fade" id="modal-confirma" tabindex=" -1" role="dialog">
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