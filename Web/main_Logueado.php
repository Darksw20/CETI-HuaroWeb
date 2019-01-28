<?php
	/*
		Se piden el cum y la contraseña del Staff y se valida
		que la informacion sea correcta
	*/
	$Cum= $_POST['codigo'];
	$Contraseña= $_POST['nombre'];
	/*
		Se crea la conexion
		Falta crear usuarios en la base para delimitar a los usuarios
	*/
	$connection = mysqli_connect('localhost', 'root', '', 'huaro');
	if($connection) //Si existe conexion
	{
		//pide la informacion del que tenga el CUM seleccionado
		$sqlQuery = "SELECT * FROM staff WHERE CUM = '$Cum' ";				
		//pide la informacion del que tenga la Contra seleccionada
		$sqlQuerys = "SELECT * FROM staff WHERE Password = '$Contraseña' "; 
	/*
		Genera las consultas y almacena la informacion en las variables
	*/
		$result = mysqli_query($connection,$sqlQuery);
		$result2 =mysqli_query($connection,$sqlQuerys);

		//Revisa que ninguno de los resultados sea null
		if(mysqli_num_rows($result) >0 && mysqli_num_rows($result2) >0) 
		{
			//Pasa por los resultados de $result
			while($row = mysqli_fetch_assoc($result))
			    {
			    	//Compara que la informacion ingresada y la que devuelve la base sean identicas
					if ($row["CUM"] == $Cum && $row["Password"] == $Contraseña)
				    {
				    	//En caso de ser correcto envia a el dashboard
						header("location: dashboard.php");
					}
				}

		}
		//En caso de que alguno este como Null
		else
        {	
        	//Verifica que el resultado sea 0	
			if(mysqli_num_rows($result) ==0)
			{
				//Envia de nuevo al login
				header("location: Login.php");
			}
			//aqui se podria mandar algun tipo de advertencia sobre contraseña invalida
			header("location: Login.php");
        }
    }

    /*
    	Revisar si seria correcto cerrar las conexiones
	*/