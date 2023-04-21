<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PaginasController  {
    public static function home(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/home', [
            'propiedades' => $propiedades,
            'inicio' =>  $inicio
        ]);
    }
    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }
    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router) {
        $id  = validarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router) {
        $router->render('paginas/blog', []);
    }
    public static function entrada(Router $router) {
        $router->render('paginas/entrada', []);
    }
    public static function contacto(Router $router) {
        $mensaje = null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '0cb8990dbd1b06';                     //SMTP username
                $mail->Password   = '7556ea5cc3431c';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('admin@bienesraices.com', 'Mailer BR');
                $mail->addAddress('admin@bienesraices.com', 'Bienes Raices');     //Add a recipient
                $mail->Subject = 'Nuevo mensaje';

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->CharSet = 'UTF-8';

                $contenido = '<html>';
                $contenido .= '<p>Tienes un nuevo mensaje</p>';
                $contenido .= '<p>Nombre: ' . $respuestas['nombre'] .  '</p>';

                if($respuestas['contactar'] === 'Telefono') {
                    $contenido .= '<p>Eligió ser contactado por: ' . $respuestas['contactar'] . '</p>';
                    $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] .  '</p>';
                    $contenido .= '<p>Fecha de contacto: ' . $respuestas['fecha'] .  '</p>';
                    $contenido .= '<p>Hora de contacto: ' . $respuestas['hora'] .  '</p>';
                } else {
                    // Es email
                    $contenido .= '<p>Eligió ser contactado por: ' . $respuestas['contactar'] . '</p>';
                    $contenido .= '<p>Email: ' . $respuestas['email'] .  '</p>';
                }

                $contenido .= '<hr></hr>';
                if($respuestas['opciones'] === 'Compra') {
                $contenido .= '<p>Eligió la opción de: ' . $respuestas['opciones'] .  '</p>';
                $contenido .= '<p>Presupuesto: $' . number_format($respuestas['presupuesto'], 2) .  '</p>';
                } else {
                    $contenido .= '<p>Eligió la opción de ' . $respuestas['opciones'] .  '</p>';
                    $contenido .= '<p>Precio: $' . number_format($respuestas['precio'], 2) .  '</p>';
                }
                $contenido .= '<hr></hr>';
                $contenido .= '<p> ' . $respuestas['mensaje'] .  '</p>';
                $contenido .= '<hr></hr>';
                $contenido .= '</html>';
                
                $mail->Body    = $contenido;
                $mail->AltBody = 'Este es un texto alternativo para los clientes non-HTML';

                $mail->send();
                $mensaje = 'Mensaje enviado correctamente';
            } catch (Exception $e) {
                $mensaje = "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}