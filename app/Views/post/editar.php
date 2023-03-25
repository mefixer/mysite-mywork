<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4"><?php echo $titulo; ?></h1>
                    <?php if (isset($validation)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $validation->listErrors(); ?>
                        </div>
                    <?php } ?>
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>post/actualizar" autocomplete="off">
                        <input type="hidden" value="<?php echo $datos['id'] ?>" id="id" name="id">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="">Titulo</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $datos['titulo'] ?>" autofocus require>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><strong>Descripción</strong></span>
                                        <textarea class="form-control" id="descripcion" rows="4" name="descripcion" required><?php echo $datos['descripcion']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <label for="imagen_intermedio">Ingresar imagen</label>
                                    <input type="file" class="form-control" id="imagen_intermedio" name="imagen_intermedio" accept="image/png, .jpeg, .jpg, image/gif">
                                </div>
                            </div>
                        </div>
                        <br>
                        <a href="<?php echo base_url(); ?>post" class="btn btn-outline-primary btn-sm"><i class="fas fa-thermometer-quarter"></i> Regresar a la lista de unidades</a>
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar cambios</button>
                    </form>
                </div>
            </main>
        </div>
        <div class="col-1"></div>
    </div>
</div>