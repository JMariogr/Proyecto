<?php

class product {
    public $id_codigo;
    public $producto;
    public $descripcion;
    public $Imagen;
}

$sentencia = $mi_bd->prepare("SELECT id_codigo,producto,descripcion,Imagen FROM producto");
$sentencia->execute();

$resultado = $sentencia->fetchAll(PDO::FETCH_CLASS, "product");


echo  '<!-- Page Features -->
        <div id="cuadro-productos" class="row text-center">

          

        </div>
        <!-- /.row -->';

$count=0;

if(count($resultado)-1 <4){
    for ($i = count($resultado)-1; $i>=0; $i--) {
    $count++;
    echo '<div id="producto" class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="'.$resultado[$i]->Imagen.'">
                <div class="caption">
                    <h3>'.$resultado[$i]->producto.'</h3>
                    <p>'. $resultado[$i]->descripcion .'</p>
                    <p>
                        <a href="index.php?action=comprar&id=' . $resultado[$i]->id_codigo .'" class="btn btn-primary">Comprar!</a> <a href="index.php?action=producto&id=' . $resultado[$i]->id_codigo .'" class="btn btn-default">Más Informacion</a>
                    </p>
                </div>
            </div>
        </div> ';

    }

}
else{
    for ($i = count($resultado)-1; $count<4; $i--) {
    $count++;
    echo '<div id="producto" class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="'.$resultado[$i]->Imagen.'">
                <div class="caption">
                    <h3>'.$resultado[$i]->producto.'</h3>
                    <p>'. $resultado[$i]->descripcion .'</p>
                    <p>
                        <a href="index.php?action=comprar&id=' . $resultado[$i]->id_codigo .'" class="btn btn-primary">Comprar!</a> <a href="index.php?action=producto&id=' . $resultado[$i]->id_codigo .'" class="btn btn-default">Más Informacion</a>
                    </p>
                </div>
            </div>
        </div> ';

    }
}



?>


     
        