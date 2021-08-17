<?php require 'conexion.php'; ?>
<header class="header">

    <h2 class="header_h2">Blog developer</h2>
    <ul class="header_ul">

        <li class="header_ul-li"><a href="index.php" class="header_ul-li-a">Inicio</a></li>
        <?php $categorias = conseguircategorias( $conexion); ?>
        <?php while($categoria = mysqli_fetch_assoc($categorias)): ?>
            <li class="header_ul-li">
            <a href="ircategoria.php?id=<?=$categoria['id']?>" class="header_ul-li-a"><?=$categoria['nombre']?></a>
            </li>
        <?php endwhile; ?>
        <li class="header_ul-li"><a href="#" class="header_ul-li-a">Sobre Nosotros</a></li>
        <li class="header_ul-li"><a href="#" class="header_ul-li-a">Contacto</a></li>
    </ul>
</header>