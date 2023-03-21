<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <h2 class="mt-4"><strong><?php echo $titulo; ?></strong></h2>
            <p>
                <a href="<?php echo base_url(); ?>/portadas/nuevo" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Agregar una portada</a>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Activo</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Activo</th>
                            <th>Editar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($portadas as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['titulo']; ?></td>
                                <td><?php echo $dato['descripcion']; ?></td>
                                <td><img src="<?php echo base_url() . '/img/portadas/' . $dato['img']; ?>" alt="" style="width: 20%; height: 20%;"></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" onchange="activar(this)" value="<?php echo $dato['id']; ?>" id="switchCheckPortada<?php echo $dato['id']; ?>" name="switchCheckPortada<?php echo $dato['id']; ?>" <?php if ($dato['activo'] == 1) {; ?> <?php echo 'checked'; ?> <?php } else { ?> <?php echo ''; ?> <?php }; ?>>
                                        <label class="form-check-label" for="switchCheckPortada<?php echo $dato['id']; ?>"></label>

                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . '/portadas/editar/' . $dato['id']; ?>" class="btn btn-sm"><i class="fas fa-edit"></i></i>
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
<script>
    function activar(id) {
        $.ajax({
            url: '<?php echo base_url(); ?>/portadas/activar',
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
<style>
    #slideportadas,
    .carousel-inner,
    .carousel-portadas,
    .carousel-item.active {
        height: 100vh;
    }
</style>