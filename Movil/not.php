<?php 

	header('Content-Type: application/json; charset=UTF-8');
	
	$conexion = new mysqli("localhost", "root", "", "huaro");
	if($conexion->connect_errno)
	{
		printf("Fallo la conexion: &s\n", $conexion->connect_error);
		exit();
	}

	$CUM=$_GET['cum'];
	$titulo=$_GET['titulo'];
	$texto=$_GET['texto'];

	$conexion->set_charset('utf8');
	$log="INSERT INTO notas(CUM,titulo,nota,FK_CUM) VALUES ('".$CUM."','".$titulo."','".$texto."','".$CUM."')";
	
	if($conexion->query($log))
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
		echo mysqli_error($conexion);

	}

$conexion->close();