<?php

/**
 * Devuelve el catálogo completo de vinos
 * 
 * @return array Un array de objetos Vino
 */
function catalogoCompleto(): array {
    return Vino::catalogoCompleto();
}

/**
 * Devuelve el catálogo de vinos de un tipo específico
 * 
 * @param int $tipo_id ID del tipo de vino a buscar
 * @return array Un array de objetos Vino
 */
function vinosTipo(int $tipo_id): array {
    return Vino::vinosPorTipo($tipo_id);
}

/**
 * Devuelve el catálogo de vinos de una región específica
 * 
 * @param int $region_id ID de la región a buscar
 * @return array Un array de objetos Vino
 */
function vinosRegion(int $region_id): array {
    return Vino::vinosPorRegion($region_id);
}

/**
 * Devuelve el catálogo de vinos de una variedad específica
 * 
 * @param int $variedad_id ID de la variedad de vino a buscar
 * @return array Un array de objetos Vino
 */
function vinosVariedad(int $variedad_id): array {
    return Vino::vinosPorVariedad($variedad_id);
}

/**
 * Devuelve los datos de un vino en particular por su ID
 * 
 * @param int $idVino ID del vino a buscar
 * @return Vino|null Objeto Vino encontrado o null si no existe
 */
function producto_x_id(int $idVino): ?Vino {
    return Vino::vinoPorId($idVino);
}
?>
