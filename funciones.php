<?php 

	function insertar_datos($rut, $nombre, $fecha, $saldo){
		global $conexion;
		$sentencia = "INSERT INTO cliente (ruc, nombCliente, fecha, saldo) VALUES ($rut,'$nombre','$fecha','$saldo')";
		$ejecutar = mysqli_query($conexion, $sentencia);
		return $ejecutar;
	}

 ?>