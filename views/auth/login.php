<main class="contenedor seccion loginFormat">
<?php  if(!empty ($errores)) {?>
    <?php foreach ($errores as $error): ?> 
            <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach;
    }?>

    <h1>Iniciar Sesión</h1>

    <form method="POST" class="formulario reducir" novalidate action="/login">
    <fieldset>
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Tu email" id="email" required>

        <label for="password">Password</label>
        <div class="forma-contacto">
        <input type="password" name="password" placeholder="Tu password" id="password" required>
        <img src="../build/img/ojo.svg" alt="ojo" class="imgPass">
        </div>
        <input type="submit" value="Iniciar Sesión" class="boton-gris-block">
    </fieldset>
    </form>
</main>