<?php

namespace App;

class Vendedor extends ActiveRecord{
    // Nombre de la tabla
    protected static $tabla = 'vendedores';
    // Arreglo para ayudar a mapear las columnas
    protected static $columnasDB = ['id','nombre','apellido','telefono'];

  public $id;
	public $nombre;
	public $apellido;
	public $telefono;


    public function __construct($args = [])
	{
		$this->id = $args['id'] ?? '';
		$this->nombre = $args['nombre'] ?? '';
		$this->apellido = $args['apellido'] ?? '';
		$this->telefono = $args['telefono'] ?? '';

	}


	public function validar() {
		
		if(!$this->nombre) {
		  self::$errores[] = "Debes añadir un nombre";
		}
		if(!$this->apellido) {
		  self::$errores[] = "Debes añadir un apellido";
		}
		if(!$this->telefono) {
			self::$errores[] = "Debes añadir un numero de telefono";
		}

		// Validar el telefono, con una expresion regular
		if(!preg_match('/[0-9]{10}/', $this->telefono)) {
			self::$errores[] = "El numero de telefono no es valido";
		}
	
		return self::$errores;
	}	


}