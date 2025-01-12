<?php

function conectarDB() : mysqli {
    // El del work
    //$db = mysqli_connect('localhost', 'root', 'Rootpass7', 'bienesraices_crud');

    //El de casa
    $db = new mysqli('localhost', 'root', 'sqlmy7', 'bienesraices_crud2');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}