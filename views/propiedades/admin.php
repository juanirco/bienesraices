<main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php
            if ($resultado) {

                $mensaje = mostrarNotificacion( intval($resultado));
                if($mensaje) {?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
                <?php }
            } ?>
        
    <pre> </pre>
                    
    <h2>Propiedades</h2>
    <a href="/propiedades/crear" class="boton-verde-block contener-boton">Nueva Propiedad</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody> <!--Mostrar los resultados -->
       
                <?php foreach( $propiedades as $propiedad ): ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?> </td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$<?php echo number_format($propiedad->precio, 2); ?></td>
                    <td>
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>

                        <form method="POST" action="propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
     </table>
     <br>
     <hr></hr>
     <h2>Vendedores</h2>

    <a href="/vendedores/crear" class="boton-verde-block contener-boton">Nuevo Vendedor</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido(s)</th>
                <th>Telefono</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody> <!--Mostrar los resultados -->
      
                <?php foreach( $vendedores as $vendedor ): ?>
                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td><?php echo $vendedor->nombre; ?></td>
                    <td><?php echo $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>

                        <form method="POST" action="vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>