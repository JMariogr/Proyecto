<?php 

	$existe = false;

	$email = "'" . $_POST['email']. "'";
	$password = "MD5(" . "'" . $_POST['password']. "'" .")";

	
	
	$sentencia = $mi_bd->prepare('Select * from usuarios u where u.email = ' . $email . ' and u.password=' . $password);

	$sentencia->execute();
 
	if($sentencia->rowCount() > 0){
		$existe = true;
	}

	if($existe == true){
		$_SESSION['email_login'] = $_POST['email'];

		escribir_en_fichero("log",$_POST['email']);

		header('Location: index.php');
	}
	else{
		header('Location: index.php?action=fail_login');
	}

?>