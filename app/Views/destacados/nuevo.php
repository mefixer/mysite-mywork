<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <h3 class="mt-4"><strong><?php echo $titulo; ?></strong></h3>
            <p>
                <a href="<?php echo base_url(); ?>/destacados" class="btn btn-outline-dark"><i class="fas fa-heart"></i> volver a destacados</a>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Destacar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Destacar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($productos as $dato) { ?>
                            <tr>

                                <td><?php echo $dato['nombre']; ?></td>
                                <td><img src="<?php echo base_url() . '/img/productos/' . $dato['img']; ?>" alt="" style="width: 30%; height: 30%;"></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" <?php if ($dato['destacado'] == 1) {; ?> <?php echo 'checked'; ?> <?php }; ?>>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Destacado</label>
                                        <a href="<?php echo base_url(); ?>/destacados/insertar" hidden></a>
                                    </div>
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