<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
                <!-- Page Heading -->
    <h1 class="mt-4"><?php echo $titulo; ?></h1>
    <p>
        <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-sm btn-outline-primary"><i class="fas fa-thermometer-quarter"></i> Volver a lista de usuarios</a>
    </p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Nombre Corto</th>
                            <th>Restaurar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Nombre Corto</th>
                            <th>Restaurar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['id']; ?></td>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['nombre_corto']; ?></td>
                                <td><a href="#" data-href="<?php echo base_url() . '/unidades/reingresar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Restaurar registro"><i class="fas fa-level-up-alt"></i></a></td>
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