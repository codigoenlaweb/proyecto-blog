<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once 'include/helpers.php';
    require_once 'include/conexion.php';
    $error= 'ok';

    $titulo= $_POST['titulo-entrada'];
    $descripcion= $_POST['descripcion-entrada'];
    $categoria= (int)$_POST['categoria-entrada'];
    $idusuario= $_SESSION['home_usuario']['id'];
    if (isset($_POST)) {

        if (empty($titulo)) {
            $alarma_entrada['titulo']= 'tienes que rellenar el titulo de la entrada';
            $error= 'error';
        }

        if (empty($descripcion)) {
            $alarma_entrada['descripcion']= 'tienes que rellenar la descripcion de la entrada';
            $error= 'error';
        }
    }

    if ($error == 'ok') {
        if (isset($_GET['editar'])) {
            $identrada= $_GET['editar'] ;
            $sql= "UPDATE `entradas` SET `categoria_id`='$categoria',`titulo`='$titulo',`descripcion`='$descripcion',`fecha`=CURDATE() WHERE id= '$identrada'";
            $editarentrada= mysqli_query($conexion, $sql);
        }else {
            $sql= "INSERT INTO entradas VALUES ('NULL','$idusuario','$categoria','$titulo','$descripcion', CURDATE())";
            $crearentrada= mysqli_query($conexion, $sql);
        }
        header('location:index.php');
        
    }else {
        $_SESSION['alarma_entrada']= $alarma_entrada;
        header('location:entrada.php');
    }




?>