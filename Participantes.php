<!DOCTYPE html>
<html>

<head>
	<title>Editar participante</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/proyecto/css/el_staff.css">
</head>
<body>
	<div>
		<?php
			include 'barra.php'; 
		?>
	</div>
	<div class="partido">
		<h4>Buscar participante</h4>
		<td>
			<form action="Participantes.php" method="POST"> 
				<input type="text" required name="Buscador" placeholder="Buscar CUM o nombre...">
				<input type="submit" name="Buscar" value="Buscar">
			 </form>
		</td>
		<table>
			<thead><tr><th colspan="12">Participante</th></tr></thead>
			<TBODY>
				<tr>
					<td>CUM</td>
					<td>Nombre</td>
					<td>Apellido paterno</td>
					<td>Apellido materno</td>
					<td>Vigencia</td>
					<td>Contraseña</td>
					<td>Edad</td>
					<td>Sexo</td>
					<td>Grupo</td>
					<td>Equipo</td>
					<td>c</td>
					<td>Editar</td>
				</tr>
				<?php
					$conexion = new mysqli("localhost", "root","","huaro")
					or die ("No se puede conectar con el servidor");
					if(isset($_POST['loquesea']))
					{
						$query="DELETE FROM participante WHERE CUM = '".$_POST['loquesea']."'";
						$Resultado=$conexion->query($query);
						
					}

					if(isset($_POST['edit']))
					{
						$F_naci= $_POST['Uno'];
						$Nnombre= $_POST['Dos'];
						$NVigencia= $_POST['Tres'];
						$Napp= $_POST['Cuatro'];
						$Napm= $_POST['Cinco'];
						$Ncontra= $_POST['Seis'];
						$Sex= $_POST['Siete'];
						$Grupos= $_POST['Ocho'];
						$Equi= $_POST['Nueve'];
						$query="UPDATE participante SET F_naci='$F_naci', Nombre='$Nnombre' , Vigencia='$NVigencia', A_Pat='$Napp', A_Mat='$Napm', Password='$Ncontra', Sexo=$Sex, Grupo_S='$Grupos',FK_Equipos='$Equi'  WHERE CUM = '".$_POST['edit']."'";
						$Resultado=$conexion->query($query);
					}
					if(isset($_POST['Buscar']))
					{
						$buscador= $_POST['Buscador'];
						$conexion = new mysqli("localhost", "root","","huaro")
						or die ("No se puede conectar con el servidor");
						$query="SELECT * FROM participante where (cum LIKE '%$buscador%') OR (nombre LIKE '%$buscador%')";
					}
					else
					{
						$query="SELECT * FROM participante";
					}
					$Resultado=$conexion->query($query);
					while($row=$Resultado->fetch_assoc())
					{
				?> 
						<tr>
							<form action="participantes.php" method="POST">
								<td> <?php echo $row['CUM']; ?> </td>
								<td> <?php echo $row["Nombre"]; ?> </td>
								<td> <?php echo $row["A_Pat"]; ?> </td>
								<td> <?php echo $row["A_Mat"]; ?> </td>
								<td> <?php echo $row['vigencia']; ?> </td>
								<td> <?php echo $row['Password']; ?> </td>
								<td> <?php echo $row['F_naci']; ?> </td>
								<td> <?php echo $row['Sexo']; ?> </td>
								<td> <?php echo $row['Grupo_S']; ?> </td>
								<td> <?php echo $row['FK_Equipos']; ?> </td>
								<td>
									<input type="hidden" name="loquesea" value="<?php echo $row['CUM']; ?>">
									<input type="submit" name="x" value="x">
								</td>
							</form>
							<form action="Participantes.php" method="POST">
								<td> 
									<input type="text" name="Uno" placeholder="F_naci..." size="10">
									<input type="text" name="Dos" placeholder="Nuevo nombre..." size="10">
									<input type="text" name="Tres" placeholder="nueva vigencia..." size="10">
									<input type="text" name="Cuatro" placeholder="Nuevo apellido paterno..." size="10">
									<input type="text" name="Cinco" placeholder="Nuevo apellido materno..." size="10">
									<input type="text" name="Seis" placeholder="nueva contraseña..." size="10">
									<input type="text" name="Siete" placeholder="sexo..." size="10">
									<input type="text" name="Ocho" placeholder="Grupo..." size="10">
									<input type="text" name="Nueve" placeholder="Equipo..." size="10">
									<input type="hidden" name="edit" value="<?php echo $row['CUM']; ?>">
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
	</div>
</body>
</html>