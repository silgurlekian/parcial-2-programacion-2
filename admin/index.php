<?PHP
require_once '../classes/Conexion.php';
// require_once '../classes/Comic.php';
// require_once '../classes/Personaje.php';
// require_once '../classes/Serie.php';
// require_once '../classes/Guionista.php';
// require_once '../classes/Artista.php';


$secciones_validas = [
    "dashboard" => [
        "titulo" => "Panel de Administración"
    ], "admin_comics" => [
        "titulo" => "Administración de Comics"
    ], "admin_personajes" => [
        "titulo" => "Administración de Personajes"
    ], "add_personaje" => [
        "titulo" => "Agregar un Personaje"
    ]
];

$seccion = $_GET['sec'] ?? "dashboard";

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = "404";
    $titulo = "404 - Página no encontrada";
} else {
    $vista = $seccion;
    $titulo = $secciones_validas[$seccion]['titulo'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tiendita de Comics :: <?= $titulo ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Panel de Administración</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=dashboard">Dashboard</a>
                    </li>                
                     <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=admin_comics">Comics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=admin_personajes">Personajes</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">

        <?PHP

        //Verifiquemos que el archivo exista.
        require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/404.php";

        ?>
    </main>


    <footer class="bg-info text-light text-center">
        Jorge Perez 2024
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</body>

</html>