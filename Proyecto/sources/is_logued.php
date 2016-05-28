<?php
if(!isset($_SESSION['email_login'])){

            echo "<h1> Puedes Loguearte <a href='index.php?action=login'> aquí </a></h1>";

        }
        else{
            echo "<h1> Bienvenido " . $_SESSION['email_login'] ."  </h1>";
            echo "<a href='index.php?action=logout'>Logout</a>";
        }
       
?>