<main>
    <div class="container-fluid">
        <h3 class="mt-4"><?php echo $titulo; ?></h3>

        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>

        <form method="POST" action="<?php echo base_url(); ?>categorias/insertar" autocomplete="off">
        <?php csrf_field(); ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-sm-3">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" autofocus >
                    </div>
                    <div class="col-6 col-sm-3">
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" autofocus >
                    </div>
                </div>
            </div>
            <br>
            <a href="<?php echo base_url(); ?>categorias" class="btn btn-outline-primary btn-sm"><i class="fas fa-tasks"></i> Regresar a lista de categorias</a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar categoria</button>
        </form>
    </div>
</main>