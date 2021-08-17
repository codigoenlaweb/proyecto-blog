
<aside class="aside">
    
    <?php if(isset($_SESSION['home_usuario'])) : ?>
        <div class="aside_entrar">
            <h3 class="entrar_h3">Buscador</h3>
            <div class="entrar_contenedor">
                <form action="buscador.php" method="post" class="entrar_contenedor-form">
                    <input type="text" name="busqueda" class="buscador">
                    <input type="submit" value="buscar">
                </form>
            </div>
        </div>

        <div class="aside_usuario">
            <div class='aside_usuario-contenedor'>
                <h3 class="usuario_h3">Bienvenido</h3>
                <h2 class="usuario_h2" title="Hola <?= $_SESSION['home_usuario']['nombre']?>"><?= $_SESSION['home_usuario']['nombre'].' '.$_SESSION['home_usuario']['apellido'] ?></h2>
                <a href="index.php" class="usuario_boton">Inicio</a>
                <a href="entrada.php" class="usuario_boton">Crear entradas</a>
                <a href="categoria.php" class="usuario_boton">Crear categorias</a>
                <a href="misdatos.php" class="usuario_boton">Mis datos</a>
                <a href="login_exit.php" class="usuario_boton">cerrar sesion</a>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if(!isset($_SESSION['home_usuario'])) : ?>
        <div class="aside_entrar">
            <h3 class="entrar_h3">Buscador</h3>
            <div class="entrar_contenedor">
                <form action="buscador.php" method="post" class="entrar_contenedor-form">
                    <input type="text" name="busqueda" class="buscador">
                    <input type="submit" value="buscar">
                </form>
            </div>
        </div>
        
        <div class="aside_entrar">
            <h3 class="entrar_h3">Identificate</h3>
            <div class="entrar_contenedor">
                <?php
                    if (isset($_SESSION['alerta_usuario'])) {
                        echo $_SESSION['alerta_usuario'];
                    }
                ?>
                
                <form action="login.php" method="post" class="entrar_contenedor-form">
                    <label for="email" class="entrar_contenedor-form-l">Email</label>
                    <input type="email" name="email">

                    <label for="password" class="entrar_contenedor-form-l">contraseña</label>
                    <input type="password" name="password">

                    <input type="submit" value="Entrar" name="entrada">
                </form>
            </div>
        </div>
      
        <div class="aside_registrarse">
            <h3 class="registrarse_h3">Registrate</h3>
            <div class="registrarse_contenedor">
                <?php 
                    if (isset($_SESSION['completado'])) {
                        echo $_SESSION['completado'];
                    }
                ?>
                <form action="registro.php" method="post" class="registrarse_contenedor-form">
                    <label for="nombre" class="registrarse_contenedor-form-l">Nombre</label>
                    <input type="text" name="nombre" id="">
                    <?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'nombre') : ''; ?>

                    <label for="apellido" class="registrarse_contenedor-form-l">apellido</label>
                    <input type="text" name="apellido" id="">
                    <?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'apellido') : ''; ?>

                    <label for="email-r" class="registrarse_contenedor-form-l">Email</label>
                    <input type="email" name="email-r">
                    <?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'email') : ''; ?>

                    <label for="password-r" class="registrarse_contenedor-form-l">contraseña</label>
                    <input type="password" name="password-r">
                    <?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'password') : ''; ?>

                    <input type="submit" name="registrarse" value="registrarse">
                </form>
                <?php borrarErrores() ?>
            </div>
        </div>
    <?php endif; ?>
</aside>