<?php 
// datos para la coneccion a mysql 

    $email = "'" . $_POST['email']. "'";
	$password = "MD5(" . "'" . $_POST['password']. "'" .")";
	$sentencia = $mi_bd -> prepare('SELECT * from usuarios where email='. $email .' and password='.$password);
	$sentencia->execute();


	if($sentencia->rowCount() > 0){
		header('Location: index.php?action=fail_registro');
	}
	else{

		$email = "'" . $_POST['email']. "'";
		$password = "MD5(" . "'" . $_POST['password']. "'" .")";
		$username = "'" . $_POST['username']. "'";
		$cp =  "'" . $_POST['cp']. "'";
		$direccion = "'" . $_POST['direccion']. "'";
		$pais =  "'" . $_POST['pais']. "'";
		$localidad =  "'" . $_POST['localidad']. "'";

		$sentencia = $mi_bd -> prepare('Insert into usuarios values( '. $email .','.$password.','.$username.','.$cp.','.$direccion.','.$pais.','.$localidad.');');
		$sentencia->execute();

		escribir_en_fichero("registro",$_POST['email']);

		header('Location: index.php?action=login');
	}

?>