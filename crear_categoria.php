<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once 'include/helpers.php';
    require_once 'include/conexion.php';
    $ok= true;

    if (isset($_POST)) {

        if (empty($_POST['entrada_categoria'])) {
            $alarma_registro= 'tienes que rellenar el nombre de la categoria';
            $ok= false;
        }elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST['entrada_categoria'])) {
            $alarma_registro= 'La categoria no puede contener numeros';
            $ok= false;
        }

    }

    if ($ok == true) {

        $crearcategoria= $_POST['entrada_categoria'];
        $sql= "INSERT INTO categorias VALUES ('NULL', '$crearcategoria')";
        $insertarcategoria= mysqli_query($conexion, $sql);
        header('location:index.php');
    }else {
        $_SESSION['alarma_registro']= $alarma_registro;
        header('location:categoria.php');
    }
?>
