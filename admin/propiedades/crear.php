<?php 
  require '../../includes/app.php';

  use App\Propiedad;
  use App\Vendedor;
  use Intervention\Image\Drivers\Gd\Driver;
  use Intervention\Image\ImageManager as Image;


  // Autenticar al usuario
   estaAuten();

  $propiedad = new Propiedad;

  // Obtener los vendedores de la base de datos
  $vendedores = Vendedor::all();

  $errores = Propiedad::getErrores();

  // Ejecuta el codigo una vez el usuario envie el formulario
  if($_SERVER["REQUEST_METHOD"] === "POST") {

    $propiedad = new Propiedad($_POST);

    //Generar nombre unico para la imagen
    $nombreImagen = md5(uniqid(rand(),true)).".jpg";

    // Usando intervetion image
    if($_FILES['imagen']['tmp_name']) {
      $manager = new Image(Driver::class);
      $imagen = $manager->read($_FILES['imagen']['tmp_name'])->cover(800, 600);
      $propiedad->setImagen($nombreImagen);

    }

    $errores = $propiedad->validar();


    if (empty($errores)) {

      /** Subida de imagenes */
      // Revisamos si existe la carpeta y la creamos
      if(!is_dir(CARPETA_IMAGENES)) {
        mkdir(CARPETA_IMAGENES);
      }

      // Guardar la imagen en el servidor
      $imagen->save(CARPETA_IMAGENES . $nombreImagen);
      
      // Guardar en la base de datos
      $propiedad->save();
    }
    
  }


  incluirTemplate('header'); 
?>

    <main class="contenedor seccion">

        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>


        <?php foreach($errores as $error) { ?>
          <div class="alerta error">
            <?php echo $error; ?>
          </div>

        <?php } ?>

        <form class="formulario" action="/admin/propiedades/crear.php" method="POST" enctype="multipart/form-data">
          
          <?php include '../../includes/templates/formulario_propiedades.php' ?>

          <input 
            type="submit" 
            value="Crear Propiedad" 
            class="boton boton-verde"
            >
        </form>
    </main>

    <?php incluirTemplate('footer')?>