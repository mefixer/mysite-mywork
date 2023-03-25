<div class="container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <h1 class="mt-4"><?php echo $titulo; ?></h1>
            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>
        </div>
        <div class="col"></div>
    </div>
</div>
<br>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>productos/actualizar" autocomplete="off">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-3 col-sm-2">
                <div class="producto-tarjeta">
                    <img src="<?php echo base_url() . 'img/productos/' . $producto['img']; ?>" alt="" class="imagen-producto">
                </div>
            </div>
            <div class="col-5 col-sm-5">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><strong>Nombre</strong></span>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><strong>Precio Venta</strong></span>
                                <input type="text" class="form-control" id="precio_venta" name="precio_venta" value="<?php echo  $producto['precio_venta']; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><strong>Descripción</strong></span>
                                <textarea class="form-control" id="descripcion" rows="6" name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <label class=""><strong>Inventariable</strong></label>
                                <select class="form-control" id="inventariable" name="inventariable" required>
                                    <option value="1" <?php if ($producto['inventariable'] == 1) {
                                                            echo 'selected';
                                                        } ?>>Si</option>
                                    <option value="0" <?php if ($producto['inventariable'] == 0) {
                                                            echo 'selected';
                                                        } ?>>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="imagen_portada"><strong>Modificar imagen de producto</strong></label>
                            <div class="input-group-prepend">
                                <input type="file" class="form-control" id="imagen_portada" name="imagen_portada" accept="image/png, .jpeg, .jpg, image/gif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-5">
                <main>
                    <input type="hidden" id="id" name="id" value="<?php echo $producto['id']; ?>" />

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>Código</strong></span>
                                    <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $producto['codigo']; ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>Precio</strong></span>
                                    <input type="text" class="form-control" id="precio_compra" name="precio_compra" value="<?php echo $producto['precio_compra']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>Stock</strong></span>
                                    <input type="text" class="form-control" id="existencias" name="existencias" value="<?php echo $producto['existencias']; ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><strong>Stock Mínimo</strong></span>
                                    <input type="text" class="form-control" id="stock_minimo" name="stock_minimo" value="<?php echo $producto['stock_minimo']; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="">
                                    <label class=""><strong>Unidad</strong></label>
                                    <select class="form-control" id="id_unidad" name="id_unidad" required>
                                        <option value="" disabled>Unidad de medida</option>
                                        <?php foreach ($unidades as $unidad) { ?>
                                            <option value="<?php echo $unidad['id']; ?>" <?php if ($unidad['id'] == $producto['id_unidad']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php echo $unidad['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <label class=""><strong>Categoria</strong></label>
                                    <select class="form-control" id="id_categoria" name="id_categoria" required>
                                        <option value="" disabled>Categoria del producto</option>
                                        <?php foreach ($categorias as $categoria) { ?>
                                            <option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['id'] == $producto['id_categoria']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php echo $categoria['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <a href="<?php echo base_url(); ?>productos" class="btn btn-outline-dark col-12">
                                    <i class="fas fa-barcode"></i> Regresar a la lista de productos</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-success col-12"><i class="far fa-save"></i> Guardar los cambios</button>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</form>

<style>
    .producto-tarjeta {
        display: contents;
        width: 100%;
    }

    .imagen-producto {
        object-fit: cover;
        align-items: center;
        width: 100%;
        height: auto;
        padding-top: 2px;
    }

    .producto-tarjeta-costado {
        display: contents;
        height: 100%;
    }

    .imagen-producto-costado {
        object-fit: cover;
        align-items: center;
        width: 100%;
        padding-bottom: 3px;
    }

    .btn-tienda {
        background-color: #D97D48 !important;
        color: white !important;
        width: 10rem !important;
        height: auto !important;
    }

    .btn-tienda:hover {
        background-color: #F786C7 !important;
        color: white !important;
        width: 10rem !important;
        height: auto !important;
    }
</style>