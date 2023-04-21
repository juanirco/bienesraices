<?php

if(!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if(!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio': '';?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="izquierda">
                    <a href="/">
                        <img src="../build/img/logo.svg" alt="Logotipo de Bienes Raices">
                    </a>
                </div>
                <div class="centro">
                    <div class="mobile-menu">
                        <img src="../build/img/barras.svg" alt="Icono menu responsive">
                    </div>
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                        <a href="admin">Admin</a> <!-- Mostrar link de admin -->
                    <?php endif?>
                    </nav>
                </div>
                <div class="derecha">
                <img class="dark-mode-boton uno" src="../build/img/dark-mode.svg" alt="boton dark mode">
                    <?php if(!$auth): ?>
                        <a href="login"><img class="sesionBtn dos" src="../build/img/unlocked.svg"></a> <!-- Abrir sesion -->
                    <?php endif?>
                    <?php if($auth): ?>
                        <a href="logout"><img class="sesionBtn dos" src="../build/img/lock.svg"></a>  <!-- Cerrar sesion -->
                    <?php endif?>
                </div>
            </div>  <!-- div barra-->
            <?php echo ($inicio) ? '<h1> Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : '';?>
        </div>  <!-- div contenido-header-->
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenido-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contactos</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados <?php echo date('Y')?> &copy;</p>
    </footer>

        <script src="../build/js/bundle.min.js"></script>
    </body>
</html>  