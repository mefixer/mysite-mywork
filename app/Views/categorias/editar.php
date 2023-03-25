<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
            <form method="POST" action="<?php echo base_url(); ?>categorias/actualizar" autocomplete="off">
            <input type="hidden" value="<?php echo $datos['id']?>" name="id">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 col-sm-3">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre']?>" autofocus require>
                        </div>
                        <div class="col-6 col-sm-6">
                            <label for="">Descripcion</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" value="<?php echo $datos['descripcion']?>" rows="3" autofocus require></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <a href="<?php echo base_url(); ?>categorias" class="btn btn-primary btn-sm">Regresar</a>
                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
            </form>
        </div>
    </main>