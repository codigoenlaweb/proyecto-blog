<?php $id= $_GET['id'];?>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['home_usuario'])) {
        header('location: index.php');
    }
    require_once 'include/helpers.php';
    require_once 'include/conexion.php';
    $identrada= $_GET['id'];
    $idusuario= $_SESSION['home_usuario']['id'];
    $sql="SELECT * FROM entradas WHERE id= '$identrada'";
    $consulta= mysqli_query($conexion, $sql);
    $resultado= mysqli_fetch_assoc($consulta);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Editar entrada</title>
    </head>

    <body>
        <?php
        include 'include/encabezado.php';
        include 'include/aside.php';
        ?>
        <main class="main">
            <section class="main_section">
                <h1 class="main_section-h1">Editar Entrada</h1>
                <article class="main_section-article main_section-article-c">
                    <p class="main_article-p">
                    <form action="crear_entrada.php?editar=<?=$identrada?>" method="post" class="categoria_article-form">
                        <h2 class="main_article-p-h2 main_article-p-h2-c"><label for="entrada_categoria">vamos a mejorar este blog!</label></h2>
                    <br><select name="categoria-entrada" class="select_entrada" >
                            <?php 
                                $categorias = conseguircategorias( $conexion);
                                if (!empty($categorias)) :
                                    while($categoria = mysqli_fetch_assoc($categorias)):
                            ?>
                                    <option value="<?=$categoria['id']?>">
                                        <?=$categoria['nombre']?>
                                    </option>
                            <?php
                                    endwhile;
                                endif;
                            ?>
                        </select>
                        <br><input type="text" name="titulo-entrada" placeholder=" titulo" value="<?php echo $resultado['titulo']; ?>" class="categoria_article-form-text">
                        <?php if (isset($_SESSION['alarma_entrada']) && !empty($_SESSION['alarma_entrada']['titulo'])) :?>
                        <br><p class="alerta"><?php echo $_SESSION['alarma_entrada']['titulo']; ?></p>
                        <?php endif?>
                        <br><textarea name="descripcion-entrada" placeholder=" descripcion" class="categoria_article-form-text textarea"></textarea>
                        <?php if (isset($_SESSION['alarma_entrada']) && !empty($_SESSION['alarma_entrada']['descripcion'])) :?>
                        <br><p class="alerta"><?php echo $_SESSION['alarma_entrada']['descripcion']; ?></p>
                        <?php endif?>
                        <br><input type="submit" value="Editar" name="categoria" class="categoria_article-form-boton">

                        
                    </form>
                    <P>
                        Animate y actualiza tu blog o cambia algo que no te haya gustado. No te olvides de seleccionar la categoria
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