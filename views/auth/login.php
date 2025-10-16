

<div class="contenedor login">

 <div class="imagen"></div>

<div class="contenedor-sm-formulario">

     
x
    <form class="formulario" method="POST" action="/" novalidate> 

        <div class="encabezado">
            <img class="logo" src="build/img/logo.png" alt="logo negociamos" />
            <h1 class="nombre">Negociamos</h1>
        </div>

    
        <div class="campo">
            <i class="fa-solid fa-user"></i>
            <input
            class="icono-placeholder nombre"
            type="text"
            id="usuario"
            placeholder="Nombre de Usuario"
            name="usuario"/>
        </div> 

        <div class="campo">
            <i class="fa-solid fa-key"></i>
            <input
            type="password"
            id="clave"
            placeholder="contraseña"
            name="clave"
            />
        </div>

        <div class="recordar">
            <input name="recordar-usuario" type="radio" value="recordar-usuario" id="recordar-usuario">
            <label class="nombre-re">Recordar nombre de usuario</label>
        </div>
       
        
        <input type="submit" class="boton" value="Iniciar Sesión">

 </form>

 <?php  include_once __DIR__ . '/../templates/alertas.php' ?>


</div> 

</div>   