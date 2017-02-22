<?php

	include("leer_archivo.php");
	require_once('conexion.php');
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	class proceso
	{
		function procesosql()
		{	$i = 0;
			$jsondata = array();
			$r = archivo::leerarchivo();
			$conn1 = conex::conect();
			$array_1 = array();
			
			////////////////////////////////
			foreach ($r as $val)
			{
				$row = explode(';', str_replace('>', '', str_replace('<', '', $val)));
				if (sizeof($row)> 1){
					$ya = $row[0];
			

				$crear = "
				CREATE TABLE IF NOT EXISTS foraneos.geo_m_$ya (
						  `autonum` mediumint(9) NOT NULL AUTO_INCREMENT,
						  `id_movil` varchar(20) DEFAULT NULL,
						  `latitud` double DEFAULT NULL,
						  `longitud` double DEFAULT NULL,
						  `altitud` double DEFAULT NULL,
						  `fechahora` datetime DEFAULT NULL,
						  `fechasystem` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
						  `evento` int(11) DEFAULT NULL,
						  `rumbo_geografico` int(11) DEFAULT NULL,
						  `estado_gps` int(11) DEFAULT NULL,
						  `estado_movil` int(11) DEFAULT NULL,
						  `estado_motor` int(11) DEFAULT NULL,
						  `velocidad` int(11) DEFAULT NULL,
						  `temperatura` varchar(7) DEFAULT NULL,
						  `direccion` varchar(250) DEFAULT NULL,
						  `engeocerca` int(11) DEFAULT NULL,
						  `procesado` int(11) DEFAULT NULL,
						  `id_cliente` varchar(15) DEFAULT NULL,
						  `id_empresa` int(11) DEFAULT NULL,
						  `estado_sensores` varchar(50) DEFAULT NULL,
						  `bateria_conectada` int(11) DEFAULT NULL,
						  `msg_terminal_datos` varchar(250) DEFAULT NULL,
						  `volt_bateria` double DEFAULT NULL,
						  `apagado_remoto` int(11) DEFAULT NULL,
						  PRIMARY KEY (`autonum`)
						) ENGINE=InnoDB AUTO_INCREMENT= 0 ";
						$result = mysql_query($crear,$conn1);
							
					$id_movil = $row[0];
					//print_r($id_movil);
					$latitud = $row[2];
					$longitud = $row[2];
					$altitud = $row[1];
					$fechahora = $row[6];
					$evento = $row[5];
					$rumbo_geografico = $row[5];
					$estado_gps = $row[7];
	  				$insertar = "
	  							INSERT INTO foraneos.geo_m_$id_movil 
		  							(	
		  								id_movil,latitud,longitud,altitud,fechahora,evento,rumbo_geografico,estado_gps
		  							)
						 		VALUES
							 		(
							 			'$id_movil','$latitud','$longitud','$altitud','$fechahora','$evento','$rumbo_geografico','$estado_gps'
							 		)
						 		";

					$result = mysql_query($insertar,$conn1);
				}			
			}
			
				if ($result)
				{
					$jsondata[0]['status'] = 'Ok';
				}else
				{
					$jsondata[0]['status'] = 'Error';
				}								
			////////////////////////////////
				
				print_r(json_encode($jsondata));
				

		}
		

	}
	$te = new proceso;
		$te->procesosql();
		//$te->validarTabla();
		//echo mostrar();*/
?>