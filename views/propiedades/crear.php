<main class="contenedor seccion">
        <h1>Registrar Propiedad</h1>

        <a href="/admin" class="boton boton-amarillo">Volver</a>

        <?php  if(!empty ($errores)) {?>
        <?php foreach ($errores as $error): ?> 
                <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;
        }?>

        <form class="formulario" method="POST" action="/propiedades/crear" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde contener-boton">
        </form>
</main>