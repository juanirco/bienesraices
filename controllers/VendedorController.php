<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController  {
    public static function crear(Router $router) {
        //Instancia de la vendedor
        $vendedor = new vendedor;

        //Consultar Vendedores
        $vendedores = Vendedor::all();

        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Vendedor::getErrores();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crea una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);

            //Validar
            $errores = $vendedor->validar();
            //Condicion para insertar
            if(empty ($errores)) {
                $vendedor->guardar();
            }
        } 
        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');

        // Obtener los datos de la propiedad
        $vendedor = Vendedor::find($id);
        
        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Vendedor::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            //Asingar los atributos
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);
        
            //Validación
            $errores = $vendedor->validar();
        
            if(empty($errores)) {
                    $vendedor->guardar();
            }
        } 
        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id) {            
                $tipo = $_POST['tipo'];
                // peticiones validas
                if(validarTipoContenido($tipo) ) {
    
    
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                    }
                }
            }
    }
}