
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div>
                <h2 class="mt-4"><strong><?php echo $titulo; ?></strong></h2>
                <br>
                <p>
                    <a href="<?php echo base_url(); ?>/anuncios/nuevo" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Agregar un anuncio</a>
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descrición</th>
                            <th>imagen</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Titulo</th>
                            <th>Descrición</th>
                            <th>Imagen</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['titulo']; ?></td>
                                <td><?php echo $dato['descripcion']; ?></td>
                                <td><img class="w3-center w3-animate-left" src="<?php echo base_url() . '/img/anuncios/' . $dato['img']; ?>" style="width: 20%; height: 20%;"></td>
                                <td>
                                    <a href="<?php echo base_url() . '/anuncios/editar/' . $dato['id']; ?>" class="btn btn-sm"><i class="fas fa-edit"></i></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-href="<?php echo base_url() . '/anuncios/eliminar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-sm"><i class="fas fa-trash-alt"></i>
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
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No eliminar</button>
                <a class="btn btn-success btn-sm btn-ok">Si eliminar</a>
            </div>
        </div>
    </div>
</div>
<style>
    /* galeria */
    .img-galeria {
        object-fit: cover;
        align-items: center;
        object-fit: cover;
        width: 90%;
        height: 70vh;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    }

    body {
        background-color: #faf8f5;
    }

    .btn-tienda {
        background-color: #D97D48;
        color: white;
        width: 10rem;
        height: auto;
    }
</style>