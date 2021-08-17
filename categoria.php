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
    <title>Categoria</title>
</head>

<body>
    <?php
    include 'include/encabezado.php';
    include 'include/aside.php';
    ?>
    <main class="main">
        <section class="main_section">
            <h1 class="main_section-h1">Crear Categorias</h1>
            <article class="main_section-article main_section-article-c">
                <p class="main_article-p">
                <form action="crear_categoria.php" method="post" class="categoria_article-form">
                    <h2 class="main_article-p-h2 main_article-p-h2-c"><label for="entrada_categoria">Introduce la categoria que quieras agregar</label></h2>
                    <br><input type="text" name="entrada_categoria" placeholder=" nombre de la categoria" class="categoria_article-form-text">
                    <br><input type="submit" value="Crear" name="categoria" class="categoria_article-form-boton">

                    <?php if (isset($_SESSION['alarma_registro'])) :?>
                       <br><p class="alerta"><?php echo $_SESSION['alarma_registro']; ?></p>
                    <?php endif?>

                </form>
                <P>
                    Animate y crea una categoria que se adapte al blog que quieras crear, basta con solo rellenar este formulario colocando el nombre que desees de tu categoria
                </P>
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