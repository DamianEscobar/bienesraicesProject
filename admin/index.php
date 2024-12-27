<?php 
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

          <tbody>
            <tr>
              <td>1</td>
              <td>Casa en el bosque</td>
              <td><img src="/imagenes//8ceaec4579e43b39f99bb0be219bbd59.jpg" alt="imagen" class="imagen-table"></td>
              <td>$32000</td>
              <td>
                <a href="#" class="boton boton-rojo">Eliminar</a>
                <a href="#" class="boton boton-amarillo">Actualizar</a>
              </td>
            </tr>
          </tbody>
        </table>

    </main>

    <?php incluirTemplate('footer')?>