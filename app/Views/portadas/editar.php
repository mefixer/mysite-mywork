
<main>
    <div class="container-fluid">
        <h1 class="mt-4"><?php echo $titulo; ?></h1>
        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>portadas/actualizar" autocomplete="off">
            <input type="hidden" value="<?php echo $datos['id'] ?>" name="id">
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $datos['titulo'] ?>" autofocus require>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $datos['descripcion'] ?>" require>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <label for="imagen_portada">Ingresar imagen de Portada</label>
                        <input type="file" class="form-control" id="imagen_portada" name="imagen_portada" accept="image/png, .jpeg, .jpg, image/gif">
                    </div>
                </div>
            </div>
            <br>
            <a href="<?php echo base_url(); ?>portadas" class="btn btn-outline-primary btn-sm"><i class="fas fa-thermometer-quarter"></i> Regresar a la lista de portadas</a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar cambios</button>
        </form>
    </div>
</main>