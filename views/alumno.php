<?php

$tituloPagina = "Datos de la alumna";
$nombreAlumno = "Silvana Gurlekian";
$fechaNac = "16/05/1986";

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="h1"><?php echo $tituloPagina; ?></h2>
        </div>
        <div class="col-xs-12 col-sm-4">
            <img src="images/perfil.jpg" alt="Silvana Gurlekian" class="img-alumno">
        </div>
        <div class="col-xs-12 col-sm-8">
            <p><strong>Nombre:</strong> <?php echo $nombreAlumno; ?></p>
            <p><strong>Fecha de nacimiento: </strong><?php echo $fechaNac; ?></p>
            <p><a href="mailto:silvana.gurlekian@davinci.edu.ar" target="_blank">silvana.gurlekian@davinci.edu.ar
                    <span>&#8599;</span></a></p>
            <p><a href="https://www.linkedin.com/in/silvana-gurlekian/" target="_blank">Linkedin
                    <span>&#8599;</span></a></p>
            <p><a href="https://www.delaidea.com" target="_blank">Portfolio <span>&#8599;</span></a></p>
        </div>
    </div>
</div>