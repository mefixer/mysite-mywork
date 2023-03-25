<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <main>
                <div class="container-fluid">
                    <h3 class="mt-4"><?php echo $titulo; ?></h3>

                    <?php if (isset($validation)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $validation->listErrors(); ?>
                        </div>
                    <?php } ?>

                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>portadas/insertar" autocomplete="off">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-3">
                                    <label for="">Titulo</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo set_value('titulo') ?>" autofocus>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <label for="">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo set_value('descripcion') ?>">
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
                        <a href="<?php echo base_url(); ?>portadas" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-thermometer-quarter"></i> Regresar a la lista de portadas</a>
                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar la portada</button>
                    </form>
                </div>
            </main>
        </div>
        <div class="col-1"></div>
    </div>
</div>