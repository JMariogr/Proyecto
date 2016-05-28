<?php 
// datos para la coneccion a mysql 


	$target_dir = __DIR__ . '\upload\ ';
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	echo "<h1> ". $target_file ." </h1>";
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}


    $nameproduct = "'" . $_POST['name-product']. "'";
    $modelo = "'" . $_POST['modelo']. "'";
    $precio = "'" . $_POST['precio']. "'";
    $descripcion = "'" . $_POST['descripcion']. "'";
    $categoria = "'" . $_POST['categoria']. "'";
    $autor = "'" . $_SESSION['email_login']. "'";

    $image = "'sources/upload/ ".$_FILES["fileToUpload"]["name"]. "'";

    $id=rand(0, 10030303);

    $sentencia = $mi_bd -> prepare('SELECT * from producto where id_codigo='. $id);
	$sentencia->execute();

	
	while($sentencia->rowCount() > 0){
		$id=rand(0, 10030303030211);
		$sentencia = $mi_bd -> prepare('SELECT * from producto where id_codigo='. $id);
		$sentencia->execute();
	}


	$sentencia = $mi_bd -> prepare('Insert into producto values ( '. $id .','.$nameproduct.','.$modelo.','.$precio.','.$descripcion.','.$categoria.','.$image.','.$autor.');');
	
	$sentencia->execute();

	escribir_en_fichero("publicar",$_SESSION["email_login"],$nameproduct);

	header('Location: index.php?action=producto&id='.$id);

?>