<fieldset>
  <legend>Información General</legend>

  <label for="titulo">Titulo:</label>
  <input
    type="text"
    id="titulo"
    name="titulo"
    placeholder="Titulo propiedad"
    value="<?php echo sani($propiedad->titulo); ?>">

  <label for="precio">Precio:</label>
  <input
    type="number"
    id="precio"
    name="precio"
    placeholder="Titulo propiedad"
    value="<?php echo sani($propiedad->precio); ?>">

  <label for="imagen">Imagen:</label>
  <input
    type="file"
    id="imagen"
    name="imagen"
    accept="image/jpeg, image/png">

  <?php if (isset($propiedad->imagen) && $propiedad->imagen != '' && $propiedad->id) { ?>
    <img
      src="../../imagenes/<?php echo $propiedad->imagen; ?>"
      alt="imagenCasa"
      class="imagen-small">
  <?php } ?>

  <label for="descripcion">Descripción:</label>
  <textarea
    name="descripcion"
    id="descripcion"><?php echo sani($propiedad->descripcion); ?></textarea>

</fieldset>

<fieldset>
  <legend>Información de la Propiedad</legend>

  <label for="habitaciones">Habitaciones:</label>
  <input
    type="number"
    id="habitaciones"
    name="habitaciones"
    placeholder="Ej: 3"
    min="1" max="9"
    value="<?php echo sani($propiedad->habitaciones); ?>">

  <label for="wc">Baños:</label>
  <input
    type="number"
    id="wc"
    name="wc"
    placeholder="Ej: 3"
    min="1" max="9"
    value="<?php echo sani($propiedad->wc); ?>">

  <label for="estacionamiento">Estacionamientos:</label>
  <input
    type="number"
    id="estacionamiento"
    name="estacionamiento"
    placeholder="Ej: 2"
    min="1" max="9"
    value="<?php echo sani($propiedad->estacionamiento); ?>">

</fieldset>

<fieldset>
  <legend>Vendedor</legend>

  <select name="vendedores_id">
    <option value="">--Seleccione--</option>

    <?php foreach ($vendedores as $vendedor) {  ?>

      <option
        <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '' ?>
        value="<?php echo sani($vendedor->id); ?>"><?php echo sani($vendedor->nombre) . " " . sani($vendedor->apellido); ?></option>

    <?php } ?>
  </select>

</fieldset>