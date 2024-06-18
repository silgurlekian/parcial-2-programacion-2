<?php

require_once 'classes/Vino.php';

$idVino = $_GET['id'] ?? FALSE;
$vino = Vino::productoIndividual($idVino);

// echo "<pre>";
// print_r($vino);
// echo "</pre>";

?>

<div class="container">

    <?php if (!empty($vino)) { ?>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <img src="images/vinos/<?php echo $vino->getImagen(); ?>" class="card-img-top d-block" alt="<?php echo $vino->getNombre(); ?>">
                <a href="index.php?vista=productos&tipo=<?php echo $vino->getTipo(); ?>" class="d-block text-center">Ver más vinos <?php echo $vino->getTipo(); ?></a>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h2 class="h1"><?php echo $vino->getNombre(); ?></h2>
                <p><?php echo $vino->getDescripcion(); ?></p>
                <h3 class="text-start mb-5"><strong>Precio: <?php echo $vino->precioFormat(); ?></strong></h3>

                <div class="d-flex align-items-center gap-2">
                    <p class="m-0">Cantidad:</p>
                    <div class="dropdown">
                        <button class="btn border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            1
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">2</a></li>
                            <li><a class="dropdown-item" href="#">3</a></li>
                            <li><a class="dropdown-item" href="#">+4</a></li>
                        </ul>
                    </div>
                </div>

                <button class="btn btn-primary mt-5">Comprar</button>
            </div>
        </div>
        <div class="row my-4 pb-4">
            <h3>Ficha técnica</h3>
            <div class="col-xs-12 col-md-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">CATEGORÍA</div>
                            <?php echo $vino->getCategoria(); ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">VARIEDAD</div>
                            <?php echo $vino->getVariedad(); ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">AÑO</div>
                            <?php echo $vino->getAno(); ?>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="col-xs-12 col-md-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">TIPO</div>
                            <?php echo $vino->upperTipo(); ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">LUGAR DE ELABORACIÓN</div>
                            <?php echo $vino->getZona(); ?>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">PAÍS</div>
                            Argentina
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    <?php } ?>
</div>