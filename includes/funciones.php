<?php 

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ .'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/$nombre.php";
}

function estaAuten(): void  {
    session_start();

    if(!$_SESSION['login']) {
      header('Location: /');
    }
}

// Debuguear para ver de con un formato mas legible
function debug($var) {
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
  exit;
}

// Escapar/Sanitizar HTML
function sani($html): string {
  $sani = htmlspecialchars($html);
  return $sani;
}

function validarTipoContenido($tipo) {
  $tipos = ['propiedad', 'vendedor'];

  return in_array($tipo, $tipos);
}

// Muestra mensajes
function notificacion($codigo): string {
  $mensaje = '';

  switch($codigo) {
    case 1:
      $mensaje = 'Creado Correctamente.';
      break;
    case 2:
      $mensaje = 'Actualizado Correctamente.';
      break;
    case 3:
      $mensaje = 'Eliminado Correctamente.';
      break;
    // En switch importante tener le default
    default;
      $mensaje = false;
      break;
  }

  return $mensaje;
}