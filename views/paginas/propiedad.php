<main class="contenedor seccion contenido-centrado">
    <a href="/propiedades" class="boton boton-amarillo">Volver</a>
        <h1><?php echo $propiedad->titulo?></h1>

        <picture>
            <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen?>" alt="anuncio.jpg" alt="Imagen de la propiedad">
        </picture>
        <div class="resumen-propiedad anuncio no-fondo">
            <p class="precio">$<?php echo number_format($propiedad->precio,2)?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones?></p>
                </li>
            </ul>

            <p><?php echo $propiedad->descripcion?>
            </p>
         
        </div>
    </main>