<?php

echo '
	<!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h1>Datos para realiar transferencia</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
       
        
        <h4> Ya puede realizar la transferencia bancaria a la cuenta: XXXX-XXXX-XXXX-XXXX <h4>
        <p> Con el asunto: "Compra en Find your trasure" </p>
        <p> Por un importe de: '; 

        echo $_GET['precio'] . " euros";
        echo '<h3> Gracias por su compra </h3> ';

?>