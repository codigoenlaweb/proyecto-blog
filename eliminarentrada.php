<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once 'include/helpers.php';
    require_once 'include/conexion.php';
    $identrada= $_GET['id'];
    $idusuario= $_SESSION['home_usuario']['id'];
    $sql="SELECT * FROM entradas WHERE id= '$identrada'";
    $consulta= mysqli_query($conexion, $sql);
    $resultado= mysqli_fetch_assoc($consulta);
    
    if ($resultado['usuario_id'] == $idusuario) {
        $sql= "DELETE FROM entradas WHERE id= '$identrada' ";
        $culta2= mysqli_query($conexion, $sql);
    }
    header('location:index.php');
?>