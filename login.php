<?php
    session_start();
    $error= '';
    require_once 'include/conexion.php';
    /* recoger datos post*/
    $email= $_POST['email'];
    $password= $_POST['password'];

    /*email de usuario comparar con base de datos */
    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email = '$email'");
    $resultado = mysqli_num_rows($consulta);
    if (isset($user)) {
        $user= null;
    }
    
    if (isset($_POST['entrada'])) {
        if (!empty($email) && empty(!$password)) {
            /*si el correo y el passwor no esta vacio */
            
            if ($resultado == 1) {
                /*si solo me muestra una fila en la base de datos */
                $login_usuario = mysqli_fetch_assoc($consulta);
                var_dump($login_usuario);

                $usuario_password = $login_usuario['password'];
                $validacion_login = password_verify($password, $usuario_password);
                if ($validacion_login) {
                    /*si la validacion fue true */
                    $user['nombre']= $login_usuario['nombre'];
                    $user['apellido']= $login_usuario['apellidos'];
                    $user['email']= $login_usuario['email'];
                    $user['id']= $login_usuario['id'];
                    $error= true;
    
                }else {
                    $user='<p class="alerta alerta_error">'.'contraseña incorecta'.'<p>';
                    $error= false;
                }
            }else {
                $user='<p class="alerta alerta_error">'.'el email que introduciste no esta registrado'.'<p>';
                $error= false;
            }
            
            
        }else {
            $user='<p class="alerta alerta_error">'.'rellena todos los campos requeridos'.'<p>';
            $error= false;
        }

        if ($error == true) {
            $_SESSION['home_usuario']= $user;
        }else {
            $_SESSION['alerta_usuario']= $user;
        }
    }
    header ('location:index.php');

?>