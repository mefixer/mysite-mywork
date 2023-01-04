
<main>
    <div class="container-fluid">
        <h1 class="mt-4"><?php echo $titulo; ?></h1>
        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>
        <form method="POST" action="<?php echo base_url(); ?>/rolusuarios/actualizar" autocomplete="off">
            <input type="hidden" value="<?php echo $datos['id'] ?>" name="id">
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ?>" autofocus require>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $datos['descripcion'] ?>" require>
                    </div>
                </div>
            </div>
            <br>
            <a href="<?php echo base_url(); ?>/unidades" class="btn btn-outline-primary btn-sm"><i class="fas fa-thermometer-quarter"></i> Regresar a la lista de roles</a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar cambios</button>
        </form>
    </div>
</main>