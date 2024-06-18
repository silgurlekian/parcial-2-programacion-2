<?php
$vista = isset($_GET['vista']) ? $_GET['vista'] : 'home';
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h1>Cepante</h1>
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="Logo de Cepante">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item <?php echo $vista === 'home' ? 'active' : ''; ?>">
                        <a class="nav-link" aria-current="page" href="index.php?vista=home">Inicio</a>
                    </li>
                    <li class="nav-item <?php echo $vista === 'faqs' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php?vista=faqs">Preguntas frecuentes</a>
                    </li>
                    <li class="nav-item <?php echo $vista === 'productos' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php?vista=productos">Productos</a>
                    </li>
                    <li class="nav-item <?php echo $vista === 'contacto' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php?vista=contacto">Contacto</a>
                    </li>
                    <li class="nav-item <?php echo $vista === 'alumno' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php?vista=alumno">Datos alumna</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>