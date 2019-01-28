<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="/proyecto/css/el_dash.css">
</head>
<body>
	<?php
	//Manda a llamar la barra
		include 'barra.php';
	?>
	<div id="informar">
		<?php
		/*
			Manda a llamar uno de los bloques de informacion
			Faltan bloques que muestren:
			-Goles anotados durante el evento
			-Cuantos equipos se registraron
			-Cantidad de Staffs en servicio
			=>Faltan agregar los botones de inicio de torneo
		*/
			require'inf.php';
		?>
	</div>
</body>
</html>


