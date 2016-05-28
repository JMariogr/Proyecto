<?php
	$id=$_GET['id'];

	$sentencia = $mi_bd -> prepare('SELECT producto from producto where id_codigo='. $id);
	$sentencia->execute();

	 while ($row = $sentencia -> fetch ()) {
	 	escribir_en_fichero("eliminar",$_SESSION["email_login"],$row['producto']);
	 }

	$sentencia = $mi_bd -> prepare('DELETE from producto where id_codigo='. $id);

	$sentencia2 = $mi_bd -> prepare('DELETE from compras where id_codigo='. $id);

    if($sentencia2->execute()){
    	if($sentencia->execute())
    		include "./sources/micuenta.php";
    }
    

?>