<?php if (!isset($_SESSION)) {
    session_start();
}?>
<?php $busqueda= $_POST['busqueda'] ?>
<?php $buscar = busqueda($conexion, $busqueda); ?>

<main class="main">
    <section class="main_section">

        <h1 class="main_section-h1"><?php echo 'Estas buscando '.$busqueda.'...'; ?></h1>
        <?php
        if ($buscar && isset($buscar) && !empty($buscar) && mysqli_num_rows($buscar) >= 1) {
            while ($viewentrada = mysqli_fetch_assoc($buscar)) {
        ?>

                <article class="main_section-article">
                    <p class="main_article-p">
                    <h2 class="main_article-p-h2"><i class="far fa-file main_article-p-i"></i><a href="entrarentrada.php?id=<?=$viewentrada['id']?>" class="main_article-p-a"><?php echo $viewentrada['titulo']; ?></a></h2>
                    <?php echo substr($viewentrada['descripcion'], 0, 300).' ...'; ?>
                    <span class="main_article-p-span"><?php echo $viewentrada['fecha']; ?></span>
                    </p>
                </article>

        <?php
            }            
        }else {
        ?>
            <div class="alerta_ircategoria">
                <p class="alerta">no hay entradas en esta busqueda</p>
            </div>

        <?php } ?>
        <div class="main_section-boton">
            <a href="index.php" class="main_section-boton-a">Inicio</a>
        </div>
    </section>
</main>