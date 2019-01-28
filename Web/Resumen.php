<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Resumen</title>
		<link rel="stylesheet" type="text/css" href="/proyecto/css/el_res.css">
	</head>
	<body>
		<?php
		//Agrega la barra de navegacion
			include 'barra.php'; 
		/*
			ESTE CODIGO ACTUALIZA LA COLUMNA DE INTEGRANTES
			CADA VEZ QUE SE HAGA REFRESH AL RESUMEN
		*/
			//Crear sesion y Guardar usuarios en base de datos
			$con = new mysqli("localhost", "root","","huaro")
			or die ("No se puede conectar con el servidor");
			$con->set_charset('utf8');
			//Pide los codigos de todos los equipos
			$querys="SELECT Cod_Equipo FROM equipos";
			//Realiza el query  y almacena en $Resu
			$Resu=$con->query($querys);
			/*
				Pasa por cada uno de los codigos de los equipos y
				le hace update a cada uno con cada refresh
			*/
			while($rows=$Resu->fetch_assoc())
			{
				$conn = new mysqli("localhost", "root","","huaro")
				or die ("No se puede conectar con el servidor");
				$conn->set_charset('utf8');
				//Hace un update revisando el numero de registros similares y los guarda en el equipo designado
				$queryss="UPDATE equipos SET N_integrantes=(SELECT COUNT(FK_Equipos) FROM participante WHERE FK_Equipos='".$rows['Cod_Equipo']."') WHERE Cod_equipo='".$rows['Cod_Equipo']."' ";
				$Res=$conn->query($queryss);
						
			}
		?>
		<!-- Se crea una tabla que muestre  los datos mas importantes de los equipos
			el valor de Suerte se cambiara por el grupo en el que se encuentra-->
		 <div class="tabla">
			<table>
				<thead><th colspan="9"> Equipos </th></thead>
				<TBODY>
					<tr>
						<td>Codigo de equipo</td>
						<td>Suerte</td>
						<td>Integrantes</td>
						<td>Nombre</td>
						<td>Seccion</td>
					</tr>
					<?php
						$conexion = new mysqli("localhost", "root","","huaro")
						or die ("No se puede conectar con el servidor");
						$conexion->set_charset('utf8');
						//El query pide todos los datos de los equipos
						//Deberia pedir solo los que necesito
						$query="SELECT * FROM equipos";
						$Resultado=$conexion->query($query);
						while($row=$Resultado->fetch_assoc())
						{
					?> 
					<tr>	
						<td> <?php echo $row['Cod_Equipo']; ?> </td>
						<td> <?php echo $row["Suerte"]; ?> </td>
						<td> <?php echo $row["N_integrantes"]; ?> </td>
						<td> <?php echo $row["Nombre"]; ?> </td>
						<td> <?php echo $row["Seccion"]; ?> </td>
					</tr>
					<?php
						}
					?>
				</TBODY>
			</table>
			<!-- Se crea una tabla que muestre los datos mas importante de los partidos
				Aqui se cambiara la manera en la que se visualiza, se vera:
			|nombre de equipo 1|puntos|vs|nombre de equipo 2|puntos|Ronda|Cancha|Hora| -->

			<table>
				<thead><th colspan="9"> Partidos </th></thead>
				<TBODY>
					<tr>
						<td>Partido</td>
						<td>Puntos</td>
						<td>Ronda</td>
						<td>Hora</td>
						<td>Equipo</td>
						<td>Cancha</td>
					</tr>
					<?php
						$conexion = new mysqli("localhost", "root","","huaro")
						or die ("No se puede conectar con el servidor");
						$conexion->set_charset('utf8');
						//El query pide todos los datos de los partidos
						//Deberia pedir solo los que necesito
						$query="SELECT * FROM partidos";
						$Resultado=$conexion->query($query);
						while($row=$Resultado->fetch_assoc())
						{
					?> 
					<tr>
						<td> <?php echo $row['Codigo']; ?> </td>
						<td> <?php echo $row["Puntos"]; ?> </td>
						<td> <?php echo $row["Ronda"]; ?> </td>
						<td> <?php echo $row["Hora"]; ?> </td>
						<td> <?php echo $row["FK_Equipos"]; ?> </td>
						<td> <?php echo $row["FK_Cancha"]; ?> </td>
					</tr>
					<?php
						}
					?>
				</TBODY>
			</table>
		
			<br><br>
			<!-- Se crea una tabla que muestre los datos mas importantes de los participantes
				Falta mostrara la edad del participante-->
			<table>

				<thead><th colspan="9"> Participantes </th></thead>
				<TBODY>
					<tr>
						<td>CUM</td>
						<td>Nombre</td>
						<td>Apellido Paterno</td>
						<td>Apellido Materno</td>
						<td>Vigencia</td>
					</tr>
					<?php
						$conexion = new mysqli("localhost", "root","","huaro")
						or die ("No se puede conectar con el servidor");
						$conexion->set_charset('utf8');
						//El query pide todos los datos de los participantes
						//Deberia pedir solo los que necesito
						$query="SELECT * FROM participante";
						$Resultado=$conexion->query($query);
						while($row=$Resultado->fetch_assoc())
						{
					?> 
					<tr>		
						<td> <?php echo $row['CUM']; ?> </td>
						<td> <?php echo $row["Nombre"]; ?> </td>
						<td> <?php echo $row["A_Pat"]; ?> </td>
						<td> <?php echo $row["A_Mat"]; ?> </td>
						<td> <?php echo $row['vigencia']; ?> </td>
					</tr>
					<?php
						}
					?>

				</TBODY>
			</table> 
			<!-- Se crea una tabla que muestre los datos mas importantes de los staff
				Falta mostrar cuando esta en servicio y cuanto tiempo lleva en servicio-->
			<table>

						<thead><th colspan="9"> Staffs </th></thead>
						<TBODY>
							<tr>
								<td>CUM</td>
								<td>Nombre</td>
								<td>Apellido paterno</td>
								<td>Apellido materno</td>
							</tr>
							<?php
								$conexion = new mysqli("localhost", "root","","huaro")
								or die ("No se puede conectar con el servidor");
								$conexion->set_charset('utf8');
								//Pide todos los datos del staff
								//Deberia pedir solo los que necesito
								$query="SELECT * FROM staff";
								$Resultado=$conexion->query($query);
								while($row=$Resultado->fetch_assoc())
								{
							?> 
							<tr>		
								<td> <?php echo $row['CUM']; ?> </td>
								<td> <?php echo $row["Nombre"]; ?> </td>
								<td> <?php echo $row["A_Pat"]; ?> </td>
								<td> <?php echo $row["A_Mat"]; ?> </td>
							</tr>
							<?php
								}
							?>

						</TBODY>
			</table>
		</div>	
	</body>
<html>