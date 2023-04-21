<?php

namespace Model;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];


    public $id;
    public $nombre;
    public $apellido;
    public $telefono;


    public function __construct($args = [])  {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar() {

        if(!$this->nombre) {
            self::$errores[] = "Debes agregar un nombre";
        }
        if(!$this->apellido) {
            self::$errores[] = "Debes agregar un apellido";
        }
        if(!$this->telefono) {
            self::$errores[] = "El número telefónico es obligatorio";
        }

        if(!preg_match('/[0-9]{8,11}/', $this->telefono) or strlen($this->telefono) > 12) {
            self::$errores[] = "Formato no válido, debe contener entre 8 y 11 digitos y no se permite ningun caracter ni letra";
        }
        
        return self::$errores;
        }
}