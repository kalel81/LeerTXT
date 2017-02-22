<?php
 class archivo
 {
 	function leerarchivo()
 	{


 		global $nomarchivo1;
 		$nomarchivo1 = "Cadena.txt";
 		$nomarchivo2 = "logs.txt";
		$ar1 = fopen($nomarchivo1, "r") or die ("Problemas al leer el archivo");
		$ar2 = fopen("logs.txt", "r") or die ("Problemas al leer el archivo");
		$path = $_SERVER['DOCUMENT_ROOT'].'/webgis/'.$nomarchivo2;
		$fh = fopen($path, 'w');
		
		$traer = array();
		$traer2 = array();
		$array_re1 = array();
		

		while(!feof($ar1))
		{
			$traer[] = fgets($ar1);
			
		}
		foreach ($traer as  $value) 
		{
			fputs($fh, $value);
		}
		fclose($ar1);
			//unlink($nomarchivo1);HAY QUE DESCOMENTARLA CUANDO TERMINE EL DESARROLLO
		while(!feof($ar2)){
			$traer2[] = fgets($ar2);
		}
		fclose($ar2);
		fclose($fh);
		
		return($traer2);
 	}
 }
 	//$result = new archivo;
 	//$result->leerarchivo();

 	