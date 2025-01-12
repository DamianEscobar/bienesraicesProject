<?php

use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

  require '../../includes/app.php';

  // Revisa que el usuario este autenticado
  estaAuten();

  // Validar el ID
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id) {
    header('Location: /admin');
  }

  // Obtener los datos de la propiedad
  $propiedad = Propiedad::find($id);


  // Obtener los vendedores de la base de datos
  $query = "select * from vendedores";
  $vendedores = mysqli_query($db, $query);

  // if (!$vendedores) {
  //   die("Error en la consulta SQL: " . mysqli_error($db));
  // }


  //Arreglo de errores
  $errores = [];

  // Ejecuta el codigo una vez el usuario envie el formulario
  if($_SERVER["REQUEST_METHOD"] === "POST") {


    // Pasar el arreglo para sincronizar y convertir en objeto
    $propiedad->sincronizar($_POST);

    /** CARGAR LA IMAGEN */
    //Generar nombre unico para la imagen
    $nombreImagen = md5(uniqid(rand(),true)).".jpg";



    $errores = $propiedad->validar();

    if (empty($errores)) {

      /** Subida de imagenes */
      // Revisamos si existe la carpeta y la creamos
      if(!is_dir(CARPETA_IMAGENES)) {
        mkdir(CARPETA_IMAGENES);
      }

    // Usando intervetion image
    if($_FILES['imagen']['tmp_name']) {
      $manager = new Image(Driver::class);
      $imagen = $manager->read($_FILES['imagen']['tmp_name'])->cover(800, 600);
      $propiedad->setImagen($nombreImagen);
      
      // Guaradar la imagen en el server
      $imagen->save(CARPETA_IMAGENES . $nombreImagen);
    }

      //Insertar en la base de datos
      $propiedad->save();
    }
    
  }


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
          
          <?php include '../../includes/templates/formulario_propiedades.php' ?>

          <input 
            type="submit" 
            value="Actualizar Propiedad" 
            class="boton boton-verde"
          >
        </form>
    </main>

    <?php incluirTemplate('footer')?>