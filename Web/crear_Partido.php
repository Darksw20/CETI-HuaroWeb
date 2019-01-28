<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Crear partido</title>
		<link rel="stylesheet" type="text/css" href="/proyecto/css/el_staff.css">
	</head>
	<body>
		<?php
			include 'barra.php'; 
		 ?>
		<div class="partido">
			<h4>Crea un partido</h4>
			<br>
			<div id="agP">
				<form action="Crear_Partido.php" method="POST">
					<div>
						<input required="" type="text" name="codigo" placeholder="Codigo..">
						<input required type="text" name="Puntos" placeholder="Puntos..">
						<input required type="text" name="Ronda" placeholder="Ronda...">
						<br></br>
						<input required type="text" name="Hora" placeholder="Hora..">
						<input required type="text" name="Equipo" placeholder="Equipo..">
						<input required type="text" name="Cancha" placeholder="Cancha..">		
						<br></br>
						<input type="submit" name="Agregar" value="Crear">
					</div>
				</form>
			</div>
		
			<?PHP
				if(isset($_POST['Agregar']))
				{
					$cUM= $_POST["codigo"];
					$nombre= $_REQUEST['Puntos'];
					$f_naci= $_REQUEST['Ronda'];
					$sexo= $_REQUEST['Hora'];
					$Seccion= $_REQUEST['Equipo'];
					$grupo_s= $_REQUEST['Cancha'];
					$connection = mysqli_connect('localhost', 'root', '', 'huaro');
			   		if($connection) 
			   		{

						$sqlQuery="INSERT INTO partidos VALUES('$cUM','$nombre','$f_naci','$sexo','$Seccion','$grupo_s')";
						$result = mysqli_query($connection,$sqlQuery);
					}
				}
			?>
		
			<table>
				<thead><tr><th colspan="9"> Partido </th></tr></thead>
				<TBODY>
					<tr>
						<td>Codigo</td>
						<td>Puntos</td>
						<td>Ronda</td>
						<td>Hora</td>
						<td>Equipo</td>
						<td>Cancha</td>
						<td>Eliminar</td>
						<td>Editar</td>
					</tr>
					<?php
						$conexion = new mysqli("localhost", "root","","huaro")
						or die ("No se puede conectar con el servidor");

						if(isset($_POST['loquesea']))
						{
							$sql="DELETE FROM partidos WHERE Codigo = '".$_POST['loquesea']."'";
							$Resultado=$conexion->query($sql);
						}

						if(isset($_POST['edit']))
						{
							$NAsistencia= $_POST['Uno'];
							$Nnombre= $_POST['Dos'];

							$NVigencia= $_POST['Tres'];
							$Napp= $_POST['Cuatro'];

							$Napm= $_POST['Cinco'];
							$Ncontra= $_POST['Seis'];

							$sql="UPDATE partidos SET codigo='$NAsistencia', Puntos='$Nnombre' , Ronda='$NVigencia', Hora='$Napp', FK_Equipos='$Napm', FK_Cancha='$Ncontra' WHERE Codigo = '".$_POST['edit']."'";
							$Resultado=$conexion->query($sql);
						}

						$query="SELECT * FROM partidos";
						$Resultado=$conexion->query($query);

						while($row=$Resultado->fetch_assoc())
						{
					?> 
						<tr>
							<form action="Crear_Partido.php" method="POST">
								<td> <?php echo $row['Codigo']; ?> </td>
								<td> <?php echo $row["Puntos"]; ?> </td>
								<td> <?php echo $row["Ronda"]; ?> </td>
								<td> <?php echo $row['Hora']; ?> </td>
								<td> <?php echo $row["FK_Equipos"]; ?> </td>
								<td> <?php echo $row["FK_Cancha"]; ?> </td>
								<td> <input type="hidden" name="edit" value="<?php echo $row['Codigo']; ?>">
									 <input type="submit" name=" x " value="     x     ">
								</td>

								<td> 
									<input type="text" name="Uno" placeholder="Codigo..." size="10">
									<input type="text" name="Dos" placeholder="Puntos..." size="10">
									<input type="text" name="Tres" placeholder="Ronda..." size="10">
									<input type="text" name="Cuatro" placeholder="Hora..." size="10">
									<input type="text" name="Cinco" placeholder="Equipo..." size="10">
									<input type="text" name="Seis" placeholder="Cancha..." size="10">
									<input type="hidden" name="loquesea" value="<?php echo $row['Codigo']; ?>">
									<input type="submit" name="O" value="O">
								</td>
							</form>
						</tr>
					<?php
						}

					?>
				</TBODY>
			</table>
		</div>
		<div>
			<form action="index_Logeado.php "> <input type="submit" name="Menu" value="Menu"> </form>
			<form action="crear_Partido.php">
				<input type="submit" name="Login" value="Login">
			</form>
		</div>

	</body>
</html>