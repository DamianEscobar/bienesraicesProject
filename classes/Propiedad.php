<?php

namespace App;

class Propiedad {
	
	// Base de Datos atributo/variable
	protected static $db;
	// Darle valor al atributo/variable de la DB. Es decir, pasarle la conexion.
	public static function setDB($database) {
		self::$db = $database;
	}
	
	// Un arreglo que nos sirve para mapear los datos, debe ser tal como en la DB
	protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];


	// ERRORES
	public static $errores = [];


	public $id;
	public $titulo;
	public $precio;
	public $imagen;
	public $descripcion;
	public $habitaciones;
	public $wc;
	public $estacionamiento;
	public $creado;
	public $vendedores_id;

	public function __construct($args = [])
	{
		$this->id = $args['id'] ?? '';
		$this->titulo = $args['titulo'] ?? '';
		$this->precio = $args['precio'] ?? '';
		$this->imagen = $args['imagen'] ?? '';
		$this->descripcion = $args['descripcion'] ?? '';
		$this->habitaciones = $args['habitaciones'] ?? '';
		$this->wc = $args['wc'] ?? '';
		$this->estacionamiento = $args['estacionamiento'] ?? '';
		$this->creado = date('Y/m/d');
		$this->vendedores_id = $args['vendedores_id'] ?? '';
	}

	// Revisar si se debe insertar o actualizar
	public function save() {
		if(isset($this->id) && $this->id != '') {
			// Actualizar registro
			$this->update();

		} else {
			// Insertar registro nuevo
			$this->insert();
		}
	}

	// Insertar nuevo registro
	public function insert() {
		// Sanitizar los datos a insertar
		$atributos = $this->sanitizarAtributos();

		// Pasa a texto plano las llaves del arreglo "atributos"
		$stringKey = join(', ', array_keys($atributos));
		// Lo mismo para los valores
		$stringValues = join("', '", array_values($atributos));

		//Insertar en la base de datos
		$query = " INSERT INTO propiedades ( ";
		$query .= $stringKey;
		$query .= " ) VALUES ( ' ";
		$query .= $stringValues;
		$query .= " ' ) ";
	

		$result = self::$db->query($query);

		if($result) {
			//Redireccionar si se inserta en la DB
			header('Location: /admin?result=1');
		  }
	}

	// Actualizar registro
	public function update() {
		// Sanitizar los datos a insertar
		$atributos = $this->sanitizarAtributos();

		$valores = [];
		foreach($atributos as $key => $value) {
			$valores[] = " $key = '$value' ";
		}

		$query = " UPDATE propiedades SET ";
		$query .= join(', ', $valores);
		$query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
		$query .= " LIMIT 1 ";
		
		$result = self::$db->query($query);

		
		if($result) {
			//Redireccionar si se inserta en la DB
			header('Location: /admin?result=2');
		  }
	}

	public function delete() {
		// Eliminar el registro de la DB
		$query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";

		$result = self::$db->query($query);

		if($result) {
			$this->borrarImagen();
			header('Location: /admin?result=3');
		  }
	}


	// Identificar y unir los atribustos de la DB
	public function atributos() {
		$atributos = [];
		foreach(self::$columnasDB as $columna) {

			// Con este "continue", cuando este en el id lo va a ignorar y pasara al siguiente.
			if($columna === 'id') continue;

			$atributos[$columna] = $this->$columna;
		}
		return $atributos;
	}

	// Metodo para sanitizar los datos a insertar
	public function sanitizarAtributos() {
		$atributos = $this->atributos();
		$sanitizado = [];

		// Aqui se sanitizan los datos y se reasignan en un nuevo arreglo
		foreach($atributos as $key => $value) {
			$sanitizado[$key] = self::$db->escape_string($value);
		}

		return $sanitizado;
	}

	// Validar que no halla errores
	public static function getErrores() {
		return self::$errores;
	}

	public function validar() {
		
    if(!$this->titulo) {
      self::$errores[] = "Debes añadir un titulo";
    }
    if(!$this->precio) {
      self::$errores[] = "Debes añadir un precio";
    }

    if(!$this->imagen) {
      self::$errores[] = "Debes añadir una imagen o la imagen supera el tamaño limite";
    }

    if(strlen($this->descripcion) < 50) {
      self::$errores[] = "Debes añadir una descripcion y debe contener como minimo 50 caracteres";
    }
    if(!$this->habitaciones) {
      self::$errores[] = "Debes añadir un numero de habitaciones";
    }
    if(!$this->wc) {
      self::$errores[] = "Debes añadir un numero de baños";
    }
    if(!$this->estacionamiento) {
      self::$errores[] = "Debes añadir un numero de estacionamientos";
    }
    if(!$this->vendedores_id) {
      self::$errores[] = "Debes añadir un vendedor";
    }

		return self::$errores;
	}

	// Subir o cargar un archivo
	public function setImagen($imagen) {
		// Revisar por una imagen anterior
		$this->borrarImagen();
	
		// Asignar imagen al atributo/propiedad
		if($imagen) {
			$this->imagen = $imagen;
		}
	}

	// Borrar un archivo
	public function borrarImagen() {
		// Comprobar si hay imagen anterior
		if(isset($this->id) && $this->id != '') {
			$existeImagen = file_exists(CARPETA_IMAGENES . $this->imagen);
			// Elimina el archivo en caso de que exista
			if($existeImagen) {
				unlink(CARPETA_IMAGENES . $this->imagen);
			}
		}
	}

	// Listar todas las propiedades/casa
	public static function all(): array {
		$query = "SELECT * FROM propiedades";

		$result = self::consultarSQL($query);

		return $result;
	}

	// Busca una PROPIEDAD/CASA por su ID
	public static function find($id) {
		$query = "SELECT * FROM propiedades WHERE id = $id";

		$result = self::consultarSQL($query);

		// array_shift() : retorna el primer elemento de un arreglo
		return array_shift($result);
	}

	public static function consultarSQL($query): array {
		// Consultar la DB
		$result = self::$db->query($query);
		
		$array = [];

		// Se crea y asigna un valor a $registro en este caso un array asociativo, mientras siga habiendo valores a asignar en la variable de $registro, sera verdadero.
		while($registro = $result->fetch_assoc()) {
			$array[] = self::crearObjeto($registro);
		}

		// Liberar la memoria
		$result->free();

		// Retornar los resultados
		return $array;
	}

	protected static function crearObjeto($registro) {
		$objeto = new self;

		foreach($registro as $key => $value) {

			if(property_exists($objeto,$key)) {
				$objeto->$key = $value;
			}
		}

		return $objeto;

	}

	// Sincroniza objeto en memoria con los cambios realizados
	public function sincronizar($post) {
		foreach($post as $key => $value ) {
			if(property_exists($this,$key)) {
				$this->$key = $value;
			}
		}
	}

}