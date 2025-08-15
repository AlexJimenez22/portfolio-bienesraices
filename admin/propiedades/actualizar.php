<?php

// Incluye las funciones
require '../../includes/funciones.php';

$auth = estaAutenticado();

if(!$auth){
    header('Location: /');  
}

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); // filtra los datos enteros, si ninguno es enter entonces retorna false o null porque no hay valores

if(!$id){
    header('location: /admin'); // se le pone el / para que mande correctamente, sino no manda bien
}

require '../../includes/config/database.php'; // Importamos la conexion

$db = conectarDB(); // Guardamos la conexion

// Obtener propiedad para rellenr campos

$query = "SELECT * FROM propiedades WHERE id = $id";
$resultadoConsulta = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultadoConsulta);

$consulta = "SELECT * FROM vendedores"; // Consulta a vendedores
$resultado = mysqli_query($db, $consulta); // Recibimos de la base de datos los vendedores

$errores = []; // Arreglo para guardar los errores

// Declaramos las variables como string vacios para que aparezzcan como declarados
// Aparte de que se usan para que si algo falla al registrar ya se queden guardados los datos ingresados
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedores_id'];
$imagenPropiedad = $propiedad['imagen'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){ // SI el metodo es POST
    // echo '<pre>';
    // var_dump($_POST);   
    // echo '</pre>';

    // Gaurdamos los datos del formulario
    // EL mysqli_real_escape_string sanitiza los datos, recibe como parametro la conexion y el texto
    //Lo que hace es que desabilita todo comando que ingrese y lo convierte en una entidad
    $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
    $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
    $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
    $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
    $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
    $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
    $creado = date('Y/m/d');
    $imagen = $_FILES['imagen'];
    

    // Valida que esten todos los campos y sino lo mete en el array de errores
    if(!$titulo){
        $errores[] = "Debe de ingresar el titulo de la propiedad"; // Append a errores
    }
    if(!$precio){
        $errores[] = "Debe de ingresar el precio de la propiedad";
    }
    if( strlen($descripcion) < 50 ){
        $errores[] = "La descripción debe contenedor al menos 50 palabras";
    }
    if(!$habitaciones){
        $errores[] = "Debe de ingresar la cantidad de habitaciones de la propiedad";
    }
    if(!$wc){
        $errores[] = "Debe de ingresar la cantidad de baños de la propiedad";
    }
    if(!$estacionamiento){
        $errores[] = "Debe de ingresar la cantidad de espacios de estacionamiento de la propiedad";
    }
    if(!$vendedorId){
        $errores[] = "Debe de ingresar el vendedor al que corresponde la propiedad";
    }

    // Es la tamaño de archvivo que se puede ingresar, en este caso 1MB
    $medida = 1000 * 1000;

    // Si la imagen sobrepasa el peso entonces agrega error
    if($imagen['size'] > $medida){
        $errores[] = 'La imagen es muy pesada'; 
    }

    // Sino hay nada el el array de errores hace la insercion de los datos
    if(empty($errores)){

        $carpetaImagenes = "../../imagenes/"; //  se guardara la carpeta en la raiz del proyecto
        $nombreImagen = '';

        // // is_dir valida si un archivo esta creado
        if(!is_dir($carpetaImagenes)){ // Sino esta creado
        //mkdir crea un directorio
            mkdir($carpetaImagenes); 
        }

        if($imagen['name']){
            unlink($carpetaImagenes . $propiedad['imagen']);

            // // Crear un nombre único
            // //md5 hashea la entrada (la toma y la convierte)
            // //uniqid hace que no se repita y sea unico
            // //rand elige datos aleatorios
            $nombreImagen = md5( uniqid( rand(), true ) ) . '.jpg'; // Le agregamos la extension de la imagen

            // //Las imagenes se guardan temportalmente en un lugar temporal del servidor, tenemos que moverlas
            // //move_uploaded_file sirve para mover un archivo a otro directorio, recibe como parametro donde se encuentra y donde se guardara
            // // ["tmp_name"] aqui se guarda la imagen temporalmente
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen); // Ocupamos poner el nombre del archivo
        } else{
            $nombreImagen = $propiedad['imagen'];
        }


        $query = "UPDATE propiedades SET titulo = '$titulo', precio = $precio, imagen = '$nombreImagen', descripcion = '$descripcion', 
        habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, creado = '$creado', vendedores_id = $vendedorId 
        WHERE id = $id";
    
        // echo $query;
    
        $resultado = mysqli_query($db, $query);
    
        // Al ser ingresado redirige al usuario a otra pagina
        if($resultado){
            header('location: /admin?resultado=2'); // Query string
        } 
    }

}

incluirTemplate('header');

?>

<main class="contenedor">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>

        <div class="alerta error">
        <?php echo $error; ?>
        </div>  

    <?php endforeach ?>

    <!-- Si se le quita el action manda los datos al mismo archivo donde esta -->
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Nombre Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" min="1" value="<?php echo $precio ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" type="image/jpeg, image/png">

            <img src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="<?php echo $titulo; ?>" class="imagen-small">

            <label for="descripcion">descripcion</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" id="habitaciones" min="1" max="9" placeholder="Ej. 3" value="<?php echo $habitaciones ?>">


            <label for="wc">Baños</label>
            <input type="number" name="wc" id="wc" min="1" max="9" placeholder="Ej. 3" value="<?php echo $wc ?>">


            <label for="estacionamiento">estacionamiento</label>
            <input type="number" name="estacionamiento" id="estacionamiento" min="1" max="9" placeholder="Ej. 3" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option value="">--Seleccione--</option>
                <?php while($vendedores = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedorId === $vendedores['id'] ? "selected" : ""; ?>  value="<?php echo $vendedores['id']; ?>"> <?php echo $vendedores['nombre'] . " " . $vendedores['apellido']; ?> </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>


<?php 

incluirTemplate('footer');

?>