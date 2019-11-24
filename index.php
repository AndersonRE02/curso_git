<?php 
if(isset($_POST["enviar"])){
	require_once("conexion.php");
	require_once("funciones.php");

	$archivo = $_FILES["archivo"]["name"];
	$archivoCopiado = $_FILES["archivo"]["tmp_name"];
	$archivoGuardado = "copia_".$archivo;
	//echo $archivo."esta en la ruta temporal: ".$archivoCopiado;

	if(copy($archivoCopiado, $archivoGuardado)){
		$fp = fopen($archivoGuardado, "r");//abrir el archivo
		$row = 0;
		while($datos = fgetcsv($fp, 1000, ";")){
			$row ++;
			//echo $datos[0]. " / " . $datos[1] . " / " . $datos[2] . " / " . $datos[3] . "<br/>";
			if($row > 1){
				$resultado = insertar_datos($datos[0], $datos[1], $datos[2], $datos[3]);
				if($resultado){
					echo "se ingreso correctamente los datos<br/>";
				}else{
					echo "No se ingreso los datos<br/>";
				}
			}
		}
	}else{
		echo "UPS!!!<br/>";
	}

	if(file_exists($archivoGuardado)){
		echo "si existe una copia<br/>";
	}else{
		echo "No hay archivo";
	}

}


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Subir a la DB Mysql</title>
 </head>
 <body>
 	<div class="formulario">
 		<form class="formulariocompleto" action="index.php" method="post" enctype="multipart/form-data">
 			<input type="file" name="archivo" class="form.control">
 			<input type="submit" value="SUBIR ARCHIVO" class="form.control" name="enviar">
 		</form>
 	</div>
 </body>
 </html>