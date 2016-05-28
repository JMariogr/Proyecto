<?php

	if(!isset($_SESSION['email_login']))
    session_start();


$mi_bd = new PDO("mysql:host=localhost; dbname=Proyecto_db", "root", "");
$mi_bd -> query("set names 'utf-8'");

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Find Your Treasure</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

    <!--Custom Css -->
    <link href="css/customCss.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="favicon.png"/>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src="./js/jquery.js"></script>
    <script src="./js/custom.js"></script>
    <script src="./js/canvas-to-blob.js"></script>
    <script src="./js/fileinput.js"></script>
</head>

<body>

<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href='index.php?action=home'> Find you Treasure</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                	<li>
                        <a href='index.php?action=login'>Login</a>
                    </li>
                    <li>
                        <a href='index.php?action=registrarse'>Registrarse</a>
                    </li>
                    <li>
                        <a href="index.php?action=categoria&cate=Ordenadores">Productos</a>
                    </li>
                    <li>
                        <a href="index.php?action=aboutus">Sobre Nosotros</a>
                    </li>
                    <?php
                    if(isset($_SESSION['email_login'])){

                    echo'
                    <li>
                        <a href="index.php?action=publicar">Publicar</a>
                    </li>
                    <li>
                        <a href="index.php?action=micuenta">Mi Cuenta</a>
                    </li>';

                    }



                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">



        <?php
            include "./sources/escribir_fichero.php";
            include "./sources/is_logued.php";
        ?>

        <!-- Jumbotron Header -->
        <header id="cabecera" class="jumbotron hero-spacer">
        	
        		<div id="icono" class="col-lg-3">
        			<img src="favicon.png" /> 
        		</div>
        		<div id="titulo" class="col-lg-9">
        			<h1> Find Your Treasure</h1>
        		</div>
        	
        		<p> Siempre encontrarás lo que siempre has buscado </p>
        	

           <!-- <img id="banner-inicio" src="img/banner2.jpg" />-->

           
        </header>

        <hr>

<?php


$vista = isset($_GET['action']) ? $_GET['action'] : "";

switch($vista) {
	case 'login':
        if(!isset($_SESSION['email_login'])) {
            include "./views/logueo.html";
        }
		else{
            include "./views/already_logued.html";
        }

	break;



    case 'hacerlogin':
        include "./sources/login.php";
        
    break;

    case 'fail_login':
        include "./views/fail_login.html";
        
    break;

	case 'home':
		include "./home.html";
        include "./sources/last-products.php";

	break;
	case 'registrarse':
        if(!isset($_SESSION['email_login'])) {
            include "./views/registrarse.html";
        }
		else{
            include "./views/already_registered.html";
        }

	break;

	case 'registro':
		include "./sources/registro.php";

	break;
	
	case 'fail_registro':
		include "./views/fail_registro.html";
		
	break;
    case 'producto':
        include "./sources/producto.php";
    break;
	case 'logout':
        escribir_en_fichero("logout",$_SESSION["email_login"]);
		unset($_SESSION["email_login"]); 
		header("Location: index.php");
		
	break;

    case 'comprar':
        if(isset($_SESSION['email_login'])) {
            include "./sources/comprar.php";
        }
        else{
            include "./views/logueo.html";
        }
    break;

    case 'exito_compra':
        include "./sources/resumen_compra.php";
    break;

    case 'fallo_compra':
        include "./views/fallo_compra.html";
    break;

    case 'categoria':
        include "./sources/category.php";
        
    break;

    case 'aboutus':
        include "./sources/about-us.php";
        
    break;

    case 'publicar':
    if(isset($_SESSION['email_login'])) {
        include "./sources/publicando.php";
    }
        
    break;
    case 'publica':
        include "./sources/publica.php";
        
    break;

    case 'micuenta':
    if(isset($_SESSION['email_login'])) {
        include "./sources/micuenta.php";
    }
        
    break;
    case 'eliminar':
        
        include "./sources/eliminar.php";
        
    break;

    case 'editar':
        
        include "./sources/editando.php";
        
    break;

    case 'actualiza':
        
        include "./sources/actualiza.php";
        
    break;

	default:
		include "./home.html";
        include "./sources/last-products.php";
        
	break;

}

?>

<hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Jose Mario Find Your Treasure - 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>