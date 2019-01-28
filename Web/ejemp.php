<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		ejemplo
	</title>
</head>
<body>
	<?php
		include 'barra.php'; 
	 ?>
	 <table>
			<thead><th colspan="9"> Partidos </th></thead>
			<TBODY>
				<tr>
					<td>Ronda</td>
					<td>Equipo 1</td>
					<td>Puntos</td>
					<td>vs</td>
					<td>Equipo2</td>
					<td>Puntos</td>
					<td>Hora</td>
					<td>Cancha</td>
				</tr>
				<?php
					$conexion = new mysqli("localhost", "root","","huaro")
					or die ("No se puede conectar con el servidor");
					$conexion2= new mysqli("localhost", "root","","huaro")
					or die ("No se puede conectar con el servidor");
					$conexion->set_charset('utf8');
					$conexion2->set_charset('utf8');
					$query="SELECT * FROM partidos";
					$query2="SELECT codigo, puntos, ronda, Hora from partidos where fk_cancha=1 AND hora='16:45:00'";
					$Resultado=$conexion->query($query);
					$Resultado2=$conexion2->query($query2);
					

					while($row=$Resultado->fetch_assoc())
					{
				?> 
				<tr>
					<td> <?php echo $row["Ronda"]; ?> </td>
					<td> <?php echo $row['Codigo']; ?> </td>
					<td> <?php echo $row["Puntos"]; ?> </td>
					<td> <?php echo $row["Ronda"]; ?> </td>
					<td> <?php echo $row['Codigo']; ?> </td>
					<td> <?php echo $row["Puntos"]; ?> </td>
					<td> <?php echo $row["Ronda"]; ?> </td>
					<td> <?php echo $row['Codigo']; ?> </td>
					
					
				</tr>
				<?php
					}
				?>
			</TBODY>
		</table>

</body>
</html>