   <?php

   echo' <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <p class="lead">Categorías</p>
                <div class="list-group">
                    <a href="index.php?action=categoria&cate=Ordenadores" class="list-group-item">Ordenadores</a>
                    <a href="index.php?action=categoria&cate=Complementos" class="list-group-item">Complementos</a>
                    <a href="index.php?action=categoria&cate=Otros" class="list-group-item">Otros</a>
                </div>
            </div>


            <div class="col-md-8">

                <div class="row carousel-holder">

                    <div class="col-md-2"></div>

                    <div class="col-md-10">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">';

                            $sentencia = $mi_bd -> prepare('Select * from producto where Categoria="'. $_GET['cate'] .'"');
                            $sentencia->execute();

                            $resultado = $sentencia->fetchAll(PDO::FETCH_COLUMN, 6);
                            echo'

                                <div class="item active redondo">
                                    <img class="slide-image redondo" src="'. $resultado[0].'" alt="">
                                </div> 

                                ';

                            if(count($resultado)>0){
                                foreach ($resultado as $valor) {
                                if($valor!=$resultado[0]){
                                    echo'

                                    <div class="item redondo">
                                        <img class="slide-image redondo" src="'. $valor.'" alt="">
                                    </div> 

                                    ';
                                }
                                
                            }
                            }


                            echo'
                            </div>
                            <a class="left carousel-control redondo" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control redondo" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>


                </div>

                <div id="barra-productos" class="row">';
                    

                    $sentencia = $mi_bd -> prepare('Select * from producto where Categoria="'. $_GET['cate'] .'"');
                    $sentencia->execute();

                    while ($row = $sentencia -> fetch ()) {

                     
                   echo ' <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="'. $row['Imagen'].'" alt="">
                            <div class="caption">
                                <h4 class="pull-right">'.$row['precio'].'</h4>
                                <h4><a href="index.php?action=producto&id=' . $row['id_codigo'] .'"> ' . $row['producto'] . '</a>
                                </h4>
                                <p>'. $row['descripcion'] . '</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>';

                    }


                    /*<div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                    </div>*/

               echo ' </div>

            </div>

            <div class="col-md-3"></div>

        </div>

    </div>
    <!-- /.container -->';

    ?>