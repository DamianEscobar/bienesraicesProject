<?php 
  //Base de datos
  require '../../includes/config/database.php';
  $db = conectarDB();

  if($_SERVER["REQUEST_METHOD"] === "POST") {
    /*
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamientos'];
    $vendedorId = $_POST['vendedor'];

    //Insertar en la base de datos
    $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId')";

    $resultado = mysqli_query($db, $query);
  }


  require '../../includes/funciones.php';
  incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <form class="formulario" action="/admin/propiedades/crear.php" method="POST">
          <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input 
              type="text" 
              id="titulo" 
              name="titulo" 
              placeholder="Titulo propiedad"
            >

            <label for="precio">Precio:</label>
            <input 
              type="number" 
              id="precio" 
              name="precio" 
              placeholder="Titulo propiedad"
            >

            <label for="imagen">Imagen:</label>
            <input 
              type="file" 
              id="imagen" 
              accept="iamge/jpeg, image/png"
            >

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"></textarea>

          </fieldset>

          <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input 
              type="number" 
              id="habitaciones"
              name="habitaciones" 
              placeholder="Ej: 3" 
              min="1" max="9"
            >

            <label for="wc">Baños:</label>
            <input 
              type="number" 
              id="wc"
              name="wc" 
              placeholder="Ej: 3" 
              min="1" max="9"
            >
            
            <label for="estacionamientos">Estacionamientos:</label>
            <input 
              type="number" 
              id="estacionamientos"
              name="estacionamientos" 
              placeholder="Ej: 2" 
              min="1" max="9"
            >

          </fieldset>

          <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="">
              <option value="1">Damian</option>
              <option value="2">Dahiana</option>
            </select>

          </fieldset>

          <input 
            type="submit" 
            value="Crear Propiedad" 
            class="boton boton-verde"
            >
        </form>
    </main>

    <?php incluirTemplate('footer')?>