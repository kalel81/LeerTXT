<?php

	class conex
	{
		function conect()
		{
			$conn = mysql_connect("localhost","root","toor","foraneos");
			//$conn = "willian";
			/*if(!$conn)
			{
				echo "Error al conectar a la base de datos";
			}else
			{
				echo "conectado a la base de datos";
			}*/
			return $conn;
		}
	}