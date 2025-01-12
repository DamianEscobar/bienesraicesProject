<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectar a la base de datos. En esta funcion esta la instancia.
$db = conectarDB();

use App\Propiedad;

// Dandole valor a la atributos/variable de la DB, se setea la instancia
Propiedad::setDB($db);

