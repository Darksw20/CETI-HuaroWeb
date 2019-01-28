<!DOCTYPE html>
<html>
<head>
	<title>Agregar Staff</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/proyecto/css/el_staff.css">
</head>
<body>
	<div>
		<?php
			//Manda a llamar la barra de navegacion
			include 'barra.php';
		?>
	</div>
	<div class="info">
		<!-- Formulario para agregar staff 
			le falta diseño y probarlo con el teclado laser(Supongo que no lo necesitaré)-->
		<h4>Agregar un staff</h4>
		<div id="nuevo">			
			<form action="agregarS.php" method="POST">
				<div id="datos">
					<div id="c1">
						<input  type="text" name="CUM" placeholder="Cum.." autocomplete="off">
						<br></br>
						<input required type="text" name="Asistencia" placeholder="asistencia.." autocomplete="off">
						<br></br>
						<input required type="password" name="Password" placeholder="Contraseña.." autocomplete="off">
						<br></br>
					</div>
					<input type="submit" name="Agregar" value="Agregar">
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>