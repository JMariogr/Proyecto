<?php

		
		function escribir_en_fichero($accion,$parametro,$parametro2=null){

			$fecha = getdate();
			$fecha_actual = '"'.$fecha['year'] . '-'.$fecha['mon'].'-'.$fecha['mday']." ".$fecha['hours'].":".$fecha['minutes'].':'.$fecha['seconds'].' AM"';
			$file = fopen("log_acciones.txt", "a");


			if($accion=="log"){
				fwrite($file, "Usuario ". $parametro. " realiza el logueo, a fecha de: " . $fecha_actual . PHP_EOL);	
			}
			else if($accion=="logout"){
				fwrite($file, "Usuario ". $parametro. " realiza el logout, a fecha de: " . $fecha_actual . PHP_EOL);
			}
			else if($accion=="comprar"){
				fwrite($file, "Usuario ". $parametro. " realiza compra del articulo: " . $parametro2 . " , a fecha de ". $fecha_actual  . PHP_EOL);
			}
			else if($accion=="eliminar"){
				fwrite($file, "Usuario ".$parametro . " elimina el articulo " . $parametro2 . " , a fecha de " .$fecha_actual .PHP_EOL);
			}
			else if($accion=="registro"){
				fwrite($file, "Usuario ".$parametro . " a sido registrado a fecha de " .$fecha_actual .PHP_EOL);
			}
			else if($accion=="publicar"){
				fwrite($file, "Usuario ". $parametro. " publica el articulo: " . $parametro2 . " , a fecha de ". $fecha_actual  . PHP_EOL);
			}
			else if($accion=="actualizar"){
				fwrite($file, "Usuario ". $parametro. " publica el articulo: " . $parametro2 . " , a fecha de ". $fecha_actual  . PHP_EOL);
			}

			else if($accion=="editar"){
				fwrite($file, "Usuario ". $parametro. " elije editar producto" . PHP_EOL);
			}



			fclose($file);

			
		}


		

?>