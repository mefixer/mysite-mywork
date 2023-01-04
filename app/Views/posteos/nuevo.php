<?php

use CodeIgniter\Filters\CSRF; ?>
<main>
    <div class="container-fluid">
        <h3 class="mt-4"><?php echo $titulo; ?></h3>

        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>

        <form method="POST" action="<?php echo base_url(); ?>/posteos/insertar" autocomplete="off">
            <?php csrf_field(); ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-sm-4">
                        <label for="">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="<?php echo set_value('url')?>" autofocus required>
                    </div>
                </div>
            </div>
            <br>
            <a href="<?php echo base_url(); ?>/posteos" class="btn btn-outline-primary btn-sm"><i class="fas fa-thermometer-quarter"></i> Regresar a la lista de posteos</a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar Posteo</button>
        </form>
    </div>
</main>