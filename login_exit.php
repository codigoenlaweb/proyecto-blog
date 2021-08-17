<?php
    session_start();
    if (isset($_SESSION['home_usuario'])) {
        session_destroy();
    }
    header('location:index.php');
?>