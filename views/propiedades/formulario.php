<?php 

use Model\Propiedad;
?>

<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo s( $propiedad->titulo ); ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" novalidate min="0" value="<?php echo s( $propiedad->precio ); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png">
    <?php if($propiedad->imagen) { ?>
        <img src="/imagenes/<?php echo $propiedad->imagen?>" class= "imagen-pequeña"
    <?php }?>

    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s( $propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la Propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ejemplo: 3" min="1" max="99" value="<?php echo s( $propiedad->habitaciones ); ?>">

    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ejemplo: 2" min="1" max="99" value="<?php echo s( $propiedad->wc ); ?>">

    <label for="estacionamiento">Estacionamientos</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ejemplo: 1" min="1" max="99" value="<?php echo s( $propiedad->estacionamiento ); ?>">

</fieldset>
<fieldset>
    <legend>Vendedor</legend>
    <select name="propiedad[vendedoresId]"  id="vendedor">
        <option value="" selected="">--Selecciona un vendedor--</option>
        <?php foreach($vendedores as $vendedor) {?>
            <option <?php echo $propiedad->vendedoresId === $vendedor->id ? 'selected' :  '' ?> value="<?php echo  s( $vendedor->id ); ?>"> <?php echo s( $vendedor->nombre ) . ' ' . s( $vendedor->apellido );?> </option>
        <?php }?>
    </select> 

</fieldset>