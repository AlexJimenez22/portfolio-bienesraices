<?php 

// Obtener la conexion a la base de datos
require 'includes/app.php';
$db = conectarDB();

$errores = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $email = mysqli_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) );
    $password = mysqli_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[] = 'El E-Mail es obligatorio o es incorrecto';
    }
    if(!$password){
        $errores[] = 'La contraseña es obligatoria';
    }

    if(empty($errores)){

        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);
        
        if( $resultado->num_rows ){
            // Validar la contraseña  
            $usuario = mysqli_fetch_assoc($resultado);

            $auth = password_verify($password, $usuario['password']);

            if($auth){
                session_start();

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');
            } else{
                $errores[] = 'La contraseña es incorrecta';
            }
        } else{
            $errores[] = "El usuaro no existe";
        }
    }
}

// Incluir el header
incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">

    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error"> <?php echo $error; ?> </div>
     <?php endforeach; ?>   

    <form class="formulario" method="post">
        <fieldset>
            <legend>Email y Password</legend>
            <label for="email">E-mail: </label>
            <input type="email" placeholder="Tu E-mail" name="email" id="email">
            <label for="password">Password: </label>
            <input type="password" placeholder="Tu Password" name="password" id="password">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>

</main>

<?php 

incluirTemplate('footer');

?>