<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ) {

    include TEMPLATES_URL . "/$nombre.php";
}

function estaAutenticado() {
    session_start();

    if(!$_SESSION['login']) {
    header('Location: home.php');
    }
}

function debug($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}

// Escapar / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Valida tipo de petición
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo){
    $mensaje = '';
  
    switch($codigo) {
        case 1:
            $mensaje = 'Registro creado correctamente';
        break;
        case 2:
            $mensaje = 'Registro actualizado correctamente';
        break;
        case 3:
            $mensaje = 'Registro eliminado correctamente';
        break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function validarORedireccionar(string $url) {
    //Validar las URL por id valido

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: $url");
    }
    return $id;
}