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
<div id="slideportadas" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php $count = 0; ?>
        <?php foreach ($portadas as $dato) { ?>

            <div class="carousel-item carousel-portada <?php if ($count == 0) { ?>
                                                       <?php echo 'active'; ?>
                                                     <?php   }; ?> 
                                                        w3-animate-top" style="background-image: url('<?php echo base_url() . '/img/portadas/' . $dato['img']; ?>');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;">
                <div class="carousel-caption  w3-animate-left">
                    <h1 style="font-size: 44px; text-align: left; text-shadow: 2px 2px black;"><?php echo $dato['titulo']; ?></h1>
                    <p style="font-size: 34px; text-align: left; padding-bottom: 10vh; text-shadow: 2px 2px black;"><?php echo $dato['descripcion']; ?></p>
                </div>
            </div>
            <?php $count += 1; ?>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#slideportadas" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slideportadas" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <h2 class="mt-4"><strong><?php echo $titulo; ?></strong></h2>
            <p>
                <a href="<?php echo base_url(); ?>/portadas/nuevo" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Agregar una portada</a>
                <a href="<?php echo base_url(); ?>/portadas/eliminados" class="btn btn-outline-danger"><i class="fas fa-th-list"></i> Lista de eliminadas</a>
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
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Activo</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
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
                                        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckPortada" <?php if ($dato['activo'] == 1) {; ?> <?php echo 'checked'; ?> <?php } else { ?> <?php echo ''; ?> <?php }; ?>>
                                        <label class="form-check-label" for="switchCheckPortada"></label>
                                        <a href="<?php echo base_url() . '/portadas/check/' . $dato['id']; ?>" hidden></a>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . '/portadas/editar/' . $dato['id']; ?>" class="btn btn-sm"><i class="fas fa-edit"></i></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-href="<?php echo base_url() . '/portadas/eliminar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-sm"><i class="fas fa-trash-alt"></i>
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
    #slideportadas,
    .carousel-inner,
    .carousel-portadas,
    .carousel-item.active {
        height: 100vh;
    }
</style>