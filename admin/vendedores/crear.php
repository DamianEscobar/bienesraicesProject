<?php 

require '../../includes/app.php';

use App\Vendedor;

// Autenticar al usuario
estaAuten();

$vendedor = new Vendedor;

// Arreglo con los mensajes de errores
$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Crear una nueva instancia con los datos enviados por POST
  $vendedor = new Vendedor($_POST);

  // Validar los campos, no deben estar vacios
  $errores = $vendedor->validar();

  // Guardar si no hay errores
  if(empty($errores)) {
    $vendedor->save();
  }

}

incluirTemplate('header');
?>


<main class="contenedor seccion">

<h1>Registrar Vendedor(a)</h1>

<a href="/admin" class="boton boton-verde">Volver</a>


<?php foreach($errores as $error) { ?>
  <div class="alerta error">
    <?php echo $error; ?>
  </div>

<?php } ?>

<form class="formulario" action="/admin/vendedores/crear.php" method="POST">
  
  <?php include '../../includes/templates/formulario_vendedores.php' ?>

  <input 
    type="submit" 
    value="Registrar Vendedor(a)" 
    class="boton boton-verde"
    >
</form>
</main>

<?php incluirTemplate('footer')?>