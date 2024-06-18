<?php
require_once "functions/autoload.php";

require_once 'includes/seccionesValidas.php';
require_once 'classes/Conexion.php';

$vista = isset($_GET['vista']) ? $_GET['vista'] : 'home';

if (!array_key_exists($vista, $seccionesValidas)) {
    $vista = "404";
    $titulo = "404: Página no encontrada";
} 
else {
    $vista = $vista;
    $titulo = $seccionesValidas[$vista]['titulo'];
}
// echo "<pre>";
// print_r($vista);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>

    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css?v=1.5">
</head>

<body id="inicio">

    <?php
    require_once 'views/header.php';
    ?>

    <main>
        <?php
        if (file_exists("views/$vista.php")) {
            require_once "views/$vista.php";
        } else {
            require_once "views/404.php";
        }
        ?>
    </main>

    <?php
    require_once 'views/footer.php';
    ?>

    <a href="#inicio" class="linkVolver">&#8593; Volver</a>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>