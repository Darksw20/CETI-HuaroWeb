<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title>Crear equipo</title>
		<link rel="stylesheet" type="text/css" href="/proyecto/css/el_staff.css">
</head>
<body>
	<?php
		include 'barra.php'; 

	 ?>
	<div class="creat">
		<h4>Ingresa a el equipo</h4>
		<br>
		<form action="/proyecto/agEquipo.php" method="POST">

			<input required type="text" name="nombre" placeholder="Nombre de equipo">
			<br><br>
			<select required name="seccion">
				<option value="TM">Tropa Masculina</option>
				<option value="TF">Tropa Femenina</option>
				<option value="CM">Comunidad Masculina</option>
				<option value="CF">Comunidad Femenina</option>
				<option value="CL">Clan</option>
			</select>
			<br><br>
			<select required name="suerte">
				<option value="A1">A1</option>
				<option value="A2">A2</option>
				<option value="A3">A3</option>
				<option value="A4">A4</option>

				<option value="B1">B1</option>
				<option value="B2">B2</option>
				<option value="B3">B3</option>
				<option value="B4">B4</option>

				<option value="C1">C1</option>
				<option value="C2">C2</option>
				<option value="C3">C3</option>
				<option value="C4">C4</option>

				<option value="D1">D1</option>
				<option value="D2">D2</option>
				<option value="D3">D3</option>
				<option value="D4">D4</option>
			</select>
			 <input type="submit" value="Ingresar">
		</form>
	
	</div>
	<div class="creat" id="letrero">
		<?php
			if(isset($_GET['codigo']))
			{
				$codigo=$_GET['codigo'];
				if($codigo=="1")
				{
		?>
					<h4><?php echo ("ERROR Duplicado")?></h4>
		<?php
				}
				else if($codigo)
				{
		?>
					<h4><?php echo $codigo ?></h4>
		<?php		

				}
				else
				{

				}
			}
		?>
	</div>
</body>
</html>