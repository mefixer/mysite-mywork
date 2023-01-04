<div id="slideportada" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php $count = 0; ?>
        <?php foreach ($portadas as $dato) { ?>

            <div class="carousel-item carousel-portada <?php if ($count == 0) { ?>
                                                       <?php echo 'active'; ?>
                                                     <?php   }; ?> 
                                                        w3-animate-top" style="background-image: url('<?php echo base_url() . '/img/portadas/' . $dato['img']; ?>');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;">
                <div class="carousel-caption  w3-animate-left">
                    <h1 style="font-size: 44px; text-align: left; text-shadow: 2px 2px black;"><?php echo $dato['titulo']; ?></h1>
                    <p style="font-size: 34px; text-align: left; padding-bottom: 10vh; text-shadow: 2px 2px black;"><?php echo $dato['descripcion']; ?></p>
                </div>
            </div>
            <?php $count += 1; ?>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#slideportada" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#slideportada" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>
<br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>
<br>
<br>
<div class="container-fluid">
    <?php foreach ($post as $dato) { ?>
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-1"></div>
            <div class="col-4  w3-container w3-center">
                <img class="img-galeria  w3-center w3-animate-left" src="<?php echo base_url() . '/img/post/' . $dato['img']; ?>">
            </div>
            <div class="col-6  w3-container w3-container w3-center w3-animate-right">
                <br>
                <br>
                <p style="font-size: 44px;"><?php echo $dato['titulo']; ?></p>
                <p style="font-size: 24px;"><?php echo $dato['descripcion']; ?></p>
                <br>
                <a style="font-size: 24px;" class="btn btn-tienda" href="<?php echo base_url(); ?>/tienda/lista">Tienda</a>
            </div>
            <div class="col-1"></div>
        </div>
        <?php break; }?>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="w3-container w3-center w3-animate-top">
                <h1 style="font-family: 'Cormorant Garamond', sans-serif; text-align: center; font-size: 44px;"><strong>Disfruta la magia del té, Conoce nuestros exclusivos sabores</strong></h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <br>
    <br>
    <div id="slideproducto" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner ">
            <?php $count = 0; ?>
            <?php foreach ($productos as $dato) { ?>

                <div class="carousel-item  carousel-producto <?php if ($count == 0) { ?>
                                                       <?php echo 'active'; ?>
                                                     <?php   }; ?> 
                                                        w3-animate-top" style="background-image: url('<?php echo base_url() . '/img/productos/' . $dato['img']; ?>');
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center center;
        height: 60vh;">
                    <div class="carousel-caption w3-animate-top">
                        <h1 style="font-size: 54px; color: aliceblue; text-shadow: 2px 2px black;"><strong><?php echo $dato['nombre']; ?></strong></h1>
                        <p style="font-size: 44px; color: aliceblue; text-shadow: 2px 2px black;"><strong>$ <?php echo $dato['precio_venta']; ?></strong></p>
                        <a href="<?php echo base_url() . '/tienda/producto/' . $dato['id'] ?>" class="btn btn-tienda"> ver producto</a>
                    </div>
                </div>
                <?php $count += 1; ?>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slideproducto" data-bs-slide="prev" style="padding-bottom: 20vh;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slideproducto" data-bs-slide="next" style="padding-bottom: 20vh;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="container-fluid">
    <div class="row d-flex justify-content-around align-items-center w3-container w3-center w3-animate-left">
        <?php foreach ($anuncios as $dato) { ?>
            <div class="col-4">
                <img class="img-medio img-galeria w3-container w3-center w3-animate-left" src="<?php echo base_url() . '/img/anuncios/' . $dato['img']; ?>" alt="...">
            </div>
        <?php } ?>
        <div class="col-4 w3-container w3-center w3-animate-right">
            <?php foreach ($anuncios as $dato) { ?>
                <h3 style="font-size: 34px; text-align: left;"><?php echo $dato['titulo'] ?></h3>
                <p style="font-size: 24px; text-align: left;"><?php echo $dato['descripcion'] ?></p>
            <?php } ?>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid">
    <h1 style="text-align: center;">Visitanos en Instagram</h1>
    <br>
    <br>
    <div id="slideinstagram" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $count = 0; ?>
            <?php foreach ($posteos as $dato) { ?>
                <div class="carousel-item insta <?php if ($count == 0) { ?>
                                                       <?php echo 'active'; ?>
                                                     <?php   }; ?> w3-animate-top">
                        <?php echo $dato['url']; ?>
                </div>
                <?php $count += 1; ?>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slideinstagram" data-bs-slide="prev" style="padding-bottom: 20vh;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slideinstagram" data-bs-slide="next" style="padding-bottom: 20vh;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>