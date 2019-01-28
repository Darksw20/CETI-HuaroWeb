<?PHP
	/*
		Pide los datos para despues guardar la informacion del staff y que sea
		accesible
		-Revisar que pasa cuando hay un error
	*/
	if(isset($_POST['Agregar']))
	{
		$cUM= $_POST["CUM"];
		$asistencia= $_REQUEST['Asistencia'];
		$password= $_REQUEST['Password'];
		$fK_TablaS= $_REQUEST['CUM'];		
		$connection = mysqli_connect('localhost', 'root', '', 'huaro');
		$connect = mysqli_connect('localhost', 'root', '', 'huaro');
		//Se piden los datos que faltan para poder completar el query
		if($connect) 
   		{
			$sqlQuerys="SELECT vigencia, nombre, A_Pat, A_Mat FROM tabla_s WHERE CUM='".$cUM."'";
			
			$Resultado = mysqli_query($connect,$sqlQuerys);
			
			while ($row=$Resultado->fetch_assoc()) {
				$vigencia = $row['vigencia'];//ss
				$nombre = $row['nombre'];
				$a_Pat = $row['A_Pat'];
				$a_Mat = $row['A_Mat'];
			}
			
		}
		//Se completa el query y se inserta a un Staff de manera completa
   		if($connection) 
   		{

			$sqlQuery="INSERT INTO staff VALUES('$cUM','$asistencia','$nombre','$vigencia','$a_Pat','$a_Mat','$password','$fK_TablaS')";
			$result = mysqli_query($connection,$sqlQuery);
			//redirecciona a la pagina principal
			header("location: agStaff.php");
		}
	}
