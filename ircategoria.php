<?php session_start(); ?>
<?php require 'include/helpers.php'; ?>
<?php require_once 'include/conexion.php';?>
<?php $_SESSION['salircategoria'] = false; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?vs2411">
    <title>Blog</title>
</head>
<body>
    <!--encabezado-->
    <?php
        require 'include/encabezado.php';
    ?>
    <!--contenido principal-->
    
    <?php
        require 'include/ir_categoria.php';
    ?>

    <!--aside-->
    <?php
        require 'include/aside.php';
    ?>

    <!--footer-->
    <?php
        require 'include/footer.php';
    ?>

    <script src="https://kit.fontawesome.com/f5ee6680c0.js" crossorigin="anonymous"></script>
</body>
</html>