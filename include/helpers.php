<?php
    function MostrarErrores ($errores, $campo){
        $alerta = '';
        if (isset ($errores[$campo]) && !empty($campo)) {
            $alerta = '<div class="alerta">'.$errores[$campo].'</div>';
        }
        return $alerta;
    }


    function borrarErrores(){
        $_SESSION['errores'] = null;
        if (isset($_SESSION['completado'])) {
            $_SESSION['completado'] = null;
        }
        if (isset($_SESSION['alerta_usuario'])) {
            $_SESSION['alerta_usuario'] = null;
        }
        if (isset($_SESSION['alarma_registro'])) {
            $_SESSION['alarma_registro'] = null;
        }
        if (isset($_SESSION['alarma_entrada'])) {
            $_SESSION['alarma_entrada'] = null;
        }
    }

    function insertar($conexion, $nomb, $apell, $ema, $pass){
        $insertar= mysqli_query($conexion, "INSERT INTO usuarios VALUES(null, '$nomb', '$apell', '$ema', '$pass', CURDATE())");
        return $insertar;
    }

    function conseguircategorias($conexion){
        $sql = "SELECT * FROM categorias";
        $categorias = mysqli_query($conexion,  $sql);
        $result = array();

        if ($categorias && mysqli_num_rows($categorias) >= 1) {
            $result = $categorias;
        }

        return $result;
    }

    function conseguircategoria($conexion, $id){
        $sql = "SELECT * FROM categorias WHERE id = $id";
        $categorias = mysqli_query($conexion,  $sql);
        $result = array();

        if ($categorias && mysqli_num_rows($categorias) >= 1) {
            $result = $categorias;
        }

        return $result;
    }

    function conseguirentradas($conexion){
        $sql= "SELECT c.nombre, e.* FROM categorias c INNER JOIN entradas e ON e.categoria_id = c.id ORDER BY e.id DESC LIMIT 6";
        $entradas= mysqli_query($conexion, $sql);
        $result= array();
        if ($entradas) {
            $result = $entradas;
        }
        return $result;
    }

    function conseguirtodasentradas($conexion){
        $sql= "SELECT c.nombre, e.* FROM categorias c INNER JOIN entradas e ON e.categoria_id = c.id ORDER BY e.id DESC";
        $entradas= mysqli_query($conexion, $sql);
        $result= array();
        if ($entradas) {
            $result = $entradas;
        }
        return $result;
    }

    function conseguirtodasentradasdecategoria($conexion, $id){
        $sql= "SELECT c.nombre, e.* FROM categorias c INNER JOIN entradas e ON e.categoria_id = c.id WHERE e.categoria_id= '$id' ORDER BY e.id DESC";
        $entradas= mysqli_query($conexion, $sql);
        $result= array();
        if ($entradas) {
            $result = $entradas;
        }
        return $result;
    }

    function encontrarentradas($conexion, $id){
        $sql= "SELECT c.nombre, e.*, u.nombre AS 'n', u.apellidos AS 'a' FROM categorias c INNER JOIN entradas e ON e.categoria_id = c.id INNER JOIN usuarios u ON u.id = e.usuario_id WHERE e.id= '$id' ORDER BY e.id DESC ";
        $entradas= mysqli_query($conexion, $sql);
        $result= array();
        if ($entradas) {
            $result = $entradas;
        }
        return $result;
    }

    function busqueda($conexion, $busqueda){
        $sql= "SELECT e.*, c.nombre FROM entradas e INNER JOIN categorias c ON c.id = e.categoria_id WHERE titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' ORDER BY e.id DESC ";
        $busq= mysqli_query($conexion, $sql);
        $result= array();
        if ($busq) {
            $result = $busq;
        }
        return $result;
    }
?>

