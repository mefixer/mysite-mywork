<?php use CodeIgniter\Filters\CSRF; ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4"><?php echo $titulo; ?></h1>
        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>
        <form method="POST" action="<?php echo base_url(); ?>/usuarios/actualizar" autocomplete="off">
            <?php csrf_field(); ?>
            <input type="hidden" value="<?php echo $datos['id'] ?>" name="id">
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ?>" autofocus require>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $datos['apellido'] ?>" require>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-sm-3">
                        <label for="nombre_usuario">Nombre usuario</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo set_value('nombre_usuario')?>" autofocus >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $datos['correo'] ?>" autofocus require>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $datos['password'] ?>" require>
                    </div>
                </div>
            </div>

            <br>
            <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-outline-primary btn-sm"><i class="fas fa-thermometer-quarter"></i> Regresar a la lista de usuarios</a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar usuario</button>
        </form>
    </div>
</main>