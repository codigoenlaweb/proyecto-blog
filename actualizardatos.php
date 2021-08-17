<?php
    require 'include/conexion.php';
    require 'include/helpers.php';
    session_start();
    if (isset($_POST)) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email-r'];
        $idusuario= $_SESSION['home_usuario']['id'];
        $validacion_usuario = true;
        /* validacion de nombre*/
        if (empty($nombre) ) {
            $validacion_usuario = false;
            $errores['nombre'] = 'El nombre no puede ir vacio';

        }elseif (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
            $validacion_usuario = false;
            $errores['nombre'] = 'El nombre no puede contener numeros';
        }

        /* validacion de apellido*/
        if (empty($apellido) ) {
            $validacion_usuario = false;
            $errores['apellido'] = 'El apellido no puede ir vacio';

        }elseif (!preg_match("/^[a-zA-Z ]*$/",$apellido)) {
            $validacion_usuario = false;
            $errores['apellido'] = 'El apellido no puede contener numeros';

        }

        /*validacion de email*/
        if (empty($email) ) {
            $validacion_usuario = false;
            $errores['email'] = 'El email no puede ir vacio';

        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validacion_usuario = false;
            $errores['email'] = 'El email no cumple con el formato';
        }
    }
    if ($validacion_usuario == true) {
        $sql= "UPDATE usuarios SET `nombre`='$nombre',`apellidos`='$apellido',`email`='$email',`fecha`=CURDATE() WHERE id= $idusuario";
        $actualizardatos= mysqli_query($conexion, $sql);
        if ($actualizardatos) {
            $_SESSION['completado']= '<p class="alerta alerta_completado">'.'Has actualizado correctamente'.'</p>';
            $user['nombre']= $nombre;
            $user['apellido']= $apellido;
            $user['email']= $email;
            $user['id']= $_SESSION['home_usuario']['id'];
            $_SESSION['home_usuario']= $user;
        }else {
            $_SESSION['completado']= '<p class="alerta alerta_error">'.'El email es usado por otra cuentra'.'</p>';
        }

    }else {
        header('location:misdatos.php');
        $_SESSION['errores'] = $errores;
    }
    header('location:misdatos.php');

?>