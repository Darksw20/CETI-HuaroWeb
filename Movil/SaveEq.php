<?php 
	header('Content-Type: application/json; charset=UTF-8');
	$conexion = new mysqli("localhost", "root", "", "huaro");
	if($conexion->connect_errno)
	{
		printf("Fallo la coneccion: &s\n", $conexion->connect_error);
		exit;
	}
	$Code=$_GET['Codigo'];
	$user=$_GET['usuario'];
	$conexion->set_charset('utf8');

	$log="UPDATE participante SET FK_Equipos='$Code' WHERE CUM='$user'";
	$consulta= $conexion->query($log);

	$log="SELECT CUM FROM participante WHERE FK_Equipos='$Code' AND CUM='$user'";
	
	if($consulta= $conexion->query($log))
	{
		echo "[";//vulnerabilida_extream
		
		echo json_encode(['validado'=>true]);

		echo "]";

	}
	else
	{
		echo "[";
		echo json_encode(['validado'=>false]);
		echo "]";
	}

		
	
	$conexion->close();
