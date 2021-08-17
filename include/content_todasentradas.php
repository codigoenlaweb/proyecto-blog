<main class="main">
    <section class="main_section">
        <h1 class="main_section-h1">todas las entradas</h1>
        <?php 
            $entrada = conseguirtodasentradas($conexion);
            if ($entrada && isset($entrada) && !empty($entrada)) {
                while ($viewentrada= mysqli_fetch_assoc($entrada)) {
        ?>            

            <article class="main_section-article">
                <p class="main_article-p">
                    <h2 class="main_article-p-h2"><i class="far fa-file main_article-p-i"></i><a href="entrarentrada.php?id=<?=$viewentrada['id']?>" class="main_article-p-a"><?php echo $viewentrada['titulo'];?></a></h2>
                    <?php echo substr($viewentrada['descripcion'], 0, 300).' ...';?>
                    <span class="main_article-p-span"><?php echo $viewentrada['fecha'];?></span>
                </p>
            </article>

        <?php
                }
            }
        ?>
        <div class="main_section-boton">
            <a href="index.php" class="main_section-boton-a">Inicio</a>
        </div>
    </section>
</main>