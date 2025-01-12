<?php
	//Incluye el header
	require 'includes/app.php';
	incluirTemplate('header');

	// Importar la conexion a la DB
	$db = conectarDB();

	// Arreglo de errores
	$errores = [];

	// Autenticar al usuario
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		// echo "<pre>";
		// var_dump($_POST);
		// echo "</pre>";

		// Filtro para email valido y para SQL
		$email = mysqli_real_escape_string( $db,  filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

		$password = mysqli_real_escape_string( $db,$_POST['password']);
		
		if(!$email) {
			$errores[] = 'El email es obligatorio o el email ingresado no es válido';
		}
		if(!$password) {
			$errores[] = 'El password es obligatorio o el password ingresado no es válido';
		}

		if(empty($errores)) {
			// Revisar si el usuario existe
			$query = " SELECT * FROM usuarios WHERE email = '$email' ";
			$result = mysqli_query($db, $query);

			if($result->num_rows) {
				// Obtener el contenido de la consulta SQL
				$usuario = mysqli_fetch_assoc($result);

				// Verificar si el password es correcto
				$auth = password_verify($password, $usuario['password']);

				if($auth) {
					// Usuario autenticado
					session_start();

					// Llenar el arreglo de la sesión
					$_SESSION['usuario'] = $usuario['email'];
					$_SESSION['login'] = true;

					header('Location: /admin');

				} else {
					// Contraseña incorrecta
					$errores[] = "El password es incorrecto";
				}

			} else {
				$errores[] = "El usuario no existe";
			}

		}
	}

?>

<main class="contenedor seccion contenido-centrado">
	<h1>Iniciar Sesión</h1>

	<?php foreach($errores as $error) { ?>
		<div class="alerta error">
			<?php echo $error; ?>
		</div>
	<?php } ?>

	<form method="POST" class="formulario" action="">

		<fieldset>
			<legend>Cuenta</legend>

			<label for="email">E-mail</label>
			<input id="email" type="email" name="email" placeholder="Tu E-mail" required>

			<label for="password">Password</label>
			<input id="password" type="password" name="password" placeholder="Tu Password" required>

		</fieldset>

		<input type="submit" value="Iniciar Sesión" class="boton boton-verde">
	</form>

</main>

<?php incluirTemplate('footer') ?>