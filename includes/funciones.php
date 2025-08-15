<?php


define('TEMPLATES_URL', __DIR__ . '/templates'); // Obtener la ruta completa de la carpeta templates
define('FUNCIONES_URL', __DIR__ . 'funciones.php'); // Obtener la ruta completa del archivo funciones.php

function incluirTemplate(string $nombre, bool $inicio = false){ // Aqui recibe el nombre del archivo e informacion extra
    include TEMPLATES_URL .  "/{$nombre}.php"; // Decimos que archivo es el que debe de cargar
}
function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];

    if($auth){
        return true;
    }

    return false;
}

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}