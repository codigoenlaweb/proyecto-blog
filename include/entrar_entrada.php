<?php $id = (int)$_GET['id'] ?>
<?php $encontrar_entrada = encontrarentradas($conexion, $id) ?>
<?php if ($encontrar_entrada) {
    $entradas = mysqli_fetch_assoc($encontrar_entrada);
} ?>

<main class="main">
    <section class="main_section">

        <h1 class="main_section-h1"><?php echo ' Realizado por '.$entradas['n'].' '.$entradas['a']  ?></h1>
        <article class="main_section-article">
            <p class="main_article-p">
            <h2 class="main_article-p-h2"><i class="far fa-file main_article-p-i"></i><a href="entrarentrada.php?id=<?=$entradas['id']?>" class="main_article-p-a"><?php echo $entradas['titulo']; ?></a></h2>
            <?php echo $entradas['descripcion']; ?>
            <span class="main_article-p-span"><?php echo $entradas['fecha'].' '.$entradas['nombre'] ; ?></span>
            </p>
        </article>

        <?php if (isset($_SESSION['home_usuario']) && $entradas['usuario_id'] == $_SESSION['home_usuario']['id'] ) :?>
            <div class="main_section-boton">
                <a href="editarentrada.php?id=<?=$entradas['id']?>" class="main_section-boton-a main_section-boton-a__modif">Editar</a>
                <a href="eliminarentrada.php?id=<?=$entradas['id']?>" class="main_section-boton-a">Eliminar</a>
            </div>
        <?php endif; ?>
           
        <div class="main_section-boton">
            <a href="index.php" class="main_section-boton-a">Inicio</a>
        </div>
    </section>
</main>