<?php

// Conectar a la base de datos
// La importacion se debe de poner desde donde se manda a llamar en este caso este archivi
//por ejemplo para importa la base de datos entonces debo de llamarla desde index o desde anuncios, segun sea el caso

$db = conectarDB();

// Escribir la consulta
$query = "SELECT * FROM propiedades LIMIT $limite";

// Obtener los resultados
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio">
        <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio">$ <?php echo number_format($propiedad['precio']); ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio" loading="lazy">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
            </ul>

            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div> <!-- .contenido-anuncio -->
    </div> <!-- .anuncio -->
    <?php endwhile ?>
</div> <!-- .contenedor-anuncios -->


<?php

// Cerrar la conexion a la bse de datoes

mysqli_close($db);

?>