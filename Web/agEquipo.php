<?php

	$nombre=$_POST['nombre'];
	$seccion=$_POST['seccion'];
	$suerte=$_POST['suerte'];

	$codigo="".$seccion.$suerte;

	$connection = mysqli_connect('localhost', 'root', '', 'huaro');
	if($connection) 
	{
		$sqlQuery = "SELECT Cod_Equipo FROM equipos WHERE Cod_Equipo = '$codigo' ";
		$result = mysqli_query($connection,$sqlQuery);
		if(mysqli_num_rows($result) >0 ) 
		{
			//error duplicado
			header("location: Equipo.php?codigo=1");
		}
		else
		{
			$connection = mysqli_connect('localhost', 'root', '', 'huaro');
			$sqlQuery="INSERT INTO equipos(Cod_Equipo,Nombre,Seccion,Suerte) VALUES('$codigo','$nombre','$seccion','$suerte')";
			$result = mysqli_query($connection,$sqlQuery);

			header("location: Equipo.php?codigo=".$codigo."");
		}
	}