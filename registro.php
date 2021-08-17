<?php
    require 'include/conexion.php';
    require 'include/helpers.php';
    session_start();
    if (isset($_POST)) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email-r'];
        $password = $_POST['password-r'];
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

        /*validacion de password*/
        if (empty($password) ) {
            $validacion_usuario = false;
            $errores['password'] = 'La contrasena no puede ir vacia';

        }elseif (strlen($password) > 16){
            $validacion_usuario = false;
            $errores['password'] = 'La contrasena no puede contener mas de 16 carracteres';

        }elseif (!preg_match('`[a-z]`',$password)){
            $validacion_usuario = false;
            $errores['password'] = 'La contrasena debe contener letras minusculas';

        }if (!preg_match('`[0-9]`',$password)){
            $validacion_usuario = false;
            $errores['password'] = 'La contrasena debe conteenr al menos un numero';
        }
    }

    if ($validacion_usuario == true) {
        $passwordsegura= password_hash($password, PASSWORD_BCRYPT, ['cost'=>5]);
        $guardar = insertar($conexion, $nombre, $apellido, $email, $passwordsegura);
        if ($guardar) {
            $_SESSION['completado']= '<p class="alerta alerta_completado">'.'te has registrado exitosamente'.'</p>';
        }else {
            $_SESSION['completado']= '<p class="alerta alerta_error">'.'error al registrarte'.'</p>';
        }

    }else {
        header('location:index.php');
        $_SESSION['errores'] = $errores;
    }
    header('location:index.php');
    



?>