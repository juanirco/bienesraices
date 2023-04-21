<main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php if($mensaje) { ?>
      <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>
    <br>
    <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp">
    <source srcset="build/img/destacada3.jpg" type="image/jpeg">
    <img loading="lazy" src="build/img/destacada3.webp" alt="Imagen Contacto">
</picture>

<h2>Llena Nuestro Formulario de Contacto</h2>

<form class="formulario" action="/contacto" method="POST">
    <div class="contenedor">
    <fieldset>
        <legend>Informacion Personal</legend>

        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="contacto[mensaje]"></textarea>
    </fieldset>
    
    <fieldset>
        <legend>Objetivo de Interés</legend>

        <label for="opciones">Venta o Compra</label>
        <select id="opciones" name="contacto[opciones]" required>
            <option value="" disabled selected>-- Seleccione --</option>
            <option value="Compra">Compra</option>
            <option value="Venta">Venta</option>
        </select> 
        <div id="ventaOCompra"></div>

    </fieldset>
    <fieldset>
        <legend>Opciones de contacto</legend>

        <p>Como desea ser contactado</p>
        <div class="forma-contacto">
            <label for="contactar-telefono">Teléfono</label>
            <input type="radio" value="Telefono" id="contactar-telefono" name="contacto[contactar]" required>

            <label for="contactar-email">Email</label>
            <input type="radio" value="Email" id="contactar-email" name="contacto[contactar]" required>
        </div>

        <div id="contacto"></div>

    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde contener-boton">
</div>
</form>
</main>

