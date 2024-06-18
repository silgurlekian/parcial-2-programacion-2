<?php
require_once 'Conexion.php';
require_once 'Vino.php';

$vinos = Vino::vinosPorTipo('tinto');
foreach ($vinos as $vino) {
    echo $vino->getNombre() . "<br>";
}

$vinoSeleccionado = '';
$zonaSeleccionada = '';
$variedadSeleccionada = '';

$datosRecibidos = false;
$datos = $_POST;

if (!empty($datos)) {
    $vinoSeleccionado = $datos['tipo'] ?? '';
    $zonaSeleccionada = $datos['zona'] ?? '';
    $variedadSeleccionada = $datos['variedad'] ?? '';

    $datosRecibidos = true;
}

$tituloPagina = "Vinos";
$catalogo = [];

// Depuración: Verificar los valores recibidos
echo "<pre>";
print_r($datos);
echo "</pre>";

if ($datosRecibidos) {
    if ($vinoSeleccionado && !$zonaSeleccionada && !$variedadSeleccionada) {
        $catalogo = Vino::vinosPorTipo($vinoSeleccionado);
        $tituloPagina = !empty($catalogo) ? "Vinos " . ucfirst($vinoSeleccionado) : "Vinos";
    } elseif ($zonaSeleccionada && !$variedadSeleccionada) {
        $catalogo = Vino::vinosPorRegion($zonaSeleccionada);
        $tituloPagina = !empty($catalogo) ? "Vinos de " . ucfirst($zonaSeleccionada) : "Vinos";
    } elseif ($variedadSeleccionada && !$zonaSeleccionada) {
        $catalogo = Vino::vinosPorVariedad($variedadSeleccionada);
        $tituloPagina = !empty($catalogo) ? "Vinos " . ucfirst($variedadSeleccionada) : "Vinos";
    } elseif ($vinoSeleccionado && $zonaSeleccionada && !$variedadSeleccionada) {
        $catalogo = Vino::vinosPorTipoYRegion($vinoSeleccionado, $zonaSeleccionada);
        $tituloPagina = !empty($catalogo) ? "Vinos " . ucfirst($vinoSeleccionado) . " de " . ucfirst($zonaSeleccionada) : "Vinos";
    } elseif ($vinoSeleccionado && !$zonaSeleccionada && $variedadSeleccionada) {
        $catalogo = Vino::vinosPorTipoYVariedad($vinoSeleccionado, $variedadSeleccionada);
        $tituloPagina = !empty($catalogo) ? "Vinos " . ucfirst($vinoSeleccionado) . " " . ucfirst($variedadSeleccionada) : "Vinos";
    } elseif (!$vinoSeleccionado && $zonaSeleccionada && $variedadSeleccionada) {
        // Implementar búsqueda por región y variedad si es necesario
        // $catalogo = Vino::vinosRegionVariedad($zonaSeleccionada, $variedadSeleccionada);
        $tituloPagina = "Vinos"; // O establecer un título según tu lógica de negocio
    } elseif ($vinoSeleccionado && $zonaSeleccionada && $variedadSeleccionada) {
        // Implementar búsqueda por tipo, región y variedad si es necesario
        // $catalogo = Vino::vinosTipoRegionVariedad($vinoSeleccionado, $zonaSeleccionada, $variedadSeleccionada);
        $tituloPagina = "Vinos"; // O establecer un título según tu lógica de negocio
    } else {
        $catalogo = Vino::catalogoCompleto();
    }
} else {
    $catalogo = Vino::catalogoCompleto();
}

// Depuración: Verificar el catálogo resultante
echo "<pre>";
print_r($catalogo);
echo "</pre>";

