<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Nombre:</label>
    <input 
        type="text" 
        id="nombre" 
        name="nombre" 
        placeholder="Nombre Vendedor"
        value="<?php echo sani($vendedor->nombre); ?>"
    >

    <label for="titulo">Apellido:</label>
    <input 
        type="text" 
        id="apellido" 
        name="apellido" 
        placeholder="Apellido Vendedor"
        value="<?php echo sani($vendedor->apellido); ?>"
    >

    <label for="titulo">Telefono:</label>
    <input 
        type="number" 
        id="telefono" 
        name="telefono" 
        placeholder="Telefono Vendedor"
        value="<?php echo sani($vendedor->telefono); ?>"
    >
</fieldset>