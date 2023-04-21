<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic  as Image;

class PropiedadController {
    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        //Muestra msj condicional
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }
    
    public static function crear(Router $router) {
        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Propiedad::getErrores();
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crea una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);
        
            //Generar un nombre unico
                                                    /* Lo de abajo es para agregar la extensión */ 
            $nombreImagen =  md5(uniqid( rand(), true)) . strrchr($_FILES['propiedad']['name']['imagen'], '.');
        
            // Setear la imagen
           // Realiza un resize a la imagen con Intervention
           if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
           }
        
            //Validar
            $errores = $propiedad->validar();
            //Condicion para insertar
            if(empty ($errores)) {
                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
        
                //Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                    // Guarda en la base de datos
                    $propiedad->guardar();
            }
        } 

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores

        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');
        // Obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        //Consultar Vendedores
        $vendedores = Vendedor::all();

        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Propiedad::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asingar los atributos
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);
        
            //Validación
            $errores = $propiedad->validar();
        
            //Generar un nombre unico
                                                    /* Lo de abajo es para agregar la extensión */ 
            $nombreImagen =  md5(uniqid( rand(), true)) . strrchr($_FILES['propiedad']['name']['imagen'], '.');
        
            // Realiza un resize a la imagen con Intervention
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            if(empty($errores)) {
                    // Almacenar la imagen
                    if($_FILES['propiedad']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }

                    $propiedad->guardar();

                }
        } 

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
        
    }


    public static function eliminar(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tipo = $_POST['tipo'];
        
            // peticiones validas
            if(validarTipoContenido($tipo) ) {
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
                }
            }
    }
}