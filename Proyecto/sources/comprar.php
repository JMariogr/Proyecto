<?php
	

	$id_codigo = $_GET['id'];
	$email = '"' . $_SESSION['email_login'] . '"';
	$fecha = getdate();

	class usuario{
		public $password;
	}

	$sentencia = $mi_bd->prepare('Select password from usuarios where email='.$email);
	$sentencia->execute();

	$resultado = $sentencia->fetchAll(PDO::FETCH_CLASS, "usuario");

	$pass = '"' .$resultado[0]->password . '"';


	$current_fecha = '"'.$fecha['year'] . '-'.$fecha['mon'].'-'.$fecha['mday']." ".$fecha['hours'].":".$fecha['minutes'].':'.$fecha['seconds'].' AM"';

	class product {
	    public $precio;
	    public $producto;
	}

	$sentencia = $mi_bd->prepare('Select precio,producto from producto where id_codigo='.$id_codigo);
	$sentencia->execute();

	$resultado = $sentencia->fetchAll(PDO::FETCH_CLASS, "product");

	$precio = $resultado[0]->precio;
	$nombre = $resultado[0]->producto;

	echo 'INSERT INTO compras values(' . $email . ',' . $pass . ',' . $id_codigo . ','. $current_fecha . ',' . $precio . ')';

	$sentencia = $mi_bd->prepare('INSERT INTO compras values(' . $email . ',' . $pass . ',' . $id_codigo . ','. $current_fecha . ',' . $precio . ')');

	if ($sentencia->execute()){
		escribir_en_fichero("comprar",$_SESSION["email_login"],$nombre);
		header('Location: index.php?action=exito_compra&precio='.$precio);
	}
	else{
		header('Location: index.php?action=fallo_compra');
	}

	

?>