<?php 

  // Importar la conexion a la DB
  require '../includes/config/database.php';
    $db = conectarDB();

  // Escribir el query
    $query = "SELECT * FROM propiedades";

  // Realizar la consulta a la DB
    $resultDb = mysqli_query($db, $query);

    $result = $_GET['result'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      // Validar el ID
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if($id) {
        //Eliminar imagen
        $query = "SELECT imagen FROM propiedades WHERE id = $id";
        $result = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($result);

        unlink('../imagenes/' . $propiedad['imagen']);

        // Eliminar propiedad
        $query = "DELETE FROM propiedades WHERE id = $id";
        $result = mysqli_query($db,$query);

        if($result) {
          header('Location: /admin?result=3');
        }
      }
    }



  require '../includes/funciones.php';
  incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php  if($result === "1"){ ?>
          <p class="alerta exito">Anuncio Creado Correctamente.</p>
        <?php } else if($result === "2") { ?>
          <p class="alerta exito">Anuncio Actualizado Correctamente.</p>
        <?php } else if($result === "3") { ?>
          <p class="alerta exito">Anuncio Eliminado Correctamente.</p>
        <?php }?>


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

                  <form method="POST" class="w-100">

                      <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?> ">

                    <input type="submit" value="Eliminar" class="boton boton-rojo">
                  </form>

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