<?php 
//importamos el archivo de funciones
require '../includes/funciones.php';

$auth = estaAutenticado();

if(!$auth){
    header('Location: /');
}

//Conexión a la base de datos
require '../includes/config/database.php';
$db = conectarDB();

// Escribir el query
$query = "SELECT * FROM propiedades";

//Hacer la consulta a la base de datos
$resultadoConsulta = mysqli_query($db, $query);

// el ?? evaliua si existe un valor y sino le asigna uno, en este caso null
$resultado = $_GET['resultado'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $id = $_POST['eliminar'];

    $query = "SELECT imagen FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);
    
    unlink("../imagenes/" . $propiedad['imagen']);

    $query = "DELETE FROM propiedades WHERE id = $id";
    $resultado = mysqli_query($db, $query);

    header('location: /admin?resultado=3');
}

// Incluimos la funcion de incluir con el parametro de header
//Importamos el header
incluirTemplate('header');

?>

<main class="contenedor">
    <h1>Administrador de Bienes Raices</h1>

    <?php if( intval($resultado) === 1): // intval convierte un valor string a entero ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif( intval($resultado) === 2 ): ?>
        <p class="alerta exito"> Anuncio Actualizado Correctamente</p>
    <?php elseif( intval($resultado) === 3 ): ?>
        <p class="alerta exito"> Anuncio Eliminado Correctamente</p>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedadad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- Mostrar los resultados de la base de datos -->
            <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)):  ?>
            <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td> <img src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen" class="imagen-tabla"> </td>
                <td>$ <?php echo $propiedad['precio']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="eliminar" value="<?php echo $propiedad['id']; ?>">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                    </form>
                    <a class="boton-amarillo-block"  href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>


<?php 

// Cerrar la conexion ( Opcional )
mysqli_close($db);

incluirTemplate('footer');

?>