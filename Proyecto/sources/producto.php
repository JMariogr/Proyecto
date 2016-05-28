<?php

    $sentencia = $mi_bd -> prepare('Select * from producto where id_codigo=' . $_GET['id'] );
    $sentencia->execute();

    while ($row = $sentencia -> fetch ()) {
    echo'<!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <p class="lead">Categorías</p>
                <div class="list-group">
                    <a href="index.php?action=categoria&cate=Ordenadores" class="list-group-item">Ordenadores</a>
                    <a href="index.php?action=categoria&cate=Complementos" class="list-group-item">Complementos</a>
                    <a href=""index.php?action=categoria&cate=Otros" class="list-group-item">Otros</a>
                </div>
            </div>

            <div id="barra-productos2" class="col-md-6">

                <div class="thumbnail">
                    <img class="img-responsive" src="'. $row['Imagen'].'" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">'. $row['precio'] .'€</h4>
                        <h4><a href="#"> '. $row['producto'] . '</a>
                        </h4>
                        
                        <p>'.$row['descripcion'].'</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                        <a href="index.php?action=comprar&id=' . $row['id_codigo'] .'" class="btn btn-primary">Comprar!</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3"></div>

        </div>

    </div>
    <!-- /.container -->
    ';

}

?>