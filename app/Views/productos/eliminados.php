<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="mt-4"><?php echo $titulo; ?></h3>
    <p>
        <a href="<?php echo base_url(); ?>/productos/nuevo" class="btn btn-warning  btn-sm"><i class="fas fa-plus"></i> Agregar un nuevo producto</a>
        <a href="<?php echo base_url(); ?>/productos/eliminados" class="btn btn-danger btn-sm"><i class="fas fa-th-list"></i> Productos eliminados</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio de venta</th>
                            <th>Precio de compra</th>
                            <th>Existencias</th>
                            <th>Stock Mínimo</th>
                            <th>Inventariable</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio de venta</th>
                            <th>Precio de compra</th>
                            <th>Existencias</th>
                            <th>Stock Mínimo</th>
                            <th>Inventariable</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['id']; ?></td>
                                <td><?php echo $dato['codigo']; ?></td>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['precio_venta']; ?></td>
                                <td><?php echo $dato['precio_compra']; ?></td>
                                <td><?php echo $dato['existencias']; ?></td>
                                <td><?php echo $dato['stock_minimo']; ?></td>
                                <td><?php echo $dato['inventariable']; ?></td>
                                <td><a href="#" data-href="<?php echo base_url() . '/productos/reingresar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Restaurar registro"><i class="fas fa-level-up-alt"></i></a></td>
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
                <h5 class="modal-title">Restaurar Registro</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de restaurar éste registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No restaurar</button>
                <a class="btn btn-success btn-ok">Si restaurar</a>
            </div>
        </div>
    </div>
</div>