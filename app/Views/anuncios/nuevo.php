<main>
    <div class="container-fluid">
        <h3 class="mt-4"><?php echo $titulo; ?></h3>
        <br>
        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>/anuncios/insertar" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <span><strong>Titulo</strong></span>
                        <input type="text" class="form-control" id="titulo_anuncios" name="titulo_anuncios" required>
                        <span><strong>Descripción</strong></span>
                        <textarea class="form-control" id="descripcion_anuncios" rows="2" name="descripcion_anuncios" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <label for="imagen_intermedio">Ingresar imagen de post</label>
                        <input type="file" class="form-control" id="imagen_intermedio" name="imagen_intermedio" accept="image/png, .jpeg, .jpg, image/gif">
                    </div>
                </div>
            </div>
            <br>
            <a href="<?php echo base_url(); ?>/anuncios" class="btn btn-outline-primary btn-sm"><i class="fas fa-thermometer-quarter"></i> Regresar a la lista de anuncios</a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar anuancio</button>
        </form>
    </div>
</main>