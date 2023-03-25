<main>
    <div class="container-fluid">
        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>
        <h3 class="mt-4"><?php echo $titulo; ?></h3>
        <form method="POST" action="<?php echo base_url(); ?>usuarios/insertar" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre') ?>" autofocus>
                    </div>
                    <div class="col-6 col-sm-6">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo set_value('apellido') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <label for="nombre_usuario">Nombre usuario</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo set_value('nombre_usuario') ?>" >
                    </div>
                    <div class="col-6 col-sm-6">
                        <label for="correo">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo set_value('correo') ?>" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password') ?>">
                    </div>
                    <div class="col-6 col-sm-6">
                        <label for="repassword">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" value="<?php echo set_value('repassword') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <label for="id_rol">Rol del usuario</label>
                        <select class="form-control form-control-sm" id="id_rol" name="id_rol">
                            <?php foreach ($rolusuarios as $rolusuario) { ?>
                                <option value="<?php echo $rolusuario['id']; ?>"><?php echo $rolusuario['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <a href="<?php echo base_url(); ?>usuarios" class="btn btn-outline-primary btn-sm"><i class="fas fa-thermometer-quarter"></i> Regresar a la lista de usuarios</a>
            <button type="submit" class="btn btn-outline-success btn-sm"><i class="far fa-save"></i> Guardar usuario</button>
        </form>
    </div>
</main>