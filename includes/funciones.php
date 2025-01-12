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
