<?php 
	header('Content-Type: application/json; charset=UTF-8');
	$conexion = new mysqli("localhost", "root", "", "huaro");
	if($conexion->connect_errno)
	{
		printf("Fallo la coneccion: &s\n", $conexion->connect_error);
		exit;
	}
	$tipo=$_GET['Tipo'];
	$user=$_GET['usuario'];//'JAL0720230';//
	$pass=$_GET['pass'];//'sasuke';//


	$conexion->set_charset('utf8');

	$log="Select CUM,Password FROM ".$tipo." WHERE CUM='".$user."' AND Password='".$pass."'";

	
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

