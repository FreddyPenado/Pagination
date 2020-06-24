<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagination</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Articles</h1>
    <section class="articles">
        <ul>
            <?php foreach($articles as $article): ?>
            <li><?php echo $article['id'] . '. -' . $article['articulo'] ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="pagination">
        <ul>
            <!--establecer cuando el boton "Anterior" estara deshabilitado"-->
            <?php if($page == 1): ?>
                <li class="disable">&laquo;</li>
            <?php else: ?>
                <li><a href="?page=<?php echo $page -1 ?>">&laquo;</a></li>
            <?php  endif; ?>

            <!--establecer el ciclo para mostrar las paginas"-->
            <?php
            for ($i=1; $i <= $pagenum; $i++ ){
                if ($page == $i){
                    echo "<li class='active'><a href='?page=$i'>$i</a></li>";
                }else{
                    echo "<li><a href='?page=$i'>$i</a></li>";
                }
            }
            ?>
            <!--establecer cuando el boton "Siguiente" estara deshabilitado"-->
            <?php if($page == $pagenum): ?>
                <li class="disable">&raquo;</li>
            <?php else: ?>
                <li><a href="?page=<?php echo $page +1 ?>">&raquo;</a></li>
            <?php  endif; ?>
        </ul>
    </section>
</div>
</body>
</html>
