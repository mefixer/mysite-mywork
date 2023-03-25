
<main>
    <div class="container-fluid">
        <h3 class="mt-4"><?php echo $titulo; ?></h3>

        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>

        <form method="POST" action="<?php echo base_url(); ?>rolusuarios/insertar" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-sm-3">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre')?>" autofocus >
                    </div>
                    <div class="col-6 col-sm-3">
                        <label for="">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo set_value('descripcion')?>">
                    </div>
                </div>
            </div>
            <br>
            <a href="<?php echo base_url(); ?>rolusuarios" class="btn btn-outline-primary btn-sm"><i class="fas fa-thermometer-quarter"></i> Regresar a la lista de roles</a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar rol de usuario</button>
        </form>
    </div>
</main>