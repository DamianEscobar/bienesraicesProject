<?php

namespace App;

class Propiedad extends ActiveRecord {
	// Nombre de la tabla
	protected static $tabla = 'propiedades';
	// Un arreglo que nos sirve para mapear los datos, debe ser tal como en la DB
	protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];

	// Atributos
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

		
}