<?php 
  require 'includes/funciones.php';

  incluirTemplate('header'); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu Nombre">

                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Tu E-mail">

                <label for="telefono">Teléfono</label>
                <input id="telefono" type="tel" placeholder="Tu Telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>
                
                <label for="opciones">Vende o Compra:</label>
                <select name="" id="opciones">
                    <option value="" disabled selected >-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input id="presupuesto" type="number" placeholder="Tu Precio o Presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" id="contactar-telefono" type="radio" value="telefono">
                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" id="contactar-email" type="radio" value="email">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>

                <label for="fecha">Fecha:</label>
                <input id="fecha" type="date">

                <label for="hora">Hora:</label>
                <input id="hora" type="time" placeholder="Tu Precio o Presupuesto" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

        <?php incluirTemplate('footer')?>