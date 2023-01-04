<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="mt-4"><?php echo $titulo; ?></h1>
    <p>
        <a href="<?php echo base_url(); ?>/portadas" class="btn btn-sm btn-outline-primary"><i class="fas fa-thermometer-quarter"></i> Volver a lista de portadas</a>
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
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Restaurar</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Restaurar</th>
                            <th>Imagen</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($portadas as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['titulo']; ?></td>
                                <td><?php echo $dato['descripcion']; ?></td>
                                <td><a href="#" data-href="<?php echo base_url() . '/portadas/reingresar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Restaurar registro"><i class="fas fa-level-up-alt"></i></a></td>
                                <td><img src="<?php echo base_url() . '/img/portadas/' . $dato['img']; ?>" alt="" style="width: 60%; height: 60%;"></td>
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