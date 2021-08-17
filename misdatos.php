<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
if (!isset($_SESSION['home_usuario'])) {
    header('location: index.php');
}
require_once 'include/helpers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Mis datos</title>
</head>
<body>
    <?php
    include 'include/encabezado.php';
    include 'include/aside.php';
    ?>
    <main class="main">
        <section class="main_section main_section-misdatos">
            <article class="main_section-article main_section-article-misdatos">

                <p class="main_article-p">
                    <h2 class="main_article-p-h2 " id="form_h2-misdatos">Quieres actualizar tus datos?</h2>
                    <?php 
                    if (isset($_SESSION['completado'])) {
                        echo $_SESSION['completado'];
                    }
                    ?>
                    <form action="actualizardatos.php" method="post" class="form_misdatos">
                        <label for="nombre" class="label_form-misdatos">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $_SESSION['home_usuario']['nombre'];?>">
                        <p class="error-misdatos"><?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'nombre') : ''; ?></p>

                        <label for="apellido" class="label_form-misdatos">Apellido</label>
                        <input type="text" name="apellido" value="<?php echo $_SESSION['home_usuario']['apellido'];?>">
                        <p class="error-misdatos"><?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'apellido') : ''; ?></p>

                        <label for="email-r" class="label_form-misdatos">Email</label>
                        <input type="email" name="email-r" value="<?php echo $_SESSION['home_usuario']['email'];?>">
                        <p class="error-misdatos"><?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'email') : ''; ?></p>

                        <input type="submit" name="registrarse" value="actualizar">
                    </form>
                    Actualiza los datos si es necesario, si no quieres actualizar todos los datos esta bien, no es obligatorio.
                </p>
            </article>
        <section>
    </main>

    <?php
    include 'include/footer.php';
    borrarErrores();
    ?>
</body>

</html>