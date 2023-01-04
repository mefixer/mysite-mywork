<?php if (isset($validation)) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $validation->listErrors(); ?>
    </div>
<?php } ?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card">
                    <div class="container">
                        <br>
                        <h1 class="mt-4"><?php echo $titulo; ?></h1>
                        <br>
                        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>/productos/insertar" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4 col-sm-6">
                                        <label for="codigo">Código</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" autofocus>
                                    </div>
                                    <div class="col-4 col-sm-6">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4 col-sm-6">
                                        <label for="Precio_venta">Precio Venta</label>
                                        <input type="text" class="form-control" id="precio_venta" name="precio_venta">
                                    </div>
                                    <div class="col-4 col-sm-6">
                                        <label for="precio_compra">Precio Compra</label>
                                        <input type="text" class="form-control" id="precio_compra" name="precio_compra">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4 col-sm-6">
                                        <label for="existencias">Existencias</label>
                                        <input type="text" class="form-control" id="existencias" name="existencias">
                                    </div>
                                    <div class="col-4 col-sm-6">
                                        <label for="stock_minimo">Stock Mínimo</label>
                                        <input type="text" class="form-control" id="stock_minimo" name="stock_minimo">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label for="id_unidad">Unidad</label>
                                        <select class="form-control form-control-sm" id="id_unidad" name="id_unidad">
                                            <option value="">Unidad de medida</option>
                                            <?php foreach ($unidades as $unidad) { ?>
                                                <option value="<?php echo $unidad['id']; ?>"><?php echo $unidad['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="id_categoria">Categoria</label>
                                        <select class="form-control form-control-sm" id="id_categoria" name="id_categoria">
                                            <option value="">Categoria del producto</option>
                                            <?php foreach ($categorias as $categoria) { ?>
                                                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label for="inventariable">Inventariable</label>
                                        <select class="form-control form-control-sm" id="inventariable" name="inventariable">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <label for="imagen_producto">Ingresar imagen de producto</label>
                                        <input type="file" class="form-control" id="imagen_producto" name="imagen_producto" accept="image/png, .jpeg, .jpg, image/gif">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <a href="<?php echo base_url(); ?>/productos" class="btn btn-outline-primary">
                                <i class="fas fa-barcode"></i> Regresar a la lista de productos</a>
                            <button type="submit" class="btn btn-outline-success"><i class="far fa-save"></i> Guardar producto</button>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</main>