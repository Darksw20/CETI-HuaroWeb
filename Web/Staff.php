<!DOCTYPE html>
<html>
<head>
	<title>Editar Staff</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/proyecto/css/el_staff.css">
</head>
<body>
	<div>
		<?php
			include 'barra.php'; 
		?>
	</div>
	<div class="editarS">
		<h4>Buscar staff</h4>
		<!-- Este es un buscador para encontrar a un staff por nombre o CUM -->
		<td>
			<form action="Staff.php" method="POST"> 
				<input type="text" required name="Buscador" placeholder="Buscar CUM o nombre...">
				<input type="submit" name="Buscar" value="Buscar">
			 </form>
		</td>
	<table>
		<!-- Tabla para mostrar los resultados de la busqueda -->
		<thead><tr><th colspan="9">Staff</th></tr></thead>
		<TBODY>
			<tr>
				<td>CUM</td>
				<td>Asist</td>
				<td>Nombre</td>
				<td>Vigencia</td>
				<td>Paterno</td>
				<td>Materno</td>
				<td>Contraseña</td>
				<td>c</td>
				<td>Editar</td>
			</tr>
			<?php	
			$conexion = new mysqli("localhost", "root","","huaro")
			or die ("No se puede conectar con el servidor");
			if(isset($_POST['loquesea']))
			{
				$query="DELETE FROM staff WHERE CUM = '".$_POST['loquesea']."'";
				$Resultado=$conexion->query($query);
				
			}
			if(isset($_POST['edit']))
			{
				$NAsistencia= $_POST['Uno'];
				$Nnombre= $_POST['Dos'];
				$NVigencia= $_POST['Tres'];
				$Napp= $_POST['Cuatro'];
				$Napm= $_POST['Cinco'];
				$Ncontra= $_POST['Seis'];
				$query="UPDATE staff SET Asistencia='$NAsistencia', Nombre='$Nnombre' , Vigencia='$NVigencia', A_Pat='$Napp', A_Mat='$Napm', Password='$Ncontra' WHERE CUM = '".$_POST['edit']."'";
				$Resultado=$conexion->query($query);
			}
			if(isset($_POST['Buscar']))
			{
				$buscador= $_POST['Buscador'];
				$conexion = new mysqli("localhost", "root","","huaro")
				or die ("No se puede conectar con el servidor");
				$query="SELECT * FROM staff where (cum LIKE '%$buscador%') OR (nombre LIKE '%$buscador%')";
			}
			else
			{
				$query="SELECT * FROM staff";
			}
				$Resultado=$conexion->query($query);
				while($row=$Resultado->fetch_assoc())
				{
			?>
			<tr>
				<form action="Staff.php" method="POST">
						<td> <?php echo $row['CUM']; ?> </td>
						<td> <?php echo $row["Asistencia"]; ?> </td>
						<td> <?php echo $row["Nombre"]; ?> </td>
						<td> <?php echo $row['Vigencia']; ?> </td>
						<td> <?php echo $row["A_Pat"]; ?> </td>
						<td> <?php echo $row["A_Mat"]; ?> </td>
						<td> <?php echo $row['Password']; ?> </td>
						<td>
							<input type="hidden" name="loquesea" value="<?php echo $row['CUM']; ?>">
							<input type="submit" name="x" value="x">
						</td>
				</form>
				<form action="Staff.php" method="POST">
					<td> 
						<input type="text" name="Uno" placeholder="asistencia..." size="10">
						<input type="text" name="Dos" placeholder="Nuevo nombre..." size="10">
						<input type="text" name="Tres" placeholder="nueva vigencia..." size="10">
						<input type="text" name="Cuatro" placeholder="Nuevo apellido paterno..." size="10">
						<input type="text" name="Cinco" placeholder="Nuevo apellido materno..." size="10">
						<input type="text" name="Seis" placeholder="nueva contraseña..." size="10">
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
	<div><form action="index_Logeado.php "> <input type="submit" name="Menu" value="Menu"> </form></div>
</body>
</html>