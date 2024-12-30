<?php 
  // Importar la conexion a la DB
  require '../includes/config/database.php';
    $db = conectarDB();

  // Escribir el query
    $query = "SELECT * FROM propiedades";

  // Realizar la consulta a la DB
    $resultDb = mysqli_query($db, $query);


  require '../includes/funciones.php';
  incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Imagen</th>
              <th>Precio</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody><!-- Mostrar los resultados -->

            <?php while( $propiedad = mysqli_fetch_assoc($resultDb) ) { ?>

              <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen" class="imagen-table"></td>
                <td>$ <?php echo $propiedad['precio']; ?></td>
                <td>
                  <a href="#" class="boton boton-rojo">Eliminar</a>
                  <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton boton-amarillo">Actualizar</a>
                </td>
              </tr>

            <?php } ?>

          </tbody>
        </table>

    </main>

<?php 
  // Cerrar la conexion a la DB
  mysqli_close($db);

    incluirTemplate('footer')
?>