<?php 

  // Validar el ID
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id) {
    header('Location: /admin');
  }

  //Base de datos
  require '../../includes/config/database.php';
  $db = conectarDB();

  // Obtener los datos de la propiedad
  $query = "SELECT * FROM propiedades WHERE id = $id";
  $result = mysqli_query($db, $query);
  $propiedad = mysqli_fetch_assoc($result);
//echo "<pre>";
//var_dump($propiedad);
//echo "</pre>";

  // Obtener los vendedores de la base de datos
  $query = "select * from vendedores";
  $vendedores = mysqli_query($db, $query);

  // if (!$vendedores) {
  //   die("Error en la consulta SQL: " . mysqli_error($db));
  // }

  // Inicializar la variables
  $titulo = $propiedad['titulo'];
  $precio = $propiedad['precio'];
  $descripcion = $propiedad['descripcion']; 
  $habitaciones = $propiedad['habitaciones'];
  $wc = $propiedad['wc'];
  $estacionamiento = $propiedad['estacionamiento'];
  $vendedorId = $propiedad['vendedores_id'];
  $imagen = $propiedad['imagen'];


  //Arreglo de errores
  $errores = [];

  // Ejecuta el codigo una vez el usuario envie el formulario
  if($_SERVER["REQUEST_METHOD"] === "POST") {
    
     //echo '<pre>';
     //var_dump($_POST);
     //echo '</pre>';
     //exit;

     //echo '<pre>';
     //var_dump($_FILES);
     //echo '</pre>';
     //exit;
    

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamientos']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    // Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

    if(!$titulo) {
      $errores[] = "Debes añadir un titulo";
    }
    if(!$precio) {
      $errores[] = "Debes añadir un precio";
    }
   
    // Validare el tamaño de la imagen (maximo 2000kb)
    $medida = 1000 * 2000;
    if($imagen['size']  >  $medida) {
      $errores[] = 'La imagen es muy pesada';
    }

    if(strlen($descripcion) < 50) {
      $errores[] = "Debes añadir una descripcion y debe contener como minimo 50 caracteres";
    }
    if(!$habitaciones) {
      $errores[] = "Debes añadir un numero de habitaciones";
    }
    if(!$wc) {
      $errores[] = "Debes añadir un numero de baños";
    }
    if(!$estacionamiento) {
      $errores[] = "Debes añadir un numero de estacionamientos";
    }
    if(!$vendedorId) {
      $errores[] = "Debes añadir un vendedor";
    }
    
    // echo '<pre>';
    // var_dump($errores);
    // echo '</pre>';

    if (empty($errores)) {
      // Subida de imagenes

      //Crear carpeta
      $carpetaImagenes = '../../imagenes/';

      // Revisamos si existe la carpeta y la creamos
      if(!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
      }


      if($imagen['name']) {
        // Eliminar imagen anterior
        unlink($carpetaImagenes . $propiedad['imagen']);

      //Generar nombre unico para la imagen
      $nombreImagen = md5(uniqid(rand(),true)).".jpg";
      //var_dump($nombreImagen);

      //Subir la imagen a la carpeta
      move_uploaded_file($imagen['tmp_name'],$carpetaImagenes . $nombreImagen );
      } else {
        $nombreImagen = $propiedad['imagen'];
      }
      

      //Insertar en la base de datos
      $query = "UPDATE propiedades SET titulo = '$titulo', precio = '$precio',imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedores_id = $vendedorId WHERE id = $id ";

      //echo $query; exit;

      $resultado = mysqli_query($db, $query);

      if($resultado) {
        //Redireccionar si se inserta en la DB
        header('Location: /admin?result=2');
      }

    }
    
  }

  require '../../includes/funciones.php';
  incluirTemplate('header'); 
?>

    <main class="contenedor seccion">

        <h1>Actualizar</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>


        <?php foreach($errores as $error) { ?>
          <div class="alerta error">
            <?php echo $error; ?>
          </div>

        <?php } ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
          <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input 
              type="text" 
              id="titulo" 
              name="titulo" 
              placeholder="Titulo propiedad"
              value="<?php echo $titulo; ?>"
            >

            <label for="precio">Precio:</label>
            <input 
              type="number" 
              id="precio" 
              name="precio" 
              placeholder="Titulo propiedad"
              value="<?php echo $precio; ?>"
            >

            <label for="imagen">Imagen:</label>
            <input 
              type="file" 
              id="imagen"
              name="imagen" 
              accept="image/jpeg, image/png"
            >
            
            <img src="../../imagenes/<?php echo $imagen; ?>" alt="imagen-pequeña" class="imagen-small">

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>

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
              value="<?php echo $habitaciones; ?>"
            >

            <label for="wc">Baños:</label>
            <input 
              type="number" 
              id="wc"
              name="wc" 
              placeholder="Ej: 3" 
              min="1" max="9"
              value="<?php echo $wc; ?>"
            >
            
            <label for="estacionamientos">Estacionamientos:</label>
            <input 
              type="number" 
              id="estacionamientos"
              name="estacionamientos" 
              placeholder="Ej: 2" 
              min="1" max="9"
              value="<?php echo $estacionamiento; ?>"
            >

          </fieldset>

          <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
              <option value="">--Seleccione--</option>
              <?php while($vendedor = mysqli_fetch_assoc($vendedores)) {  ?>
                <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido'];?></option>
              <?php } ?>
            </select>

          </fieldset>

          <input 
            type="submit" 
            value="Actualizar Propiedad" 
            class="boton boton-verde"
            >
        </form>
    </main>

    <?php incluirTemplate('footer')?>