<?php

// Importar la DB
require 'includes/app.php';
$db = conectarDB();

// Crear un email y un password
$email = "correo@correo.com";
$password = "123456";

// Hashear la contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query para crear el usuario
$query = " INSERT INTO usuarios (email, password) VALUES ( '$email', '$passwordHash')";

// Agregar el usuario e la DB
 mysqli_query($db, $query); 