<?php

    echo '
    <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="tagline">Find your treasure - Mi Cuenta</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr>

        <div class="row">
            <div class="col-md-6">
                <h2>Lista de Compras Realizadas</h2>
                <table class="table">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Precio </th> 
                    <th>Fecha </th>
                  </tr>
                </thead>
                <tbody>';
                $email = "'" .$_SESSION['email_login']."'";

                $sentencia = $mi_bd -> prepare('SELECT * from compras where email='. $email);
                $sentencia->execute();
                

                while ($row = $sentencia -> fetch ()) {
                    $id_codigo = $row['id_codigo'];
                    $sentencia2 = $mi_bd -> prepare('SELECT * from producto where id_codigo='. $id_codigo);
                    $sentencia2->execute();

                    echo '<tr class="success">';
                    while($nombre = $sentencia2 -> fetch ()){
                      echo '<td><h3 >'. $nombre['producto'] .'</h3></td>';  
                    }
                    echo '
                    <td><h3>'. $row['precio'].'</h3></td>
                     <td><h3>'. $row['fecha'].'</h3></td>
                  </tr>';

                }

                echo'</tbody></table>
            </div>
            <div class="col-md-6">
                <h2>Lista de Objetos Publicados</h2>
                <table class="table">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>';

                $email = "'" .$_SESSION['email_login']."'";

                $sentencia = $mi_bd -> prepare('SELECT * from producto where autor='. $email);
                $sentencia->execute();


                while ($row = $sentencia -> fetch ()) {


                    echo '<tr class="success">
                    <td><h3 >'. $row['producto'] .'</h3></td>
                    <td>


                    <a class="btn btn-primary opciones" href="index.php?action=eliminar&id=' . $row['id_codigo'] .'"> Eliminar </a>


                    <a href="index.php?action=producto&id=' . $row['id_codigo'] .'" class="btn btn-primary opciones" style="margin-left:5px;"> Más Información </a>


                    <a href="index.php?action=editar&id=' . $row['id_codigo'] .'&precio='.$row['precio'].'&modelo='.$row['modelo'].'&descripcion='.$row['descripcion'].'&nombre='.$row['producto'].'&categoria='.$row['Categoria'].'&imagen='.$row['Imagen'].'" class="btn btn-primary opciones" style="margin-left:5px;" > Editar </a>

                    </td>';
                  

                }
                

         echo '   </tbody>
              </table> 
              </div>
        </div>
        <!-- /.row -->

       
        <!-- /.row -->

        ';

?>