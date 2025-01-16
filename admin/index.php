<?php

  require '../includes/app.php';

  use App\Propiedad;
  use App\Vendedor;

  // Autenticar al usuario
  estaAuten();

  // Implementar un metodo para obtener las propiedades/casas}
  $propiedades = Propiedad::all();
  $vendedores = Vendedor::all();



  $result = $_GET['result'] ?? null;

  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    // Validar el ID
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id) {
      $tipo = $_POST['tipo'];

      if(validarTipoContenido($tipo)) {

        if($tipo === 'propiedad') {
          $propiedad = Propiedad::find($id);
          $propiedad->delete();
        }else if($tipo === 'vendedor') {
          $vendedor = Vendedor::find($id);
          $vendedor->delete();
        }

      }

    }
  }


  incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php
          $mensaje = notificacion(intval($result));
          if($mensaje) : 
        ?>
          <p class="alerta exito"><?php echo sani($mensaje); ?></p>
        <?php endif; ?>

        <h2>Propiedades</h2>

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

            <?php foreach($propiedades as $propiedad) { ?>

              <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen" class="imagen-table"></td>
                <td>$ <?php echo $propiedad->precio; ?></td>
                <td>

                  <form method="POST" class="w-100">

                      <input type="hidden" name="id" value="<?php echo $propiedad->id; ?> ">
                      <input type="hidden" name="tipo" value="propiedad">

                    <input type="submit" value="Eliminar" class="boton boton-rojo">
                  </form>

                  <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo">Actualizar</a>
                </td>
              </tr>

            <?php } ?>

          </tbody>
        </table>


        <!-- VENDEDORES -->

        <h2>Vendedores</h2>

        <a href="/admin/vendedores/crear.php" class="boton boton-verde">Nuevo(a) Vendedor(a)</a>

        <table class="propiedades">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody><!-- Mostrar los resultados -->

            <?php foreach($vendedores as $vendedor) { ?>

              <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>

                  <form method="POST" class="w-100">

                      <input type="hidden" name="id" value="<?php echo $vendedor->id; ?> ">
                      <input type="hidden" name="tipo" value="vendedor">

                    <input type="submit" value="Eliminar" class="boton boton-rojo">
                  </form>

                  <a href="admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton boton-amarillo">Actualizar</a>
                </td>
              </tr>

            <?php } ?>

          </tbody>
        </table>

    </main>

<?php 
  // Cerrar la conexion a la DB


    incluirTemplate('footer')
?>