?>
<div class="container">
    <div class="row">
        <section class="col-12" id="productos">
            <h2 class="h1"><?php echo htmlspecialchars($tituloPagina); ?></h2>
            <div class="row">
                <div class="accordion mb-3" id="busquedaAvanzada">
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="busquedaAvanzadaTitle">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#busquedaAvanzadaUno" aria-expanded="true" aria-controls="busquedaAvanzadaUno">
                                Búsqueda avanzada
                            </button>
                        </h3>
                        <div id="busquedaAvanzadaUno" class="accordion-collapse collapse show" aria-labelledby="busquedaAvanzadaTitle" data-bs-parent="#busquedaAvanzada">
                            <div class="accordion-body">
                                <form method="post" action="index.php?vista=productos">
                                    <div class="mb-3">
                                        <label for="tipo" class="form-label">Tipo:</label>
                                        <select name="tipo" id="tipo" class="form-select">
                                            <option value="">Todos</option>
                                            <option value="tinto" <?php echo ($vinoSeleccionado == 'tinto') ? 'selected' : ''; ?>>Tinto</option>
                                            <option value="blanco" <?php echo ($vinoSeleccionado == 'blanco') ? 'selected' : ''; ?>>Blanco</option>
                                            <option value="rosado" <?php echo ($vinoSeleccionado == 'rosado') ? 'selected' : ''; ?>>Rosado</option>
                                            <option value="espumante" <?php echo ($vinoSeleccionado == 'espumante') ? 'selected' : ''; ?>>Espumante</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="variedad" class="form-label">Variedad:</label>
                                        <select name="variedad" id="variedad" class="form-select">
                                            <option value="">Todos</option>
                                            <option value="Malbec" <?php echo ($variedadSeleccionada == 'Malbec') ? 'selected' : ''; ?>>Malbec</option>
                                            <option value="Chardonnay" <?php echo ($variedadSeleccionada == 'Chardonnay') ? 'selected' : ''; ?>>Chardonnay</option>
                                            <option value="Cabernet Sauvignon" <?php echo ($variedadSeleccionada == 'Cabernet Sauvignon') ? 'selected' : ''; ?>>Cabernet Sauvignon</option>
                                            <option value="Torrontés" <?php echo ($variedadSeleccionada == 'Torrontés') ? 'selected' : ''; ?>>Torrontés</option>
                                            <option value="Merlot" <?php echo ($variedadSeleccionada == 'Merlot') ? 'selected' : ''; ?>>Merlot</option>
                                            <option value="Sauvignon Blanc" <?php echo ($variedadSeleccionada == 'Sauvignon Blanc') ? 'selected' : ''; ?>>Sauvignon Blanc</option>
                                            <option value="Pinot Noir" <?php echo ($variedadSeleccionada == 'Pinot Noir') ? 'selected' : ''; ?>>Pinot Noir</option>
                                            <option value="Blend" <?php echo ($variedadSeleccionada == 'Blend') ? 'selected' : ''; ?>>Blend</option>
                                            <option value="Syrah" <?php echo ($variedadSeleccionada == 'Syrah') ? 'selected' : ''; ?>>Syrah</option>
                                            <option value="Cabernet Franc" <?php echo ($variedadSeleccionada == 'Cabernet Franc') ? 'selected' : ''; ?>>Cabernet Franc</option>
                                            <option value="Bonarda" <?php echo ($variedadSeleccionada == 'Bonarda') ? 'selected' : ''; ?>>Bonarda</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="zona" class="form-label">Zona:</label>
                                        <select name="zona" id="zona" class="form-select">
                                            <option value="">Todos</option>
                                            <option value="Mendoza" <?php echo ($zonaSeleccionada == 'Mendoza') ? 'selected' : ''; ?>>Mendoza</option>
                                            <option value="Patagonia" <?php echo ($zonaSeleccionada == 'Patagonia') ? 'selected' : ''; ?>>Patagonia</option>
                                            <option value="Salta" <?php echo ($zonaSeleccionada == 'Salta') ? 'selected' : ''; ?>>Salta</option>
                                            <option value="San Juan" <?php echo ($zonaSeleccionada == 'San Juan') ? 'selected' : ''; ?>>San Juan</option>
                                        </select>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="me-3 btn btn-primary">Buscar</button>
                                        <a href="index.php?vista=productos">Limpiar filtros</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if (!empty($catalogo)) {
                    foreach ($catalogo as $vino) { ?>
                        <div class="col-sm-6 col-md-4 mb-4">
                            <div class="card">
                                <span class="card-text tag"><?php echo htmlspecialchars($vino->getVariedadNombre()); ?></span>
                                <img src="img/vinos/<?php echo htmlspecialchars($vino->getImagen()); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($vino->getNombre()); ?>">
                                <div class="card-body">
                                    <h3 class="h5 card-title"><?php echo htmlspecialchars($vino->getNombre()); ?></h3>
                                    <p class="card-text"><?php echo htmlspecialchars($vino->getBodegaNombre()); ?></p>
                                    <a href="index.php?vista=producto&id=<?php echo htmlspecialchars($vino->getId()); ?>" class="btn btn-primary">Ver más</a>
                                </div>
                            </div>
                        </div>
                <?php }
                } else { ?>
                    <div class="alert alert-warning" role="alert">
                        No se han encontrado productos.
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
</div>
