<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <h3 class="mt-4"><strong><?php echo $titulo; ?></strong></h3>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Destacado</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Destacado</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($productos as $dato) { ?>

                            <tr>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><img src="<?php echo base_url() . 'img/productos/' . $dato['img']; ?>" alt="" style="width: 12%; height: 12%;"></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" onchange="destacar(this)" value="<?php echo $dato['id']; ?>" id="checkdestacado<?php echo $dato['id']; ?>" name="checkdestacado<?php echo $dato['id']; ?>" <?php if ($dato['destacado'] == 1) {; ?> <?php echo 'checked'; ?> <?php } else { ?> <?php echo ''; ?> <?php }; ?>>
                                        <label class="form-check-label" for="checkdestacado<?php echo $dato['id']; ?>"></label>
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
<script>
    function destacar(id) {
        $.ajax({
            url: '<?php echo base_url(); ?>destacados/destacar',
            type: 'POST',
            data: {
                id: id.value
            },
            success: function(response) {
                try {
                    var responseArray = JSON.parse(response);
                    console.log(responseArray);
                } catch (e) {
                    console.log(e);
                }
            }
        });
    }
</script>
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