<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <h3 class="mt-4"><strong><?php echo $titulo; ?></strong></h3>
            <p>
                <a href="<?php echo base_url(); ?>/destacados/nuevo" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Agregar destacado</a>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($productos as $dato) { ?>

                            <?php if ($dato['destacado'] == 1) {; ?>
                                <tr>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><img src="<?php echo base_url() . '/img/productos/' . $dato['img']; ?>" alt="" style="width: 30%; height: 30%;"></td>
                                    <td>
                                        <a href="#" data-href="<?php echo base_url() . '/destacados/eliminar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-sm"><i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }; ?>


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
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No eliminar</button>
                <a class="btn btn-success btn-sm btn-ok">Si eliminar</a>
            </div>
        </div>
    </div>
</div>