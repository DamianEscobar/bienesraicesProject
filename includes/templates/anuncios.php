<?php
    // Importar DB
    $db = conectarDB();

    // Consultar DB
    $query = "SELECT * FROM propiedades LIMIT $limite";
    $result = mysqli_query($db,$query);


?>
<div class="contenedor-anuncios">

    <?php while($propiedad = mysqli_fetch_assoc($result)) { ?>

        <div class="anuncio">
    
            <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" />

            <div class="contenido-anuncio">
                <div class="aux-titulo">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p>
                        <?php echo $propiedad['descripcion']; ?>
                    </p>
                </div><!--.aux-titulo-->

                <div class="aux-precio-li">
                    <p class="precio"><?php echo $propiedad['precio']; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img
                                loading="lazy"
                                src="build/img/icono_wc.svg"
                                alt="icono wc" />
                            <p><?php echo $propiedad['wc']; ?></p>
                        </li>
                        <li>
                            <img
                                loading="lazy"
                                src="build/img/icono_estacionamiento.svg"
                                alt="icono estacionamiento" />
                            <p><?php echo $propiedad['estacionamiento']; ?></p>
                        </li>
                        <li>
                            <img
                                loading="lazy"
                                src="build/img/icono_dormitorio.svg"
                                alt="icono dormitorio" />
                            <p><?php echo $propiedad['habitaciones']; ?></p>
                        </li>
                    </ul>
                </div><!--.aux-precio-li-->
                <a class="boton boton-amarillo" href="anuncio.php?id=<?php echo $propiedad['id']; ?>"> Ver Propiedad </a>
            </div><!--contenio-anuncio-->
        </div><!--anuncio-->
    <?php } ?>
</div><!--.contenedor-anuncios-->

<?php 
    // Cerrar la conexion a la DB
    mysqli_close($db);
?> 