<div class="container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col">

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class="mt-12"><?php echo $titulo; ?></h1>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<br>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>productos/addimagen/<?php echo $producto['id']; ?>" autocomplete="off">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Imagen base</h4>
                <div class="producto-tarjeta">
                    <img src="<?php echo base_url() . 'img/productos/' . $producto['img']; ?>" alt="" class="imagen-producto">
                </div>
            </div>
            <div class="col-lg-5 col-sm-5">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="add_imagen_producto"><strong>Seleccionar nueva imagen</strong></label>
                            <div class="input-group-prepend">
                                <input type="file" class="form-control" id="add_imagen_producto" name="add_imagen_producto" accept="image/png, .jpeg, .jpg, image/gif">
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
            </div>
            <div class="col-lg-4 col-sm-4">
            <br>
                <div class="row">
                    <br>
                    <?php foreach ($imagenes as $imagen) {; ?>
                        <img src="<?php echo base_url() . 'img/imagenes/' . $imagen['ruta']; ?>" alt="" class="imagen-producto-costado">
                    <?php }; ?>
                </div>
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
        width: 30%;
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