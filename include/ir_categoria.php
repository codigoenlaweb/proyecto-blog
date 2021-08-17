<?php $id = (int)$_GET['id'] ?>
<?php $categorias = conseguircategoria($conexion, $id) ?>
<?php if ($categorias) {
    $categoria = mysqli_fetch_assoc($categorias);
} ?>

<main class="main">
    <section class="main_section">

        <h1 class="main_section-h1"><?php echo $categoria['nombre'] ?></h1>
        <?php
        $entrada = conseguirtodasentradasdecategoria($conexion, $id);
        if ($entrada && isset($entrada) && !empty($entrada) && mysqli_num_rows($entrada) >= 1) {
            while ($viewentrada = mysqli_fetch_assoc($entrada)) {
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
                <p class="alerta">no hay entradas en esta categoria</p>
            </div>

        <?php } ?>
        <div class="main_section-boton">
            <a href="index.php" class="main_section-boton-a">Inicio</a>
        </div>
    </section>
</main>