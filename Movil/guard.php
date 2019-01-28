<?php 


header('Content-Type: application/json; charset=UTF-8');
	
	$conexion = new mysqli("localhost", "root", "", "huaro");
	if($conexion->connect_errno)
	{
		printf("Fallo la conexion: &s\n", $conexion->connect_error);
		exit();
	}

	$CUM=$_GET['cum'];
	$NOMBRE=$_GET['nombre'];
	$A_PAT=$_GET['apat'];
	$A_MAT=$_GET['amat'];
	$CONTRA=$_GET['contra'];
	$GRUPO=$_GET['gg'];

	$conexion->set_charset('utf8');

	$log="INSERT INTO participante(CUM,NOMBRE,A_PAT,A_MAT,Password,GRUPO_S,FK_TabS) VALUES ('".$CUM."','".$NOMBRE."','".$A_PAT."','".$A_MAT."','".$CONTRA."',".$GRUPO.",'$CUM')";
	

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