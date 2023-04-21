<?php

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'vendedoresId'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedoresId;


    public function __construct($args = [])  {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedoresId = $args['vendedoresId'] ?? '';
    }

    public function validar() {

        if(!$this->titulo) {
            self::$errores[] = "Debes agregar un titulo";
        }
        if(!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }
        if( strlen($this->descripcion) < 50 ) {
            self::$errores[] = "La descripción es obligatoria y debe contener minimo 50 caracteres";
        }
        if(!$this->habitaciones) {
            self::$errores[] = "La cantidad de habitaciones es obligatorio";
        }
        if(!$this->wc) {
            self::$errores[] = "La cantidad de baños es obligatorio";
        }
        if(!$this->estacionamiento) {
            self::$errores[] = "La cantidad de estacionamientos es obligatorio";
        }
        if(!$this->vendedoresId)  {
            self::$errores[] = "Debes seleccionar un vendedor";
        }
        
        if(!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }
        
        return self::$errores;
        }
}