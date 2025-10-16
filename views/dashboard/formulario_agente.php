<?php  include_once __DIR__ . '/header-dashboard.php'; ?>
                
        
    <div class="contenedor-sm">

         <?php include_once __DIR__ . '/../templates/alertas.php'?>

        <form class="formulario-agente" method="POST" action="formulario_agente"> 

            <div class="encabezado2">
            <p class="nombre2">Informacion Agente</p><hr/>
            </div>

              
            <div class="contenido-campo">

                <div class="campo2">
                    <label for="cedula">Cedula:</label>
                    <input
                    type="text"
                    id="cedula"
                    placeholder="Cedula"
                    name="cedula"
                    pattern="[0-9]{10}"
                    value="<?php echo s($agente -> cedula); ?>">
                </div> 


                <div class="campo2">
                    <label for="nombre">Nombre y Apellidos:</label>
                    <input
                    type="text"
                    id="nombre"
                    placeholder="Nombre y Apellidos"
                    name="nombre"
                    value="<?php echo s($agente -> nombre); ?>"/>
                </div> 

                <div class="campo2">
                    <label for="celular">Celular:</label>
                    <input
                    type="text"
                    id="celular"
                    placeholder="Celular"
                    name="celular"
                    pattern="[0-9]{10}"
                    value="<?php echo s($agente -> celular); ?>"/>
                </div> 

                 <div class="campo2">
                    <label for="email">Email:</label>
                    <input
                    type="email"
                    id="email"
                    placeholder="Email"
                    name="email"
                    value="<?php echo s($agente -> email); ?>"/>
                </div> 

                <div class="campo2">
                    <label for="nacimiento">Fecha Nacimiento:</label>
                    <input
                    type="date"
                    id="nacimiento"
                    name="nacimiento"
                    value="<?php echo s($agente -> nacimiento); ?>"/>
                </div> 

    
                <div class="campo2">
                    <label for="direccion">Direccion Residencia:</label>
                    <input
                    type="text"
                    id="direccion"
                    placeholder="Direccion"
                    name="direccion"
                    value="<?php echo s($agente -> direccion); ?>"/>
                </div> 

                <div class="campo2">
                    <label for="barrio">Barrio:</label>
                    <input
                    type="text"
                    id="barrio"
                    placeholder="Barrio"
                    name="barrio"
                    value="<?php echo s($agente -> barrio); ?>"/>
                </div> 

                <div class="campo2">
                    
                    <legend>Categoria del Empleado</legend>
                    <select name="id_categoria">
                        <option value="">--seleccione--</option> 
                        <option value="1" <?php echo isset($agente) && $agente->id_categoria == 1 ? 'selected' : ''; ?>>AGENTE INDEPENDIENTE</option>
                        <option value="2" <?php echo isset($agente) && $agente->id_categoria == 2 ? 'selected' : ''; ?>>AGENTE EJECUTIVO</option>
                        <option value="3" <?php echo isset($agente) && $agente->id_categoria == 3 ? 'selected' : ''; ?>>ELITE</option>
                        <option value="4" <?php echo isset($agente) && $agente->id_categoria == 4 ? 'selected' : ''; ?>>BROKER NEGOCIAMOS</option>
                        <option value="5" <?php echo isset($agente) && $agente->id_categoria == 5 ? 'selected' : ''; ?>>BROKER ASOCIADO</option>
                        <option value="6" <?php echo isset($agente) && $agente->id_categoria == 6 ? 'selected' : ''; ?>>BROKER EMBAJADOR</option>
                        <option value="7" <?php echo isset($agente) && $agente->id_categoria == 7 ? 'selected' : ''; ?>>EMBAJADOR GLOBAL</option>
                        <option value="8" <?php echo isset($agente) && $agente->id_categoria == 8 ? 'selected' : ''; ?>>ADMINISTRATIVO</option>

                    </select>
                </div> 

            </div>

            <div class="encabezado2">
            <p class="nombre2">Seguridad y Roles</p><hr/>
            </div>

            <div class="contenido-campo2">
                <div class="campo2">
                    <label for="usuario">Username:</label>
                    <input
                    type="text"
                    id="usuario"
                    placeholder="Nombre de Usuario"
                    name="usuario"
                    value="<?php echo s($agente -> usuario); ?>"/>
                </div> 

                <div class="campo2">
                    <label for="clave">Clave:</label>
                    <input
                    type="password"
                    id="clave"
                    placeholder="Asigne una Clave de Usuario"
                    name="clave"
                    value="<?php echo s($agente -> clave); ?>"/>
                </div>

                <div class="campo2">
                    <legend>Rol del Usuario</legend>
                    <select name="id_rol" >
                        <option value="">--seleccione--</option>
                        <option value="1" <?php echo isset($agente) && $agente->id_rol == 1 ? 'selected' : ''; ?>>ADMINISTRADOR</option>
                        <option value="2" <?php echo isset($agente) && $agente->id_rol == 2 ? 'selected' : ''; ?>>BROKER</option>
                        <option value="3" <?php echo isset($agente) && $agente->id_rol == 3 ? 'selected' : ''; ?>>AGENTE</option>
                        <option value="4" <?php echo isset($agente) && $agente->id_rol == 4 ? 'selected' : ''; ?>>FINANCIERO</option> 
                        <option value="4" <?php echo isset($agente) && $agente->id_rol == 5 ? 'selected' : ''; ?>>CARTERA</option> 
                    </select>
                </div>
            </div>
                
            <div class="botones">
                <div>
                 <a href="informacion_agente" id="anterior" class="boton3" >&laquo; Regresar</a>
                </div>
                <input type="submit" class="boton2" value="Crear">
            </div>
         </form>
        
    </div>   


<?php  include_once __DIR__ . '/footer-dashboard.php'; ?>