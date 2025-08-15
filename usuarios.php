<?php

// Conectar base de datos

require 'includes/app.php';
$db = conectarDB();

// Crear correo y contraseña
$email = 'correo@correo.com';
$password = 'password';

// Hashear contraseña
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// para hasear se usa password_hash
// recibe como parametros la contraseña a hashear y el algoritmo

// Hacer la consulta
$query = "INSERT INTO usuarios (email, password) VALUES ( '$email', '$passwordHash') ";

// echo $query;

// Insertar a la base de datos
$resultado = mysqli_query($db, $query);